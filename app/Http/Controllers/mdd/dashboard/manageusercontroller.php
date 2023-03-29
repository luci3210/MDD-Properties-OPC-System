<?php

namespace App\Http\Controllers\mdd\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mdd\RegisterModel;
use App\Models\User;

class manageusercontroller extends Controller
{
    public function request_account() {

        $data = RegisterModel::all();
        return view('mdd.pages.dashboard.manage_user.request_account_index',compact('data'));
    }

    public function request_account_edit($id) {

        $data = RegisterModel::findOrFail($id);
        return view('mdd.pages.dashboard.manage_user.request_account_edit',compact('data'));   
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

                User::firstOrCreate([
                    'name' => $data->name,
                    'email' => $data->email,
                    'password' => $data->password,
                ]);

                 $notification = array(
                    'success' => 'Account successfully updated and please do advice to check the email to activate the account.',
                );

                return redirect()->route('mu.request-account-index')->with($notification);

            }
            else {
                return "sdsds";
            }
                
        } catch (\Exception $e) {

            return view('mdd.pages.error.404');
        }
    } 


}
