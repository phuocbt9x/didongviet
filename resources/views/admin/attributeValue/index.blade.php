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
                    <h1>Attribute Value</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Attribute Value</li>
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
                            <a href="{{ route('attributeValue.create') }}" class="btn btn-lm btn-success  float-right">
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
                                        <th>Attribute</th>
                                        <th>Value</th>
                                        <th>Active</th>
                                        <th style="width:20%">Action(s)</th>
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
    let url = '{!! route("attributeValue.index") !!}';
    let columns = [
        {data: null, name: null},
        {data: 'id', name: 'id'},
        {data: 'attribute_id', name: 'attribute_id'},
        {data: 'value', name: 'value'},
        {data: 'activated', name: 'activated'},
        {data: 'action', name: 'action'},
    ];
    renderData(url, columns);
</script>
@endpush