<?php

namespace App\Http\Controllers\mdd\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\mdd\dashboard\clientcontroller;
use App\Http\Controllers\mdd\dashboard\projectcontroller;
use App\Http\Controllers\mdd\dashboard\propertycontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class cashercontroller extends Controller
{
    
    protected $clientcontroller;
    protected $projectcontroller;
    protected $propertycontroller;

    public function __construct(clientcontroller $clientcontroller, projectcontroller $projectcontroller, propertycontroller $propertycontroller) {

        $this->clientcontroller = $clientcontroller;
        $this->projectcontroller = $projectcontroller;
        $this->propertycontroller = $propertycontroller;


    }

    public function pay() { 
        return view('mdd.pages.dashboard.casher.over_the_counter_form');
    }

    public function search_client_name(Request $request) {

        $id = $request->input('clientID');
        $client = $this->clientcontroller->client_id($id);
        return view('mdd.pages.dashboard.casher.pay_details_form',['client'=>$client]);
    }

    public function pay_method(Request $request) {

        $clientId = $request->input('client_id');
        $propertyId = $request->input('property_id');
        $monthPay = $request->input('the_month_pay');

        $clientInfo = $this->clientcontroller->client_id($clientId);
        $propertyInfo = $this->propertycontroller->getPropertyInfo($propertyId);

        $response = Http::get('https://api.exchangerate-api.com/v4/latest/USD');
        $exchangeRate = $response['rates']['PHP'];

        return view('mdd.pages.dashboard.casher.pay_cash_form',['client'=>$clientInfo,'property'=>$propertyInfo,'monthPay'=>$monthPay]);
    }


}
