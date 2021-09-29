@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Tambah Pengembalian</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Tambah Pengembalian</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Pengembalian</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="/Simpankembali">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Berkas</label>
                                <input type="text" name="nama_berkas" class="form-control" id="exampleInputEmail1"
                                    placeholder="Nama Berkas">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nomor Berkas</label>
                                <input type="text" name="nomor_berkas" class="form-control" id="exampleInputPassword1"
                                    placeholder="No Berkas">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" id="exampleInputPassword1"
                                    placeholder="Keterangan">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Tambah Berkas</button>
                            <button type="reset" class="btn btn-danger">
                                Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    </div>





@endsection
