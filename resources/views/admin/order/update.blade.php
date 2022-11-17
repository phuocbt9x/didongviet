@extends('admin.layout.main')
@section('content')
<div class="content-wrapper" style="min-height: 1604.44px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order detail</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Order</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <h3 class="profile-username text-center">
                                {{ $orderModel->member }}
                            </h3>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Email</b>
                                    <a class="float-right">
                                        {{ $orderModel->email }}
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Phone</b>
                                    <a class="float-right">
                                        {{
                                        substr($orderModel->phone, 0, 4) . '.'
                                        . substr($orderModel->phone,4, 3) . '.'
                                        . substr($orderModel->phone, 7)
                                        }}
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Total price</b>
                                    <a class="float-right">
                                        {{ number_format($orderModel->total_price) }} đ
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Address</b>
                                    <a class="float-right address" id="address">
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Status</b>
                                    <a class="float-right">
                                        <form action="{{ route('order.update', $orderModel->id) }}" method="POST" style="display: flex;
                                        flex-direction: column;
                                        align-items: flex-end;">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" id="status">
                                                <option {{ $orderModel->status == 0 ? 'selected' : '' }} value="0">
                                                    Chờ xác nhận đơn hàng
                                                </option>
                                                <option {{ $orderModel->status == 1 ? 'selected' : '' }} value="1">
                                                    Đơn hàng đang được chuẩn bị
                                                </option>
                                                <option {{ $orderModel->status == 2 ? 'selected' : '' }} value="2">
                                                    Đơn hàng đã được giao đi
                                                </option>
                                                <option {{ $orderModel->status == 3 ? 'selected' : '' }} value="3">
                                                    Giao hàng thành công
                                                </option>
                                                <option {{ $orderModel->status == 4 ? 'selected' : '' }} value="4">
                                                    Đơn hàng bị hủy
                                                </option>
                                            </select>
                                            <button style="submit" class="btn btn-sm btn-success mt-2">
                                                save
                                            </button>
                                        </form>
                                    </a>
                                </li>
                            </ul>

                            <a href="{{ route('order.order') }}" class="btn btn-primary btn-block">
                                <b>Back</b>
                            </a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#activity" data-toggle="tab">
                                        Order item
                                    </a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    @foreach ( $orderModel->orderDetail as $orderDetail)
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm"
                                                src="{{ asset($orderDetail->infoProduct->image) }}" alt="user image">
                                            <span class="username">
                                                <a href="{{ route('product.show', $orderDetail->infoProduct->slug) }}">
                                                    {{ $orderDetail->infoProduct->name }}
                                                </a>
                                            </span>
                                            <span class="description">
                                                {{ $orderDetail->quantity }} x
                                                {{ number_format($orderDetail->price) }} đ
                                            </span>
                                        </div>
                                        <div style="width: 100%;
                                        display: flex;
                                        flex-direction: row;
                                        align-items: center;
                                        justify-content: space-between;">
                                            <strong>Total price</strong>
                                            <span>
                                                {{ number_format($orderDetail->total_price) }} đ
                                            </span>
                                        </div>
                                    </div>
                                    <!-- /.post -->
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
@push('script')
<script>
    getFullAddress('address', '{{$orderModel->address}}', {{$orderModel->ward_id}}, {{$orderModel->district_id}}, {{$orderModel->city_id}})
</script>
@endpush