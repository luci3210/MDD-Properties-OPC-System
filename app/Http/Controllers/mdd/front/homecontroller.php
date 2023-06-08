<?php

namespace App\Http\Controllers\mdd\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class homecontroller extends Controller
{
    public function homeIndex() {
        
        return view('mdd.front.home');
    }

     public function aboutUsIndex() {
        
        return view('mdd.front.aboutus');
    }
}
