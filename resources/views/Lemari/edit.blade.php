@extends('layouts.app')

@section('content')




    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Lemari</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/e-peminjamans">Home</a></li>
                            <li class="breadcrumb-item active">Edit Lemari</li>
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
                        <h3 class="card-title"> Tambah Lemari</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="/e-peminjamans/SimpanEditLemari">
                        @csrf
                        <input type="hidden" name="ruangan_id" value="{{ $dataLemari->ruangan_id }}"/>
                        <input type="hidden" name="id" value="{{ $dataLemari->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Lemari</label>
                                <input type="text" name="nama_lemari" class="form-control"
                                    value="{{ $dataLemari->nama_lemari }}">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan Lemari</button>
                            <button type="reset" class="btn btn-danger">
                                Reset
                            </button>
                            <a href="/e-peminjamans/Lemari" class="btn btn-success fa-pull-right">Back</a>
                        </div>
                    </form>
                </div>
            </div>



    </div>
    </section>
    </div>





@endsection
