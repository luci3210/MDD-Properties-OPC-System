<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>MDD Properties</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ url('mdd/assets/css/dashlite.css?ver=3.1.2') }}">
    <link id="skin-default" rel="stylesheet" href="{{ url('mdd/assets/css/theme.css?ver=3.1.2') }}">
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