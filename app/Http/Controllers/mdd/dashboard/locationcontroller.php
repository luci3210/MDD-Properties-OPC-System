<?php

namespace App\Http\Controllers\mdd\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\mdd\locationProvice;
use App\Http\Controllers\mdd\dashboard\statuscontroller;

class locationcontroller extends Controller
{
    protected $validateUser;

        public function __construct(validateUser $validateUser) {

        $this->validateUser = $validateUser;

    }

    public function locations(statuscontroller $status) {

        $this->validateUser->validateDepartmentAdmin(Auth::user()->department);

        try {

        $status_list = $status->status_listing();
        $provice_list  = $this->location_provinces();

        return view('mdd.pages.dashboard.staff.location',['status_list'=>$status_list,'provice_list'=>$provice_list]);

        } catch (\Exception $e) {

            abort(404);
        }
    }

    public function locations_new(Request $request) {

        $this->validateUser->validateDepartmentAdmin(Auth::user()->department);

        try {

          $request->validate(
                [
                    'the_province' => 'required',
                    'the_status' => 'required|numeric',
                ],
                [
                    'the_province.required' => 'Somthing wrong with input value.',
                    'the_status.required' => 'Somthing wrong with input value.',
                    'the_status.numeric' => 'Somthing wrong with input value.',
                ]
            );
          
            locationProvice::create([
                    'province' => $request->the_province,
                    'status' => $request->the_status,
                ]);
            
            return back()->with('success', 'Provice successfully created!');


        } catch (\Exception $e) {

            abort(404);
        }

    }

    public function locations_edit($id) {
        $provice = $this->location_province($id);
        return response()->json(['status' => 200,'provice' => $provice]);
    }

    public function location_provinces_delete($id) {
        $provice = $this->location_province($id);
        return response()->json(['status' => 200,'provice' => $provice]);
    }

    public function location_provinces_update(Request $request) {

        $this->validateUser->validateDepartmentAdmin(Auth::user()->department);

        try {

            $request->validate(
                [
                    'the_edit_id' => 'required|numeric',
                    'the_edit_province' => 'required',
                    'the_edit_status' => 'required|numeric',
                ], 
                [
                    'the_edit_id.required' => 'Somthing wrong with input value.',
                    'the_edit_id.numeric' => 'Somthing wrong with input value.',
                    'the_edit_province.required' => 'Somthing wrong with input value.',
                    'the_edit_status.required' => 'Somthing wrong with input value.',
                    'the_edit_status.numeric' => 'Somthing wrong with input value.',
                ]
            );
            
            $check_id = locationProvice::findOrFail($request->the_edit_id);
            $check_id->update([
                'province' => $request->the_edit_province,
                'status' => $request->the_edit_status,
                ]);
            
            return back()->with('success', 'Provice details successfully updated.');

        } catch (\Exception $e) {

            abort(404);
        }

    }

    public function location_provinces_deleted(Request $request) {

        $this->validateUser->validateDepartmentAdmin(Auth::user()->department);

        try {

            $request->validate(
                [
                    'the_delete_id' => 'required|numeric',
                ], 
                [
                    'the_delete_id.required' => 'Somthing wrong with input value.',
                    'the_delete_id.numeric' => 'Somthing wrong with input value.',
                ]
            );
            
            $check_id = locationProvice::findOrFail($request->the_delete_id);
            $check_id->update([
                'status' => 6,
                ]);
            
            return back()->with('deleted', 'Provice information successfully deleted.');

        } catch (\Exception $e) {

            abort(404);
        }

    }




    public function location_provinces() {

        return locationProvice::join('statuses','location_provices.status','statuses.id')->where('location_provices.status','!=',6)->select('location_provices.id','location_provices.province','statuses.name')->get();
    }

    public function location_province($id) {

        return locationProvice::join('statuses','location_provices.status','statuses.id')->where('location_provices.id',$id)->select('location_provices.id','location_provices.province','statuses.name')->first();
    }
}
