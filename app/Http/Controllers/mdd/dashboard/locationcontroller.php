<?php

namespace App\Http\Controllers\mdd\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class locationcontroller extends Controller
{
    protected $validateUser;

        public function __construct(validateUser $validateUser) {

        $this->validateUser = $validateUser;

    }

    public function locations() {

        $this->validateUser->validateDepartmentAdmin(Auth::user()->department);

        try {

        return view('mdd.pages.dashboard.staff.location');

        } catch (\Exception $e) {

            abort(404);
        }
    }
}
