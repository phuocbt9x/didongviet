@extends('admin.layout.main')
@section('content')
<div class="content-wrapper" style="min-height: 1345.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('product.index') }}" class="btn btn-lm btn-success">
                        <i class="fas fa-list-alt mr-2"></i>
                        List data</a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form id="dataForm" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {!! (!empty($productModel)) ? method_field('PUT') : method_field('POST') !!}
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Product Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">Chọn category</option>
                                        @foreach ($categories as $category)
                                        <option {{ (!empty($productModel->category_id)) ? (($productModel->category_id
                                            ===
                                            $category->id)
                                            ?
                                            'selected' : '') : '' }} value="{{ $category->id }}">{{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input value="{{ $productModel->name ?? '' }}" name="name" type="text"
                                        class="form-control" id="name" placeholder="Enter name">
                                </div>

                                <div class="form-group">
                                    <label>Attribute</label>
                                    <div class="row border border-primary pl-2" id="attribute">
                                        <div>
                                            <!-- checkbox -->
                                            <div class="form-group">
                                                @foreach ($attributes as $attribute)
                                                <input type="hidden" name="attribute[]" value="{{ $attribute->id }}">
                                                <label><i class="fas fa-caret-right mr-2"></i> {{ $attribute->name
                                                    }}</label>
                                                <div
                                                    class="row custom-control custom-radio d-flex justify-content-between">
                                                    @foreach ($attribute->getValue as $item)
                                                    <div class="col-4">
                                                        <input value="{{ $item->id }}" class="custom-control-input" id="{{
                                                        $item->value }}" type="checkbox" name="{{ $attribute->id }}[]"
                                                            @php if(!empty($productModel)){ foreach
                                                            ($productModel->attributeProduct as $value) {
                                                        if ($value->attribute_value_id === $item->id) {
                                                        echo 'checked';
                                                        }
                                                        }
                                                        }
                                                        @endphp
                                                        >
                                                        <label for="{{
                                                        $item->value }}" class="custom-control-label">{{
                                                            $item->value }}</label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Discount</label>
                                    <div class="row" id="discount">
                                        <div class="col-sm-6">
                                            <!-- checkbox -->
                                            <div class="form-group">
                                                <div class="custom-control custom-radio">
                                                    <input value="" class="custom-control-input" id="notDiscount"
                                                        type="radio" name="discount" {{ ((!empty($productModel) &&
                                                        empty($productModel->discount) ) ) ? 'checked' : '' }}>
                                                    <label for="notDiscount" class="custom-control-label">Not
                                                        discount</label>
                                                </div>
                                            </div>
                                        </div>
                                        @foreach ($discounts as $discount)
                                        <div class="col-sm-6">
                                            <!-- checkbox -->
                                            <div class="form-group">
                                                <div class="custom-control custom-radio">
                                                    <input value="{{ $discount->id
                                                    }}" class="custom-control-input" id="{{ $discount->id
                                                    }}" {{ ((!empty($productModel) && !empty($productModel->discount)
                                                    &&
                                                    $productModel->discount->discount_id === $discount->id ) ) ?
                                                    'checked' :
                                                    '' }}
                                                    type="radio" name="discount">
                                                    <label for="{{ $discount->id
                                                    }}" class="custom-control-label">{{ $discount->name
                                                        }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input value="{{ $productModel->stock ?? '' }}" name="stock" type="text"
                                        class="form-control" id="stock" placeholder="Enter stock">
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input value="{{ $productModel->price ?? '' }}" name="price" type="text"
                                        class="form-control" id="price" placeholder="Enter price">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input {{ ((!empty($productModel) && $productModel->activated === 1 ) ) ?
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
                    <div class="col-md-6">
                        <!-- Form Element sizes -->
                        <div class="card card-success">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="image">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="image" type="file" class="custom-file-input" id="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div id="preview" class="d-flex justify-content-between">
                                    @if (!empty($productModel->image))
                                    <div id="image-old">
                                        <div class="d-flex align-items-start flex-column">
                                            <label>Image(old) </label>
                                            <img style="width: 230px; height: 350px; object-fit: cover; "
                                                src="{{ asset($productModel->image) }}" alt="Lỗi!"
                                                class="img-thumbnail preview-img" />
                                        </div>
                                    </div>
                                    @endif
                                    <div id="preview-image-new"></div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="50">
                                        {!! $productModel->description ?? '' !!}
                                    </textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
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
    CKEDITOR.replace( 'description' );
</script>
<script>
    preview('preview-image-new', 'product', 'image');
    $('#dataForm').submit(function(event){
        event.preventDefault();
        let data = new FormData(this);
        var description = CKEDITOR.instances.description.getData();
        data.append('description', description);
        let url = "{{ (!empty($productModel)) ? route('product.update', $productModel->slug) : route('product.store') }}";
        let type = "{{ (!empty($productModel)) ? 'update' : 'create' }}";
        let resultAjax = sendAjax(url, data, type);
        let arrInput = [
            'category_id',
            'name',
            'attribute',
            'stock',
            'price',
            'image',
            'description'
        ];
        if(resultAjax.statusCode == 200){
            removeError(arrInput);
            removeImage('preview-image-new')
            CKEDITOR.instances.description.setData('');
            if(type == 'update'){
                window.location.href = resultAjax.href;
            }
        }else{
            renderError(resultAjax, arrInput);
        }
    });
</script>
@endpush