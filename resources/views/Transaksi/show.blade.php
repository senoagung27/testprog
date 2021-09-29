@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Detail Transaksi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Detail Transaksi</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="card card-primary">
                <h5 class="card-header">Detail Transaksi</h5>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Buku Tanah</th>
                                <th>Nama Buku Tanah</th>
                                <th>No Berkas</th>
                                <th>Nama Berkas</th>
                                <th>Tipe Hak Buku Tanah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->isiBerkas->no_buku_tanah }} </td>
                                    <td>{{ $data->isiBerkas->nama_buku_tanah }} </td>
                                    <td>{{ $data->isiBerkas->nomor_berkas }}</td>
                                    <td>{{ $data->isiBerkas->nama_berkas }} </td>
                                    <td>{{ $data->isiBerkas->tipe_hak_buku_tanah }}</td>
                                    <td>
                                        {{-- <a href="/detailTransaksi/{{ $data->id }}" class="btn btn-primary">
                                        <i class="fa fa-eye"></i> Detail</a> --}}
                                        <a class="btn btn-app"  data-toggle="modal"
                                        data-target="#modalDetailBerkas{{ $data->berkas_id }}">
                                        <i class="fa fa-building" ></i>Detail Berkas
                                      </a>
                                    </td>
                                    {{-- <td>
                                        <a href="/detailTranskasi/{{ $row->id }}" class="btn btn-success"><i
                                                class="fas fa-edit"></i> Detail</a>
                                        <a href="/hapusTransaksi/{{ $row->id }}" class="btn btn-danger" data-toggle="modal"
                                            data-target="#modalhapus{{ $row->id }}"><i class="icon-nav fa fa-trash"> Hapus</i></a>
                                    </td> --}}
                                </tr>
                                <div class="modal fade" id="modalDetailBerkas{{ $data->berkas_id }}">
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
                                                        <label for="exampleInputPassword1">Kode Transaksi</label>
                                                        <p>{{ $data->transaksi_id }}</p>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="exampleInputPassword1">Nomor Berkas</label>
                                                        <p>{{ $data->isiBerkas->nomor_berkas }}</p>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="exampleInputPassword1">Nama Berkas</label>
                                                        <p>{{ $data->isiBerkas->nama_berkas }}</p>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="exampleInputPassword1">Nama Ruangan</label>
                                                        <p>{{ $data->nama_ruangan }}
                                                        </p>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="exampleInputPassword1">Nama Lemari</label>
                                                        <p>{{ $data->nama_lemari }}
                                                        </p>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="exampleInputPassword1">Nama Rak</label>
                                                        <p>{{ $data->nama_rak }}</p>
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


                                <!-- Central Modal Danger Demo-->
                                <div class="modal fade right" id="modalhapus{{ $data->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <form action="/hapusTransaksi/{{ $data->id }}" method="POST">
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
                                                            <h2><span class="badge">{{ $data->nama_berkas }}</span>
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Footer-->
                                                <div class="modal-footer justify-content-center">
                                                    <button type="submit" class="btn btn-danger"
                                                        style="color:white">Hapus
                                                        Data <i class="fas fa-times-circle  ml-1"></i></button>
                                                    <a type="button" class="btn btn-outline-danger waves-effect"
                                                        data-dismiss="modal">No, thanks</a>
                                                </div>
                                            </div>
                                            <!--/.Content-->
                                    </form>
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
                <div class="card-footer">
                    {{-- <a href="/editBerkas/{{ $data->id }}" class="btn btn-success">
                        <i class="fas fa-edit"></i> Edit</a> --}}
                    {{-- <button type="submit" class="btn btn-primary">Edit</button> --}}
                    {{-- <a href="/Transaksi" class="btn btn-success fa-pull-right">Back</a> --}}
                </div>
              </div>
              
    </div>
    </section>
    </div>





@endsection
