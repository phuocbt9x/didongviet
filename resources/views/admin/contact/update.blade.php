@extends('admin.layout.main')
@extends('admin.layout.table')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Contact</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Contact</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('contact.update', $contactModel->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <strong>
                                    Name
                                </strong>
                                <p class="text-muted">
                                    {{ $contactModel->name }}
                                </p>
                                <hr>
                                <strong>
                                    Email
                                </strong>
                                <p class="text-muted">
                                    {{ $contactModel->email }}
                                </p>
                                <hr>
                                <strong>
                                    Status
                                </strong>
                                <div class="form-group">
                                    <select class="form-control" name="activated" id="status">
                                        <option {{ ($contactModel->activated == 0) ? 'selected' : '' }} value="0">Chưa
                                            xử
                                            lý
                                        </option>
                                        <option {{ ($contactModel->activated == 1) ? 'selected' : '' }} value="1">Đã xử
                                            lý
                                        </option>
                                    </select>
                                </div>

                                <hr>
                                <strong>
                                    Time_create
                                </strong>
                                <p class="text-muted">
                                    {{ $contactModel->created_at}}
                                </p>
                                <hr>

                                <a href="{{ route('contact.index') }}" class="btn btn-primary btn-block"><b>Danh
                                        sách</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <!-- Post -->
                                        <div class="post">
                                            <strong>
                                                Content
                                            </strong>
                                            <div class="description">
                                                {!! $contactModel->content !!}
                                            </div>
                                        </div>
                                        <div class="post">
                                            <strong style="margin-bottom: 10px;display: block;">
                                                Gửi phản hồi cho khách hàng
                                            </strong>
                                            <div class="feedback" style="margin-bottom:20px">

                                                <div class="form-group">
                                                    <textarea data-sample-short class="form-control" name="feedback"
                                                        id="feedback" cols="50" rows="5"></textarea>
                                                </div>


                                            </div>
                                            <!-- /.post -->
                                        </div>
                                        <div class="card-footer mt-1">
                                            <button type="submit" class="float-right btn btn-sm btn-success">Gửi
                                                phản hồi</button>
                                        </div>
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
            </form>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@push('script')
<script>
    let url = '{!! route("contact.index") !!}';
    let columns = [
        {data: null, name: null},
        {data: 'id', name: 'id'},
        {data: 'name', name: 'name'},
        {data: 'email', name: 'email'},
        {data: 'title', name: 'title'},
        {data: 'activated', name: 'activated'},
        {data: 'action', name: 'action'},
    ];
    renderData(url, columns);
</script>
@endpush