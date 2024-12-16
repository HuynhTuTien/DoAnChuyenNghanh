<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login'); // Trang đăng nhập cho admin
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Kiểm tra nếu là admin hoặc staff (đăng nhập từ bảng admin_staff)
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            $user = Auth::guard('admin')->user();
            // dd($user); // Kiểm tra xem user có được trả về hay không
            // Kiểm tra xem người dùng có phải là admin hoặc staff không
            if (in_array($user->role, ['admin', 'staff'])) {
                return redirect()->route('admin.dashboard'); // Trang dashboard của admin/staff
            }
        }

        // Nếu không phải admin hoặc không đăng nhập thành công
        return back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng.']);
    }

    public function admin()
    {
        return view('admin.statistical.index'); // Trang admin sau khi đăng nhập thành công
    }

    public function logoutAdmin(Request $request)
    {
        Auth::logout(); // Đăng xuất tài khoản
        $request->session()->invalidate(); // Xóa toàn bộ session
        $request->session()->regenerateToken(); // Tạo token CSRF mới để bảo mật

        return redirect()->route('admin.login'); // Trang đăng nhập cho admin
    }
}