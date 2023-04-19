<?php

namespace App\Http\Controllers\mdd\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class projectcontroller extends Controller
{
    public function project() {
        return view('mdd.pages.dashboard.staff.project');
    }
}
