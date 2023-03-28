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
                                <div class="brand-logo pb-5">
                                    <a href="html/index.html" class="logo-link">
                                        <img class="logo-light logo-img logo-img-lg" src="{{ url('mdd/assets/images/logo.png') }}" srcset="{{ url('mdd/assets/images/logo2x.png 2x') }}" alt="logo">
                                        <img class="logo-dark logo-img logo-img-lg" src="{{ url('mdd/assets/images/logo-dark.png') }}" srcset="{{ url('mdd/assets/images/logo-dark2x.png 2x') }}" alt="logo-dark">
                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Create New Account</h5>
                                       
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
                <input type="text" class="form-control form-control-lg" name="fullname" value="" placeholder="Enter your full name">
            </div>
        </div>


<div class="form-group">
<label class="form-label" for="fva-topics">Department
     @error('department')                
        <span id="fv-sex-error" class="validate_input">{{ $message }}</span>
    @enderror
</label>
<div class="form-control-wrap ">
    <select class="form-select form-select-lg js-select2 select2-hidden-accessible valid" id="fva-topics" name="department" data-placeholder="Select department" data-select2-id="fva-topics" tabindex="-1" aria-hidden="true" aria-invalid="false">
        <option label="empty" value="" data-select2-id="4"></option>
        <option value="fva-gq" data-select2-id="8">Finance</option>
        <option value="fva-tq" data-select2-id="9">Casher</option>
        <option value="fva-ab" data-select2-id="10">Broker</option>
        <option value="fva-ab" data-select2-id="11">Agent</option>
    </select>
</div>
</div>

<div class="form-group">
    <label class="form-label" for="email">Email or Username
        @error('email')                
        <span id="fv-sex-error" class="validate_input">{{ $message }}</span>
        @enderror
    </label>
    <div class="form-control-wrap">
        <input type="text" class="form-control form-control-lg" name="email" placeholder="Enter your email address or username">
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
        <input type="password" class="form-control form-control-lg" name="password" placeholder="Enter your password">
    </div>
</div>

<div class="form-group">
    <div class="custom-control custom-control-xs custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="checkbox">
        <label class="custom-control-label" for="checkbox">I agree to Dashlite <a tabindex="-1" href="#">Privacy Policy</a> &amp; <a tabindex="-1" href="#"> Terms.</a></label>
    </div>
</div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">Register</button>
                                    </div>
                                </form><!-- form -->
                                <div class="form-note-s2 pt-4"> Already have an account ? <a href="html/pages/auths/auth-login-v3.html"><strong>Sign in instead</strong></a>
                                </div>
                                
                            </div><!-- .nk-block -->
                            <div class="nk-block nk-auth-footer">
                                
                                <div class="mt-3">
                                    <p>&copy; 2023 MDD Properties. All Rights Reserved.</p>
                                </div>
                            </div><!-- nk-block -->
                        </div><!-- nk-split-content -->
                        <div class="nk-split-content nk-split-stretch bg-abstract"></div><!-- nk-split-content -->
                    </div><!-- nk-split -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>

@endsection
@section('mdd_rigth')
<div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title mb-4">Select Your Country</h5>
                    <div class="nk-country-region">
                        <ul class="country-list text-center gy-2">
                            <li>
                                <a href="#" class="country-item">
                                    <img src="{{ url('mdd/assets/images/flags/arg.png') }}" alt="" class="country-flag">
                                    <span class="country-name">Argentina</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="{{ url('mdd/assets/images/flags/aus.png') }}" alt="" class="country-flag">
                                    <span class="country-name">Australia</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="{{ url('mdd/assets/images/flags/bangladesh.png') }}" alt="" class="country-flag">
                                    <span class="country-name">Bangladesh</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="{{ url('mdd/assets/images/flags/canada.png') }}" alt="" class="country-flag">
                                    <span class="country-name">Canada <small>(English)</small></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="{{ url('mdd/assets/images/flags/china.png') }}" alt="" class="country-flag">
                                    <span class="country-name">Centrafricaine</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="{{ url('mdd/assets/images/flags/china.png') }}" alt="" class="country-flag">
                                    <span class="country-name">China</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="{{ url('mdd/assets/images/flags/french.png') }}" alt="" class="country-flag">
                                    <span class="country-name">France</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="{{ url('mdd/assets/images/flags/germany.png') }}" alt="" class="country-flag">
                                    <span class="country-name">Germany</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="{{ url('mdd/assets/images/flags/iran.png') }}" alt="" class="country-flag">
                                    <span class="country-name">Iran</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="{{ url('mdd/assets/images/flags/italy.png') }}" alt="" class="country-flag">
                                    <span class="country-name">Italy</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="{{ url('mdd/assets/images/flags/mexico.png') }}" alt="" class="country-flag">
                                    <span class="country-name">México</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="{{ url('mdd/assets/images/flags/philipine.png') }}" alt="" class="country-flag">
                                    <span class="country-name">Philippines</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="{{ url('mdd/assets/images/flags/portugal.png') }}" alt="" class="country-flag">
                                    <span class="country-name">Portugal</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="{{ url('mdd/assets/images/flags/s-africa.png') }}" alt="" class="country-flag">
                                    <span class="country-name">South Africa</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="{{ url('mdd/assets/images/flags/spanish.png') }}" alt="" class="country-flag">
                                    <span class="country-name">Spain</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="{{ url('mdd/assets/images/flags/switzerland.png') }}" alt="" class="country-flag">
                                    <span class="country-name">Switzerland</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="{{ url('mdd/assets/images/flags/uk.png') }}" alt="" class="country-flag">
                                    <span class="country-name">United Kingdom</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="{{ url('mdd/assets/images/flags/english.png') }}" alt="" class="country-flag">
                                    <span class="country-name">United State</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .modal-content -->
        </div>
@endsection