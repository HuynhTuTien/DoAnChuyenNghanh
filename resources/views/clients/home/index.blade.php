@extends('layouts.clients')

@section('title', 'Trang chủ')

@section('content')
<!-- banner-area -->
<section class="banner-area padding-top-100 padding-bottom-150">
    <div class="banner-shapes">
        <span class="b-shape-1 item-animateOne"><img src="{{ asset('assets/client/images/img/5.png') }}"
                alt="" /></span>
        <span class="b-shape-2 item-animateTwo"><img src="{{ asset('assets/client/images/img/6.png') }}"
                alt="" /></span>
        <span class="b-shape-3 item-bounce"><img src="{{ asset('assets/client/images/img/7.png') }}" alt="" /></span>
        <span class="b-shape-4"><img src="{{ asset('assets/client/images/img/9.png') }}" alt="" /></span>
        <span class="b-shape-5"><img src="{{ asset('assets/client/images/shapes/18.png') }}" alt="" /></span>
    </div>
    <div class="container padding-top-145">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-12 col-lg-6 col-xl-6">
                <div class="banner-content">
                    <h1>ĐĂT NGAY </h1>
                    <h1> <span> MÓN ĂN NGON </span></h1>
                    <!-- buyone-shape -->
                    <div class="buyone-shape">
                        <div class="banner-tag">
                            <h5>Mua 1 tặng 1</h5>
                        </div>
                        <span class="banner-badge">miễn phí</span>
                    </div>
                    <!-- pricing -->
                    <div class="price">Giá : <span>150.000VNĐ</span></div>

                    <!-- order-box -->
                    <div class="order-box">
                        <span class="order-img"><img src="{{ asset('assets/client/images/icons/1.png') }}"
                                alt="" /></span>
                        <div class="order-content">
                            <p>Số giao hàng.</p>
                            <span>123-59794069</span>
                        </div>
                        <a href="#" class="btn">thử ngay bây giờ</a>
                    </div>
                </div>
            </div>
            <div class="d-none d-lg-block col-lg-6 col-xl-6">
                <div class="banner-img">
                    <div class="pizza-shapes">
                        <span class="p-shape-1"><img src="{{ asset('assets/client/images/img/2.png') }}"
                                alt="" /></span>
                        <span class="p-shape-2"><img src="{{ asset('assets/client/images/img/3.png') }}"
                                alt="" /></span>
                        <span class="p-shape-3"><img src="{{ asset('assets/client/images/img/4.png') }}"
                                alt="" /></span>
                        <span class="p-shape-4"><img src="{{ asset('assets/client/images/img/8.png') }}"
                                alt="" /></span>
                    </div>
                    <img src="{{ asset('assets/client/images/img/10.png') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>

