@extends('mdd.admin_master')
{{-- @push('inputcustom')
    <link href="{{ url('mdd/assets/css/inputcustom.css') }}" rel="stylesheet">
@endpush --}}
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
<li class="breadcrumb-item"><a href="#">Project properties</a></li>
<li class="breadcrumb-item active">New</li>
</ul>
</nav>
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
        <h5 class="card-title">Project Site - <span class="text-danger">PHASE NO. {{ $get_project->id }}</span></h5>
    </div>

        <div class="row g-4">
            
    <div class="col-lg-4">
        <div class="form-group">
            <div class="form-control-wrap">
                <input type="text" class="form-control form-control-outlined" name="the_name" value="{{ $get_project->name }}" readonly>
                <label class="form-label-outlined" for="outlined-default">Name</label>
                <span id="the_lati-error" class="error"></span>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="form-control-wrap">
            <input type="text" class="form-control form-control-outlined" name="the_address" value="{{ $get_project->address}}" readonly>
            <label class="form-label-outlined" for="outlined-default">Address</label>
            <span id="the_lati-error" class="error"></span>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-control-wrap">
            <input type="text" class="form-control form-control-outlined" name="the_province" value="{{ $get_project->provinces }}" readonly>
            <label class="form-label-outlined" for="outlined-default">Province</label>
            <span id="the_lati-error" class="error"></span>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-control-wrap">
            <input type="text" class="form-control form-control-outlined" name="the_city" value="{{ $get_project->cities }}" readonly>
            <label class="form-label-outlined" for="outlined-default">City</label>
            <span id="the_lati-error" class="error"></span>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-control-wrap">
            <input type="text" class="form-control form-control-outlined" name="the_city" value="{{ $get_project->cities }}" readonly>
            <label class="form-label-outlined" for="outlined-default">Barangay</label>
            <span id="the_lati-error" class="error"></span>
        </div>
    </div>

        </div>
</div>
</div>


<hr>

<div class="card card-bordered">
<div class="card-inner">
    <div class="card-head">
        <h5 class="card-title">Property Costing</h5>
    </div>



<form action="{{ route('ms-properties-store') }}" method="post">
        @csrf

    <div class="formOuterRow">
    <div class="row g-4 formInnerRow" style="margin-bottom:15px;">

    
<div class="col-lg-2">
    <div class="form-group">
        <div class="form-control-wrap">
            <select class="form-select js-select2 select2-hidden-accessible" name="costingId" id="costingId" onchange="displaySelected()"> 
</select>
            <label class="form-label-outlined" for="outlined-default">Costing ID</label>
        </div>
    </div>
</div>

<div class="col-lg-2">
    <div class="form-group">
        <div class="form-control-wrap">
             <input type="hidden" name="praj_name" value="{{ $get_project->area }}">
             <input type="hidden" id="ValNomonthsTerm" name="ValNomonthsTerm">
            <input type="text" value="%" class="form-control form-control-outlined" name="the_term_ent" id="the_term_ent">
            <label class="form-label-outlined">Terms Interest for <span id="the_nomonthsTerm" style="font-weight: 700;color: red;"></span> months and Up</label>
        </div>
    </div>
</div>

<div class="col-lg-2">
    <div class="form-group">
        <div class="form-control-wrap">
            <input type="text" value="%" class="form-control form-control-outlined" name="the_misc_inter" id="the_misc_inter">
            <label class="form-label-outlined" for="outlined-default">Miscellaneou Interest </label>
        </div>
    </div>
</div>

<div class="col-lg-2">
    <div class="form-group">
        <div class="form-control-wrap">
            <input type="text" class="form-control form-control-outlined" value="%" name="the_misc_turn_ov" id="the_misc_turn_ov">
            <label class="form-label-outlined" for="outlined-default">Miscellaneou Upon Turnover </label>
        </div>
    </div>
</div>

<div class="col-lg-2">
    <div class="form-group">
        <div class="form-icon form-icon-right xl">
                                                                        <em class="icon ni ni-clock"></em>
                                                                    </div>
        <div class="form-control-wrap">
            <input type="text" class="form-control form-control-outlined" name="the_discount_paid" value="%" id="the_discount_paid">
            <label class="form-label-outlined" for="outlined-default">Discount Fully Paid</label>
        </div>
    </div>
