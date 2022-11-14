@extends('admin.layout.main')
@section('content')
<div class="content-wrapper" style="min-height: 1345.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('banner.index') }}" class="btn btn-lm btn-success">
                        <i class="fas fa-list-alt mr-2"></i>
                        List data</a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Banner</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form id="dataForm" action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {!! (!empty($bannerModel)) ? method_field('PUT') : method_field('POST') !!}
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Banner Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="">Chọn type</option>
                                        <option {{ ((!empty($bannerModel) && $bannerModel->type ===
                                            0 ) ) ?
                                            'selected' :
                                            '' }} value="0">Banner</option>
                                        <option {{ ((!empty($bannerModel) && $bannerModel->type ===
                                            1 ) ) ?
                                            'selected' :
                                            '' }} value="1">Slide</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input value="{{ $bannerModel->title ?? '' }}" name="title" type="text"
                                        class="form-control" id="title" placeholder="Enter title">
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea name="content" id="content" class="form-control" rows="3"
                                        placeholder="Enter ...">{{ $bannerModel->content ?? '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="link">Link</label>
                                    <input value="{{ $bannerModel->link ?? '' }}" name="link" type="text"
                                        class="form-control" id="link" placeholder="Enter link">
                                </div>
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
                                <div id="preview" class="d-flex flex-column-reverse">
                                    @if (!empty($bannerModel->image))
                                    <div id="image-old">
                                        <div class="d-flex align-items-start flex-column">
                                            <label>Image(old) </label>
                                            <img style="width: 350px; height: 250px; object-fit: cover; "
                                                src="{{ asset($bannerModel->image) }}" alt="Lỗi!"
                                                class="w-100 img-thumbnail preview-img" />
                                        </div>
                                    </div>
                                    @endif
                                    <div id="preview-image-new"></div>
                                </div>
                                <div class="form-group">
                                    <label for="time_start">Time start</label>
                                    <input name="time_start" type="date"
                                        value="{{ (!empty($bannerModel->time_start)) ? date( 'Y-m-d', strtotime($bannerModel->time_start)) : ''}}"
                                        class="form-control" id="time_start">
                                </div>
                                <div class="form-group">
                                    <label for="time_end">Time end</label>
                                    <input name="time_end" type="date"
                                        value="{{ (!empty($bannerModel->time_end)) ? date( 'Y-m-d', strtotime($bannerModel->time_end)) : ''}}"
                                        class="form-control" id="time_end">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input {{ ((!empty($bannerModel) && $bannerModel->activated === 1 ) ) ?
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
    preview('preview-image-new', 'banner', 'image');
    $('#dataForm').submit(function(event){
        event.preventDefault();
        let data = new FormData(this);
        let url = "{{ (!empty($bannerModel)) ? route('banner.update', $bannerModel->id) : route('banner.store') }}";
        let type = "{{ (!empty($bannerModel)) ? 'update' : 'create' }}";
        let resultAjax = sendAjax(url, data, type);
        let arrInput = [
            'type',
            'title',
            'content',
            'link',
            'image',
            'time_start',
            'time_end',
        ];
        if(resultAjax.statusCode == 200){
            removeError(arrInput);
            removeImage('preview-image-new')
           if(type == 'update'){
            window.location.href = resultAjax.href;
           }
        }else{
            renderError(resultAjax, arrInput);
        }
    });
</script>
@endpush