<!-- about us -->
<section class="about-area padding-top-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12 wow fadeInLeft">
                <div class="about-left">
                    <div class="about-l-shapes">
                        <span class="als-1"><img src="{{ asset('assets/client/images/shapes/2.png') }}" alt="" /></span>
                    </div>
                    <div class="row">
                        <div class="
                    col-lg-4 col-md-4 col-sm-4 col-4
                    d-flex
                    align-items-end
                    justify-content-end
                    margin-bottom-20
                  ">
                            <div class="about-gallery-1">
                                <img src="{{ asset('assets/client/images/gallery/1.jpg') }}" alt="" />
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-8 margin-bottom-20">
                            <div class="about-gallery-2">
                                <img src="{{ asset('assets/client/images/gallery/2.jpg') }}" alt="" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="about-gallery-3">
                                <img src="{{ asset('assets/client/images/gallery/3.jpg') }}" alt="" />
                            </div>
                        </div>
                        <div class="
                    col-lg-5 col-md-5 col-sm-5 col-5
                    d-flex
                    align-items-start
                  ">
                            <div class="about-gallery-4 text-center">
                                <img class="mp" src="{{ asset('assets/client/images/icons/3.png') }}" alt="" />
                                <div class="items counter">200</div>
                                <p>Món Ăn</p>
                                <span class="g-s-4"><img src="{{ asset('assets/client/images/shapes/10.png') }}"
                                        alt="" /></span>
                                <span class="g-s-5"><img src="{{ asset('assets/client/images/shapes/14.png') }}"
                                        alt="" /></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 offset-lg-1 wow fadeInRight">
                <div class="about-right">
                    <div class="about-r-shapes">
                        <span class="as-1 item-bounce"><img src="{{ asset('assets/client/images/shapes/1.png') }}"
                                alt="" /></span>
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
                    <div class="garlic-burger-card">
                        <div class="garlic-burger-img">
                            {{-- <img class="price-badge" src="{{ asset('assets/client/images/icons/4.png') }}" alt="" /> --}}
                            <img src="{{ asset('assets/client/images/icons/2.png') }}" alt="" />
                        </div>
                        <div class="garlic-burger-content">
                            <h5>Bữa Tiệc Gà Gán</h5>
                            <p> Ăn uống thả ga với những miếng gà giòn rụm, nóng hổi, thấm đẫm hương vị đặc biệt, cho
                                bạn trải nghiệm vị ngon khó cưỡng! </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--popula-menu-area -->
<section class="menu-area padding-bottom-120">
    <div class="container">
        <div class="common-title-area text-center padding-50 wow fadeInUp">
            <h3>Thưởng Thức Món Ngon
            </h3>
            <h2><span>menu</span></h2>
        </div>
        <!-- menu-nav-wrapper -->
        <div class="menu-nav-wrapper">
            <div class="container">
                <div class="row">
                    <ul class="nav" id="menuAreaTab" role="tablist">
                        @foreach ($categories as $key => $category)
                        <li class="nav-item" role="presentation">
                            <div class="nav-link @if ($key == 0) active @endif" id="menu{{ $key + 1 }}-tab"
                                data-bs-toggle="tab" data-bs-target="#menu{{ $key + 1 }}-tab-pane" role="tab"
                                aria-controls="menu{{ $key + 1 }}-tab-pane"
                                aria-selected="{{ $key == 0 ? 'true' : 'false' }}">
                                <div class="single-menu-nav text-center">
                                    <!-- Hình ảnh menu -->
                                    <div class="menu-img mb-1">
                                        <img src="{{ asset('storage/images/' . $category->image) }}" alt="{{ $category->name }}"
                                            class="img-fluid rounded-circle" style="max-width: 100px; max-height: 100px; object-fit: cover;">
                                    </div>

                                    <!-- Tên menu -->
                                    <h6 class="text-black font-weight-bold" style="width: 100%; white-space: nowrap; text-overflow: ellipsis;">
                                        {{ $category->name }}
                                    </h6>

                                    <!-- Đường viền trang trí -->
                                    <span class="g-s-4"><img src="{{ asset('assets/client/images/shapes/10.png') }}" alt="" /></span>
                                    <span class="g-s-5"><img src="{{ asset('assets/client/images/shapes/14.png') }}" alt="" /></span>
                                </div>
                            </div>
                        </li>


                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- menu-items-wrapper -->
        <div class="tab-content" id="nav-tabContent">
            @foreach ($categories as $key => $category)
            <div class="tab-pane fade @if ($key == 0) show active @endif" id="menu{{ $key + 1 }}-tab-pane"
                role="tabpanel" aria-labelledby="menu{{ $key + 1 }}-tab" tabindex="0">
                <div class="menu-items-wrapper menu-custom-padding margin-top-50">
                    <div class="menu-i-shapes">
                        <span class="mis-1"><img src="{{ asset('assets/client/images/shapes/28.png') }}"
                                alt="" /></span>
                        <span class="mis-2"><img src="{{ asset('assets/client/images/shapes/12.png') }}"
                                alt="" /></span>
                        <span class="mis-3"><img src="{{ asset('assets/client/images/shapes/7.png') }}" alt="" /></span>
                        <span class="mis-4"><img src="{{ asset('assets/client/images/shapes/17.png') }}"
                                alt="" /></span>
                    </div>
                    <!-- first-row -->
                    <div class="row row-gap-4">
                        @foreach ($category->dishes as $dish)
                        <div class="col-lg-4 col-md-4">
                            <div class="single-menu-item d-flex justify-content-between align-items-center h-100">
                                <div class="menu-img">
                                    <img src="{{ asset('storage/images/' . $dish->image) }}" alt="{{ $dish->name }}" />
                                </div>
                                <div class="menu-content">
                                    <h5><a href="{{ route('dishDetail', ['id' => $dish->id]) }}">{{ $dish->name }}</a>
                                    </h5>
                                    <span>giá : {{ number_format($dish->price, 0, ',', '.') }} VNĐ</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <hr />
                </div>
            </div>
            @endforeach
        </div>

        <div class="menu-btn text-center">
            <a href="{{ route('menu') }}" class="btn">Đặt hàng ngay bây giờ</a>
        </div>
    </div>
