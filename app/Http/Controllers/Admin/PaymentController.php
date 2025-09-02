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
    
        // dd(  $request->all() );
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

        $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));

        $order = $api->order->create([
            'receipt' => uniqid('receipt_', true),
            'amount' => $validated['amount'] * 100,
            'currency' => 'INR',
        ]);

        ChapterPayments::create([
            'merchant_transaction_id' => $order->id,
            'uid' => $uid,
            'chapter_id' => $validated['chapter_id'],
            'name' => $user->name,
            'email' => $validated['email'],
            'amount' => $validated['amount'],
            'payment_status' => 'pending',
            'transaction_id' => $order->id,
            'status' => 'pending',
        ]);

        return response()->json([
            'order_id' => $order->id,
            'amount' => $validated['amount'],
            'name' => $user->name,
        ]);
    }

    public function success(Request $request)
    {
        // print_r($request->input('razorpay_payment_id'));
        // die();
        $paymentId = $request->input('razorpay_payment_id');
        $orderId = $request->input('razorpay_order_id');

        $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));
        $payment = $api->payment->fetch($paymentId);


        $dbPayment = ChapterPayments::where('merchant_transaction_id', $orderId)->first();

        if ($payment->status === 'captured' && $dbPayment) {
            $dbPayment->update([
                'start_date' => Carbon::now()->toDateString(),
                'end_date' => Carbon::now()->addDays(30)->toDateString(),
                'payment_status' => 'completed',
                'status' => 'active',
            ]);
            return view('frontend.success', compact('payment', 'dbPayment'));
        }

        return redirect('/payment/failure')->with('error', 'Your payment could not be processed.');
    }

    public function failure(Request $request)
    {
        Log::error('Payment Failure:', $request->all());
        return view('frontend.failure', ['response' => $request->all()]);
    }

    public function pending(Request $request)
    {
        return view('frontend.pending', ['message' => 'Your payment is currently being processed.']);
    }
    public function handlePaymentStatus(Request $request)
{
    $paymentId = $request->input('razorpay_payment_id');
    $orderId = $request->input('razorpay_order_id');

    try {
        // Initialize Razorpay API
        $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));
        $payment = $api->payment->fetch($paymentId);

        Log::info("Payment Verification:", [
            'status' => $payment->status,
            'payment_id' => $paymentId,
            'order_id' => $orderId
        ]);

        // Find the payment record by merchant_transaction_id (we assume this matches Razorpay Order ID)
        $dbPayment = ChapterPayments::where('merchant_transaction_id', $orderId)->first();

        if ($payment->status === 'captured' && $dbPayment) {
            // Update payment details in DB
            $dbPayment->update([
                'transaction_id' => $paymentId,
                'start_date' => Carbon::now()->toDateString(),
                'end_date' => Carbon::now()->addDays(30)->toDateString(),
                'payment_status' => 'completed',
                'status' => 'active',
            ]);

            // Return success response with data for SweetAlert
            return response()->json([
                'status' => 'success',
                'message' => 'Payment successful!',
                'dbPayment' => $dbPayment
            ]);
        }

        // If not captured or no matching DB entry
        return response()->json([
            'status' => 'failed',
            'message' => 'Payment verification failed.',
        ], 400);
        
    } catch (\Exception $e) {
        Log::error("Payment Handling Error: " . $e->getMessage());
        return response()->json([
            'status' => 'error',
            'message' => 'Something went wrong during payment verification.',
        ], 500);
    }
}

    // public function handlePaymentStatus(Request $request)
    // {
    //     $paymentId = $request->input('razorpay_payment_id');

    //     $orderId = $request->input('razorpay_order_id');

    //     $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));
    //     $payment = $api->payment->fetch($paymentId);

    //     Log::info("Payment Verification:", ['status' => $payment->status, 'payment_id' => $paymentId]);

    //     $dbPayment = ChapterPayments::where('merchant_transaction_id', $orderId)->first();

    //     if ($payment->status === 'captured' && $dbPayment) {
    //         $dbPayment->update([
    //             'start_date' => Carbon::now()->toDateString(),
    //             'end_date' => Carbon::now()->addDays(30)->toDateString(),
    //             'payment_status' => 'completed',
    //             'status' => 'active',
    //         ]);
    //         return view('frontend.success', compact('payment', 'dbPayment'));
    //     }
    //     return view('frontend.success', compact('payment', 'dbPayment'));

    //     // return redirect('/payment/failure')->with('error', 'Payment status: ' . $payment->status);
    // }
}
