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
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (Auth::guard('admin')->check()) { // Sử dụng guard 'admin' thay vì 'web'
            $user = Auth::guard('admin')->user();
            if (in_array($user->role, $roles)) {
                return $next($request);
            }
        }

        // Nếu không phải admin hoặc không có quyền
        return redirect()->route('admin.dashboard'); // Chuyển về trang Dashboard của admin nếu không đủ quyền
    }
}
