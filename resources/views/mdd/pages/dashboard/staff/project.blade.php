@extends('mdd.admin_master')
@section('mdd')

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">


<div class="nk-block-head nk-block-head-sm">
<div class="nk-block-between g-3">


<div class="nk-block-head-content">
<nav>
<ul class="breadcrumb breadcrumb-arrow">
<li class="breadcrumb-item"><a href="#">Marketing</a></li>
<li class="breadcrumb-item active">Project Site</li>
</ul>
</nav>
</div>


<div class="nk-block-head-content">
    <a href={{ route('ms-projects-form') }} class="btn btn-sm btn-primary">New</a>
    <a href={{ route('ms-projects-form') }} class="btn btn-sm btn-primary">Import</a>
    <a href={{ route('ms-projects-form') }} class="btn btn-sm btn-primary">Export</a>
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
    <div class="card card-table-bordered card-stretch">
        <div class="container-fluid">
            <div style="margin-top:10px; margin-left: 5px; margin-right: 5px;">
                {{-- <livewire:manage-status /> --}}

{{-- @if($project != null) --}}
<table class="table table-hover">
  <thead class="table-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Province</th>
      <th scope="col">City</th>
      <th scope="col">Barangay</th>
      <th scope="col">Status</th>
      <th scope="col" class="text-center">Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach($project as $listing)
    <tr style="font-size:13px;">
      <th scope="row">{{ $loop->index + 1 }}</th>
      <td>
        <div class="user-avatar sq">
        <img style="width: 50px; height:40px;"src="{{ asset('mdd/assets/images/project')}}/{{ $listing->skitch_img == null ? 'logo.png' : json_decode($listing->skitch_img)[0] }}" alt="" class="thumb">
        </div>
      </td>
      <td>{{ $listing->name }}</td>
      <td>{{ $listing->provinces }}</td>
      <td>{{ $listing->cities }}</td>
      <td>{{ $listing->barangays }}</td>
      <td>Active</td>
      <td style="width:270px;text-align: center;">
        <a href="{{ route('ms-get-project-info',[$listing->id,$listing->area]) }}" class="btn btn-sm btn-dim btn-dark">Create</a>
        <a href="{{ route('ms-get-project-info',[$listing->id,$listing->area]) }}" class="btn btn-sm btn-dim btn-dark">Update</a>
        <a href="{{ route('ms-get-property-info',[$listing->id,$listing->area]) }}" class="btn btn-sm btn-dim btn-secondary">Properties</a>
      </td>
    </tr>
    @endforeach
  </tbody>

</table>
{{-- @else
dfdf
@endif  --}}















































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

<div class="modal fade zoom" tabindex="-1" id="ActionEditModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Update Status</h5>
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
    $(document).on('click','.ActionEdit', function() {

        var ids = $(this).val();
        $('#ActionEditModal').modal('show');
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

</script>

@endsection