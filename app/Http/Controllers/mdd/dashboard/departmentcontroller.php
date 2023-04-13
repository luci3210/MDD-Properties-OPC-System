<?php

namespace App\Http\Controllers\mdd\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mdd\Department;
use DB;

class departmentcontroller extends Controller
{
    public function index($id='') {

        $data = DB::table('departments')
            ->join('statuses', 'departments.status','=','statuses.id')->select('departments.*','statuses.name')->get();

        $department = $this->listing();

        return view('mdd.pages.dashboard.manage_department.index',compact('data','department'));
    }

    public function listing() {

        try {

            return $listing = Department::join('statuses', 'departments.status','=','statuses.id')
                ->where('statuses.name','=','Active')->select('departments.department','departments.id as ids','statuses.name')->get();

        } catch (\Exception $e) {

             return view('mdd.pages.error.404');
        }
    }

    public function form_submit(Request $request) {
            
            $input = [
            'department' => 'required|max:50',
            'description' => 'required',
            'icon' => 'required',
            'status' => 'required|min:1|max:2'];

            $error = ['required' => '* Enter your :attribute'];

            $this->validate($request, $input, $error);

        try {

            Department::create([
                'department' => $request->department,
                    'description' => $request->description,
                        'icon' => $request->icon,
                            'status' => $request->status,
                ]);

             $notification = array(
                'success' => "Information successfully save!",
            );

            return redirect()->route('manage-department-index')->with($notification);

        } catch (\Exception $e) {

             return view('mdd.pages.error.404');
        }
    }

    public function edit() {
        return "sdsd";
    }

    public function update() {
        return "sdsd";
    }

    public function delete() {
        return "sdsd";
    }



}
