

<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
    <h5 style="float: left;"><strong>Manage Status</strong></h5>
    <button class="btn btn-sm btn-primary" style="float: right;" data-toggle="modal" data-target="#addStatusModal">New</button>
</div>
<div class="card-body">

<table class="table table-bordered">
<thead>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Description</th>
    <th style="text-align: center;">Action</th>
</tr>
</thead>
<tbody>

    @foreach ($status  AS $status)
        <tr>
            <td>{{ $status->id }}</td>
            <td>{{ $status->name }}</td>
            <td>{{ $status->description }}</td>
            <td style="text-align: center;">
                <button class="btn btn-sm btn-secondary" wire:click="viewStudentDetails({{ $status->id }})">View</button>
                <button class="btn btn-sm btn-primary" wire:click="editStudents({{ $status->id }})">Edit</button>
                <button class="btn btn-sm btn-danger" wire:click="deleteConfirmation({{ $status->id }})">Delete</button>
            </td>
        </tr>
    @endforeach

</tbody>
</table>

</div>
</div>
</div>
</div>




<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addStatusModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add New Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

<form wire:submit.prevent="submit">

    <div class="form-group row">
        <label for="ids" class="col-3">ids</label>
        <div class="col-9">
            <input type="text" id="ids" class="form-control" wire:model="ids">
            @error('ids')
                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-3">Name</label>
        <div class="col-9">
            <input type="text" id="name" class="form-control" wire:model="name">
            @error('name')
                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="description" class="col-3">Descrition</label>
        <div class="col-9">
            <input type="text" id="description" class="form-control" wire:model="description">
            @error('description')
                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="" class="col-3"></label>
        <div class="col-9">
            <button type="submit" class="btn btn-sm btn-primary">Save Information</button>
        </div>
    </div>
</form>
        </div>
    </div>
</div>
</div>

    {{-- <div wire:ignore.self class="modal fade" id="editStudentModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form wire:submit.prevent="editStudentData">
                        <div class="form-group row">
                            <label for="student_id" class="col-3">Student ID</label>
                            <div class="col-9">
                                <input type="number" id="student_id" class="form-control" wire:model="student_id">
                                @error('student_id')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-3">Name</label>
                            <div class="col-9">
                                <input type="text" id="name" class="form-control" wire:model="name">
                                @error('name')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-3">Email</label>
                            <div class="col-9">
                                <input type="email" id="email" class="form-control" wire:model="email">
                                @error('email')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-3">Phone</label>
                            <div class="col-9">
                                <input type="number" id="phone" class="form-control" wire:model="phone">
                                @error('phone')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-3"></label>
                            <div class="col-9">
                                <button type="submit" class="btn btn-sm btn-primary">Edit Student</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

{{--     <div wire:ignore.self class="modal fade" id="deleteStudentModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4 pb-4">
                    <h6>Are you sure? You want to delete this student data!</h6>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary" wire:click="cancel()" data-dismiss="modal" aria-label="Close">Cancel</button>
                    <button class="btn btn-sm btn-danger" wire:click="deleteStudentData()">Yes! Delete</button>
                </div>
            </div>
        </div>
    </div>
 --}}
{{--     <div wire:ignore.self class="modal fade" id="viewStudentModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Student Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeViewStudentModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>ID: </th>
                                <td>{{ $view_student_id }}</td>
                            </tr>

                            <tr>
                                <th>Name: </th>
                                <td>{{ $view_student_name }}</td>
                            </tr>

                            <tr>
                                <th>Email: </th>
                                <td>{{ $view_student_email }}</td>
                            </tr>

                            <tr>
                                <th>Phone: </th>
                                <td>{{ $view_student_phone }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
