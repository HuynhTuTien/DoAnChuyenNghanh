@extends('layouts.clients')

@section('title', $dishDetail->name)

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
                <h2 class="page-title">{{ $dishDetail->name }}</h2>
                <ol class="breadcrumb text-center">
                    <li class="breadcrumb-item"><a href="/">Trang chủ </a> / <a
                            href="{{ route('dishDetail', $dishDetail->id) }}"> Cửa hàng món ăn</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- chicken-recipe-area -->
<section class="chicken-recipe-area padding-top-115 padding-bottom-80">
    <div class="recipe-shapes">
        <span class="rs1"><img src="{{ asset('assets/client/images/shapes/12.png') }}" alt=""></span>
        <span class="rs2"><img src="{{ asset('assets/client/images/shapes/13.png') }}" alt=""></span>
        <span class="rs3"><img src="{{ asset('assets/client/images/shapes/26.png') }}" alt=""></span>
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 margin-bottom-30 wow fadeInLeft">
                <div class="recipe-left">
                    <div class="slider-for">
                        <div class="single-slide">
                            <div class="product-content">
                                <img width="100px" class="mp" src="{{ asset('storage/images/' . $dishDetail->image) }}"
                                    alt="">
                                <img class="pbadge" src="{{ asset('assets/client/images/icons/pbadge.png') }}" alt="">
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="product-content">
                                <img width="100px" class="mp" src="{{ asset('storage/images/' . $dishDetail->image) }}"
                                    alt="">
                                <img class="pbadge" src="{{ asset('assets/client/images/icons/pbadge.png') }}" alt="">
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="product-content">
                                <img width="100px" class="mp" src="{{ asset('storage/images/' . $dishDetail->image) }}"
                                    alt="">
                                <img class="pbadge" src="{{ asset('assets/client/images/icons/pbadge.png') }}" alt="">
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-lg-6 wow fadeInRight">
                <div class="recipe-right">
                    <h2>{{ $dishDetail->name }}</h2>
                    <form action="{{ route('cartAdd') }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="product_id" value="{{ $dishDetail->id }}">
                        <div class="chickens-inforbar d-flex justify-content-around align-items-center">
                            <span class="cp">{{ number_format($dishDetail->price) }} VNĐ </span>
                            <span class="rate"> 5<i class="fas fa-star"></i></span>
                            <span> <span class="colored"><i class="fas fa-comments"></i></span> Bình luận</span>
                            <span> <span class="colored"><i class="fas fa-heart"></i></span> 200+ thích</span>
                        </div>
                        <p>{{ $dishDetail->description }}
                        </p>
                        <div class="chickens-details d-flex justify-content-between">
                            <span>
                                <label for="stock">số lượng</label>
                                <input name="quantity" min="1" type="number" value="1" placeholder="1">
                            </span>
                            <span>
                                <label for="stock">số lượng có sẵn</label>
                                <input id="stock" min="1" type="number" value="{{ $dishDetail->quantity }}"
                                    placeholder="0">
                            </span>
                        </div>
                        <button type="submit" class="btn">Thêm vào giỏ hàng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- product-description -->
