@extends('customer.layout.main')
@section('content')
<!-- customer login start -->
<div class="customer_login">
    <div class="container">
        <div class="row">
            <!--login area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form">
                    <h2>login</h2>
                    <form action="{{ route('member.login') }}" method="POST">
                        @csrf
                        <h4>Login with social network</h4>
                        <div class="d-flex justify-content-around">
                            <a href="{{ route('member.redirect', 'facebook') }}" style="color: blue;">
                                <i class="fa fa-facebook-official" aria-hidden="true" style="font-size: xx-large;"></i>
                                <span style="font-size: larger;">Facebook</span>
                            </a>
                            <a href="{{ route('member.redirect', 'google') }}" style="color: red;">
                                <i class="fa fa-google" aria-hidden="true" style="font-size: xx-large;"></i>
                                <span style="font-size: larger;">Google</span>
                            </a>
                        </div>
                        <span style="margin: 15px 0;display: block; color: red;">OR</span>
                        <p>
                            <label>Email address <span>*</span></label>
                            <input value="{{ old('emailLogin') }}" name="emailLogin" type="email" @error('emailLogin')
                                style="border: solid 1px red;" @enderror>
                            @error('emailLogin')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </p>
                        <p>
                            <label>Passwords <span>*</span></label>
                            <input name="passwordLogin" type="password" @error('passwordLogin')
                                style="border: solid 1px red;" @enderror>
                            @error('passwordLogin')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </p>
                        @error('messageLogin')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="login_submit">
                            <a href="#">Lost your password?</a>
                            <label for="remember">
                                <input name="remember" id="remember" type="checkbox">
                                Remember me
                            </label>
                            <button type="submit">login</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--login area start-->

            <!--register area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form register">
                    <h2>Register</h2>
                    <form action="{{ route('member.register') }}" method="POST">
                        @csrf
                        <p>
                            <label>Email address <span>*</span></label>
                            <input value="{{ old('email') }}" name="email" type="email" @error('email')
                                style="border: solid 1px red;" @enderror>
                            @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </p>
                        <p>
                            <label>Passwords <span>*</span></label>
                            <input name="password" type="password" @error('password') style="border: solid 1px red;"
                                @enderror>
                            @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </p>
                        <p>
                            <label>Confirm Passwords <span>*</span></label>
                            <input name="password_confirmation" type="password" @error('password_confirmation')
                                style="border: solid 1px red;" @enderror>
                            @error('password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </p>
                        @error('message')
                        <div class="alert alert-success">{{ $message }}</div>
                        @enderror
                        <div class="login_submit">
                            <button type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--register area end-->
        </div>
    </div>
</div>
<!-- customer login end -->
@endsection