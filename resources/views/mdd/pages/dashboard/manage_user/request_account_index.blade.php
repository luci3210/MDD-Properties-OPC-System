@extends('mdd.admin_master')
@section('mdd')

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
    

<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content">
             <h3 class="nk-block-title page-title">Manage User<span style="font-size:18px; margin-left: 10px;color: #a3a3a3;"> - Request Account</span></h3>

        </div>
    </div>

<div style="margin-top:10px;margin-bottom: -10px;">
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

</div>

<div class="nk-block">
    <div class="card card-table-bordered card-stretch">
        <div class="container-fluid">
            <div style="margin-top:10px; margin-left: 5px; margin-right: 5px;margin-bottom: 10px;">

<table class="table table-hover">
  <thead class="table-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Department</th>
      <th scope="col">Email</th>
      <th scope="col">Date</th>
      <th scope="col" class="text-center">Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach($data as $details)
    <tr style="font-size:13px;">
      <th scope="row">{{ $loop->index + 1 }}</th>
      <td>{{ $details->name }}</td>
      <td>{{ $details->department }}</td>
      <td>{{ $details->email }}</td>
      <td>{{ $details->created_at }}</td>
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


{{-- ----------------- update ------------- --}}
<div class="modal fade zoom" tabindex="-1" id="EditModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Update Request Account</h5>
            </div>

<form action="{{ route('mu-request-account-move') }}" method="POST">
    @csrf
<div class="modal-body">

<div class="form-group">
    <label class="form-label">Name</label>
    <div class="form-control-wrap">
        <input type="hidden" class="form-control" id="the_id" name="the_id"  value="">
        <input type="text" class="form-control" id="the_name"  disabled>
    </div>
</div>


<div class="form-group">
    <label class="form-label">Email</label>
    <div class="form-control-wrap">
        <input type="text" class="form-control" id="the_email" disabled>
    </div>
</div>


<div class="form-group">
<label class="form-label" for="default-06">Department (Current - <span id="the_department" style="color:red;"></span>)</label>
<div class="form-control-wrap ">
    <div class="form-control-select">
        <select class="form-control" id="default-06" name="the_department">
            <option value="">-Select Status-</option>
            @foreach($department as $dept)
            <option value="{{ $dept['did'] }}">{{ $dept['department'] }}</option>
            @endforeach
        </select>
    </div>
</div>
</div>


<div class="form-group">
    <label class="form-label">Date Created</label>
    <div class="form-control-wrap">
        <input type="text" class="form-control" id="the_created_at"  disabled>
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
{{-- -----------------------end----------------------- --}}


<!-- delete modal!-->
<div class="modal fade zoom" tabindex="-1" id="DeleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title text-danger">Delete Account?</h5>
            </div>

<form action="{{ route('mu-request-account-delete') }}" method="POST">
    @csrf
<div class="modal-body">

<div class="form-group">
    <label class="form-label">Name</label>
    <div class="form-control-wrap">
        <input type="hidden" class="form-control" id="del_id" name="del_id"  value="">
        <input type="text" class="form-control" id="del_name"  disabled>
    </div>
</div>


<div class="form-group">
    <label class="form-label">Email</label>
    <div class="form-control-wrap">
        <input type="text" class="form-control" id="del_email" disabled>
    </div>
</div>


<div class="form-group">
<label class="form-label" for="default-06">Department (Current - <span id="del_department" style="color:red;"></span>)</label>
<div class="form-control-wrap ">
    <div class="form-control-select">
        <select class="form-control" id="default-06" disabled>
            <option value="">-Select Status-</option>
            @foreach($department as $dept)
            <option value="{{ $dept['did'] }}">{{ $dept['department'] }}</option>
            @endforeach
        </select>
    </div>
</div>
</div>


<div class="form-group">
    <label class="form-label">Date Created</label>
    <div class="form-control-wrap">
        <input type="text" class="form-control" id="del_created_at"  disabled>
    </div>
</div>



</div>
<div class="modal-footer bg-light">
    <button type="submit" class="btn btn-danger">Confirm</button>
</div>

</form>

        </div>
    </div>
</div>

<!-- end of delete modal!-->


<script type="text/javascript">

$(document).ready(function () {
$(document).on('click','.ActionEdit', function() { 

    let ids = $(this).val();

    $('#EditModal').modal('show');

    $.ajax({

        type: "GET",
        url: "http://127.0.0.1:8000/mdd-properties/dashboard/jsx/manage-user/request-account-update/"+ids,
        success: function(response) {
            $('#the_id').val(response.user_request.id);
            $('#the_name').val(response.user_request.name);
            $('#the_email').val(response.user_request.email);
            document.getElementById('the_department').innerText = response.user_request.department_name;
            $('#the_created_at').val(response.user_request.created_at);
        }
    });
});
});


$(document).ready(function () {
$(document).on('click','.ActionDelete', function() { 

    let ids = $(this).val();

    $('#DeleteModal').modal('show');

    $.ajax({

        type: "GET",
        url: "http://127.0.0.1:8000/mdd-properties/dashboard/jsx/manage-user/request-account-update/"+ids,
        success: function(response) {
            $('#del_id').val(response.user_request.id);
            $('#del_name').val(response.user_request.name);
            $('#del_email').val(response.user_request.email);
            document.getElementById('del_department').innerText = response.user_request.department_name;
            $('#del_created_at').val(response.user_request.created_at);
        }
    });
});
});


</script>

@endsection