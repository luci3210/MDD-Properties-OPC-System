<?php

namespace App\Http\Controllers\mdd\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class manageusercontroller extends Controller
{
    public function request_account() {

        return view('mdd.pages.dashboard.manage_user.request_account_index');
    }
}