<section class="product-des-area">
    <div class="pdes-shapes">
        <span class="pds1"><img src="{{ asset('assets/client/images/img/32.png') }}" alt=""></span>
        <span class="pds2"><img src="{{ asset('assets/client/images/shapes/7.png') }}" alt=""></span>

    </div>
    <div class="container">
        <div class="product-des-nav margin-bottom-30">
            <ul class="nav" id="productDesTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <div class="nav-link active" id="des-tab" data-bs-toggle="tab" data-bs-target="#des" role="tab"
                        aria-controls="des" aria-selected="true">Mô tả</div>
                </li>

                <li class="nav-item" role="presentation">
                    <div class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" role="tab"
                        aria-controls="reviews" aria-selected="false">Đánh giá</div>
                </li>
            </ul>

        </div>
        <div class="product-des-content">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="des" role="tabpanel" aria-labelledby="info-tab">
                    <div class="pd-inner-content">
                        <div class="pd-shapes">
                            <span class="pds1"><img src="{{ asset('assets/client/images/shapes/17.png') }}"
                                    alt=""></span>
                            <span class="pds2"><img src="{{ asset('assets/client/images/shapes/7.png') }}"
                                    alt=""></span>
                            <span class="pds3"><img src="{{ asset('assets/client/images/shapes/28.png') }}"
                                    alt=""></span>
                        </div>

                        <p>{{ $dishDetail->description }}.</p>
                    </div>
                </div>
                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                    <div class="pd-inner-content">
                        <label for="">Ghi bình luận và đánh giá</label>
                        <form action="{{ route('reviews.store', $dishDetail->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" name="review" id="" cols="30" rows="5"
                                    placeholder="Vui lòng nhập bình luận"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="rating">Đánh giá:</label>
                                <select name="rating" id="rating" class="form-control">
                                    <option value="">Chọn số sao</option>
                                    <option value="1">1 sao</option>
                                    <option value="2">2 sao</option>
                                    <option value="3">3 sao</option>
                                    <option value="4">4 sao</option>
                                    <option value="5">5 sao</option>
                                </select>
                            </div>
                            <button class="btn btn-danger mt-3">Gửi đánh giá</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @push('style')
        <style>
            .review-item {
                transition: all 0.3s ease;
            }

            .review-item:hover {
                background-color: #f8f9fa;
                /* Màu nền khi hover */
            }

            .dropdown-menu {
                border-radius: 0.375rem;
                /* Bo góc menu */
                padding: 0.25rem;
                /* Padding nhỏ hơn */
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.175);
                /* Đổ bóng menu */
            }

            .dropdown-item {
                font-size: 0.875rem;
                /* Kích thước chữ nhỏ hơn */
                padding: 0.375rem 1rem;
                /* Padding nhỏ hơn cho các item */
            }

            .dropdown-item:hover {
                background-color: #f8f9fa;
                /* Màu nền khi hover */
            }

            .btn-outline-secondary {
                border-color: #6c757d;
                /* Màu viền của nút */
                color: #6c757d;
                /* Màu chữ của nút */
            }

            .btn-outline-secondary:hover {
                background-color: #6c757d;
                /* Màu nền của nút khi hover */
                color: #fff;
                /* Màu chữ của nút khi hover */
            }
        </style>
        @endpush

        <div class="container py-4">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h6 class="card-title mb-4">Đánh giá</h6>
                    <p>Tổng bình luận: {{ count($reviews) }}</p>
                    <div class="card shadow-sm">
                        <div class="card-body">
                            @foreach($reviews as $review)
                            <div class="review-item border-bottom pb-3 mb-3 row">
                                <div class="col-lg-8">
                                    <p class="mb-1">{{ $review->review }}</p>
                                    <p class="text-muted mb-1">
                                        <!-- Hiển thị sao dựa trên rating -->
                                        @for($i = 1; $i <= 5; $i++) <i
                                            class="fa-solid fa-star {{ $i <= $review->rating ? 'text-warning' : 'text-muted' }}">
                                            </i>
                                            @endfor
                                    </p>
                                    <p class="text-muted mb-0">Đăng bởi: {{ $review->user->name }}</p>
                                </div>
                                <div class="col-lg-4 text-end">
                                    @if(\Illuminate\Support\Facades\Auth::user()->id == $review->user_id)
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $review->id }}">Chỉnh sửa</a></li>
                                            <li><a class="dropdown-item text-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $review->id }}">Xóa</a></li>
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal chỉnh sửa bình luận -->
        @foreach($reviews as $review)
        <div class="modal fade" id="editModal{{ $review->id }}" tabindex="-1"
            aria-labelledby="editModalLabel{{ $review->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $review->id }}">Chỉnh sửa bình luận</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="review" class="form-label">Bình luận</label>
                                <textarea id="review" name="review" class="form-control" rows="3"
                                    required>{{ old('review', $review->review) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="rating" class="form-label">Đánh giá</label>
                                <input id="rating" name="rating" type="number" class="form-control" min="1" max="5"
                                    value="{{ old('rating', $review->rating) }}" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Modal xóa bình luận -->
        @foreach($reviews as $review)
        <div class="modal fade" id="deleteModal{{ $review->id }}" tabindex="-1"
            aria-labelledby="deleteModalLabel{{ $review->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel{{ $review->id }}">Xóa bình luận</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Bạn có chắc chắn muốn xóa bình luận này không?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach



    </div>
</section>

<!-- related-product -->
<div class="related-product padding-top-115 padding-bottom-100">
    <div class="related-shapes">
        <span class="rs1"><img src="{{ asset('assets/client/images/shapes/16.png') }}" alt=""></span>
    </div>
    <div class="container wow fadeInUp">
        <h3><span>sản phẩm liên quan</span></h3>
        <div class="related-product-inner">
            <div class="row">
                @foreach ($relatedDishes as $relatedDish)
                <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="single-dishes">
                        <div class="dish-img">
                            <img src="{{ asset('storage/images/' . $relatedDish->image) }}" style="width: inherit;" alt="">
                        </div>
                        <div class="dish-content">
                            <h5>
                                <a href="{{ route('dishDetail', ['id' => $relatedDish->id]) }}">{{ $relatedDish->name }}</a>
                            </h5>
                            <span class="price">giá : {{ number_format($relatedDish->price) }} VNĐ</span>
                        </div>
                        <span class="badge">hot</span>
                        <div class="cart-opt">
                            <span>
                                <a href="#"><i class="fas fa-heart"></i></a>
                            </span>
                            <span>
                                <a href="{{ route('dishDetail', ['id' => $relatedDish->id]) }}"><i class="fas fa-shopping-basket"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection
