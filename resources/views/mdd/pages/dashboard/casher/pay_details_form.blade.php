@extends('mdd.admin_casher')
@section('mdd')


<div class="nk-content ">

    <div class="nk-block nk-block-middle nk-auth-body  wide-lg">
        
<div class="nk-content-body">
    <div class="content-page wide-sm m-auto">
        
       {{--  <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
            <div class="nk-block-head-content text-center">
                <h2 class="nk-block-title fw-normal">Casher <span class="lead">walk-in Client</span></h2> 
            </div>
        </div> --}}

        <div class="nk-block">
            <div class="card card-bordered">
                <div class="card-inner">



<form action="{{ route('c-walk-in-paymethod') }}" method="get" id="payDetailsForm">
    @csrf
<div class="row gy-4">

<span class="preview-title-lg overline-title" style="margin-bottom: -15px;">Project and Properties Information (Casher ID : 151112)</span>        

    <div class="col-12">

        <div class="form-control-wrap">
        <select class="form-select js-select2 select2-hidden-accessible" data-ui="xl" data-search="on"  name="siteName" id="siteName" onchange="displaySelected()"> 
        </select>

        <label class="form-label-outlined" for="outlined-select">Search Project Site</label>
                        
        </div>
    </div>

    <div class="col-12">
 

        <div class="form-group">
            <label class="form-label" for="default-01">Site Address</label>
            <div class="form-control-wrap">
                <input type="text" class="form-control" id="the_address" name="the_address" readonly>
                <input type="hidden" class="form-control" id="project_id" name="project_id"> 
                <span id="the_address-error" class="error"></span>
            </div>
        </div>

    </div>
</div>

<div class="row gy-4">

    <div class="col-lg-4 col-sm-6">
        <div class="form-group">
            <label class="form-label">Province</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control" id="the_proVince" name="the_proVince" readonly>
                    <span id="the_proVince-error" class="error"></span>
                </div>
        </div>
    </div>

    <div class="col-lg-4 col-sm-6">
        <div class="form-group">
            <label class="form-label">City</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control" id="the_city" name="the_city" readonly>
                    <span id="the_city-error" class="error"></span>
                </div>
        </div>
    </div>

    <div class="col-lg-4 col-sm-6">
        <div class="form-group">
            <label class="form-label">Barangay</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control" id="the_barangay" name="the_barangay" readonly>
                    <span id="the_barangay-error" class="error"></span>
                </div>
        </div>
    </div>

</div>

<div class="row gy-4">

<div class="col-lg-3 col-sm-6">
    <div class="form-group">
    <label class="form-label">Block</label>
    <div class="form-control-wrap">
        <select class="form-select" name="the_block" id="the_block" onchange="populateLot()">
            <option value="">-- Select --</option>
        </select>
        <span id="the_block-error" class="error"></span>
    </div>
    </div>
</div>


<div class="col-lg-3 col-sm-6">
    <div class="form-group">
    <label class="form-label">Lot</label>
    <div class="form-control-wrap">
        <select class="form-select" name="the_lot" id="the_lot" onchange="populateAreaSQM()">
            <option value="">-- Select --</option>
        </select>
        <span id="the_lot-error" class="error"></span>
    </div>
    </div>
</div>


<div class="col-lg-3 col-sm-6">
    <div class="form-group">
        <label class="form-label">Lot Area</label>
            <div class="form-control-wrap">
                <input type="text" class="form-control" id="the_lot_area" name="the_lot_area" readonly>
                <span id="the_lot_area-error" class="error"></span>
            </div>
    </div>
</div>

<div class="col-lg-3 col-sm-6">
    <div class="form-group">
        <label class="form-label">Price SQM</label>
            <div class="form-control-wrap">
                <input type="text" class="form-control" id="the_price_sqm" name="the_price_sqm" readonly>
                <input type="hidden" class="form-control" id="property_id" name="property_id">
                <span id="the_price_sqm-error" class="error"></span>
            </div>
    </div>
</div>

</div>


<div class="row gy-4">

<div class="col-lg-4 col-sm-6">
    <div class="form-group">
        <label class="form-label">Months to Pay</label>
            <div class="form-control-wrap">
                <input type="text" class="form-control" id="the_month_pay" name="the_month_pay">
                <span id="the_month_pay-error" class="error"></span>
            </div>
    </div>
