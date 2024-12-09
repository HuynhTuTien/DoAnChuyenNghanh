<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'admin' || Auth::user()->role === 'staff') {
            return $next($request);
        }

        return redirect()->route('admin.login')->withErrors('Bạn không có quyền truy cập.');
    }
}
