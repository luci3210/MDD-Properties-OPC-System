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
<li class="breadcrumb-item"><a href="#">Project Site</a></li>
<li class="breadcrumb-item active">Project properties</li>
</ul>
</nav>
</div>

<div class="nk-block-head-content">
    <a href="{{ route('ms-get-project-info',[$get_project->id,$get_project->area]) }}"  type="button" class="btn btn-sm  btn-primary">New</a>
    <a href="{{ route('ms-get-project-info',[$get_project->id,$get_project->area]) }}"  type="button" class="btn btn-sm  btn-primary">Export</a>
    <a href="{{ route('ms-get-project-info',[$get_project->id,$get_project->area]) }}"  type="button" class="btn btn-sm  btn-primary">Import</a>
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
            <div style="margin-top:15px; margin-left: 5px; margin-right: 5px; margin-bottom:15px ;">

<div class="card card-bordered">
<div class="card-inner">
    <div class="card-head">
        <h5 class="card-title">Project Site - <span class="text-danger">PHASE NO : {{ $get_project->id }}</span> </h5>
    </div>
    <form action="{{ route('ms-project-store') }}" method="post" id="TheProjectForm" enctype="multipart/form-data">
        @csrf
        <div class="row g-4">
            <div class="col-lg-4">

                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="text" class="form-control form-control-outlined" id="outlined-default" value="{{ $get_project->name }}" readonly>
                            <label class="form-label-outlined" for="outlined-lg">Project Name</label>
                        </div>
                    </div>

            </div>

            <div class="col-lg-8">

                <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="text" class="form-control form-control-outlined" id="outlined-default" value="{{ $get_project->name }}" readonly>
                            <label class="form-label-outlined" for="outlined-lg">Address</label>
                        </div>
                    </div>

            </div>

            <div class="col-lg-4">

                 <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="text" class="form-control form-control-outlined" id="outlined-default" value="{{ $get_project->provinces }}" readonly>
                            <label class="form-label-outlined" for="outlined-lg">Province</label>
                        </div>
                    </div>

            </div>
            <div class="col-lg-4">

                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="text" class="form-control form-control-outlined" id="outlined-default" value="{{ $get_project->cities }}" readonly>
                            <label class="form-label-outlined" for="outlined-lg">City</label>
                        </div>
                    </div>

            </div>


            <div class="col-lg-4">

                 <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="text" class="form-control form-control-outlined" id="outlined-default" value="{{ $get_project->barangays }}" readonly>
                            <label class="form-label-outlined" for="outlined-lg">Barangay</label>
                        </div>
                    </div>

            </div>


            
        </div>
    </form>
</div>
</div>

<hr>


<table class="table table-hover">
  <thead class="table-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Block</th>
      <th scope="col">Lot</th>
      <th scope="col">Lot Area</th>
      <th scope="col">Price</th>
      <th scope="col">LotClass</th>
      <th scope="col" title="Terms Interest %">Term</th>
      <th scope="col" title="miscellaneous Interest %">Misc. Interest</th>
      <th scope="col" title="miscellaneous Upon Turn Over %">Misc. U.T.O</th>
      <th scope="col" title="Agent Commission">Commission %</th>
      <th scope="col" title="Expanded Holding Tax">Expanded Tax</th>
      <th scope="col" title="Expanded Holding Tax">Status</th>
      <th scope="col" class="text-center">Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach($get_property_info as $listing)
    <tr style="font-size:13px;">
      <th scope="row">{{ $loop->index + 1 }}</th>
      <td>{{ $listing->block }}</td>
      <td>{{ $listing->lot }}</td>
      <td>{{ $listing->lot_area }}</td>
      <td>{{ $listing->price }}</td>
      <td>{{ $listing->prime }}</td>
      <td>{{ $listing->term }}% for {{ $listing->months_term }} Months</td>
      <td>{{ $listing->misc_interest }}%</td>
      <td>{{ $listing->misc_u_t_over }}%</td>
      <td>{{ $listing->agent_commi }}% for {{ $listing->no_month_commi }} Months</td>
      <td>{{ $listing->expanded_htax }}% {{ $listing->id }}</td>
      <td>
          @if($listing->status == null)
                Available
          @else
                Owned
          @endif

      </td>
      <td style="width:150px;text-align: center;">
        <button type="button"  value="{{ $listing->id }}" class="btn btn-sm btn-dark ActionEdit">Edit</button>
        <button type="button"  value="{{ $listing->id }}" class="btn btn-sm btn-danger ActionEdit">Delete</button>
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
                <h5 class="modal-title">Edit Properties</h5>
            </div>

