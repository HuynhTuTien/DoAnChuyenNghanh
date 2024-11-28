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
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits_between:10,11',
            'note' => 'nullable|string|max:1000',
            'paymentMethod' => 'required|in:restaurant,vnpay,momo', // Các phương thức thanh toán hợp lệ
            'payment_option' => 'required|in:store,delivery', // Dùng tại cửa hàng hoặc giao hàng
            'delivery_address' => 'nullable|string|max:255|required_if:payment_option,delivery', // Địa chỉ cần thiết nếu giao hàng
            'district' => 'nullable|string|max:255|required_if:payment_option,delivery', // Quận, chỉ yêu cầu khi giao hàng
            'ward' => 'nullable|string|max:255|required_if:payment_option,delivery', // Phường, chỉ yêu cầu khi giao hàng
            'store_visit_time' => 'nullable|date_format:H:i|required_if:payment_option,store', // Thời gian tới cửa hàng, chỉ yêu cầu khi dùng tại cửa hàng
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

        // Tạo đơn hàng mới
        $order = Order::create([
            'user_id' => $userId,
            'name' => $request->name,
            'phone' => $request->phone,
            'note' => $request->note,
            'code_order' => $orderCode,
            'status' => 'Đang xử lý',
            'payment_option' => $request->payment_option,
            'delivery_address' => $request->payment_option === 'delivery' ? $request->delivery_address : null,
            'district' => $request->payment_option === 'delivery' ? $request->district : null, // Lưu quận
            'ward' => $request->payment_option === 'delivery' ? $request->ward : null, // Lưu phường
            'store_visit_time' => $request->payment_option === 'store' ? $request->store_visit_time : null, // Lưu thời gian tới cửa hàng, chỉ khi chọn "store"
            'total_amount' => $totalPriceAfterDiscount,
        ]);

        foreach ($cartItems as $cartItem) {
            // Gắn món ăn vào đơn hàng
            $order->dishes()->attach($cartItem->dish_id, ['quantity' => $cartItem->quantity]);

            // Trừ số lượng món ăn
            $dish = Dish::with('ingredients')->find($cartItem->dish_id);
            if ($dish) {
                $dish->decrement('quantity', $cartItem->quantity);

                // Cập nhật số lượng nguyên liệu cần thiết
                foreach ($dish->ingredients as $ingredient) {
                    $quantityNeeded = $ingredient->pivot->quantity * $cartItem->quantity;

                    // Kiểm tra nếu số lượng nguyên liệu trong kho đủ
                    if ($ingredient->quantity < $quantityNeeded) {
                        return redirect()->route('cart')->with('error', "Không đủ nguyên liệu: {$ingredient->name} trong kho.");
                    }

                    // Trừ số lượng nguyên liệu
                    $ingredient->decrement('quantity', $quantityNeeded);
                }
            }
        }

        // Tạo bản ghi thanh toán
        Payment::create([
            'order_id' => $order->id,
            'user_id' => $userId,
            'payment_date' => now(),
            'payment_method' => $request->paymentMethod,
            'total_amount' => $totalPriceAfterDiscount,
        ]);

        // Xóa giỏ hàng
        Cart::where('user_id', $userId)->delete();

        // Gửi email thông báo
        try {
            Mail::to($user->email)->send(new PaymentSuccessMail($user, $order));
        } catch (\Exception $e) {
            // Log lỗi nếu không gửi được email
            \Log::error('Error sending payment email: ' . $e->getMessage());
        }

        // Chuyển hướng người dùng đến trang chủ hoặc trang thành công
        return redirect()->route('home')->with('success', 'Đơn hàng của bạn đã được đặt thành công!');
    }
}
