@extends('admin.layout.main')
@section('content')
<div class="content-wrapper" style="min-height: 1604.44px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ Str::upper($productModel->name) ?? ''}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid" style="width: 250px; height:350px"
                                    src="{{ asset($productModel->image) ?? '' }}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">

                            </h3>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Danh mục</b>
                                    <a class="float-right">
                                        <span class='badge badge-pill badge-dark'>{{ $productModel->category->name
                                            }}</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Slug</b>
                                    <a class="float-right">
                                        <span>{{ $productModel->slug }}</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Stock</b>
                                    <a class="float-right">
                                        <span>{{ number_format( $productModel->stock) }}</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Price</b>
                                    <a class="float-right">
                                        <span>{{ number_format( $productModel->price) }}</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Sale</b>
                                    <a class="float-right">
                                        <span>{{ $productModel->discount->getDiscount->name ?? "Not Sale"}}</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Price Sale</b>
                                    <a class="float-right">
                                        <span>{{ number_format($productModel->priceSale()) }}</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Status</b>
                                    <a class="float-right">
                                        @if ($productModel->activated == 1)
                                        <span class='badge badge-pill badge-success'>Actived</span>
                                        @else
                                        <span class='badge badge-pill badge-danger'>Not Actived</span>
                                        @endif
                                    </a>
                                </li>
                            </ul>

                            <a href="{{ url()->previous() }}" class="btn btn-primary btn-block"><b>Back</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About product</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong> Attribute</strong>
                            <div class="row border border-primary pl-2" id="attribute">
                                <div class="col-sm-6">
                                    <!-- checkbox -->
                                    <div class="form-group ">
                                        @foreach ($attributes as $attribute)
                                        <input type="hidden" name="attribute[]" value="{{ $attribute->id }}">
                                        <label><i class="fas fa-caret-right mr-2"></i> {{ $attribute->name
                                            }}</label>
                                        <div class="row custom-control custom-radio d-flex justify-content-between">
                                            @foreach ($productModel->attributeProducts as $item)
                                            @if ($item->attribute_id === $attribute->id)
                                            <label for="">
                                                <i class="fas fa-check-circle mr-1"></i>
                                                {{ $item->value }}</label>
                                            @endif
                                            @endforeach
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <strong> Description(s)</strong>
                            <div id="description">
                                {!! $productModel->description !!}
                            </div>

                        </div>
                        <!-- /.card-body -->
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
    getFullAddress('address', '{{$productModel->address}}', {{$productModel->ward_id}}, {{$productModel->district_id}}, {{$productModel->city_id}})
</script>
@endpush