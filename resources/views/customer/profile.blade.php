@extends('customer.layout.main')
@section('content')
    <section class="main_content_area">
        <div class="container">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <!-- Nav tabs -->
                        <div class="dashboard_tab_button">
                            <ul role="tablist" class="nav flex-column dashboard-list">
                                <li><a href="#account-details" data-toggle="tab" class="nav-link active">Account details</a>
                                </li>
                                <li> <a href="#orders" data-toggle="tab" class="nav-link">Orders</a></li>
                                <li><a href="{{ route('member.logout') }}" class="nav-link">logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard_content">
                            <div class="tab-pane fade active" id="account-details">
                                <h3>Account details </h3>
                                <div class="login">
                                    <div class="login_form_container">
                                        <div class="account_login_form">
                                            <form id="infoMember" action="{{ route('member.update', Auth::user()->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="image"
                                                    style="display: flex; flex-direction: column; justify-content: space-around; align-items: center;">
                                                    <img src="{{ Auth::user()->getAvatar() }}" alt=""
                                                        style="width: 20%; border-radius: 50%;" loading="eager"
                                                        id="avatar_member">
                                                    <input id="avatar" type="file" name="avatar"
                                                        style="display: none">

                                                    <label class="btn"
                                                        style="border: solid 1px; border-radius: 24px; margin-top: 15px;"
                                                        for="avatar">Choose</label>
                                                    @error('avatar')
                                                        <div class="alert alert-danger"
                                                            style="padding: 0px 20px; margin-top: 10px;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror

                                                </div>
                                                <label>Name</label>
                                                <input type="text" name="name" value="{{ $infoMember->name ?? '' }}">
                                                @error('name')
                                                    <div class="alert alert-danger" style="padding: 0px 20px;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                                <label>Email</label>
                                                <input type="text" name="email" value="{{ $infoMember->email ?? '' }}">
                                                @error('email')
                                                    <div class="alert alert-danger" style="padding: 0px 20px;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                                <label>Phone</label>
                                                <input type="text" name="phone" value="{{ $infoMember->phone ?? '' }}">
                                                @error('phone')
                                                    <div class="alert alert-danger" style="padding: 0px 20px;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                                <label>Password</label>
                                                <input type="password" name="password" name="password">

                                                <label>Birthdate</label>
                                                <input type="date"
                                                    value="{{ !empty($infoMember->birth) ? date('Y-m-d', strtotime($infoMember->birth)) : '' }}"
                                                    name="birth">

                                                <label>Address</label>
                                                <input type="text" name="address"
                                                    value="{{ $infoMember->address ?? '' }}">

                                                <div
                                                    style="display: flex;
                                            flex-direction: row;
                                            justify-content: space-between;">
                                                    <div class="city"
                                                        style="display: flex;
                                                flex-direction: column;
                                                width: 45%;">
                                                        <label>City</label>
                                                        <select name="city_id" id="city_id"
                                                            style="height: 40px; padding: 0 20px;">
                                                            <option value=""> Chọn tỉnh/thành </option>
                                                        </select>
                                                        @error('city_id')
                                                            <div class="alert alert-danger"
                                                                style="padding: 0px 20px; margin: 10px 0 0 0;">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="district"
                                                        style="display: flex;
                                                flex-direction: column;
                                                width: 45%;">
                                                        <label>District</label>
                                                        <select name="district_id" id="district_id"
                                                            style="height: 40px;padding: 0 20px;">
                                                            <option value=""> Chọn quận/huyện </option>
                                                        </select>
                                                        @error('district_id')
                                                            <div class="alert alert-danger"
                                                                style="padding: 0px 20px; margin: 10px 0 0 0;">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <br>
                                                <div
                                                    style="display: flex;
                                            flex-direction: column;">
                                                    <label>Ward</label>
                                                    <select name="ward_id" id="ward_id"
                                                        style="height: 40px;padding: 0 20px;">
                                                        <option value=""> Chọn phường/xã </option>
                                                    </select>
                                                    @error('ward_id')
                                                        <div class="alert alert-danger"
                                                            style="padding: 0px 20px; margin: 10px 0 0 0;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <br>
                                                <div class="save_button primary_btn default_button">
                                                    <a href="javascript:$('#infoMember').submit();"
                                                        style="border: solid 1px; border-radius: 24px; margin-top: 15px;"
                                                        class="btn">Save</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="orders">
                                <h3>Orders</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Pay status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($order->isNotEmpty())
                                                @foreach ($order as $key => $item)
                                                    <tr>
                                                        <td>
                                                            {{ $key + 1 }}
                                                        </td>
                                                        <td>
                                                            {{ date('d/m/Y', strtotime($item->created_at)) }}
                                                        </td>
                                                        <td>
                                                            <span class="success">
                                                                {{ $item->statusOrder() }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            {{ number_format($item->total_price, 0, '', '.') }} ₫
                                                        </td>
                                                        <td>
                                                            {{ $item->statusPayment() }} ({{ $item->payment }})
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('member.order', $item->id) }}"
                                                                class="view">view</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="6">Bạn chưa có đơn hàng nào!</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        getAddress({{ $infoMember->city_id ?? -1 }}, {{ $infoMember->district_id ?? -1 }},
            {{ $infoMember->ward_id ?? -1 }});

        $('#avatar').change(function(event) {
            let image = document.getElementById('avatar_member');
            const file = this.files[0];
            const fileType = file['type'];
            const validImageTypes = ['image/gif', 'image/jpeg', 'image/png'];
            if ($.inArray(fileType, validImageTypes) >= 0) {
                const src = URL.createObjectURL(event.target.files[0]);
                console.log(file['type']);
                image.src = src;
            }
        })
    </script>
    @error('successUpdateMember')
        <script>
            toastMessage('{{ $message }}');
        </script>
    @enderror
@endpush
