
@extends('mdd.front_master')
@section('content')

<section class="breadcrumbs__content" style="background-image: url('{{ url('mdd/front/img/bread-overlay.jpg') }}');">
	<div class="container">
		<div class="row">
			<div class="col-12">

				<div class="breadcrumb-content">
					<ul class="breadcrumb__menu list-none">
						<li><a href="index.html">Account</a></li>
						<li class="active"><a href="add-property.html">My Credential</a></li>
					</ul>
				</div>	
			</div>
		</div>
	</div>
</section>

<section class="pd-top-80 pd-btm-80">
  <div class="container">
    <div class="row">

@if(!$Client)
    <span class="text-danger" style="font-size: 16px;">
      You need to fill-in required fields below before anything else. Your credentials will not be published and secure in our end. Required fields are marked with *
    </span>
@endif

    <div class="col-12">



  @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> {{ $message }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif 

  @if ($message = Session::get('failed'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Success!</strong> {{ $message }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif 

  @if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Whoops!</strong> There were some problems with your input.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif


@if(!$Client)

<div class="homec-submit-form mg-top-40">
  <h4 class="homec-submit-form__title">
    My Credentials
    <span class="text-danger" style="font-size: 14px;">
      Your credentials will not be published and secure in our end. Required fields are marked with *
    </span>
  </h4>

  <div id="errorContainer"></div>

    <form action="{{ route('mycredential_create') }}" method="post" id="CredentialForm">
    @csrf

    <div class="homec-submit-form__inner">
    <div class="row">

    <div class="col-lg-4 col-md-6 col-12">
      <div class="mg-top-20">
        <h4 class="homec-submit-form__heading">First Name* <span id="err_fname" class="error"></span></h4>
        <div class="form-group homec-form-input">
          <input type="text" name="fname" id="fname">
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 col-12">
      <div class="mg-top-20">
        <h4 class="homec-submit-form__heading">Last Name* <span id="err_lname" class="error"></span></h4>

        <div class="form-group homec-form-input">
          <input type="text" name="lname" id="lname">
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 col-12">
      <div class="mg-top-20">
        <h4 class="homec-submit-form__heading">Middle Initial* <span id="err_mname" class="error"></span></h4>
        <div class="form-group homec-form-input">
          <input type="text" name="mname" id="mname">
        </div>
      </div>
    </div>

    <div class="col-lg-8 col-md-6 col-12">
      <div class="mg-top-20">
        <h4 class="homec-submit-form__heading">Address* <span id="err_address" class="error"></span></h4>
        <div class="form-group homec-form-input">
          <input type="text" name="address" id="address">
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 col-12">
      <div class="mg-top-20">
        <h4 class="homec-submit-form__heading">If Marriege* <span id="err_ifmarriege" class="error"></span></h4>
        <div class="form-group homec-form-input">
          <input type="text" name="ifmarriege" id="ifmarriege">
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 col-12">
  <div class="mg-top-20">
    <h4 class="homec-submit-form__heading">Birth Date* <span id="err_bdate" class="error"></span></h4>
    <div class="form-group homec-form-input">
      <input type="text" name="bdate" id="bdate">
    </div>
  </div>
</div>
<div class="col-lg-4 col-md-6 col-12">
  <div class="mg-top-20">
    <h4 class="homec-submit-form__heading">Age* <span id="err_age" class="error"></span></h4>
    <div class="form-group homec-form-input">
      <input type="text" name="age" id="age">
    </div>
  </div>
</div>
<div class="col-lg-4 col-md-6 col-12">
  <div class="mg-top-20">
    <h4 class="homec-submit-form__heading">Place of Birth* <span id="err_pbirth" class="error"></span></h4>
    <div class="form-group homec-form-input">
      <input type="text" name="pbirth" id="pbirth">
    </div>
  </div>
</div>


<div class="col-lg-4 col-md-6 col-12">
  <div class="mg-top-20">
    <h4 class="homec-submit-form__heading">Relion* <span id="err_religion" class="error"></span></h4>
    <div class="form-group homec-form-input">
      <input type="text" name="religion" id="religion">
    </div>
  </div>
</div>

<div class="col-lg-4 col-md-6 col-12">
  <div class="mg-top-20">
    <h4 class="homec-submit-form__heading">Nationality* <span id="err_nationality" class="error"></span></h4>
    <div class="form-group homec-form-input">
      <input type="text" name="nationality" id="nationality">
    </div>
  </div>
</div>


    <div class="col-12 d-flex justify-content-end mg-top-40">
      <button type="submit" class="homec-btn homec-btn__second"><span>Save Information</span></button>
    </div>
    
        </div>
  </div>

    </form>
</div>

@else


<div class="homec-submit-form mg-top-40">
  <h4 class="homec-submit-form__title">
    My Credentials
  </h4>

<div id="errorContainer"></div>
  <div class="homec-submit-form__inner">
    <div class="row">


  <table class="table">
  <thead>
    <tr>
      <th scope="col">Account</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Email</th>
      <th scope="col">Age</th>
      <th scope="col">BirthDate</th>
      <th scope="col">...</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>{{ $Client->uqid }}</th>
      <td>{{ $Client->fname.' '. $Client->mname .'. ' . $Client->lname}}</td>
      <td>{{ $Client->address }}</td>
      <td>{{ $Client->email }}</td>
      <td>{{ $Client->age }}</td>
      <td>{{ $Client->bdate }}</td>
      <td><strong>...<strong></td>
      <td>
        <button type="button"  value="{{ $Client->cid }}" class="btn btn btn-primary btn-sm ModEdit">Edit</button>
      </td>


    </tr>

  </tbody>
</table>



    
    </div>
  </div>
</div>


@endif


<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <form action="{{ route('mycredential_update') }}" method="post" id="myCredentialUpdateForm">
        @csrf
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">My Credentials</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       

        <div class="row g-3">

        <div class="col-sm-4">
          <label class="form-label">First Name <span id="errfname" class="error"></span></label>
          <input type="text" class="form-control" id="the_fname" name="the_fname">
          <input type="hidden" class="form-control" id="the_id" name="the_id">
        </div>
        <div class="col-sm-4">
          <label class="form-label">Last Name <span id="errlname" class="error"></span></label>
          <input type="text" class="form-control" id="the_lname" name="the_lname">
        </div>
        <div class="col-sm-4">
          <label class="form-label">Middle Name <span id="errmname" class="error"></span></label>
          <input type="text" class="form-control" id="the_mname" name="the_mname">
        </div>

        <div class="col-sm-8">
          <label class="form-label">Address <span id="erraddress" class="error"></span></label>
          <input type="text" class="form-control" id="the_address" name="the_address">
        </div>

        <div class="col-sm-4">
          <label class="form-label">If Marriege <span id="errifmarriege" class="error"></span></label>
          <input type="text" class="form-control" id="the_ifmarriege" name="the_ifmarriege">
        </div>

        <div class="col-sm-4">
          <label class="form-label">Birth Date <span id="errbdate" class="error"></span></label>
          <input type="text" class="form-control" id="the_bdate" name="the_bdate">
        </div>

        <div class="col-sm-4">
          <label class="form-label">Age <span id="errage" class="error"></span></label>
          <input type="text" class="form-control" id="the_age" name="the_age">
        </div>

        <div class="col-sm-4">
          <label class="form-label">Birth Place <span id="errpbirth" class="error"></span></label>
          <input type="text" class="form-control" id="the_pbirth" name="the_pbirth">
        </div>

        <div class="col-sm-4">
          <label class="form-label">Religion <span id="errreligion" class="error"></span></label>
          <input type="text" class="form-control" id="the_religion" name="the_religion">
        </div>  

         <div class="col-sm-4">
          <label class="form-label">Nationality <span id="errnationality" class="error"></span></label>
          <input type="text" class="form-control" id="the_nationality" name="the_nationality">
        </div>  

        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Information</button>
      </div>
    </form>
    </div>
  </div>
</div>

      </div>
    </div>
  </div>
</section>


@if(!$Client)
<script>
document.getElementById('CredentialForm').addEventListener('submit', function(e) {
  e.preventDefault(); 

  var the_fname = document.getElementById('fname');
  var the_lname = document.getElementById('lname');
  var the_mname = document.getElementById('mname');
  var the_address = document.getElementById('address');
  var the_ifmarriege = document.getElementById('ifmarriege');
  // var the_province = document.getElementById('province');
  // var the_city = document.getElementById('city');
  // var the_barangay = document.getElementById('barangay');
  var the_bdate  = document.getElementById('bdate');
  var the_age = document.getElementById('age');
  var the_pbirth = document.getElementById('pbirth');
  var the_religion = document.getElementById('religion');
  var the_nationality = document.getElementById('nationality');

  var err_fname = document.getElementById('err_fname');
  var err_lname = document.getElementById('err_lname');
  var err_mname = document.getElementById('err_mname');
  var err_address = document.getElementById('err_address');
  var err_ifmarriege = document.getElementById('err_ifmarriege');
  // var err_province = document.getElementById('err_province');
  // var err_city = document.getElementById('err_city');
  // var err_barangay = document.getElementById('err_barangay');
  var err_bdate  = document.getElementById('err_bdate');
  var err_age = document.getElementById('err_age');
  var err_pbirth = document.getElementById('err_pbirth');
  var err_religion = document.getElementById('err_religion');
  var err_nationality = document.getElementById('err_nationality');
  var errorContainer = document.getElementById('errorContainer');

    err_fname.textContent = '';
  err_lname.textContent = '';
  err_mname.textContent = '';
  err_address.textContent = '';
  err_ifmarriege.textContent = '';
  // err_province.textContent = '';
  // err_city.textContent = '';
  // err_barangay.textContent = '';
  err_bdate.textContent = '';
  err_age.textContent = '';
  err_pbirth.textContent = '';
  err_religion.textContent = '';
  err_nationality.textContent = '';
    errorContainer.textContent = '';

  var fname = the_fname.value.trim();
  var lname = the_lname.value.trim();
  var mname = the_mname.value.trim();
  var address = the_address.value.trim();
  var ifmarriege = the_ifmarriege.value.trim();
  // var province = the_province.value.trim();
  // var city = the_city.value.trim();
  // var barangay = the_barangay.value.trim();
  var bdate  = the_bdate.value.trim();  
  var age = the_age.value.trim();
  var pbirth = the_pbirth.value.trim();
  var religion = the_religion.value.trim();
  var nationality = the_nationality.value.trim();

  if (fname === '') {
    showError(the_fname, err_fname, 'This is required.');
  } else if (!validateLength(fname, 2, 20)) {
    showError(the_fname, err_fname, 'Must be between 2 and 20 characters.');
  } else if (!validateSpecialCharacters(fname)) {
    showError(the_fname, err_fname, 'Cannot contain special characters.');
  }

  if (lname === '') {
    showError(the_lname, err_lname, 'This is required.');
  } else if (!validateLength(lname, 2, 20)) {
    showError(the_lname, err_lname, 'Must be between 2 and 20 characters.');
  } else if (!validateSpecialCharacters(lname)) {
    showError(the_lname, err_lname, 'Cannot contain special characters.');
  }

  if (mname === '') {
    showError(the_mname, err_mname, 'This is required.');
  } else if (!validateLength(mname, 1, 1)) {
    showError(the_mname, err_mname, 'Must be 1 characters.');
  } else if (!validateSpecialCharacters(mname)) {
    showError(the_mname, err_mname, 'Cannot contain special characters.');
  }

  if (address === '') {
    showError(the_address, err_address, 'This is required.');
  } else if (!validateLength(address, 2, 20)) {
    showError(the_address, err_address, 'Last Name must be between 2 and 20 characters.');
  } else if (!validateSpecialCharacters(address)) {
    showError(the_address, err_address, 'Last Name cannot contain special characters.');
  }

  if (ifmarriege === '') {
    showError(the_ifmarriege, err_ifmarriege, 'This is required.');
  } else if (!validateLength(ifmarriege, 2, 20)) {
    showError(the_ifmarriege, err_ifmarriege, 'Last Name must be between 2 and 20 characters.');
  } else if (!validateSpecialCharacters(ifmarriege)) {
    showError(the_ifmarriege, err_ifmarriege, 'Last Name cannot contain special characters.');
  }

  // if (province === '') {
  //   showError(the_province, err_province, 'Last Name is required.');
  // } else if (!validateLength(province, 2, 20)) {
  //   showError(the_province, err_province, 'Last Name must be between 2 and 20 characters.');
  // } else if (!validateSpecialCharacters(province)) {
  //   showError(the_province, err_province, 'Last Name cannot contain special characters.');
  // }

  // if (city === '') {
  //   showError(the_city, err_city, 'Last Name is required.');
  // } else if (!validateLength(city, 2, 20)) {
  //   showError(the_city, err_city, 'Last Name must be between 2 and 20 characters.');
  // } else if (!validateSpecialCharacters(city)) {
  //   showError(the_city, err_city, 'Last Name cannot contain special characters.');
  // }

  // if (barangay === '') {
  //   showError(the_barangay, err_barangay, 'Last Name is required.');
  // } else if (!validateLength(barangay, 2, 20)) {
  //   showError(the_barangay, err_barangay, 'Last Name must be between 2 and 20 characters.');
  // } else if (!validateSpecialCharacters(barangay)) {
  //   showError(the_barangay, err_barangay, 'Last Name cannot contain special characters.');
  // }

  if (bdate === '') {
    showError(the_bdate, err_bdate, 'This is required.');
  } else if (!validateLength(bdate, 2, 20)) {
    showError(the_bdate, err_bdate, 'Last Name must be between 2 and 20 characters.');
  } else if (!validateSpecialCharacters(bdate)) {
    showError(the_bdate, err_bdate, 'Last Name cannot contain special characters.');
  }

  if (age === '') {
    showError(the_age, err_age, 'This is required.');
  } else if (!validateLength(age, 2, 20)) {
    showError(the_age, err_age, 'Last Name must be between 2 and 20 characters.');
  } else if (!validateSpecialCharacters(age)) {
    showError(the_age, err_age, 'Last Name cannot contain special characters.');
  }

  if (pbirth === '') {
    showError(the_pbirth, err_pbirth, 'This is required.');
  } else if (!validateLength(pbirth, 2, 20)) {
    showError(the_pbirth, err_pbirth, 'Last Name must be between 2 and 20 characters.');
  } else if (!validateSpecialCharacters(pbirth)) {
    showError(the_pbirth, err_pbirth, 'Last Name cannot contain special characters.');
  }

  if (religion === '') {
    showError(the_religion, err_religion, 'This is required.');
  } else if (!validateLength(religion, 2, 20)) {
    showError(the_religion, err_religion, 'Last Name must be between 2 and 20 characters.');
  } else if (!validateSpecialCharacters(religion)) {
    showError(the_religion, err_religion, 'Last Name cannot contain special characters.');
  }

   if (nationality === '') {
    showError(the_nationality, err_nationality, 'This is required.');
  } else if (!validateLength(nationality, 2, 20)) {
    showError(the_nationality, err_nationality, 'Last Name must be between 2 and 20 characters.');
  } else if (!validateSpecialCharacters(nationality)) {
    showError(the_nationality, err_nationality, 'Last Name cannot contain special characters.');
  }

  if (!err_fname.textContent && !err_lname.textContent && !err_mname.textContent && !err_address.textContent && !err_ifmarriege.textContent && !err_bdate.textContent && !err_age.textContent && !err_pbirth.textContent && !err_religion.textContent && !err_nationality.textContent)  {
    submitForm();
  }

});

function submitForm() {
  var form = document.getElementById('CredentialForm');
  form.submit();
}

function showError(input, errorElement, errorMessage) {
  errorElement.textContent = errorMessage;
  input.classList.add('error-input');
}

function validateLength(text, minLength, maxLength) {
  return text.length >= minLength && text.length <= maxLength;
}

function validateSpecialCharacters(text) {
  var specialCharPattern = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
  return !specialCharPattern.test(text);
}


document.getElementById('fname').addEventListener('input', function() {
  clearError(this, document.getElementById('err_fname'));
});

document.getElementById('lname').addEventListener('input', function() {
  clearError(this, document.getElementById('err_lname'));
});

document.getElementById('mname').addEventListener('input', function() {
  clearError(this, document.getElementById('err_mname'));
});

document.getElementById('address').addEventListener('input', function() {
  clearError(this, document.getElementById('err_address'));
});

document.getElementById('ifmarriege').addEventListener('input', function() {
  clearError(this, document.getElementById('err_ifmarriege'));
});

// document.getElementById('province').addEventListener('input', function() {
//   clearError(this, document.getElementById('err_province'));
// });

// document.getElementById('city').addEventListener('input', function() {
//   clearError(this, document.getElementById('err_city'));
// });

// document.getElementById('barangay').addEventListener('input', function() {
//   clearError(this, document.getElementById('err_barangay'));
// });

document.getElementById('bdate').addEventListener('input', function() {
  clearError(this, document.getElementById('err_bdate'));
});

document.getElementById('age').addEventListener('input', function() {
  clearError(this, document.getElementById('err_age'));
});

document.getElementById('pbirth').addEventListener('input', function() {
  clearError(this, document.getElementById('err_pbirth'));
});

document.getElementById('religion').addEventListener('input', function() {
  clearError(this, document.getElementById('err_religion'));
});

document.getElementById('nationality').addEventListener('input', function() {
  clearError(this, document.getElementById('err_nationality'));
});

function clearError(input, errorElement) {
  if (input.classList.contains('error-input')) {
    input.classList.remove('error-input');
    errorElement.textContent = '';
  }
}
</script>
@else 
<script>

$(document).ready(function () {
    $(document).on('click','.ModEdit', function() {

        var ids = $(this).val();

        $('#editModal').modal('show');
        $.ajax({
            type: "GET",
            url: "http://127.0.0.1:8000/home/account/getCredential-accnt/"+ids,
            success: function(response) {
                 $('#the_id').val(response.ClientCreds.cid);
                 $('#the_fname').val(response.ClientCreds.fname);
                 $('#the_lname').val(response.ClientCreds.lname);
                 $('#the_mname').val(response.ClientCreds.mname);
                 $('#the_address').val(response.ClientCreds.address);
                 $('#the_ifmarriege').val(response.ClientCreds.ifmarried);
                 $('#the_bdate').val(response.ClientCreds.bdate);
                 $('#the_age').val(response.ClientCreds.age);
                 $('#the_pbirth').val(response.ClientCreds.bplace);
                 $('#the_religion').val(response.ClientCreds.religion);
                 $('#the_nationality').val(response.ClientCreds.nationality);
            }
        });
    });
});



document.getElementById('myCredentialUpdateForm').addEventListener('submit', function(e) {
  e.preventDefault(); 

  var val_fname = document.getElementById('the_fname');
  var val_lname = document.getElementById('the_lname');
  var val_mname = document.getElementById('the_mname');
  var val_address = document.getElementById('the_address');
  var val_ifmarriege = document.getElementById('the_ifmarriege');
  var val_bdate  = document.getElementById('the_bdate');
  var val_age = document.getElementById('the_age');
  var val_pbirth = document.getElementById('the_pbirth');
  var val_religion = document.getElementById('the_religion');
  var val_nationality = document.getElementById('the_nationality');

  var errfname = document.getElementById('errfname');
  var errlname = document.getElementById('errlname');
  var errmname = document.getElementById('errmname');
  var erraddress = document.getElementById('erraddress');
  var errifmarriege = document.getElementById('errifmarriege');
  var errbdate  = document.getElementById('errbdate');
  var errage = document.getElementById('errage');
  var errpbirth = document.getElementById('errpbirth');
  var errreligion = document.getElementById('errreligion');
  var errnationality = document.getElementById('errnationality');

  errfname.textContent = '';
  errlname.textContent = '';
  errmname.textContent = '';
  erraddress.textContent = '';
  errifmarriege.textContent = '';
  errbdate.textContent = '';
  errage.textContent = '';
  errpbirth.textContent = '';
  errreligion.textContent = '';
  errnationality.textContent = '';

  var fname = val_fname.value.trim();
  var lname = val_lname.value.trim();
  var mname = val_mname.value.trim();
  var address = val_address.value.trim();
  var ifmarriege = val_ifmarriege.value.trim();
  var bdate  = val_bdate.value.trim();  
  var age = val_age.value.trim();
  var pbirth = val_pbirth.value.trim();
  var religion = val_religion.value.trim();
  var nationality = val_nationality.value.trim();

  if (fname === '') {
    showError(val_fname, errfname, 'This is required.');
  } else if (!validateLength(fname, 2, 20)) {
    showError(val_fname, errfname, 'Must be between 2 and 20 characters.');
  } else if (!validateSpecialCharacters(fname)) {
    showError(val_fname, errfname, 'Cannot contain special characters.');
  }

  if (lname === '') {
    showError(val_lname, errlname, 'This is required.');
  } else if (!validateLength(lname, 2, 20)) {
    showError(val_lname, errlname, 'Must be between 2 and 20 characters.');
  } else if (!validateSpecialCharacters(lname)) {
    showError(val_lname, errlname, 'Cannot contain special characters.');
  }

  if (mname === '') {
    showError(val_mname, errmname, 'This is required.');
  } else if (!validateLength(mname, 1, 1)) {
    showError(val_mname, errmname, 'Must be 1 characters.');
  } else if (!validateSpecialCharacters(mname)) {
    showError(val_mname, errmname, 'Cannot contain special characters.');
  }

  if (address === '') {
    showError(val_address, erraddress, 'This is required.');
  } else if (!validateLength(address, 2, 20)) {
    showError(val_address, erraddress, 'Last Name must be between 2 and 20 characters.');
  } else if (!validateSpecialCharacters(address)) {
    showError(val_address, erraddress, 'Last Name cannot contain special characters.');
  }

  if (ifmarriege === '') {
    showError(val_ifmarriege, errifmarriege, 'This is required.');
  } else if (!validateLength(ifmarriege, 2, 20)) {
    showError(val_ifmarriege, errifmarriege, 'Last Name must be between 2 and 20 characters.');
  } else if (!validateSpecialCharacters(ifmarriege)) {
    showError(val_ifmarriege, errifmarriege, 'Last Name cannot contain special characters.');
  }

  if (bdate === '') {
    showError(val_bdate, errbdate, 'This is required.');
  } else if (!validateLength(bdate, 2, 20)) {
    showError(val_bdate, errbdate, 'Last Name must be between 2 and 20 characters.');
  } else if (!validateSpecialCharacters(bdate)) {
    showError(val_bdate, errbdate, 'Last Name cannot contain special characters.');
  }

  if (age === '') {
    showError(val_age, errage, 'This is required.');
  } else if (!validateLength(age, 2, 20)) {
    showError(val_age, errage, 'Last Name must be between 2 and 20 characters.');
  } else if (!validateSpecialCharacters(age)) {
    showError(val_age, errage, 'Last Name cannot contain special characters.');
  }

  if (pbirth === '') {
    showError(val_pbirth, errpbirth, 'This is required.');
  } else if (!validateLength(pbirth, 2, 20)) {
    showError(val_pbirth, errpbirth, 'Last Name must be between 2 and 20 characters.');
  } else if (!validateSpecialCharacters(pbirth)) {
    showError(val_pbirth, errpbirth, 'Last Name cannot contain special characters.');
  }

  if (religion === '') {
    showError(val_religion, errreligion, 'This is required.');
  } else if (!validateLength(religion, 2, 20)) {
    showError(val_religion, errreligion, 'Last Name must be between 2 and 20 characters.');
  } else if (!validateSpecialCharacters(religion)) {
    showError(val_religion, errreligion, 'Last Name cannot contain special characters.');
  }

   if (nationality === '') {
    showError(val_nationality, errnationality, 'This is required.');
  } else if (!validateLength(nationality, 2, 20)) {
    showError(val_nationality, errnationality, 'Last Name must be between 2 and 20 characters.');
  } else if (!validateSpecialCharacters(nationality)) {
    showError(val_nationality, errnationality, 'Last Name cannot contain special characters.');
  }

  if (!errfname.textContent && !errlname.textContent && !errmname.textContent && !erraddress.textContent && !errifmarriege.textContent && !errbdate.textContent && !errage.textContent && !errpbirth.textContent && !errreligion.textContent && !errnationality.textContent)  {
    submitForm();
  }

});

function submitForm() {
  var form = document.getElementById('myCredentialUpdateForm');
  form.submit();
}

function showError(input, errorElement, errorMessage) {
  errorElement.textContent = errorMessage;
  input.classList.add('error-input');
}

function validateLength(text, minLength, maxLength) {
  return text.length >= minLength && text.length <= maxLength;
}

function validateSpecialCharacters(text) {
  var specialCharPattern = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
  return !specialCharPattern.test(text);
}


document.getElementById('the_fname').addEventListener('input', function() {
  clearError(this, document.getElementById('errfname'));
});

document.getElementById('the_lname').addEventListener('input', function() {
  clearError(this, document.getElementById('errlname'));
});

document.getElementById('the_mname').addEventListener('input', function() {
  clearError(this, document.getElementById('errmname'));
});

document.getElementById('the_address').addEventListener('input', function() {
  clearError(this, document.getElementById('erraddress'));
});

document.getElementById('the_ifmarriege').addEventListener('input', function() {
  clearError(this, document.getElementById('errifmarriege'));
});

document.getElementById('the_bdate').addEventListener('input', function() {
  clearError(this, document.getElementById('errbdate'));
});

document.getElementById('the_age').addEventListener('input', function() {
  clearError(this, document.getElementById('errage'));
});

document.getElementById('the_pbirth').addEventListener('input', function() {
  clearError(this, document.getElementById('errpbirth'));
});

document.getElementById('the_religion').addEventListener('input', function() {
  clearError(this, document.getElementById('errreligion'));
});

document.getElementById('the_nationality').addEventListener('input', function() {
  clearError(this, document.getElementById('errnationality'));
});

function clearError(input, errorElement) {
  if (input.classList.contains('error-input')) {
    input.classList.remove('error-input');
    errorElement.textContent = '';
  }
}

</script>
@endif
@endsection

