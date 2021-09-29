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
                        url: 'dataKecamatan/' + kelurahanID,
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
    {{-- <script type="text/javascript">
      jQuery(document).ready(function ()
      {
              jQuery('select[name="village"]').on('change',function(){
                var villageID = jQuery(this).val();
                if(villageID)
                {
                    jQuery.ajax({
                      url : 'getDistrict/' +villageID,
                      type : "GET",
                      dataType : "json",
                      success:function(data)
                      {
                          console.log(data);
                          jQuery('select[name="district"]').empty();
                          $('select[name="district"]').append('<option>--- Kecamtan ---</option>');
                          jQuery.each(data, function(key,value){
                            $('select[name="district"]').append('<option value="'+ key +'">'+ value +'</option>');
                          });
                      }
                    });
                }
                else
                {
                    $('select[name="state"]').empty();
                }
              });
      });
      </script> --}}

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
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
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
                    2
                ],
                pageLength: '20',
            }).buttons().container().appendTo('#example .col-md-6:eq(0)');
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