<form action="{{ route('update-property') }}" method="POST" id="ValidateEditForm">
    @csrf
    @method('PUT')
<div class="modal-body">

<div class="row g-4">

<div class="col-lg-3">
<div class="form-group">
    <div class="form-control-wrap">
        <input type="text" class="form-control form-control-outlined" name="the_block" id="the_block" value="0">
        <input type="hidden" name="the_id" id="the_id">
       <label class="form-label-outlined" for="outlined-lg">Block</label>
       <span id="the_block-error" class="error"></span>
    </div>
</div>
</div>

<div class="col-lg-3">
<div class="form-group">
    <div class="form-control-wrap">
        <input type="text" class="form-control form-control-outlined" name="the_lot" id="the_lot" value="0">
        <label class="form-label-outlined" for="outlined-lg">Lot</label>
        <span id="the_lot-error" class="error"></span>
    </div>
</div>
</div>

<div class="col-lg-3">
<div class="form-group">
    <div class="form-control-wrap">
        <input type="text" class="form-control form-control-outlined" name="the_area" id="the_area" value="0">
        <label class="form-label-outlined" for="outlined-lg">Area</label>
        <span id="the_area-error" class="error"></span>
    </div>
</div>
</div>

<div class="col-lg-3">
<div class="form-group">
    <div class="form-control-wrap">
        <input type="text" class="form-control form-control-outlined" name="the_price" id="the_price" value="0">
        <label class="form-label-outlined" for="outlined-lg">Price</label>
        <span id="the_price-error" class="error"></span>
    </div>
</div>
</div>



<div class="col-lg-4">
<div class="form-group">
    <div class="form-control-wrap">
        <input type="text" class="form-control form-control-outlined" name="the_lotclass" id="the_lotclass" value="0">
        <label class="form-label-outlined" for="outlined-lg">Lot Class</label>
        <span id="the_lotclass-error" class="error"></span>
    </div>
</div>
</div>


<div class="col-lg-4">
<div class="form-group">
    <div class="form-control-wrap">
        <input type="text" class="form-control form-control-outlined" name="the_term" id="the_term" value="0">
        <label class="form-label-outlined" for="outlined-lg">Term</label>
        <span id="the_term-error" class="error"></span>
    </div>
</div>
</div>

<div class="col-lg-4">
<div class="form-group">
    <div class="form-control-wrap">
        <input type="text" class="form-control form-control-outlined" name="the_micsInterest" id="the_micsInterest" value="0">
        <label class="form-label-outlined" for="outlined-lg">Misc. Interest</label>
        <span id="the_micsInterest-error" class="error"></span>
    </div>
</div>
</div>

<div class="col-lg-4">
<div class="form-group">
    <div class="form-control-wrap">
        <input type="text" class="form-control form-control-outlined" name="the_micsMonth" id="the_micsMonth" value="0">
        <label class="form-label-outlined" for="outlined-lg">Interest (Months)</label>
        <span id="the_micsMonth-error" class="error"></span>
    </div>
</div>
</div>


<div class="col-lg-4">
<div class="form-group">
    <div class="form-control-wrap">
        <input type="text" class="form-control form-control-outlined" name="the_UTO" id="the_UTO" value="0">
        <label class="form-label-outlined" for="outlined-lg">Misc. U.T.O</label>
        <span id="the_UTO-error" class="error"></span>
    </div>
</div>
</div>


