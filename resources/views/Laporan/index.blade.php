@extends('layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Inventory Berkas</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/e-peminjamans">Home</a></li>
                            <li class="breadcrumb-item active">Inventory Berkas</li>
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
                    <div class="card-header">
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalfilterberkas1">
                            <i class="icon-nav fa fa-filter"> Filter</i></a>
                        <a href="/e-peminjamans/SertifikatBaru" class="btn btn-primary">
                            <i class="fa fa-plus" aria-hidden="true"></i> Tambah Inventory</a>
                        <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
                            IMPORT EXCEL
                        </button>
                    </div><!-- /.card-header -->
                    <div class="modal fade" id="modalfilterberkas1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Filter Inventory Berkas</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/e-peminjamans/Laporan" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Jenis</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="far fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                    <select class="form-control select2 " name="jenis_id"
                                                        style="width:300px">
                                                        <option selected="selected" disabled value="">-Pilihan-</option>
                                                        @foreach ($dataJenisHak as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->nama_jenis_hak }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <h2><span class="badge"></span></h2>
                                            </div>
                                            <div class="col-6">
                                                <label>Nomor</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="far fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="nomor" class="form-control float-right"
                                                        id="reservation" placeholder="Nomor">
                                                </div>
                                                <h2><span class="badge"></span></h2>
                                            </div>
                                            <div class="col-6">
                                                <label>Kelurahan/Desa</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="far fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                    <select class="form-control select2 " name="kelurahan_desa"
                                                        style="width:300px">
                                                        <option selected="selected" value="">-Kelurahan/Desa-</option>
                                                        @foreach ($kelurahan as $value)
                                                            <option value="{{ $value->kecamatan_id }}">
                                                                {{ $value->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <h2><span class="badge"></span></h2>
                                            </div>
                                            <div class="col-6">
                                                <label>Kecamatan</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="far fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                    <select class="form-control select2 " name="kecamatan"
                                                        style="width:300px">
                                                        <option value="">Kecamatan</option>
                                                    </select>
                                                </div>
                                                <h2><span class="badge"></span></h2>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>

                            </div>
                            </form>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <div class="modal fade" id="importExcel" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form method="POST" action="/e-peminjamans/laporan/import" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                    </div>
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        <label>Pilih file excel</label>
                                        <div class="form-group">
                                            <input type="file" name="file" required="required">
                                            <h6>format(.xlsx .xls .csv)</h6>
                                            <a href="{{ url('/format/tamplate.xlsx') }}" download>
                                                <i class="fas fa-download    ">
                                                    Format File
                                                </i>
                                            </a>
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
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="contoh1" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis</th>
                                    <th>Nomor</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan/Desa</th>
                                    <th>Status</th>
                                    <th>Status Berkas</th>
                                    <th>Ruangan</th>
                                    <th>Lemari</th>
                                    <th>Rak</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataBerkas as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->isiJenis->nama_jenis_hak }}</td>
                                        <td>{{ $data->nomor }}</td>
                                        <td>{{ $data->isiKecamatan->nama }}</td>
                                        <td>{{ $data->isiKelurahan->nama }}</td>
                                        <td class="project-state">
                                            @if ($data->status === 'Tersedia')
                                                <span class="badge badge-success">{{ $data->status }}</span>

                                            @else
                                                <span class="badge badge-danger">{{ $data->status }}</span>
                                            @endif
                                        </td>
                                        <td class="project-state">
                                            @if ($data->status_berkas === 'Aktif')
                                                <span class="badge badge-primary">{{ $data->status_berkas }}</span>

                                            @else
                                                <span class="badge badge-danger">{{ $data->status_berkas }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $data->isiRuangan->nama_ruangan }}
                                        </td>
                                        <td>
                                            {{ $data->isiLemari->nama_lemari }}
                                        </td>
                                        <td>
                                            {{ $data->isiRak->nama_rak }}
                                        </td>
                                        <td>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                                        data-toggle="dropdown">
                                                        Pilihan
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="/e-peminjamans/hapusInvetoryBerkas/{{ $data->id }}"
                                                            data-toggle="modal"
                                                            data-target="#modalhapus{{ $data->id }}">
                                                            Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade right" id="modalhapus{{ $data->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <form action="/e-peminjamans/hapusInvetoryBerkas/{{ $data->id }}"
                                            method="POST">
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
                                                                <h2><span
                                                                        class="badge">{{ $data->nama_berkas }}</span>
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
                        <!-- /.card-body -->
                        {{ $dataBerkas->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('jsIsian')
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('select[name="ruangan_id"]').on('change', function() {
                var cityID = jQuery(this).val();
                if (cityID) {
                    jQuery.ajax({
                        url: 'dataLemari/' + cityID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            jQuery('select[name="lemari_id"]').empty();
                            $('select[name="lemari_id"]').append(
                                '<option>--- Select Lemari ---</option>');
                            jQuery.each(data, function(key, value) {
                                $('select[name="lemari_id"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="state"]').empty();
                }
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('select[name="lemari_id"]').on('change', function() {
                var cityID = jQuery(this).val();
                if (cityID) {
                    jQuery.ajax({
                        url: 'dataRak/' + cityID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            jQuery('select[name="rak_id"]').empty();
                            $('select[name="rak_id"]').append(
                                '<option>--- Select Rak ---</option>');
                            jQuery.each(data, function(key, value) {
                                $('select[name="rak_id"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="state"]').empty();
                }
            });
        });
    </script>

    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('select[name="kelurahan_desa"]').on('change', function() {
                var kelurahanID = jQuery(this).val();
                if (kelurahanID) {
                    jQuery.ajax({
                        url: 'dataKec/' + kelurahanID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            jQuery('select[name="kecamatan"]').empty();
                            $('select[name="kecamatan"]').append(
                                '<option>--- Kecamatan ---</option>');
                            jQuery.each(data, function(key, value) {
                                $('select[name="kecamatan"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="state"]').empty();
                }
            });
        });
    </script>
@endsection




@section('bawah')
    <script>
        $(function() {
            $("#contoh1").DataTable({
                "paging": false,
                "ordering": true,
                "buttons": ["excel", "print"]
            }).buttons().container().appendTo('#contoh1_wrapper .col-md-6:eq(0)');
            $('#contoh2').DataTable({
                "paging": false,
                "ordering": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
        $(function() {
            $('.select2').select2()
        });
    </script>
@endsection
