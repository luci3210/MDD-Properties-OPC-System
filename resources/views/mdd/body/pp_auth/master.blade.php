<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link rel="shortcut icon" href="{{ url('mdd/images/favicon.png') }}">
    <title>Auth</title>
    <link rel="stylesheet" href="{{ url('mdd/assets/css/dashlite.css?ver=3.1.2') }}">
    <link id="skin-default" rel="stylesheet" href="{{ url('mdd/assets/css/theme.css?ver=3.1.2') }}">
    <style>
        .validate_input {
            color: #e85347;
            font-size: 11px;
            font-style: italic;
        }
    </style>
</head>

<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        @yield('mdd_left')
    </div>

    <script src="{{ url('mdd/assets/js/bundle.js?ver=3.1.2') }}"></script>
    <script src="{{ url('mdd/assets/js/scripts.js?ver=3.1.2') }}"></script>
    
    <div class="modal fade" tabindex="-1" role="dialog" id="region">
        @yield('mdd_rigth')
    </div>
</body>
</html>