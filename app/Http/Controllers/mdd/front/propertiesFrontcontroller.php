<?php

namespace App\Http\Controllers\mdd\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mdd\properties;
use App\Models\mdd\project;
use DB;

class propertiesFrontcontroller extends Controller
{

    public function propertiesIndex() {

        $project = project::where('projects.status',2)->select('projects.*')->groupBy('projects.id')->paginate(12);
        
        return view('mdd.front.properties',['project'=>$project]);
    }

    public function pricingIndex() {

        return view('mdd.front.pricing');
    }

    public function propertySelect($property) {

        try {

        // return $project = project::join('properties','projects.id','properties.site_id')
        //         ->where('projects.area',$property)
        //         ->select('projects.*',
        //             'properties.id as property_id','properties.block','properties.lot','properties.lot_area','properties.price','properties.prime'
        //         )->get();

        return properties::join('projects','properties.site_id','projects.id')
                    ->join('location_provices','location_provices.id','projects.province')
                    ->join('location_cities','location_cities.id','projects.city')
                    ->join('location_baragays','location_baragays.id','projects.barangay')
                ->where([['projects.area',$property],['projects.status',2],['properties.status',2]])
                ->select(
                        'properties.block',
                        'properties.lot',
                        'properties.lot_area',
                        'properties.price as sqm_price',
                        'properties.prime',
                        'properties.months_term',
                        'properties.remarks',
                        'properties.site_id',
                        'properties.id as property_id',

                        'location_provices.province',
                        'location_cities.city',
                        'location_baragays.barangay',

                        'projects.id as projectsid',
                        'projects.address',
                        'projects.area',
                        'projects.skitch_img',
                        'projects.name as projectName')->get();


        if(!$project || $project == null) {

            return view('mdd.front.404');

        }

        return view('mdd.front.properties_selected',['project'=>$project]);

        }  catch (\Exception $e) {

            return view('mdd.front.404');
        }

    }

    public function proprtyLotArea($name,$id) {

        try {

         $property = properties::join('projects','properties.site_id','projects.id')
                    ->join('location_provices','location_provices.id','projects.province')
                    ->join('location_cities','location_cities.id','projects.city')
                    ->join('location_baragays','location_baragays.id','projects.barangay')
                ->where([['projects.area',$name],['properties.id',$id],['projects.status',2],['properties.status',2]])
                ->select(DB::raw('(properties.price * properties.lot_area) AS lot_price'), 
                        DB::raw('(properties.price * properties.lot_area) * term AS term_amount'),
                        DB::raw('(properties.price * properties.lot_area) * misc_interest AS misc_interest_amount'),
                        DB::raw('(properties.price * properties.lot_area) * misc_u_t_over AS misc_u_t_over_amount'),
                        DB::raw('(properties.price * properties.lot_area) * discount_f_paid AS discount_f_paid_amount'),
                        DB::raw('(properties.price * properties.lot_area) * expanded_htax AS expanded_htax_amount'),

                        'properties.term as percent_term',
                        'properties.misc_interest as percent_misc_interest',
                        'properties.misc_u_t_over as percent_misc_u_t_over',
                        'properties.discount_f_paid as percent_discount_f_paid',
                        'properties.expanded_htax as percent_expanded_htax',
                        'properties.block',
                        'properties.lot',
                        'properties.lot_area',
                        'properties.price as sqm_price',
                        'properties.prime',
                        'properties.months_term',
                        'properties.remarks',
                        'properties.site_id',
                        'properties.id as property_id',
                        'properties.price_one',
                        'properties.price_two',
                        'properties.price_three',

                        'location_provices.province',
                        'location_cities.city',
                        'location_baragays.barangay',

                        'projects.id as projectsid',
                        'projects.address',
                        'projects.area',
                        'projects.skitch_img',
                        'projects.name as projectName')->first();

            if(!$property || $property == null) {

                return view('mdd.front.404');
            }

            return view('mdd.front.properties_lotarea',['property'=>$property]);


        }  catch (\Exception $e) {

            return view('mdd.front.404');
        }
    }

    public function propertiesLotAreaCosting(Request $request,$name,$siteid,$id) {


            $request->validate(
                [
                    'months' => 'required',
                    'agent' => 'required',
                ], 
                [
                    'months.required' => 'Something went wrong with your input!',
                    'agent.required' => 'Something went wrong with your input!',
                ]
            );

            $months = $request->months;
            $agent = $request->agent;

            $property = properties::join('projects','properties.site_id','projects.id')
                ->where([['projects.area',$name],['properties.site_id',$siteid],['properties.id',$id],['projects.status',2],['properties.status',2]])
                ->select(DB::raw('(properties.price * properties.lot_area) AS lot_price'), 
                        DB::raw('(properties.price * properties.lot_area) * term AS term_amount'),
                        DB::raw('(properties.price * properties.lot_area) * misc_interest AS misc_interest_amount'),
                        DB::raw('(properties.price * properties.lot_area) * misc_u_t_over AS misc_u_t_over_amount'),
                        DB::raw('(properties.price * properties.lot_area) * discount_f_paid AS discount_f_paid_amount'),
                        DB::raw('(properties.price * properties.lot_area) * expanded_htax AS expanded_htax_amount'),

                        'properties.term as percent_term',
                        'properties.misc_interest as percent_misc_interest',
                        'properties.misc_u_t_over as percent_misc_u_t_over',
                        'properties.discount_f_paid as percent_discount_f_paid',
                        'properties.expanded_htax as percent_expanded_htax',
                        'properties.block',
                        'properties.lot',
                        'properties.lot_area',
                        'properties.price as sqm_price',
                        'properties.prime',
                        'properties.months_term',
                        'properties.remarks',
                        'properties.site_id',
                        'properties.id as property_id',

                        'projects.id as projectsid',
                        'projects.address',
                        'projects.name as projectName')->first();

            return view('mdd.front.properties_costing',['property'=>$property,'months'=>$months,'agent'=>$agent]);
    }

    public function getPropertyInfo($id) {

         $json = properties::join('projects','properties.site_id','projects.id')
                ->where('properties.id',$id)
                ->select(DB::raw('(properties.price * properties.lot_area) AS lot_price'), 
                        DB::raw('(properties.price * properties.lot_area) * term AS term_amount'),
                        DB::raw('(properties.price * properties.lot_area) * misc_interest AS misc_interest_amount'),
                        DB::raw('(properties.price * properties.lot_area) * misc_u_t_over AS misc_u_t_over_amount'),
                        DB::raw('(properties.price * properties.lot_area) * discount_f_paid AS discount_f_paid_amount'),
                        DB::raw('(properties.price * properties.lot_area) * expanded_htax AS expanded_htax_amount'),

                        'properties.term as percent_term',
                        'properties.misc_interest as percent_misc_interest',
                        'properties.misc_u_t_over as percent_misc_u_t_over',
                        'properties.discount_f_paid as percent_discount_f_paid',
                        'properties.expanded_htax as percent_expanded_htax',
                        'properties.block',
                        'properties.lot',
                        'properties.lot_area',
                        'properties.price as sqm_price',
                        'properties.prime',
                        'properties.months_term',
                        'properties.remarks',
                        'properties.site_id',
                        'properties.id as property_id',

                        'projects.id as projectsid',
                        'projects.name as projectName')->first();

        return response()->json($json);
    }
}