</div>

<div class="col-lg-2">
    <div class="form-group">
        <div class="form-control-wrap">
            <input type="text" value="%" class="form-control form-control-outlined" name="the_comm" id="the_comm">
            <label class="form-label-outlined" for="outlined-default">Brooker | Agent Commission </label>
        </div>
    </div>
</div>

<div class="col-lg-2">
    <div class="form-group">
        <div class="form-control-wrap">
            <input type="text" class="form-control form-control-outlined" value="#" name="the_no_comm" id="the_no_comm">
            <label class="form-label-outlined" for="outlined-default">Number of Month(Commission)</label>
        </div>
    </div>
</div>


<div class="col-lg-2">
    <div class="form-group">
        <div class="form-control-wrap">
            <input type="text" value="%" class="form-control form-control-outlined" name="the_expanded_tax" id="the_expanded_tax">
            <label class="form-label-outlined" for="outlined-default">Expanded Holding Tax</label>
        </div>
    </div>
</div>

<div class="col-lg-8">
    <div class="form-group">
        <div class="form-control-wrap">
            <input type="text" value="none" class="form-control form-control-outlined" name="remark" id="remark">
            <label class="form-label-outlined" for="outlined-default">Remarks</label>
        </div>
    </div>
</div>


    </div>
    </div>
</div>
</div>








<hr>
<div class="card card-bordered">
<div class="card-inner">
    <div class="card-head">
        <h5 class="card-title">Properties Details</h5>
    </div>
    
        <div class="formOuterRow">
            
 
        @for ($i = 0; $i < 10; $i++)    
        <div class="row g-4 formInnerRow" style="margin-bottom:15px;">
            <div class="col-lg-2">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <input type="text" class="form-control form-control-outlined" name="properties[{{ $i }}][1]" id="block_no_1" autofocus>
                        
                        <label class="form-label-outlined" for="outlined-default">Block No.</label>
                    </div>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <input type="text" class="form-control form-control-outlined" name="properties[{{ $i }}][2]" id="lot_no_1">
                        <label class="form-label-outlined" for="outlined-default">Lot No.</label>
                    </div>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <input type="text" class="form-control form-control-outlined" name="properties[{{ $i }}][3]" id="lot_area_1">
                        <label class="form-label-outlined" for="outlined-default">Lot Area</label>
                    </div>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <input type="text" class="form-control form-control-outlined" name="properties[{{ $i }}][4]" id="price_sqm_1">
                        <label class="form-label-outlined" for="outlined-default">Price Per SQM</label>
                    </div>
                </div>
            </div>

             <div class="col-lg-4">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <select class="form-select js-select2 form-control-outlined" multiple="" data-placeholder="Select Multiple options" data-select2-id="{{ $i }}-9" tabindex="{{ $i }}" name="properties[{{ $i }}][5]">
                            <option value="Corner-End" data-select2-id="{{ $i }}-3">Corner-End</option>
                            <option value="Inner" data-select2-id="{{ $i }}-4">Inner</option>
                            <option value="Prime" data-select2-id="{{ $i }}-2">Prime</option>
                        </select>
                        <label class="form-label-outlined" for="outlined-default">Type</label>
                    </div>
                </div>
            </div>

        </div>
        @endfor
        <input type="hidden" name="the_site_id" value="{{ $get_project->id }}">
        <div class="col-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-dim btn-dark">Save Informations</button>
                </div>
            </div>
        </div>


    </form>
</div>
</div>


            </div>
        </div>
    </div>
</div>

            </div>
        </div>
    </div>
</div>
          

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript">

function populateSiteName() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://127.0.0.1:8000/mdd-properties/dashboard/jsx/managestaff/get-costingId', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var getid = JSON.parse(xhr.responseText);
            var output = '<option value="">-- select costing --</option>';

            for (var i = 0; i < getid.length; i++) {
                output += '<option value="' + getid[i].id + '">' + getid[i].consting_title + '</option>';
            }

            document.getElementById('costingId').innerHTML = output;
        }
    };
