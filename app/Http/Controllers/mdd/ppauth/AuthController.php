<?php

namespace App\Http\Controllers\mdd\ppauth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mdd\RegisterModel;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\mdd\dashboard\departmentcontroller;
use App\Http\Controllers\mdd\dashboard\generateuqid;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function staffVerifyEmail($id, $uqid) {

        $user = User::findOrFail($id);
        
        if ($user->email_verified_at) {
            return redirect('/home');
        }

        if ($user->uqid == $uqid) {

            $user->email_verified_at = now();
            $user->save();

            return redirect('/login')->with('success', 'Your email has been verified!');

        } 

        else {

                return redirect('/login')->with('error', 'Invalid verification link!');

            }

        }

    public function register(departmentcontroller $listing) {

        $department = $listing->listing();
        return view('mdd.pages.pp_auth.registration',['department'=> $department]);

    }

    public function register_submit(Request $request, generateuqid $reqid) {

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
                'uqid'=> $reqid->generateNine(),
                ]
            );

        $notification = array(
            'success' => 'Account successfully created. Please wait while our Admin checking on it.',
            // 'error' => 'Please check your input carefully.'
        );

        return redirect()->route('staff_register')->with($notification);

        } catch (\Exception $e) {

            return view('mdd.pages.error.404');

        }

    }
}