</section>


<!-- banner-gallery -->
<section class="banner-gallery padding-top-100 padding-bottom-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="gallery-img-1">
                            <h3>Buzzed Burger</h3>
                            <p>Sale off 50% chỉ trong tuần này</p>
                            <a href="{{ route('dishDetail', $dish->id) }}" class="btn">Đặt hàng ngay</a>
                            <img src="{{ asset('assets/client/images/gallery/24.png') }}" alt="" />
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="
                    gallery-img-2
                    d-flex
                    align-items-end
                    justify-content-end
                  ">
                            <img src="{{ asset('assets/client/images/gallery/26.png') }}" alt="" />
                            <img src="{{ asset('assets/client/images/shapes/38.png') }}" alt="" class="s11" />
                            <span class="gprice-1">150k</span>
                            <div class="gimg-content">
                                <h5>Super Delicious Pizza</h5>
                                <a href="{{ route('dishDetail', $dish->id) }}">Đặt hàng ngay bây giờ</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row margin-top-30">
                    <div class="col-lg-4 col-md-4">
                        <div class="gallery-img-3">
                            <h5>Super Combo Burger</h5>
                            <a href="{{ route('dishDetail', $dish->id) }}">Đặt hàng ngay bây giờ</a>
                            <img src="{{ asset('assets/client/images/gallery/23.png') }}" alt="" />
                            <img src="{{ asset('assets/client/images/shapes/layer2.png') }}" alt="" class="s12" />
                            <img src="{{ asset('assets/client/images/shapes/113.png') }}" alt="" class="s13" />
                            <span class="gprice-2">150k</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="
                    gallery-img-2
                    d-flex
                    align-items-end
                    justify-content-end
                  ">
                            <img src="{{ asset('assets/client/images/gallery/26.png') }}" alt="" />
                            <img src="{{ asset('assets/client/images/shapes/38.png') }}" alt="" class="s11" />
                            <span class="gprice-1">150k</span>
                            <div class="gimg-content">
                                <h5>Super Delicious Pizza</h5>
                                <a href="{{ route('dishDetail', $dish->id) }}">Đặt hàng ngay bây giờ</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="gallery-img-3">
                            <h5>Super Combo Burger</h5>
                            <a href="{{ route('dishDetail', $dish->id) }}">Đặt hàng ngay bây giờ</a>
                            <img src="{{ asset('assets/client/images/gallery/23.png') }}" alt="" />
                            <img src="{{ asset('assets/client/images/shapes/layer2.png') }}" alt="" class="s12" />
                            <img src="{{ asset('assets/client/images/shapes/113.png') }}" alt="" class="s13" />
                            <span class="gprice-2">150k</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="gallery-img-4">
                    <h5>Super Combo Burger</h5>
                    <a href="{{ route('dishDetail', $dish->id) }}" class="btn">Đặt hàng ngay bây giờ</a>
                    <img src="{{ asset('assets/client/images/gallery/22.png') }}" alt="" />
                    <img src="{{ asset('assets/client/images/shapes/leaves.png') }}" alt="" class="s14" />
                    <img src="{{ asset('assets/client/images/shapes/transparent2.png') }}" alt="" class="s15" />
                    <span class="gprice-4"><img src="{{ asset('assets/client/images/gallery/25.png') }}"
                            alt="" /></span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- countdown -->
