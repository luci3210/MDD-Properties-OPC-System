<?php

namespace App\Http\Controllers\mdd\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mdd\properties;

class UpdateController extends Controller
{
    public function updatePropertY(Request $request) {

        try {

            $request->validate(
                [
                    'the_id' => 'required',
                    'the_block' => 'required',
                    'the_lot' => 'required',
                    'the_area' => 'required',
                    'the_price' => 'required',
                    'the_lotclass' => 'required',
                    'the_term' => 'required',
                    'the_micsInterest' => 'required',
                    'the_micsMonth' => 'required',
                    'the_UTO' => 'required',
                    'the_comm' => 'required',
                    'the_commMonth' => 'required',
                    'the_tax' => 'required',
                    'status' => 'required',
                    'remark' => 'required',
                ], 
                [
                    'the_block.required' => 'Somthing wrong with input value.',
                    'the_lot.required' => 'Somthing wrong with input value.',
                    'the_area.required' => 'Somthing wrong with input value.',
                    'the_price.required' => 'Somthing wrong with input value.',
                    'the_lotclass.required' => 'Somthing wrong with input value.',
                    'the_term.required' => 'Somthing wrong with input value.',
                    'the_micsInterest.required' => 'Somthing wrong with input value.',
                    'the_micsMonth.required' => 'Somthing wrong with input value.',
                    'the_UTO.required' => 'Somthing wrong with input value.',
                    'the_comm.required' => 'Somthing wrong with input value.',
                    'the_commMonth.required' => 'Somthing wrong with input value.',
                    'the_tax.required' => 'Somthing wrong with input value.',
                    'status.required' => 'Somthing wrong with input value.',
                    'remark.required' => 'Somthing wrong with input value.',
                ]
            );
            
            $properties = properties::findOrFail($request->the_id);

            $properties->update([
                'block' => $request->the_block,
                'status' => $request->status,
                ]);

            return back()->with('success', 'Property costing successfully updated.');

        } catch (\Exception $e) {

            abort(404);
        }
    }
}
