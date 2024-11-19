@extends('layouts.clients')
@section('title','Giới thiệu')
@section('content')
<!-- breadcrumb-area -->
<div class="banner-area breadcrumb-area padding-top-120 padding-bottom-90">
    <div class="bread-shapes">
        <span class="b-shape-1 item-bounce"><img src="{{ asset('assets/client/images/img/5.png') }}" alt=""></span>
        <span class="b-shape-2"><img src="{{ asset('assets/client/images/img/6.png') }}" alt=""></span>
        <span class="b-shape-3"><img src="{{ asset('assets/client/images/img/7.png') }}" alt=""></span>
        <span class="b-shape-4"><img src="{{ asset('assets/client/images/img/9.png') }}" alt=""></span>
        <span class="b-shape-5"><img src="{{ asset('assets/client/images/shapes/18.png') }}" alt=""></span>
        <span class="b-shape-6 item-animateOne"><img src="{{ asset('assets/client/images/img/7.png') }}" alt=""></span>
    </div>
    <div class="container padding-top-120">
        <div class="row justify-content-center">
            <nav aria-label="breadcrumb">
                <h2 class="page-title">Giới thiệu</h2>
                <ol class="breadcrumb text-center">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a> / <a href="/gioi-thieu"> Giới thiệu</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- food-items countdown -->
<div class="foods-counter">
    <div class="container">
        <div class="row foods-wrapper">
            <div class="col-lg-3 col-md-6">
                <div class="single-food text-center">
                    <img src="{{ asset('assets/client/images/icons/3.png') }}" alt="">
                    <span class="items counter">2000</span>
                    <p>món ăn</p>
                    <span class="g-s-4"><img src="{{ asset('assets/client/images/shapes/10.png') }}" alt=""></span>
                    <span class="g-s-5"><img src="{{ asset('assets/client/images/shapes/14.png') }}" alt=""></span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-food orange text-center">
                    <img src="{{ asset('assets/client/images/icons/f-2.png') }}" alt="">
                    <span class="items counter">500</span>
                    <p> món ăn burger</p>
                    <span class="g-s-4"><img src="{{ asset('assets/client/images/shapes/10.png') }}" alt=""></span>
                    <span class="g-s-5"><img src="{{ asset('assets/client/images/shapes/14.png') }}" alt=""></span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-food text-center">
                    <img src="{{ asset('assets/client/images/icons/f-3.png') }}" alt="">
                    <span class="items counter">1000</span>
                    <p> mặt hàng nước giải khát</p>
                    <span class="g-s-4"><img src="{{ asset('assets/client/images/shapes/10.png') }}" alt=""></span>
                    <span class="g-s-5"><img src="{{ asset('assets/client/images/shapes/14.png') }}" alt=""></span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-food orange text-center">
                    <img src="{{ asset('assets/client/images/icons/f-4.png') }}" alt="">
                    <span class="items counter">600</span>
                    <p>Thức ăn nhanh ngon</p>
                    <span class="g-s-4"><img src="{{ asset('assets/client/images/shapes/10.png') }}" alt=""></span>
                    <span class="g-s-5"><img src="{{ asset('assets/client/images/shapes/14.png') }}" alt=""></span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- about us -->
