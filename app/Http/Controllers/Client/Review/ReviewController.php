<?php

namespace App\Http\Controllers\Client\Review;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderDish;

class ReviewController extends Controller
{
    public function store(Request $request, $dishId)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!Auth::check()) {
            return back()->with('error', 'Vui lòng đăng nhập để gửi đánh giá.');
        }

        // Kiểm tra xem người dùng đã mua món ăn này chưa
        $userId = Auth::id();

        // Kiểm tra trong bảng orders, xem người dùng đã có món này trong đơn hàng chưa
        $orderExists = OrderDish::whereHas('order', function ($query) use ($userId) {
            $query->where('user_id', $userId)->where('status', 'hoàn thành'); // Giả sử đơn hàng đã hoàn thành
        })->where('dish_id', $dishId)->exists();

        if (!$orderExists) {
            return back()->with('error', 'Bạn cần mua món ăn này để có thể đánh giá.');
        }

        // Xác thực dữ liệu
        $request->validate([
            'review' => 'required|string|max:1000',
            'rating' => 'required|integer|between:1,5',
        ]);

        // Tạo mới bình luận
        Review::create([
            'user_id' => Auth::id(),
            'dish_id' => $dishId,
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        return back()->with('success', 'Đánh giá đã được gửi!');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        // Kiểm tra quyền xóa bình luận
        if ($review->user_id != Auth::id()) {
            return back()->with('error', 'Bạn không có quyền xóa bình luận này.');
        }

        $review->delete();

        return back()->with('success', 'Bình luận đã được xóa!');
    }

    public function update(Request $request, $id)
    {
        // Xác thực dữ liệu
        $request->validate([
            'review' => 'required|string|max:1000',
            'rating' => 'required|integer|between:1,5',
        ]);

        // Tìm bình luận cần cập nhật
        $review = Review::findOrFail($id);

        // Kiểm tra quyền sửa bình luận
        if ($review->user_id != Auth::id()) {
            return back()->with('error', 'Bạn không có quyền cập nhật bình luận này.');
        }

        // Cập nhật bình luận
        $review->update([
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        return back()->with('success', 'Bình luận đã được cập nhật!');
    }
}
