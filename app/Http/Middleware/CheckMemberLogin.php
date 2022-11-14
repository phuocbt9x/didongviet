<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckMemberLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userLogin = Auth::user();
        if (Auth::check()) {
            if ($userLogin->activated === 1) {
                return $next($request);
            }
            return redirect()->back()->withErrors(['login' => 'Tài khoản của bạn chưa được kích hoạt! Vui lòng kiểm tra email để kích hoạt!']);
        }
        return redirect()->back()->withErrors(['login' => 'Vui lòng đăng nhập tài khoản!']);
    }
}
