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
                            <li class="breadcrumb-item"><a href="/e-peminjamans">Home</a></li>
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
                                    <form action="/e-peminjamans/Laporan/DataTransaksi" method="POST">
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
                                                <div class="form-group">
                                                    <label>Kelurahan</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-file-alt"></i>
                                                            </span>
                                                        </div>

                                                        <select class="form-control select2 " name="kelurahan_desa"
                                                            style="width:300px">
                                                            <option selected="selected" value="">-Kelurahan-</option>
                                                            @foreach ($kelurahan as $value)
                                                                <option value="{{ $value->id }}">{{ $value->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Kecamatan</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-hdd"></i>
                                                            </span>
                                                        </div>

                                                        <select class="form-control select2 " name="kecamatan"
                                                            style="width:300px">
                                                            <option value="">Kecamatan</option>
                                                        </select>
                                                    </div>
                                                </div>
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
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-responsive">
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
                        url: 'datasKec/' + kelurahanID,
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
        $(document).ready(function() {
            var data = <?php echo json_encode($jsonObj); ?>;
            // var data = [
            //     ['subgroupN', 'Group1', 'sub-subgroupN', 'ElementN', '2Element N'],
            //     ['subgroup1', 'Group2', 'sub-subgroup1', 'Element1', '2Element 1'],
            //     ['subgroup2', 'Group2', 'sub-subgroup1', 'Element1', '2Element 1'],
            //     ['subgroup2', 'Group2', 'sub-subgroup1', 'Element2', '2Element 2'],
            //     ['subgroup2', 'Group2', 'sub-subgroup2', 'Element3', '2Element 2'],
            //     ['subgroup2', 'Group2', 'sub-subgroup2', 'Element4', '2Element 4'],
            //     ['subgroup2', 'Group2', 'sub-subgroup2', 'Element2', '2Element 2'],
            //     ['subgroup3', 'Group1', 'sub-subgroup1', 'Element1', '2Element 1'],
            //     ['subgroup3', 'Group1', 'sub-subgroup1', 'Element1', '2Element 1'],
            //     ['subgroup2', 'Group2', 'sub-subgroup2', 'Element1', '2Element 1'],
            //     ['subgroup4', 'Group2', 'sub-subgroup2', 'Element1', '2Element 1'],
            //     ['subgroup4', 'Group2', 'sub-subgroup3', 'Element10', '2Element 17'],
            //     ['subgroup4', 'Group2', 'sub-subgroup3', 'Element231', '2Element 211'],

            // ];
            var table = $('#example').DataTable({
                responsive: false,
                lengthChange: false,
                autoWidth: true,
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                fixedHeader: true,
                autoWidth: true,
                pageLength: 25,

                dom: 'Bfrtip',


                buttons: [{
                        extend: 'excel',
                        title: 'Data Transaksi E-ARSIP'
                    },
                    {
                        extend: 'print',
                        title: 'Data Transaksi E-ARSIP'
                    },
                ],
                columns: [{
                        name: 'pertama',
                        title: 'Transaction ID',
                    },
                    {

                        title: 'Nomor',
                        // name: 'second',
                        // title: 'Second group [order first]',
                    },
                    {
                        title: 'Jenis',
                        // title: 'Third group',
                    },
                    {
                        title: 'Kecamatan',
                        // title: 'Forth ungrouped',
                    },
                    {
                        title: 'Kelurahan',
                        // title: 'Fifth ungrouped',
                    },
                    {
                        title: 'Nama Peminjam',
                        // title: 'Fifth ungrouped',
                    },
                    {
                        title: 'Nama Petugas',
                        // title: 'Fifth ungrouped',
                    },
                    {
                        title: 'Status',
                        // title: 'Fifth ungrouped',
                    },
                    {
                        title: 'Tanggal Peminjaman',
                        // title: 'Fifth ungrouped',
                    },
                    {
                        title: 'Tanggal Pengembalian',
                        // title: 'Fifth ungrouped',
                    },
                ],
                data: data,
                rowsGroup: [ // Always the array (!) of the column-selectors in specified order to which rows groupping is applied
                    // (column-selector could be any of specified in https://datatables.net/reference/type/column-selector)
                    'pertama:name',
                    1,
                    2,
                    {
                        title: 'Status',
                        // title: 'Fifth ungrouped',
                    },
                ],
                pageLength: '20',
            });
        });



        $(function() {
            $('.select2').select2()
        });
        //     $('#reservationdate').datetimepicker({
        //     format: 'L'
        // });
        // $('#reservationdate2').datetimepicker({
        //     format: 'L'
        // });
        // $('#reservation').daterangepicker({

        //   locale: {
        //     format: 'DD/MM/YYYY'
        //   }
        // });
        //Date range picker with time picker
        // $('#reservationtime').daterangepicker({
        //   timePicker: true,
        //   timePickerIncrement: 30,
        //   locale: {
        //     format: 'MM/DD/YYYY hh:mm A'
        //   }
        // })
        // //Date range as a button
        // $('#daterange-btn').daterangepicker(
        //   {
        //     ranges   : {
        //       'Today'       : [moment(), moment()],
        //       'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        //       'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        //       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        //       'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        //       'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        //     },
        //     startDate: moment().subtract(29, 'days'),
        //     endDate  : moment()
        //   },
        //   function (start, end) {
        //     $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        //   }
        // )
    </script>
@endsection