<section class="countdown-area padding-top-120 padding-bottom-120">
    <div class="container">
        <div class="countdown-shapes">
            <span class="cs-1 item-bounce"><img src="{{ asset('assets/client/images/shapes/24.png') }}" alt="" /></span>
            <span class="cs-3 item-bounce"><img src="{{ asset('assets/client/images/shapes/26.png') }}" alt="" /></span>
            <span class="cs-4 item-animateOne"><img src="{{ asset('assets/client/images/shapes/27.png') }}"
                    alt="" /></span>
            <span class="cs-5"><img src="{{ asset('assets/client/images/shapes/18.png') }}" alt="" /></span>
            <span class="cs-6"><img src="{{ asset('assets/client/images/shapes/22.png') }}" alt="" /></span>
            <span class="cs-7"><img src="{{ asset('assets/client/images/shapes/30.png') }}" alt="" /></span>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 margin-bottom-20">
                <div class="countdown-left">
                    <span class="cs-1"><img src="{{ asset('assets/client/images/shapes/25.png') }}" alt="" /></span>
                    <span class="cs-2"><img src="{{ asset('assets/client/images/shapes/Leaf.png') }}" alt="" /></span>
                    <span class="cs-3"><img src="{{ asset('assets/client/images/shapes/Leaf4.png') }}" alt="" /></span>
                    <span class="cs-4"><img src="{{ asset('assets/client/images/img/3.png') }}" alt="" /></span>
                    <span class="cs-5"><img src="{{ asset('assets/client/images/shapes/tomato.png') }}" alt="" /></span>
                    <span class="cs-6"><img src="{{ asset('assets/client/images/shapes/onions.png') }}" alt="" /></span>
                    <span class="cs-7"><img src="{{ asset('assets/client/images/shapes/Leaf2.png') }}" alt="" /></span>
                    <span class="cs-8"><img src="{{ asset('assets/client/images/shapes/Leaf3.png') }}" alt="" /></span>
                    <img src="{{ asset('assets/client/images/img/21.png') }}" alt="" />
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1 col-md-12 col-sm-12 col-12">
                <div class="countdown-right">
                    <div class="common-title-area padding-bottom-20">
                        <h2>sắp ra mắt</h2>
                        <h2><span>Pizza gà cay</span></h2>
                    </div>
                    <div class="count-box countdown">
                        <div>
                            <span class="days">03</span>
                            <p class="days_ref">Ngày</p>
                        </div>
                        <span class="seperator">:</span>
                        <div>
                            <span class="hours">00</span>
                            <p class="hours_ref">Giờ</p>
                        </div>
                        <span class="seperator">:</span>
                        <div>
                            <span class="minutes">00</span>
                            <p class="minutes_ref">Phút</p>
                        </div>
                        <span class="seperator">:</span>
                        <div>
                            <span class="seconds">00</span>
                            <p class="seconds_ref">Giây</p>
                        </div>
                    </div>
                    <a href="{{ route('dishDetail', $dish->id) }}" class="btn">Đặt hàng ngay bây giờ</a>
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
                <img src="{{ asset('assets/client/images/gallery/gm1.jpg') }}" alt="" />
                <a href="#"><span><i class="fas fa-image"></i></span></a>
            </div>
            <div class="single-gallery-img">
                <img src="{{ asset('assets/client/images/gallery/gm2.jpg') }}" alt="" />
                <a href="#"><span><i class="fas fa-image"></i></span></a>
            </div>
            <div class="single-gallery-img">
                <img src="{{ asset('assets/client/images/gallery/gm3.jpg') }}" alt="" />
                <a href="#"><span><i class="fas fa-image"></i></span></a>
            </div>
            <div class="single-gallery-img">
                <img src="{{ asset('assets/client/images/gallery/gm4.jpg') }}" alt="" />
                <a href="#"><span><i class="fas fa-image"></i></span></a>
            </div>
            <div class="single-gallery-img">
                <img src="{{ asset('assets/client/images/gallery/gm5.jpg') }}" alt="" />
                <a href="#"><span><i class="fas fa-image"></i></span></a>
            </div>
            <div class="single-gallery-img">
                <img src="{{ asset('assets/client/images/gallery/gm6.jpg') }}" alt="" />
                <a href="#"><span><i class="fas fa-image"></i></span></a>
            </div>
        </div>
    </div>