<div class="col-lg-4">
<div class="form-group">
    <div class="form-control-wrap">
        <input type="text" class="form-control form-control-outlined" name="the_comm" id="the_comm" value="0">
        <label class="form-label-outlined" for="outlined-lg">Commission %</label>
        <span id="the_comm-error" class="error"></span>
    </div>
</div>
</div>

<div class="col-lg-4">
<div class="form-group">
    <div class="form-control-wrap">
        <input type="text" class="form-control form-control-outlined" name="the_commMonth" id="the_commMonth" value="0">
        <label class="form-label-outlined" for="outlined-lg">Commission (Month)</label>
        <span id="the_commMonth-error" class="error"></span>
    </div>
</div>
</div>

<div class="col-lg-4">
<div class="form-group">
    <div class="form-control-wrap">
        <input type="text" class="form-control form-control-outlined" name="the_tax" id="the_tax" value="0">
        <label class="form-label-outlined" for="outlined-lg">Expanded Tax</label>
        <span id="the_tax-error" class="error"></span>
    </div>
</div>
</div>

<div class="col-lg-4">
<div class="form-group">
    <div class="form-control-wrap">
        <input type="text" class="form-control form-control-outlined" name="status" id="status" value="0">
        <label class="form-label-outlined" for="outlined-lg">Status</label>
        <span id="status-error" class="error"></span>
    </div>
</div>
</div>


<div class="col-lg-12">
<div class="form-group">
<label class="form-label" for="default-textarea">Remark</label>
<span id="remark-error" class="error"></span>
<div class="form-control-wrap">
    <textarea class="form-control no-resize" id="remark" name="remark">Remarks</textarea>
</div>
</div>
</div>


</div>

</div>
          <div class="modal-footer bg-light">
                <button type="submit" class="btn btn-primary" id="SaveInfo" onclick="submitUpdateForm()">Save Information</button>
            </div>
</form>

        </div>
    </div>
</div>

<!-- end of edit modal!-->

          
<script type="text/javascript">

$(document).ready(function () {

    $(document).on('click','.ActionEdit', function() {

        var id = $(this).val();

        $('#ActionEditModal').modal('show');

        var xhr = new XMLHttpRequest();
        var the_id = document.getElementById('the_id');
        var the_block = document.getElementById('the_block');
        var the_lot = document.getElementById('the_lot');
        var the_area = document.getElementById('the_area');
        var the_price= document.getElementById('the_price');
        var the_lotclass = document.getElementById('the_lotclass');
        var the_term = document.getElementById('the_term');
        var the_micsMonth = document.getElementById('the_micsMonth');
        var the_micsInterest = document.getElementById('the_micsInterest');
        var the_UTO = document.getElementById('the_UTO');
        var the_comm = document.getElementById('the_comm');
        var the_commMonth= document.getElementById('the_commMonth');
        var the_tax = document.getElementById('the_tax');
        var status = document.getElementById('status');
        var remark= document.getElementById('remark');

    xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {

        var data = JSON.parse(xhr.responseText);
        the_id.value = data.id;
        the_block.value = data.block;
        the_lot.value = data.lot;
        the_area.value = data.lot_area;
        the_price.value = data.price;
        the_lotclass.value = data.prime;
        the_term.value = data.term;
        the_micsMonth.value = data.months_term;
        the_micsInterest.value = data.misc_interest;
        the_UTO.value = data.misc_u_t_over;
        the_comm.value = data.agent_commi;
        the_commMonth.value = data.no_month_commi;
        the_tax.value = data.expanded_htax;
        status.value = data.status;
        remark.value = data.remarks;
    }
};

    xhr.open('GET', 'http://127.0.0.1:8000/dashboard/mddproperties/property/get-property-id/' + id, true);
    xhr.send();
    });
});

