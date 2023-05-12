@extends('mdd.admin_master')
@section('mdd')

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">


<div class="nk-block-head nk-block-head-sm">
<div class="nk-block-between g-3">
    <div class="nk-block-head-content">
        <h3 class="nk-block-title page-title">Project Property Costing</h3>
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
    {{ $errors->any() }}
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
        <h5 class="card-title">Costing Form</h5>
    </div>

    <form action="{{ route('ms-property-costing-submit') }}" method="post" id="ValidateConstingForm">
        @csrf
        <div class="row g-4">

            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-label" for="pay-amount-1">Costing ID</label> <span class="text-danger">*</span> 
                    <div class="form-control-wrap">
                        <input type="number" class="form-control" id="the_costingid" name="the_costingid" onload="generateRandomNumber()" placeholder="Costing Title" readonly>
                        <span id="the_lati-error" class="error"></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">No. of month for Term Interst</label> <span class="text-danger">*</span> 
                    <div class="form-control-wrap">
                        <input type="number" class="form-control" id="the_nomonths_term" name="the_nomonths_term" placeholder="No, of Months for Term Interest">
                        <span id="the_name-error" class="error"></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">percentage (%) for Terms Interest</label> <span class="text-danger">*</span> 
                    <div class="form-control-wrap">
                        <input type="number" class="form-control" id="the_term_ent" name="the_term_ent" placeholder="%">
                        <span id="the_name-error" class="error"></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Miscellaneou Interest</label> <span class="text-danger">*</span> 
                    <div class="form-control-wrap">                        
                        <input type="number" class="form-control" id="the_misc_inter" name="the_misc_inter" placeholder="%">
                        <span id="the_name-error" class="error"></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label class="form-label" for="email-address-1">Miscellaneou Upon Turnover</label> <span class="text-danger">*</span> 
                    <div class="form-control-wrap">
                        <input type="number" class="form-control" id="the_misc_turn_ov" name="the_misc_turn_ov" placeholder="%">
                        <span id="the_longi-error" class="error"></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label class="form-label" for="phone-no-1">Discount Fully Paid</label> <span class="text-danger">*</span> 
                    <div class="form-control-wrap">
                        <input type="number" class="form-control" id="the_discount_paid" name="the_discount_paid" placeholder="%">
                        <span id="the_description-error" class="error"></span>
                    </div>
                </div>
            </div>



            <div class="col-lg-3">
                <div class="form-group">
                    <label class="form-label" for="pay-amount-1">Brooker | Agent Commission</label> <span class="text-danger">*</span> 
                    <div class="form-control-wrap">
                        <input type="number" class="form-control" id="the_comm" name="the_comm" placeholder="%">
                        <span id="the_lati-error" class="error"></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label class="form-label" for="pay-amount-1">Number of Month(Commission)</label> <span class="text-danger">*</span> 
                    <div class="form-control-wrap">
                        <input type="number" class="form-control" id="the_no_comm" name="the_no_comm" placeholder="Enten the number of month">
                        <span id="the_lati-error" class="error"></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label class="form-label" for="pay-amount-1">Expanded Holding Tax</label> <span class="text-danger">*</span> 
                    <div class="form-control-wrap">
                        <input type="number" class="form-control" id="the_expanded_tax" name="the_expanded_tax" placeholder="%">
                        <span id="the_lati-error" class="error"></span>
                    </div>
                </div>
            </div>


             <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-label" for="pay-amount-1">Remarks</label> <span class="text-danger">*</span> 
                    <div class="form-control-wrap">
                        <textarea class="form-control no-resize" name="remark" id="remark"></textarea>
                        <span id="the_lati-error" class="error"></span>
                    </div>
                </div>
            </div>

            
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

<script type="text/javascript">

  window.addEventListener("load", function() {
  const min = 1;
  const max = Math.pow(10, 10) - 1;
  const randomNum = Math.floor(Math.random() * (max - min + 1)) + min;
  const formattedNum = String(randomNum).padStart(10, '0');
  document.getElementById("the_costingid").value = formattedNum;

  // const thecosting_text = document.getElementById("the_costingid");
  // thecosting_text.setAttribute("disabled", true);

});


  $(function() {

  $("#ValidateConstingForm").validate({
    rules: {
      the_costingid: {
        required: true,
        minlength:9,
        maxlength:10
      },
      the_nomonths_term: {
        required: true,
        minlength:1,
        maxlength:3
      }, 

      the_term_ent: {
        required: true,
        minlength:1,
        maxlength:3
      }, 

      the_misc_inter: {
        required: true,
          minlength:1,
        maxlength:3
      }, 


      the_misc_turn_ov: {
        required: true,
          minlength:1,
        maxlength:3
      }, 

      the_discount_paid: {
        required: true,
          minlength:1,
        maxlength:3
      }, 

      the_comm: {
        required: true,
        minlength:1,
        maxlength:3
      }, 

      the_no_comm: {
        required: true,
        minlength:1,
        maxlength:3
      }, 

      the_expanded_tax: {
        required: true,
        minlength:1,
        maxlength:3
      }, 

      remark: {
        required: true,
        minlength:4,
        maxlength:250
      } 

  },
    messages: {
      the_costingid: {
        required: "Please refresh you the page to generate costing ID",
        minlength: "New status name at least 3 character.",
        maxlength: "New status name at least 30 max of character."
      },
      the_nomonths_term: {
        required: "Number of month for Term Interst ",
        minlength: "New status description at least 6 character.",
        maxlength: "New status description at least 50 max of character."
      },
      the_term_ent: {
        required: "Please enter Terms Interest and Up.",
        minlength: "New status description at least 6 character.",
        maxlength: "New status description at least 50 max of character."
      },
      the_misc_inter: {
        required: "Please enter Miscellaneou Interest.",
        minlength: "New status description at least 6 character.",
        maxlength: "New status description at least 50 max of character."
      },
      the_misc_turn_ov: {
        required: "Please enter Miscellaneou Upon Turnover.",
        minlength: "New status description at least 6 character.",
        maxlength: "New status description at least 50 max of character."
      },
      the_discount_paid: {
        required: "Please enter Discount Fully Paid.",
        minlength: "New status description at least 6 character.",
        maxlength: "New status description at least 50 max of character."
      },
      the_comm: {
        required: "Please enter Brooker/Agent Commission.",
        minlength: "New status description at least 6 character.",
        maxlength: "New status description at least 50 max of character."
      },
      the_no_comm: {
        required: "Please enter Number of Month.",
        minlength: "New status description at least 6 character.",
        maxlength: "New status description at least 50 max of character."
      },
      the_expanded_tax: {
        required: "Please enter Expanded Holding Tax .",
        minlength: "New status description at least 6 character.",
        maxlength: "New status description at least 50 max of character."
      },
      remark: {
        required: "Please enter remark.",
        minlength: "New status description at least 6 character.",
        maxlength: "New status description at least 50 max of character."
      }
    },

  });
});


</script>

@endsection