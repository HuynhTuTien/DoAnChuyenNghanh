<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Page Title -->
    <title> @yield('title', 'Trang chủ') </title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="favicon.png" />
    <link rel="icon" href="https://cdn-icons-png.freepik.com/512/2454/2454219.png" sizes="40x40" />
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/meanmenu.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/style.css') }}" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    @stack('css')
</head>

<body style="font-family: 'Arial', sans-serif; ">

    <!-- header -->
    <x-client.header></x-client.header>

    @yield('content')


    <x-client.footer></x-client.footer>


    <!-- ToTop Button -->
    <button class="scrollup"><i class="fas fa-angle-up"></i></button>

    <!-- Javascript Files -->
    @stack('script')
    <script src="{{ asset('assets/client/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/vendor/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/vendor/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/vendor/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/vendor/countdown.js') }}"></script>
    <script src="{{ asset('assets/client/js/vendor/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/vendor/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/client/js/vendor/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/vendor/easing.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/vendor/wow.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>

</html>
