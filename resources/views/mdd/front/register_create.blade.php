@extends('mdd.front.body.iomaster')
@section('iocontent')

<section class="ecom-wc ecom-wc__full ecom-bg-cover" style="background-image: {{ url('mdd/assets/images/mdd-logo/logo.png') }}">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-6 col-12">
                        <div class="ecom-wc__form">
                            <div class="ecom-wc__form-inner">
<h3 class="ecom-wc__form-title ecom-wc__form-title__one">Create Account 

	@if ($message = Session::get('success'))
		<span class="text-success"> <img src="{{ url('mdd/front/img/icons8-done.svg') }}" alt="success"><strong> Success : </strong> {{ $message }} </span>
	@endif 

	@if ($errors->any())
		<span class="text-success"><strong>Whoops!</strong>  There were some problems with your input. </span>
	@endif

	
	<span>Your email address will not be published. Required fields are marked *</span>
</h3>
                                <!-- Sign in Form -->
<form class="ecom-wc__form-main p-0" action="{{ route('ioregister_submit') }}" method="post" id="RegisterForm">
	@csrf
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="form-group homec-form-input">
                <label class="ecom-wc__form-label mg-btm-10">Display Name*</label>
                <span id="f_name-error" class="error"></span>
                <div class="form-group__input">
                    <input class="ecom-wc__form-input" type="text" name="f_name" id="f_name">
                </div>
            </div>
        </div>

		<div class="col-xxl-12 col-lg-12 col-12">
            <div class="form-group homec-form-input">
                <label class="ecom-wc__form-label mg-btm-10">Email Address*</label>
                <span id="e_mail-error" class="error"></span>
                <div class="form-group__input">
                    <input class="ecom-wc__form-input" type="email" name="e_mail" id="e_mail">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
             <!-- Form Group -->
            <div class="form-group homec-form-input">
                <label class="ecom-wc__form-label mg-btm-10">Password*</label>
                <span id="hintpassword-error" class="error"></span>
                <div class="form-group__input">
                    <input class="ecom-wc__form-input"  id="hintpassword" type="password" name="hintpassword" >
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <!-- Form Group -->
           <div class="form-group homec-form-input">
               <label class="ecom-wc__form-label mg-btm-10">Re-Password*</label>
               <span id="confirm-error" class="error"></span>
               <div class="form-group__input">
                   <input class="ecom-wc__form-input"  id="confirm" type="password" name="confirm" >
               </div>
           </div>
       </div>
    </div>
    <!-- Form Group -->
    <div class="form-group form-mg-top-30">
        <div class="ecom-wc__button ecom-wc__button--bottom">
            <button class="homec-btn homec-btn__second" type="submit"><span>Signup</span></button>
            <button class="homec-btn homec-btn__second homec-btn__social" type="submit"><span class="ntfmax-wc__btn-icon"><img src="{{ url('mdd/front/img/google.svg') }}" alt="#"></span><span>Sign In with Google</span></button>
        </div>
    </div>
    <!-- Form Group -->
    <div class="form-group mg-top-20">
        <div class="ecom-wc__bottom">
            <p class="ecom-wc__text">Already have Account? <a href="login.html">Log In</a></p>
        </div>
    </div>
</form>	
                                <!-- End Sign in Form -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 d-none d-lg-block ">
                        <div class="ecom-wc__inner homec-bg-cover" style="background-image: url(' {{ asset('mdd/front/img/welcome-bg.svg') }} ');">
                            <!-- Logo -->
                            <div class="ecom-wc__logo">
                                <a href="index.html"><img src=" {{ url('mdd/assets/images/mdd-logo/logo.png') }}" alt="#"></a>
                            </div>
							<div class="ecom-wc__inside">
								<!-- Middle Image -->
								<div class="ecom-wc__middle">
									<a href="index.html"><img src="https://placehold.co/600x600" alt="#"></a>
									{{-- <div class="ecom-wc__countdown--title">120<span>Brunches</span></div>
									<div class="ecom-wc__countdown--title ecom-wc__countdown--title--v2">150k<span>Built Hose</span></div> --}}
								</div>
								<div class="ecom-wc__footer">
									<ul class="ecom-wc__footer--list list-none">
										<li><a href="#">Terms & Condition</a></li>
										<li><a href="#">Privacy Policy</a></li>
										<li><a href="#">Help</a></li>
									</ul>
									<div class="ecom-wc__footer--languages">
										<select class="ecom-wc__footer--language">
											<option data-display="english">English</option>
											<option value="2">Bengali</option>
											<option value="3">Frances</option>
										</select>
									</div>
								</div>
								<p class="ecom-wc__footer--text">@ 2023 MDD Properties. All Right Reserved. </p>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<script>

$(document).ready(function() {

    var ValidateMyInput = {
          f_name: {
            required: true,
            minlength:3,
        	maxlength:20
          },

                   e_mail: {
                    required: true,
                    minlength:3,
        			maxlength:50
                  },

                       hintpassword: {
                        required: true,
                        minlength:8,
        				maxlength:20
                      },

                           confirm: {
                            required: true,
                            equalTo: '#hintpassword'
                          }

  };

    var ValidateMyMessage = {
      f_name: {
        required: "This is required.",
        minlength: "atleast 3 character.",
        maxlength: "atleast less than 50 character."
      },
      e_mail: {
        required: "This is required.",
         minlength: "atleast 3 character.",
        maxlength: "atleast less than 50 character."
      },
      hintpassword: {
        required: "This is required.",
        minlength: "atleast 8 character.",
        maxlength: "atleast less than 20 character."
      },
      confirm: {
        required: "This is required.",
        equalTo: "Passwords do not match"
      }
    };

    $('#RegisterForm').validate({
        rules: ValidateMyInput,
        messages: ValidateMyMessage,
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.appendTo($('#' + element.attr('id') + '-error'));
        }
    });

  });

</script>

@endsection