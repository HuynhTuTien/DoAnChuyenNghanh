<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
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

            if (in_array($user->role, $roles)) {
                return $next($request);
            }
        }

        return redirect()->route('login')->withErrors('Bạn không có quyền cần thiết.');
    }
}
