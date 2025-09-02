<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon; 
use App\Models\ChapterPayments; 
use App\Models\Signup;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'amount' => 'required|numeric',
            'chapter_id' => 'required',
            'card_number' => 'required|string',
            'expiry_date' => 'required|string',
            'cvv' => 'required|string',
        ]);

      
        $startDate = Carbon::now()->toDateString(); 
        $endDate = Carbon::now()->addDays(30)->toDateString(); 

   
        $paymentStatus = 'active';
        $uid=Session('uid');
        $username=Signup::where('uid',$uid)->first();

   
        $payment = ChapterPayments::create([


            'merchant_transaction_id' => uniqid('txn_', true),
            'uid' => $uid, 
            'chapter_id' => $data['chapter_id'], 
            'name'=> $username->name, 
            'email' => $username->email, 
            'amount' => $data['amount'],
 
            'start_date' => $startDate,
            'end_date' => $endDate,
            'payment_status' => $paymentStatus,
            'transaction_id' => uniqid('txn_', true), 
            'status' => $paymentStatus,
        ]);


        Log::info('Payment Details Saved:', $payment->toArray());

        return response()->json([
            'message' => 'Payment processed successfully!',
            'data' => [
                'transaction_id' => $payment->transaction_id,
                'amount' => $payment->amount,
                'start_date' => $payment->start_date,
                'end_date' => $payment->end_date,
                'status' => $payment->status,
            ],
        ], 200);
    }
}