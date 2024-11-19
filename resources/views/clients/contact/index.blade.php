@extends('layouts.clients')
@section('title', 'Liên Hệ')

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
                    <h2 class="page-title">Liên hệ</h2>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a> / <a href="#lien_he"> liên hệ chúng tôi</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- contact-form-area -->
    <section class="about-area about-area2 writeto-us padding-top-120 padding-bottom-60">
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
                    <div class="contact-form-area">
                        <h3>Liên hệ <span> với chúng tôi</span></h3>
                        <form id="lien_he" action="#">
                            <input type="text" placeholder="Tên bạn:">
                            <input type="email" placeholder="email">
                            <input type="url" placeholder="website">
                            <textarea placeholder="nội dung"></textarea>
                            <button type="submit" class="btn">Gửi tin nhắn</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- info-area -->
    <div class="info-area padding-bottom-120">
        <div class="info-shapes">
            <span class="info-s-1"><img src="{{ asset('assets/client/images/shapes/7.png') }}" alt=""></span>
            <span class="info-s-2"><img src="{{ asset('assets/client/images/img/32.png') }}" alt=""></span>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 wow fadeInUp" data-wow-delay=".2s">
                    <div
                        class="single-info d-flex flex-sm-row flex-md-column flex-lg-row justify-content-around align-items-center">
                        <div class="info-img">
                            <img src="{{ asset('assets/client/images/icons/c1.png') }}" alt="">
                        </div>
                        <div class="info-content text-center text-lg-left">
                            <h5>Gọi cho chúng tôi 24/7</h5>
                            <p>123-5879406</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 wow fadeInUp" data-wow-delay=".4s">
                    <div
                        class="single-info d-flex flex-sm-row flex-md-column flex-lg-row  justify-content-around align-items-center">
                        <div class="info-img">
                            <img src="{{ asset('assets/client/images/icons/c2.png') }}" alt="">
                        </div>
                        <div class="info-content text-center text-lg-left">
                            <h5>Địa chỉ</h5>
                            <p>140 Lê Trọng Tấn, Phường Tây Thạnh, Quận Tân Phú, Thành phố Hồ Chí Minh</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 wow fadeInUp" data-wow-delay=".6s">
                    <div
                        class="single-info d-flex flex-sm-row flex-md-column flex-lg-row  justify-content-around align-items-center">
                        <div class="info-img">
                            <img src="{{ asset('assets/client/images/icons/c3.png') }}" alt="">
                        </div>
                        <div class="info-content text-center text-lg-left">
                            <h5>Giờ mở cửa</h5>
                            <p>Hằng ngày 11.00 PM - 11.00 AM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- map area -->
    <div class="map-area padding-bottom-120 wow fadeInUp">
        <div class="map-shapes">
            <div class="ms-1"><img src="{{ asset('assets/client/images/shapes/16.png') }}" alt=""></div>
        </div>
        <div class="container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.4148247742232!2d90.39747015024156!3d23.874904684452307!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c43bc25ec0ad%3A0x92541def35db7c01!2sSoftTech-IT%20Institute!5e0!3m2!1sen!2sbd!4v1611143717399!5m2!1sen!2sbd"
                width="1190" height="400" style="border:0;" allowfullscreen="" aria-hidden="false"
                tabindex="0"></iframe>
        </div>
    </div>
@endsection
