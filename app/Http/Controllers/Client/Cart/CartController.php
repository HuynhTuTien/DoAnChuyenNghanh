<?php

namespace App\Http\Controllers\Client\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Promotion;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', auth()->id())->with('dish')->get();
        $users = auth()->user();

        // Tính tổng giá trị giỏ hàng trước khi áp dụng giảm giá
        $totalBeforeDiscount = $cartItems->sum('total_price');

        // Lấy giá trị giảm giá từ session (nếu có)
        $discount = session()->get('discount_value', 0);

        // Lấy phần trăm giảm giá từ mã khuyến mãi (nếu có)
        $promotion = Promotion::where('status', 'active')
            ->where('end_time', '>=', now())
            ->first();

        $discountPercentage = $promotion ? $promotion->discount : 0;

        // Tính tổng giỏ hàng sau khi áp dụng giảm giá
        $total = $totalBeforeDiscount - $discount;

        return view('clients.cart.index', compact('cartItems', 'total', 'discount', 'users', 'totalBeforeDiscount', 'discountPercentage'));
    }



    public function addToCart(Request $request)
    {
        // Thêm sản phẩm vào giỏ hàng
        $result = Cart::addToCart(auth()->id(), $request->product_id, $request->quantity);

        if (isset($result['error'])) {
            flash()->error($result['error']);
        } else {
            // Sau khi thêm sản phẩm thành công, áp dụng mã giảm giá tự động (nếu có)
            $this->applyAutoDiscount();  // Hàm tự động áp dụng mã giảm giá

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

        // Tính lại tổng giỏ hàng và cập nhật lại session nếu có
        $cartItems = Cart::where('user_id', auth()->id())->get();
        $total = $cartItems->sum('total_price'); // Tổng giá trị giỏ hàng sau khi đã làm sạch
        session(['discounted_total' => $total]);  // Cập nhật lại tổng giỏ hàng
        session(['discount_value' => 0]);         // Nếu không có sản phẩm, xóa giá trị giảm giá

        flash()->success($result['success']);

        // Cập nhật lại giỏ hàng sau khi làm sạch và tính lại tổng giỏ hàng
        return $this->updateCart();  // Cập nhật lại giỏ hàng sau khi làm sạch
    }

    public function update(Request $request)
    {
        // Cập nhật giỏ hàng với thông tin mới từ request
        $result = Cart::updateCart(auth()->id(), $request->input('cart', []));

        if (isset($result['error'])) {
            flash()->error($result['error']);
        } else {
            // Sau khi cập nhật giỏ hàng thành công, áp dụng mã giảm giá tự động nếu có
            $this->applyAutoDiscount();  // Áp dụng mã giảm giá tự động

            flash()->success($result['success']);
        }

        // Cập nhật lại giỏ hàng và chuyển về trang giỏ hàng
        return redirect()->route('cart');
    }

    // Hàm để cập nhật lại giỏ hàng
    private function updateCart()
    {
        // Lấy tổng giá trị giỏ hàng của người dùng
        $cartItems = Cart::where('user_id', auth()->id())->get();

        if ($cartItems->isEmpty()) {
            // Nếu giỏ hàng trống, không áp dụng giảm giá tự động
            session()->forget(['discounted_total', 'discount_value']);
            $cartSummary = [
                'totalPrice' => 0,  // Tổng giỏ hàng khi không có sản phẩm
            ];
        } else {
            // Nếu giỏ hàng không trống, tính tổng và áp dụng giảm giá tự động
            $cartSummary = Cart::getTotalPrice(auth()->id());

            // Áp dụng mã giảm giá tự động nếu có
            $this->applyAutoDiscount(); // Áp dụng mã giảm giá
        }

        // Nếu có giá trị giảm giá trong session, sử dụng giá trị đó
        $discountedTotal = session()->get('discounted_total', $cartSummary['totalPrice']);

        // Cập nhật lại tổng giỏ hàng với giá trị giảm giá
        $cartSummary['totalPrice'] = $discountedTotal;

        // Trả về thông tin giỏ hàng đã được cập nhật vào session
        return redirect()->route('cart')->with('cartSummary', $cartSummary);
    }

    private function applyAutoDiscount()
    {
        // Lấy mã giảm giá hợp lệ
        $promotion = Promotion::where('status', 'active')
            ->where('end_time', '>=', now())
            ->first();

        if ($promotion) {
            // Tính toán giảm giá theo phần trăm
            $discountPercentage = $promotion->discount; // Giảm theo phần trăm

            // Lấy tổng giỏ hàng trước khi giảm giá
            $totalBeforeDiscount = Cart::where('user_id', auth()->id())->sum('total_price');

            // Tính toán số tiền giảm giá
            $discountAmount = ($totalBeforeDiscount * $discountPercentage) / 100;

            // Tính tổng giỏ hàng sau khi áp dụng giảm giá
            $discountedTotal = max(0, $totalBeforeDiscount - $discountAmount); // Đảm bảo tổng không âm

            // Lưu vào session
            session(['discounted_total' => $discountedTotal, 'discount_value' => $discountAmount]);

            // flash()->success("");
        } else {
            flash()->error('Không có mã giảm giá hợp lệ.');
        }
    }
}
