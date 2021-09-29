
@extends('layouts.app')

@section('content')

        <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Transaksi Pengembalian</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="/e-peminjamans">Home</a></li>
                                    <li class="breadcrumb-item active">Transaksi Pengembalian</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Berkas Sedang Dipinjam</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Hak</th>
                                        <th>Nomor Berkas</th>
                                        <th>Kelurahan/Desa</th>
                                        <th>Kecamatan</th>
                                        <th>Nama Peminjam</th>
                                        <th>Status</th>
                                        <th>Tgl Peminjaman</th>
                                        <th>Tgl Deadline Pengembalian</th>
                                        <th>Hari</th>
                                            <th style="text-align:center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jsonObj as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @php 
                                                $dataInventory =  \App\RincianTransaksi::where([
                                                ['transaksi_id', '=', $data['id_booking']],
                                                ])->get();
                                                @endphp
                                                @foreach ($dataInventory as $datas)
                                                <li style="list-style-type: none;">{{ $datas->isiInventory->isiJenis->nama_jenis_hak }}</li>
                                                @endforeach
                                            </td>
                                            <td>
                                                @php 
                                                $dataInventory =  \App\RincianTransaksi::where([
                                                ['transaksi_id', '=', $data['id_booking']],
                                                ])->get();
                                                @endphp
                                                @foreach ($dataInventory as $row)
                                                <li style="list-style-type: none;">{{ $row->isiInventory->nomor }}</li>
                                                @endforeach
                                            </td>
                                            <td>
                                                @php 
                                                $dataInventory =  \App\RincianTransaksi::where([
                                                ['transaksi_id', '=', $data['id_booking']],
                                                ])->get();
                                                @endphp
                                                @foreach ($dataInventory as $datam)
                                                <li style="list-style-type: none;">{{ $datam->isiInventory->isiKelurahan->nama }}</li>
                                                @endforeach
                                            </td>
                                            <td>
                                                @php 
                                                $dataInventory =  \App\RincianTransaksi::where([
                                                ['transaksi_id', '=', $data['id_booking']],
                                                ])->get();
                                                @endphp
                                                 @foreach ($dataInventory as $datak)
                                                 <li style="list-style-type: none;">{{ $datak->isiInventory->isiKecamatan->nama }}</li>
                                                 @endforeach
                                            </td>
    
                                            <td>
                                                {{ $data['nama_peminjam'] }}
                                                {{-- @if ($data->isiPenyewa != null)
                                                    {{ $data->isiPenyewa}}
                                                @endif --}}
                                            </td>
    
                                            {{-- <td class="project-state">
                                                @if ($data['status_pinjam'] === 'Pinjam')
                                                    <span class="badge badge-primary">{{ $data['status_pinjam'] }}</span>
    
                                                @else
                                                    <span class="badge badge-danger">{{ $data['status_pinjam'] }}</span>
                                                @endif
                                            </td> --}}
                                            <td class="project-state">
                                                @php 
                                                $datastatus =  \App\RincianTransaksi::where([
                                                ['transaksi_id', '=', $data['id_booking']],
                                                ])->get();
                                                @endphp
                                                @foreach ($datastatus as $datastatus)
                                                @if ($datastatus->isiInventory->status === 'Tersedia')
                                                <li style="list-style-type: none;"><span class="badge badge-success">Dikembalikan</span></li>
                            
                                                @else
                                                <li style="list-style-type: none;"> <span class="badge badge-primary">{{ $datastatus->isiInventory->status }}</span>
                                                </li>
                                                @endif
                                                @endforeach
                                              </td>

                                            <td>{{date('d-m-Y', strtotime($data['tanggal_ambil'])) }}</td>
                                            
                                            {{-- <td>{{ $data['tanggal_kembali'] }}</td> --}}
                                            <td>{{date('d-m-Y', strtotime($data['tanggal_kembali'])) }}</td>
                                            
                                            <td>
                                                {{ $data['tanggal_reminder'] }}
                                            </td>
                                            
                                                <td>
                                                    {{-- <a class="btn btn-app" data-toggle="modal"
                                            data-target="#modal-default">
                                                            <i class="fas fa-edit"></i>Berkas Sudah Dikembalikan
                                                          </a>
                                                    <a href="/detailTransaksi/{{ $data->id_booking }}" class="btn btn-app"
                                                        style="color:black">
                                                        <i class="fa fa-eye"></i>Detail Berkas</a>
                                                    <button type="button" class="btn btn-app bg-gradient-primary btn-sm
                                            " data-toggle="modal"
                                                data-target="#modal-default">kembalikan
                                                <i class="fas fa-edit">Sudah Dikembalikan</i>
                                            </button>
                                                    <a href="/Kembalikan/{{ $data->id_booking }}" class="btn btn-app"
                                                        style="color:black">
                                                        <i class="fa fa-book"></i>Kembalikan
                                                    </a> --}}
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                            Pilihan
                                                          </button>
                                                          <div class="dropdown-menu">
                                                            {{-- <a class="dropdown-item" href="/detailTransaksi/{{ $data->id_booking }}" >
                                                                Detail Berkas</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="/Kembalikan/{{ $data->id_booking }}" >
                                                                Kembalikan</a> --}}
                                                                {{-- <a class="dropdown-item" href="/detailInventory/{{ $data['id_booking'] }}" >
                                                                    Detail Berkas</a>
                                                                <div class="dropdown-divider"></div> --}}
                                                                <a class="dropdown-item" href="/e-peminjamans/PengembalianInventory/{{ $data['id_booking'] }}" >
                                                                    Kembalikan</a>
                                                          </div>
                                                        </div>
                                                      </div>
                                                </td>
                                            
                                        </tr>
    
    
                                        <!-- /.modal-dialog -->
                        </div>
                        <div class="modal fade" id="modal-default">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Yakin Pinjam Berkas</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form role="form" method="POST" action="/">
                                        @csrf
                                        <div class="modal-body">
                                            <label>Kembalikan Berkas Sudah Dipinjam</label>
                                            <input type="hidden" name="id" value="{{ $data['id'] }}">
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
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
                        @endforeach
                        </tbody>
    
                        </table>

                        </div>
                        
                </div>
                <!-- /.card-body -->
            </div>
    </div>
    </section>

    <!-- /.row (main row) -->
    </div>
    </section>
    <!-- /.content -->
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
