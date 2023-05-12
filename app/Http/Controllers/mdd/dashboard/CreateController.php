<?php

namespace App\Http\Controllers\mdd\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mdd\properties;
use App\Models\mdd\payment;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function pay(Request $request) {

        try {

            $request->validate(
                [
                    'amount' => 'required',
                    'month' => 'required',
                    'client' => 'required',
                    'property' => 'required'
                ], 
                [
                    'amount.required' => 'Somthing wrong with input value.',
                    'month.required' => 'Somthing wrong with input value.',
                    'client.required' => 'Somthing wrong with input value.',
                    'property.required' => 'Somthing wrong with input value.'
                ]
            );


            payment::create([
                    'payid' => 12345678,
                    'amount' => $request->amount,
                    'term_months_pay' => $request->month,
                    'clientid' => $request->client,
                    'propertyid' => $request->property,
                    'casherid' => Auth::user()->id
                ]);

                return back()->with('success', 'Payment successfully save');
            
            

        } catch (\Exception $e) {

            abort(404);
        }
    }
}
