<?php

namespace App\Http\Controllers\mdd\ppauth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mdd\RegisterModel;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register() {
        return view('mdd.pages.pp_auth.registration');
    }

    public function register_submit(Request $request) {

        $input = [
            'fullname' => 'required|max:50',
            'department' => 'required|numeric',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:20'];

        $error = [
            'required' => '* Enter your :attribute', 
            'numeric'=>'invalid value :attribute',
            'email'=>'invalid email :attribute'];

        $this->validate($request, $input, $error);

        try {

        $insert = RegisterModel::firstOrCreate(
            [
                'name'=> $request->fullname,
                'department' => $request->department,
                'email' => $request->email,
                'password' =>  Hash::make($request->password),
                'status' => 1,
                ]
            );

        $notification = array(
            'success' => 'Account successfully created. Please wait while our Admin checking on it.',
            // 'error' => 'Please check your input carefully.'
        );

        return redirect()->route('private_register')->with($notification);

        } catch (\Exception $e) {

            return view('mdd.pages.error.404');

        }

    }
}
