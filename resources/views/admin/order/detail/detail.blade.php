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
                                        <strong>Tên khách hàng:</strong> {{ $order->name }}
                                    </div>
                                    <div class="mb-3">
                                        <strong>Số điện thoại:</strong> {{ $order->phone }}
                                    </div>
                                    <div class="mb-3">
                                        <strong>Địa chỉ giao hàng:</strong> {{ $order->delivery_address ?? 'Không có' }}
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
                                                    <span>{{ $dish->pivot->quantity }}x</span>
                                                </div>
                                                <div class="d-inline-flex text-nowrap">
                                                    <span
                                                        class="me-2">{{ number_format($dish->price, 0, ',', '.') }}đ</span>
                                                    <h6 class="mb-0 text-primary">
                                                        {{ number_format($dish->price * $dish->pivot->quantity, 0, ',', '.') }}đ
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <hr>

                                    <!-- Cập nhật trạng thái đơn hàng -->
                                    <form action="{{ route('admin.order.updateStatus', $order->id) }}" method="POST">
                                        @csrf
                                        <label for="status">Trạng thái đơn hàng:</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="đang xử lý" {{ $order->status == 'đang xử lý' ? 'selected' : '' }}>Đang xử lý</option>
                                            <option value="đang vận chuyển" {{ $order->status == 'đang vận chuyển' ? 'selected' : '' }}>Đang vận chuyển</option>
                                            <option value="hoàn thành" {{ $order->status == 'hoàn thành' ? 'selected' : '' }}>Hoàn thành</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary mt-3">Cập nhật trạng thái</button>
                                    </form>

                                    <!-- Thông tin thanh toán -->
                                    <div class="food-totle">
                                        <ul class="d-flex align-items-center justify-content-between">
                                            <li><span>Ngày và giờ thanh toán</span></li>
                                            <li>
                                                <h6>{{ $order->order_date }} ({{ $order->order_time }})</h6>
                                            </li>
                                        </ul>
                                        <ul class="d-flex align-items-center justify-content-between">
                                            <li><span>Khuyến mãi</span></li>
                                            <li>
                                                <h6>-{{ number_format($order->promotion->discount ?? 0, 0, ',', '.') }}đ</h6>
                                            </li>
                                        </ul>

                                        @php
                                            $totalAmount = $order->dishes->sum(function ($dish) {
                                                return $dish->price * $dish->pivot->quantity;
                                            });
                                        @endphp
                                        <ul class="d-flex align-items-center justify-content-between">
                                            <li><span>Tổng cộng</span></li>
                                            <li>
                                                <h6>{{ number_format($totalAmount, 0, ',', '.') }}đ</h6>
                                            </li>
                                        </ul>
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
s
