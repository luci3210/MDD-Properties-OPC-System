<?php

namespace App\Http\Controllers\mdd\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendClientVerification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class iocontroller extends Controller
{
    public function register_create() {

        $page = "Register";
        // if (Auth()) {

        //     return redirect()->intended('/home');

        // } else {

            return view('mdd.front.register_create',['pageName'=> $page]);

        // }

    }

    public function login(Request $request) {

        // return Auth::user()->id;

        $page = "Login";
        return view('mdd.front.login',['pageName'=> $page]);

    }    

    public function login_attemp(Request $request) {

        $credentials = $request->validate([
            'email' => 'required|email',
                'password' => 'required',
            ]);


            $statusVerify = User::where([['email',$request->email],['email_verified_at', null]])->first();

            if($statusVerify) {

                return back()->with('message','Please check your e-mail and verify!');

                } 

            if (Auth::attempt($credentials)) {

                $request->session()->regenerate();
                return redirect()->intended('/home');

                }

        return back()->with('message','Invalid login credentials!! ');

    }

    public function register_submit(Request $request) {

        try {

            $request->validate(
                [
                    'f_name' => 'required',
                    'e_mail' => 'required',
                    'hintpassword' => 'required',
                    'confirm' => 'required|same:hintpassword'
                ], 
                [
                    'f_name.required' => 'Somthing wrong with input value.',
                    'e_mail.required' => 'Somthing wrong with input value.',
                    'hintpassword.required' => 'Somthing wrong with input value.',
                    'confirm.required' => 'Somthing wrong with input value.',
                ]
            );
            
            $email = User::where('users.email',$request->e_mail)->first();

            if($email) {

                return $email;

            } 

                $unique_number = random_int(10000000, 99999999);
        
                while (User::where('uqid', $unique_number)->exists()) {
        
                    $unique_number = random_int(10000000, 99999999);
        
                }
        
            $user = User::create([
                'uqid' => $unique_number,
                'department' => 3002,
                'name' => $request->f_name,
                'email' => $request->e_mail,
                'password' => Hash::make($request->hintpassword),
                'status' => 1,
            ]);

            Mail::to($user->email)->send(new SendClientVerification($user));

                return back()->with('success', 'Please check your email for verification.');


        } catch (\Exception $e) {

            abort(404);        

        }

    }

    public function verifyClient($id, $uqid) {

        $user = User::findOrFail($id);
        
        if ($user->email_verified_at) {
            return redirect('/home');
        }

        if ($user->uqid == $uqid) {

            $user->email_verified_at = now();
            $user->save();

            return redirect('home/login')->with('success', 'Your email has been verified!');

        } 

        else {

                return redirect('home/login')->with('error', 'Invalid verification link!');

            }

        }

    public function logout_attemp(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('home');
    }

}