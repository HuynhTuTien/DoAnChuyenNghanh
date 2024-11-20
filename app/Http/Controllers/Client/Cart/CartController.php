<?php

namespace App\Http\Controllers\Client\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', auth()->id())->with('dish')->get();
        $users = auth()->user();

        // Lấy tổng giá trị giỏ hàng sau khi áp dụng mã giảm giá nếu có
        $total = session()->get('discounted_total', $cartItems->sum('total_price'));
        $discount = session()->get('discount_value', 0);

        return view('clients.cart.index', compact('cartItems', 'total', 'discount', 'users'));
    }

    public function applyDiscountCode(Request $request)
    {
        // Áp dụng mã giảm giá
        $result = Cart::applyDiscount(auth()->id(), $request->code);

        // Nếu mã giảm giá không hợp lệ, thông báo lỗi và đặt lại giảm giá về 0
        if (isset($result['error'])) {
            flash()->error($result['error']);

            // Đặt lại giá trị giảm giá và tổng giỏ hàng về giá trị mặc định hoặc 0
            session(['discounted_total' => Cart::getTotalPrice(auth()->id())['totalPrice']]); // Đặt lại tổng giỏ hàng không có giảm giá
            session(['discount_value' => 0]);  // Đặt lại giá trị giảm giá về 0

            return redirect()->route('cart');
        }

        // Nếu mã giảm giá hợp lệ, cập nhật tổng giỏ hàng và giá trị giảm giá vào session
        session(['discounted_total' => $result['total']]);
        session(['discount_value' => $result['discount']]);
        flash()->success($result['success']);

        return $this->updateCart();  // Cập nhật lại giỏ hàng
    }




    public function addToCart(Request $request)
    {
        $result = Cart::addToCart(auth()->id(), $request->product_id, $request->quantity);

        if (isset($result['error'])) {
            flash()->error($result['error']);
        } else {
            flash()->success($result['success']);
        }

        return $this->updateCart();
    }

    public function removeFromCart(Request $request, $itemId)
    {
        $userId = auth()->id();  // Lấy ID người dùng hiện tại

        // Gọi phương thức removeItem trong model Cart
        $result = Cart::removeItem($userId, $itemId);

        // Kiểm tra kết quả và trả về thông báo
        if (isset($result['success'])) {
            // Sau khi xóa sản phẩm, bạn cần cập nhật lại giỏ hàng
            return $this->updateCart();
        }

        return redirect()->route('cart')->withErrors($result['error']);
    }

    public function clear()
    {
        // Giỏ hàng được làm sạch
        $result = Cart::clearCart(auth()->id());

        // Xóa các session liên quan đến giảm giá khi làm sạch giỏ hàng
        session()->forget(['discounted_total', 'discount_value']);

        flash()->success($result['success']);

        return $this->updateCart();  // Cập nhật lại giỏ hàng
    }


    public function update(Request $request)
    {
        $result = Cart::updateCart(auth()->id(), $request->input('cart', []));

        if (isset($result['error'])) {
            flash()->error($result['error']);
        } else {
            session(['discounted_total' => $result['total']]);
            session(['discount_value' => $result['discount']]);
            flash()->success($result['success']);
        }

        return redirect()->route('cart');
    }

    // Hàm để cập nhật lại giỏ hàng
    private function updateCart()
    {
        // Lấy tổng giá trị giỏ hàng sau khi áp dụng mã giảm giá nếu có
        $cartSummary = Cart::getTotalPrice(auth()->id());

        // Nếu có giá trị giảm giá trong session, sử dụng giá trị đó
        $discountedTotal = session()->get('discounted_total', $cartSummary['totalPrice']);
        session(['discounted_total' => $discountedTotal]);

        // Lưu thông tin giỏ hàng đã cập nhật vào session
        return redirect()->route('cart')->with('cartSummary', $cartSummary);
    }
}
