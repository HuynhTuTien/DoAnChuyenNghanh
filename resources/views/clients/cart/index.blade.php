@extends('layouts.clients')
@section('title', 'Giỏ hàng')

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
            <nav aria-label="breadcrumb text-center">
                <h2 class="page-title">Giỏ hàng</h2>
                <ol class="breadcrumb text-center">
                    <li class="breadcrumb-item"><a href="/">Trang chủ </a>/<a href="{{ route('cart') }}"> Giỏ
                            hàng</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- shopping-cart -->
<div class="portfolio-info shopping-cart padding-top-120 padding-bottom-90">
    <div class="shopping-shapes">
        <span class="ps1"><img src="{{ asset('assets/client/images/shapes/12.png') }}" alt=""></span>
        <span class="pss2 item-bounce"><img src="{{ asset('assets/client/images/shapes/26.png') }}" alt=""></span>
        <span class="ps3 item-bounce"><img src="{{ asset('assets/client/images/shapes/7.png') }}" alt=""></span>
        <span class="ps4"><img src="{{ asset('assets/client/images/img/32.png') }}" alt=""></span>
        <span class="pss5"><img src="{{ asset('assets/client/images/shapes/16.png') }}" alt=""></span>
        <span class="ps6"><img src="{{ asset('assets/client/images/shapes/13.png') }}" alt=""></span>
    </div>
    <div class="container">
        <div class="upper-table margin-bottom-30">
            <div class="row">
                <div class="col-lg-6 col-md-12 margin-bottom-30">
                    {{-- <form action="{{ route('applyDiscountCode') }}" method="POST">
                        @csrf
                        <div class="upper-t-left d-flex justify-content-between">
                            <input name="code" type="text" placeholder="Nhập mã giảm">
                            <button type="submit" class="btn">áp dụng ngay</button>
                        </div>
                    </form> --}}
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="upper-t-right d-flex justify-content-end">
                        <form id="update-cart-form" action="{{ route('cart.update') }}" method="POST">
                            @csrf
                            <button id="update-cart-button" class="btn btn-primary">Cập nhật giỏ hàng</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div style="overflow-x:auto;">
            @if (count($cartItems) > 0)
            <form id="cart-items-form">
                <table class="table-one">
                    <thead class="table-one-head">
                        <tr class="table-one-tr">
                            <th class="table-one-th" style="width:50%">Tên sản phẩm</th>
                            <th class="table-one-th" style="width:10%">Giá</th>
                            <th class="table-one-th" style="width:8%">Số lượng</th>
                            <th class="table-one-th text-center" style="width:22%">Tổng phụ</th>
                            <th class="table-one-th" style="width:10%"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($cartItems as $item)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="d-none d-md-block col-md-4">
                                        <div class="table-img"><img
                                                src="{{ asset('storage/images/' . $item->dish->image) }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-8">
                                        <h5>{{ $item->dish->name }}</h5>
                                    </div>
                                </div>
                            </td>

                            <td>{{ number_format($item->dish->price) }}đ</td>
                            <td>
                                <input type="number" min="1" name="cart[{{ $item->dish_id }}]"
                                    class="form-control text-center cart-quantity" value="{{ $item->quantity }}"
                                    data-dish-id="{{ $item->dish_id }}">
                            </td>
                            <td class="text-center">
                                {{ number_format($item->total_price) }}đ
                            </td>
                            <td>
                                {{-- <form action="{{ route('cart.remove', $item->dish->id) }}" method="POST" id="delete-form-{{ $item->dish->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger" onclick="deleteItem({{ $item->dish->id }}, '{{ $item->dish->name }}')">Xóa</button>
                                </form> --}}


                                <form action="{{ route('cart.remove', $item->dish->id) }}" method="POST" id="delete-form-{{ $item->dish->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link">
                                        <i class="fa-solid fa-trash" style="color: #ffffff;"></i> <!-- Biểu tượng xóa màu trắng -->
                                    </button>
                                </form>



                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
            @else
            <p>Giỏ hàng của bạn đang trống.</p>
            @endif
        </div>
        <div class="row margin-top-60">

                <div class="row">
                    <div class="col-lg-7">
                        <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Làm sạch</button>
                        </form>
                    </div>
                    <div class="col-lg-5">
                        <div class="card p-4">
                            <div class="mb-4">
                                <h6 class="mb-3">Nhập mã giảm giá</h6>
                                <form action="{{ route('applyDiscountCode') }}" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <input name="code" type="text" class="form-control" placeholder="Nhập mã giảm giá" required>
                                        <button type="submit" class="btn btn-primary">Áp dụng ngay</button>
                                    </div>
                                </form>
                            </div>

                            <div class="mt-4">
                                <form action="{{ route('checkout.store') }}" method="POST">
                                    @csrf
                                    <h6 class="mb-3">Tiến hành thanh toán</h6>
                                    <div class="list-group">
                                        <ul class="list-group-item d-flex justify-content-between">
                                            <span class="font-weight-bold">Mã ưu đãi</span>
                                            <span>-{{ number_format($discount) }}đ</span>
                                        </ul>
                                        <hr>
                                        <ul class="list-group-item d-flex justify-content-between">
                                            <span class="font-weight-bold">Tổng cộng</span>
                                            <span>{{ number_format($total) }}đ</span>
                                        </ul>
                                    </div>
                                    <!-- Sử dụng w-100 cho nút thanh toán và margin-top để tạo khoảng cách -->
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-danger w-100">Tiến hành thanh toán</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>

        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.getElementById('update-cart-button').addEventListener('click', function() {

        // Lấy dữ liệu từ form danh sách sản phẩm
        const cartItemsForm = document.getElementById('cart-items-form');
        const formData = new FormData(cartItemsForm);

        // Tạo một request mới từ form update cart
        const updateCartForm = document.getElementById('update-cart-form');

        // Xóa các input ẩn đã tồn tại (nếu có) để tránh bị trùng lặp khi người dùng nhấn nút nhiều lần
        updateCartForm.querySelectorAll('input[type="hidden"]').forEach(input => input.remove());

        // Thêm token CSRF
        const csrfToken = document.querySelector('input[name="_token"]').value;
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = csrfToken;
        updateCartForm.appendChild(csrfInput);

        // Console log ID sản phẩm và số lượng
        formData.forEach((value, key) => {
            // Chỉ xử lý nếu key có định dạng 'cart[ID]'
            if (key.startsWith('cart[')) {
                const productId = key.split('[')[1].split(']')[0];

                // Tạo input ẩn và thêm vào form update cart
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = key;
                hiddenInput.value = value;
                updateCartForm.appendChild(hiddenInput);
            }
        });

        // Submit form update cart
        updateCartForm.submit();
    });
</script>

<script>
function deleteItem(itemId, itemName) {
    if (confirm('Bạn có chắc chắn muốn xóa sản phẩm "' + itemName + '" (ID: ' + itemId + ') không?')) {
        document.getElementById('delete-form-' + itemId).submit();
    }
}

</script>
@endpush
