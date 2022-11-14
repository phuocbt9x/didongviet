@extends('customer.layout.main')
@section('content')
<!--Checkout page section-->
<div class="Checkout_section" id="accordion">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="user-actions">
                    @auth
                    <h3>
                        Xin chào!
                        <u>{{ auth()->user()->name }}</u>
                    </h3>
                    @else
                    <h3>
                        <i class="fa fa-file-o" aria-hidden="true"></i>
                        Returning customer?
                        <a class="Returning" href="{{ route('member.login.index') }}">Click here to login</a>
                    </h3>
                    @endauth
                </div>
            </div>
        </div>
        <div class="checkout_form">
            <form action="{{ route('order.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h3>Billing Details</h3>
                        <div class="row">
                            <div class="col-lg-12 mb-20">
                                <label>Full Name <span>*</span></label>
                                <input type="text" name="member" value="{{ $user->name ?? '' }}">
                            </div>
                            <div class="col-lg-6 mb-20">
                                <label>Phone<span>*</span></label>
                                <input type="text" value="{{ $user->phone ?? '' }}" name="phone">

                            </div>
                            <div class="col-lg-6 mb-20">
                                <label> Email Address <span>*</span></label>
                                <input type="text" value="{{ $user->email ?? '' }}" name="email">
                            </div>
                            <div class="col-12 mb-20">
                                <label for="city_id">Country <span>*</span></label>
                                <select class="form-control" name="city_id" id="city_id">
                                    <option value="2">Chọn Tỉnh/Thành</option>
                                </select>
                            </div>

                            <div class="col-12 mb-20">
                                <label for="district_id">District <span>*</span></label>
                                <select class="form-control" id="district_id" name="district_id">
                                    <option value="">Chọn Quận/Huyện</option>
                                </select>
                            </div>
                            <div class="col-12 mb-20">
                                <label for="ward_id">Ward <span>*</span></label>
                                <select class="form-control" name="ward_id" id="ward_id">
                                    <option value="">Chọn Xã/Phường</option>
                                </select>
                            </div>
                            <div class="col-12 mb-20">
                                <div class="order-notes">
                                    <label for="address">Address</label>
                                    <textarea id="address" name="address">{!! $user->address ?? '' !!}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="order-notes">
                                    <label for="order_note">Order Notes</label>
                                    <textarea id="order_note" name="note"
                                        placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <h3>Your order</h3>
                        <div class="order_table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                @if (!empty($cart))
                                <tbody>
                                    @foreach ($cart->itemCart as $item)
                                    <tr>
                                        <td>
                                            {{ $item['productInfo']['name'] }}
                                            <strong> × {{ $item['quantity']}}</strong>
                                        </td>
                                        <td>
                                            {{ number_format($item['price'], 0, '', '.') }} ₫
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>
                                            Cart Subtotal
                                        </th>
                                        <td>
                                            {{ number_format($cart->totalPriceCart, 0, '', '.') }} ₫
                                        </td>
                                    </tr>
                                    @if (!empty($cart->coupon))
                                    <tr>
                                        <th>Discount</th>
                                        <td>
                                            <strong>
                                                @switch($cart['coupon']['type'])
                                                @case(0)
                                                -{{ number_format($cart['coupon']['value']) }}%
                                                @break
                                                @case(1)
                                                -{{ number_format($cart['coupon']['value'], 0, '', '.') }} ₫
                                                @break
                                                @endswitch
                                            </strong>
                                        </td>
                                    </tr>
                                    @endif

                                    <tr class="order_total">
                                        <th>Order Total</th>
                                        <td>
                                            <strong>
                                                {{ number_format($cart->finalTotalPriceCart, 0, '', '.') }} ₫
                                            </strong>
                                        </td>
                                    </tr>
                                </tfoot>
                                @endif
                            </table>
                        </div>
                        <div class="payment_method d-flex justify-content-between">
                            <div class="panel-default">
                                <input id="payment_defult" type="radio" value="shipcode" checked name="typePay"
                                    data-target="createp_account" />
                                <label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult"
                                    aria-controls="collapsedefult">
                                    <img src="{{ asset('assets/customer') }}/img/shipcod.png" alt="" style="
                                        width: 80px !important;
                                        height: 45px;
                                    ">
                                </label>
                            </div>
                            <div class="panel-default">
                                <input id="momopay_defult" type="radio" value="momopay" name="typePay"
                                    data-target="createp_account" />
                                <label for="momopay_defult" data-toggle="collapse" data-target="#collapsedefult"
                                    aria-controls="collapsedefult">
                                    <img src="{{ asset('assets/customer') }}/img/momopay.png" alt=""
                                        style="width: 45px !important">
                                </label>
                            </div>
                            <div class="panel-default">
                                <input id="vnpay_defult" type="radio" value="vnpay" name="typePay"
                                    data-target="createp_account" />
                                <label for="vnpay_defult" data-toggle="collapse" data-target="#collapsedefult"
                                    aria-controls="collapsedefult">
                                    <img src="{{ asset('assets/customer') }}/img/vnpay.png" alt=""
                                        style="width: 45px !important">
                                </label>
                            </div>
                            <div class="panel-default">
                                <input id="zalopay_defult" type="radio" value="zalopay" name="typePay"
                                    data-target="createp_account" />
                                <label for="zalopay_defult" data-toggle="collapse" data-target="#collapsedefult"
                                    aria-controls="collapsedefult">
                                    <img src="{{ asset('assets/customer') }}/img/zalopay.png" alt=""
                                        style="width: 45px !important">
                                </label>
                            </div>
                            <div class="panel-default">
                                <input id="viettel_defult" type="radio" value="viettel" name="typePay"
                                    data-target="createp_account" />
                                <label for="viettel_defult" data-toggle="collapse" data-target="#collapsedefult"
                                    aria-controls="collapsedefult">
                                    <img src="{{ asset('assets/customer') }}/img/viettelmoney.png" alt=""
                                        style="width: 100px !important">
                                </label>
                            </div>
                        </div>
                        <div class="order_button mt-5">
                            <button type="submit">Proceed to PayPal</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Checkout page section end-->
@endsection
@push('script')
<script>
    getAddress({{ auth()->user()->city_id ?? -1 }}, {{ auth()->user()->district_id ?? -1 }}, {{auth()->user()->ward_id ?? -1 }});
</script>
@error('errorMessage')
<script>
    toastMessageDanger('{{ $message }}');
</script>
@enderror
@endpush