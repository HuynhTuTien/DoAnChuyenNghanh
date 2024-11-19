@extends('layouts.clients')
@section('title', 'Thanh toán')

@section('content')
<div class="banner-area breadcrumb-area padding-top-120 padding-bottom-90">
    <div class="bread-shapes">
        <span class="b-shape-1 item-bounce"><img src="{{ asset('assets/client/images/img/5.png') }}" alt=""></span>
        <span class="b-shape-2"><img src="{{ asset('assets/client/images/img/6.png') }}" alt=""></span>
        <span class="b-shape-3"><img src="{{ asset('assets/client/images/img/7.png') }}" alt=""></span>
        <span class="b-shape-4"><img src="{{ asset('assets/client/images/img/9.png') }}" alt=""></span>
    </div>
    <div class="container padding-top-120">
        <div class="row justify-content-center">
            <nav aria-label="breadcrumb">
                <h2 class="page-title">Thanh toán</h2>
                <ol class="breadcrumb text-center">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="checkout-area padding-top-120 padding-bottom-120">
    <div class="container">
        <form action="{{ route('payment.process') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">Thông tin giỏ hàng</h5>
                        </div>
                        <div class="card-body p-0">
                            <table class="table mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>STT</th>
                                        <th>Món ăn</th>
                                        <th>Giá bán</th>
                                        <th>Số lượng</th>
                                        <th>Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $key => $cart)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $cart->dish->name }}</td>
                                        <td>{{ number_format($cart->dish->price, 0, ',', '.') }}₫</td>
                                        <td>{{ $cart->quantity }}</td>
                                        <td>{{ number_format($cart->total_price, 0, ',', '.') }}₫</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card mb-3">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">Thông tin khách hàng</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Họ tên</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Số điện thoại</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label">Ghi chú</label>
                                <textarea name="note" class="form-control" rows="3">{{ old('note') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="paymentOption" class="form-label">Hình thức thanh toán</label>
                                <select name="payment_option" id="paymentOption" class="form-select" onchange="toggleAddressField(this.value)">
                                    <option value="store">Dùng tại cửa hàng</option>
                                    <option value="delivery">Giao hàng</option>
                                </select>
                            </div>

                            <div class="mb-3" id="deliveryAddressField" style="display: none;">
                                <label for="deliveryAddress" class="form-label">Địa chỉ giao hàng</label>
                                <textarea name="delivery_address" id="deliveryAddress" class="form-control" rows="3" placeholder="Nhập địa chỉ của bạn"></textarea>
                            </div>


                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">Thanh toán</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-2">
                                <strong>Tạm tính:</strong>
                                <span class="float-end">{{ number_format($totalPrice, 0, ',', '.') }}₫</span>
                            </div>
                            <div class="mb-2">
                                <strong>Khuyến mãi:</strong>
                                <span class="float-end">-{{ number_format($discount, 0, ',', '.') }}₫</span>
                            </div>
                            <div class="mb-2">
                                <strong>Tổng cộng:</strong>
                                <span class="float-end text-danger">{{ number_format($totalPriceAfterDiscount, 0, ',', '.') }}₫</span>
                            </div>
                            <div class="mb-3">
                                <label for="paymentMethod" class="form-label">Phương thức thanh toán</label>
                                <select name="paymentMethod" class="form-select" required>
                                    <option value="restaurant">Thanh toán tiền mặt</option>
                                    <option value="vnpay">Thanh toán qua VNPay</option>
                                    <option value="momo">Thanh toán qua MoMo</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Hoàn tất thanh toán</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function toggleAddressField(option) {
        const addressField = document.getElementById('deliveryAddressField');
        if (option === 'delivery') {
            addressField.style.display = 'block';
        } else {
            addressField.style.display = 'none';
        }
    }
</script>
@endsection
