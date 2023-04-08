<?php

namespace App\Http\Controllers\mdd\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mdd\RegisterModel;
use App\Models\mdd\UserDepatment;
use App\Models\User;
use App\Models\mdd\Status;
use DB;

class manageusercontroller extends Controller
{
    public function request_account() {

        try {
        $department = DB::table('departments')->select('department','id')->where('status',1)->get();

        $data = DB::table('register_models')
            ->join('statuses', 'register_models.status','=','statuses.id')
            ->join('departments', 'register_models.department','=','departments.id')
            ->select('register_models.*','statuses.name as status_name','departments.department')->get();
        return view('mdd.pages.dashboard.manage_user.request_account_index',['data'=> $data,'department'=>$department]);

        } catch (\Exception $e) {

             return view('mdd.pages.error.404');
        }
    }

    public function request_account_edit($id) {

        try {

        $data = RegisterModel::join('departments', 'register_models.department','=','departments.id')
                    ->select('register_models.id','register_models.name','register_models.email','register_models.created_at','departments.department as dep_name')
                        ->where('register_models.id','=',$id)
                            ->where(function ($query) {
                            $query->from('register_models');
                         })->first();

        return response()->json(['status' => 200,'data' => $data]);  

        } catch (\Exception $e) {

             return view('mdd.pages.error.404');
        }
    }

    public function request_account_move(Request $request, $id) { //save to user model

        $input = [
            'fullname' => 'required|max:50',
            'department' => 'required|numeric',
            'email' => 'required|email|unique:users,email',
            'status' => 'required|min:1|max:2'];

        $error = [
            'required' => '* Enter your :attribute', 
            'numeric'=>'invalid value :attribute',
            'email'=>'invalid email :attribute'];

        $this->validate($request, $input, $error);

        try {
            
            $data = RegisterModel::findOrFail($id);

            if($data) {

                $get = User::firstOrCreate([
                    'name' => $data->name,
                    'email' => $data->email,
                    'password' => $data->password,
                ]);

                 $notification = array(
                    'success' => 'Account successfully updated and please do advice to check the email to activate the account.',
                );

                UserDepatment::create([
                    'user_id' => $get->id,
                    'user_department_id' => $data->department,
                    'atatus' => $data->status,
                ]);

                return redirect()->route('mu.request-account-index')->with($notification);

            }
            else {
                return "sdsds";
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

    public function user_index() {

        $users = User::join('departments','users.department','=','departments.id')
                ->join('statuses','departments.status','=','statuses.id')->select('users.id','users.name','users.email','users.department','users.status','users.phone_number','departments.department as department_name','statuses.name as status_name')
                    ->where(function ($query) {
                        $query->from('users');
                             })->get(); 

        return view('mdd.pages.dashboard.manage_user.user_list',['user'=>$users]);
    }


}
