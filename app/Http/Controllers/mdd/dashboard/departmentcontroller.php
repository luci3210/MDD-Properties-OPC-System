<?php

namespace App\Http\Controllers\mdd\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mdd\Department;

class departmentcontroller extends Controller
{
    public function index() {

        $data = Department::all();
        return view('mdd.pages.dashboard.manage_department.index',compact('data'));
    }

}
