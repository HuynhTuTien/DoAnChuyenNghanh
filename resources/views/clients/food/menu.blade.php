@extends('layouts.clients')
@section('content')
    <!-- breadcrumb-area -->
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
                    <h2 class="page-title">Thực đơn món ăn</h2>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="/">Trang chủ </a> / <a href="{{ route('menu') }}">Thực đơn</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <style>
        .logo_menu {
            width: 66px !important;
        }
    </style>
    <!-- food-items countdown -->
    <div class="foods-counter menus-area">
        <div class="container">
            <div class="row foods-wrapper menus-wrapper">
                <div class="col-lg-3 col-md-6">
                    <div class="single-food single-menus">
                        <img src="{{ asset('assets/client/images/menu-item/menu2.png') }}" alt="">
                        <h6>Giao hàng siêu nhanh</h6>
                        <p>Giao hàng miễn phí tại địa điểm của bạn</p>
                        <a href="#">Đặt hàng ngay</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-food single-menus">
                        <img src="{{ asset('assets/client/images/menu-item/menu1.png') }}" alt="">
                        <h6>Chất lượng tốt nhất 100%</h6>
                        <p>Chúng tôi cung cấp thực phẩm chất lượng tốt nhất</p>
                        <a href="#">Đặt hàng ngay</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-food single-menus">
                        <img src="{{ asset('assets/client/images/menu-item/menu3.png') }}" alt="">
                        <h6>Đảm bảo hoàn tiền</h6>
                        <p>Đảm bảo hoàn tiền 100% khi món ăn xảy ra lỗi</p>
                        <a href="#">Đặt hàng ngay</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-food single-menus">
                        <img src="{{ asset('assets/client/images/menu-item/menu4.png') }}" alt="">
                        <h6>Thực đơn món ăn ngon</h6>
                        <p>Thực phẩm Khan cung cấp thực phẩm tốt nhất</p>
                        <a href="#">Đặt hàng ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- chicken tab-area -->
    <section class="menu-area pizza-area burger-area chicken-area padding-top-40">
        <div class="menu-i-shapes">
            <span class="bleft"><img src="{{ asset('assets/client/images/menu-item/bleft.png') }}" alt=""></span>
        </div>
        <div class="container">
            <div class="common-title-area text-center padding-40">
                <h2>thực đơn món ăn<span></span></h2>
            </div>
            <!-- menu-nav-wrapper -->
            <div class="menu-nav-wrapper">
                <div class="container  d-flex justify-content-center">
                    <div class="row">
                        @php
                            $isFirst = true;
                        @endphp

                        <ul class="nav" id="myTab" role="tablist">
                            <!-- menu-nav-1 -->
                            @foreach ($categories as $category)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link{{ $isFirst ? ' active' : '' }}" id="food-{{ $category->id }}"
                                        data-bs-toggle="tab" data-bs-target="#cfood-{{ $category->id }}" type="button"
                                        role="tab" aria-controls="food-{{ $category->id }}"
                                        aria-selected="{{ $isFirst ? 'true' : 'false' }}">
                                        <div class="single-menu-nav pizza-single-menu-nav text-center">
                                            <div class="menu-img margin-bottom-10">
                                                <img class="logo_menu"
                                                    src="{{ asset('storage/images/' . $category->image) }}" alt="">
                                            </div>
                                            <h6>{{ $category->name }}</h6>
                                            <span class="g-s-4"><img
                                                    src="{{ asset('assets/client/images/shapes/10.png') }}"
                                                    alt=""></span>
                                            <span class="g-s-5"><img
                                                    src="{{ asset('assets/client/images/shapes/14.png') }}"
                                                    alt=""></span>
                                        </div>
                                    </button>
                                    @php
                                        $isFirst = false;
                                    @endphp
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- menu-items-wrapper -->
            <div class="tab-content" id="nav-tabContent">
                <!-- menu-items-2 -->
                @foreach ($categories as $category)
                    <div class="tab-pane fade{{ $loop->first ? ' show active' : '' }}" id="cfood-{{ $category->id }}"
                        role="tabpanel" aria-labelledby="food-{{ $category->id }}">
                        <div class="menu-items-wrapper pizza-items-wrapper margin-top-50 m-2">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        @foreach ($category->dishes as $dish)
                                            <div class="col-lg-6 col-md-6 mb-4">
                                                <div class="row g-1">
                                                    <div class="col-12 single-menu-item d-flex ">
                                                        <div class="menu-img" style="max-width: 120px; max-height: 120px; overflow: hidden; border-radius: 10px;">
                                                            <a href="{{ route('dishDetail', $dish->id) }}">
                                                                <img
                                                                    src="{{ asset('storage/images/' . $dish->image) }}"
                                                                    alt="{{ $dish->name }}"
                                                                    class="img-fluid"
                                                                    style="width: 100%; height: 100%; object-fit: cover;">
                                                            </a>
                                                        </div>
                                                        <div class="menu-content ms-3" style="flex: 1; word-wrap: break-word; overflow-wrap: break-word;">
                                                            <h6>
                                                                <a href="{{ route('dishDetail', $dish->id) }}" style="white-space: normal;">
                                                                    {{ $dish->name }}
                                                                </a>
                                                            </h6>
                                                            <span>Giá: {{ number_format($dish->price) }} VNĐ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    <!-- pizza banner -->
    <section class="banner-gallery pizza-banner padding-top-20 padding-bottom-10">
        <div class="pizza-shapes">
            <span class="ps1"><img src="{{ asset('assets/client/images/shapes/35.png') }}" alt=""></span>
            <span class="ps2"><img src="{{ asset('assets/client/images/shapes/26.png') }}" alt=""></span>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-12 wow fadeInRight align-items-center">
                            <div class="gallery-img-1 gallery-img-01">
                                @foreach ($promotions as $promotion)
                                <h5><strong></strong> {{ $promotion->describe }}</h5>

                                    <p><strong>Giảm giá:</strong> {{ $promotion->discount }}%</p>
                                    <p><strong>Từ ngày: </strong>{{ \Carbon\Carbon::parse($promotion->start_time)->format('d-m-Y') }}
                                    <strong>Đến ngày: </strong>{{ \Carbon\Carbon::parse($promotion->end_time)->format('d-m-Y') }}</p>
                                @endforeach
                                <a href="#" class="btn">Đặt ngay</a>
                                <img src="{{ asset('assets/client/images/menu-item/chicken-banner.png') }}" alt="">
                                <span class="yellow"><img src="{{ asset('assets/client/images/shapes/37.png') }}"
                                        alt=""></span>
                                <span class="gs1"><img src="{{ asset('assets/client/images/shapes/bbs.png') }}"
                                        alt=""></span>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
