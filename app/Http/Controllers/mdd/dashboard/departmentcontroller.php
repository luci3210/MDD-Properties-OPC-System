<?php

namespace App\Http\Controllers\mdd\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mdd\Department;
use App\Http\Controllers\mdd\dashboard\validateUser;
use Illuminate\Support\Facades\Auth;

class departmentcontroller extends Controller
{
    protected $validateUser;

    public function __construct(validateUser $validateUser) {

        $this->validateUser = $validateUser;

    }

    public function index() {

        $this->validateUser->validateDepartmentAdmin(Auth::user()->department);

        try {

            $department = Department::join('statuses', 'departments.status','=','statuses.id')->select('departments.*','statuses.name as status_name')->get();

            return view('mdd.pages.dashboard.manage_department.index',compact('department'));

         } catch (\Exception $e) {

            abort(404);
        }
    }

    public function edit($id) {

        $this->validateUser->validateDepartmentAdmin(Auth::user()->department);

        try {
            
        $department = Department::join('statuses', 'departments.status','=','statuses.id')
                ->where('departments.id',$id)->select('departments.*','statuses.name as status_name')->first();
        return response()->json(['status' => 200,'department' => $department]);

        } catch (\Exception $e) {

            abort(404);
        }
        
    }

    public function update(Request $request) {
            
        $this->validateUser->validateDepartmentAdmin(Auth::user()->department);

        try {

            $request->validate(
                [
                    'the_id' => 'required|numeric',
                    'the_department' => 'required',
                    'the_status' => 'required|numeric',
                ], 
                [
                    'the_id.required' => 'Somthing wrong with input value.',
                    'the_id.numeric' => 'Somthing wrong with input value.',
                    'the_department.required' => 'Somthing wrong with input value./Department',
                    'the_status.required' => 'Somthing wrong with input value./status',
                    'the_status.numeric' => 'Somthing wrong with input value./status',
                ]
            );
            
            $department = Department::findOrFail($request->the_id);

            $department->update([
                'department' => $request->the_department,
                'status' => $request->the_status,
                ]);
            
            return back()->with('success', 'Status details successfully updated.');

        } catch (\Exception $e) {

            abort(404);
        }
        
    }
    

    public function listing() {

            return $listing = Department::join('statuses', 'departments.status','=','statuses.id')
                ->select('departments.*','statuses.name as status_name')->get();
    }

    public function create(Request $request) {

        $this->validateUser->validateDepartmentAdmin(Auth::user()->department);

        try {

            $request->validate( [
                'the_department' => 'required',
                'the_code' => 'required|numeric',
                'the_status' => 'required|numeric'
            ],
            [
                'the_code.required' => 'Somthing wrong with input value.',
                'the_code.numeric' => 'Somthing wrong with input value.',
                'the_department.required' => 'Somthing wrong with input value./Department',
                'the_status.required' => 'Somthing wrong with input value./status',
                'the_status.numeric' => 'Somthing wrong with input value./status',
            ]);

            $x = Department::create([
                'department' => $request->the_department,
                    'did' => $request->the_code,
                        'status' => $request->the_status,
                ]);

            return back()->with('success', 'Details successfully Added.');

        } catch (\Exception $e) {

            abort(404);
        }
    }

}
