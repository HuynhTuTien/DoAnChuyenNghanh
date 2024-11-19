<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from html.imjol.com/khadyo/khadyo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Jun 2024 10:15:42 GMT -->

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
    <link rel="icon" href="https://nhahangvietxua.com/wp-content/uploads/2024/06/cropped-logo-32x32.png" sizes="32x32" />
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
    <!-- Add Toastr CSS in the <head> section -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    @stack('css')
</head>

<body style="font-family: 'Arial', sans-serif; ">
    <!-- Preloader Starts -->
    {{-- <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
    </div> --}}


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
    <!-- Add Toastr JS before the closing </body> tag -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>


<!-- Mirrored from html.imjol.com/khadyo/khadyo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Jun 2024 10:16:17 GMT -->

</html>