xhr.send();
}

window.onload = function() {
    populateSiteName();
}

function displaySelected() {

  const selectElement = document.getElementById("costingId");
  const selectedIndex = selectElement.selectedIndex;
  const selectedOptionValue = selectElement.options[selectedIndex].value;

  const the_termEnt = document.getElementById("the_term_ent");
  const the_miscinter = document.getElementById("the_misc_inter");
  const themisc_turn_ov = document.getElementById("the_misc_turn_ov");
  const thediscount_paid = document.getElementById("the_discount_paid");
  const thecomm = document.getElementById("the_comm");
  const the_nocomm = document.getElementById("the_no_comm");
  const the_expandedtax = document.getElementById("the_expanded_tax");
  const the_nomonths_term = document.getElementById("the_nomonthsTerm");
  const theNomonthsTerm = document.getElementById("ValNomonthsTerm");

  axios.get('http://127.0.0.1:8000/mdd-properties/dashboard/jsx/managestaff/get-costing-details/' + selectedOptionValue)

    .then(function(response) {

      the_termEnt.value = response.data.term_interest + "%";
      the_miscinter.value = response.data.miscellaneous_interest + "%";
      themisc_turn_ov.value = response.data.miscellaneou_u_t_over + "%";
      thediscount_paid.value = response.data.discount_f_paid + "%";
      thecomm.value = response.data.agent_commission + "%";
      the_nocomm.value = response.data.no_month_commission;
      the_expandedtax.value = response.data.expanded_htax + "%";
      theNomonthsTerm.value = response.data.nomonths_term;
      the_nomonths_term.innerHTML = response.data.nomonths_term;


    })
    .catch(function(error) {
      console.log(error);
    });

}
// $(document).ready(function() {

//     var ValidateProjectFormRole = {
//       the_name: {
//         required: true,
//         minlength:3,
//         maxlength:150
//       },

//       the_longi: {
//         required: true,
//         minlength:3,
//         maxlength:250
//       },

//        the_description: {
//         required: true,
//         minlength:3,
//         maxlength:250
//       },

//        the_lati: {
//         required: true,
//         minlength:3,
//         maxlength:250
//       },

//        provinceID: {
//         required: true,
//         minlength:1,
//         maxlength:3,
//         number: true
//       },

//        city: {
//         required: true,
//         minlength:1,
//         maxlength:3,
//         number: true
//       },

//        barangay: {
//         required: true,
//         minlength:1,
//         maxlength:3,
//         number: true
//       }

//   };

//     var ValidateProjectFormMessage = {
//       the_name: {
//         required: "This is required.",
//         minlength: "Please provide atleast 3 character.",
//         maxlength: "Please provide atleast less than 150 character."
//       },
//       the_longi: {
//         required: "This is required.",
//         minlength: "Please provide atleast 3 character.",
//         maxlength: "Please provide atleast less than 250 character."
//       },
//       the_description: {
//         required: "This is required.",
//         minlength: "Please provide atleast 3 character.",
//         maxlength: "Please provide atleast less than 250 character."
//       },
//       the_lati: {
//         required: "This is required.",
//         minlength: "Please provide atleast 3 character.",
//         maxlength: "Please provide atleast less than 250 character."
//       },
//       provinceID: {
//         required: "This is required.",
//         minlength: "Please provide atleast 1 interger.",
//         maxlength: "Please provide atleast less than 3 character.",
//         number: "It should be integer."
//       },
//       city: {
//         required: "This is required.",
//         minlength: "Please provide atleast 1 interger.",
//         maxlength: "Please provide atleast less than 3 character.",
//         number: "It should be integer."
//       },
//       barangay: {
//         required: "This is required.",
//         minlength: "Please provide atleast 1 interger.",
//         maxlength: "Please provide atleast less than 3 character.",
//         number: "It should be integer."
//       }
//     };

//     $('#TheProjectForm').validate({
//         rules: ValidateProjectFormRole,
//         messages: ValidateProjectFormMessage,
//         errorElement: 'span',
//         errorPlacement: function(error, element) {
//             error.appendTo($('#' + element.attr('id') + '-error'));
//         }
//     });

//   });

</script>

@endsection