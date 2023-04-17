@extends('mdd.body.pp_auth.master')
@section('mdd_left')
<div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-md">
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white w-lg-45">
                            <div class="nk-block nk-block-middle nk-auth-body">
                                
<div class="nk-block-head">
    <div class="nk-block-head-content">
        <h4 class="nk-block-title">Create New Account</h4>


@if ($message = Session::get('success'))
    <div class="alert alert-success alert-icon">
        <em class="icon ni ni-check-circle"></em> <strong>Success</strong>. {{ $message }}
    </div>
 @endif 

 @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-icon">
        <em class="icon ni ni-cross-circle"></em> <strong>Failed</strong>. {{ $message }}
    </div>
 @endif 

    </div>
</div>

<form action="{{ route('private_register.submit') }}" method="post">
    @csrf
        <div class="form-group">
            <label class="form-label" for="name">Full Name 
                @error('fullname')                
                    <span id="fv-sex-error" class="validate_input">{{ $message }}</span>
                 @enderror

            </label>
            <div class="form-control-wrap">
                <input type="text" class="form-control form-control-lg @error('fullname') is-invalid @enderror" name="fullname" value="" placeholder="Enter your full name">
            </div>
        </div>


<div class="form-group">
<label class="form-label" for="fva-topics">Department
     @error('department')                
        <span id="fv-sex-error" class="validate_input">{{ $message }}</span>
    @enderror
</label>
<div class="form-control-wrap ">
    <select class="form-select form-select-lg" name="department" data-placeholder="Select department">
        <option label="Select Department" value="" ></option>
        @foreach($department as $list)
            <option value="{{ $list->ids }}" >{{ $list->department }}</option>
        @endforeach
    </select>
</div>
</div>

<div class="form-group">
    <label class="form-label" for="email">Valid E-mail Address
        @error('email')                
        <span id="fv-sex-error" class="validate_input">{{ $message }}</span>
        @enderror
    </label>
    <div class="form-control-wrap">
        <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" placeholder="Enter your email address or username">
    </div>
</div>
<div class="form-group">
    <label class="form-label" for="password">Password
        @error('password')                
        <span id="fv-sex-error" class="validate_input">{{ $message }}</span>
        @enderror
    </label>
    <div class="form-control-wrap">
        <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
            <em class="passcode-icon icon-show icon ni ni-eye"></em>
            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
        </a>
        <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Enter your password">
    </div>
</div>

<div class="form-group">
    <div class="custom-control custom-control-xs custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="checkbox">
        <label class="custom-control-label" for="checkbox">I agree to MDD Properties <a tabindex="-1" href="#">Privacy Policy</a> &amp; <a tabindex="-1" href="#"> Terms.</a>
        </label>
    </div>
</div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">Register</button>
                                    </div>
                                </form><!-- form -->
                                <div class="form-note-s2 pt-4"> Already have an account ? 
                                    <a href="{{ route('mdd-login') }}"><strong>Sign in instead</strong></a>
                                </div>
                                
                            </div><!-- .nk-block -->
                            <div class="nk-block nk-auth-footer">
                                
                                <div class="mt-3">
                                    <p>&copy; 2023 MDD Properties. All Rights Reserved.</p>
                                </div>
                            </div><!-- nk-block -->
                        </div><!-- nk-split-content -->
                        <div class="nk-split-content nk-split-stretch">
                            
                            <div class="mdd-name">
                                <div class="brand-logo pb-4 text-center">
                            <a href="html/index.html" class="logo-link">
                                <img class="logo-light logo-img logo-img-lg" src="{{ url('mdd/assets/images/mdd-logo/logo.png') }}" srcset="./images/logo2x.png 2x" alt="logo">
                                <img class="logo-dark logo-img logo-img-lg" src="{{ url('mdd/assets/images/mdd-logo/logo.png') }}" alt="logo-dark">
                            </a>
                        </div>
                                <h3 style="color:#954195; margin-left: 10px;">MDD Properties OPC</h3>
                            </div>
                            
                        </div><!-- nk-split-content -->
                    </div><!-- nk-split -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>

@endsection
@section('mdd_rigth')

@endsection