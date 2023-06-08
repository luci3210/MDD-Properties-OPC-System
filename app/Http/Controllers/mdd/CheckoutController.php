<?php

namespace App\Http\Controllers\mdd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Xendit\Xendit;
// use App\Http\Services\Checkout\CheckoutService as Service;

class CheckoutController extends Controller
{


    public function index(Request $request) {

            Xendit::setApiKey(env('XENDIT_API_KEY'));
            
            $params = [
                'external_id' => 'MDD',
                'amount' => $request->input('amount'),
                'payer_email' => 'clarosjayson1988@gmail.com',
                'description' => 'Payment for Order #123',
                'success_redirect_url' => 'https://mdd-properties.com/success',
                'failure_redirect_url' => 'http://yourwebsite.com/failure',
            ];
            
            $invoice = \Xendit\Invoice::create($params);
            
            $paymentURL = $invoice['invoice_url']; 
     
            return response()->json(['redirectz_url' => $paymentURL]);

    }

    public function paySuccess() {

        return "asasa";
    }


}
