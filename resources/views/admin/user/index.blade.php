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
                    <h1>User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('user.create') }}" class="btn btn-lm btn-success  float-right">
                                <i class="fas fa-plus-square mr-2"></i>
                                Create new</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Role</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Active</th>
                                        <th style="width:15%">Action(s)</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@push('script')
<script>
    let url = '{!! route("user.index") !!}';
    let columns = [
        {data: null, name: null},
        {data: 'id', name: 'id'},
        {data: 'name', name: 'name'},
        {data: 'gender', name: 'gender'},
        {data: 'role_id', name: 'role_id'},
        {data: 'email', name: 'email'},
        {data: 'phone', name: 'phone', render: function ( toFormat ) {
                var tPhone;
                tPhone=toFormat.toString();            
                tPhone='(' + tPhone.substring(0, 4) + ')-' + tPhone.substring(4, 7) + '-' + tPhone.substring(7, 10);   
                return tPhone }},
        {data: 'activated', name: 'activated'},
        {data: 'action', name: 'action'},
    ];
    renderData(url, columns);
</script>
@endpush