<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thanh toán thành công</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
            padding: 20px;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #fff;
        }
        h1 {
            color: #333;
            font-size: 24px;
        }
        h2 {
            color: #555;
            font-size: 20px;
        }
        p {
            font-size: 16px;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #8054B3;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        ul li {
            padding: 5px 0;
            color:#8054B3;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        .col-md-6 {
            width: 48%;
            margin: 1%;
            padding: 10px;
            border: 1px solid #ddd;
        }
        .col-md-6 h3 {
            font-size: 18px;
            color: #8054B3;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Xin chào {{ $order->user->name }}</h1>
        <h2>Cảm ơn bạn đã thanh toán đơn hàng {{ $order->code_order }}</h2>
        <p>Chúng tôi đã nhận được thanh toán của bạn. Đơn hàng của bạn đang được xử lý.</p>
        <p>Thông tin đơn hàng:</p>
        <ul>
            <li><strong>Mã đơn hàng:</strong> {{ $order->code_order }}</li>
            <li><strong>Ngày đặt hàng:</strong> {{ $order->order_date }}</li>
            <li><strong>Phương thức thanh toán:</strong> {{ $order->payments->first()->payment_method }}</li>
            <li><strong>Tổng tiền:</strong> {{ number_format($order->payments->first()->total_amount, 0, ',', '.') }} VND</li>
        </ul>
        <table>
            <thead>
                <tr>
                    <th>Tên món</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                @if($order->dishes && $order->dishes->isNotEmpty())
                    @foreach($order->dishes as $dish)
                    <tr>
                        <td>{{ $dish->name }}</td>
                        <td>{{ $dish->pivot->quantity }}</td>
                        <td>{{ number_format($dish->price, 0, ',', '.') }} VND</td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">Không có món ăn nào trong đơn hàng.</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-6">
                <h3>Địa chỉ nhận hàng:</h3>
                <p>{{ $order->user->address ?? 'Không có địa chỉ' }}</p>
            </div>
            <div class="col-md-6">
                <h3>Thông tin thanh toán:</h3>
                <p><strong>Số điện thoại:</strong> {{ $order->user->phone ?? 'Không có số điện thoại' }}</p>
                <p><strong>Email:</strong> {{ $order->user->email ?? 'Không có email' }}</p>
            </div>
        </div>
        <p>Chúng tôi sẽ thông báo cho bạn khi đơn hàng được giao.</p>

        <p>Trân trọng,</p>
        <p>Nhà hàng KHADYO</p>
    </div>
</body>
</html>
