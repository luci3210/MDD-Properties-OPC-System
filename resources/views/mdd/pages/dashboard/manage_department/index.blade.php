@extends('mdd.admin_master')
{{-- @include('mdd.pages.dashboard.manage_department.department_form_modal') --}}
{{-- @include('mdd.pages.dashboard.manage_department.department_form_editmodal') --}}

@section('mdd')
<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">


<div class="nk-block-head nk-block-head-sm">
<div class="nk-block-between g-3">
    <div class="nk-block-head-content">
        <h3 class="nk-block-title page-title">Manage User<span style="font-size:18px; margin-left: 10px;color: #a3a3a3;"> - Department</span></h3>
    </div><!-- .nk-block-head-content -->
    <div class="nk-block-head-content">
        <ul class="nk-block-tools g-3">
            <li>
                <div class="drodown">
                    <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-bs-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-plus"></em> </a>
                    <div class="dropdown-menu dropdown-menu-end" style="">
                        <ul class="link-list-opt no-bdr">
                            <li><a data-bs-toggle="modal" href="#depform"><span>Add Department</span></a></li>
                            <li><a href="#"><span>Import Department</span></a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>

<div style="margin-top:10px;margin-bottom: -10px;">
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-icon">
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
      <th scope="col">Department</th>
      <th scope="col">Code</th>
      <th scope="col">Status</th>
      <th scope="col" class="text-center">Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach($department as $details)
    <tr style="font-size:13px;">
      <th scope="row">{{ $loop->index + 1 }}</th>
      <td>{{ $details->department }}</td>
      <td>{{ $details->did }}</td>
      <td>{{ $details->status_name }}</td>
      <td style="width:150px;text-align: center;">
        <button type="button"  value="{{ $details->id }}" class="btn btn-sm btn-outline-primary ModEdit">Edit</button>
      </td>
    </tr>
    @endforeach
  </tbody>

</table>

            </div>
        </div>
    </div>
</div>




{{-- --------------------- add ------------------------- --}}

<div class="modal fade" tabindex="-1" id="depform" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title mb-4">Add Department</h5>
                    


<form action="{{ route('md-create') }}" method="post">
    @csrf
    <div class="form-group">
        <label class="form-label">Deparment</label>
        <div class="form-control-wrap">
            <input type="text" class="form-control" name="the_department" value="">
        </div>
    </div>

    <div class="form-group">
        <label class="form-label">Code</label>
        <div class="form-control-wrap">
            <input type="text" class="form-control" name="the_code" value="">
        </div>
    </div>

    <div class="form-group">
        <label class="form-label" for="default-06">Status</label>
        <div class="form-control-wrap ">
            <div class="form-control-select">
                <select class="form-control" id="default-06" name="the_status">
                    <option value="">-Select Status-</option>
                    <option value="2">Active</option>
                    <option value="1">Inactive</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
    </div>
</form>

                                             



                </div>
            </div>
        </div>
    </div>

{{-- --------------------- end ------------------------- --}}





{{-- --------------------- edit ------------------------- --}}

<div class="modal fade" tabindex="-1" id="editModal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title mb-4">Edit Department</h5>
                    


<form action="{{ route('md-update') }}" method="post">
    @csrf
    <div class="form-group">
        <label class="form-label">Deparment Name</label>
        <div class="form-control-wrap">
            <input type="hidden" class="form-control" id="the_id" name="the_id"  value="">
            <input type="text" class="form-control" id="the_department" name="the_department"  value="">
        </div>
    </div>

    <div class="form-group">
        <label class="form-label">Code</label>
        <div class="form-control-wrap">
            <input type="text" class="form-control" id="the_did" name="the_did" value="" disabled>
        </div>
    </div>


    <div class="form-group">
        <label class="form-label" for="default-06">Status</label>
        <div class="form-control-wrap ">
            <div class="form-control-select">
                <select class="form-control" id="default-06" name="the_status">
                    <option value="">-Select Status-</option>
                    <option value="2">Active</option>
                    <option value="1">Inactive</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-primary">Update Informations</button>
    </div>
</form>

            </div>
        </div>
    </div>
</div>
{{-- ---------------------- end ------------------------- --}}




<script type="text/javascript">

$(document).ready(function () {
    $(document).on('click','.ModEdit', function() {

        var ids = $(this).val();

        $('#editModal').modal('show');
        $.ajax({
            type: "GET",
            url: "http://127.0.0.1:8000/mdd-properties/dashboard/jsx/manage-department/edit/"+ids,
            success: function(response) {
                $('#the_id').val(response.department.id);
                $('#the_did').val(response.department.did);
                $('#the_department').val(response.department.department);
            }
        });
    });
});





</script>








            </div>
        </div>
    </div>
</div>
@endsection