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
                            <select class="custom-select" name="berkas_id" required>
                                <option value="">-Pilihan-</option>
                                @foreach ($dataBerkas as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_berkas }}</option>                                        
                                @endforeach
                              </select>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nomor Berkas</label>
                                <input type="date" name="tanggal_kembali_berkas" class="form-control" id="exampleInputPassword1"
                                    placeholder="No Berkas">
                            </div>
                            
                            
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Tambah Kembali Berkas</button>
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
