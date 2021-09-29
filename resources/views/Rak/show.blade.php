@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Rak</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/e-peminjamans">Home</a></li>
                            <li class="breadcrumb-item active">Rak</li>
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
                        <h5><i class="icon fas fa-check"></i> Berhasil!!!!</h5>
                        {{ session('edit') }}
                    </div>
                @endif
                @if (('session')('tambah'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Berhasil!!!!</h5>
                        {{ session('tambah') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">

                        <a href="/e-peminjamans/tambahRak/{{ $id }}" class="btn btn-primary btn-rounded btn-fw"><i
                                class="icon-nav fa fa-plus"></i> Tambah Data</a>

                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Rak</th>
                                    {{-- <th width="60"></th> --}}
                                    <th width="75"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataRak as $row)
                                    <tr>
                                        <td>{{ $row->nama_rak }}</td>
                                        {{-- <td><a href="/editLemari/{{ $row->id }}" class="btn btn-success"><i class="fas fa-edit"></i> Edit</a></td> --}}
                                        <td>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                                        data-toggle="dropdown">
                                                        Pilihan
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="/e-peminjamans/editRak/{{ $row->id }}">
                                                            Edit</a>
                                                        <a class="dropdown-item"
                                                            href="/e-peminjamans/hapusRak/{{ $row->id }}"
                                                            data-toggle="modal"
                                                            data-target="#modalhapus{{ $row->id }}">
                                                            Hapus</a>
                                                    </div>
                                                    {{-- <a href="/hapusLemari/{{ $row->id }}" class="btn btn-danger" data-toggle="modal"
                                            data-target="#modalhapus{{ $row->id }}"><i
                                                class="icon-nav fa fa-trash"> Hapus</i></a> --}}
                                        </td>
                                    </tr>


                                    <!-- Central Modal Danger Demo-->
                                    <div class="modal fade right" id="modalhapus{{ $row->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <form action="/e-peminjamans/hapusRak/{{ $row->id }}" method="POST">
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
                                                                <h2><span class="badge">{{ $row->nama_berkas }}</span>
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
