@extends('layouts.clients')
@section('title', 'Phòng trưng bày')

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
                    <h2 class="page-title">Phòng trưng bày</h2>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a> / <a href="/gallery"> Phòng trưng
                                bày</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- main-gallery-area-wrapper -->
    <div class="food-area-wrapper main-gallery">
        <div class="pshapes">
            <span class="ps-1"><img src="{{ asset('assets/client/images/img/32.png') }}" alt=""></span>
            <span class="ps-2"><img src="{{ asset('assets/client/images/shapes/12.png') }}" alt=""></span>
            <span class="ps3"><img src="{{ asset('assets/client/images/shapes/13.png') }}" alt=""></span>
            <span class="ps-4"><img src="{{ asset('assets/client/images/shapes/14.png') }}" alt=""></span>
            <span class="ps-5"><img src="{{ asset('assets/client/images/img/6.png') }}" alt=""></span>
            <span class="ps-6"><img src="{{ asset('assets/client/images/shapes/16.png') }}" alt=""></span>
            <span class="ps-7"><img src="{{ asset('assets/client/images/img/6.png') }}" alt=""></span>
        </div>
        <div class="container padding-top-120 padding-bottom-120">
            <div class="row margin-bottom-60">
                <div class="col-lg-12 col-md-12">
                    <div class="gallery-btn button-group filter-button-group">
                        <button class="active" data-filter="*">tất cả món đồ</button>
                        <button data-filter=".pizza">pizza</button>
                        <button data-filter=".burger">burger</button>
                        <button data-filter=".thịt gà">thịt gà</button>
                        <button data-filter=".vege">người ăn chay</button>
                    </div>
                </div>
            </div>
            <div class="row gallery-wrapper grid">
                <div class="col-lg-3 col-md-6 col-12 pizza burger grid-item">
                    <div class="gallery-img">
                        <img src="{{ asset('assets/client/images/gallery/gallery1.jpg') }}" alt="">
                        <div class="gallery-info">
                            <div class="inner-info text-center">
                                <p>thịt gà</p>
                                <h6>Món ăn tối ngon miệng</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12  thịt gà vege grid-item">
                    <div class="gallery-img">
                        <img src="{{ asset('assets/client/images/gallery/gallery2.jpg') }}" alt="">
                        <div class="gallery-info">
                            <div class="inner-info text-center">
                                <p>thịt gà</p>
                                <h6>Món ăn tối ngon miệng</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-12 burger grid-item">
                    <div class="gallery-img">
                        <img src="{{ asset('assets/client/images/gallery/gallery3.jpg') }}" alt="">
                        <div class="gallery-info">
                            <div class="inner-info text-center">
                                <p>thịt gà</p>
                                <h6>Món ăn tối ngon miệng</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-12 thịt gà vege grid-item">
                    <div class="gallery-img">
                        <img src="{{ asset('assets/client/images/gallery/gallery4.jpg') }}" alt="">
                        <div class="gallery-info">
                            <div class="inner-info text-center">
                                <p>thịt gà</p>
                                <h6>Món ăn tối ngon miệng</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 pizza thịt gà grid-item">
                    <div class="gallery-img">
                        <img src="{{ asset('assets/client/images/gallery/gallery5.jpg') }}" alt="">
                        <div class="gallery-info">
                            <div class="inner-info text-center">
                                <p>thịt gà</p>
                                <h6>Món ăn tối ngon miệng</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 thịt gà vege grid-item">
                    <div class="gallery-img">
                        <img src="{{ asset('assets/client/images/gallery/gallery6.jpg') }}" alt="">
                        <div class="gallery-info">
                            <div class="inner-info text-center">
                                <p>thịt gà</p>
                                <h6>Món ăn tối ngon miệng</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 pizza thịt gà grid-item">
                    <div class="gallery-img">
                        <img src="{{ asset('assets/client/images/gallery/gallery7.jpg') }}" alt="">
                        <div class="gallery-info">
                            <div class="inner-info text-center">
                                <p>thịt gà</p>
                                <h6>Món ăn tối ngon miệng</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 thịt gà vege grid-item">
                    <div class="gallery-img">
                        <img src="{{ asset('assets/client/images/gallery/gallery8.jpg') }}" alt="">
                        <div class="gallery-info">
                            <div class="inner-info text-center">
                                <p>thịt gà</p>
                                <h6>Món ăn tối ngon miệng</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-12 pizza thịt gà grid-item">
                    <div class="gallery-img">
                        <img src="{{ asset('assets/client/images/gallery/gallery9.jpg') }}" alt="">
                        <div class="gallery-info">
                            <div class="inner-info text-center">
                                <p>thịt gà</p>
                                <h6>Món ăn tối ngon miệng</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" class="btn position-relative z-idnex-1 margin-top-40">tải thêm</a>
        </div>
    </div>
@endsection
