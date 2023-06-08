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
<li class="breadcrumb-item active">Pricing</li>
</ul>
</nav>
</div>


<div class="nk-block-head-content">
    <button type="button" class="btn btn-sm btn-primary NewModal">New</button>
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

{{-- @if($project != null) --}}
<table class="table table-hover">
  <thead class="table-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Pricing 1</th>
      <th scope="col">Pricing 2</th>
      <th scope="col">Pricing 3</th>
      <th scope="col" class="text-center">Action</th>
    </tr>
  </thead>

{{--   <tbody>
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
  </tbody> --}}

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
          


{{-- ----------------- new form modal ------------- --}}

<div class="modal fade zoom" tabindex="-1" id="NewModalForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">New Default Pricing</h5>
            </div>

<form action="{{ route('ms-location-new') }}" method="POST">
    @csrf
<div class="modal-body">

<div class="form-group">
<label class="form-label" for="default-06">Select Project</label>
<div class="form-control-wrap ">
    <div class="form-control-select">
        <select class="form-control" id="default-06" name="the_status">
            <option value="">-Select Status-</option>
            @foreach($project as $listing)
            <option value="{{ $listing->id }}">{{ $listing->name }}</option>
            @endforeach
        </select>
    </div>
</div>
</div>

<div class="form-group">
    <label class="form-label">First Column (Enter number of month)</label>
    <div class="form-control-wrap">
        <input type="text" class="form-control" name="the_province" >
    </div>
</div>

<div class="form-group">
    <label class="form-label">Second  Column (Enter number of month)</label>
    <div class="form-control-wrap">
        <input type="text" class="form-control" name="the_province" >
    </div>
</div>

<div class="form-group">
    <label class="form-label">Third  Column (Enter number of month)</label>
    <div class="form-control-wrap">
        <input type="text" class="form-control" name="the_province" >
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




<script type="text/javascript">

$(document).ready(function () {
$(document).on('click','.NewModal', function() { 
    $('#NewModalForm').modal('show');
});
});


$(document).ready(function() {

    var valiDateForm = {
      the_name: {
        required: true,
        minlength:3,
        maxlength:150
      },

      the_address: {
        required: true,
        minlength:3,
        maxlength:150
      },

      the_longi: {
        required: true,
        minlength:3,
        maxlength:250
      },

       the_lati: {
        required: true,
        minlength:3,
        maxlength:250
      },

       provinceID: {
        required: true,
        minlength:1,
        maxlength:3,
        number: true
      },

       city: {
        required: true,
        minlength:1,
        maxlength:3,
        number: true
      },

       barangay: {
        required: true,
        minlength:1,
        maxlength:3,
        number: true
      }

  };

    var valiDateMessage = {
      the_name: {
        required: "Input box is required",
        minlength: "Please provide atleast 3 character.",
        maxlength: "Please provide atleast less than 150 character."
      },

       the_address: {
        required: "Input box is required",
        minlength: "Please provide atleast 3 character.",
        maxlength: "Please provide atleast less than 150 character."
      },

      the_longi: {
        required: "Input box is required",
        minlength: "Please provide atleast 3 character.",
        maxlength: "Please provide atleast less than 250 character."
      },

      the_longi: {
        required: "Input box is required",
        minlength: "Please provide atleast 3 character.",
        maxlength: "Please provide atleast less than 250 character."
      },
  

    };

    $('#TheProjectForm').validate({
        rules: valiDateForm,
        messages: valiDateMessage,
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.appendTo($('#' + element.attr('id') + '-error'));
        }
    });

  });

</script>

@endsection