</div>


<div class="col-lg-8 col-sm-6">
    <div class="form-group">
    <label class="form-label">Brooker</label>
    <div class="form-control-wrap">
        <select class="form-select" name="the_brooker">
            <option value="">-- Select --</option>
            <option value="1">Lebron James</option>
        </select>
        <span id="the_brooker-error" class="error"></span>
    </div>
    </div>
</div>



</div>

<div class="row gy-4">
<span class="preview-title-lg overline-title" style="margin-bottom: -15px;">Client Basic Information</span>

<div class="col-lg-5 col-sm-6">
    <div class="form-group">
        <label class="form-label">Full Name</label>
            <div class="form-control-wrap">
                <input type="text" class="form-control" value="{{ $client->lname.' '. $client->fname .' '. $client->mname.'.' }}" readonly>
            </div>
    </div>
</div>

<div class="col-lg-3 col-sm-6">
    <div class="form-group">
        <label class="form-label">Contact No.</label>
            <div class="form-control-wrap">
                <input type="text" class="form-control" value="{{ $client->phone_number }}" readonly>
            </div>
    </div>
</div>

<div class="col-lg-4 col-sm-6">
    <div class="form-group">
        <label class="form-label">Email</label>
            <div class="form-control-wrap">
                <input type="text" class="form-control" value="{{ $client->email }}" readonly>
            </div>
    </div>
</div>

</div>

<div class="row gy-4">

<div class="col-12">
<div class="form-group">
    <label class="form-label" for="default-01">Address</label>
    <div class="form-control-wrap">
        <input type="text" class="form-control" value="{{ $client->address }}" id="client_address" readonly>
    </div>
</div>
</div>
 <input type="hidden" class="form-control" value="{{ $client->id }}" id="client_id" name="client_id">
</div>



<div class="row gy-4">

<span class="preview-title-lg overline-title" style="margin-bottom: -15px;">Payment Method</span>        


<div class="col-md-4 col-sm-6">
    <div class="preview-block">
        {{-- <span class="preview-title overline-title">Cash</span> --}}
        <div class="custom-control custom-radio checked">
            <input type="radio" id="cash" name="customRadio" class="custom-control-input">
            <label class="custom-control-label" for="cash">Cash Payment</label>
        </div>
    </div>
</div>

<div class="col-md-4 col-sm-6">
    <div class="preview-block">
        {{-- <span class="preview-title overline-title">Bank Deposit</span> --}}
        <div class="custom-control custom-radio checked">
            <input type="radio" id="bank" name="customRadio" class="custom-control-input">
            <label class="custom-control-label" for="bank">Card</label>
        </div>
    </div>
</div>

<div class="col-md-4 col-sm-6">
    <div class="preview-block">
        {{-- <span class="preview-title overline-title">Card</span> --}}
        <div class="custom-control custom-radio checked">
            <input type="radio" id="card" name="customRadio" class="custom-control-input">
            <label class="custom-control-label" for="card">Through Bank</label>
        </div>
    </div>
</div>

<div class="col-12" style="padding-top: 45px;">
    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-primary" onclick="submitForm()">Continue for Payment</button>
    </div>
</div>
</div>

</form>




                </div><!-- .card-inner -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div><!-- .content-page -->
</div>
        
    </div>
   
</div>





          
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script type="text/javascript">

    // var the_monthpay = document.getElementById('the_month_pay');

    // function submitForm() {
    //     localStorage.setItem('the_monthpay', the_monthpay.value);
    //     alert('Form 1 submitted!');
    // }

function populateSiteName() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://127.0.0.1:8000/mdd-properties/dashboard/jsx/managestaff/projects-site', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var getid = JSON.parse(xhr.responseText);
            var output = '<option value="">-- Search Name --</option>';

            for (var i = 0; i < getid.length; i++) {
                output += '<option value="' + getid[i].id + '">' + getid[i].name + '</option>';
            }

            document.getElementById('siteName').innerHTML = output;
        }
    };
xhr.send();
}

window.onload = function() {
    populateSiteName();
}


