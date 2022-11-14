@extends('admin.layout.main')
@section('content')
<div class="content-wrapper" style="min-height: 1345.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('category.index') }}" class="btn btn-lm btn-success">
                        <i class="fas fa-list-alt mr-2"></i>
                        List data</a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form id="dataForm" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {!! (!empty($categoryModel)) ? method_field('PUT') : method_field('POST') !!}
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Category Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input value="{{ $categoryModel->name ?? '' }}" name="name" type="text"
                                        class="form-control" id="name" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input {{ ((!empty($categoryModel) && $categoryModel->activated === 1 ) ) ?
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
        let url = "{{ (!empty($categoryModel)) ? route('category.update', $categoryModel->slug) : route('category.store') }}";
        let type = "{{ (!empty($categoryModel)) ? 'update' : 'create' }}";
        let resultAjax = sendAjax(url, data, type);
        let arrInput = [
            'name'
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