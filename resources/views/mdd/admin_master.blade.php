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

    <style>
        .form-control {
            border: 1px solid #000 !important;
        }
    </style>

</head>

    <body class="nk-body bg-lighter npc-general has-sidebar ">

    <div class="nk-app-root">
        <div class="nk-main">
                @include('mdd.body.sidebar')
            <div class="nk-wrap ">
                @include('mdd.body.header')
                    @yield('mdd')
                @include('mdd.body.footer')
            </div>
        </div>
    </div>
    <script src="{{ url('mdd/assets/js/bundle.js?ver=3.1.2') }}"></script>
    <script src="{{ url('mdd/assets/js/scripts.js?ver=3.1.2') }}"></script>
    <script src="{{ url('mdd/assets/js/charts/gd-default.js?ver=3.1.2') }}"></script>



    </body>
</html>