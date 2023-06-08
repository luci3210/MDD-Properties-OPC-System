<?php

namespace App\Http\Controllers\mdd\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mdd\client;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\mdd\dashboard\clientcontroller;

class accountcontroller extends Controller
{
    protected $clientcontroller;

    public function __construct(clientcontroller $clientcontroller) {

        $this->clientcontroller = $clientcontroller;

    }

    public function credential() {

        $Client = $this->clientcontroller->client_exist(Auth::user()->id);

        return view('mdd.front.mycredential',['Client'=> $Client]);
    }

    public function getCredential($id) {

        $ClientCreds = client::join('users','clients.user_id','users.id')
                ->where('clients.id',$id)
                ->select('clients.id as cid','clients.user_id','clients.fname','clients.lname','clients.mname','clients.address','clients.age','clients.bdate','clients.ifmarried','clients.bplace','clients.religion','clients.nationality','users.email','users.uqid','users.id')->first();

         return response()->json(['status' => 200,'ClientCreds' => $ClientCreds]);
    }

    public function credential_create(Request $request) {

        try {

            $request->validate(
                [
                    'fname' => 'required',
                    'lname' => 'required',
                    'mname' => 'required',
                    'address' => 'required',
                    'ifmarriege' => 'required',
                    'bdate' => 'required',
                    'age' => 'required',
                    'pbirth' => 'required',
                    'religion' => 'required',
                    'nationality' => 'required'
                ], 
                [
                    'fname.required' => 'Somthing wrong with input value.',
                    'lname.required' => 'Somthing wrong with input value.',
                    'mname.required' => 'Somthing wrong with input value.',
                    'address.required' => 'Somthing wrong with input value.',
                    'ifmarriege.required' => 'Somthing wrong with input value.',
                    'bdate.required' => 'Somthing wrong with input value.',
                    'age.required' => 'Somthing wrong with input value.',
                    'pbirth.required' => 'Somthing wrong with input value.',
                    'religion.required' => 'Somthing wrong with input value.',
                    'nationality.required' => 'Somthing wrong with input value.'
                ]
            );
            
            client::create([
                'user_id' => Auth::user()->id,
                'fname' => $request->fname,
                'lname' => $request->lname,
                'mname' => $request->mname,
                'ifmarried' => $request->ifmarriege,
                'address' => $request->address,
                'bdate' => $request->bdate,
                'age' => $request->age,
                'bplace' => $request->pbirth,
                'religion' => $request->religion,
                'nationality' => $request->nationality,
                'cstatus' => 1,
            ]);

                return back()->with('success', 'Credential successfully save.');


        } catch (\Exception $e) {

            return $request;
            abort(404);        

        }
    }
}
