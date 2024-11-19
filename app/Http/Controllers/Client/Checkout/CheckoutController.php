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

        // Lấy giỏ hàng của người dùng
        $cartItems = Cart::where('user_id', $userId)->with(['dish', 'promotion'])->get();

        // Tính tổng tiền và khuyến mãi
        $totalPrice = $cartItems->sum('total_price');
        $discount = session('discount_value', 0); // Lấy giá trị khuyến mãi từ session
        $totalPriceAfterDiscount = max(0, $totalPrice - $discount);

        return view('clients.checkout.checkout', compact('cartItems', 'totalPrice', 'discount', 'totalPriceAfterDiscount'));
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
