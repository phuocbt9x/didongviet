<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return view('admin.login');
    }

    public function login(LoginRequest $request)
    {
        $checkLogin = Auth::guard('admin')->attempt($request->validated());
        if ($checkLogin) {
            return redirect()->route('dashboard.index');
        } else {
            return redirect()->back()->withErrors(['login' => 'Tài khoản hoặc mật khẩu không chính xác!']);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login.index');
    }
}
