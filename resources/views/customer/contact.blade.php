@extends('customer.layout.main')
@section('content')
<!--contact area start-->
<div class="contact_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="contact_message content">
                    <h3>Liên hệ</h3>
                    <ul>
                        <li><i class="fa fa-fax"></i> Hưng Hà, Thái Bình</li>
                        <li><i class="fa fa-envelope-o"></i> <a
                                href="mailto:phuocbt9x@gmail.com">phuocbt9x@gmail.com</a>
                        </li>
                        <li><i class="fa fa-phone"></i> 0975 041 697</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="contact_message form">
                    <h3>Gửi thông tin phản hồi</h3>
                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <p>
                            <label> Họ và tên</label>
                            <input name="name" placeholder="Name *" type="text">
                            @error('name')
                        <div class="alert alert-danger" style="padding: 0px 20px; margin: 10px 0 0 0;">
                            {{ $message }}
                        </div>
                        @enderror
                        </p>
                        <p>
                            <label> Địa chỉ email</label>
                            <input name="email" placeholder="Email *" type="email">
                            @error('email')
                        <div class="alert alert-danger" style="padding: 0px 20px; margin: 10px 0 0 0;">
                            {{ $message }}
                        </div>
                        @enderror
                        </p>
                        <p>
                            <label> Tiêu đề</label>
                            <input name="title" placeholder="Title *" type="text">
                            @error('title')
                        <div class="alert alert-danger" style="padding: 0px 20px; margin: 10px 0 0 0;">
                            {{ $message }}
                        </div>
                        @enderror
                        </p>
                        <div class="contact_textarea">
                            <label> Thông tin</label>
                            <textarea placeholder="Message *" name="content" class="form-control2"></textarea>
                            @error('content')
                            <div class="alert alert-danger" style="padding: 0px 20px; margin: 10px 0 10px 0;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit"> Send</button>
                        <p class="form-messege"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--contact area end-->

@endsection