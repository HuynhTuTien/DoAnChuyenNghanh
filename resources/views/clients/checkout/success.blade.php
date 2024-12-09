<!-- resources/views/clients/checkout/success.blade.php -->
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
        <div style="text-align: center; padding: 50px;">
            <h2>Đơn hàng của bạn đã được đặt thành công!</h2>
            <hr>
            <p>Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi. Đơn hàng của bạn sẽ được xử lý ngay lập tức.</p>

            <!-- Custom message based on payment option -->
            @if ($order->payment_option == 'store')
                <p>Vui lòng đến cửa hàng vào lúc {{ \Carbon\Carbon::parse($order->store_visit_time)->format('H:i') }} để nhận đơn hàng của bạn.</p>
            @elseif ($order->payment_option == 'delivery')
                <p>Đơn hàng sẽ được giao đến bạn trong vòng 30 phút nữa. Xin cảm ơn!</p>
            @endif

            {{-- <td>
                <a href="{{ route('account.orders.show', $order->id) }}" class="btn btn-info">Xem chi tiết</a>
            </td> --}}

            <p><a href="{{ route('home') }}">Quay lại trang chủ</a></p>
        </div>
    </div>
</div>
@endsection
