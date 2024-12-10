<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Kiểm tra vai trò người dùng
            if (in_array($user->role, $roles)) {
                return $next($request);
            }
        }

        // Xử lý khi không có quyền truy cập
        if ($request->ajax()) {
            // Nếu là yêu cầu AJAX, trả về lỗi JSON
            return response()->json(['error' => 'Bạn không có quyền truy cập!'], 403);
        }

        // Giữ nguyên trang hiện tại và hiển thị thông báo lỗi
        return back()->with('error', 'Bạn không có quyền truy cập vào chức năng này.');
    }
}
