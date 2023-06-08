<?php

namespace App\Http\Controllers\mdd\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class authusercontroller extends Controller
{
    public function validateStatus($id) {

        return User::where([['id'=> Auth::user()->id],['status'=> 1]])->first();
    }
}
