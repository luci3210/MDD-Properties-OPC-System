@extends('mdd.admin_master')
@section('mdd')

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
    

<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Manage User / Request account</h3>
            <div class="nk-block-des text-soft">
                <p> <span style="color:red;">(For Verification)</span></p>
            </div>
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
                    Status
                </span>
            </th>

            <th class="tb-tnx-info">
                <span class="tb-tnx-desc d-none d-sm-inline-block">
                    Days
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
        @foreach($data as $details)
        <tr class="tb-tnx-item">
            <td class="tb-tnx-id">
                {{ $loop->index + 1 }}
            </td>
            
            <td class="tb-tnx-info">
                <div class="tb-tnx-desc">
                    <span class="title">{{ $details->name }}</span>
                </div>
            </td>

            <td class="tb-tnx-info">
                <div class="tb-tnx-desc">
                    <span class="title">{{ $details->department }}</span>
                </div>
            </td>

             <td class="tb-tnx-info">
                <div class="tb-tnx-desc">
                    <span class="title">{{ $details->id }}</span>
                </div>
            </td>

            <td class="tb-tnx-info">
                <div class="tb-tnx-desc">
                    <span class="title">{{ $details->created_at }}</span>
                </div>
            </td>

            <td class="tb-tnx-info">
                <div class="tb-tnx-desc">
                    <span class="title">2 Days</span>
                </div>
            </td>
            
            <td class="tb-tnx-info text-center">
                <a href="{{ route('mu.request-account-edit',$details->uqid) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                <button type="button" value="{{ $details->id }}" class="btn btn-sm btn-outline-danger modReqDelete">Delete</button>
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

<div class="modal fade zoom" tabindex="-1" id="editReqModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Update User Request Account</h5>
            </div>

<form action="{{ route('mu.request-account-move') }}" method="POST" id="ValidateUpdateRequest">
    @csrf
<div class="modal-body">

<div style="margin-bottom:10px">
    <input type="hidden" class="form-control" id="id" name="id" required>
    <strong>Full Name : </strong> <span id="the_fullname"></span>
</div>

<div style="margin-bottom:10px">
    <strong>E-mail : </strong> <span id="the_email"></span> 
</div>


<div style="margin-bottom:10px">
    <strong>Department :</strong> <span id="the_department"></span>
</div>


<div style="margin-bottom:10px">
    <strong>Date Create : </strong> <span id="the_created"></span>
</div>

<hr>


<div class="form-group">
<label class="form-label">Select Department</label>
<div class="form-control-wrap">
    <select class="form-select" name="department">
        <option label="Select Department" value="" > Select Department </option>
        @foreach($department as $listing)
            <option value="{{ $listing->ids }}">{{ $listing->department }}</option>
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



<!-- delete modal!-->

<div class="modal fade zoom" tabindex="-1" id="deleteReqModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Delete Request Account</h5>
            </div>

<form action="{{ route('mu.request-account-delete') }}" method="POST">
    @csrf
<div class="modal-body">

<div class="alert-text">
    <h6 class="text-danger">Are you sure you want to delete?</h6>
</div><br>

<div style="margin-bottom:10px">
    <input type="hidden" class="form-control" id="del_id" name="del_id" required>
    <strong>Full Name : </strong> <span id="del_fullname"></span>
</div>

<div style="margin-bottom:10px">
    <strong>E-mail : </strong> <span id="del_email"></span> 
</div>


<div style="margin-bottom:10px">
    <strong>Department :</strong> <span id="del_department"></span>
</div>


<div style="margin-bottom:10px">
    <strong>Date Create : </strong> <span id="del_created"></span>
</div>


</div>
<div class="modal-footer bg-light">
    <button type="submit" class="btn btn-danger">Delete Information</button>
</div>

</form>

        </div>
    </div>
</div>

<!-- end of delete modal!-->


<script type="text/javascript">

$(document).ready(function () {
$(document).on('click','.modReqEdit', function() { let ids = $(this).val();

    $('#editReqModal').modal('show');
    $.ajax({
        type: "GET",
        url: "http://127.0.0.1:8000/mdd-properties/dashboard/jsx/manage-user/request-account-edit/"+ids,
        success: function(response) {
            $('#id').val(response.data.id);

            document.getElementById('the_fullname').innerText = response.data.name;
            $('#thefullname').val(response.data.name);
            document.getElementById('the_email').innerText = response.data.email;
            $('#thefullname').val(response.data.name);
            document.getElementById('the_department').innerText = response.data.dep_name;
            $('#thefullname').val(response.data.name);
            document.getElementById('the_created').innerText = response.data.created_at;
            $('#thefullname').val(response.data.name);
        }
    });
});
});



$(document).ready(function () {
$(document).on('click','.modReqDelete', function() { let ids = $(this).val();

    $('#deleteReqModal').modal('show');
    $.ajax({
        type: "GET",
        url: "http://127.0.0.1:8000/mdd-properties/dashboard/jsx/manage-user/request-account-edit/"+ids,
        success: function(response) {
            $('#del_id').val(response.data.id);

            document.getElementById('del_fullname').innerText = response.data.name;
            document.getElementById('del_email').innerText = response.data.email;
            document.getElementById('del_department').innerText = response.data.dep_name;
            document.getElementById('del_created').innerText = response.data.created_at;
        }
    });
});
});


</script>

@endsection