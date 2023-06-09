@extends('mdd.body.pp_auth.master')
@section('mdd_left')


<div class="nk-main">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <a href="html/index.html" class="logo-link">
                                <img class="logo-light logo-img logo-img-lg" src="{{ url('mdd/assets/images/mdd-logo/logo-wb.png') }}" srcset="./images/logo2x.png 2x" alt="logo">
                                <img class="logo-dark logo-img logo-img-lg" src="{{ url('mdd/assets/images/mdd-logo/logo-wb.png') }}" alt="logo-dark">
                            </a>
                        </div>
@if (session('status'))
    <div class="example-alert">
        <div class="alert alert-danger alert-icon alert-dismissible">
            <em class="icon ni ni-cross-circle"></em> <strong>Opps!</strong>! {{ session('status') }} <button class="close" data-bs-dismiss="alert"></button>
        </div>
    </div><br>
 @endif

<div class="card card-bordered">
    <div class="card-inner card-inner-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">MDD Properties Staff login</h4>
                <div class="nk-block-des">
                </div>
            </div>
        </div>

<form action="{{ route('mdd-validate-login') }}" method="POST">
    @csrf

    <div class="form-group">
        <div class="form-label-group">
            <label class="form-label" for="default-01">Email</label>
        </div>
        <div class="form-control-wrap">
            <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg" id="default-01" placeholder="Enter your email address" autofocus>
        </div>
    </div>

    <div class="form-group">
        <div class="form-label-group">
            <label class="form-label" for="password">Password</label>
        </div>
        <div class="form-control-wrap">
            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
            </a>
            <input type="password" name="password" class="form-control form-control-lg"  required autocomplete="current-password" placeholder="Enter your password">
        </div>

        <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
    </div>
</form>


                                <div class="form-note-s2 text-center pt-4"> New on our platform? 
                                    <a href="{{ route('staff_register') }}">Create an account</a> / 

                                    <a href="#">Forgot  Password</a>
                                </div>
                                {{-- <div class="text-center pt-4 pb-3">
                                    <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
                                </div>
                                <ul class="nav justify-center gx-4">
                                    <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Create an account</a></li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                    <div class="nk-footer nk-auth-footer-full">
                        <div class="container wide-lg">
                            <div class="row g-3">
                                <div class="col-lg-6 order-lg-last">
                                    <ul class="nav nav-sm justify-content-center justify-content-lg-end">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Terms &amp; Condition</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Privacy Policy</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <div class="nk-block-content text-center text-lg-start">
                                        <p class="text-soft">© 2023 MDD Properties. All Rights Reserved.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>


@endsection