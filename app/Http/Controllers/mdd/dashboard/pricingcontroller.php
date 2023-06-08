<?php

namespace App\Http\Controllers\mdd\dashboard;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class pricingcontroller extends Controller
{

    protected $validateUser;

        public function __construct(validateUser $validateUser) {

        $this->validateUser = $validateUser;

    }

    public function index() {

        $this->validateUser->validateDepartmentAdmin(Auth::user()->department);

        try {

            $project = app(projectcontroller::class);
            $project_listing = $project->project_listing();

            return view('mdd.pages.dashboard.pricing.index',['project'=> $project_listing]);

        } catch (\Exception $e) {

           abort(404);

        }

    }
}
