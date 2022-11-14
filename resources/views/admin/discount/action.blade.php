@extends('admin.layout.main')
@section('content')
<div class="content-wrapper" style="min-height: 1345.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('discount.index') }}" class="btn btn-lm btn-success">
                        <i class="fas fa-list-alt mr-2"></i>
                        List data</a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Discount</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form id="dataForm" action="{{ route('discount.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {!! (!empty($discountModel)) ? method_field('PUT') : method_field('POST') !!}
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Discount Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="">Chọn type</option>
                                        <option {{ ((!empty($discountModel) && $discountModel->type ===
                                            0 ) ) ?
                                            'selected' :
                                            '' }} value="0">Giảm phần trăm</option>
                                        <option {{ ((!empty($discountModel) && $discountModel->type ===
                                            1 ) ) ?
                                            'selected' :
                                            '' }} value="1">Giảm tiền mặt</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input value="{{ $discountModel->name ?? '' }}" name="name" type="text"
                                        class="form-control" id="name" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="value">Value</label>
                                    <input value="{{ $discountModel->value ?? '' }}" name="value" type="text"
                                        class="form-control" id="value" placeholder="Enter value">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input {{ ((!empty($discountModel) && $discountModel->activated ===
                                        1 ) ) ?
                                        'checked' :
                                        '' }}
                                        class="custom-control-input" type="checkbox" id="activated" name="activated"
                                        value="1">
                                        <label for="activated" class="custom-control-label">Active</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn col-4 btn-primary float-right">Submit</button>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </form>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
@push('script')
<script>
    $('#dataForm').submit(function(event){
        event.preventDefault();
        let data = new FormData(this);
        let url = "{{ (!empty($discountModel)) ? route('discount.update', $discountModel->id) : route('discount.store') }}";
        let type = "{{ (!empty($discountModel)) ? 'update' : 'create' }}";
        let resultAjax = sendAjax(url, data, type);
        let arrInput = [
            'type',
            'name',
            'value'
        ];
        if(resultAjax.statusCode == 200){
            removeError(arrInput);
           if(type == 'update'){
            window.location.href = resultAjax.href;
           }
        }else{
            renderError(resultAjax, arrInput);
        }
    });
</script>
@endpush