$(document).ready(function() {

    var ValidateProjectFormRole = {
      the_block: {
        required: true,
        minlength:1,
        maxlength:3,
        number: true
      },

      the_lot: {
        required: true,
        minlength:1,
        maxlength:3,
        number: true
      },

       the_area: {
        required: true,
        minlength:1,
        maxlength:3,
        number: true
      },

       the_price: {
        required: true,
        minlength:3,
        maxlength:9,
        number: true
      },

       the_lotclass: {
        required: true,
        minlength:1,
        maxlength:20,
      },

       the_term: {
        required: true,
        minlength:1,
        maxlength:4,
        number: true
      },

       the_micsInterest: {
        required: true,
        minlength:1,
        maxlength:4,
        number: true
      }
      ,

       the_micsMonth: {
        required: true,
        minlength:1,
        maxlength:4,
        number: true
      }
      ,

       the_UTO: {
        required: true,
        minlength:1,
        maxlength:4,
        number: true
      },

       the_comm: {
        required: true,
        minlength:1,
        maxlength:4,
        number: true
      },

       the_commMonth: {
        required: true,
        minlength:1,
        maxlength:4,
        number: true
      },

       the_tax: {
        required: true,
        minlength:1,
        maxlength:4,
        number: true
      },

       status: {
       required: true,
        minlength:1,
        maxlength:3,
        number: true
      },

       remark: {
        required: true,
        minlength:4,
        maxlength:225,
      }

  };

    var ValidateProjectFormMessage = {
      the_block: {
        required: "This is required.",
        minlength: "Please provide atleast 1 character.",
        maxlength: "Please provide atleast less than 3 character.",
        number: "it should be number"
      },
      the_lot: {
        required: "This is required.",
        minlength: "Please provide atleast 1 character.",
        maxlength: "Please provide atleast less than 3 character.",
        number: "it should be number"
      },
      the_area: {
        required: "This is required.",
        minlength: "Please provide atleast 1 character.",
        maxlength: "Please provide atleast less than 3 character.",
        number: "it should be number"
      },
      the_price: {
        required: "This is required.",
        minlength: "Please provide atleast 1 character.",
        maxlength: "Please provide atleast less than 3 character.",
        number: "it should be number"
      },
      the_lotclass: {
        required: "This is required.",
        minlength: "Please provide atleast 1 character.",
        maxlength: "Please provide atleast less than 20 character."
      },
      the_term: {
        required: "This is required.",
        minlength: "Please provide atleast 1 character.",
        maxlength: "Please provide atleast less than 3 character.",
        number: "it should be number"
      },
      the_micsInterest: {
        required: "This is required.",
        minlength: "Please provide atleast 1 character.",
        maxlength: "Please provide atleast less than 3 character.",
        number: "it should be number"
      },
      the_micsMonth: {
        required: "This is required.",
        minlength: "Please provide atleast 1 interger.",
        maxlength: "Please provide atleast less than 3 character.",
        number: "It should be integer."
      },
      the_UTO: {
        required: "This is required.",
        minlength: "Please provide atleast 1 character.",
        maxlength: "Please provide atleast less than 3 character.",
        number: "it should be number"
      },
      the_comm: {
       required: "This is required.",
        minlength: "Please provide atleast 1 character.",
        maxlength: "Please provide atleast less than 3 character.",
        number: "it should be number"
      },
      the_commMonth: {
        required: "This is required.",
        minlength: "Please provide atleast 1 character.",
        maxlength: "Please provide atleast less than 3 character.",
        number: "it should be number"
      },
      the_tax: {
        required: "This is required.",
        minlength: "Please provide atleast 1 character.",
        maxlength: "Please provide atleast less than 3 character.",
        number: "it should be number"
      },
      status: {
        required: "This is required.",
        minlength: "Please provide atleast 1 character.",
        maxlength: "Please provide atleast less than 3 character.",
        number: "it should be number"
      },
      remark: {
        required: "This is required.",
        minlength: "Please provide atleast 4 interger.",
        maxlength: "Please provide atleast less than 225 character.",
      }
    };

    $('#ValidateEditForm').validate({
        rules: ValidateProjectFormRole,
        messages: ValidateProjectFormMessage,
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.appendTo($('#' + element.attr('id') + '-error'));
        }
    });

  });

</script>
@endsection