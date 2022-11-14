@extends('customer.layout.main')
@section('content')
<!-- customer login start -->
<div class="customer_login">
    <div class="container">
        <div style="text-align: center;">
            <h2>Cảm ơn bạn đã đặt đơn hàng! Đơn hàng sẽ sớm được giao tới cho bạn! </h2>
            <p>Một mail xác nhận đơn hàng đã được gửi cho bạn!</p>
            <a href="{{ route('shop.home') }}" class="btn btn-success">Tiếp tục mua sắm!!!</a>
        </div>
    </div>
</div>
<!-- customer login end -->
@endsection