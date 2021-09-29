@extends('layouts.app')

@section('content')




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Peminjaman Berkas</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Peminjaman Berkas</li>
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
                        <a href="{{ route('pinjam.create') }}" class="btn btn-primary btn-rounded btn-fw"><i
                                class="icon-nav fa fa-plus"></i>&nbsp; Tambah Data</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Boking</th>
                                    <th>Nama Berkas</th>
                                    <th>Nama Anggota</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Status</th>
                                    @if (auth()->user()->role == 'admin')
                                        <th width="175" style="text-align:center">Aksi</th>
                                    @endif
                                    {{-- <th width="75"></th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataPinjam as $row)
                                    <tr>
                                        <td>{{ $row->id_booking }}</td>
                                        <td>
                                            @if ($row->isiBerkas != null)
                                                {{ $row->isiBerkas->nama_berkas }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($row->isiPenyewa != null)
                                                {{ $row->isiPenyewa->nama_penyewa }}
                                            @endif
                                        </td>
                                        <td>{{ $row->tanggal_ambil_berkas }}</td>
                                        <td>{{ $row->tanggal_kembali_berkas }}</td>
                                        <td class="project-state">
                                            @if ($row->status_pinjam === 'Booking')
                                                <span class="badge badge-dark">{{ $row->status_pinjam }}</span>

                                            @else
                                                <span class="badge badge-danger">{{ $row->status_pinjam }}</span>
                                            @endif


                                        </td>
                                        @if (auth()->user()->role == 'admin')
                                            <td>
                                                {{-- <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#modalDetailBerkas">
                                            <i class="fas fa-edit">Detail Berkas</i>
                                            </button> --}}
                                                <a class="btn btn-app" data-toggle="modal" data-target="#modalDetailBerkas">
                                                    <i class="fas fa-edit"></i> Detail Berkas
                                                </a>
                                                {{-- <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#modal-default">
                                            <i class="fas fa-edit">Verifikasi</i>
                                        </button> --}}
                                                <a class="btn btn-app" data-toggle="modal" data-target="#modal-default">
                                                    <i class="fas fa-edit"></i> Verifikasi
                                                </a>

                                            </td>
                                        @endif
                                        {{-- <td><a href="" class="btn btn-danger" data-toggle="modal"
                                                data-target="#modalhapus"><i
                                                    class="icon-nav fa fa-trash"> Hapus</i></a></td> --}}
                                    </tr>
                                    <div class="modal fade" id="modalDetailBerkas">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Data Berkas</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">

                                                    <div class="row">
                                                        <div class="col-4">
                                                            <label for="exampleInputPassword1">Kode Booking</label>
                                                            <p>{{ $row->id_booking }}</p>
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="exampleInputPassword1">Nomor Berkas</label>
                                                            <p>{{ $row->isiBerkas->nomor_berkas }}</p>
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="exampleInputPassword1">Nama Berkas</label>
                                                            <p>{{ $row->isiBerkas->nama_berkas }}</p>
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="exampleInputPassword1">Nama Ruangan</label>
                                                            <p>{{ $row->isiBerkas->isiRak->isiLemari->isiRuangan->nama_ruangan }}
                                                            </p>
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="exampleInputPassword1">Nama Lemari</label>
                                                            <p>{{ $row->isiBerkas->isiRak->isiLemari->nama_lemari }}</p>
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="exampleInputPassword1">Nama Rak</label>
                                                            <p>{{ $row->isiBerkas->isiRak->nama_rak }}</p>
                                                        </div>
                                                    </div>

                                                    {{-- <input type="hidden" name="id" value="{{ $row->id }}"> --}}
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Tutup</button>
                                                    {{-- <button type="submit" class="btn btn-primary">Ya</button> --}}
                                                </div>

                                            </div>
                                            <!-- /.modal-content -->
                                        </div>

                                        <!-- /.modal-dialog -->
                                    </div>
                                    <div class="modal fade" id="modal-default">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Yakin Pinjam Berkas</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form role="form" method="POST" action="/updatePinjam">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <label>Berkas Berkas Sudah Di serahkan</label>
                                                        <input type="hidden" name="id" value="{{ $row->id }}">
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Tidak</button>
                                                        <button type="submit" class="btn btn-primary">Ya</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>

                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                    <!-- Central Modal Danger Demo-->

                            </tbody>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </section>
    </div>


@endsection

@section('bawah')

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('adminlte/dist/js/pages/dashboard.js') }}"></script>
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
        var ctxB = document.getElementById("barChart").getContext('2d');
        var myBarChart = new Chart(ctxB, {
            type: 'bar',
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        $(function() {
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Initialize Select2 Elements
            $('.select2').select2()

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                        'MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            });

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });

        })
    </script>
@endsection
