<?php

namespace App\Http\Livewire\Manage;

use Livewire\Component;
use App\Models\mdd\Status;
use phpDocumentor\Reflection\Types\This;

class ManageComponentStatus extends Component
{

    public $name, $description,$ids;

    public function render()
    {
        $status = Status::all();
        return view('livewire.manage.manage-component-status',['status'=>$status])->layout('mdd.admin_master');
    }

    protected $rules = [
            'ids' => 'required',
            'name' => 'required',
            'description' => 'required',
        ];

    public function submit() {
        
        $this->validate([
            'ids' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        $student = new Status();
        $student->id = $this->ids;
        $student->name = $this->name;
        $student->description = $this->description;

        $student->save();

    }



}
