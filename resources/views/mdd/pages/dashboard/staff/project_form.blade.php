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
<li class="breadcrumb-item active">form New</li>
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
 
    <form action="{{ route('ms-project-store') }}" method="post" id="TheProjectForm" enctype="multipart/form-data">
        @csrf
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Name</label> <span class="text-danger">*</span> 
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="the_name" name="the_name" value="{{ old('the_name') }}" required>
                        <span id="the_name-error" class="error"></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Address</label> <span class="text-danger">*</span> 
                    <div class="form-control-wrap">                        
                        <input type="text" id="the_address" name="the_address" value="{{ old('the_address') }}" class="form-control">
                        <span id="the_address-error" class="error"></span>
                    </div>
                </div>
            </div>

                                
            <input type="hidden" id="the_slug" name="the_slug" value="{{ old('the_slug') }}" class="form-control" readonly="readonly">
              

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-label" for="email-address-1">Longitude</label> <span class="text-danger">*</span> 
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="the_longi" name="the_longi" value="{{ old('the_longi') }}">
                        <span id="the_longi-error" class="error"></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-label" for="pay-amount-1">Latitude</label> <span class="text-danger">*</span> 
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="the_lati" name="the_lati" value="{{ old('the_lati') }}">
                        <span id="the_lati-error" class="error"></span>
                    </div>
                </div>
            </div>


            <div class="col-lg-6">
                <div class="form-control-select">
                     <label class="form-label" for="default-06">Province</label> <span class="text-danger">*</span> 
                    <select class="form-control" name="provinceID" id="provinceID" onchange="populateCities()">
                        <option value="">-- Select Province --</option>
                    </select>
                    <span id="provinceID-error" class="error"></span>
                </div>
            </div>


             <div class="col-lg-6">
                <div class="form-control-select">
                     <label class="form-label" for="default-06">City</label> <span class="text-danger">*</span> 
                    <select class="form-control" name="city" id="city" onchange="populateBarangays()">
                        <option value="">-- Select City --</option>
                    </select>
                    <span id="city-error" class="error"></span>
                </div>
            </div>


             <div class="col-lg-6">
                <div class="form-control-select">
                     <label class="form-label" for="default-06">Barangay</label> <span class="text-danger">*</span> 
                    <select class="form-control" name="barangay" id="barangay" >
                        <option value="">-- Select Barangay --</option>
                    </select>
                    <span id="barangay-error" class="error"></span>
                </div>
            </div>







            <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label">Upload Images</label> <span class="text-danger">*</span> 
                    <div class="form-control-wrap">
                        <div class="form-file">
                            <input type="file" name="the_images[]" multiple class="form-file-input" id="customMultipleFiles">
                            <label class="form-file-label" for="customMultipleFiles">Choose files</label>
                        </div>
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
<br>
<div class="card-head">
        <h5 class="card-title">Map Preview</h5>
    </div>
<div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <div class="card card-bordered w-100">
                                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19218.666257142526!2d-0.038921204804245685!3d52.97840720396935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d7c2c53856f733%3A0x8406d541f1a0910c!2sBoston%2C%20UK!5e0!3m2!1sen!2sbd!4v1632376229328!5m2!1sen!2sbd" class="google-map border-0" allowfullscreen="" loading="lazy"></iframe>
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
</div>
          

<script type="text/javascript">

function populateProvinces() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://127.0.0.1:8000/mdd-properties/dashboard/jsx/managestaff/getprovices', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var province = JSON.parse(xhr.responseText);
            var output = '<option value="">-- Select Province --</option>';

            for (var i = 0; i < province.length; i++) {
                output += '<option value="' + province[i].id + '">' + province[i].province + '</option>';
            }

            document.getElementById('provinceID').innerHTML = output;
        }
    };
xhr.send();
}

window.onload = function() {
    populateProvinces();
}

function populateCities() {
    var provinceId = document.getElementById('provinceID').value;

    if (provinceId) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'http://127.0.0.1:8000/mdd-properties/dashboard/jsx/managestaff/getcities?province=' + provinceId, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var cities = JSON.parse(xhr.responseText);
                var output = '<option value="">-- Select City --</option>';

                for (var i = 0; i < cities.length; i++) {
                    output += '<option value="' + cities[i].city_id + '">' + cities[i].city + '</option>';
                }

                document.getElementById('city').innerHTML = output;
            }
        };
        xhr.send();
    } else {
        document.getElementById('city').innerHTML = '<option value="">-- Select City --</option>';
        document.getElementById('barangay').innerHTML = '<option value="">-- Select Barangay --</option>';
    }
}


function populateBarangays() {
    var cityId = document.getElementById('city').value;

    if (cityId) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/mdd-properties/dashboard/jsx/managestaff/getbarangays?city=' + cityId, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var barangays = JSON.parse(xhr.responseText);
                var output = '<option value="">-- Select Barangay --</option>';

                for (var i = 0; i < barangays.length; i++) {
                    output += '<option value="' + barangays[i].barangay_id + '">' + barangays[i].barangay + '</option>';
                }

                document.getElementById('barangay').innerHTML = output;
            }
        };
        xhr.send();
    } else {
        document.getElementById('barangay').innerHTML = '<option value="">-- Select Barangay --</option>';
    }
}

$(document).ready(function() {

    var ValidateProjectFormRole = {
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

    var ValidateProjectFormMessage = {
      the_name: {
        required: "The name is required.",
        minlength: "Please provide atleast 3 character.",
        maxlength: "Please provide atleast less than 150 character."
      },

       the_address: {
        required: "The address is required.",
        minlength: "Please provide atleast 3 character.",
        maxlength: "Please provide atleast less than 150 character."
      },

      the_longi: {
        required: "The longitude is required.",
        minlength: "Please provide atleast 3 character.",
        maxlength: "Please provide atleast less than 250 character."
      },
  
      the_lati: {
        required: "The latitude is required.",
        minlength: "Please provide atleast 3 character.",
        maxlength: "Please provide atleast less than 250 character."
      },
      provinceID: {
        required: "The province is required.",
        minlength: "Please provide atleast 1 interger.",
        maxlength: "Please provide atleast less than 3 character.",
        number: "It should be integer."
      },
      city: {
        required: "The city is required.",
        minlength: "Please provide atleast 1 interger.",
        maxlength: "Please provide atleast less than 3 character.",
        number: "It should be integer."
      },
      barangay: {
        required: "The barangay is required.",
        minlength: "Please provide atleast 1 interger.",
        maxlength: "Please provide atleast less than 3 character.",
        number: "It should be integer."
      }
    };

    $('#TheProjectForm').validate({
        rules: ValidateProjectFormRole,
        messages: ValidateProjectFormMessage,
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.appendTo($('#' + element.attr('id') + '-error'));
        }
    });

  });


$("#the_name").keyup(function() 
    {
      var Text = $(this).val();
      
      Text = Text.toLowerCase();
      
      var regExp = /[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g;

      Text = Text.replace(regExp,'-');

      $("#the_slug").val(Text);        
    });

</script>

@endsection