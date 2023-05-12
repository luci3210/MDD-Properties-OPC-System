<?php

namespace App\Http\Controllers\mdd\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mdd\properties;

class propertycontroller extends Controller
{
    

    public function getPropertyInfo($id) {

         return properties::join('projects','properties.site_id','projects.id')
                ->where('properties.id',$id)
                ->select('properties.*','projects.id as projectsid','projects.name as projectName')->first();
    }

    public function getCounthMonth($month) {

        $month = properties::where('properties.term',$month)->select('properties.*')->first();

         return response()->json($month);
    }

    public function JsonPropertyId($id) {

        $json = properties::join('projects','properties.site_id','projects.id')
                ->where('properties.id',$id)
                ->select('properties.*','projects.id as projectsid','projects.name as projectName')->first();

        return response()->json($json);
    }


}