function displaySelected() {

  const selectElement = document.getElementById("siteName");
  const selectedIndex = selectElement.selectedIndex;
  const selectedOptionValue = selectElement.options[selectedIndex].value;

  const addRess = document.getElementById("the_address");
  const proVince = document.getElementById("the_proVince");
  const ciTy = document.getElementById("the_city");
  const barangGay = document.getElementById("the_barangay");
  const iD = document.getElementById("project_id");

  axios.get('http://127.0.0.1:8000/mdd-properties/dashboard/jsx/managestaff/projects-site-id/' + selectedOptionValue)
    .then(function(response) {

      addRess.value = response.data.address;
      proVince.value = response.data.provinces;
      ciTy.value = response.data.cities;
      barangGay.value = response.data.barangays;
      iD.value = response.data.id;

    })
    .catch(function(error) {
      console.log(error);
    });



    var siteId = document.getElementById('siteName').value;
    if (siteId) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'http://127.0.0.1:8000/mdd-properties/dashboard/jsx/managestaff/projects-property-id?site=' + siteId, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var property = JSON.parse(xhr.responseText);
                var output = '<option value="">-- Select --</option>';

                for (var i = 0; i < property.length; i++) {
                    output += '<option value="' + property[i].id + '">' + property[i].block + '</option>';
                }

                document.getElementById('the_block').innerHTML = output;
            }
        };
        xhr.send();
    } else {
        document.getElementById('the_block').innerHTML = '<option value="">-- Select --</option>';
        document.getElementById('the_lot').innerHTML = '<option value="">-- Select --</option>';
    }

}

function populateLot() {

    var LotId = document.getElementById('the_block').value;

    if (LotId) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'http://127.0.0.1:8000/mdd-properties/dashboard/jsx/managestaff/projects-property-lotid?lotid=' + LotId, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var propertylot = JSON.parse(xhr.responseText);
                var output = '<option value="">-- Select --</option>';

                for (var i = 0; i < propertylot.length; i++) {
                    output += '<option value="' + propertylot[i].id + '">' + propertylot[i].lot + '</option>';
                }

                document.getElementById('the_lot').innerHTML = output;
            }
        };
        xhr.send();
    } else {
        document.getElementById('the_lot').innerHTML = '<option value="">-- Select --</option>';
    }


}

function populateAreaSQM() {

  const selectElement = document.getElementById("the_lot");
  const selectedIndex = selectElement.selectedIndex;
  const selectedOptionValue = selectElement.options[selectedIndex].value;

  const theArea = document.getElementById("the_lot_area");
  const thePrice = document.getElementById("the_price_sqm");
  const thePropertyId = document.getElementById("property_id");

  axios.get('http://127.0.0.1:8000/mdd-properties/dashboard/jsx/managestaff/projects-property-area-price/' + selectedOptionValue)
    .then(function(response) {

      theArea.value = response.data.lot_area;
      thePrice.value = response.data.price;
      thePropertyId.value = response.data.id;

    })
    .catch(function(error) {
      console.log(error);
    });
}


$(document).ready(function() {

    var ValidateDetailsRole = {
      the_address: {
        required: true
      },

          the_proVince: {
            required: true
          },

               the_city: {
                required: true
              },

                   the_barangay: {
                    required: true
                  },

                       the_block: {
                        required: true
                      },

                           the_lot: {
                            required: true
                          },

                               the_lot_area: {
                                required: true
                              },

                                   the_price_sqm: {
                                    required: true
                                  },

                                       the_month_pay: {
                                        required: true
                                      },

                                          the_brooker: {
                                            required: true
                                          }

  };

    var ValidateDetailsMessage = {
      the_address: {
        required: "This is required."
      },
      the_proVince: {
        required: "This is required."
      },
      the_city: {
        required: "This is required."
      },
      the_barangay: {
        required: "This is required."
      },
      the_block: {
        required: "This is required."
      },
      the_lot: {
        required: "This is required."
      },
      the_lot_area: {
        required: "This is required."
      },
      the_price_sqm: {
        required: "This is required."
      },
      the_month_pay: {
        required: "This is required."
      },
      the_brooker: {
       required: "This is required."
      }
    };

    $('#payDetailsForm').validate({
        rules: ValidateDetailsRole,
        messages: ValidateDetailsMessage,
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.appendTo($('#' + element.attr('id') + '-error'));
        }
    });

  });




</script>

@endsection