@extends('mdd.front_master')
@section('content')

	<section class="breadcrumbs__content" style="background-image: url('{{ url('mdd/front/img/bread-overlay.jpg') }}');">
			<!-- <div class="homec-overlay"></div> -->
			<div class="container">
				<div class="row">
					<!-- Breadcrumb-Content -->
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
            <div class="col-12">

<div class="homec-submit-form" data-select2-id="select2-data-39-uvox">
								<h4 class="homec-submit-form__title">My Credential</h4>
								<div class="homec-submit-form__inner" data-select2-id="select2-data-38-a6ei">
									<div class="row" data-select2-id="select2-data-37-wy0u">
<div class="col-12">
	<!-- Single Form Element -->

	@if(!$Client)




<form action="{{ route('mycredential_create') }}" method="post" id="CredentialForm">
@csrf

<span class="text-danger">Your credentials will not be published and secure in our end. Required fields are marked with *</span>
<div class="mg-top-20">
</div>
</div>
									
										
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


{{-- <div class="col-lg-4 col-md-6 col-12">											
<div class="mg-top-20">
	<h4 class="homec-submit-form__heading">Province* <span id="err_province" class="error"></span></h4>
	<div class="form-group homec-form-input">
		<select class="homec-form-select"   aria-hidden="true" name="province" id="province">
			<option value="">Family House</option>
			<option value="">Modern Villa</option>
		</select>
</div>
</div>
</div>


<div class="col-lg-4 col-md-6 col-12">											
<div class="mg-top-20">
	<h4 class="homec-submit-form__heading">City* <span id="err_city" class="error"></span></h4>
	<div class="form-group homec-form-input">
		<select class="homec-form-select" aria-hidden="true" name="city" id="city">
			<option value="">Family House</option>
			<option value="">Modern Villa</option>
		</select>
</div>
</div>
</div>

<div class="col-lg-4 col-md-6 col-12">											
<div class="mg-top-20">
	<h4 class="homec-submit-form__heading">Barangay* <span id="err_barangay" class="error"></span></h4>
	<div class="form-group homec-form-input">
		<select class="homec-form-select" aria-hidden="true" name="barangay" id="barangay">
			<option value="">Family House</option>
			<option value="">Modern Villa</option>
		</select>
</div>
</div>
</div> --}}


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


									</div>
								
								</div>
							</div>


							<div class="row">
                                <div class="col-12 d-flex justify-content-end mg-top-40">
                                    <button type="submit" class="homec-btn homec-btn__second"><span>Save Information</span></button>
                                </div>
                            </div>


                </form>
            <div id="errorContainer"></div>

            @else 
				<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Email</th>
      <th scope="col">Phone No.</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>{{ $Client->fname.' '. $Client->mname .'. ' . $Client->lname}}</td>
      <td>{{ $Client->address }}</td>
      <td>{{ $Client->email }}</td>
      <td>{{ $Client->phone_number }}</td>
      <td><a href="" class="btn btn btn-primary btn-sm" role="button">Edit</a></td>
    </tr>
  </tbody>
  	<tr>
      <th colspan="6"></th>
    </tr>
  	<tr>
      <th colspan="6">My Properties</th>
    </tr>
  <thead>
   <tr>
      <th scope="col">Proprty</th>
      <th scope="col">Block</th>
      <th scope="col">Lot</th>
      <th scope="col">LotArea</th>
      <th scope="col">Last Payment</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>{{ $Client->fname.' '. $Client->mname .'. ' . $Client->lname}}</td>
      <td>{{ $Client->address }}</td>
      <td>{{ $Client->email }}</td>
      <td>{{ $Client->phone_number }}</td>
      <td><a href="" class="btn btn btn-primary btn-sm" role="button">Edit</a></td>
    </tr>
  </tbody>
	<tr>
      <th colspan="6">Payment History</th>
    </tr>
</table>


            @endif
    </div>
        </div>
            </div>
</section>






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
  var the_bdate	 = document.getElementById('bdate');
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
  var err_bdate	 = document.getElementById('err_bdate');
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
	var bdate	 = the_bdate.value.trim();	
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
@endsection