<section class="about-area about-area2 padding-top-120 padding-bottom-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12  wow fadeInLeft">
                <div class="about-left">
                    <div class="about-l-shapes">
                        <span class="als-1"><img src="{{ asset('assets/client/images/shapes/2.png') }}" alt=""></span>
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
                                <img src="{{ asset('assets/client/images/gallery/4.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12  wow fadeInRight">
                <div class="about-right">
                    <div class="about-r-shapes">
                        <span class="as-1"><img src="{{ asset('assets/client/images/shapes/1.png') }}" alt=""></span>
                    </div>
                    <h2>
                        Hương vị tươi ngon, giá hấp dẫn –
                        <span>Món ngon cho phút giây thưởng thức đích thực!</span>
                    </h2>
                    <p>
                        Các món ăn được chế biến nhanh chóng nhưng vẫn giữ trọn hương vị tươi ngon, với nguyên
                        liệu chất lượng và sự kết hợp hương vị độc đáo, mang đến trải nghiệm ẩm thực hấp dẫn cho mọi
                        thực khách.
                    </p>
                    <div class="history-tab">
                        <ul class="nav" id="historyTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <div class="nav-link active" id="history-tab" data-bs-toggle="tab"
                                    data-bs-target="#history-tab-pane" role="tab" aria-controls="history-tab-pane"
                                    aria-selected="true">lịch sử</div>
                            </li>
                            <li class="nav-item" role="presentation">
                                <div class="nav-link" id="journey-tab" data-bs-toggle="tab"
                                    data-bs-target="#journey-tab-pane" role="tab" aria-controls="journey-tab-pane"
                                    aria-selected="false">hành trình</div>
                            </li>
                            <li class="nav-item" role="presentation">
                                <div class="nav-link" id="experience-tab" data-bs-toggle="tab"
                                    data-bs-target="#experience-tab-pane" role="tab" aria-controls="experience-tab-pane"
                                    aria-selected="false">kinh nghiệm</div>
                            </li>
                        </ul>

                        <div class="tab-content" id="historyTabContent">
                            <div class="tab-pane fade show active" id="history-tab-pane" role="tabpanel"
                                aria-labelledby="history-tab" tabindex="0">
                                <div class="his-content">
                                    <p>Cửa hàng thức ăn nhanh này được thành lập vào năm 2020, với mục tiêu mang đến cho khách hàng những bữa ăn nhanh chóng và ngon miệng. Ban đầu chỉ phục vụ một vài món ăn đơn giản, nhưng sau đó đã mở rộng thực đơn và xây dựng thương hiệu mạnh mẽ trong ngành.
                                        Từ đó, cửa hàng đã trở thành điểm đến quen thuộc của nhiều thế hệ thực khách yêu thích ẩm thực nhanh và tiện lợi.</p>
                                    <div class="sig-wrapper d-flex flex-wrap justify-content-around align-items-center">
                                        <div class="sig-img d-flex align-items-center"><img
                                                src="{{ asset('assets/client/images/icons/sig.png') }}" alt="">
                                            <span>đầu bếp trưởng</span>
                                        </div>
                                        <a href="#" class="btn">tất cả món đồ</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="journey-tab-pane" role="tabpanel"
                                aria-labelledby="journey-tab" tabindex="0">
                                <div class="his-content">
                                    <p>Cửa hàng thức ăn nhanh bắt đầu từ một quầy nhỏ tại trung tâm thành phố vào năm 2020, với mục tiêu phục vụ món ăn nhanh nhưng vẫn đảm bảo chất lượng.
                                    Sau một thời gian, nhờ vào sự sáng tạo trong thực đơn và chiến lược marketing hiệu quả, cửa hàng mở rộng thêm nhiều chi nhánh khắp thành phố.
                                    Hành trình tiếp tục phát triển mạnh mẽ, với cam kết mang lại trải nghiệm ẩm thực tiện lợi và phong phú cho khách hàng.
                                    </p>
                                    <div class="sig-wrapper d-flex flex-wrap justify-content-around align-items-center">
                                        <div class="sig-img d-flex align-items-center"><img
                                                src="{{ asset('assets/client/images/icons/sig.png') }}" alt="">
                                            <span>đầu bếp trưởng</span>
                                        </div>

                                        <a href="#" class="btn">tất cả món đồ</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="experience-tab-pane" role="tabpanel"
                                aria-labelledby="experience-tab" tabindex="0">
                                <div class="his-content">
                                    <p>Với hơn 4 năm hoạt động trong ngành thực phẩm nhanh, cửa hàng đã tích lũy được kinh nghiệm sâu rộng trong việc cung cấp món ăn ngon, phục vụ khách hàng nhanh chóng và chất lượng ổn định. Đội ngũ nhân viên được đào tạo chuyên nghiệp để đảm bảo mỗi bữa ăn đều đạt tiêu chuẩn cao nhất.
                                        Chúng tôi luôn cải tiến quy trình và sáng tạo thực đơn để đáp ứng nhu cầu đa dạng của thực khách.

                                    </p>
                                    <div class="sig-wrapper d-flex flex-wrap justify-content-around align-items-center">
                                        <div class="sig-img d-flex align-items-center"><img
                                                src="{{ asset('assets/client/images/icons/sig.png') }}" alt="">
                                            <span>đầu bếp trưởng</span>
                                        </div>

                                        <a href="#" class="btn">tất cả món đồ</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- delicious food -->
