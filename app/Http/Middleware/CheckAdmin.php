<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle($request, Closure $next)
    {
        // Kiểm tra user đã đăng nhập và có quyền admin hoặc staff thông qua guard 'admin'
        if (Auth::guard('admin')->check() && (Auth::guard('admin')->user()->role === 'admin' || Auth::guard('admin')->user()->role === 'staff')) {
            return $next($request); // Cho phép truy cập tiếp
        }

        // Nếu không phải admin hoặc staff, chuyển hướng về trang login
        return redirect()->route('admin.login')->withErrors('Bạn không có quyền truy cập.');
    }
}