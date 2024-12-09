<!DOCTYPE html>
<html lang="en" class="h-100">

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
    <title>Đăng nhập admin</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/swiper/css/swiper-bundle.min.css') }}">
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="page-wraper">

        <!-- Content -->
        <div class="browse-job login-style3">
            <!-- Coming Soon -->
            <div class="bg-img-fix overflow-hidden"
                style="background:#fff url({{ asset('assets/admin/images/background/bg6.jpg') }}); height: 100vh;">
                <div class="row gx-0">
                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 vh-100 bg-login ">
                        <div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside"
                            style="max-height: 653px;" tabindex="0">
                            <div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;"
                                dir="ltr">
                                <div class="login-form style-2">


                                    <div class="card-body">
                                        <div class="logo-header">
                                            <a href="index.html" class="logo"><img src="images/logo/logo-full.png"
                                                    alt="" class="width-230 light-logo"></a>
                                            <a href="index.html" class="logo"><img
                                                    src="images/logo/logofull-white.png" alt=""
                                                    class="width-230 dark-logo"></a>
                                        </div>

                                        <nav>
                                            <div class="nav nav-tabs border-bottom-0" id="nav-tab" role="tablist">

                                                <div class="tab-content w-100" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-personal"
                                                        role="tabpanel" aria-labelledby="nav-personal-tab">
                                                        <form action="{{ route('admin.login.submit') }}" method="POST" class="dz-form pb-3">
                                                            @csrf
                                                            <h3 class="form-title m-t0">Thông tin cá nhân</h3>
                                                            <div class="dz-separator-outer m-b5">
                                                                <div class="dz-separator bg-primary style-liner"></div>
                                                            </div>
                                                            <p>Nhập địa chỉ email và mật khẩu của bạn.</p>

                                                            <!-- Email input -->
                                                            <div class="form-group mb-3">
                                                                <input type="email" name="email" class="form-control" placeholder="Nhập email" required>
                                                            </div>

                                                            <!-- Password input -->
                                                            <div class="form-group mb-3">
                                                                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu" required>
                                                            </div>

                                                            <!-- Remember me checkbox -->
                                                            <div class="form-group text-left mb-4 forget-main">
                                                                <div class="d-flex justify-content-between mb-2">
                                                                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                                                                    <span class="form-check d-inline-block">
                                                                        <input type="checkbox" class="form-check-input" id="check1" name="remember">
                                                                        <label class="form-check-label" for="check1">Ghi nhớ tôi</label>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>

                                            </div>
                                        </nav>
                                    </div>
                                    <div class="card-footer">
                                        <div class=" bottom-footer clearfix m-t10 m-b20 row text-center">
                                            <div class="col-lg-12 text-center">
                                                <span> © Copyright by
                                                    <a href="javascript:void(0);">tt</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div id="mCSB_1_scrollbar_vertical"
                                class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical"
                                style="display: block;">
                                <div class="mCSB_draggercontainer">
                                    <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
                                        style="position: absolute; min-height: 0px; display: block; height: 652px; max-height: 643px; top: 0px;">
                                        <div class="mCSB_dragger_bar" style="line-height: 0px;"></div>
                                        <div class="mCSB_draggerRail"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/admin/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/deznav-init.js') }}"></script>
    <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
    <script src="{{ asset('assets/admin/js/demo.js') }}"></script>
    <script src="{{ asset('assets/admin/js/styleSwitcher.js') }}"></script>
</body>

</html>
