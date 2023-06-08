<?php

namespace App\Http\Controllers\mdd\public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PubhomeController extends Controller
{
    public function index() {
        return view('mdd.pages.mdd.index');
    }
}
