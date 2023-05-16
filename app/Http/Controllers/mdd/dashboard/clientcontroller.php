<?php

namespace App\Http\Controllers\mdd\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mdd\client;

class clientcontroller extends Controller
{
    
    public function client_index() {

        $clients = $this->client_listing();

         return view('mdd.pages.dashboard.client.client_index',['clients'=> $clients]);
    }

    public function client_exist($id) {

        return client::join('users','clients.user_id','users.id')->where('user_id',$id)->select('clients.*','users.*')->first();
    }

    public function client_id($id) {

        return client::join('location_provices','clients.province','location_provices.id')
                ->join('location_cities','clients.city','location_cities.id')
                ->join('location_baragays','clients.barangay','location_baragays.id')
                ->join('users','clients.user_id','users.id')
                ->where('clients.id',$id)
                ->select('clients.*','location_provices.province as provinces','location_cities.city as cities','location_baragays.barangay as barangays','users.phone_number','users.email')->first();
    }

    public function GetClientId($id) {

        return client::join('users','clients.user_id','users.id')
                ->where('clients.id',$id)->select('clients.id')->first();
    }


    public function client_listing() {

        return client::join('location_provices','clients.province','location_provices.id')
                ->join('location_cities','clients.city','location_cities.id')
                ->join('location_baragays','clients.barangay','location_baragays.id')
                ->join('users','clients.user_id','users.id')
                ->select('clients.*','location_provices.province as provinces','location_cities.city as cities','location_baragays.barangay as barangays','users.phone_number','users.email')->get();
    }


    public function client_name() {

        $name = client::select('clients.id','clients.fname','clients.lname','clients.mname')->get();

        return response()->json($name);

    }

    public function client_create(Request $request) {

        try {

              $request->validate(
                [
                    'the_fname' => 'required',
                    'the_lname' => 'required',
                    'the_mname' => 'required',
                    'the_ifmerried' => 'required',
                    'provinceID' => 'required',
                    'city' => 'required',
                    'barangay' => 'required',
                    'the_address' => 'required',
                    'the_bdate' => 'required',
                    'the_age' => 'required',
                    'the_bplace' => 'required',
                    'the_religion' => 'required',
                    'the_national' => 'required',
                    'the_civil_stat' => 'required',
                ],
                [
                    'the_fname.required' => 'Somthing wrong with input value.',
                    'the_lname.required' => 'Somthing wrong with input value.',
                    'the_mname.required' => 'Somthing wrong with input value.',
                    'the_ifmerried.required' => 'Somthing wrong with input value.',
                    'provinceID.required' => 'Somthing wrong with input value.',
                    'city.required' => 'Somthing wrong with input value.',
                    'barangay.required' => 'Somthing wrong with input value.',
                    'the_address.required' => 'Somthing wrong with input value.',
                    'the_bdate.required' => 'Somthing wrong with input value.',
                    'the_age.required' => 'Somthing wrong with input value.',
                    'the_bplace.required' => 'Somthing wrong with input value.',
                    'the_religion.required' => 'Somthing wrong with input value.',
                    'the_national.required' => 'Somthing wrong with input value.',
                    'the_civil_stat.required' => 'Somthing wrong with input value.',
                ]
            );


             client::create([
                'user_id' => 61,
                'fname' => $request->the_fname,
                'lname' => $request->the_lname,
                'mname' => $request->the_mname,
                'ifmarried' => $request->the_ifmerried,
                'address' => $request->the_address,
                'province' => $request->provinceID,
                'city' => $request->city,
                'barangay' => $request->barangay,
                'bdate' => $request->the_bdate,
                'age' => $request->the_age,
                'bplace' => $request->the_bplace,
                'religion' => $request->the_religion,
                'nationality' => $request->the_national,
                'cstatus' => $request->the_civil_stat
            ]);

            return back()->with('success', 'New status successfully save.');

        } catch (\Exception $e) {

            abort(404);

        }
    }
}
