<?php

namespace App\Http\Controllers\mdd\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\mdd\dashboard\locationcontroller;
use Illuminate\Http\Request;
use App\Models\mdd\project;
use App\Models\mdd\properties;
use App\Models\mdd\costing;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class projectcontroller extends Controller
{
    protected $locations;

        public function __construct(locationcontroller $locations) {

        $this->locations = $locations;

    }
    public function index() {

        $project = $this->project_listing();
        return view('mdd.pages.dashboard.staff.project',['project'=>$project]);
    
    }

    public function get_project_info($id,$area) {

        $get_project = $this->project($id,$area);
        return view('mdd.pages.dashboard.staff.project_get_project_form',['get_project'=>$get_project]);

    }
    
    public function get_property_info($id,$area) {

        
        $get_project = $this->project($id,$area);

        $get_property_info = $this->property_info($id,$area);

        return view('mdd.pages.dashboard.staff.property_listing_info',['get_project'=>$get_project, 'get_property_info'=>$get_property_info]);

    }

    public function property_info($id,$area) {

        return project::join('properties','projects.id','properties.site_id')
                ->where('projects.id',$id)
                ->where('projects.area',$area)
                ->select('projects.*','properties.*')->get();
    }


    public function project($id,$area) {

        return project::join('location_provices','projects.province','location_provices.id')
                ->join('location_cities','projects.city','location_cities.id')
                ->join('location_baragays','projects.barangay','location_baragays.id')
                ->where('projects.id',$id)
                ->where('projects.area',$area)
                ->select('projects.*','location_provices.province as provinces','location_cities.city as cities','location_baragays.barangay as barangays')->first();
    }

    #################################################################################
    ############################## costing ##########################################
    #################################################################################

    public function get_costing($id) {

        $costing = costing::where('id',$id)->first(); 

        return response()->json($costing);
    }

    public function costing_index() {

        $costing_listing = $this->costing_listing();

        return view('mdd.pages.dashboard.staff.property_costing_index',['costing'=>$costing_listing]);
    }

    public function costing_listing() {

        return costing::all();
    }

    public function get_costingId() {

        $costing = costing::select('costings.id','costings.consting_title')->get();
        return response()->json($costing);
    }

    public function calculation() {

        return view('mdd.pages.dashboard.staff.property_calculation');
    }

    public function costing_submit(Request $request) {


        try {

            $request->validate(
                [
                    'the_costingid' => 'required|numeric',
                    'the_term_ent' => 'required|numeric',
                    'the_nomonths_term' => 'required|numeric',
                    'the_misc_inter' => 'required|numeric',
                    'the_misc_turn_ov' => 'required|numeric',
                    'the_discount_paid' => 'required|numeric',
                    'the_comm' => 'required|numeric',
                    'the_no_comm' => 'required|numeric',
                    'the_expanded_tax' => 'required|numeric',
                    'remark' => 'required'
                ],
                [
                    'the_costingid.required' => 'Somthing wrong with input value.',
                    'the_term_ent.required' => 'Somthing wrong with input value.',
                    'the_nomonths_term.required' => 'Somthing wrong with input value.',
                    'the_misc_inter.required' => 'Somthing wrong with input value.',
                    'the_misc_turn_ov.required' => 'Somthing wrong with input value.',
                    'the_discount_paid.required' => 'Somthing wrong with input value.',
                    'the_comm.required' => 'Somthing wrong with input value.',
                    'the_no_comm.required' => 'Somthing wrong with input value.',
                    'the_expanded_tax.required' => 'Somthing wrong with input value.',
                    'remark.required' => 'Somthing wrong with input value.',
                ]
            );


             costing::create([
                    'consting_title' => $request->the_costingid,
                    'term_interest' => floatval($request->the_term_ent) / 100,
                    'nomonths_term' => $request->the_nomonths_term,
                    'miscellaneous_interest' => floatval($request->the_misc_inter) / 100,
                    'miscellaneou_u_t_over' => floatval($request->the_misc_turn_ov) / 100,
                    'discount_f_paid' => floatval($request->the_discount_paid) / 100,
                    'agent_commission' => floatval($request->the_comm) / 100,
                    'no_month_commission' => $request->the_no_comm,
                    'expanded_htax' => floatval($request->the_expanded_tax) / 100,
                    'remarks' => $request->remark,
                    'status' => 100,
                    'user_id' => Auth::user()->id
                ]);

                return back()->with('success', 'New Property Costing successfully added!');

            } catch (\Exception $e) {

                 costing::create([
                    'consting_title' => $request->the_costingid,
                    'term_interest' => $request->the_term_ent,
                    'the_nomonths_term' => $request->the_nomonths_term,
                    'miscellaneous_interest' => $request->the_misc_inter,
                    'miscellaneou_u_t_over' => $request->the_misc_turn_ov,
                    'discount_f_paid' => $request->the_discount_paid,
                    'agent_commission' => $request->the_comm,
                    'no_month_commission' => $request->the_no_comm,
                    'expanded_htax' => $request->the_expanded_tax,
                    'remarks' => $request->remark,
                    'status' => 100,
                    'user_id' => Auth::user()->id
                ]);
            }
    }

    public function project_property_site(Request $request) {

        $id = $request->get('site');

         $properties = project::join('properties','projects.id','properties.site_id')
                ->where('projects.id',$id)
                 ->select('properties.block','properties.id')->get();
        return response()->json($properties);
    }

    public function project_propertylot_site(Request $request) {

        $id = $request->get('lotid');

        $properties = properties::where('properties.id',$id)
                ->select('properties.lot','properties.id')->get();
        return response()->json($properties);
    }

    public function project_property_areaPrice($id) {
        $properties = properties::where('properties.id',$id)
                ->select('properties.lot_area','properties.price','properties.id')->first();
        return response()->json($properties);
    }


    public function project_site($id) {

        $site = project::join('location_provices','projects.province','location_provices.id')
                ->join('location_cities','projects.city','location_cities.id')
                ->join('location_baragays','projects.barangay','location_baragays.id')
                ->where('projects.id',$id)
                ->select('projects.*','location_provices.province as provinces','location_cities.city as cities','location_baragays.barangay as barangays')->first();
        return response()->json($site);
    }
    
    public function project_listing() {

        $project_listing = project::join('location_provices','projects.province','location_provices.id')
                ->join('location_cities','projects.city','location_cities.id')
                ->join('location_baragays','projects.barangay','location_baragays.id')
                ->select('projects.*','location_provices.province as provinces','location_cities.city as cities','location_baragays.barangay as barangays')->get();

        return json_decode($project_listing);
    }

    public function project_form() {

        return view('mdd.pages.dashboard.staff.project_form');
    }

    public function project_store(Request $request) {

        try {

          // $request->validate(
          //       [
          //           'the_name' => 'required',
          //           'the_adress' => 'required',
          //           'the_longi' => 'required',
          //           'the_lati' => 'required',
          //           'provinceID' => 'required|numeric',
          //           'city' => 'required|numeric',
          //           'barangay' => 'required|numeric',
          //           'the_slug' => 'required',
          //           'the_images' => 'required',
          //       ],
          //       [
          //           'the_name.required' => 'Somthing wrong with input value.',
          //           'the_adress.required' => 'Somthing wrong with input value.',
          //           'the_longi.required' => 'Somthing wrong with input value.',
          //           'the_lati.required' => 'Somthing wrong with input value.',
          //           'provinceID.required' => 'Somthing wrong with input value.',
          //           'provinceID.numeric' => 'Somthing wrong with input value.',
          //           'city.required' => 'Somthing wrong with input value.',
          //           'city.numeric' => 'Somthing wrong with input value.',
          //           'barangay.required' => 'Somthing wrong with input value.',
          //           'barangay.numeric' => 'Somthing wrong with input value.',
          //           'the_slug.required' => 'Somthing wrong with input value.',
          //           'the_images.required' => 'Somthing wrong with input value.',
          //       ]
          //   );

          //   // if ($request->hasfile('the_images')) {
          //   //     foreach ($request->file('the_images') as $file) {
          //   //         $name = date('Ymd') . uniqid() . '.' . $file->getClientOriginalExtension();
          //   //         $file->move(public_path() . '/mdd/assets/images/project', $name);
          //   //         $imgData[] = $name;
          //   //     }


                $the_images = [];

                if ($request->hasFile('the_images')) {
                    foreach ($request->file('the_images') as $image) {
                        $filename = time() . '_' . $image->getClientOriginalName();
                        $image->move(public_path() . '/mdd/assets/images/project', $filename);
                        $the_images[] = $filename;
                    }
                }

                $the_name = $request->input('the_name');
                $the_address = $request->input('the_address');
                $the_longi = $request->input('the_longi');
                $the_lati = $request->input('the_lati');
                $provinceID = $request->input('provinceID');
                $city = $request->input('city');
                $barangay = $request->input('barangay');
                $the_slug = $request->input('the_slug');

                $image = json_encode($the_images);

                project::create([

                    'name' => $the_name,
                    'address' => $the_address,
                    'longitude' => $the_longi,
                    'latitude' => $the_lati,
                    'province' => $provinceID,
                    'city' => $city,
                    'barangay' => $barangay,
                    'area' => $the_slug,
                    'skitch_img' => $image
                    ]);


            return back()->with('success', 'New Project site successfully added!');


        } catch (\Exception $e) {

            abort(404);
        }
    }


    public function properties_store(Request $request) {

        try {

            $propertiesData = $request->input('properties');
            $the_site_id = $request->input('the_site_id');
            $ValNomonthsTerm = $request->input('ValNomonthsTerm');
            $the_term_ent = $request->input('the_term_ent');
            $the_misc_inter = $request->input('the_misc_inter');
            $the_misc_turn_ov = $request->input('the_misc_turn_ov');
            $the_discount_paid = $request->input('the_discount_paid');
            $the_comm = $request->input('the_comm');
            $the_no_comm = $request->input('the_no_comm');
            $the_expanded_tax = $request->input('the_expanded_tax');
            $remark = $request->input('remark');
            $praj_name = $request->input('praj_name');
            $the1stp = $request->input('the_1stp');
            $the2ndp = $request->input('the_2ndp');
            $the3rdp = $request->input('the_3rdp');


            foreach($propertiesData as $input) {

                if (in_array('', $input)) {
                    continue;
                 }

                $data = new properties;

                $data->block = $input['1'];
                $data->lot = $input['2'];
                $data->lot_area = $input['3'];
                $data->price = $input['4'];
                $data->prime = $input['5'];
                $data->site_id = $the_site_id;
                $data->term = substr($the_term_ent,0,-1);
                $data->months_term = $ValNomonthsTerm;
                $data->misc_interest = substr($the_misc_inter,0,-1);
                $data->misc_u_t_over = substr($the_misc_turn_ov,0,-1);
                $data->discount_f_paid = substr($the_discount_paid,0,-1);
                $data->agent_commi = substr($the_comm,0,-1);
                $data->no_month_commi = $the_no_comm;
                $data->expanded_htax = substr($the_expanded_tax,0,-1);
                $data->remarks = $remark;
                $data->price_one = $the1stp;
                $data->price_two = $the2ndp;
                $data->price_three = $the3rdp;
                $data->save();
            }

            $param = [$the_site_id,$praj_name];

            return redirect()->route('ms-get-property-info',$param)->with('success', 'New Property costing and details successfully added.');

        } catch (\Exception $e) {

            abort(404);
        }

    }
}



