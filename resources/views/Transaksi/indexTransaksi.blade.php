@extends('layouts.app')

@section('content')




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Transaksi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Transaksi</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">


                <div class="card">

                    {{-- <div class="card-header">

                        <a href="/cetak_pdf" class="btn btn-app bg-danger float-right">
                            <i class="fas fa-file-pdf"></i> PDF
                           </a>
                        <a href="/TransaksiBaru" class="btn btn-primary btn-rounded btn-fw"><i
                class="icon-nav fa fa-plus"></i> Transaksi Baru</a>
                    </div> --}}

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Transaksi</th>
                                    <th>No Berkas</th>
                                    <th>Nama Peminjam</th>
                                    <th>Status</th>
                                    <th>Tanggal Pinjam<h5 style="font-size:10px">(tgl pinjam)</h5></th>
                                    <th>Tanggal Kembali<h5 style="font-size:10px">(tgl deadline)</h5></th>
                                    <th>Tanggal Pengembalian<h5 style="font-size:10px">(tgl real)</h5></th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataTransaksi as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->isiTransaksi->id_booking }}</td>
                                        <td>{{ $data->isiInventory->nomor }}</td>
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
                                        <td>{{ $data->isiTransaksi->tanggal_kembali_berkas }}</td>
                                        <td>{{ $data->isiTransaksi->tanggal_pengambilan_berkas }}</td>
                                        {{-- <td><a href="/editBerkas/{{ $row->id }}" class="btn btn-success">
                                                    <i class="fas fa-edit"></i> Edit</a></td> --}}
                                        
                                        <td><a href="/hapusTransaksi/{{ $data->id }}" class="btn btn-danger"
                                                data-toggle="modal" data-target="#modalhapus{{ $data->id }}"><i
                                                    class="icon-nav fa fa-trash"> Hapus</i></a></td>
                                        {{-- <td>{{ $row->isiTransaksi->id_booking }}</td>
                                        <td>{{ $row->isiTransaksi->id_booking }}</td>
                                        <td> {{ $row->isiTransaksi->isiPenyewa->nama_penyewa }}</td>
                                        <td class="project-state">
                                            @if ($row->status_pinjam === 'Pinjam')
                                                <span class="badge badge-success">{{ $row->isiTransaksi->status_pinjam }}</span>

                                            @else
                                                <span class="badge badge-danger">{{ $row->isiTransaksi->status_pinjam }}</span>
                                            @endif


                                        </td>
                                        <td>{{ $row->isiTransaksi->tanggal_ambil_berkas }}</td>
                                        <td>{{ $row->isiTransaksi->tanggal_kembali_berkas }}</td>
                                        {{-- <td><a href="/detailTransaksi/{{ $row->id_booking }}" class="btn btn-primary">
                                            <i class="fa fa-eye"></i> Detail</a></td> --}}

                                        {{-- <td>
                                            <a href="/detailTransaksi/{{ $data->id_booking }}" class="btn btn-app"
                                                style="color:black">
                                                <i class="fa fa-eye"></i> Detail</a>
                                            <a href="/detailTranskasi/{{ $row->id }}" class="btn btn-success"><i
                                                    class="fas fa-edit"></i> Detail</a>
                                            <a href="/hapusTransaksi/{{ $row->id }}" class="btn btn-app" data-toggle="modal"
                                                data-target="#modalhapus{{ $row->id }}"><i class="icon-nav fa fa-trash"> Hapus</i></a>
                                            <a href="/hapusTransaksi/{{ $data->id }}" class="btn btn-app"
                                                data-toggle="modal" style="color:black"
                                                data-target="#modalhapus{{ $data->id }}">
                                                <i class="fa fa-trash"></i> Hapus
                                            </a>
                                        </td> --}}
                                    </tr>


                                    <!-- Central Modal Danger Demo-->
                                    <div class="modal fade right" id="modalhapus{{ $data->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <form action="/hapusTransaksi/{{ $data->id }}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <div class="modal-dialog modal-notify modal-danger" role="document">
                                                <!--Content-->
                                                <div class="modal-content">
                                                    <!--Header-->
                                                    <div class="modal-header">
                                                        <p class="heading">Hapus Anggota</p>

                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true" class="white-text">&times;</span>
                                                        </button>
                                                    </div>
                                                    <!--Body-->
                                                    <div class="modal-body">

                                                        <div class="row">
                                                            <div class="col-3">
                                                                <p></p>
                                                                <p class="text-center"><i class="fas fa-trash fa-4x"></i>
                                                                </p>
                                                            </div>

                                                            <div class="col-9">
                                                                <p>Yakin anda menghapus data dengan nama ini ?</p>
                                                                <h2><span class="badge">{{ $data->nama_berkas }}</span>
                                                                </h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Footer-->
                                                    <div class="modal-footer justify-content-center">
                                                        <button type="submit" class="btn btn-danger"
                                                            style="color:white">Hapus
                                                            Data <i class="fas fa-times-circle  ml-1"></i></button>
                                                        <a type="button" class="btn btn-outline-danger waves-effect"
                                                            data-dismiss="modal">No, thanks</a>
                                                    </div>
                                                </div>
                                                <!--/.Content-->
                                        </form>
                                    </div>


                                    {{-- <div class="modal fade" id="modalhapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <form action="" method="POST">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    HAPUS BERKAS
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                                <div class="modal-body">
                                    <h4>Yakin Hapus Data Berkas <br><br> <b> <br><p>dari data berkas ?</p> </h4><br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-danger">Hapus	</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> --}}
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
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
        });
    </script>
@endsection