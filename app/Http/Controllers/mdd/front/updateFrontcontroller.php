<?php

namespace App\Http\Controllers\mdd\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mdd\client;
use Illuminate\Support\Facades\Auth;

class updateFrontcontroller extends Controller
{
    public function myCredential(Request $request){

         try {

            $request->validate(
                [
                    'the_id'=>'required',
                    'the_fname'=>'required',
                    'the_lname'=>'required',
                    'the_mname'=>'required',
                    'the_address'=>'required',
                    'the_ifmarriege'=>'required',
                    'the_bdate'=>'required',
                    'the_age'=>'required',
                    'the_pbirth'=>'required',
                    'the_religion'=>'required',
                    'the_nationality'=>'required',
                ], 
                [
                    'the_id.required' => 'Somthing wrong with input value.',
                    'the_fname.required' => 'Somthing wrong with input value.',
                    'the_lname.required' => 'Somthing wrong with input value.',
                    'the_mname.required' => 'Somthing wrong with input value.',
                    'the_address.required' => 'Somthing wrong with input value.',
                    'the_ifmarriege.required' => 'Somthing wrong with input value.',
                    'the_bdate.required' => 'Somthing wrong with input value.',
                    'the_age.required' => 'Somthing wrong with input value.',
                    'the_pbirth.required' => 'Somthing wrong with input value.',
                    'the_religion.required' => 'Somthing wrong with input value.',
                    'the_nationality.required' => 'Somthing wrong with input value.',
                ]
            );
            
            $client = client::where([['clients.user_id',Auth::id()],['clients.id',$request->the_id]])->first();

            if($client){

                $client->update([
                'fname' => $request->the_fname,
                'lname' => $request->the_lname,
                'mname' => $request->the_mname,
                'ifmarried' => $request->the_ifmarriege,
                'address' => $request->the_address,
                'bdate' => $request->the_bdate,
                'age' => $request->the_age,
                'bplace' => $request->the_pbirth,
                'religion' => $request->the_religion,
                'nationality' => $request->the_nationality
                ]);

                return back()->with('success', 'Credential successfully updated!');
            }

        return back()->with('failed', 'Sorry were not able to update your credential at this moment.');


        } catch (\Exception $e) {
            abort(404);
        }

    }
}
