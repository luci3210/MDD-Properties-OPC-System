<?php

namespace App\Http\Controllers\mdd\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mdd\Status;

class statuscontroller extends Controller
{
    public function index() {

        $data = Status::all();
        return view('mdd.pages.dashboard.manage_status.index',compact('data'));
    }

    public function form_submit(Request $request) {
            
            $input = [
            'name' => 'required',
            'description' => 'required'];

            $error = ['required' => '* Enter your :attribute'];

            $this->validate($request, $input, $error);

        try {

            Status::create([
                'name' => $request->name,
                    'description' => $request->description
                ]);

             $notification = array(
                'success' => "Information successfully save!",
            );

            return redirect()->route('manage-status-index')->with($notification);

        } catch (\Exception $e) {

             return view('mdd.pages.error.404');
        }
    }
}
