<?php

namespace App\Http\Controllers\mdd\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mdd\RegisterModel;
use App\Models\mdd\UserDepatment;
use App\Models\User;
use App\Models\mdd\Status;
use DB;
use App\Http\Controllers\mdd\dashboard\departmentcontroller;
use App\Http\Controllers\mdd\dashboard\generateuqid;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendStaffVerification;
use App\Http\Controllers\mdd\dashboard\validateUser;
use Illuminate\Support\Facades\Auth;

class manageusercontroller extends Controller
{

    protected $validateUser;

    public function __construct(validateUser $validateUser) {

        $this->validateUser = $validateUser;

    }

    public function request_account(departmentcontroller $department) {

        $this->validateUser->validateDepartmentAdmin(Auth::user()->department);

        try {

        $department = $department->listing();

        $data = DB::table('register_models')
            ->join('statuses', 'register_models.status','=','statuses.id')
            ->join('departments', 'register_models.department','=','departments.id')
            ->select('register_models.*','statuses.name as status_name','departments.department')->get();

        return view('mdd.pages.dashboard.manage_user.request_account_index',['data'=> $data,'department'=>$department]);

        } catch (\Exception $e) {

            abort(404);
        }
    }

    public function edit_request_account($id) {

        $this->validateUser->validateDepartmentAdmin(Auth::user()->department);

        try {

        $user_request = RegisterModel::join('departments', 'register_models.department','=','departments.id')
                    ->where('register_models.id',$id)
                    ->select('register_models.name',
                                'register_models.id',
                                'register_models.email',
                                'register_models.created_at',
                                'departments.department as department_name')->first();

        return response()->json(['status' => 200,'user_request' => $user_request]);

        } catch (\Exception $e) {

            abort(404);
        }
    }

    public function request_account_move(Request $request, generateuqid $reqid) { //save to user model

        $this->validateUser->validateDepartmentAdmin(Auth::user()->department);

        try {

            $request->validate(
                [
                    'the_id' => 'required|numeric',
                    'the_department' => 'required|numeric'
                ],
                [
                    'the_id.required' => 'Somthing wrong with input value.',
                    'the_id.numeric' => 'Somthing wrong with input value.',
                    'the_department.required' => 'Somthing wrong with input value.',
                    'the_department.numeric' => 'Somthing wrong with input value.'
                ]
            );
          
            $request_account = RegisterModel::findOrFail($request->the_id);
         
                $user = User::create([
                    'name' => $request_account->name,
                    'email' => $request_account->email,
                    'password' => $request_account->password,
                    'department' => $request->the_department,
                    'status' => 2,
                    'phone_number' => '123456789',
                    'uqid' => $reqid->generateNine()
                ]);

                Mail::to($user->email)->send(new SendStaffVerification($user));
                
                RegisterModel::where('id',$request->the_id)->delete();

                return back()->with('success', 'Account successfully created and please do advice to check the email to activate the account.');

                
        } catch (\Exception $e) {

            abort(404);
        }
    } 

    public function request_account_delete(Request $request) {

        $this->validateUser->validateDepartmentAdmin(Auth::user()->department);

        try {

            $request->validate(
                [
                    'del_id' => 'required|numeric',
                ], 
                [
                    'del_id.required' => 'Somthing wrong with input value.',
                    'del_id.numeric' => 'Somthing wrong with input value.',
                ]
            );
            
            $account = RegisterModel::findOrFail($request->del_id);
            $account->delete();
            
            return back()->with('success', 'Account successfully deleted.');

        } catch (\Exception $e) {

           abort(404);
        }
    }

    public function the_status() {

            return Status::all();
    }

    public function the_department() {

        return UserDepatment::all();
    }

    public function user_index() {

        $theStatus = $this->the_status();
        $theDepartment = $this->the_department();

        $users = User::join('departments','users.department','=','departments.id')
                ->join('statuses','departments.status','=','statuses.id')->select('users.id','users.name','users.email','users.uqid','users.department','users.status','users.phone_number','departments.department as department_name','statuses.id as status_id','statuses.name as status_name')
                    ->where(function ($query) {
                        $query->from('users');
                             })->get(); 

        return view('mdd.pages.dashboard.manage_user.user_list',['user'=>$users, 'theDepartment'=>$theDepartment,'theStatus'=>$theStatus]);
    }

    public function user_edit($id) {

        $users = User::join('departments','users.department','=','departments.id')
                ->join('statuses','departments.status','=','statuses.id')->select('users.id','users.name','users.email','users.department','users.status','users.phone_number','departments.department as department_name','statuses.id as status_id','statuses.name as status_name')
                    ->where('users.id','=',$id)
                    ->where(function ($query) {
                        $query->from('users');
                             })->first(); 

        return response()->json(['status' => 200,'data' => $users]);  
    }
}
