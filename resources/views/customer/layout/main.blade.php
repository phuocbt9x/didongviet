<!doctype html>
<html class="no-js" lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title ?? '' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <link rel="icon" href="{{ asset('assets/customer') }}/img/logo/logo.png" type="image/gif" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/customer') }}/img/favicon.ico">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/customer') }}/css/plugins.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/customer') }}/css/style.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/customer') }}/css/styleMe.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/plugins/toastr/toastr.min.css">
</head>

<body>

    <!--header area start-->
    @include('customer.layout.header')
    @if ($title != 'Home')
    <div class="breadcrumbs_area other_bread">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>/</li>
                            <li>{{ $title ?? '' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!--content area start-->
    @yield('content')

    <!--footer area start-->
    @include('customer.layout.footer')
    @include('customer.layout.cart')
    @stack('script')
</body>

</html>