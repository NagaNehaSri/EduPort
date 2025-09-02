<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
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

        $merchantKey = env('PAYU_MERCHANT_KEY');
        $salt = env('PAYU_SALT');
        $baseUrl = env('PAYU_BASE_URL');

   
        $txnid = uniqid('txn_', true);

    
        $hashSequence = "$merchantKey|$txnid|{$validated['amount']}|Chapter Purchase|{$user->name}|{$validated['email']}|||||||||||$salt";
        $hash = strtolower(hash('sha512', $hashSequence));


        $payment = ChapterPayments::create([
            'merchant_transaction_id' => $txnid,
            'uid' => $uid,
            'chapter_id' => $validated['chapter_id'],
            'name' => $user->name,
            'email' => $validated['email'],
            'amount' => $validated['amount'],
            'start_date' => null, // Set after successful payment
            'end_date' => null,   // Set after successful payment
            'payment_status' => 'pending', 
            'transaction_id' => $txnid,
            'status' => 'pending',
        ]);

        Log::info('Pending Payment Details Saved:', $payment->toArray());

     
        $postData = [
            'key' => $merchantKey,
            'txnid' => $txnid,
            'amount' => $validated['amount'],
            'productinfo' => 'Chapter Purchase',
            'firstname' => $user->name,
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'surl' => route('payu.success'),
            'furl' => route('payu.failure'),
            'hash' => $hash,
        ];


        $redirectUrl = $baseUrl . '/_payment?' . http_build_query($postData);

        return response()->json(['redirect_url' => $redirectUrl], 200);
    }

    public function success(Request $request)
    {
    
        $response = $request->all();

        $merchantKey = env('PAYU_MERCHANT_KEY');
        $salt = env('PAYU_SALT');
        $hashSequence = "{$merchantKey}|{$response['status']}|{$response['unmappedstatus']}|{$response['txnid']}|{$response['amount']}|{$response['productinfo']}|{$response['firstname']}|{$response['email']}|||||||||||{$salt}";
        $expectedHash = strtolower(hash('sha512', $hashSequence));

        if ($response['hash'] !== $expectedHash) {
            Log::error('Invalid Hash in PayU Success Response:', $response);
            return redirect('/payment/failure')->with('error', 'Invalid response received from PayU.');
        }

        $payment = ChapterPayments::where('merchant_transaction_id', $response['txnid'])->first();
        if ($payment) {
            $payment->update([
                'start_date' => Carbon::now()->toDateString(),
                'end_date' => Carbon::now()->addDays(30)->toDateString(),
                'payment_status' => 'completed',
                'status' => 'active',
            ]);
        }

        return view('success', ['response' => $response]);
    }

    public function failure(Request $request)
    {
        // Handle failed payment response from PayU
        $response = $request->all();

        // Log the failure response
        Log::error('PayU Payment Failed:', $response);

        return view('failure', ['response' => $response]);
    }
}