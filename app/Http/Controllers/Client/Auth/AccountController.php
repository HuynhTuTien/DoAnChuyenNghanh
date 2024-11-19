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
            ->where('status', '!=', 'đã hủy')
            ->get();


        $promotions = Promotion::paginate(9);
        $totalAmount = $orders->sum(function ($order) {
            return $order->dishes->sum(function ($dish) {
                return $dish->price * $dish->pivot->quantity;
            });
        });

        return view('clients.account.index', compact('user', 'promotions', 'orders', 'totalAmount'));
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

        // Kiểm tra xem đơn hàng có thuộc về người dùng hiện tại không
        if ($order->user_id !== Auth::id()) {
            return response()->json(['success' => false, 'message' => 'Bạn không có quyền hủy đơn hàng này.']);
        }

        // Cập nhật trạng thái đơn hàng thành "đã hủy"
        $order->status = 'đã hủy';
        $order->save();

        return response()->json(['success' => true, 'message' => 'Đơn hàng đã được hủy.']);
    }
}
