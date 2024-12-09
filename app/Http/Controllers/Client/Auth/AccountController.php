<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\UpdateAccountRequest;
use App\Models\User;
use App\Models\Promotion;
use App\Models\Order;

class AccountController extends Controller
{
    public function index()
    {
        return view('clients.account.index');
    }

    public function show($id)
    {
        $user = Auth::user();

        // Fetch orders for the authenticated user
        $orders = Order::with(['dishes', 'payments'])
            ->where('user_id', $user->id)
            ->get();


        $promotions = Promotion::paginate(9);
        $totalAmount = $orders->sum(function ($order) {
            return $order->dishes->sum(function ($dish) {
                return $dish->price * $dish->pivot->quantity;
            });
        });

        return view('clients.account.index', compact('user', 'promotions', 'orders', 'totalAmount'));
    }

    public function showOrders()
    {
        $user = Auth::user();
        // Lấy tất cả các đơn hàng của người dùng, bao gồm cả đơn đã hủy
        $orders = Order::where('user_id', $user->id)->get();

        return view('clients.account.orders', compact('orders'));
    }


    public function update(UpdateAccountRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validated();

        // Nếu có mật khẩu mới, xử lý việc thay đổi mật khẩu
        if ($request->filled('new_password')) {
            // Kiểm tra mật khẩu hiện tại
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác.']);
            }

            $data['password'] = Hash::make($request->new_password);
        }

        $user->update($data);
        return redirect()->route('account.show', $id)->with('success', 'Người dùng đã được cập nhật thành công!');
    }


    public function someControllerMethod()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->withErrors(['login' => 'Bạn cần đăng nhập để truy cập trang này.']);
        }

        $username = Auth::check() ? Auth::user()->name : null;
        return view('components.client.header', compact('username', 'user'));
    }

    public function cancelOrder($id)
    {
        $order = Order::findOrFail($id);

        // Kiểm tra quyền sở hữu đơn hàng
        if ($order->user_id !== Auth::id()) {
            return response()->json(['success' => false, 'message' => 'Bạn không có quyền hủy đơn hàng này.']);
        }

        // Kiểm tra trạng thái đơn hàng có thể hủy hay không
        if ($order->status != 'tiếp nhận đơn') {
            return response()->json(['success' => false, 'message' => 'Không thể hủy đơn hàng này vì trạng thái không cho phép.']);
        }

        // Cập nhật trạng thái đơn hàng thành "đã hủy"
        $order->status = 'đã hủy';
        $order->save();

        // Trả về dữ liệu để cập nhật giao diện
        return response()->json(['success' => true, 'orderId' => $order->id, 'status' => 'Đã hủy']);
    }
}
