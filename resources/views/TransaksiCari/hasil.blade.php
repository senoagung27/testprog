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
                                <a href="/TransaksiCari" style="margin-right: 5px;">
                                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                                </a>
                            </span>
                            Hasil Pencarian
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/TransaksiCari">Cari Berkas</a></li>
                            <li class="breadcrumb-item active">Hasil Pencarian</li>
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
                    <div class="col-12">
                        <div class="callout callout-info">
                            <h5><i class="fas fa-info"></i> Data Ditemukan</h5>
                            Data Berkas Sebagai Berikut Ini
                        </div>


                        <!-- Main content -->
                        <div class="invoice p-4 mb-4">
                            <!-- title row -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h4 class="mb-6">
                                        <i class="fas fa-globe"></i> Data Berkas
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->

                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>

                                                <th>No</th>
                                                <th>No Buku Tanah</th>
                                                <th>Nama Buku Tanah</th>
                                                <th>No Berkas</th>
                                                <th>Nama Berkas</th>
                                                <th>Tipe Hak Buku Tanah</th>
                                                <th>Status</th>
                                                <th>Aksi</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dataCari as $data)
                                                @if ($data->status_pinjam === 'Pinjam')
                                                    <tr style="color:red">
                                                @else
                                                    <tr>
                                                @endif
                                                
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->no_buku_tanah }} </td>
                                                    <td>{{ $data->nama_buku_tanah }} </td>
                                                    <td>{{ $data->nomor_berkas }}</td>
                                                    <td>{{ $data->nama_berkas }} </td>
                                                    <td>{{ $data->tipe_hak_buku_tanah }}</td>
                                                    <td>{{ $data->status_pinjam }}</td>
                                                    <td>
                                                        {{-- <a  href="/TambahKeranjang/{{ $data->id }}" class="btn btn-app">
                                  <i class="fas fa-shopping-cart"></i> Tambah Keranjang
                                </a> --}}
                                                        <a href="{{ route('SimpanKeranjang') }}" data-toggle="tooltip"
                                                            title="Tambah ke keranjang" onclick="event.preventDefault();
                                    document.getElementById('keranjang-form{{ $loop->iteration }}').submit();">
                                                            <i class="fa fa-cart-plus"></i>
                                                            <!-- <p>{{ __('Tambah Keranjang') }}</p> -->
                                                        </a>
                                                        <form id="keranjang-form{{ $loop->iteration }}"
                                                            action="{{ route('SimpanKeranjang') }}" method="POST"
                                                            style="display: none;">
                                                            @csrf
                                                            <input type="hidden" name="id"
                                                                value="{{ Auth::user()->id }}" />
                                                            <input type="hidden" name="berkas_id"
                                                                value="{{ $data->berkas_id }}" />
                                                        </form>
                                                    </td>
                                                </tr>


                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- <div class="row no-print">
                            <div class="col-12">
                              <a href="/TransaksiCari" class="btn btn-primary" style="margin-right: 5px;">
                                <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back
                              </a>
                            </div>
                          </div> -->

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
    </script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
