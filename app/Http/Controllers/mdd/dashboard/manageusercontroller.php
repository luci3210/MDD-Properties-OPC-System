<?php

namespace App\Http\Controllers\mdd\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mdd\RegisterModel;

class manageusercontroller extends Controller
{
    public function request_account() {

        $data = RegisterModel::all();
        return view('mdd.pages.dashboard.manage_user.request_account_index',compact('data'));
    }

    public function request_account_edit($id) {

        $data = new RegisterModel();
        $datails = $data->where('id', $id);

        return view('mdd.pages.dashboard.manage_user.request_account_edit',compact('datails'));   
    } 
}