<section class="delicious-area padding-top-120 padding-bottom-120">
    <div class="container">
        <div class="deli-shapes">
            <span class="ds-1"><img src="{{ asset('assets/client/images/shapes/transparent1.png') }}" alt=""></span>
            <span class="ds-2 item-animateOne"><img src="{{ asset('assets/client/images/shapes/27.png') }}"
                    alt=""></span>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6  wow fadeInLeft">
                <div class="delicious-left">
                    <h2>Hương vị tươi ngon tại một
                        giá cực tốt chỉ dành cho
                        <span>Người yêu món ăn ngon.</span>
                    </h2>
                    <a class="play-btn1 item-ripple popup-youtube" href="https://www.youtube.com/watch?v=wX8foM1z7S0"><i
                            class="fas fa-play"></i></a>
                    <a href="https://www.youtube.com/watch?v=wX8foM1z7S0" class=" popup-youtube intro"> phần giới
                        thiệu
                        băng hình</a>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block  wow fadeInRight">
                <div class="delicious-right">
                    <img src="{{ asset('assets/client/images/gallery/1.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<!--team area -->
<section class="team-area padding-bottom-110 padding-top-110 wow fadeInUp">
    <div class="team-area-shapes">
        <span class="ts-1"><img src="{{ asset('assets/client/images/shapes/pizza-s1.png') }}" alt=""></span>
        <span class="ts-2"><img src="{{ asset('assets/client/images/shapes/brr.png') }}" alt=""></span>
    </div>
    <div class="container">
        <div class="common-title-area text-center padding-bottom-50">
            <h3>thành viên của đội</h3>
            <h2>Đầu bếp <span>chuyên nghiệp</span></h2>
        </div>
        <div class="team-slider-active">
            <div class="single-team text-center">
                <div class="s-t-img">
                    <img src="{{ asset('assets/client/images/team/t1.png') }}" alt="">
                </div>
                <div class="t-content">
                    <h5>Nguyễn Minh Tuấn</h5>
                    <p>Đầu bếp chuyên gia trong việc chế biến các món ăn nhanh từ gà, luôn đảm bảo sự giòn ngon và hương vị đậm đà.</p>
                </div>
                <div class="t-social-b">
                    <span class="follow">follow :</span>
                    <span class="t-social"><a href="#"><i class="fab fa-facebook"></i></a></span>
                    <span class="t-social"><a href="#"><i class="fab fa-twitter"></i></a></span>
                    <span class="t-social"><a href="#"><i class="fab fa-instagram"></i></a></span>
                    <span class="t-social"><a href="#"><i class="fab fa-linkedin"></i></a></span>
                </div>
            </div>
            <div class="single-team text-center">
                <div class="s-t-img">
                    <img src="{{ asset('assets/client/images/team/t2.png') }}" alt="">
                </div>
                <div class="t-content">
                    <h5>Trần Thị Lan Anh</h5>
                    <p>Đầu bếp chuyên về các món burger, luôn sáng tạo với những biến tấu mới lạ từ các loại thịt và rau củ.</p>
                </div>
                <div class="t-social-b">
                    <span class="follow">follow :</span>
                    <span class="t-social"><a href="#"><i class="fab fa-facebook"></i></a></span>
                    <span class="t-social"><a href="#"><i class="fab fa-twitter"></i></a></span>
                    <span class="t-social"><a href="#"><i class="fab fa-instagram"></i></a></span>
                    <span class="t-social"><a href="#"><i class="fab fa-linkedin"></i></a></span>
                </div>
            </div>
            <div class="single-team text-center">
                <div class="s-t-img">
                    <img src="{{ asset('assets/client/images/team/t3.png') }}" alt="">
                </div>
                <div class="t-content">
                    <h5>Phạm Hoàng Nam</h5>
                    <p>Đầu bếp giỏi về món khoai tây chiên, với phương pháp chế biến đặc biệt giúp khoai luôn giòn rụm và hấp dẫn.</p>
                </div>
                <div class="t-social-b">
                    <span class="follow">follow :</span>
                    <span class="t-social"><a href="#"><i class="fab fa-facebook"></i></a></span>
                    <span class="t-social"><a href="#"><i class="fab fa-twitter"></i></a></span>
                    <span class="t-social"><a href="#"><i class="fab fa-instagram"></i></a></span>
                    <span class="t-social"><a href="#"><i class="fab fa-linkedin"></i></a></span>
                </div>
            </div>
            <div class="single-team text-center">
                <div class="s-t-img">
                    <img src="{{ asset('assets/client/images/team/t4.png') }}" alt="">
                </div>
                <div class="t-content">
                    <h5>Lê Thị Minh Tú</h5>
                    <p>Đầu bếp chuyên về các món ăn nhanh kiểu Âu, đặc biệt là pizza và pasta với nguyên liệu tươi ngon.</p>
                </div>
                <div class="t-social-b">
                    <span class="follow">follow :</span>
                    <span class="t-social"><a href="#"><i class="fab fa-facebook"></i></a></span>
                    <span class="t-social"><a href="#"><i class="fab fa-twitter"></i></a></span>
                    <span class="t-social"><a href="#"><i class="fab fa-instagram"></i></a></span>
                    <span class="t-social"><a href="#"><i class="fab fa-linkedin"></i></a></span>
                </div>
            </div>
            <div class="single-team text-center">
                <div class="s-t-img">
                    <img src="{{ asset('assets/client/images/team/t1.png') }}" alt="">
                </div>
                <div class="t-content">
                    <h5>Ngô Quang Huy</h5>
                    <p>Đầu bếp nổi tiếng với các món gà rán, sử dụng gia vị đặc biệt tạo nên hương vị độc đáo.</p>
                </div>
                <div class="t-social-b">
                    <span class="follow">Theo dõi :</span>
                    <span class="t-social"><a href="#"><i class="fab fa-facebook"></i></a></span>
                    <span class="t-social"><a href="#"><i class="fab fa-twitter"></i></a></span>
                    <span class="t-social"><a href="#"><i class="fab fa-instagram"></i></a></span>
                    <span class="t-social"><a href="#"><i class="fab fa-linkedin"></i></a></span>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- slider-gallery-img -->
