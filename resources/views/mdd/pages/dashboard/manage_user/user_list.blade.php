@extends('mdd.admin_master')
@section('mdd')

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">


<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Manage User<span style="font-size:18px; margin-left: 10px;color: #a3a3a3;"> - Users</span></h3>
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
            <div style="margin-top:10px; margin-left: 5px; margin-right: 5px;">



<table class="table table-hover">
  <thead class="table-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Department</th>
      <th scope="col">Email</th>
      <th scope="col">Contact No.</th>
      <th scope="col">Status</th>
      <th scope="col" class="text-center">Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach($user as $users)
    <tr style="font-size:13px;">
      <th scope="row">{{ $loop->index + 1 }}</th>
      <td>{{ $users->name }}</td>
      <td>{{ $users->department_name }}</td>
      <td>{{ $users->email }}</td>
      <td>{{ $users->phone_number }}</td>
      <td>{{ $users->status_name }}</td>
      <td style="width:200px;text-align: center;">
        <button type="button"  value="{{ $users->id }}" class="btn btn-sm btn-outline-primary ActionEdit">Update</button>
        <button type="button"  value="{{ $users->id }}" class="btn btn-sm btn-outline-primary ActionEdit">History</button>
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



<!-- edit modal!-->

<div class="modal fade zoom" tabindex="-1" id="ActionEditModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Update User</h5>
            </div>

<form action="{{ route('mu-user-update') }}" method="POST" id="ValidateUpdateRequest">
    @csrf
<div class="modal-body">


 <div class="form-group">
    <label class="form-label" for="default-01">Name</label>
    <div class="form-control-wrap">
        <input type="hidden" class="form-control" id="the_id" name="the_id">
        <input type="text" class="form-control" id="the_name" disabled>
    </div>
</div>


<div class="form-group">
<label class="form-label" for="default-06">Department (Current - <span id="the_department" style="color:red;"></span>)</label>
<div class="form-control-wrap ">
    <div class="form-control-select">
        <select class="form-control" id="default-06" name="department">
            <option value="">-Select Status-</option>
            @foreach($department as $dept)
            <option value="{{ $dept['did'] }}">{{ $dept['department'] }}</option>
            @endforeach
        </select>
    </div>
</div>
</div>



<div class="form-group">
    <label class="form-label" for="default-01">Email</label>
    <div class="form-control-wrap">
        <input type="text" class="form-control" id="the_email" disabled>
    </div>
</div>

<div class="form-group">
    <label class="form-label" for="default-01">Phone No.</label>
    <div class="form-control-wrap">
        <input type="text" class="form-control" id="the_phone" disabled>
    </div>
</div>


<div class="form-group">
<label class="form-label">Current Status (Current - <span style="color:red" id="the_status"></span>)</label>
<div class="form-control-wrap">
    <select class="form-select id="default-06" name="status"">
        @foreach($status as $statuses)
            <option value="{{ $statuses['id'] }}">{{ $statuses['name'] }}</option>
        @endforeach
    </select>
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


<script type="text/javascript">
	$(document).ready(function () {
	$(document).on('click','.ActionEdit', function() { 

        let ids = $(this).val();

    $('#ActionEditModal').modal('show');

    $.ajax({
        type: "GET",
        url: "http://127.0.0.1:8000/mdd-properties/dashboard/jsx/manage-user/user-edit/"+ids,
        success: function(response) {
            $('#the_id').val(response.data.id);
            $('#the_name').val(response.data.name);
            $('#the_email').val(response.data.email);
            $('#the_phone').val(response.data.phone_number);
            document.getElementById('the_department').innerText = response.data.department_name;
            document.getElementById('the_status').innerText = response.data.status_name;
            // document.getElementById('the_status').innerText = response.data.status_id;
            // var thestatus = response.data.status_id;
            //  var statElem = document.getElementById('thestatus');
        }
    });
});
});

</script>


@endsection