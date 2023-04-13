<?php

namespace App\Http\Controllers\mdd\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendStaffVerification;

class myemailcontroller extends Controller
{
    public function sendEmail() {

        $recipient = "jayson.claros@gmail.com";
        
                Mail::to($recipient)->send(new SendStaffVerification());

        return redirect()->back();
    
    }
}
