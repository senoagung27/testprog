@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Detail Berkas</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Tambah Berkas</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="card card-primary">
                <h5 class="card-header">Detail Berkas</h5>
                <div class="card-body">
                    @foreach ($datas as $data)
                  <div class="row">
                    <div class="col-3">
                        <label for="exampleInputPassword1">Nomor Berkas</label>
                        <p>{{ $data->nomor_berkas }}</p>
                    </div>
                    <div class="col-3">
                        <label for="exampleInputPassword1">Nama Berkas</label>
                        <p>{{ $data->nama_berkas }}</p>
                    </div>
                    <div class="col-3">
                        <label for="exampleInputPassword1">Nama Ruangan</label>
                        <p>{{ $data->isiRak->isiLemari->isiRuangan->nama_ruangan }}t</p>
                    </div>
                    <div class="col-3">
                        <label for="exampleInputPassword1">Nama lemari</label>
                        <p>{{ $data->isiRak->isiLemari->nama_lemari }}</p>
                    </div>
                    <div class="col-3">
                        <label for="exampleInputPassword1">Nama Rak</label>
                        <p>{{ $data->isiRak->nama_rak }}</p>
                    </div>
                    <div class="col-3">
                        <label for="exampleInputPassword1">Nama Pemegang Hak</label>
                        <p>{{ $data->nama_pemegang_hak}}</p>
                    </div>
                    <div class="col-3">
                        <label for="exampleInputPassword1">Tanggal Lahir</label>
                        <p>{{ $data->tanggal_lahir}}</p>
                    </div>
                    <div class="col-3">
                        <label for="exampleInputPassword1">No Hak Milik</label>
                        <p>{{ $data->no_hak_milik}}</p>
                    </div>
                    <div class="col-3">
                        <label for="exampleInputPassword1">Kelurahan</label>
                        <p>{{ $data->kelurahan}}</p>
                    </div>
                    <div class="col-3">
                        <label for="exampleInputPassword1">NIB</label>
                        <p>{{ $data->nib}}</p>
                    </div>
                    <div class="col-3">
                        <label for="exampleInputPassword1">Letak Tanah</label>
                        <p>{{ $data->letak_tanah}}</p>
                    </div>
                    <div class="col-3">
                        <label for="exampleInputPassword1">Daftar Isian 202</label>
                        <p>{{ $data->daftar_isian_202}}</p>
                    </div>
                    <div class="col-3">
                        <label for="exampleInputPassword1">Surat Ukur</label>
                        <p>{{ $data->surat_ukur}}</p>
                    </div>
                    <div class="col-3">
                        <label for="exampleInputPassword1">Tanggal</label>
                        <p>{{ $data->tanggal}}</p>
                    </div>
                    <div class="col-3">
                        <label for="exampleInputPassword1">Nomor</label>
                        <p>{{ $data->nomor}}</p>
                    </div>
                    <div class="col-3">
                        <label for="exampleInputPassword1">Luas</label>
                        <p>{{ $data->luas}}</p>
                    </div>
                    <div class="col-3">
                        <label for="exampleInputPassword1">Status Pinjam</label>
                        <p>{{ $data->status_pinjam}}</p>
                    </div>
                    <div class="col-3">
                        <label for="exampleInputPassword1">Keterangan</label>
                        <p>{{ $data->keterangan}}</p>
                    </div>
                </div>
                @endforeach
                </div>
                <div class="card-footer">
                    <a href="/editBerkas/{{ $data->id }}" class="btn btn-success">
                        <i class="fas fa-edit"></i> Edit</a>
                    {{-- <button type="submit" class="btn btn-primary">Edit</button> --}}
                    <a href="/Berkas" class="btn btn-success fa-pull-right">Back</a>
                </div>
              </div>
              
    </div>
    </section>
    </div>





@endsection
