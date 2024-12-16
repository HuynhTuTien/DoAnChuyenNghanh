<?php

namespace App\Http\Controllers\Client\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Dish;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentSuccessMail;
use App\Models\Promotion;
use Carbon\Carbon;


class CheckoutController extends Controller
{
    public function checkout()
    {
        $userId = auth()->id();
        $cartItems = Cart::where('user_id', $userId)->with(['dish', 'promotion'])->get();
        $totalPrice = $cartItems->sum('total_price');
        $discount = session('discount_value', 0);
        $totalPriceAfterDiscount = max(0, $totalPrice - $discount);

        // Danh sách các quận và phường
        $districts = [
            'Tân Phú' => [
                'Hiệp Tân',
                'Hòa Thạnh',
                'Phú Thọ Hòa',
                'Phú Thạnh',
                'Phú Trung',
                'Tân Quý',
                'Tân Thành',
                'Tân Sơn Nhì',
                'Tân Thới Hòa',
                'Tây Thạnh',
                'Sơn Kỳ'
            ],
            'Tân Bình' => [
                'Phường 1',
                'Phường 2',
                'Phường 3',
                'Phường 4',
                'Phường 5',
                'Phường 6',
                'Phường 7',
                'Phường 8',
                'Phường 9',
                'Phường 10',
                'Phường 11',
                'Phường 12',
                'Phường 13',
                'Phường 14',
                'Phường 15'
            ],
            'Bình Tân' => [
                'An Lạc',
                'An Lạc A',
                'Bình Hưng Hòa',
                'Bình Hưng Hòa A',
                'Bình Hưng Hòa B',
                'Bình Trị Đông',
                'Bình Trị Đông A',
                'Bình Trị Đông B',
                'Tân Tạo',
                'Tân Tạo A'
            ],
        ];

        return view('clients.checkout.checkout', compact('cartItems', 'totalPrice', 'discount', 'totalPriceAfterDiscount', 'districts'));
    }

    
    public function processPayment(Request $request)
    {
        // Validate thông tin người dùng
        $request->validate([
            // Validate các trường thông tin như đã có trong mã của bạn
        ]);

        $userId = auth()->id();
        $user = auth()->user();

        // Lấy giỏ hàng của người dùng
        $cartItems = Cart::where('user_id', $userId)->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        // Tính tổng tiền và khuyến mãi
        $totalPrice = $cartItems->sum('total_price');
        $discount = session('discount_value', 0);
        $totalPriceAfterDiscount = max(0, $totalPrice - $discount);

        $orderCode = 'DH-' . strtoupper(str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT));

        // Lấy mã giảm giá nếu có
        $promotion = Promotion::where('status', 'active')
            ->where('end_time', '>=', now()) // Kiểm tra mã giảm giá còn hạn
            ->first();

        // Tạo đơn hàng mới và lưu `promotion_id`
        $order = Order::create([
            'user_id' => $userId,
            'name' => $request->name,
            'phone' => $request->phone,
            'phone_number' => $request->phone,
            'note' => $request->note,
            'code_order' => $orderCode,
            'status' => 'tiếp nhận đơn',
            'payment_option' => $request->payment_option,
            'delivery_address' => $request->payment_option === 'delivery' ? $request->delivery_address : null,
            'district' => $request->payment_option === 'delivery' ? $request->district : null, // Lưu quận
            'ward' => $request->payment_option === 'delivery' ? $request->ward : null, // Lưu phường
            'store_visit_time' => $request->payment_option === 'store' ? $request->store_visit_time : null, // Lưu thời gian tới cửa hàng, chỉ khi chọn "store"
            'total_amount' => $totalPriceAfterDiscount,
            'promotion_id' => $promotion ? $promotion->id : null, // Lưu mã giảm giá nếu có
        ]);

        // Kiểm tra và thông báo nếu nguyên liệu không đủ, không trừ ngay
        foreach ($cartItems as $cartItem) {
            $dish = Dish::with('ingredients')->find($cartItem->dish_id);
            if ($dish) {
                foreach ($dish->ingredients as $ingredient) {
                    $quantityNeeded = $ingredient->pivot->quantity * $cartItem->quantity;

                    // Kiểm tra nếu số lượng nguyên liệu trong kho đủ
                    if ($ingredient->quantity < $quantityNeeded) {
                        return redirect()->route('cart')->with('error', "Không đủ nguyên liệu: {$ingredient->name} trong kho.");
                    }
                }
            }
        }

        // Lưu món ăn vào đơn hàng
        foreach ($cartItems as $cartItem) {
            $order->dishes()->attach($cartItem->dish_id, ['quantity' => $cartItem->quantity]);
        }

        // Tạo bản ghi thanh toán
        Payment::create([
            'order_id' => $order->id,
            'user_id' => $userId,
            'payment_date' => now(),
            'payment_method' => $request->paymentMethod,
            'total_amount' => $totalPriceAfterDiscount,
        ]);

