<?php

namespace App\Http\Controllers\mdd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Curl;

class PaymentController extends Controller
{
    public function pay()
    {
  $data = [
            'data' => [
                'attributes' => [
                    'line_items' => [
                        [
                            'currency'      => 'PHP',
                            'amount'        => 2000,
                            'description'   => 'asasasassas',
                            'name'          => 'Test Product',
                            'quantity'      => 4,
                        ]
                    ],
                    'payment_method_types' => [
                        'card',
                        'gcash',
                        'dob',
                        'dob_ubp',
                    ],
                    'send_email_receipt'=> true,
                    // 'success_url' => 'http://localhost:8000/success',
                    'cancel_url' => 'http://localhost:8000/success',
                    'description' => 'text'
                ],
            ]
       ];


$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.paymongo.com/v1/checkout_sessions",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
   CURLOPT_POSTFIELDS => $data,
  CURLOPT_HTTPHEADER => [
    "Content-Type: application/json",
    "accept: application/json",
    "authorization: Basic c2tfdGVzdF9wSmRiaEdXU2hjSFRmMmVNNER3M2g3Y0U=",
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  return "cURL Error #:" . $err;
} else {
      return $response;
}


     
       // $response = Curl::to('https://api.paymongo.com/v1/checkout_sessions')
       //              ->withHeader('Content-Type: application/json')
       //              ->withHeader('accept: application/json')
       //              ->withHeader('Authorization: Basic '.env('AUTH_PAY'))
       //              ->withData($data)
       //              ->asJson()
       //              ->post();

       //  return $response;

        // \Session::put('session_id',$response->data->id);

         //return redirect()->to($response->data->attributes->checkout_url);
    }

     public function success()
    {
       $sessionId = \Session::get('session_id');


      $response = Curl::to('https://api.paymongo.com/v1/checkout_sessions/'.$sessionId)
                ->withHeader('accept: application/json')
                ->withHeader('Authorization: Basic '.env('AUTH_PAY'))
                ->asJson()
                ->get();

        dd($response);

    }
}
