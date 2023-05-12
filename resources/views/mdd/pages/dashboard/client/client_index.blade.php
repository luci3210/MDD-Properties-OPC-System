@extends('mdd.admin_master')
@section('mdd')

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">


<div class="nk-block-head nk-block-head-sm">
<div class="nk-block-between g-3">
    <div class="nk-block-head-content">
        <h3 class="nk-block-title page-title">Clients</h3>
    </div>


<div class="nk-block-head-content">
    <button type="button" class="btn btn-sm btn-dim btn-danger" data-bs-toggle="modal" data-bs-target="#modalNew">New</button>
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


<table class="table table-hover">
  <thead class="table-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Province</th>
      <th scope="col">Birth Date</th>
      <th scope="col">Age</th>
      <th scope="col">Nationality</th>
      <th scope="col">Contact No.</th>
      <th scope="col">Email</th>
      <th scope="col" class="text-center">Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach($clients as $listing)
    <tr style="font-size:13px;">
      <th scope="row">{{ $loop->index + 1 }}</th>
      <td>{{ $listing->lname }} {{ $listing->fname }}, {{ $listing->mname }}</td>
      <td>{{ $listing->address }}</td>
      <td>{{ $listing->provinces }},{{ $listing->cities }},{{ $listing->barangays }}</td>
      <td>{{ $listing->bdate }}</td>
      <td>{{ $listing->age }}</td>
      <td>{{ $listing->nationality }}</td>
      <td>{{ $listing->phone_number }}</td>
      <td>{{ $listing->email }}</td>
      <td style="width:150px;text-align: center;">
        <a href="" class="btn btn-sm btn-dim btn-dark">View Details</a></td>
      
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




<!-- new modal!-->

<div class="modal fade zoom" tabindex="-1" id="modalNew">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">New Client</h5>
            </div>

<form action="{{ route('c-client-create') }}" method="POST" id="TheClientForm">
    @csrf
<div class="modal-body">

<div class="row gy-4">

<div class="col-lg-4 col-sm-6">
    <div class="form-group">
        <div class="form-control-wrap">
            <input type="text" class="form-control form-control-outlined" name="the_lname" id="the_lname">
            <span id="the_lname-error" class="error"></span>
            <label class="form-label-outlined" for="outlined-default">Last Name</label>
        </div>
    </div>
</div>

<div class="col-lg-4 col-sm-6">
    <div class="form-group">
        <div class="form-control-wrap">
            <input type="text" class="form-control form-control-outlined" name="the_fname" id="the_fname">
            <span id="the_fname-error" class="error"></span>
            <label class="form-label-outlined" for="outlined-default">First Name</label>
        </div>
    </div>
</div>

<div class="col-lg-4 col-sm-6">
    <div class="form-group">
        <div class="form-control-wrap">
            <input type="text" class="form-control form-control-outlined" name="the_mname" id="the_mname">
            <span id="the_mname-error" class="error"></span>
            <label class="form-label-outlined" for="outlined-default">Middle Name</label>
        </div>
    </div>
</div>

</div>

<br>
<div class="form-group">
    <div class="form-control-wrap">
        <input type="text" class="form-control form-control-outlined"  id="the_ifmerried" name="the_ifmerried">
        <span id="the_ifmerried-error" class="error"></span>
        <label class="form-label-outlined" for="outlined">If Married, Name of Spouse,(Last Name, First Name, Middle Name)</label>
    </div>
</div>

<div class="form-group">
    <div class="form-control-wrap">
        <input type="text" class="form-control form-control-outlined"  id="the_address" name="the_address">
        <span id="the_address-error" class="error"></span>
        <label class="form-label-outlined" for="outlined">Address</label>
    </div>
</div>




<div class="row gy-4">

<div class="col-lg-4 col-sm-6">
	<div class="form-control-wrap">
	    <select class="form-select js-select2 select2-hidden-accessible"  name="provinceID" id="provinceID" onchange="populateCities()">
	        <option value="">-- Select Province --</option>
	    </select>
	    <span id="provinceID-error" class="error"></span>
	    <label class="form-label-outlined" for="outlined-select">Province</label>
	</div>
</div>


<div class="col-lg-4 col-sm-6">
	<div class="form-control-wrap">
	    <select class="form-select js-select2 select2-hidden-accessible" name="city" id="city" onchange="populateBarangays()">
	        <option value="">-- Select City --</option>
	    </select>
	    <span id="city-error" class="error"></span>
	    <label class="form-label-outlined" for="outlined-select">City</label>
	</div>
</div>


<div class="col-lg-4 col-sm-6">
	<div class="form-control-wrap">
	    <select class="form-select js-select2 select2-hidden-accessible" name="barangay" id="barangay">
	        <option value="">-- Select Barangay --</option>
	    </select>
	    <span id="barangay-error" class="error"></span>
	    <label class="form-label-outlined" for="outlined-select">Barangay</label>
	</div>
</div>

</div>


<br>

<div class="row gy-4">

<div class="col-lg-4 col-sm-6">
    <div class="form-group">
        <div class="form-control-wrap">
            <input type="text" class="form-control form-control-outlined" name="the_bdate" id="the_bdate">
            <span id="the_bdate-error" class="error"></span>
            <label class="form-label-outlined" for="outlined-default">Birth Date</label>
        </div>
    </div>
</div>

