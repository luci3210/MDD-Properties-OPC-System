<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Ambe Software">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="MDD Properties">

    <link rel="shortcut icon" href="./images/favicon.png">
    <title>MDD Properties</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <link rel="stylesheet" href="{{ url('mdd/assets/css/dashlite.css?ver=3.1.2') }}">
    <link id="skin-default" rel="stylesheet" href="{{ url('mdd/assets/css/theme.css?ver=3.1.2') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" integrity="sha512-hwwdtOTYkQwW2sedIsbuP1h0mWeJe/hFOfsvNKpRB3CkRxq8EW7QMheec1Sgd8prYxGm1OM9OZcGW7/GUud5Fw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .form-control {
            border: 1px solid #e6e8e9 !important;
        }
        .is-dark {
/*            background: #c27ba3 !important;*/
        }
        .card-bordered {
            border: 1px solid #e6e8e9 !important;   
        }
        .customMargin {
            position: relative;
            top: -30px;
        }

        .form-label {
            position: relative !important;
            left: 15px !important;
            bottom: -19px !important;
            z-index: 1 !important;
            background-color: white;
            padding-left:4px;
            padding-right:4px;
            font-size:11px;
            font-weight:300;
        }
        .form-group {
            position: relative !important;
            top: -30px !important;
        }
        .preview-hr {
            margin-bottom:-5px !important;
            margin-top:15px !important;
            opacity: 1 !important;

        }
        .text-amount {
            font-size:25px !important;
            font-weight:700 !important;
        }
        .invoice-contact ul li {
            padding:0.1rem 0 !important;
        }
        .invoice-desc .title {
            color:#c27ba0 !important;
        }
        .invoice-contact ul .icon {
            color:#c27ba0 !important;
        }
        .invoice-bills .table th {
            color:#c27ba0 !important;
        }
        .overline-title {
            letter-spacing:0 !important;
        }


    </style>

</head>

    <body class="nk-body bg-lighter npc-general has-sidebar ">

    <div class="nk-app-root">
        <div class="nk-main">
            <div class="nk-wrap nk-wrap-nosidebar">
                {{-- @include('mdd.body.casher_head') --}}
                    @yield('mdd')
                {{-- @include('mdd.body.footer') --}}
            </div>
        </div>
    </div>
    <script src="{{ url('mdd/assets/js/bundle.js?ver=3.1.2') }}"></script>
    <script src="{{ url('mdd/assets/js/scripts.js?ver=3.1.2') }}"></script>
    <script src="{{ url('mdd/assets/js/charts/gd-default.js?ver=3.1.2') }}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
</html>