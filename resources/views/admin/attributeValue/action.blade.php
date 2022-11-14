@extends('admin.layout.main')
@section('content')
<div class="content-wrapper" style="min-height: 1345.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('attributeValue.index') }}" class="btn btn-lm btn-success">
                        <i class="fas fa-list-alt mr-2"></i>
                        List data</a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Attribute Value</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form id="dataForm" action="{{ route('attributeValue.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                {!! (!empty($attributeValueModel)) ? method_field('PUT') : method_field('POST') !!}
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">AttributeValue Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="attribute_id">Attribute</label>
                                    <select name="attribute_id" id="attribute_id" class="form-control">
                                        <option value="">Chọn attribute</option>
                                        @foreach ($attributes as $attribute)
                                        <option {{ (!empty($attributeValueModel->attribute_id)) ?
                                            (($attributeValueModel->attribute_id
                                            ===
                                            $attribute->id)
                                            ?
                                            'selected' : '') : '' }} value="{{ $attribute->id }}">{{ $attribute->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="value">Value</label>
                                    <input value="{{ $attributeValueModel->value ?? '' }}" name="value" type="text"
                                        class="form-control" id="value" placeholder="Enter value">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input {{ ((!empty($attributeValueModel) && $attributeValueModel->activated ===
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
        let url = "{{ (!empty($attributeValueModel)) ? route('attributeValue.update', $attributeValueModel->id) : route('attributeValue.store') }}";
        let type = "{{ (!empty($attributeValueModel)) ? 'update' : 'create' }}";
        let resultAjax = sendAjax(url, data, type);
        let arrInput = [
            'attribute_id',
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