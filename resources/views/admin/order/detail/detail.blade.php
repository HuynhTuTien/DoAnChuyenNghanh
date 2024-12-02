@extends('layouts.admin')
@section('title', 'Chi tiết đơn hàng')
@section('content')
    <div class="content-body">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-xl-12 col-md-6">
                            <div class="card">
                                <div class="card-header border-0 pb-0">
                                    <h4 class="h-title">Thông tin đơn hàng</h4>
                                </div>
                                <div class="card-body pt-2">
                                    <!-- Hiển thị thông tin khách hàng -->
                                    <div class="mb-3">
                                        <strong>Đặt lúc: {{ $order->created_at }}</strong>
                                    </div>
                                    <div class="mb-3">
                                        <strong>Tên khách hàng:</strong> {{ $order->name }}
                                    </div>
                                    <div class="mb-3">
                                        <strong>Số điện thoại:</strong> {{ $order->phone }}
                                    </div>
                                    <div class="mb-3">
                                        <strong>Địa chỉ giao hàng:</strong>
                                        @if($order->delivery_method == 'giao hàng')
                                            {{ $order->delivery_address ?? 'Không có' }}, {{ $order->ward ?? '' }}, {{ $order->district ?? '' }}
                                        @else
                                            Dùng tại cửa hàng
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <strong>Thời gian khách đến:</strong> {{ $order->store_visit_time ?? 'Không có' }}
                                    </div>

                                    <div class="mb-3">
                                        <strong>Ghi chú:</strong> {{ $order->note ?? 'Không có ghi chú' }}
                                    </div>

                                    <!-- Hiển thị trạng thái đơn hàng -->
                                    <div class="mb-3">
                                        <strong>Trạng thái:</strong> {{ $order->status }}
                                    </div>

                                    <!-- Mặt hàng trong đơn hàng -->
                                    @foreach ($order->dishes as $dish)
                                        <div class="food-items-bx">
                                            <div class="food-items-media">
                                                <img src="{{ asset('storage/images/' . $dish->image) }}" alt="">
                                            </div>
                                            <div class="d-flex align-items-end">
                                                <div class="food-items-info">
                                                    <h6>{{ $dish->name }}</h6>
                                                    <h6 class="mb-0 text-primary">
                                                        {{ number_format($dish->price * $dish->pivot->quantity, 0, ',', '.') }}đ
                                                    </h6>
                                                    <span>{{ $dish->pivot->quantity }}x</span>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <hr>


                                    <!-- Thông tin thanh toán và Cập nhật trạng thái đơn hàng cùng 1 hàng ngang -->
                                    <div class="d-flex justify-content-between">
                                        <!-- Thông tin thanh toán -->
                                        <div class="food-totle w-25 m-5">
                                            <ul class="d-flex align-items-center justify-content-between">
                                                <li><span>Ngày và giờ thanh toán</span></li>
                                                <li>
                                                    <h6>{{ $order->order_date }} ({{ $order->order_time }})</h6>
                                                </li>
                                            </ul>

                                            @php
                                                // Tính tổng tiền sản phẩm (không bao gồm khuyến mãi)
                                                $totalAmount = $order->dishes->sum(function ($dish) {
                                                    return $dish->price * $dish->pivot->quantity;
                                                });

                                                // Tính tổng tiền sau khi áp dụng khuyến mãi (theo phần trăm)
                                                $discountPercentage = $order->promotion->discount ?? 0;  // Khuyến mãi là tỷ lệ phần trăm
                                                $discountAmount = ($totalAmount * $discountPercentage) / 100; // Tính toán giảm giá theo phần trăm
                                                $totalAfterDiscount = $totalAmount - $discountAmount; // Giảm tiền theo phần trăm khuyến mãi
                                            @endphp

                                            <!-- Hiển thị tổng tiền chưa giảm giá -->
                                            <ul class="d-flex align-items-center justify-content-between">
                                                <li><span>Tổng cộng (chưa giảm giá)</span></li>
                                                <li>
                                                    <h6>{{ number_format($totalAmount, 0, ',', '.') }}đ</h6>
                                                </li>
                                            </ul>

                                            <!-- Hiển thị tổng tiền sau khuyến mãi -->
                                            <ul class="d-flex align-items-center justify-content-between">
                                                <li><span>Khuyến mãi (-{{ number_format($order->promotion->discount ?? 0, 0, ',', '.') }}%)</span></li>
                                                <li>
                                                    <h6>-{{ number_format($discountAmount, 0, ',', '.') }}đ</h6>
                                                </li>
                                            </ul>

                                            <!-- Hiển thị tổng tiền sau khi áp dụng khuyến mãi -->
                                            <ul class="d-flex align-items-center justify-content-between">
                                                <li><span>Thanh toán</span></li>
                                                <li>
                                                    <h6>{{ number_format($totalAfterDiscount, 0, ',', '.') }}đ</h6>
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- Cập nhật trạng thái đơn hàng -->
                                        <form action="{{ route('admin.order.updateStatus', $order->id) }}" method="POST" class="w-50 m-5">
                                            @csrf
                                            <label for="status">Trạng thái đơn hàng:</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="đang xử lý" {{ $order->status == 'đang xử lý' ? 'selected' : '' }}>Đang xử lý</option>
                                                <option value="đang vận chuyển" {{ $order->status == 'đang vận chuyển' ? 'selected' : '' }}>Đang vận chuyển</option>
                                                <option value="hoàn thành" {{ $order->status == 'hoàn thành' ? 'selected' : '' }}>Hoàn thành</option>
                                                <option value="đã hủy" {{ $order->status == 'đã hủy' ? 'selected' : '' }}>Hủy đơn hàng</option> <!-- Thêm trạng thái hủy -->
                                            </select>
                                            <button type="submit" class="btn btn-primary mt-3">Cập nhật trạng thái</button>
                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <a href="{{ route('order.list') }}" class="btn btn-secondary mt-3">Quay lại</a>

    </div>
@endsection

