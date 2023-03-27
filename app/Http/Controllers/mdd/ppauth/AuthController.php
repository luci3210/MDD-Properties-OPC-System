<?php

namespace App\Http\Controllers\mdd\ppauth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mdd\RegisterModel;

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
            'password' => 'required|min:32|max:64'];

        $error = [
            'required' => '* Enter your :attribute', 
            'numeric'=>'invalid value :attribute',
            'email'=>'invalid email :attribute'];

        $this->validate($request, $input, $error);

        return "sdd";
    }
}
