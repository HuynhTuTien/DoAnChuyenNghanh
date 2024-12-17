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
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a> / Thanh toán</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="checkout-area padding-top-120 padding-bottom-120">
    <div class="container">
        <form action="{{ route('payment.process') }}" method="POST">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <!-- Cart Details -->
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

                <!-- Customer Information and Payment Section -->
                <div class="col-md-5">
                    <div class="card mb-3">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">Thông tin giao hàng</h5>
                        </div>
                        <div class="card-body">
                            <!-- Customer Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Họ tên</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Customer Phone -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">Số điện thoại</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone ?? '') }}" required>
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Customer Note -->
                            <div class="mb-3">
                                <label for="note" class="form-label">Ghi chú</label>
                                <textarea name="note" class="form-control" rows="3">{{ old('note') }}</textarea>
                                @error('note')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Payment Option Selection -->
                            <div class="mb-3">
                                <label for="paymentOption" class="form-label">Hình thức nhận hàng</label>
                                <select name="payment_option" id="paymentOption" class="form-select" onchange="toggleAddressField(this.value)">
                                    <option value="store" selected>Dùng tại cửa hàng</option>
                                    <option value="delivery">Giao hàng tận nơi</option>
                                </select>
                                @error('payment_option')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Delivery Address Section -->
                            <div class="mb-3" id="deliveryAddressField" style="display: none;">
                                <label for="district" class="form-label text-muted">Hiện tại của hàng chỉ giới hạn khu vực giao hàng trong một số quận ở Thành phố Hồ Chí Minh</label>
                                <label for="district" class="form-label">Chọn Quận</label>
                                <select name="district" id="district" class="form-select" onchange="updateWards(this.value)">
                                    <option value="">Chọn Quận</option>
                                    <option value="Tân Phú">Tân Phú</option>
                                    <option value="Tân Bình">Tân Bình</option>
                                    <option value="Bình Tân">Bình Tân</option>
                                </select>
                                @error('district')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Ward Selection -->
                            <div class="mb-3" id="wardField" style="display: none;">
                                <label for="ward" class="form-label">Chọn Phường</label>
                                <select name="ward" id="ward" class="form-select">
                                    <option value="">Chọn Phường</option>
                                </select>
                                @error('ward')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Delivery Address Field -->
                            <div class="mb-3" id="deliveryAddressFieldWrapper" style="display: none;">
                                <label for="deliveryAddress" class="form-label">Địa chỉ giao hàng</label>
                                <textarea name="delivery_address" id="deliveryAddress" class="form-control" rows="3" placeholder="Nhập địa chỉ của bạn"></textarea>
                                @error('delivery_address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Store Visit Time Field -->
                            <div class="mb-3" id="storeTimeField" style="display: none;">
                                <label for="storeTime" class="form-label">Chọn thời gian đến</label>
                                <input type="time" name="store_visit_time" id="storeTime" class="form-control">
                                @error('store_visit_time')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Payment Summary and Methods -->
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
                                    <option value="tiền mặt">Thanh toán tiền mặt</option>
                                    <option value="vnpay">Thanh toán VNPay</option>
                                </select>
                                @error('paymentMethod')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Thanh toán</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    // Toggle delivery fields
    function toggleAddressField(option) {
        const addressField = document.getElementById('deliveryAddressField');
        const wardField = document.getElementById('wardField');
        const deliveryAddressFieldWrapper = document.getElementById('deliveryAddressFieldWrapper');
        const storeTimeField = document.getElementById('storeTimeField');

        if (option === 'delivery') {
            // Hiển thị các trường liên quan đến giao hàng
            addressField.style.display = 'block';
            wardField.style.display = 'block';
            deliveryAddressFieldWrapper.style.display = 'block';
            storeTimeField.style.display = 'none';  // Ẩn trường thời gian khi giao hàng
        } else {
            // Hiển thị trường thời gian và ẩn các trường địa chỉ
            addressField.style.display = 'none';
            wardField.style.display = 'none';
            deliveryAddressFieldWrapper.style.display = 'none';
            storeTimeField.style.display = 'block';  // Hiển thị trường thời gian khi dùng tại cửa hàng
        }
    }

    // Mặc định khi trang load là "Dùng tại cửa hàng"
    window.onload = function() {

        // Xử lý trường thời gian
        const storeTimeField = document.getElementById('storeTime');

        // Lấy thời gian hiện tại
        const now = new Date();
        const currentHour = now.getHours();
        const currentMinute = now.getMinutes();

        // Chuyển thời gian hiện tại thành định dạng hh:mm
        const currentTime = now.toISOString().slice(0, 16).substring(11);

        // Thiết lập giới hạn thời gian từ 8h sáng đến 10h tối
        const openingTime = "08:00";
        const closingTime = "22:00";

        // Thiết lập min và max cho input time
        storeTimeField.min = currentTime > openingTime ? currentTime : openingTime;
        storeTimeField.max = closingTime;

        // Hiển thị trường thời gian nếu cần
        storeTimeField.style.display = "block";

        toggleAddressField('store');  // Mặc định là "Dùng tại cửa hàng"
    }


    // Update wards based on selected district
    function updateWards(district) {
        const wardSelect = document.getElementById('ward');
        let wards = [];
        switch (district) {
            case 'Tân Phú':
                wards = ['Hiệp Tân', 'Hòa Thạnh', 'Phú Thọ Hòa', 'Phú Thạnh', 'Phú Trung', 'Tân Quý', 'Tân Thành', 'Tân Sơn Nhì', 'Tân Thới Hòa', 'Tây Thạnh', 'Sơn Kỳ'];
                break;
            case 'Tân Bình':
                wards = ['Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5', 'Phường 6', 'Phường 7', 'Phường 8', 'Phường 9', 'Phường 10', 'Phường 11', 'Phường 12', 'Phường 13', 'Phường 14', 'Phường 15'];
                break;
            case 'Bình Tân':
                wards = ['An Lạc', 'An Lạc A', 'Bình Hưng Hòa', 'Bình Hưng Hòa A', 'Bình Hưng Hòa B', 'Bình Trị Đông', 'Bình Trị Đông A', 'Bình Trị Đông B', 'Tân Tạo', 'Tân Tạo A'];
                break;
            default:
                wards = [];
        }
        // Populate ward select options
        wardSelect.innerHTML = '<option value="">Chọn Phường</option>';
        wards.forEach(function (ward) {
            const option = document.createElement('option');
            option.value = ward;
            option.textContent = ward;
            wardSelect.appendChild(option);
        });
    }
</script>


@endsection
