<?php

namespace App\Http\Controllers\mdd\dashboard;

use App\Http\Controllers\mdd\dashboard\validateUser;
use Yajra\DataTables\Facades\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mdd\Status;
use App\Models\mdd\auditing;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class statuscontroller extends Controller
{

    protected $validateUser;

    public function __construct(validateUser $validateUser) {

        $this->validateUser = $validateUser;
    }

    public function index() {

        try {

        $statuses = $this->status_listing();
        return view('mdd.pages.dashboard.manage_status.index',compact('statuses'));

        } catch (\Exception $e) {

            abort(404);
        }
    }

    public function status_form_edit($id) {

        $statuses = Status::findOrFail($id);
        return response()->json(['status' => 200,'statuses' => $statuses]);
    }

    public function status_form_create(Request $request) {

        try {
            $request->validate(
                [
                    'stat_name' => 'required',
                    'stat_desc' => 'required',
                ], 
                [
                    'stat_name.required' => 'Name is required',
                    'stat_desc.required' => 'description is required',
                ]
            );
            
            Status::firstOrCreate([
                'name' => $request->stat_name,
                'description' => $request->stat_desc,
                'status' => 'active'
            ]);

            return back()->with('success', 'New status successfully save.');

        } catch (\Exception $e) {

             return view('mdd.pages.error.404');
        }
    }

    public function status_form_update(Request $request) {

        try {

            $request->validate(
                [
                    'the_id' => 'required|numeric',
                    'the_name' => 'required',
                    'the_description' => 'required',
                ], 
                [
                    'the_id.required' => 'Somthing wrong with input value.',
                    'the_id.numeric' => 'Somthing wrong with input value.',
                    'the_name.required' => 'Somthing wrong with input value.',
                    'the_description.required' => 'Somthing wrong with input value.',
                ]
            );
            
            $check_id = Status::findOrFail($request->the_id);
            $check_id->update([
                'name' => $request->the_name,
                'description' => $request->the_description,
                'status' => 'deleted'
                ]);
            
            return back()->with('success', 'Status details successfully updated.');

        } catch (\Exception $e) {

            return view('mdd.pages.error.404');
        }
    }

    public function status_form_delete(Request $request) {

        try {

            $request->validate(
                [
                    'del_id' => 'required|numeric',
                    'del_status' => 'required'
                ], 
                [
                    'del_id.required' => 'Somthing wrong with input value.',
                    'del_id.numeric' => 'Somthing wrong with input value.',
                    'del_status.required' => 'Somthing wrong with input value.'
                ]
            );
            
            $check_id = Status::findOrFail($request->del_id);
            $check_id->update([
                'status' => 'deleted'
                ]);
            
            return back()->with('success', 'Status successfully deleted.');

        } catch (\Exception $e) {

            return view('mdd.pages.error.404');
        }
    }

    public function status_listing() {

            return $listing = Status::all();
    }
}
