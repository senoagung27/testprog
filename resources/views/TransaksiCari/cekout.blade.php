@extends('layouts.app')

@section('content')




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                            <span>
                                <a href="/Keranjang" style="margin-right: 5px;">
                                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                                </a>
                            </span>
                            Cekout
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/TransaksiCari">Cari Berkas</a></li>
                            <li class="breadcrumb-item"><a href="/Keranjang">Keranjang</a></li>
                            <li class="breadcrumb-item active">Cekout</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->

        {{-- <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="container-fluid">
                <h2 class="text-center display-4">Search</h2>
              </div>
            </section>
        
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <form action="simple-results.html">
                                <div class="input-group input-group-lg">
                                    <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here" value="Lorem ipsum">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-lg btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                  
                    
                </div>
            </section>
          </div> --}}


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">


                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> Data Cekout
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->

                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    {{-- <form role="form" method="POST" action="/Simpancekout"> --}}
                                    <form role="form" action="/Simpancekout" method="post">
                                        @csrf
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>No Buku Tanah</th>
                                                    <th>Nama Buku Tanah</th>
                                                    <th>No Berkas</th>
                                                    <th>Nama Berkas</th>
                                                    <th>Tipe Hak Buku Tanah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dataKeranjang as $data)


                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->isiBerkas->no_buku_tanah }} </td>
                                                        <td>{{ $data->isiBerkas->nama_buku_tanah }} </td>
                                                        <td>{{ $data->isiBerkas->nomor_berkas }}</td>
                                                        <td>{{ $data->isiBerkas->nama_berkas }} </td>
                                                        <td>{{ $data->isiBerkas->tipe_hak_buku_tanah }}</td>
                                                    </tr>



                                                @endforeach
                                            </tbody>

                                        </table>
                                        <div class="row">

                                            <div class="col-2">
                                                <div class="form-group">
                                                    <p></p>
                                                    <label>Nama Anggota</label>
                                                    <div class="input-group">
                                                       
                                                        <select class="custom-select coba" name="penyewas_id" required>
                                                            <option value="">-Pilihan-</option>
                                                            @foreach ($dataPenyewa as $item)
                                                                {{-- <option value="{{ $item->id }}">{{ $item->nama_penyewa }}</option> --}}

                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->nama_penyewa }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-2">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="hidden" name="tanggal"
                                                            value="<?php echo date('Y-m-d'); ?>">
                                                        <input type="hidden" name="id_admin"
                                                            value="{{ Auth::user()->id }}" />
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- /.row -->

                                        <!-- this row will not appear when printing -->
                                        <div class="row no-print">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary float-right"
                                                    style="margin-right: 5px;">
                                                    <i class="fas fa-download"></i> Simpan
                                                </button>
                                            </div>
                                        </div>
                                </div>
                                </form>

                                <div class="modal fade" id="modal-default">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Default Modal</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <section class="content">
                                                    <div class="container-fluid">
                                                        <h2 class="text-center display-4">Search</h2>
                                                        <div class="row">
                                                            <div class="col-md-8 offset-md-2">
                                                                <form action="/TransaksiHasil">
                                                                    <div class="input-group">
                                                                        <input type="search"
                                                                            class="form-control form-control-lg"
                                                                            placeholder="Type your keywords here" />
                                                                        <div class="input-group-append">
                                                                            <button type="submit"
                                                                                class="btn btn-lg btn-default">
                                                                                <i class="fa fa-search"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            </div>
                            <!-- /.invoice -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>







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
            $(document).ready(function() {
                $('.coba').select2();
            });
        })
    </script>
@endsection
