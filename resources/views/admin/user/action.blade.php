@extends('admin.layout.main')
@section('content')
<div class="content-wrapper" style="min-height: 1345.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('user.index') }}" class="btn btn-lm btn-success">
                        <i class="fas fa-list-alt mr-2"></i>
                        List data</a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form id="dataForm" action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {!! (!empty($userModel)) ? method_field('PUT') : method_field('POST') !!}
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">User Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="role_id">Role</label>
                                    <select name="role_id" id="role_id" class="form-control">
                                        <option value="">Chọn role</option>
                                        @foreach ($roles as $role)
                                        <option {{ (!empty($userModel->role_id)) ? (($userModel->role_id === $role->id)
                                            ?
                                            'selected' : '') : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input value="{{ $userModel->name ?? '' }}" name="name" type="text"
                                        class="form-control" id="name" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <div class="row" id="gender">
                                        <div class="col-sm-6">
                                            <!-- checkbox -->
                                            <div class="form-group">
                                                <div class="custom-control custom-radio">
                                                    <input value="0" class="custom-control-input" id="female" {{
                                                        ((!empty($userModel) && $userModel->gender === 0 ) ) ?
                                                    'checked' :
                                                    '' }}
                                                    type="radio" name="gender">
                                                    <label for="female" class="custom-control-label">Female</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- radio -->
                                            <div class="form-group">
                                                <div class="custom-control custom-radio">
                                                    <input value="1" class="custom-control-input" id="male" type="radio"
                                                        {{ ((!empty($userModel) && $userModel->gender === 1 ) ) ?
                                                    'checked' :
                                                    '' }} name="gender">
                                                    <label for="male" class="custom-control-label">Male</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="emai">Email</label>
                                    <input value="{{ $userModel->email ?? '' }}" name="email" type="email"
                                        class="form-control" id="email" placeholder="Enter emai">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input value="{{ $userModel->phone ?? '' }}" name="phone" type="text"
                                        class="form-control" id="phone" placeholder="Enter phone">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input name="password" type="password" class="form-control" id="password"
                                        placeholder="Enter update password">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input {{ ((!empty($userModel) && $userModel->activated === 1 ) ) ? 'checked' :
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
                                    <label for="birth">Birth</label>
                                    <input name="birth" type="date"
                                        value="{{ (!empty($userModel->birth)) ? date( 'Y-m-d', strtotime($userModel->birth)) : ''}}"
                                        class="form-control" id="birth">
                                </div>
                                <div class="form-group">
                                    <label for="avatar">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="avatar" type="file" class="custom-file-input" id="avatar">
                                            <label class="custom-file-label" for="avatar">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div id="preview" class="d-flex justify-content-between">
                                    @if (!empty($userModel->avatar))
                                    <div id="image-old">
                                        <div class="d-flex align-items-start flex-column">
                                            <label>Image(old) </label>
                                            <img style="width: 200px; height: 200px; object-fit: cover; "
                                                src="{{ asset($userModel->avatar) }}" alt="Lỗi!"
                                                class="rounded-circle  img-thumbnail preview-img" />
                                        </div>
                                    </div>
                                    @endif
                                    <div id="preview-image-new"></div>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input value="{{ $userModel->address ?? '' }}" name="address" type="text"
                                        class="form-control" placeholder="Enter address">
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label for="city_id">City</label>
                                            <select id="city_id" name="city_id" class="form-control">
                                                <option value="">Chọn Tỉnh/Thành</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="district_id">District</label>
                                            <select id="district_id" name="district_id" class="form-control">
                                                <option value="">Chọn Quận/Huyện</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ward_id">Ward</label>
                                    <select id="ward_id" name="ward_id" class="form-control">
                                        <option value="">Chọn Xã/Phường</option>
                                    </select>
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
    getAddress({{ $userModel->city_id ?? -1 }}, {{ $userModel->district_id ?? -1 }}, {{ $userModel->ward_id ?? -1 }});
    preview('preview-image-new');
    $('#dataForm').submit(function(event){
        event.preventDefault();
        let data = new FormData(this);
        let url = "{{ (!empty($userModel)) ? route('user.update', $userModel->id) : route('user.store') }}";
        let type = "{{ (!empty($userModel)) ? 'update' : 'create' }}";
        let resultAjax = sendAjax(url, data, type);
        let arrInput = [
            'role_id',
            'name',
            'email',
            'phone',
            'password',
            'birth',
            'avatar',
            'address',
            'city_id',
            'district_id',
            'ward_id' 
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