@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Kecamatan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/e-peminjamans">Home</a></li>
                            <li class="breadcrumb-item active">Kecamatan</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                {{-- notifikasi form validasi --}}
                @if ($errors->has('file'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('file') }}</strong>
                    </span>
                @endif

                {{-- notifikasi sukses --}}
                @if ($sukses = Session::get('sukses'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $sukses }}</strong>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        {{-- <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
                            IMPORT EXCEL
                        </button> --}}
                    </div>
                    <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form method="POST" action="/e-peminjamans/simpanImport" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                    </div>
                                    <div class="modal-body">

                                        {{ csrf_field() }}

                                        <label>Pilih file excel</label>
                                        <div class="form-group">
                                            <input type="file" name="file" required="required">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Import</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!--Footer-->

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    {{-- <th>Nomor</th> --}}
                                    <th>Kecamatan</th>

                                    {{-- <th width="60"></th> --}}
                                    <th width="75">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataKecamatan as $row)
                                    <tr>
                                        {{-- <td>{{ $row->id }}</td> --}}
                                        <td>{{ $row->nama }}</td>
                                        {{-- <td><a href="/editRuangan/{{ $row->id }}" class="btn btn-success"><i class="fas fa-edit"></i> Edit</a></td> --}}
                                        <td>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                                        data-toggle="dropdown">
                                                        Pilihan
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="/e-peminjamans/editJenisHak/{{ $row->id }}">
                                                            Edit</a>
                                                        <a class="dropdown-item"
                                                            href="/e-peminjamans/hapusJenisHak/{{ $row->id }}"
                                                            data-toggle="modal"
                                                            data-target="#modalhapus{{ $row->id }}">
                                                            Hapus</a>
                                                    </div>
                                                    {{-- <a href="/hapusRuangan/{{ $row->id }}" class="btn btn-danger" data-toggle="modal"
                                            data-target="#modalhapus{{ $row->id }}"><i
                                                class="icon-nav fa fa-trash"> Hapus</i></a> --}}
                                        </td>
                                    </tr>


                                    <!-- Central Modal Danger Demo-->



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