<div class="slider-gallery-img">
    <div class="container-fluid">
        <div class="slider-gallery-active">
            <div class="single-gallery-img">
                <img src="{{ asset('assets/client/images/gallery/gm1.jpg') }}" alt="">
                <a href="#"><span><i class="fas fa-image"></i></span></a>
            </div>
            <div class="single-gallery-img">
                <img src="{{ asset('assets/client/images/gallery/gm2.jpg') }}" alt="">
                <a href="#"><span><i class="fas fa-image"></i></span></a>
            </div>
            <div class="single-gallery-img">
                <img src="{{ asset('assets/client/images/gallery/gm3.jpg') }}" alt="">
                <a href="#"><span><i class="fas fa-image"></i></span></a>
            </div>
            <div class="single-gallery-img">
                <img src="{{ asset('assets/client/images/gallery/gm4.jpg') }}" alt="">
                <a href="#"><span><i class="fas fa-image"></i></span></a>
            </div>
            <div class="single-gallery-img">
                <img src="{{ asset('assets/client/images/gallery/gm5.jpg') }}" alt="">
                <a href="#"><span><i class="fas fa-image"></i></span></a>
            </div>
            <div class="single-gallery-img">
                <img src="{{ asset('assets/client/images/gallery/gm6.jpg') }}" alt="">
                <a href="#"><span><i class="fas fa-image"></i></span></a>
            </div>
        </div>
    </div>
</div>

@endsection
