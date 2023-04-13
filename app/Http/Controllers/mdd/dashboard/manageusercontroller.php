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

class manageusercontroller extends Controller
{
    public function request_account(departmentcontroller $department) {

        try {

        $department = $department->listing();

        $data = DB::table('register_models')
            ->join('statuses', 'register_models.status','=','statuses.id')
            ->join('departments', 'register_models.department','=','departments.id')
            ->select('register_models.*','statuses.name as status_name','departments.department')->get();
        return view('mdd.pages.dashboard.manage_user.request_account_index',['data'=> $data,'department'=>$department]);

        } catch (\Exception $e) {

             return view('mdd.pages.error.404');
        }
    }

    public function request_account_edit($uqid) {

        try {

        $data = RegisterModel::join('departments', 'register_models.department','=','departments.id')
                    ->select('register_models.uqid','register_models.id','register_models.name','register_models.email','register_models.created_at','departments.department as dep_name')
                        ->where('register_models.uqid','=',$uqid)
                            ->where(function ($query) {
                            $query->from('register_models');
                         })->first();

        return view('mdd.pages.dashboard.manage_user.request_account_update',['data'=> $data]);

        // return response()->json(['status' => 200,'data' => $data]);  

        } catch (\Exception $e) {

             return view('mdd.pages.error.404');
        }
    }

    public function request_account_move(Request $request) { //save to user model

        try {

            $request->validate(
                [
                    'id' => 'required|numeric',
                    'department' => 'required|numeric'
                ],
                [
                    'department.required' => 'Invalid input value',
                    'department.numeric' => 'Invalid input value',
                    'id.required' => 'Invalid input value',
                    'id.numeric' => 'Invalid input value',
                ]
            );
            
            $data = RegisterModel::findOrFail($request->id);

            if($data) {


                $get = User::create([
                    'name' => $data->name,
                    'email' => $data->email,
                    'password' => $data->password,
                    'department' => $request->department,
                    'status' => 2,
                    'phone_number' => '123456789'
                ]);

                 $notification = array(
                    'success' => 'Account successfully updated and please do advice to check the email to activate the account.',
                );

                // UserDepatment::create([
                //     'user_id' => $get->id,
                //     'user_department_id' => $data->department,
                //     'atatus' => $data->status,
                // ]);

                return redirect()->route('mu.request-account-index')->with($notification);

            }
            
            else {
               
               return view('mdd.pages.error.404');

            }
                
        } catch (\Exception $e) {

            return view('mdd.pages.error.404');
        }
    } 


    public function request_account_delete(Request $request) {

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
            
            $check_id = RegisterModel::findOrFail($request->del_id);
            $check_id->delete();
            
            return back()->with('success', 'Account request successfully deleted.');

        } catch (\Exception $e) {

            return view('mdd.pages.error.404');
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
                ->join('statuses','departments.status','=','statuses.id')->select('users.id','users.name','users.email','users.department','users.status','users.phone_number','departments.department as department_name','statuses.id as status_id','statuses.name as status_name')
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