<div class="col-lg-4 col-sm-6">
    <div class="form-group">
        <div class="form-control-wrap">
            <input type="text" class="form-control form-control-outlined" name="the_age" id="the_age">
            <span id="the_age-error" class="error"></span>
            <label class="form-label-outlined" for="outlined-default">Age</label>
        </div>
    </div>
</div>

<div class="col-lg-4 col-sm-6">
    <div class="form-group">
        <div class="form-control-wrap">
            <input type="text" class="form-control form-control-outlined" name="the_bplace" id="the_bplace">
            <span id="the_bplace-error" class="error"></span>
            <label class="form-label-outlined" for="outlined-default">Birth Place</label>
        </div>
    </div>
</div>

</div>

<br>

<div class="row gy-4">

<div class="col-lg-4 col-sm-6">
    <div class="form-group">
        <div class="form-control-wrap">
            <input type="text" class="form-control form-control-outlined" name="the_religion" id="the_religion">
            <span id="the_religion-error" class="error"></span>
            <label class="form-label-outlined" for="outlined-default">Religion</label>
        </div>
    </div>
</div>

<div class="col-lg-4 col-sm-6">
    <div class="form-group">
        <div class="form-control-wrap">
            <input type="text" class="form-control form-control-outlined" name="the_national" id="the_national">
            <span id="the_national-error" class="error"></span>
            <label class="form-label-outlined" for="outlined-default">Nationality</label>
        </div>
    </div>
</div>

<div class="col-lg-4 col-sm-6">
    <div class="form-group">
        <div class="form-control-wrap">
            <input type="text" class="form-control form-control-outlined" name="the_civil_stat" id="the_civil_stat">
            <span id="the_civil_stat-error" class="error"></span>
            <label class="form-label-outlined" for="outlined-default">Civil Status</label>
        </div>
    </div>
</div>

</div>


</div>

<div class="modal-footer bg-light">
<button type="submit" class="btn btn-sm btn-dim btn-danger" id="SaveInfo">Save Information</button>
</div>
</form>

        </div>
    </div>
</div>

<!-- end of new modal!-->





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
      the_fname: {
        required: true,
        minlength:3,
        maxlength:150
      },

      the_lname: {
        required: true,
        minlength:3,
        maxlength:250
      },

       the_mname: {
        required: true,
        minlength:3,
        maxlength:250
      },

       the_ifmerried: {
        required: true,
        minlength:3,
        maxlength:250
      },

      the_address: {
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
      },

      the_bdate: {
        required: true,
        minlength:3,
        maxlength:250
      },

      the_age: {
        required: true,
        minlength:3,
        maxlength:250
      },

      the_bplace: {
        required: true,
        minlength:3,
        maxlength:250
      },

      the_religion: {
        required: true,
        minlength:3,
        maxlength:250
      },

      the_national: {
        required: true,
        minlength:3,
        maxlength:250
      },

      the_civil_stat: {
        required: true,
        minlength:3,
        maxlength:250
      },

  };

    var ValidateProjectFormMessage = {
      the_fname: {
        required: "This is required.",
        minlength: "Please provide atleast 3 character.",
        maxlength: "Please provide atleast less than 150 character."
      },
      the_lname: {
        required: "This is required.",
        minlength: "Please provide atleast 3 character.",
        maxlength: "Please provide atleast less than 250 character."
      },
      the_mname: {
        required: "This is required.",
        minlength: "Please provide atleast 3 character.",
        maxlength: "Please provide atleast less than 250 character."
      },
      the_ifmerried: {
        required: "This is required.",
        minlength: "Please provide atleast 3 character.",
        maxlength: "Please provide atleast less than 250 character."
      },
      the_address: {
        required: "This is required.",
        minlength: "Please provide atleast 3 character.",
        maxlength: "Please provide atleast less than 250 character."
      },
      provinceID: {
        required: "This is required.",
        minlength: "Please provide atleast 1 interger.",
        maxlength: "Please provide atleast less than 3 character.",
        number: "It should be integer."
      },
      city: {
        required: "This is required.",
        minlength: "Please provide atleast 1 interger.",
        maxlength: "Please provide atleast less than 3 character.",
        number: "It should be integer."
      },
      barangay: {
        required: "This is required.",
        minlength: "Please provide atleast 1 interger.",
        maxlength: "Please provide atleast less than 3 character.",
        number: "It should be integer."
      },


      the_bdate: {
        required: "This is required.",
        minlength: "Please provide atleast 3 character.",
        maxlength: "Please provide atleast less than 250 character."
      },

      the_age: {
        required: "This is required.",
        minlength: "Please provide atleast 3 character.",
        maxlength: "Please provide atleast less than 250 character."
      },

      the_bplace: {
        required: "This is required.",
        minlength: "Please provide atleast 3 character.",
        maxlength: "Please provide atleast less than 250 character."
      },
      the_religion: {
        required: "This is required.",
        minlength: "Please provide atleast 3 character.",
        maxlength: "Please provide atleast less than 250 character."
      },

      the_national: {
        required: "This is required.",
        minlength: "Please provide atleast 3 character.",
        maxlength: "Please provide atleast less than 250 character."
      },

      the_civil_stat: {
        required: "This is required.",
        minlength: "Please provide atleast 3 character.",
        maxlength: "Please provide atleast less than 250 character."
      }
    };

    $('#TheClientForm').validate({
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