@extends('mdd.admin_master')
@section('mdd')

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
    

<div class="nk-block-head nk-block-head-sm">
<div class="nk-block-between g-3">
    <div class="nk-block-head-content">
        <h3 class="nk-block-title page-title">Dep IT Staff <span style="font-size:18px; margin-left: 10px;color: #a3a3a3;"> - Locations</span></h3>
    </div>


<div class="nk-block-head-content">
    <button type="button" class="btn btn-primary ActionNewProvince">New</button>
</div>

</div>

@if ($message = Session::get('success'))
<div class="alert alert-fill alert-success alert-icon">
    <em class="icon ni ni-check-circle"></em> <strong>Success</strong>. {{ $message }}
</div>
@endif 

@if ($message = Session::get('deleted'))
<div class="alert alert-fill alert-success alert-icon">
    <em class="icon ni ni-check-circle text-danger"></em> <span class="text-danger"><strong>Delete</strong>. {{ $message }}</span>
</div>
@endif 

@if ($errors->any())
    <div class="alert alert-fill alert-danger alert-icon">
    <em class="icon ni ni-check-circle text-danger"></em> <span class="text-danger"> <strong>Whoops!</strong>  There were some problems with your input.</span>
</div>
@endif
</div>

<div class="nk-block">
    <div class="card card-table-bordered card-stretch">
        <div class="container-fluid">
            <div style="margin-top:10px; margin-left: 5px; margin-right: 5px;margin-bottom: 10px;">

<table class="table table-hover">
  <thead class="table-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Provice</th>
      <th scope="col">Status</th>
      <th scope="col" class="text-center">Action</th>
    </tr>
  </thead>

<tbody>
    @foreach($provice_list as $details)
    <tr style="font-size:13px;">
      <th scope="row">{{ $loop->index + 1 }}</th>
      <td>{{ $details->province }}</td>
      <td>{{ $details->name }}</td>
      <td style="width:200px;text-align: center;">
        <button type="button"  value="{{ $details->id }}" class="btn btn-sm btn-outline-primary ActionEdit">Update</button>
        <button type="button"  value="{{ $details->id }}" class="btn btn-sm btn-outline-danger ActionDelete">Delete</button>
      </td>
    </tr>
    @endforeach
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


{{-- ----------------- ADD LOCATION ------------- --}}
<div class="modal fade zoom" tabindex="-1" id="ActionNewProvinceModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">New Province</h5>
            </div>

<form action="{{ route('ms-location-new') }}" method="POST">
    @csrf
<div class="modal-body">

<div class="form-group">
    <label class="form-label">Province Name</label>
    <div class="form-control-wrap">
        <input type="text" class="form-control" name="the_province" >
    </div>
</div>

<div class="form-group">
<label class="form-label" for="default-06">Status</label>
<div class="form-control-wrap ">
    <div class="form-control-select">
        <select class="form-control" id="default-06" name="the_status">
            <option value="">-Select Status-</option>
            @foreach($status_list as $stat)
            <option value="{{ $stat['id'] }}">{{ $stat['name'] }}</option>
            @endforeach
        </select>
    </div>
</div>
</div>

</div>
<div class="modal-footer bg-light">
    <button type="submit" class="btn btn-primary">Save Information</button>
</div>

</form>

        </div>
    </div>
</div>
{{-- -----------------------end----------------------- --}}


<!-- edit modal!-->
<div class="modal fade zoom" tabindex="-1" id="ActionEditProvinceModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">New Province</h5>
            </div>

<form action="{{ route('ms-location_provinces_update') }}" method="POST">
    @csrf
<div class="modal-body">

<div class="form-group">
    <label class="form-label">Province Name</label>
    <div class="form-control-wrap">
        <input type="hidden" class="form-control" id="the_edit_id" name="the_edit_id" >
        <input type="text" class="form-control" id="the_edit_province" name="the_edit_province" >
    </div>
</div>

<div class="form-group">
<label class="form-label" for="default-06">Status  (Current - <span id="the_edit_status" style="color:red;"></span>)</label>
<div class="form-control-wrap ">
    <div class="form-control-select">
        <select class="form-control" id="default-06" name="the_edit_status">
            <option value="">-Select Status-</option>
            @foreach($status_list as $stat)
            <option value="{{ $stat['id'] }}">{{ $stat['name'] }}</option>
            @endforeach
        </select>
    </div>
</div>
</div>

</div>
<div class="modal-footer bg-light">
    <button type="submit" class="btn btn-primary">Update Information</button>
</div>

</form>

        </div>
    </div>
</div>

<!-- end!-->


<!-- delete modal!-->
<div class="modal fade zoom" tabindex="-1" id="ActionDeleteProvinceModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title text-danger">Are you sure you want to delete?</h5>
            </div>

<form action="{{ route('ms-location_provinces_deleted') }}" method="POST">
    @csrf
<div class="modal-body">
 <input type="hidden" class="form-control" id="the_delete_id" name="the_delete_id" >

<h4 id="the_delete_province"></h4>



</div>
<div class="modal-footer bg-light">
    <button type="submit" class="btn btn-danger">Delete Information</button>
</div>

</form>

        </div>
    </div>
</div>

<!-- end!-->

<script type="text/javascript">

$(document).ready(function () {
$(document).on('click','.ActionNewProvince', function() { 
    $('#ActionNewProvinceModal').modal('show');
});
});


$(document).ready(function () {
$(document).on('click','.ActionEdit', function() { 

    let ids = $(this).val();

    $('#ActionEditProvinceModal').modal('show');

    $.ajax({

        type: "GET",

        url: "http://127.0.0.1:8000/mdd-properties/dashboard/jsx/managestaff/locations-province-edit/"+ids,
        success: function(response) {
            $('#the_edit_id').val(response.provice.id);
            $('#the_edit_province').val(response.provice.province);
            document.getElementById('the_edit_status').innerText = response.provice.name;
        }
    });
});
});


$(document).ready(function () {
$(document).on('click','.ActionDelete', function() { 

    let ids = $(this).val();

    $('#ActionDeleteProvinceModal').modal('show');

    $.ajax({

        type: "GET",
        url: "http://127.0.0.1:8000/mdd-properties/dashboard/jsx/managestaff/locations-province-delete/"+ids,
        success: function(response) {
            $('#the_delete_id').val(response.provice.id);
            document.getElementById('the_delete_province').innerText = response.provice.province;
        }
    });
});
});


</script>

@endsection