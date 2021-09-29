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
                                                <th>No Transaksi</th>
                                        <th>No Berkas</th>
                                        <th>Jenis</th>
                                        <th>Kecamatan</th>
                                        <th>Kelurahan/Desa</th>
                                        <th>Nama Peminjam</th>
                                        <th>Status</th>
                                        <th>Tanggal Pinjam</th>
                                        {{-- <th>Tanggal Kembali<h5 style="font-size:10px">(tgl deadline)</h5></th> --}}
                                        <th>Tanggal Pengembalian</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dataCari as $data)
                                              
                                                
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->isiTransaksi->id_booking }}</td>
                                                {{-- <td>{{ $data->isiInventory->nomor }}</td> --}}
                                                <td>
                                                    {{ $data->isiInventory->nomor }}
                                                    {{-- <ul>
                                                        @foreach ($dataTransaksi as $item)
                                                            <li>{{ $item->isiInventory->nomor }}</li>
                                                        @endforeach                                                   
                                                    </ul> --}}
                                                </td>
                                                <td>
                                                    {{ $data->isiInventory->isiJenis->nama_jenis_hak }}
                                                </td>
                                                <td>
                                                    {{ $data->isiInventory->isiKecamatan->name }}
                                                </td>
                                                <td>
                                                    {{ $data->isiInventory->isiKelurahan->name  }}
                                                </td>
                                                <td>{{ $data->isiTransaksi->isiPenyewa->nama_penyewa }}</td>
                                               
                                                {{-- <td>{{ $data->status }}</td> --}}
                                                <td class="project-state">
                                                    @if ($data->isiInventory->status === 'Pinjam')
                                                        <span class="badge badge-success">{{ $data->isiInventory->status }}</span>
        
                                                    @else
                                                        <span class="badge badge-primary">{{ $data->isiInventory->status }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $data->isiTransaksi->tanggal_ambil_berkas}}</td>
                                                {{-- <td>{{ $data->isiTransaksi->tanggal_kembali_berkas }}</td> --}}
                                                <td>{{ $data->isiTransaksi->tanggal_pengembalian_berkas}}</td>
                                                    <td>
                                                        {{-- <a  href="/TambahKeranjang/{{ $data->id }}" class="btn btn-app">
                                  <i class="fas fa-shopping-cart"></i> Tambah Keranjang
                                </a> --}}
                                                       
                                                       
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
