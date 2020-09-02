@extends('admin.layouts.master')

@section('title')
    Admin | Add Brands
@endsection

@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

<style>
    .file-input {
        width: 100%;
    }
</style>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Brand</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=" {{ route('brand') }} ">Brand</a></li>
                        <li class="breadcrumb-item active">Add Brand</li>
                    </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Brand</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @livewire('admin.brand.create')

                </div>
                    <!-- /.card -->
                </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/js/fileinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/themes/fa/theme.js"></script>
<script>
    $("#input-fa").fileinput({
        theme: "fa",
        uploadUrl: "/file-upload-batch/2"
    });
</script>
<script>
    $("#input-fa-logo").fileinput({
        theme: "fa",
        uploadUrl: "/file-upload-batch/2"
    });
</script>
@endsection
