<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminLogin
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
        $userLogin = Auth::guard('admin')->user();
        if (Auth::guard('admin')->check()) {
            if ($userLogin->activated === 1) {
                if ($userLogin->role->activated === 1) {
                    return $next($request);
                }
                return redirect()->route('login.index')->withErrors(['login' => 'Quyền hạn của bạn chưa được kích hoạt! Vui lòng l/hệ với Admin!']);
            }
            return redirect()->route('login.index')->withErrors(['login' => 'Tài khoản của bạn chưa được kích hoạt! Vui lòng l/hệ với Admin!']);
        }
        return redirect()->route('login.index')->withErrors(['login' => 'Vui lòng đăng nhập tài khoản!']);
    }
}
