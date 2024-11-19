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
                    <h2 class="page-title">Danh sách món ăn</h2>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="/">Trang chủ </a> / <a href="{{ route('menu') }}">Danh
                                sách món ăn </a></li>
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
                        <a href="shopping-cart.html">Đặt hàng ngay</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-food single-menus">
                        <img src="{{ asset('assets/client/images/menu-item/menu1.png') }}" alt="">
                        <h6>Chất lượng tốt nhất 100%</h6>
                        <p>Chúng tôi cung cấp thực phẩm chất lượng tốt nhất</p>
                        <a href="shopping-cart.html">Đặt hàng ngay</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-food single-menus">
                        <img src="{{ asset('assets/client/images/menu-item/menu3.png') }}" alt="">
                        <h6>Đảm bảo hoàn tiền</h6>
                        <p>Đảm bảo hoàn tiền 100%</p>
                        <a href="shopping-cart.html">Đặt hàng ngay</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-food single-menus">
                        <img src="{{ asset('assets/client/images/menu-item/menu4.png') }}" alt="">
                        <h6>Thực đơn món ăn ngon</h6>
                        <p>Thực phẩm Khan cung cấp thực phẩm tốt nhất</p>
                        <a href="shopping-cart.html">Đặt hàng ngay</a>
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
                <h3>món ăn</h3>
                <h2>thực đơn món ăn<span></span></h2>
            </div>
            <!-- menu-nav-wrapper -->
            <div class="menu-nav-wrapper">
                <div class="container">
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
                        <div class="menu-items-wrapper pizza-items-wrapper margin-top-50">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="row">
                                        @foreach ($category->dishes as $dish)
                                            <div class="col-lg-6 col-md-6">
                                                <div class="row">
                                                    <div class="col-lg-10 single-menu-item d-flex justify-content-between">
                                                        <div class="menu-img">
                                                            <a href="{{ route('dishDetail', $dish->id) }}">
                                                                <img src="{{ asset('storage/images/' . $dish->image) }}"
                                                                alt="">
                                                            </a>
                                                            
                                                        </div>
                                                        <div class="col-lg-12 menu-content">
                                                            <h6><a href="{{ route('dishDetail', $dish->id) }}">{{ $dish->name }}</a></h6>
                                                            <p>{{ $dish->description }}</p>
                                                            <span>giá :{{ number_format($dish->price) }} VNĐ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="chicken-tab-content">
                                        <h5>Combo <br>Siêu phẩm Bánh mì kẹp thịt</h5>
                                        <p>Tôm, mực</p>
                                        <a href="shopping-cart.html">Đặt hàng ngay</a>
                                        <span class='main-img'><img
                                                src="{{ asset('assets/client/images/menu-item/chicken-banner.png') }}"
                                                alt=""></span>
                                        <span class="gprice-2">$15</span>
                                        <span class="gshape1"><img
                                                src="{{ asset('assets/client/images/shapes/38.png') }}"
                                                alt=""></span>
                                        <span class="gshape2"><img
                                                src="{{ asset('assets/client/images/shapes/39.png') }}"
                                                alt=""></span>
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
    <section class="banner-gallery pizza-banner padding-top-90 padding-bottom-30">
        <div class="pizza-shapes">
            <span class="ps1"><img src="{{ asset('assets/client/images/shapes/35.png') }}" alt=""></span>
            <span class="ps2"><img src="{{ asset('assets/client/images/shapes/26.png') }}" alt=""></span>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 margin-bottom-30 wow fadeInLeft">
                            <div class="gallery-img-1">
                                <h3 class="margin-bottom-10">Buzzed Burger</h3>
                                <p>Sale off 50% chỉ trong tuần này</p>
                                <a href="shopping-cart.html" class="btn">order now</a>
                                <img src="{{ asset('assets/client/images/gallery/24.png') }}" alt="">
                                <span class="gs"><img src="{{ asset('assets/client/images/shapes/bbr.png') }}"
                                        alt=""></span>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 wow fadeInRight">
                            <div class="gallery-img-1 gallery-img-01">
                                <h5 class="margin-bottom-10">Chicken Combo<br>
                                    Burger</h5>
                                <p>Sale off 50% chỉ trong tuần này</p>
                                <a href="shopping-cart.html" class="btn">order now</a>
                                <img src="{{ asset('assets/client/images/menu-item/mg2.png') }}" alt="">
                                <span class="yellow"><img src="{{ asset('assets/client/images/shapes/37.png') }}"
                                        alt=""></span>
                                <span class="gs1"><img src="{{ asset('assets/client/images/shapes/bbs.png') }}"
                                        alt=""></span>
                                <span class="pbadge"><img src="{{ asset('assets/client/images/icons/pbadge.png') }}"
                                        alt=""></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- pizza-tab-area -->
    <section class="menu-area  pizza-area">
        <div class="menu-i-shapes">
            <span class="mis-1"><img src="{{ asset('assets/client/images/shapes/36.png') }}" alt=""></span>
            <span class="mis-2"><img src="{{ asset('assets/client/images/shapes/6.png') }}" alt=""></span>
        </div>
        <div class="container">
            <div class="common-title-area text-center padding-40">
                <h3>food items</h3>
                <h2>Delicious <span>Pizza</span> </h2>
            </div>
            <!-- menu-nav-wrapper -->
            <div class="menu-nav-wrapper">
                <div class="container">
                    <div class="row">
                        <ul class="nav" id="pizzaTab2" role="tablist">
                            <!-- menu-nav-1 -->
                            <li class="nav-item" role="presentation">
                                <div class="nav-link active" id="nav-pizza-1" data-bs-toggle="tab"
                                    data-bs-target="#pizza-1" role="tab" aria-controls="pizza-1"
                                    aria-selected="true">
                                    <div class="single-menu-nav pizza-single-menu-nav  text-center">
                                        <div class="menu-img margin-bottom-10">
                                            <img src="{{ asset('assets/client/images/menu-item/pm1.png') }}"
                                                alt="">
                                        </div>
                                        <h6>pizza</h6>
                                        <span class="g-s-4"><img src="{{ asset('assets/client/images/shapes/10.png') }}"
                                                alt=""></span>
                                        <span class="g-s-5"><img src="{{ asset('assets/client/images/shapes/14.png') }}"
                                                alt=""></span>
                                    </div>
                                </div>
                            </li>
                            <!-- menu-nav-2 -->
                            <li class="nav-item" role="presentation">
                                <div class="nav-link" id="nav-pizza-2" data-bs-toggle="tab" data-bs-target="#pizza-2"
                                    role="tab" aria-controls="pizza-2" aria-selected="false">
                                    <div class="single-menu-nav pizza-single-menu-nav  text-center">
                                        <div class="menu-img margin-bottom-10">
                                            <img src="{{ asset('assets/client/images/menu-item/pm2.png') }}"
                                                alt="">
                                        </div>
                                        <h6>pizza</h6>
                                        <span class="g-s-4"><img src="{{ asset('assets/client/images/shapes/10.png') }}"
                                                alt=""></span>
                                        <span class="g-s-5"><img src="{{ asset('assets/client/images/shapes/14.png') }}"
                                                alt=""></span>
                                    </div>
                                </div>
                            </li>
                            <!-- menu-nav-3 -->
                            <li class="nav-item" role="presentation">
                                <div class="nav-link" id="nav-pizza-3" data-bs-toggle="tab" data-bs-target="#pizza-3"
                                    role="tab" aria-controls="pizza-3" aria-selected="false">
                                    <div class="single-menu-nav pizza-single-menu-nav  text-center">
                                        <div class="menu-img margin-bottom-10">
                                            <img src="{{ asset('assets/client/images/menu-item/pm3.png') }}"
                                                alt="">
                                        </div>
                                        <h6>pizza</h6>
                                        <span class="g-s-4"><img src="{{ asset('assets/client/images/shapes/10.png') }}"
                                                alt=""></span>
                                        <span class="g-s-5"><img src="{{ asset('assets/client/images/shapes/14.png') }}"
                                                alt=""></span>
                                    </div>
                                </div>
                            </li>
                            <!-- menu-nav-4 -->
                            <li class="nav-item" role="presentation">
                                <div class="nav-link" id="nav-pizza-4" data-bs-toggle="tab" data-bs-target="#pizza-4"
                                    role="tab" aria-controls="pizza-4" aria-selected="false">
                                    <div class="single-menu-nav pizza-single-menu-nav  text-center">
                                        <div class="menu-img margin-bottom-10">
                                            <img src="{{ asset('assets/client/images/menu-item/pm4.png') }}"
                                                alt="">
                                        </div>
                                        <h6>pizza</h6>
                                        <span class="g-s-4"><img src="{{ asset('assets/client/images/shapes/10.png') }}"
                                                alt=""></span>
                                        <span class="g-s-5"><img src="{{ asset('assets/client/images/shapes/14.png') }}"
                                                alt=""></span>
                                    </div>
                                </div>
                            </li>
                            <!-- menu-nav-5 -->
                            <li class="nav-item" role="presentation">
                                <div class="nav-link" id="nav-pizza-5" data-bs-toggle="tab" data-bs-target="#pizza-5"
                                    role="tab" aria-controls="pizza-5" aria-selected="false">
                                    <div class="single-menu-nav pizza-single-menu-nav  text-center">
                                        <div class="menu-img margin-bottom-10">
                                            <img src="{{ asset('assets/client/images/menu-item/pm5.png') }}"
                                                alt="">
                                        </div>
                                        <h6>pizza</h6>
                                        <span class="g-s-4"><img src="{{ asset('assets/client/images/shapes/10.png') }}"
                                                alt=""></span>
                                        <span class="g-s-5"><img src="{{ asset('assets/client/images/shapes/14.png') }}"
                                                alt=""></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- menu-items-wrapper -->
            <div class="tab-content" id="nav-tabContent2">
                <!-- menu-items-1 -->
                <div class="tab-pane fade show active" id="pizza-1" role="tabpanel" aria-labelledby="nav-pizza-1">
                    <div class="menu-items-wrapper pizza-items-wrapper  margin-top-50">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz1.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Margherita Pizza</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz2.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Tomato sauce</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz3.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Marinara Pizza</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz4.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Frutti di Mare</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz5.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Americana Pizza</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz6.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Pizza al Pesto</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- menu-items-2 -->
                <div class="tab-pane fade" id="pizza-2" role="tabpanel" aria-labelledby="nav-pizza-2">
                    <div class="menu-items-wrapper pizza-items-wrapper  margin-top-50">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz1.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Margherita Pizza</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz2.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Tomato sauce</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz3.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Marinara Pizza</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz4.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Frutti di Mare</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz5.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Americana Pizza</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz6.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Pizza al Pesto</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- menu-items-3 -->
                <div class="tab-pane fade" id="pizza-3" role="tabpanel" aria-labelledby="nav-pizza-3">
                    <div class="menu-items-wrapper pizza-items-wrapper  margin-top-50">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz1.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Margherita Pizza</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz2.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Tomato sauce</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz3.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Marinara Pizza</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz4.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Frutti di Mare</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz5.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Americana Pizza</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz6.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Pizza al Pesto</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- menu-items-4 -->
                <div class="tab-pane fade" id="pizza-4" role="tabpanel" aria-labelledby="nav-pizza-4">
                    <div class="menu-items-wrapper pizza-items-wrapper  margin-top-50">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz1.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Margherita Pizza</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz2.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Tomato sauce</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz3.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Marinara Pizza</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz4.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Frutti di Mare</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz5.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Americana Pizza</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz6.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Pizza al Pesto</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- menu-items-5 -->
                <div class="tab-pane fade" id="pizza-5" role="tabpanel" aria-labelledby="nav-pizza-5">
                    <div class="menu-items-wrapper pizza-items-wrapper  margin-top-50">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz1.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Margherita Pizza</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz2.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Tomato sauce</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz3.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Marinara Pizza</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz4.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Frutti di Mare</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz5.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Americana Pizza</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-menu-item d-flex justify-content-between">
                                    <div class="menu-img">
                                        <img src="{{ asset('assets/client/images/menu-item/piz6.png') }}" alt="">
                                    </div>
                                    <div class="menu-content">
                                        <h6><a href="single-dish.html">Pizza al Pesto</a></h6>
                                        <p>Tôm. Mực, dứa</p>
                                        <span>Giá :10.000vnđ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- testimonial -->
    <section class="testimonial padding-bottom-120 padding-top-80">
        <div class="container">
            <div class="testi-shapes">
                <span class="ts-1"><img src="{{ asset('assets/client/images/img/31.png') }}" alt=""></span>
                <span class="ts-2"><img src="{{ asset('assets/client/images/img/32.png') }}" alt=""></span>
                <span class="ts-3"><img src="{{ asset('assets/client/images/shapes/7.png') }}" alt=""></span>
            </div>
            <div class="common-title-area text-center padding-bottom-50">
                <h3>testimonial</h3>
                <h2>client <span>feedback</span></h2>
            </div>
            <div class="testimonial-active">
                <div class="single-testimonial">
                    <div class="testi-top">
                        <div class="tin-shapes">
                            <span class="tsin-1"><img src="{{ asset('assets/client/images/shapes/33.png') }}"
                                    alt=""></span>

                        </div>
                        <div class="testi-img">
                            <img src="{{ asset('assets/client/images/testimonial/testi-1.png') }}" alt="">
                        </div>
                        <div class="testi-meta">
                            <h6>Christ Deo</h6>
                            <p>CEO A4Tech Ltd.</p>
                            <div class="testi-rating">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                        </div>

                    </div>
                    <p>Food Khan là một nhà hàng tuyệt vời của Đại học Texas ở Austin đã được nghiên cứu lợi ích của việc
                        kiểm tra thường xuyên và phản hồi dẫn đến. Ông giải thích điều đó trong lịch sử nghiên cứu.</p>
                </div>
                <div class="single-testimonial">
                    <div class="testi-top">
                        <div class="tin-shapes">
                            <span class="tsin-1"><img src="{{ asset('assets/client/images/shapes/33.png') }}"
                                    alt=""></span>

                        </div>
                        <div class="testi-img">
                            <img src="{{ asset('assets/client/images/testimonial/testi-2.png') }}" alt="">
                        </div>
                        <div class="testi-meta">
                            <h6>Christ Deo</h6>
                            <p>CEO A4Tech Ltd.</p>
                            <div class="testi-rating">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                        </div>
                    </div>
                    <p>Food Khan là một nhà hàng tuyệt vời của Đại học Texas ở Austin đã được nghiên cứu lợi ích của việc
                        kiểm tra thường xuyên và phản hồi dẫn đến. Ông giải thích điều đó trong lịch sử nghiên cứu.</p>
                </div>
                <div class="single-testimonial">
                    <div class="testi-top">
                        <div class="tin-shapes">
                            <span class="tsin-1"><img src="{{ asset('assets/client/images/shapes/33.png') }}"
                                    alt=""></span>

                        </div>
                        <div class="testi-img">
                            <img src="{{ asset('assets/client/images/testimonial/testi-1.png') }}" alt="">
                        </div>
                        <div class="testi-meta">
                            <h6>Christ Deo</h6>
                            <p>CEO A4Tech Ltd.</p>
                            <div class="testi-rating">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                        </div>
                    </div>
                    <p>Food Khan là một nhà hàng tuyệt vời của Đại học Texas ở Austin đã được nghiên cứu lợi ích của việc
                        kiểm tra thường xuyên và phản hồi dẫn đến. Ông giải thích điều đó trong lịch sử nghiên cứu.</p>
                </div>
                <div class="single-testimonial">
                    <div class="testi-top">
                        <div class="tin-shapes">
                            <span class="tsin-1"><img src="{{ asset('assets/client/images/shapes/33.png') }}"
                                    alt=""></span>

                        </div>
                        <div class="testi-img">
                            <img src="{{ asset('assets/client/images/testimonial/testi-2.png') }}" alt="">
                        </div>
                        <div class="testi-meta">
                            <h6>Christ Deo</h6>
                            <p>CEO A4Tech Ltd.</p>
                            <div class="testi-rating">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                        </div>
                    </div>
                    <p>Food Khan là một nhà hàng tuyệt vời của Đại học Texas ở Austin đã được nghiên cứu lợi ích của việc
                        kiểm tra thường xuyên và phản hồi dẫn đến. Ông giải thích điều đó trong lịch sử nghiên cứu.</p>
                </div>
                <div class="single-testimonial">
                    <div class="testi-top">
                        <div class="tin-shapes">
                            <span class="tsin-1"><img src="{{ asset('assets/client/images/shapes/33.png') }}"
                                    alt=""></span>

                        </div>
                        <div class="testi-img">
                            <img src="{{ asset('assets/client/images/testimonial/testi-1.png') }}" alt="">
                        </div>
                        <div class="testi-meta">
                            <h6>Christ Deo</h6>
                            <p>CEO A4Tech Ltd.</p>
                            <div class="testi-rating">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                        </div>
                    </div>
                    <p>Food Khan là một nhà hàng tuyệt vời của Đại học Texas ở Austin đã được nghiên cứu lợi ích của việc
                        kiểm tra thường xuyên và phản hồi dẫn đến. Ông giải thích điều đó trong lịch sử nghiên cứu.</p>
                </div>
                <div class="single-testimonial">
                    <div class="testi-top">
                        <div class="tin-shapes">
                            <span class="tsin-1"><img src="{{ asset('assets/client/images/shapes/33.png') }}"
                                    alt=""></span>

                        </div>
                        <div class="testi-img">
                            <img src="{{ asset('assets/client/images/testimonial/testi-2.png') }}" alt="">
                        </div>
                        <div class="testi-meta">
                            <h6>Christ Deo</h6>
                            <p>CEO A4Tech Ltd.</p>
                            <div class="testi-rating">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                        </div>
                    </div>
                    <p>Food Khan là một nhà hàng tuyệt vời của Đại học Texas ở Austin đã được nghiên cứu lợi ích của việc
                        kiểm tra thường xuyên và phản hồi dẫn đến. Ông giải thích điều đó trong lịch sử nghiên cứu.</p>
                </div>
                <div class="single-testimonial">
                    <div class="testi-top">
                        <div class="tin-shapes">
                            <span class="tsin-1"><img src="{{ asset('assets/client/images/shapes/33.png') }}"
                                    alt=""></span>

                        </div>
                        <div class="testi-img">
                            <img src="{{ asset('assets/client/images/testimonial/testi-1.png') }}" alt="">
                        </div>
                        <div class="testi-meta">
                            <h6>Christ Deo</h6>
                            <p>CEO A4Tech Ltd.</p>
                            <div class="testi-rating">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                        </div>
                    </div>
                    <p>Food Khan là một nhà hàng tuyệt vời của Đại học Texas ở Austin đã được nghiên cứu lợi ích của việc
                        kiểm tra thường xuyên và phản hồi dẫn đến. Ông giải thích điều đó trong lịch sử nghiên cứu.</p>
                </div>
                <div class="single-testimonial">
                    <div class="testi-top">
                        <div class="tin-shapes">
                            <span class="tsin-1"><img src="{{ asset('assets/client/images/shapes/33.png') }}"
                                    alt=""></span>

                        </div>
                        <div class="testi-img">
                            <img src="{{ asset('assets/client/images/testimonial/testi-2.png') }}" alt="">
                        </div>
                        <div class="testi-meta">
                            <h6>Christ Deo</h6>
                            <p>CEO A4Tech Ltd.</p>
                            <div class="testi-rating">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                        </div>
                    </div>
                    <p>Food Khan là một nhà hàng tuyệt vời của Đại học Texas ở Austin đã được nghiên cứu lợi ích của việc
                        kiểm tra thường xuyên và phản hồi dẫn đến. Ông giải thích điều đó trong lịch sử nghiên cứu.</p>
                </div>
            </div>

        </div>
    </section>
@endsection
