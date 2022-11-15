<!-- Main Wrapper Start -->
<!--header area start-->
<header class="header_area header_three">
    <!--header top start-->
    <div class="header_top">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-12">
                    <div class="welcome_text">
                        <ul>
                            <li>
                                <a href="mailto: phuocbt9x@gmail.com">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <span style="margin-left: 5px">phuocbt9x@gmail.com</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://github.com/phuocbt9x">
                                    <i class="fa fa-github" aria-hidden="true"></i>
                                    <span style="margin-left: 5px">phuocbt9x</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/phuocbt698">
                                    <i class="fa fa-facebook-official" aria-hidden="true"></i>
                                    <span style="margin-left: 5px">Bùi Thế Phước</span>
                                </a>
                            </li>
                            <li>
                                <a href="tel: 0975 041 697">
                                    <i class="fa fa-phone-square" aria-hidden="true"></i>
                                    <span style="margin-left: 5px">(0975) 041 697</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="top_right text-right">
                        <ul>
                            @auth
                            <li class="top_links">
                                <a href="#">
                                    <img src="{{ Auth::user()->getAvatar() }}" alt=""
                                        style="width: 20%; border-radius: 50%;" loading="eager">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown_links">
                                    <li>
                                        <a href="{{ route('member.profile') }}">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            Tài khoản của tôi
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('member.logout') }}">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                                            Đăng xuất
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @else
                            <li>
                                <a href="{{ route('member.login.index') }}">
                                    <i style="font-size: x-large; margin-right:5px" class="fa fa-user-circle-o"
                                        aria-hidden="true"></i>
                                    Đăng nhập
                                </a>
                            </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header top start-->

    <!--header middel start-->
    <div class="header_middel">
        <div class="container-fluid">
            <div class="middel_inner">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="search_bar">
                            <form method="GET" action="{{ Request::fullUrl() }}">
                                <input value="{{ request()->key ?? '' }}" placeholder="Tìm kiếm..." type="text"
                                    name="key">
                                @if (!empty(request()->category))
                                <input type="hidden" name="category" value="{{ request()->category }}">
                                @endif
                                <button type="submit"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="logo">
                            <a href="{{ route('shop.home') }}"><img
                                    src="{{ asset('assets/customer') }}/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart_area" id="cart_mini">
                            <div class="cart_link">
                                <a href="#" id="cart_link_a">
                                    <i class="fa fa-shopping-basket"></i>
                                    {{ $cart->totalItemCart ?? 0 }} sản phẩm
                                </a>
                                <!--mini cart-->
                                <div class="mini_cart">
                                    @empty($cart)
                                    <div class="cart_item cart_null bottom">
                                        <div class="cart_img">
                                            <a href="#"><img src="{{ asset('uploads/image/cart-null.png') }}"
                                                    alt=""></a>
                                        </div>
                                        <div class="cart_info">
                                            <span>Giỏ hàng của bạn còn trống!</span>
                                        </div>
                                    </div>
                                    @else
                                    @foreach ($cart->itemCart as $key=>$item)
                                    <div class="cart_item bottom">
                                        <div class="cart_img">
                                            <a href="{{ route('shop.detail', $item['productInfo']['slug']) }}">
                                                <img src="{{ asset($item['productInfo']['image']) }}" alt="">
                                            </a>
                                        </div>
                                        <div class="cart_info">
                                            <a href="{{ route('shop.detail', $item['productInfo']['slug']) }}">
                                                {{ $item['productInfo']['name'] ?? ''}}
                                            </a>
                                            <span>
                                                {{ number_format($item['quantity']) }}
                                                x
                                                {{ number_format($item['productInfo']['price'], 0, '', '.') }} ₫
                                            </span>
                                        </div>
                                        <div class="cart_remove">
                                            <a href="#" onclick="deleteItem({{ $key }})">
                                                <i class="ion-android-close"></i>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endempty
                                    <div class="cart__table">
                                        <table>
                                            <tbody>
                                                @if (!empty($cart->coupon))
                                                <tr>
                                                    <td class="text-left">
                                                        Giảm giá:
                                                    </td>
                                                    <td class="text-right">
                                                        @if ($cart->coupon['type'] == 1)
                                                        - {{ number_format($cart->coupon['value'], 0, '', '.') }} ₫
                                                        @else
                                                        - {{ number_format($cart->coupon['value']) }} %
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endif
                                                <tr>
                                                    <td class="text-left">
                                                        Tổng đơn:
                                                    </td>
                                                    <td class="text-right">
                                                        {{ number_format($cart->finalTotalPriceCart ?? 0, 0, '', '.') }}
                                                        ₫
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="cart_button view_cart">
                                        <a href="{{ route('shop.cart') }}">Giỏ hàng</a>
                                    </div>
                                    <div class="cart_button checkout">
                                        <a href="{{ route('order.index') }}">Thanh toán</a>
                                    </div>
                                </div>
                                <!--mini cart end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header middel end-->

    <!--header bottom satrt-->
    <div class="header_bottom sticky-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="main_menu_inner">
                        <div class="main_menu">
                            <nav>
                                <ul>
                                    <li class="{{ ($title=='Home' ) ? 'active' : '' }}">
                                        <a href="{{ route('shop.home') }}">
                                            <i style="font-size: x-large" class="fa fa-home mr-1"
                                                aria-hidden="true"></i>
                                            Trang chủ
                                        </a>
                                    </li>
                                    <li class="{{ ($title=='Shop' ) ? 'active' : '' }}">
                                        <a href="{{ route('shop.shop') }}">
                                            <i style="font-size: x-large" class="fa fa-pinterest-p mr-1"
                                                aria-hidden="true"></i>
                                            Sản phẩm
                                        </a>
                                    </li>
                                    <li class="{{ ($title=='Cart' ) ? 'active' : '' }}">
                                        <a href="{{ route('shop.cart') }}">
                                            <i style="font-size: x-large" class="fa fa-shopping-cart mr-1"
                                                aria-hidden="true"></i>
                                            Giỏ hàng
                                        </a>
                                    </li>
                                    <li class="{{ ($title=='Contact' ) ? 'active' : '' }}">
                                        <a href="{{ route('contact.create') }}">
                                            <i style="font-size: x-large" class="fa fa-reply mr-1"
                                                aria-hidden="true"></i>
                                            Liên hệ
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header bottom end-->
</header>
<!--header area end-->