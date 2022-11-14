@extends('customer.layout.main')
@section('content')
<!-- shopping cart area start -->
<div class="shopping_cart_area">
    <div class="container">
        <form action="#">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_quantity">Quantity</th>
                                        <th class="product_total">Total</th>
                                        <th class="product_remove">Delete</th>
                                    </tr>
                                </thead>
                                <tbody id="body_cart">
                                    @if (($cart->totalItemCart ?? 0) == 0)
                                    <tr>
                                        <td class="product_thumb" colspan="6">
                                            <a href="#">
                                                <img src="{{ asset('uploads/image/cart-null.png') }}" alt=""
                                                    style="width: 15%;">
                                            </a>
                                            <span>Giỏ hàng của bạn còn trống!</span>
                                        </td>
                                    </tr>
                                    @else
                                    @foreach ($cart->itemCart as $key=>$item)
                                    <tr>
                                        <td class="product_thumb">
                                            <a href="{{ route('shop.detail', $item['productInfo']['slug']) }}">
                                                <img src="{{ asset($item['productInfo']['image']) }}" alt="">
                                            </a>
                                        </td>
                                        <td class="product_name">
                                            <a href="{{ route('shop.detail', $item['productInfo']['slug']) }}">
                                                {{ $item['productInfo']['name'] ?? ''}}
                                            </a>
                                            <p>
                                                (
                                                @foreach ($item['productInfo']['attribute'] as $keyAtt => $attribute)
                                                {{
                                                ($keyAtt == array_key_first($item['productInfo']['attribute']))
                                                ? $attribute : ( ' - ' . $attribute )
                                                }}
                                                @endforeach
                                                )
                                            </p>
                                        </td>
                                        <td class="product-price">
                                            {{ number_format($item['productInfo']['price'], 0, '', '.') }} ₫
                                        </td>
                                        <td class="product_quantity">
                                            <input data-id="{{ $key }}" min="1" max="100"
                                                value="{{ number_format($item['quantity']) }}" type="number">
                                        </td>
                                        <td class="product_total">
                                            {{ number_format($item['price'], 0, '', '.') }} ₫
                                        </td>
                                        <td class="product_remove">
                                            <a href="#" onclick="deleteItem({{ $key }})">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="cart_submit">
                            <button type="button" onclick="updateItem()">update cart</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--coupon code area start-->
            <div class="coupon_area">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code left">
                            <h3>Coupon</h3>
                            <div class="coupon_inner" id="coupon_cart">
                                <p>Enter your coupon code if you have one.</p>
                                <input placeholder="Coupon code" type="text" value="{{ $cart->coupon['code'] ?? '' }}"
                                    id="counpon" style="text-transform:uppercase">
                                <button type="submit" onclick="applyCoupon()">Apply coupon</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code right">
                            <h3>Cart Totals</h3>
                            <div class="coupon_inner" id="action_cart">
                                <div class="cart_subtotal">
                                    <p>Subtotal</p>
                                    <p class="cart_amount">
                                        {{ number_format($cart->totalPriceCart ?? 0, 0, '', '.') }} ₫
                                    </p>
                                </div>
                                @if (!empty($cart->coupon))
                                <div class="cart_subtotal ">
                                    <p>Discount</p>
                                    <p class="cart_amount">
                                        @switch($cart->coupon['type'])
                                        @case(0)
                                        -{{ number_format($cart->coupon['value']) }}%
                                        @break
                                        @case(1)
                                        -{{ number_format($cart->coupon['value'], 0, '', '.') }} ₫
                                        @break
                                        @endswitch
                                    </p>
                                </div>
                                @endif
                                <hr>
                                <div class="cart_subtotal">
                                    <p>Total</p>
                                    <p class="cart_amount">
                                        {{ number_format($cart->finalTotalPriceCart ?? 0, 0, '', '.') }} ₫
                                    </p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="{{ route('order.index') }}">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--coupon code area end-->

        </form>
    </div>
</div>
<!-- shopping cart area end -->
@endsection