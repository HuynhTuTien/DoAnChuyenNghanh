<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from salero.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Jul 2024 05:55:32 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Salero:Restaurant Admin Bootstrap 5 Template">
    <meta property="og:title" content="Salero:Restaurant Admin Bootstrap 5 Template">
    <meta property="og:description" content="Salero:Restaurant Admin Bootstrap 5 Template">
    <meta property="og:image" content="page-error-404.html">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>@yield('title', 'Dashboard')</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">

    <!-- Add Toastr CSS in the <head> section -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
    <!-- Thêm vào phần head của file HTML -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    @stack('css')
</head>

<body>

    {{-- <div id="preloader">
        <div class="loader-wrapper">
            <div class="loader-box">
                <div class="icon">
                    <i class="fas fa-utensils"></i>
                </div>
            </div>
        </div>
    </div> --}}

    <div id="main-wrapper">
        <x-admin.header></x-admin.header>

        <x-admin.sidebar></x-admin.sidebar>

        @yield('content')

        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h5 class="modal-title">Add Customer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label">Seller Mobile Number</label>
                            <input type="number" class="form-control mb-3" id="exampleInputEmail1" placeholder="Number">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control mb-3" id="exampleInputEmail2" placeholder=" Email">
                            <label class="form-label">Amount</label>
                            <input type="number" class="form-control mb-3" id="exampleInputEmail3" placeholder="Amount">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <x-admin.footer></x-admin.footer>
    </div>

    {{-- ckeditor5 --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    @stack('script')


    <!-- Required vendors -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    <script src="{{ asset('assets/admin/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
    <!-- Add Toastr JS before the closing </body> tag -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</body>


</html>