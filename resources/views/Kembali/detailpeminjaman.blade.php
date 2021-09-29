@extends('layouts.app')

@section('content')




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Detail Pengembalian Berkas</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/e-peminjamans">Home</a></li>
                            <li class="breadcrumb-item active">Detail Pengembalian Berkas</li>
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
                        {{-- <a href="{{ route('kembali.create') }}" class="btn btn-primary btn-rounded btn-fw"><i
                                class="icon-nav fa fa-plus"></i> Tambah Kembali Berkas</a> --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="/e-peminjamans/SimpanPengembalianInventory" method="post">
                            @csrf


                            <table id="example1" class="table table-bordered table-striped">
                                <thead>

                                    <tr>
                                        <th>No</th>
                                        <th>#</th>
                                        <th>Jenis</th>
                                        <th>Nomor</th>
                                        <th>Kecamatan</th>
                                        <th>Kelurahan/Desa</th>
                                        <th>Status</th>
                                        <th>Ruangan</th>
                                        <th>Lemari</th>
                                        <th>Rak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="checkbox">

                                                    <label>
                                                        <input type="checkbox" value="{{ $data->isiInventory->id }}"
                                                            name="ceklis[]">

                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ $data->isiInventory->isiJenis->nama_jenis_hak }}</td>
                                            <td>{{ $data->isiInventory->nomor }}</td>
                                            <td>{{ $data->isiInventory->isiKecamatan->nama }}</td>
                                            <td>{{ $data->isiInventory->isiKelurahan->nama }}</td>
                                            {{-- <td>{{ $data->status }}</td> --}}
                                            <td class="project-state">
                                                @if ($data->status === 'Tersedia')
                                                    <span
                                                        class="badge badge-success">{{ $data->isiInventory->status }}</span>

                                                @else
                                                    <span
                                                        class="badge badge-danger">{{ $data->isiInventory->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{-- @if ($data->status === 'Belum Terdaftar')
                                                    <button  data-toggle="modal" data-target="#modal-default{{ $data->id }}">
                                                        <i class="fa fa-building" aria-hidden="true"></i>
                                                        Input Rak 
                                                    </button>
                                                @else --}}
                                                {{ $data->isiInventory->isiRuangan->nama_ruangan }}
                                                {{-- @endif --}}
                                            </td>

                                            <td>
                                                {{-- @if ($data->status === 'Belum Terdaftar')
                                                    <button  data-toggle="modal" data-target="#modal-default{{ $data->id }}">
                                                        <i class="fa fa-building" aria-hidden="true"></i>
                                                        Input Rak 
                                                    </button>
                                                @else --}}
                                                {{ $data->isiInventory->isiLemari->nama_lemari }}
                                                {{-- @endif --}}
                                            </td>
                                            <td>
                                                {{-- @if ($data->status === 'Belum Terdaftar')
                                                    <button  data-toggle="modal" data-target="#modal-default{{ $data->id }}">
                                                        <i class="fa fa-building" aria-hidden="true"></i>
                                                        Input Rak 
                                                    </button>
                                                @else --}}
                                                {{ $data->isiInventory->isiRak->nama_rak }}
                                                {{-- @endif --}}
                                            </td>
                                            {{-- <td><a href="/editBerkas/{{ $row->id }}" class="btn btn-success">
                                                        <i class="fas fa-edit"></i> Edit</a></td> --}}

                                            {{-- <td><a href="/hapusTransaksiBaru/{{ $data->id }}" class="btn btn-danger"
                                                    data-toggle="modal" data-target="#modalhapus{{ $data->id }}"><i
                                                        class="icon-nav fa fa-trash"> Hapus</i></a></td> --}}
                                            {{-- <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="checkbox">

                                                    <label>
                                                        <input type="checkbox" value="{{ $data->berkas_id }}" name="ceklis[]">

                                                    </label>
                                                </div>
                                            </td>

                                            <td>{{ $data->isiBerkas->no_buku_tanah }} </td>
                                            <td>{{ $data->isiBerkas->nama_buku_tanah }} </td>
                                            <td>{{ $data->isiBerkas->nomor_berkas }}</td>
                                            <td>{{ $data->isiBerkas->nama_berkas }} </td>
                                            <td>{{ $data->isiBerkas->tipe_hak_buku_tanah }}</td>
                                            <td>

                                                <a class="btn btn-app" data-toggle="modal"
                                                    data-target="#modalDetailBerkas{{ $data->berkas_id }}">
                                                    <i class="fa fa-building"></i>Detail Berkas
                                                </a>
                                            </td>
                                            <td><a href="" class="btn btn-danger" data-toggle="modal"
                                                data-target="#modalhapus"><i
                                                    class="icon-nav fa fa-trash"> Hapus</i></a></td> --}}
                                        </tr>

                                        <div class="modal fade" id="modalDetailBerkas{{ $data->berkas_id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Pengembalian Berkas</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                            <label>Pengembalian Berkas</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                  <span class="input-group-text">
                                                                    <i class="far fa-calendar-alt"></i>
                                                                  </span>
                                                                </div>
                                                                <input type="date" name="tanggal_pengembalian_berkas" class="form-control float-right" id="reservation">
                                                              </div>
                                                        </div>
                                                       
                                                       
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Ya</button>
                                                    </div>

                                                </div>
                                                <!-- /.modal-content -->
                                            </div>

                                            <!-- /.modal-dialog -->
                                        </div>
                    </div>
                    </tbody>
                    @endforeach
                    </table>
                    <hr/>
                    {{-- <div class="callout callout-success ml-2"> --}}
                    {{-- <form role="form" method="POST" action="/SimpanTransaksiBaru"> --}}
                        {{-- @csrf --}}
                        {{-- <h5><i class="fas fa-clipboard-check"></i> Data Transaksi Peminjaman</h5> --}}
                        {{-- <h5>No Transaksi :<span> </span></h5> --}}
                        <input type="hidden" name="tanggal_pengembalian_berkas" class="form-control float-right" id="reservation" value="<?php echo date('Y-m-d'); ?>">

                      {{-- <div class="row">
                        <div class="col-3">
                           
                            <div class="form-group">
                                <label>Tanggal Kembali Berkas</label>
              
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="far fa-calendar-alt"></i>
                                    </span>
                                  </div>

                                </div>
                                <!-- /.input group -->
                              </div>
                        </div>
                        <div class="col-6">
                            <h5>Tanggal Kembali :<span> </span></h5>
                        </div>
                      
                      </div> --}}
                    </div>
                     
                    {{-- <div class="alert alert-light">
                        <h4 class="alert-heading">Data Transaksi Peminjaman</h4>
                        <h5>No Transaksi :<span> TR222222</span></h5>
                        <div class="row">
                            <div class="col-6">
                                <h5>Admin :<span> Tanpa Nama</span></h5>
                            </div>
                            <div class="col-6">
                                <h5>User Peminjam :<span> Kamu Siapa?</span></h5>
                            </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                            <h5>Tgl Pinjam :<span> Tanpa Nama</span></h5>
                        </div>
                        <div class="col-6">
                            <h5>Tanggal Kembali :<span> Tanpa Nama</span></h5>
                        </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="py-3">
                                <button type="submit" class="btn mb-3 mr-3 btn-success fa-pull-right">
                              <i class="fa fa-times-circle" aria-hidden="true">  Cancel</i></button>
                        <button type="submit" class="btn ml-3 btn-success fa-pull-left">
                            <i class="far fa-save"></i>  Simpan</button>
                            </div>
                            </div>
                        
                    </div>
                    {{-- </form> --}}
                
                    <!-- /.tab-pane -->
                
                </div>

                    {{-- <button type="submit" class="btn btn-primary" style="color:white">
                        <h5>Kembalikan</h5>
                    </button> --}}
                    </form>
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
            $('#example2').DataTable({
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
