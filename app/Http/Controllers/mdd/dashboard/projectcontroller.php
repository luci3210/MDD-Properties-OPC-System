<?php

namespace App\Http\Controllers\mdd\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\mdd\dashboard\locationcontroller;
use Illuminate\Http\Request;

class projectcontroller extends Controller
{
    protected $locations;

        public function __construct(locationcontroller $locations) {

        $this->locations = $locations;

    }
    public function project() {

        $project[] = null;

        return view('mdd.pages.dashboard.staff.project',['project'=>$project]);
    
    }

    public function project_form() {

        $provices = $this->locations->location_provinces();

        return view('mdd.pages.dashboard.staff.project_form',['provices'=>$provices]);
    
    }


}
