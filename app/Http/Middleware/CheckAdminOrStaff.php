<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class CheckAdminOrStaff
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra nếu người dùng là admin hoặc staff
        if (Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'staff')) {
            return $next($request);
        }

        // Nếu không phải admin hoặc staff, trả về trang lỗi hoặc chuyển hướng đến trang login
        return redirect()->route('login');  // Hoặc bạn có thể chuyển hướng đến một trang lỗi nào đó
    }
}
