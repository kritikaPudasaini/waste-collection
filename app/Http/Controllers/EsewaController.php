<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use Carbon\Carbon;

use Illuminate\Http\Request;
// Init composer autoloader.
require '../vendor/autoload.php';

use RemoteMerge\Esewa\Client;
use RemoteMerge\Esewa\Config;

class EsewaController extends Controller
{
    public function esewaPay(Request $request,Payment $payment){
        $pid = uniqid();
        $amount = $payment->payment_amount;

        //set success and failure callback urls
        $successUrl = url('/esewa/success');
        $failureUrl = url('/esewa/failure');

        // Config for development.
        $config = new Config($successUrl, $failureUrl);

        // Config for production.
        // $config = new Config($successUrl, $failureUrl, 'b4e...e8c753...2c6e8b');

        // Initialize eSewa client.
        $esewa = new Client($config);

         // Save pid to the payment
        $payment->transaction_id = $pid;
        $payment->save();

        $esewa->process($pid, $amount, 0, 0, 0);


    }

    public function esewaPaySuccess(Request $request, Payment $payment)
    {
        // Handle payment success
        // oid is the esewa id after cancel request
        $payment = Payment::where('transaction_id', $request->oid)->first();
    
        if ($payment) {
            // Update the payment status
            $payment->status = 'completed';
            $payment->save();
        }

        return view('admin.payment.index',compact('payment')); // Assuming you have a success.blade.php view
    }

    public function esewaPayFailed(Request $request,Payment $payment)
    {
        // Log the request data for debugging
        \Log::info('Request Data:', $request->all());

        // Retrieve the payment using the pid returned by eSewa
        $payment = Payment::where('transaction_id', $request->oid)->first();
        
        if (is_null($payment)) {
            \Log::warning('Payment not found with transaction_id: ' . $request->oid);
        } else {
            \Log::info('Payment found: ', $payment->toArray());
        }
        
        if ($payment) {
            // Update the payment status
            $payment->status = 'failed';
            $payment->save();
        }

        return view('admin.payment.fail',compact('payment'));
    }


    //user esewa payment
    public function esewauserPay(Request $request,Payment $payment){
        // dd($request);
        $pid = uniqid();
        $amount = $payment->payment_amount;

        //set success and failure callback urls
        $successUrl = url('/success');
        $failureUrl = url('/failure');

        // Config for development.
        $config = new Config($successUrl, $failureUrl);

        // Config for production.
        // $config = new Config($successUrl, $failureUrl, 'b4e...e8c753...2c6e8b');

        // Initialize eSewa client.
        $esewa = new Client($config);
         // Save pid to the payment
         $payment->transaction_id = $pid;
         $payment->save();
 
        $esewa->process($pid, $amount, 0, 0, 0);
    }

    public function esewauserPaySuccess(Request $request, Payment $payment)
    {
        // Handle payment success
        $payment = Payment::where('transaction_id', $request->oid)->first();
    
        if ($payment) {
            // Update the payment status
            $payment->status = 'completed';
            $payment->save();
        }

        return view('dashboard.payment.index',compact('payment')); // Assuming you have a success.blade.php view
    }

    public function esewauserPayFailed(Request $request,Payment $payment)
    {
        // Retrieve the payment using the pid returned by eSewa
        $payment = Payment::where('transaction_id', $request->oid)->first();

        if ($payment) {
            // Update the payment status
            $payment->status = 'failed';
            $payment->save();
        }

        return view('dashboard.payment.fail',compact('payment'));
    }
}

