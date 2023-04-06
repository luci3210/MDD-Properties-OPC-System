@extends('mdd.admin_master')
@section('mdd')

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">


<div class="nk-block-head nk-block-head-sm">
<div class="nk-block-between g-3">
    <div class="nk-block-head-content">
        <h3 class="nk-block-title page-title">Manage Status</h3>
    </div>


<div class="nk-block-head-content">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNew">New</button>
</div>

</div>

@if ($message = Session::get('success'))
<div class="alert alert-fill alert-success alert-icon">
    <em class="icon ni ni-check-circle"></em> <strong>Success</strong>. {{ $message }}
</div>
@endif 

@if ($errors->any())
    <div class="alert alert-fill alert-danger alert-icon">
    <em class="icon ni ni-check-circle"></em> <strong>Whoops!</strong>  There were some problems with your input.
</div>
@endif
</div>

<div class="nk-block">
    <div class="card card-bordered card-stretch">
        <div class="container-fluid">
            <div style="margin-top:10px; margin-left: 5px; margin-right: 5px;">
                {{-- <livewire:manage-status /> --}}


<table class="table table-tranx">
    <thead>
        <tr class="tb-tnx-head">
            <th class="tb-tnx-id"><span class="">#</span></th>
            <th class="tb-tnx-info">
                <span class="tb-tnx-desc d-none d-sm-inline-block">
                    <span>Status Name</span>
                </span>
            </th>
            <th class="tb-tnx-info">
                <span class="tb-tnx-desc d-none d-sm-inline-block">
                    <span>Status Description</span>
                </span>
            </th>

            <th class="tb-tnx-info text-center" style="width:200px;">
                <span class="tb-tnx-desc">
                    Action
                </span>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($statuses as $status)
        <tr class="tb-tnx-item">
            <td class="tb-tnx-id">
                {{ $loop->index + 1 }}
            </td>
            <td class="tb-tnx-info">
                <div class="tb-tnx-desc">
                    <span class="title">{{ $status->name }}</span>
                </div>
            </td>
             <td class="tb-tnx-info">
                <div class="tb-tnx-desc">
                    <span class="title">{{ $status->description }}</span>
                </div>
            </td>

            
            <td class="tb-tnx-info text-center">
<button type="button"  value="{{ $status->id }}" class="btn btn-sm btn-outline-primary modEdit">Edit</button>
<button type="button" value="{{ $status->id }}" class="btn btn-sm btn-outline-danger modDelete">Delete</button>
            </td>
        </tr>
        @endforeach()
    </tbody>
</table>


            </div>
        </div>
    </div>
</div>

            </div>
        </div>
    </div>
</div>
          

<!-- new modal!-->

<div class="modal fade zoom" tabindex="-1" id="modalNew">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">New Status</h5>
            </div>

<form action="{{ route('status-form-create') }}" method="POST" id="ValidateNewStatus">
    @csrf
<div class="modal-body">
    <div class="form-group">
        <div class="form-control-wrap">
            <input type="text" class="form-control form-control-outlined"  id="stat_name" name="stat_name">
            <label class="form-label-outlined" for="outlined">Enter Status Name</label>
        </div>
    </div>

    <div class="form-group">
        <div class="form-control-wrap">
            <input type="text" class="form-control form-control-outlined"  id="stat_desc" name="stat_desc">
            <label class="form-label-outlined" for="outlined">Enter Description</label>
        </div>
    </div>

</div>
            <div class="modal-footer bg-light">
                <button type="submit" class="btn btn-primary" id="SaveInfo">Save Information</button>
            </div>
</form>

        </div>
    </div>
</div>

<!-- end of new modal!-->

<!-- edit modal!-->

<div class="modal fade zoom" tabindex="-1" id="editModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Edit Status</h5>
            </div>

<form action="{{ route('status-form-update') }}" method="POST" id="ValidateEditStatus">
    @csrf
<div class="modal-body">

<div class="form-group">
    <label class="form-label" for="default-01">Status Name</label>
    <div class="form-control-wrap">
        <input type="hidden" class="form-control" id="the_id" name="the_id" required>
        <input type="text" class="form-control" id="the_name" name="the_name" required>
    </div>
</div>

<div class="form-group">
    <label class="form-label" for="default-01">Status Description</label>
    <div class="form-control-wrap">
        <input type="text" class="form-control" id="the_description" name="the_description" required>
    </div>
</div>

</div>
<div class="modal-footer bg-light">
    <button type="submit" class="btn btn-primary" id="SaveInfo">Update Information</button>
</div>

</form>

        </div>
    </div>
</div>

<!-- end of edit modal!-->


<!-- delete modal!-->

<div class="modal fade zoom" tabindex="-1" id="deleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Delete Status</h5>
            </div>

<form action="{{ route('status-form-delete') }}" method="POST" id="ValidateDeleteStatus">
    @csrf
<div class="modal-body">

    <div class="alert-text">
        <h6 class="text-danger">Are you sure you want to delete?</h6>
    </div>
    <input type="hidden" class="form-control" id="del_id" name="del_id">
    <input type="text" class="form-control" name="del_status" value="delete">

</div>
<div class="modal-footer bg-light">
    <button type="submit" class="btn btn-danger" id="SaveInfo">Delete Information</button>
</div>

</form>

        </div>
    </div>
</div>

<!-- end of delete modal!-->





<script type="text/javascript">

$(document).ready(function () {
    $(document).on('click','.modEdit', function() {

        var ids = $(this).val();
        $('#editModal').modal('show');
        $.ajax({
            type: "GET",
            url: "http://127.0.0.1:8000/mdd-properties/dashboard/jsx/managestatus/status-form-edit/"+ids,
            success: function(response) {
                $('#the_id').val(response.statuses.id);
                $('#the_name').val(response.statuses.name);
                $('#the_description').val(response.statuses.description);
            }
        });
    });
});

$(document).ready(function () {
    $(document).on('click','.modDelete', function() {

        var ids = $(this).val();
        $('#deleteModal').modal('show');
        $.ajax({
            type: "GET",
            url: "http://127.0.0.1:8000/mdd-properties/dashboard/jsx/managestatus/status-form-edit/"+ids,
            success: function(response) {
                $('#del_id').val(response.statuses.id);
            }
        });
    });
});



$(function() {

  $("#ValidateNewStatus").validate({
    rules: {
      stat_name: {
        required: true,
        minlength:3,
        maxlength:50
      },
      stat_desc: {
        required: true,
        minlength:6,
        maxlength:50
      } 

  },
    messages: {
      stat_name: {
        required: "Please enter new status name.",
        minlength: "New status name at least 3 character.",
        maxlength: "New status name at least 30 max of character."
      },
      stat_desc: {
        required: "Please enter new status description.",
        minlength: "New status description at least 6 character.",
        maxlength: "New status description at least 50 max of character."
      }
    },

  });
});

$(function() {

  $("#ValidateEditStatus").validate({
    rules: {
      the_name: {
        required: true,
        minlength:3,
        maxlength:50
      },
      the_description: {
        required: true,
        minlength:6,
        maxlength:50
      } 

  },
    messages: {
      the_name: {
        required: "Please enter new status name.",
        minlength: "New status name at least 3 character.",
        maxlength: "New status name at least 30 max of character."
      },
      the_description: {
        required: "Please enter new status description.",
        minlength: "New status description at least 6 character.",
        maxlength: "New status description at least 50 max of character."
      }
    },

  });
});

</script>

@endsection