<?php

namespace App\Http\Controllers\CustomerController;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest\MemberRequest;
use App\Jobs\SendMail;
use App\Models\CustomerModel\MemberModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index()
    {
        return view('customer.login');
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $memberSocialite = Socialite::driver($provider)->stateless()->user();
        $member = MemberModel::where('email', $memberSocialite->email)->orWhere('phone', $memberSocialite->phone)->first();
        if (!empty($member)) {
            Auth::loginUsingId($member->id);
        } else {
            $dataMember = [
                'type' => 1,
                'name' => $memberSocialite->name,
                'email' => $memberSocialite->email ?? '',
                'phone' => $memberSocialite->phone ?? '',
                'avatar' => $memberSocialite->avatar,
                'activated' => 1
            ];
            $memberNew = MemberModel::create($dataMember);
            Auth::login($memberNew);
        }

        return redirect()->route('shop.home');
    }

    public function register(MemberRequest $request)
    {
        $member = MemberModel::where('email', $request->email)->first();
        $token = base64_encode($request->email);
        if (!empty($member)) {
            if (!empty($member->activation_token)) {
                return redirect()->back()->withErrors(['email' => 'Email đã tồn tại!']);
            }
            $member->update(['activation_token' => $token]);
            $password = base64_encode($request->password);
            $linkActive = route('member.active', [$token, $password]);
        } else {
            $request->merge(['name' => Str::random(10), 'activation_token' => $token]);
            MemberModel::create($request->all());
            $linkActive = route('member.active', $token);
        }
        $dataSendMail = [
            'email' => $request->email,
            'linkActive' => $linkActive
        ];
        $sendMail = SendMail::dispatch($dataSendMail)->delay(Carbon::now()->addSecond(60));
        if ($sendMail) {
            return redirect()->back()->withErrors(['message' => 'Vui lòng kiểm tra email!']);
        }
    }

    public function active($token, $p = null)
    {
        $member = MemberModel::where('activation_token', $token)->first();
        if (empty($member)) {
            return abort(404);
        }
        if (!empty($p)) {
            $member->update(['password' => $p, 'activated' => 1]);
        } else {
            $member->update(['activated' => 1]);
        }
        Auth::loginUsingId($member->id);
        return redirect()->route('shop.home');
    }

    public function login(MemberRequest $request)
    {
        Auth::attempt($request->only('email', 'password'), true);
        if (Auth::check()) {
            if (Auth::user()->activated === 1) {
                return redirect()->route('shop.home');
            }
            Auth::logout();
            return redirect()->back()->withErrors(['messageLogin' => 'Tài khoản chưa được kích hoạt!']);
        }
        return redirect()->back()->withErrors(['messageLogin' => 'Tài khoản hoặc mật khẩu không chính xác!']);
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('shop.home');
    }
}
