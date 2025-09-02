<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Models\ChapterPayments;
use App\Models\Signup;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        $validated = $request->validate([
            'chapter_id' => 'required|numeric',
            'amount' => 'required|numeric',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);

        $uid = session('uid');
        $user = Signup::where('uid', $uid)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Initialize Razorpay API
        $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));

        // Create a Razorpay order
        $order = $api->order->create([
            'receipt' => uniqid('receipt_', true),
            'amount' => $validated['amount'] * 100, // Amount in paise
            'currency' => 'INR',
        ]);

        // Save pending payment details in the database
        $payment = ChapterPayments::create([
            'merchant_transaction_id' => $order->id,
            'uid' => $uid,
            'chapter_id' => $validated['chapter_id'],
            'name' => $user->name,
            'email' => $validated['email'],
            'amount' => $validated['amount'],
            'start_date' => null, // Set after successful payment
            'end_date' => null,   // Set after successful payment
            'payment_status' => 'pending',
            'transaction_id' => $order->id,
            'status' => 'pending',
        ]);

        // Return the order ID and other details to the frontend
        return response()->json([
            'order_id' => $order->id,
            'amount' => $validated['amount'],
            'name' => $user->name,
        ], 200);
    }

    public function success(Request $request)
    {
        $paymentId = $request->input('razorpay_payment_id');
        $orderId = $request->input('razorpay_order_id');

        // Initialize Razorpay API
        $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));

        try {
            // Fetch payment details from Razorpay
            $payment = $api->payment->fetch($paymentId);

            // Verify the payment status
            if ($payment->status === 'captured') {
                // Update payment details in the database
                $dbPayment = ChapterPayments::where('merchant_transaction_id', $orderId)->first();
                if ($dbPayment) {
                    $dbPayment->update([
                        'start_date' => Carbon::now()->toDateString(),
                        'end_date' => Carbon::now()->addDays(30)->toDateString(),
                        'payment_status' => 'completed',
                        'status' => 'active',
                    ]);
                }

                return view('frontend/success', ['response' => $payment]);
            }
        } catch (\Exception $e) {
            Log::error('Razorpay Payment Verification Failed:', ['error' => $e->getMessage()]);
            return redirect('/payment/failure')->with('error', 'Payment verification failed.');
        }

        return redirect('/payment/failure')->with('error', 'Invalid payment status.');
    }

    public function failure(Request $request)
    {
        // Handle failed payment response
        $response = $request->all();

        // Log the failure response
        Log::error('Razorpay Payment Failed:', $response);

        return view('frontend/failure', ['response' => $response]);
    }
}