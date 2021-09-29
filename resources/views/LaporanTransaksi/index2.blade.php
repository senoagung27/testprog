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
                    <div class="card-header">
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalfilterberkas1">
                            <i class="icon-nav fa fa-filter"> Filter</i></a>
                    </div><!-- /.card-header -->
                    <div class="modal fade" id="modalfilterberkas1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Filter Transaksi</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form action="/e-peminjamans/Laporan/Transaksi" method="POST">
                                        @csrf
                                        <div class="row">

                                            <div class="col-6">
                                                <label>Tanggal Peminjaman</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="far fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                    <input type="date" name="tanggal_ambil_berkas"
                                                        class="form-control float-right" id="reservation">
                                                </div>
                                                <h2><span class="badge"></span></h2>
                                            </div>

                                            <div class="col-6">
                                                <label>Tanggal Pengembalian</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="far fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                    <input type="date" name="tanggal_pengembalian_berkas"
                                                        class="form-control float-right" id="reservation">
                                                </div>
                                                <h2><span class="badge"></span></h2>
                                            </div>
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
                                                    <select class="form-control select2 " name="kelurahan"
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
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive-xl">
                            <table id="contoh1" class="table table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Berkas</th>
                                        <th>Jenis</th>
                                        <th>Kecamatan</th>
                                        <th>Kelurahan/Desa</th>
                                        <th>Nama Peminjam</th>
                                        <th>Nama Petugas</th>
                                        <th>Status</th>
                                        <th>Tgl Peminjaman</th>
                                        <th>Tgl Pengembalian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataCari as $key => $data)
                                        <tr>
                                            <td rowspan="{{ $data->isiRincian->count() }}"> {{ $loop->iteration }}</td>
                                            @php
                                                $dataRincian = \App\RincianTransaksi::where([['transaksi_id', '=', $data->id_booking]])->first();
                                            @endphp
                                            <td>{{ $dataRincian->isiInventory->nomor }}</td>
                                            <td>{{ $dataRincian->isiInventory->isiJenis->nama_jenis_hak }}</td>
                                            <td>{{ $dataRincian->isiInventory->isiKecamatan->nama }}</td>
                                            <td>{{ $dataRincian->isiInventory->isiKelurahan->nama }}</td>
                                            <td> {{ $data->isiPenyewa->nama_penyewa }}</td>
                                            <td> {{ $data->isiPetugas->name }}</td>
                                            <td class="project-state">
                                                @if ($dataRincian->isiInventory->status === 'Tersedia')
                                                    <li style="list-style-type: none;"><span
                                                            class="badge badge-success">Dikembalikan</span></li>

                                                @else
                                                    <li style="list-style-type: none;"> <span
                                                            class="badge badge-primary">{{ $dataRincian->isiInventory->status }}</span>
                                                    </li>
                                                @endif
                                            </td>
                                            <td>{{ date('d-m-Y', strtotime($data->tanggal_ambil_berkas)) }}</td>
                                            <td>
                                                @if ($dataRincian->tanggal_pengembalian_berkas != null)
                                                    {{ date('d-m-Y', strtotime($dataRincian->tanggal_pengembalian_berkas)) }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                        @foreach ($data->isiRincian->where('id', '!=', $dataRincian->id) as $row)
                                            <tr>
                                                <td>{{ $row->isiInventory->nomor }}</td>
                                                <td>{{ $row->isiInventory->isiJenis->nama_jenis_hak }}</td>
                                                <td>{{ $row->isiInventory->isiKecamatan->nama }}</td>
                                                <td>{{ $row->isiInventory->isiKelurahan->nama }}</td>
                                                <td> {{ $data->isiPenyewa->nama_penyewa }}</td>
                                                <td> {{ $data->isiPetugas->name }}</td>
                                                <td class="project-state">
                                                    @if ($row->isiInventory->status === 'Tersedia')
                                                        <li style="list-style-type: none;"><span
                                                                class="badge badge-success">Dikembalikan</span></li>

                                                    @else
                                                        <li style="list-style-type: none;"> <span
                                                                class="badge badge-primary">{{ $row->isiInventory->status }}</span>
                                                        </li>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ date('d-m-Y', strtotime($data->tanggal_ambil_berkas)) }}
                                                </td>
                                                <td>
                                                    @if ($row->tanggal_pengembalian_berkas != null)
                                                        {{ date('d-m-Y', strtotime($row->tanggal_pengembalian_berkas)) }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        <div class="modal fade right" id="modalhapus{{ $data->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <form action="/e-peminjamans/Laporan/Transaksi/Hapus/{{ $data->id }}"
                                                method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <div class="modal-dialog modal-notify modal-danger" role="document">
                                                    <!--Content-->
                                                    <div class="modal-content">
                                                        <!--Header-->
                                                        <div class="modal-header">
                                                            <p class="heading">Hapus Anggota</p>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true"
                                                                    class="white-text">&times;</span>
                                                            </button>
                                                        </div>
                                                        <!--Body-->
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <p></p>
                                                                    <p class="text-center"><i
                                                                            class="fas fa-trash fa-4x"></i>
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
                                                                data-dismiss="modal">No,
                                                                thanks</a>
                                                        </div>
                                                    </div>
                                                    <!--/.Content-->
                                            </form>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
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
            jQuery('select[name="kelurahan"]').on('change', function() {
                var kelurahanID = jQuery(this).val();
                if (kelurahanID) {
                    jQuery.ajax({
                        url: '/e-peminjamans/dataKec/' + kelurahanID,
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
            $('.select2').select2()
        });

        $(function() {
            $("#contoh1").DataTable({
                "responsive": false,
                "lengthChange": false,
                "autoWidth": true,
                "buttons": ["excel", "print"]
            }).buttons().container().appendTo('#contoh1_wrapper .col-md-6:eq(0)');
            $('#contoh2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>
@endsection
