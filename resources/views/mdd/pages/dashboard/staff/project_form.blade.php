@extends('mdd.admin_master')
@section('mdd')

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">


<div class="nk-block-head nk-block-head-sm">
<div class="nk-block-between g-3">
    <div class="nk-block-head-content">
        <h3 class="nk-block-title page-title">MDD Project Site</h3>
    </div>


<div class="nk-block-head-content">
    <a href="{{ route('ms-projects') }}"  type="button" class="btn btn-primary">Back</a>
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
        <h5 class="card-title">Project Form</h5>
    </div>
    <form action="#">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Name</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="the_name" name="the_name" value="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-label" for="email-address-1">Longitude</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="the_longi" name="the_longi" value="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-label" for="phone-no-1">Description</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="the_description" name="the_description" value="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-label" for="pay-amount-1">Latitude</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="the_lati" name="the_lati" value="">
                    </div>
                </div>
            </div>


            <div class="col-lg-6">
                <div class="form-control-select">
                     <label class="form-label" for="default-06">Province</label>
                    <select class="form-control" name="provinceID" id="provinceID" onchange="populateCities()">
                        <option value="">-- Select Province --</option>
                    </select>
                </div>
            </div>


             <div class="col-lg-6">
                <div class="form-control-select">
                     <label class="form-label" for="default-06">City</label>
                    <select class="form-control" name="city" id="city" onchange="populateBarangays()">
                        <option value="">-- Select City --</option>
                    </select>
                </div>
            </div>


             <div class="col-lg-6">
                <div class="form-control-select">
                     <label class="form-label" for="default-06">Barangay</label>
                    <select class="form-control" name="barangay" id="barangay" >
                        <option value="">-- Select Barangay --</option>
                    </select>
                </div>
            </div>







            <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label">Upload Images</label>
                    <div class="form-control-wrap">
                        <div class="form-file">
                            <input type="file" multiple="" class="form-file-input" id="customMultipleFiles">
                            <label class="form-file-label" for="customMultipleFiles"></label>
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
          

<!-- new modal!-->

<div class="modal fade zoom" tabindex="-1" id="modalNew">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">New Status</h5>
            </div>

<form action="{{ route('status-form-create') }}" method="POST" id="ValidateNewStatus">
    @csrf
<div class="modal-body">
    <div class="form-group">
        <div class="form-control-wrap">
            <input type="text" class="form-control form-control-outlined"  id="stat_name" name="stat_name">
            <label class="form-label-outlined" for="outlined">Enter Status Name</label>
        </div>
    </div>

    <div class="form-group">
        <div class="form-control-wrap">
            <input type="text" class="form-control form-control-outlined"  id="stat_desc" name="stat_desc">
            <label class="form-label-outlined" for="outlined">Enter Description</label>
        </div>
    </div>

</div>
            <div class="modal-footer bg-light">
                <button type="submit" class="btn btn-primary" id="SaveInfo">Save Information</button>
            </div>
</form>

        </div>
    </div>
</div>

<!-- end of new modal!-->

<!-- edit modal!-->

<div class="modal fade zoom" tabindex="-1" id="ActionEditModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Update Status</h5>
            </div>

<form action="{{ route('status-form-update') }}" method="POST" id="ValidateEditStatus">
    @csrf
<div class="modal-body">

<div class="form-group">
    <label class="form-label" for="default-01">Status Name</label>
    <div class="form-control-wrap">
        <input type="hidden" class="form-control" id="the_id" name="the_id" required>
        <input type="text" class="form-control" id="the_name" name="the_name" required>
    </div>
</div>

<div class="form-group">
    <label class="form-label" for="default-01">Status Description</label>
    <div class="form-control-wrap">
        <input type="text" class="form-control" id="the_description" name="the_description" required>
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

<div class="modal fade zoom" tabindex="-1" id="deleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Delete Status</h5>
            </div>

<form action="{{ route('status-form-delete') }}" method="POST" id="ValidateDeleteStatus">
    @csrf
<div class="modal-body">

    <div class="alert-text">
        <h6 class="text-danger">Are you sure you want to delete?</h6>
    </div>
    <input type="hidden" class="form-control" id="del_id" name="del_id">

</div>
<div class="modal-footer bg-light">
    <button type="submit" class="btn btn-danger" id="SaveInfo">Delete Information</button>
</div>

</form>

        </div>
    </div>
</div>

<!-- end of delete modal!-->





<script type="text/javascript">



function populateProvinces() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://127.0.0.1:8000/mdd-properties/dashboard/jsx/managestaff/getssssProvinces', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var province = JSON.parse(xhr.responseText);
            var output = '<option value="">-- Select Country --</option>';

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
        xhr.open('GET', 'http://127.0.0.1:8000/getcities?province=' + provinceId, true);
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
        xhr.open('GET', '/getbarangay?city=' + cityId, true);
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
        // document.getElementById('barangay').innerHTML = '<option value="">-- Select Barangay --</option>';
    }
}











$(document).ready(function () {

const selectElement = document.querySelector('#the_province');

    selectElement.addEventListener('change', (event) => {
  
    const selectedOption = event.target.value;

    $.ajax({
            type: "GET",
            url: "http://127.0.0.1:8000/mdd-properties/dashboard/jsx/managestaff/select-location_province_to_city/"+selectedOption,
            success: function(response) {
                $('#del_id').val(response.statuses.id);
            }
        });

    });

});




$(document).ready(function () {
    $(document).on('click','.modDelete', function() {

        var ids = $(this).val();
        $('#deleteModal').modal('show');
        $.ajax({
            type: "GET",
            url: "http://127.0.0.1:8000/mdd-properties/dashboard/jsx/managestatus/status-form-edit/"+ids,
            success: function(response) {
                $('#del_id').val(response.statuses.id);
            }
        });
    });
});



$(function() {

  $("#ValidateNewStatus").validate({
    rules: {
      stat_name: {
        required: true,
        minlength:3,
        maxlength:50
      },
      stat_desc: {
        required: true,
        minlength:6,
        maxlength:50
      } 

  },
    messages: {
      stat_name: {
        required: "Please enter new status name.",
        minlength: "New status name at least 3 character.",
        maxlength: "New status name at least 30 max of character."
      },
      stat_desc: {
        required: "Please enter new status description.",
        minlength: "New status description at least 6 character.",
        maxlength: "New status description at least 50 max of character."
      }
    },

  });
});

$(function() {

  $("#ValidateEditStatus").validate({
    rules: {
      the_name: {
        required: true,
        minlength:3,
        maxlength:50
      },
      the_description: {
        required: true,
        minlength:6,
        maxlength:50
      } 

  },
    messages: {
      the_name: {
        required: "Please enter new status name.",
        minlength: "New status name at least 3 character.",
        maxlength: "New status name at least 30 max of character."
      },
      the_description: {
        required: "Please enter new status description.",
        minlength: "New status description at least 6 character.",
        maxlength: "New status description at least 50 max of character."
      }
    },

  });
});

</script>

@endsection