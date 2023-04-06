<?php

namespace App\Http\Livewire\Manage; 

use Livewire\Component;
use App\Models\mdd\Status;
use phpDocumentor\Reflection\Types\This;

class ManageStatus extends Component
{

    public $statname, $description;

     //Input fields on update validation
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'statname' => 'required',
            'description' => 'required',
        ]);
    }

    public function storeStatusData()
    {
        //on form submit validation
        $this->validate([
            'statname' => 'required', //students = table name
            'description' => 'required'
        ]);

        //Add Student Data

        $student = new Students();
        $student->name = $this->statname;
        $student->description = $this->description;

        $student->save();

        session()->flash('message', 'New status has been added successfully');

        $this->statname = '';
        $this->description = '';

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

  public function render()
    {
        $status = Status::all();
        return view('livewire.manage.status',['status'=>$status])->layout('mdd.admin_master');
    }


}
