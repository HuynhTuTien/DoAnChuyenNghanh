@extends('layouts.clients')
@section('title', 'Đăng nhập')
@section('content')
    <div class="banner-area breadcrumb-area padding-top-120 padding-bottom-90">
        <div class="bread-shapes">
            <span class="b-shape-1 item-bounce"><img src="{{ asset('assets/client/images/img/5.png') }}" alt=""></span>
            <span class="b-shape-2"><img src="{{ asset('assets/client/images/img/6.png') }}" alt=""></span>
            <span class="b-shape-3"><img src="{{ asset('assets/client/images/img/7.png') }}" alt=""></span>
            <span class="b-shape-4"><img src="{{ asset('assets/client/images/img/9.png') }}" alt=""></span>
            <span class="b-shape-5"><img src="{{ asset('assets/client/images/shapes/18.png') }}" alt=""></span>
            <span class="b-shape-6 item-animateOne"><img src="{{ asset('assets/client/images/img/7.png') }}"
                    alt=""></span>
        </div>
        <div class="container padding-top-120">
            <div class="row justify-content-center">
                <nav aria-label="breadcrumb">
                    <h2 class="page-title">Trang Đăng Nhập</h2>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a> / <a href="{{ route('login') }}">Đăng
                                nhập</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- contact-form-area -->
    <section class="about-area about-area2 writeto-us login-area padding-top-120 signup-area padding-bottom-60">
        <div class="form-shapes">
            <span class="fs1 item-animateOne"><img src="{{ asset('assets/client/images/shapes/1.png') }}"
                    alt=""></span>
            <span class="fs2 item-bounce"><img src="{{ asset('assets/client/images/shapes/12.png') }}"
                    alt=""></span>
            <span class="fs3"><img src="{{ asset('assets/client/images/shapes/13.png') }}" alt=""></span>
            <span class="fs4 item-bounce"><img src="{{ asset('assets/client/images/shapes/26.png') }}"
                    alt=""></span>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12  wow fadeInUp">
                    <div class="about-left">
                        <div class="about-l-shapes">
                            <span class="als-1"><img src="{{ asset('assets/client/images/shapes/2.png') }}"
                                    alt=""></span>
                        </div>
                        <div class="row">
                            <div
                                class="col-lg-4 col-md-4 col-sm-4 col-4 d-flex align-items-end justify-content-end margin-bottom-20">
                                <div class="about-gallery-1">
                                    <img src="{{ asset('assets/client/images/gallery/1.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-8 margin-bottom-20">
                                <div class="about-gallery-2">
                                    <img src="{{ asset('assets/client/images/gallery/2.jpg') }}" alt="">

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="about-gallery-3">
                                    <img src="{{ asset('assets/client/images/gallery/3.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-5 d-flex align-items-stretch ">
                                <div class="about-gallery-5 text-center">
                                    <img src="{{ asset('assets/client/images/gallery/5.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 wow fadeInUp">
                    <div class="contact-form-area login-form-area signup-form-area">
                        <h3>đăng nhập <span>Tài khoản của bạn</span></h3>
                        <x-guest-layout>
                            {{-- @if ($errors->any())
                                <script>
                                    @foreach ($errors->all() as $error)
                                        toastr.error("{{ $error }}");
                                    @endforeach
                                </script>
                            @endif --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row">
                                    <div class="google-button">
                                        <a href="{{ route('auth.google') }}" class="btn google-btn"><span><i
                                                    class="fab fa-google"></i></span> Google</a>
                                    </div>
                                    {{-- <div class="col">
                                        <a href="{{ route('login.facebook') }}" style="background-color: blue;"
                                            class="btn d-flex align-items-center justify-content-center">
                                            <i class="fab fa-facebook-f me-2"></i> Facebook
                                        </a>
                                    </div> --}}
                                </div>

                                <div class="mt-4">
                                    <x-label for="email" value="{{ __('Email') }}" />
                                    <x-input id="email" type="email" name="email" :value="old('email')"
                                        placeholder="email của bạn" required autofocus autocomplete="username" />
                                </div>

                                <div class="mt-2">
                                    <x-label for="password" value="{{ __('Mật khẩu') }}" />
                                    <x-input id="password" placeholder="nhập mật khẩu" type="password" name="password"
                                        required autocomplete="current-password" />
                                </div>

                                <div class="flex content-center items-center mt-3">
                                    @if (route('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                            href="{{ route('password.request') }}">
                                            {{ __('Quên mật khẩu?') }}
                                        </a>
                                    @endif

                                    <a href="{{ route('register') }}">{{ __('Đăng ký') }}</a>

                                    <x-button type="submit" class="btn ms-4">
                                        {{ __('Đăng nhập') }}
                                    </x-button>
                                </div>

                            </form>
                        </x-guest-layout>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
