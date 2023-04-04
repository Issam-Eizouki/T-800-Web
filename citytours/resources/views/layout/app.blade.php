<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Citytours - Premium site template for city tours agencies, transfers and tickets.">
    <meta name="author" content="Ansonika">
    <title>Strasbourg City Tours  @stack('pagename')</title>

    <base href="{{ asset('') }}">
    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon2.png" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- Google Web Font -->
    <link href="https://fonts.googleapis.com/css2?family=Gochi+Hand&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Common CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/vendors.css" rel="stylesheet">
    <link href="css/colors/color-aqua.css" rel="stylesheet">
    <link href="css/alerts.css" rel="stylesheet">

    @stack('css')

    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>
<body>
    <!-- Preload -->
    <div id="preloader">
        <div class="sk-spinner sk-spinner-wave">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div>

    <!-- Mobile menu overlay mask -->
    <div class="layer"></div>

    @include('layout.header')

    @stack('content')

    @include('layout.footer')

    <div id="toTop"></div><!-- Back to top button -->

    @if (!auth()->check())
        @include('auth.login')
        @include('auth.register')
        @include('auth.forgot')
    @endif

    <!-- Common scripts -->
    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/common_scripts_min.js"></script>
    <script src="js/functions.js"></script>
    <script src="js/jquery.selectbox-0.2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/autoComplete.min.js"></script>
    <script src="js/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js"></script>

    <!-- Specific scripts -->
    @if (!auth()->check())
    <script src="js/auth_validation.js"></script>
    <script src="custom/js/register.js"></script>
    <script src="custom/js/login.js"></script>
    <script src="custom/js/forgot.js"></script>
    @endif

    <!-- Cookie bar script -->
    <script src="js/jquery.cookiebar.js"></script>
    <script>
        $(document).ready(function(){
        'use strict';
            $.cookieBar({
                fixed: true,
                message: "{{ __('text.cookie.message') }}",
                acceptText: "{{ __('text.cookie.accept') }}",
                policyText: "{{ __('text.cookie.policy') }}", //Text on Privacy Policy button
                policyURL: '#', //URL of Privacy Policy
                expireDays: 1,
            });
        });

        @if (Session::has('function'))
            @if (Session::get('function') == 'login')
                $('#access_link').click();
            @endif
            @if (Session::get('function') == 'register')
                $('#register_link').click();
            @endif
            @if (Session::get('function') == 'forgot')
                $('#forgot_link').click();
            @endif
        @endif
        @if (Session::has('error'))
            $.notify(
                {
                    title: '<strong>Failed!</strong>',
                    message: "{{ ' '.Session::get('error') }}",
                },
                { type: 'danger', delay: 4500, z_index: 999999, }
            );
        @endif
        @if (Session::has('success'))
            $.notify(
                {
                    title: '<strong>Success!</strong>',
                    message: "{{ ' '.Session::get('success') }}",
                },
                { type: 'success', delay: 4500, z_index: 999999, }
            );
        @endif
        @if (Session::has('info'))
            $.notify(
                {
                    title: '<strong>Info!</strong>',
                    message: "{{ ' '.Session::get('info') }}",
                },
                { type: 'info', delay: 4500, z_index: 999999, }
            );
        @endif
    </script>

    @stack('js')
</body>
