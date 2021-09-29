@extends('layouts.app')

@section('content')




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Inventory Baru</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Inventory Baru</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if (('session')('edit'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Sukses!!!!</h5>
                        Data Berhasil Di Edit.
                        {{ session('edit') }}
                    </div>
                @endif
                @if (('session')('sukses'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Sukses</h5>
                        Data Berhasil Di Tambah
                        {{ session('tambah') }}
                    </div>
                @endif
                <div class="card">
                    {{-- <div class="card-header d-flex">
                        <a href="{{ route('berkas.create') }}" class="btn btn-primary btn-rounded btn-fw"><i
                                class="icon-nav fa fa-plus"></i>&nbsp; Tambah Data</a>
                    </div><!-- /.card-header --> --}}
                    <!-- /.card-header -->

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    {{-- <th>No Berkas</th>
                                    <th>Nama Berkas</th>
                                    <th>Nama Rak</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th width="70"></th>
                                    <th width="75"></th> --}}
                                    <th>No</th>
                                    <th>Nama Peminjam</th>
                                    <th>Jenis</th>
                                    <th>Nomor</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan/Desa</th>
                                    <th>Status</th>
                                    <th>Rak</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataSertifikat as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->isiRincian }}</td>
                                        <td>{{ $data->isiJenis->nama_jenis_hak }}</td>
                                        <td>{{ $data->nomor }}</td>
                                        <td>{{ $data->isiKecamatan->name }}</td>
                                        <td>{{ $data->isiKelurahan->name }}</td>
                                        {{-- <td>{{ $data->status }}</td> --}}
                                        <td class="project-state">
                                            @if ($data->status === 'Dipinjam')
                                                <span class="badge badge-success">{{ $data->status }}</span>

                                            @else
                                                <span class="badge badge-danger">{{ $data->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($data->status === 'Belum Terdaftar')
                                                <button  data-toggle="modal" data-target="#modal-default{{ $data->id }}">
                                                    <i class="fa fa-building" aria-hidden="true"></i>
                                                    Input Rak 
                                                </button>
                                            @else
                                                {{ $data->isiRak->nama_rak }}
                                            @endif
                                        </td>
                                        
                                        {{-- <td><a href="/editBerkas/{{ $row->id }}" class="btn btn-success">
                                                    <i class="fas fa-edit"></i> Edit</a></td> --}}
                                        
                                        <td><a href="/hapusTransaksiBaru/{{ $data->id }}" class="btn btn-danger"
                                                data-toggle="modal" data-target="#modalhapus{{ $data->id }}"><i
                                                    class="icon-nav fa fa-trash"> Hapus</i></a></td>
                                        {{-- <td>{{ $row->nomor_berkas }}</td>
                                        <td>{{ $row->nama_berkas }}</td>
                                        <td>{{ $row->isiRak->isiLemari->isiRuangan->nama_ruangan }}</td>
                                        <td>{{ $row->isiRak->isiLemari->nama_lemari }}</td>
                                        <td>{{ $row->isiRak->nama_rak }}</td>
                                        <td class="project-state">
                                            @if ($row->status_pinjam === 'Tersedia')
                                                <span class="badge badge-success">{{ $row->status_pinjam }}</span>

                                            @else
                                                <span class="badge badge-danger">{{ $row->status_pinjam }}</span>
                                            @endif


                                        </td>
                                        <td>{{ $row->keterangan }}</td>
                                        <td><a href="/editBerkas/{{ $row->id }}" class="btn btn-success">
                                                    <i class="fas fa-edit"></i> Edit</a></td>
                                        <td><a href="/detailBerkas/{{ $row->id }}" class="btn btn-primary">
                                                <i class="fa fa-eye"></i> Detail</a></td>
                                        <td><a href="/hapusBerkas/{{ $row->id }}" class="btn btn-danger"
                                                data-toggle="modal" data-target="#modalhapus{{ $row->id }}"><i
                                                    class="icon-nav fa fa-trash"> Hapus</i></a></td> --}}
                                    </tr>

                                    <!-- Central Modal Danger Demo-->
                                    <div class="modal fade right" id="modalhapus{{ $data->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <form action="/hapusBerkas/{{ $data->id }}" method="POST">
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
                                                            style="color:white">Hapus Data <i
                                                                class="fas fa-times-circle  ml-1"></i></button>
                                                        <a type="button" class="btn btn-outline-danger waves-effect"
                                                            data-dismiss="modal">No, thanks</a>
                                                    </div>
                                                </div>
                                                <!--/.Content-->
                                        </form>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- /.tab-pane -->
                    </div>

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
            $("#example2").DataTable();
            $("#example3").DataTable();
            $('#example4').DataTable({
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