</div>

<!-- delivery-area -->
<section class="delivery-area padding-top-115 padding-bottom-90">
    <div class="del-shapes">
        <span class="ds-1 item-bounce"><img src="{{ asset('assets/client/images/shapes/35.png') }}" alt="" /></span>
        <span class="ds-2"><img src="{{ asset('assets/client/images/shapes/34.png') }}" alt="" /></span>
        <span class="ds-3 item-bounce"><img src="{{ asset('assets/client/images/shapes/17.png') }}" alt="" /></span>
        <span class="ds-4 item-animateOne"><img src="{{ asset('assets/client/images/shapes/6.png') }}" alt="" /></span>
    </div>
    <div class="container">
        <div class="row">
            <div class="
              col-lg-6
              align-self-lg-center
              col-md-12
              margin-bottom-20
              wow
              fadeInLeft
            ">
                <div class="delivery-left">
                    <img src="{{ asset('assets/client/images/bg/delivery-img.png') }}" alt="" />
                </div>
            </div>
            <div class="col-lg-6 col-md-12 wow fadeInRight">
                <div class="delivery-right">
                    <div class="common-title-area padding-bottom-40">
                        <h3>Vận chuyển</h3>
                        <h2>
                            Dịch vụ giao hàng nhanh chóng, luôn <span>đúng hẹn</span> và <span> đúng địa điểm</span>
                        </h2>
                        <p>
                            Dịch vụ vận chuyển của chúng tôi cam kết mang đến sự nhanh chóng, an toàn và chính xác cho
                            từng đơn hàng. Với đội ngũ chuyên nghiệp và hệ thống quản lý hiện đại, chúng tôi đảm bảo
                            hàng hóa luôn được giao đúng thời gian và địa điểm như yêu cầu. Bất kể khoảng cách xa gần
                            hay loại hàng hóa, chúng tôi đều chú trọng đến chất lượng dịch vụ, giúp khách hàng yên tâm
                            với mỗi lần giao nhận.
                        </p>
                        <div class="order-box d-flex align-items-end">
                            <span class="order-img"><img src="{{ asset('assets/client/images/icons/1.png') }}"
                                    alt="" /></span>
                            <div class="order-content">
                                <p>Số giao hàng.</p>
                                <span>123-59794069</span>
                            </div>
                            <a href="{{ route('dishDetail', $dish->id) }}" class="btn">Đặt hàng ngay bây giờ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Get the current date and time
        var currentDate = new Date();

        // Add 3 days (in milliseconds)
        currentDate.setDate(currentDate.getDate() + 3);

        // Format the target date as MM/DD/YYYY HH:MM:SS
        var targetDate = (currentDate.getMonth() + 1) + '/' + currentDate.getDate() + '/' + currentDate
            .getFullYear() + ' ' + currentDate.getHours() + ':' + currentDate.getMinutes() + ':' + currentDate
            .getSeconds();

        // Initialize countdown timer
        $('.count-box').downCount({
            date: targetDate,
            offset: 0 // Adjust for your timezone if necessary
        });
    });
</script> -->

@endsection
