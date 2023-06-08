<?php

namespace App\Http\Controllers\mdd\ppauth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthLoginController extends Controller
{
    

    public function login() {

          return view('mdd.pages.pp_auth.login');
    }

    public function attemp_login_validate() {

         return back()->with('status', 'Invalid username and password.');
    }

    public function login_validate(Request $request) {

        $this->validate(
            $request,
            [
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]
        );

        $email = User::where([['email',$request->email],['department',100],['status',1]])->first();

        if($email) {

            if($email->email_verified_at != NULL) {

                $user = Auth::attempt(['email' => $email->email, 'password' => $request->password]);
                
                if($user) {

                    $request->session()->regenerate();
                    return redirect()->route('mu.request-account-index');

                } else {

                     return back()->with('status', 'Invalid username and password.');
                }
                           

            } else {

                return back()->with('status', 'Invalid username and password.');
            }

        } else {

            return back()->with('status', 'Invalid username and password.');
        }

    }
}
