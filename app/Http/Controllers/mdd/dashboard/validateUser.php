<?php

namespace App\Http\Controllers\mdd\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class validateUser extends Controller
{
    public function validateDepartmentAdmin($department) {

        if($department != 100) {

            abort(404);
        }

    }

    public function validateDepartmentFinance($department) {

        if($department != 200) {

            abort(404);
        }

    }

    public function validateDepartmentCasher($department) {

        if($department != 300) {

            abort(404);
        }

    }

    public function validateDepartmentSales($department) {

        if($department != 400) {

            abort(404);
        }

    }

    public function validateDepartmentITStaff($department) {

        if($department != 500) {

            abort(404);
        }

    }

    public function validateStatus($status) {
        
        return Auth::user()->status;
        
    }

    public function validateVerify() {
        
        return Auth::user()->email_verified_at;

    }
}
