<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center">BILL</h1>
        <h2 class="text-center">Code order #{{ $order->code_order }}</h2>
        <p><strong>Name:</strong> {{ $order->name }}</p>
        <p><strong>Date:</strong> {{ $order->order_date }}</p>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Food's name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->dishes as $dish)
                    <tr>
                        <td>{{ $dish->name }}</td>
                        <td>{{ $dish->pivot->quantity }}</td>
                        <td>{{ number_format($dish->price, 0, ',', '.') }} d</td>
                        <td>{{ number_format($dish->price * $dish->pivot->quantity, 0, ',', '.') }}d</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-end">
            <p><strong class="float-start">Promotion:</strong>
                -{{ number_format($order->promotion->discount ?? 0, 0, ',', '.') }}d</p>
            <p><strong class="float-start">Total:</strong> {{ number_format($totalAmount, 0, ',', '.') }}d</p>
            <div>
                {!! $barcode !!}
            </div>
        </div>
        <hr>
        <h5 class="text-center">Thank you very much, see you again</h5>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
