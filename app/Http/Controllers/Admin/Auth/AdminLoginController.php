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

        if (Auth::attempt($request->only('email', 'password'))) {
            // Kiểm tra role của người dùng
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                Auth::logout(); // Đăng xuất nếu không phải admin
                return redirect()->route('admin.login')->withErrors(['email' => 'Bạn không có quyền truy cập.']);
            }
        }

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

        return view('admin.auth.login'); // Trang đăng nhập cho admin
    }
}
