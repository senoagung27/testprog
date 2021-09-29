@extends('layouts.app')

@section('content')




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Laporan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Laporan</li>
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
                    
                    <div class="card-header d-flex p-0">
                        <a href="/Laporan" class="d-flex ml-3">
                            <img src="{{ asset('adminlte/dist/img/left-arrow.svg') }}" alt="" width="30">
                       </a>
                        
                        <h3 class="card-title p-3">Laporan Berkas</h3>
                        
                    </div><!-- /.card-header -->
                    <!-- /.card-header -->
                   
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                
                                <a href="#" class="btn btn-primary"
                                            data-toggle="modal" data-target="#modalfilterberkas">
                                           
                                             <i class="icon-nav fa fa-filter"> Filter Data</i></a>
                                              {{-- <a href="/filterberkas/cetak_pdf" class="btn btn-app bg-danger float-right">
                                               <i class="fas fa-file-pdf"></i> PDF
                                              </a> --}}


                                              {{-- <form id="pdf-form" action="/filterberkas/cetak_pdf" method="POST" style="display: none;">
                                                  @csrf
                                                  <input type="hidden" name="dari" value="{{ $dari}}">
                                                  <input type="hidden" name="ke" value="{{ $ke}}">
                                              </form> --}}
                                             
                                                {{-- <a href="/filterberkas/export_excel" class="btn btn-app bg-success float-right"  onclick="event.preventDefault();
                                                document.getElementById('excel-form').submit();">
                                                 <i class="fas fa-file-excel"></i> EXCEL
                                                </a> --}}


                                                {{-- <form id="excel-form" action="/filterberkas/export_excel" method="POST" style="display: none;">
                                                    @csrf
                                                    <input type="hidden" name="dari" value="{{ $dari}}">
                                                    <input type="hidden" name="ke" value="{{ $ke}}">
                                                </form>  --}}
                               
                            </div>
                          </div>
                          <table id="contoh1" class="table table-bordered table-striped">
                            <thead> 
                                <tr>
                                    <th>No</th>
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
                                    @foreach ($dataBerkas as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->isiJenis->nama_jenis_hak }}</td>
                                            <td>{{ $data->nomor }}</td>
                                            <td>{{ $data->isiKecamatan->name }}</td>
                                            <td>{{ $data->isiKelurahan->name }}</td>
                                            {{-- <td>{{ $data->status }}</td> --}}
                                            <td class="project-state">
                                                @if ($data->status === 'Tersedia')
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
                                        </tr>
                                   

                                    <div class="modal fade right" id="modalfilterberkas" tabindex="-1"
                                        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <form action="" method="POST">
                                            @csrf
                                            {{-- {{ method_field('DELETE') }} --}}
                                            <div class="modal-dialog modal-notify modal-danger" role="document">
                                                <!--Content-->
                                                <div class="modal-content">
                                                    <!--Header-->
                                                    <div class="modal-header">
                                                        <p class="heading">Filter Data</p>
    
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true" class="white-text">&times;</span>
                                                        </button>
                                                    </div>
                                                    <!--Body-->
                                                    <div class="modal-body">
    
                                                        <div class="row">
    
                                                            <div class="col-9">
                                                                <label>Dari Tanggal</label>
                                                                <div class="input-group">
                                                                  <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                      <i class="far fa-calendar"></i>
                                                                    </span>
                                                                  </div>
                                                                  <input type="date" name="dari" class="form-control float-right" id="reservation">
                                                              </div>
                                                                <h2><span class="badge"></span></h2>
                                                            </div>
                                                            
                                                            <div class="col-9">
                                                                <label>Tanggal Kembali Berkas</label>
                                                                <div class="input-group">
                                                                  <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                      <i class="far fa-calendar"></i>
                                                                    </span>
                                                                  </div>
                                                                  <input type="date" name="create" class="form-control float-right" id="reservation">
                                                              </div>
                                                                <h2><span class="badge"></span></h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Footer-->
                                                    <div class="modal-footer justify-content-center">
                                                        <button type="submit" class="btn btn-danger" style="color:white">Filter
                                                            Data <i class="fas fa-times-circle  ml-1"></i></button>
                                                        <a type="button" class="btn btn-outline-danger waves-effect"
                                                            data-dismiss="modal">No, thanks</a>
                                                    </div>
                                                </div>
                                                <!--/.Content-->
                                        </form>
                                    </div>

                                    <!-- Central Modal Danger Demo-->
                                    {{-- <div class="modal fade right" id="modalfilterberkas" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-notify modal-danger" role="document">
                                            <!--Content-->
                                            <div class="modal-content">
                                                <!--Header-->
                                                <div class="modal-header">
                                                    <p class="heading">Filter Data Berkas</p>

                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true" class="white-text">&times;</span>
                                                    </button>
                                                </div>

                                                <!--Body-->
                                                <div class="modal-body">
                                                      <div class="form-group">
                                                        <label>Date range:</label>
                                      
                                                        <div class="input-group">
                                                          <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                              <i class="far fa-calendar-alt"></i>
                                                            </span>
                                                          </div>
                                                          <input type="text" class="form-control float-right" id="reservation">
                                                        </div>
                                                        <!-- /.input group -->
                                                      </div>

                                                    
                                                </div>

                                                <!--Footer-->
                                                <div class="modal-footer justify-content-center">
                                                    <a type="button" class="btn btn-danger" style="color:white">Summit
                                                        Data <i class="fas fa-times-circle  ml-1"></i></a>
                                                    <a type="button" class="btn btn-outline-danger waves-effect"
                                                        data-dismiss="modal">No, thanks</a>
                                                </div>
                                            </div>
                                            <!--/.Content-->
                                        </div>
                                    </div> --}}
                                    @endforeach
                                </tbody>
                            </table>
                        <!-- /.card-body -->
                    </div>
                </div>
        </div>
        </section>
        </div>




    @endsection
@section('bawah')

    <script>
        // $(function() {
        //     $("#example1").DataTable();
        //     $("#example2").DataTable();
        //     $("#example3").DataTable();
        //     $('#example4').DataTable({
        //         "paging": true,
        //         "lengthChange": true,
        //         "searching": true,
        //         "ordering": true,
        //         "info": true,
        //         "autoWidth": true,
        //     });
        // });
        $(function () {
    $("#contoh1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["pdf","excel", "print"]
    }).buttons().container().appendTo('#contoh1_wrapper .col-md-6:eq(0)');
    $('#contoh2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
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
