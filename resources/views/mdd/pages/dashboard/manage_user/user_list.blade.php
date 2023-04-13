@extends('mdd.admin_master')
@section('mdd')

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">


<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content">
          
			<h4 class="ff-base fw-medium">
			  Manage User
			  <small class="text-soft" style="margin-left:10px;"> - User List</small>
			</h4>
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


<table class="table table-tranx">
    <thead>
        <tr class="tb-tnx-head">
            <th class="tb-tnx-id"><span class="">#</span></th>
            <th class="tb-tnx-info">
                <span class="tb-tnx-desc d-none d-sm-inline-block">
                    <span>Full Name</span>
                </span>
            </th>
            <th class="tb-tnx-info">
                <span class="tb-tnx-desc d-none d-sm-inline-block">
                    <span>Department</span>
                </span>
            </th>

            <th class="tb-tnx-info">
                <span class="tb-tnx-desc d-none d-sm-inline-block">
                    Email
                </span>
            </th>

            <th class="tb-tnx-info">
                <span class="tb-tnx-desc d-none d-sm-inline-block">
                    Phone no.
                </span>
            </th>

            <th class="tb-tnx-info">
                <span class="tb-tnx-desc d-none d-sm-inline-block">
                    Status
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
        @foreach($user as $users)
        <tr class="tb-tnx-item">
            <td class="tb-tnx-id">
                {{ $loop->index + 1 }}
            </td>
            
            <td class="tb-tnx-info">
                <div class="tb-tnx-desc">
                    <span class="title">{{ $users->name }}</span>
                </div>
            </td>

            <td class="tb-tnx-info">
                <div class="tb-tnx-desc">
                    <span class="title">{{ $users->department_name }}</span>
                </div>
            </td>

             <td class="tb-tnx-info">
                <div class="tb-tnx-desc">
                    <span class="title">{{ $users->email }}</span>
                </div>
            </td>

            <td class="tb-tnx-info">
                <div class="tb-tnx-desc">
                    <span class="title">{{ $users->phone_number }}</span>
                </div>
            </td>

            <td class="tb-tnx-info">
                <div class="tb-tnx-desc">
                    <span class="title">{{ $users->status_name }}</span>
                </div>
            </td>
            
            <td class="tb-tnx-info text-center">
                <button type="button"  value="{{ $users->id }}" class="btn btn-sm btn-outline-primary modUserEdit">Edit</button>
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



<!-- edit modal!-->

<div class="modal fade zoom" tabindex="-1" id="editUserModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Update User</h5>
            </div>

<form action="{{ route('mu.request-account-move') }}" method="POST" id="ValidateUpdateRequest">
    @csrf
<div class="modal-body">

<div style="margin-bottom:10px">
    <input type="hidden" class="form-control" id="the_id" name="the_id">
</div>

 <div class="form-group">
    <label class="form-label" for="default-01">Full Name</label>
    <div class="form-control-wrap">
        <input type="text" class="form-control" id="the_name" name="the_name" required>
    </div>
</div>

<div class="form-group">
<label class="form-label">Current Department (* <span style="color:red" id="the_department"></span>)</label>
<div class="form-control-wrap">
    <select class="form-select js-select2" tabindex="-1">

            <option value="0">-Select Department-</option>
        @foreach($theDepartment as $dept)
            <option value="{{ $dept->id }}">{{ $dept->department }}</option>
        @endforeach
    </select>
</div>
</div>

<div class="form-group">
    <label class="form-label" for="default-01">Email</label>
    <div class="form-control-wrap">
        <input type="text" class="form-control" id="the_email" name="the_email" required>
    </div>
</div>

<div class="form-group">
    <label class="form-label" for="default-01">Phone No.</label>
    <div class="form-control-wrap">
        <input type="text" class="form-control" id="the_phone" name="the_phone" required>
    </div>
</div>


<div class="form-group">
<label class="form-label">Current Status (* <span style="color:red" id="the_status"></span>)</label>
<div class="form-control-wrap">
    <select class="form-select js-select2">
        @foreach($theStatus as $status)
            <option value="{{ $status->id }}">{{ $status->name }}</option>
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
	$(document).on('click','.modUserEdit', function() { let ids = $(this).val();

    $('#editUserModal').modal('show');
    $.ajax({
        type: "GET",
        url: "http://127.0.0.1:8000/mdd-properties/dashboard/jsx/manage-user/user-edit/"+ids,
        success: function(response) {
            $('#the_id').val(response.data.id);
            $('#the_name').val(response.data.name);
            $('#the_email').val(response.data.email);
            $('#the_phone').val(response.data.phone_number);
            $('#the_department').val(response.data.department);
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