@extends('layouts.client')

@section('title', 'Thanh toán thành công')

@section('content')
    <div class="container">
        <h2>Thanh toán thành công!</h2>
        <p>Đơn hàng của bạn đã được thanh toán thành công.</p>
        <p>Mã đơn hàng: {{ $order->id }}</p>
        <p>Tổng cộng: {{ number_format($order->total_amount, 0, ',', '.') }}₫</p>
    </div>
@endsection
