@extends('customer.layout.main')
@section('content')
<!--Checkout page section-->
<div class="Checkout_section" id="accordion">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="user-actions">
                    <h3>Thông tin đơn hàng mã số: {{ $order->id }}</h3>
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
                                <input type="text" name="member" value="{{ $order->member ?? '' }}" disabled>
                            </div>
                            <div class="col-lg-6 mb-20">
                                <label>Phone<span>*</span></label>
                                <input type="text" value="{{ $order->phone ?? '' }}" name="phone" disabled>

                            </div>
                            <div class="col-lg-6 mb-20">
                                <label> Email Address <span>*</span></label>
                                <input type="text" value="{{ $order->email ?? '' }}" name="email" disabled>
                            </div>
                            <div class="col-12 mb-20">
                                <label for="city_id">Country <span>*</span></label>
                                <select class="form-control" name="city_id" id="city_id" disabled>
                                    <option value="2">Chọn Tỉnh/Thành</option>
                                </select>
                            </div>

                            <div class="col-12 mb-20">
                                <label for="district_id">District <span>*</span></label>
                                <select class="form-control" id="district_id" name="district_id" disabled>
                                    <option value="">Chọn Quận/Huyện</option>
                                </select>
                            </div>
                            <div class="col-12 mb-20">
                                <label for="ward_id">Ward <span>*</span></label>
                                <select class="form-control" name="ward_id" id="ward_id" disabled>
                                    <option value="">Chọn Xã/Phường</option>
                                </select>
                            </div>
                            <div class="col-12 mb-20">
                                <div class="order-notes">
                                    <label for="address">Address</label>
                                    <textarea id="address" name="address"
                                        disabled>{!! $order->address ?? '' !!}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="order-notes">
                                    <label for="order_note">Order Notes</label>
                                    <textarea id="order_note" name="note" disabled
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
                                @if (!empty($orderDetail))
                                <tbody>
                                    @foreach ($orderDetail as $item)
                                    <tr>
                                        <td>
                                            {{ $item->infoProduct->name }}
                                            <br>
                                            <span>(
                                                @foreach ($item->attributeProduct as $key=>$attribute)
                                                @if ($key == 1)
                                                -
                                                @endif
                                                {{ $attribute->infoAttributeValue->value }}
                                                @endforeach
                                                )
                                            </span>
                                            <br>
                                            <strong> {{ $item->quantity }} × {{ number_format($item->price, 0, '', '.')
                                                }} ₫ </strong>
                                        </td>
                                        <td>
                                            {{ number_format($item->total_price, 0, '', '.') }} ₫
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="order_total">
                                        <th>Order Total</th>
                                        <td>
                                            <strong>
                                                {{ number_format($item->total_price, 0, '', '.') }} ₫
                                            </strong>
                                        </td>
                                    </tr>
                                </tfoot>
                                @endif
                            </table>
                        </div>
                        <div class="order_button mt-5">
                            <a href="{{ url()->previous() }}" class="btn" style="border: solid 1px;
                            background: orange;
                            border-radius: 10px;">Back</a>
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
    getAddress({{ $order->city_id ?? -1 }}, {{ $order->district_id ?? -1 }}, {{ $order->ward_id ?? -1 }});
</script>
@error('errorMessage')
<script>
    toastMessageDanger('{{ $message }}');
</script>
@enderror
@endpush