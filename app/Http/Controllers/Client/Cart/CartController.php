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

        // Lấy tổng giá trị giỏ hàng sau khi áp dụng mã giảm giá nếu có
        $total = session()->get('discounted_total', $cartItems->sum('total_price'));
        $discount = session()->get('discount_value', 0);

        return view('clients.cart.index', compact('cartItems', 'total', 'discount', 'users'));
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
        // Lấy mã giảm giá duy nhất đang hoạt động
        $promotion = Promotion::where('status', 'active')  // Giả sử có cột status để kiểm tra trạng thái mã giảm giá
            ->where('end_time', '>=', now()) // Kiểm tra mã giảm giá chưa hết hạn
            ->first(); // Lấy mã giảm giá đầu tiên đang hoạt động

        if ($promotion) {
            // Mã giảm giá hợp lệ
            $discount = $promotion->discount;

            // Cập nhật số lần sử dụng của mã giảm giá
            $promotion->decrement('number_use');

            // Lấy tổng giỏ hàng của người dùng
            $cartItems = Cart::where('user_id', auth()->id())->get();
            $total = $cartItems->sum('total_price'); // Tổng giá trị giỏ hàng chưa áp dụng giảm giá

            // Tính toán lại tổng sau khi áp dụng mã giảm giá
            $discountedTotal = $total - $discount;

            // Lưu tổng giỏ hàng sau giảm giá và giá trị giảm giá vào session
            session(['discounted_total' => $discountedTotal]);
            session(['discount_value' => $discount]);

            // Thông báo thành công
            flash()->success('Mã giảm giá tự động đã được áp dụng thành công!');
        } else {
            // Nếu không có mã giảm giá hợp lệ, thông báo lỗi
            flash()->error('Không có mã giảm giá nào đang hoạt động!');
        }
    }
}
