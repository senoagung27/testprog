@extends('layouts.app')

@section('content')




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <!-- <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Cari Berkas</h1>
                        </div> -->
                    <div class="col">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Cari Berkas</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- <div class="content-wrapper"> -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <h2 class="text-center display-4">Cari Data Berkas</h2>
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <form action="/Transaksi/Hasil" method="GET">
                                    @csrf
                                    <div class="input-group">
                                        <input type="search" name="cari" class="form-control form-control-lg"
                                            placeholder="Masukkan kata kunci berkas" value="{{ old('cari') }}">
                                        <div class="input-group-append">
                                            
                                            <button type="submit" class="btn btn-lg btn-default">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <p style="font-size: 12px">kata kunci(nama berkas,nama buku tanah, tipe buku tanah, dan no buku tanah)</p>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- </div> -->




            </div>
        </section>

    </div>
@endsection
@section('bawah')

    <script>
        $(function() {
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": true,
                        "searching": true,
                        "ordering": true,
                        "info": true,
                        "autoWidth": true,
                    });
    </script>
@endsection
