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

    // public function processPayment(Request $request)
    // {
    //     // Validate thông tin người dùng
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'phone_number' => [
    //             'nullable',
    //             'string',
    //             'size:10',  // Yêu cầu độ dài 10 ký tự
    //             'regex:/^(0[3|5|7|8|9])[0-9]{8}$|^(086|096|097|098|032|033|034|035|036|037|038|039|070|076|077|078|079|089|090|093|081|082|083|084|085|088|091|094|052|056|058|092|059|099|087)[0-9]{7}$/',  // Kiểm tra số điện thoại theo nhà mạng tại Việt Nam
    //         ],
    //         'note' => 'nullable|string|max:1000',
    //         'paymentMethod' => 'required|in:tiền mặt,vnpay,momo', // Các phương thức thanh toán hợp lệ
    //         'payment_option' => 'required|in:store,delivery', // Dùng tại cửa hàng hoặc giao hàng
    //         'delivery_address' => 'nullable|string|max:255|required_if:payment_option,delivery', // Địa chỉ cần thiết nếu giao hàng
    //         'district' => 'nullable|string|max:255|required_if:payment_option,delivery', // Quận, chỉ yêu cầu khi giao hàng
    //         'ward' => 'nullable|string|max:255|required_if:payment_option,delivery', // Phường, chỉ yêu cầu khi giao hàng
    //         'store_visit_time' => 'nullable|date_format:H:i|required_if:payment_option,store', // Thời gian tới cửa hàng, chỉ yêu cầu khi dùng tại cửa hàng
    //     ], [
    //         // Thông báo lỗi bằng tiếng Việt
    //         'name.required' => 'Tên là bắt buộc.',
    //         'name.string' => 'Tên phải là chuỗi ký tự.',
    //         'name.max' => 'Tên không được vượt quá 255 ký tự.',

    //         'phone_number.string' => 'Số điện thoại phải là chuỗi ký tự.',
    //         'phone_number.size' => 'Số điện thoại phải có 10 ký tự.',
    //         'phone_number.regex' => 'Số điện thoại không hợp lệ. Vui lòng nhập số điện thoại đúng định dạng của các nhà mạng Việt Nam.',

    //         'note.max' => 'Ghi chú không được vượt quá 1000 ký tự.',

    //         'delivery_address.required_if' => 'Địa chỉ giao hàng là bắt buộc nếu chọn giao hàng.',
    //         'district.required_if' => 'Quận là bắt buộc nếu chọn giao hàng.',
    //         'ward.required_if' => 'Phường là bắt buộc nếu chọn giao hàng.',

    //         'store_visit_time.required_if' => 'Thời gian đến cửa hàng là bắt buộc nếu chọn tại cửa hàng.',
    //         'store_visit_time.date_format' => 'Thời gian đến cửa hàng phải đúng định dạng HH:MM.',
    //     ]);

    //     $userId = auth()->id();
    //     $user = auth()->user();

    //     // Lấy giỏ hàng của người dùng
    //     $cartItems = Cart::where('user_id', $userId)->get();
    //     if ($cartItems->isEmpty()) {
    //         return redirect()->route('cart')->with('error', 'Giỏ hàng của bạn đang trống.');
    //     }

    //     // Tính tổng tiền và khuyến mãi
    //     $totalPrice = $cartItems->sum('total_price');
    //     $discount = session('discount_value', 0);
    //     $totalPriceAfterDiscount = max(0, $totalPrice - $discount);

    //     $orderCode = 'DH-' . strtoupper(str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT));

    //     // Lấy mã giảm giá nếu có
    //     $promotion = Promotion::where('status', 'active')
    //         ->where('end_time', '>=', now()) // Kiểm tra mã giảm giá còn hạn
    //         ->first();

    //     // Tạo đơn hàng mới và lưu `promotion_id`
    //     $order = Order::create([
    //         'user_id' => $userId,
    //         'name' => $request->name,
    //         'phone' => $request->phone,
    //         'phone_number' => $request->phone,

    //         'note' => $request->note,
    //         'code_order' => $orderCode,
    //         'status' => 'tiếp nhận đơn',
    //         'payment_option' => $request->payment_option,
    //         'delivery_address' => $request->payment_option === 'delivery' ? $request->delivery_address : null,
    //         'district' => $request->payment_option === 'delivery' ? $request->district : null, // Lưu quận
    //         'ward' => $request->payment_option === 'delivery' ? $request->ward : null, // Lưu phường
    //         'store_visit_time' => $request->payment_option === 'store' ? $request->store_visit_time : null, // Lưu thời gian tới cửa hàng, chỉ khi chọn "store"
    //         'total_amount' => $totalPriceAfterDiscount,
    //         'promotion_id' => $promotion ? $promotion->id : null, // Lưu mã giảm giá nếu có
    //     ]);

    //     // Kiểm tra và thông báo nếu nguyên liệu không đủ, không trừ ngay
    //     foreach ($cartItems as $cartItem) {
    //         $dish = Dish::with('ingredients')->find($cartItem->dish_id);
    //         if ($dish) {
    //             foreach ($dish->ingredients as $ingredient) {
    //                 $quantityNeeded = $ingredient->pivot->quantity * $cartItem->quantity;

    //                 // Kiểm tra nếu số lượng nguyên liệu trong kho đủ
    //                 if ($ingredient->quantity < $quantityNeeded) {
    //                     return redirect()->route('cart')->with('error', "Không đủ nguyên liệu: {$ingredient->name} trong kho.");
    //                 }
    //             }
    //         }
    //     }

    //     // Lưu món ăn vào đơn hàng
    //     foreach ($cartItems as $cartItem) {
    //         $order->dishes()->attach($cartItem->dish_id, ['quantity' => $cartItem->quantity]);
    //     }

    //     // Tạo bản ghi thanh toán
    //     Payment::create([
    //         'order_id' => $order->id,
    //         'user_id' => $userId,
    //         'payment_date' => now(),
    //         'payment_method' => $request->paymentMethod,
    //         'total_amount' => $totalPriceAfterDiscount,
    //     ]);


    //     // Xóa giỏ hàng
    //     Cart::where('user_id', $userId)->delete();

    //     // Xóa session giảm giá sau khi thanh toán
    //     session()->forget(['discounted_total', 'discount_value']);

    //     // Gửi email thông báo
    //     try {
    //         Mail::to($user->email)->send(new PaymentSuccessMail($user, $order));
    //     } catch (\Exception $e) {
    //         // Log lỗi nếu không gửi được email
    //         \Log::error('Error sending payment email: ' . $e->getMessage());
    //     }

    //     // Chuyển hướng người dùng đến trang chủ hoặc trang thành công
    //     // return redirect()->route('home')->with('success', 'Đơn hàng của bạn đã được đặt thành công!');
    //     return redirect()->route('order.success')->with('success', 'Đơn hàng của bạn đã được đặt thành công!');
    // }

    public function processPayment(Request $request)
    {
        // Validate thông tin người dùng
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => [
                'nullable',
                'string',
                'size:10',  // Yêu cầu độ dài 10 ký tự
                'regex:/^(0[3|5|7|8|9])[0-9]{8}$|^(086|096|097|098|032|033|034|035|036|037|038|039|070|076|077|078|079|089|090|093|081|082|083|084|085|088|091|094|052|056|058|092|059|099|087)[0-9]{7}$/',  // Kiểm tra số điện thoại theo nhà mạng tại Việt Nam
            ],
            'note' => 'nullable|string|max:1000',
            'paymentMethod' => 'required|in:tiền mặt,vnpay,momo', // Các phương thức thanh toán hợp lệ
            'payment_option' => 'required|in:store,delivery', // Dùng tại cửa hàng hoặc giao hàng
            'delivery_address' => 'nullable|string|max:255|required_if:payment_option,delivery', // Địa chỉ cần thiết nếu giao hàng
            'district' => 'nullable|string|max:255|required_if:payment_option,delivery', // Quận, chỉ yêu cầu khi giao hàng
            'ward' => 'nullable|string|max:255|required_if:payment_option,delivery', // Phường, chỉ yêu cầu khi giao hàng
            'store_visit_time' => 'nullable|date_format:H:i|required_if:payment_option,store', // Thời gian tới cửa hàng, chỉ yêu cầu khi dùng tại cửa hàng
        ], [
            // Thông báo lỗi bằng tiếng Việt
            'name.required' => 'Tên là bắt buộc.',
            'name.string' => 'Tên phải là chuỗi ký tự.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',

            'phone_number.string' => 'Số điện thoại phải là chuỗi ký tự.',
            'phone_number.size' => 'Số điện thoại phải có 10 ký tự.',
            'phone_number.regex' => 'Số điện thoại không hợp lệ. Vui lòng nhập số điện thoại đúng định dạng của các nhà mạng Việt Nam.',

            'note.max' => 'Ghi chú không được vượt quá 1000 ký tự.',

            'delivery_address.required_if' => 'Địa chỉ giao hàng là bắt buộc nếu chọn giao hàng.',
            'district.required_if' => 'Quận là bắt buộc nếu chọn giao hàng.',
            'ward.required_if' => 'Phường là bắt buộc nếu chọn giao hàng.',

            'store_visit_time.required_if' => 'Thời gian đến cửa hàng là bắt buộc nếu chọn tại cửa hàng.',
            'store_visit_time.date_format' => 'Thời gian đến cửa hàng phải đúng định dạng HH:MM.',
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

        // Xử lý thanh toán với VNPay
        if ($request->paymentMethod === 'vnpay') {
            // Lấy thông tin từ môi trường hoặc cấu hình
            $vnp_TmnCode = env('VNPAY_TMN_CODE');  // Mã website tại VNPay
            $vnp_HashKey = env('VNPAY_HASH_SECRET');  // Chuỗi bí mật của bạn tại VNPay
            $vnp_Url = env('VNPAY_URL');           // URL của VNPay (có thể là sandbox hoặc live)

            // Lấy thông tin đơn hàng từ request
            $orderCode = $request->order_code;
            $totalPriceAfterDiscount = 1000000; // Tổng giá trị đơn hàng sau khi giảm giá

            // Thông tin thanh toán
            $vnp_OrderInfo = 'Thanh toán đơn hàng  . $orderCode';
            $vnp_Amount = $totalPriceAfterDiscount * 100; // VNPay yêu cầu số tiền là đơn vị đồng

            // Thông tin giao dịch
            $vnp_TxnRef = $orderCode;  // Mã giao dịch là mã đơn hàng của bạn

            // Tạo dữ liệu cho yêu cầu thanh toán
            $inputData = [
                "vnp_Version" => "2.1.0",
                "vnp_Command" => "pay",  // Lệnh thanh toán
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_CurrCode" => "VND",  // Mã tiền tệ là VND
                "vnp_TxnRef" => $vnp_TxnRef,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => "billpayment",
                "vnp_Locale" => 'vn',
                "vnp_CreateDate" => now()->format('YmdHis'),
                "vnp_ReturnUrl" => route('home'),  // Đường dẫn trả về sau khi thanh toán
                "vnp_IpAddr" => request()->ip(),  // Địa chỉ IP của người dùng
            ];

            // Sắp xếp các tham số theo thứ tự từ A-Z (yêu cầu của VNPay)
            ksort($inputData);

            // Tạo chuỗi query từ các tham số đã sắp xếp
            $query = http_build_query($inputData);

            // Tạo chuỗi hashData từ query và thêm chuỗi bí mật vnp_HashSecret
            $hashData = $query . "&vnp_HashSecret=" . $vnp_HashKey;

            // Mã hóa hashData bằng SHA-256 để tạo ra vnp_SecureHash
            $vnp_SecureHash = hash('sha256', $hashData);

            // Thêm vnp_SecureHash vào dữ liệu thanh toán
            $inputData['vnp_SecureHash'] = $vnp_SecureHash;

            // Tạo URL thanh toán từ các tham số
            $vnp_Url .= "?" . http_build_query($inputData);
            dd($vnp_Url);
            dd($vnp_SecureHash);
            // Chuyển hướng người dùng đến VNPay để thanh toán
            return redirect($vnp_Url);
        }



        // Nếu chọn thanh toán bằng tiền mặt, không chuyển hướng
        if ($request->paymentMethod === 'tiền mặt') {
            // Xóa giỏ hàng
            Cart::where('user_id', $userId)->delete();

            // Xóa session giảm giá sau khi thanh toán
            session()->forget(['discounted_total', 'discount_value']);

            // Gửi email thông báo
            try {
                Mail::to($user->email)->send(new PaymentSuccessMail($user, $order));
            } catch (\Exception $e) {
                // Log lỗi nếu không gửi được email
                \Log::error('Error sending payment email: ' . $e->getMessage());
            }

            // Chuyển hướng người dùng đến trang chủ hoặc trang thành công
            return redirect()->route('order.success')->with('success', 'Đơn hàng của bạn đã được đặt thành công!');
        }
    }


    //--------------------------------------------------------
    public function orderSuccess()
    {
        $userId = auth()->id();
        $order = Order::where('user_id', $userId)->orderBy('id', 'desc')->first(); // Get the latest order

        return view('clients.checkout.success', compact('order'));
    }


    public function paymentReturn(Request $request)
    {
        // Lấy thông tin từ VNPay
        $vnp_ResponseCode = $request->vnp_ResponseCode;
        $vnp_TxnRef = $request->vnp_TxnRef;
        $vnp_SecureHash = $request->vnp_SecureHash;

        // Tạo hash để xác thực
        $vnp_HashSecret = env('VNPAY_HASH_SECRET');
        $inputData = $request->except('vnp_SecureHash');
        ksort($inputData);
        $query = http_build_query($inputData);
        $hashData = $query . "&vnp_HashSecret=" . $vnp_HashSecret;
        $calculatedHash = hash('sha256', $hashData);

        // Kiểm tra hash và mã phản hồi
        if ($vnp_SecureHash === $calculatedHash && $vnp_ResponseCode === '00') {
            // Thanh toán thành công
            $order = Order::where('code_order', $vnp_TxnRef)->first();
            $order->status = 'Đã thanh toán';
            $order->save();

            // Xử lý các công việc sau khi thanh toán thành công
            return redirect()->route('order.success')->with('success', 'Thanh toán thành công!');
        } else {
            // Thanh toán thất bại
            return redirect()->route('order.failed')->with('error', 'Thanh toán không thành công!');
        }
    }
}
