@extends('layouts.app')

@section('content')




    <div class="content-wrapper">
        <div class="alert alert-success" role="alert">
            Berkas Berhasil Di input
        </div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Tambah Berkas</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Tambah Berkas</li>
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
                        <h3 class="card-title">Tambah Berkas</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="/SimpanEditBerkas">
                        @csrf
                        <input type="hidden" name="id" value="{{ $dataBerkas->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Berkas</label>
                                <input type="text" name="nama_berkas" class="form-control" value="{{ $dataBerkas->nama_berkas }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nomor Berkas</label>
                                <input type="text" name="nomor_berkas" class="form-control"
                                    value="{{ $dataBerkas->nomor_berkas }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control"
                                    value="{{ $dataBerkas->keterangan }}">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan Berkas</button>
                            <button type="reset" class="btn btn-danger">
                                Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>



    </div>
    </section>
    </div>





@endsection