        // Nếu chọn thanh toán bằng tiền mặt
        if ($request->paymentMethod === 'tiền mặt') {
            // Xóa giỏ hàng
            Cart::where('user_id', $userId)->delete();

            // Xóa session giảm giá sau khi thanh toán
            session()->forget(['discounted_total', 'discount_value']);

            // Gửi email thông báo
            try {
                Mail::to($user->email)->send(new PaymentSuccessMail($user, $order));
            } catch (\Exception $e) {
                \Log::error('Error sending payment email: ' . $e->getMessage());
            }

            // Chuyển hướng người dùng đến trang chủ hoặc trang thành công
            return redirect()->route('order.success')->with('success', 'Đơn hàng của bạn đã được đặt thành công!');
        }

        // Nếu chọn thanh toán qua VNPAY
        if ($request->paymentMethod === 'vnpay') {
            // Cấu hình các tham số thanh toán cho VNPAY
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = route('vnpay.callback');
            $vnp_TmnCode = "TF5Z58XH"; // Mã website tại VNPAY
            $vnp_HashSecret = "NAR813AFQ3N0Q67GM3HTCX25VX01WLPU"; // Chuỗi bí mật

            $vnp_TxnRef = $order->id; // Mã đơn hàng
            $vnp_OrderInfo = "Thanh toán hoá đơn"; // Mô tả đơn hàng
            $vnp_Amount = $totalPriceAfterDiscount * 100; // Chuyển sang đơn vị tiền tệ (VNĐ)
            $vnp_Locale = "vn"; // Ngôn ngữ thanh toán
            $vnp_BankCode = $request->bank_code ?? ""; // Mã ngân hàng nếu có
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => "Onl",
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }

            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }

            // Chuyển hướng người dùng đến VNPAY
            return redirect()->away($vnp_Url);
        }
    }


    //--------------------------------------------------------
    public function orderSuccess()
    {
        $userId = auth()->id();
        $order = Order::where('user_id', $userId)->orderBy('id', 'desc')->first(); // Get the latest order

        return view('clients.checkout.success', compact('order'));
    }

    public function vnpayCallback(Request $request)
    {
        $userId = auth()->id();
        $user = auth()->user();
        $cartItems = Cart::where('user_id', $userId)->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Giỏ hàng của bạn đang trống.');
        }
        $inputData = $request->all();
        $vnp_HashSecret = "NAR813AFQ3N0Q67GM3HTCX25VX01WLPU"; // Chuỗi bí mật đã ghi nhớ

        // Bỏ qua vnp_SecureHash và vnp_SecureHashType từ dữ liệu đầu vào
        $secureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHash'], $inputData['vnp_SecureHashType']);

        // Sắp xếp lại các tham số theo thứ tự bảng chữ cái
        ksort($inputData);

        // Xây dựng chuỗi hash
        $hashData = "";
        foreach ($inputData as $key => $value) {
            $hashData .= urlencode($key) . "=" . urlencode($value) . "&";
        }

        // Loại bỏ dấu "&" thừa ở cuối chuỗi
        $hashData = rtrim($hashData, "&");

        // Tính toán giá trị hash
        $computedHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        // So sánh mã bảo mật với mã tính toán
        if ($secureHash !== $computedHash) {
            Log::error('Mã bảo mật không khớp: ' . $secureHash . ' != ' . $computedHash);
            return redirect()->route('order.failed')->with('error', 'Xác thực thanh toán thất bại!');
        }

        // Tiếp tục xử lý thanh toán nếu mã bảo mật khớp
        if ($inputData['vnp_ResponseCode'] == '00') {
            $orderId = $inputData['vnp_TxnRef'];
            $order = Order::find($orderId);
            if ($order) {
                $order->status = 'paid';
                $order->save();  // Không cần cập nhật payment_date vào bảng orders

                // Lưu thông tin thanh toán vào bảng Payment
                Payment::create([
                    'order_id' => $order->id,
                    'user_id' => $order->user_id,  // Lấy user_id từ order
                    'payment_date' => now(),        // Lưu ngày thanh toán vào bảng Payment
                    'payment_method' => 'vnpay',   // Giả sử bạn lưu phương thức thanh toán là vnpay
                    'total_amount' => $inputData['vnp_Amount'] / 100, // Chuyển về đơn vị tiền tệ (VNĐ)
                ]);

                Cart::where('user_id', $order->user_id)->delete();
                session()->forget(['discounted_total', 'discount_value']);

                // Gửi email xác nhận
                try {
                    Mail::to($order->user->email)->send(new \App\Mail\PaymentSuccessMail($order->user, $order));
                } catch (\Exception $e) {
                    Log::error('Error sending payment email: ' . $e->getMessage());
                }

                return redirect()->route('order.success')->with('success', 'Thanh toán thành công!');
            }
        }

        return redirect()->route('order.failed')->with('error', 'Thanh toán không thành công!');
    }


}
    

