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
        $user = Auth::guard('admin')->user();

        // Kiểm tra nếu người dùng không phải admin/staff
        if (!$user || !in_array($user->role, ['admin', 'staff'])) {
            return redirect()->route('admin.login')->withErrors(['email' => 'Bạn không có quyền truy cập.']);
        }

        return $next($request);
    }
}