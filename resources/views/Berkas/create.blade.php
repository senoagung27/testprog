@extends('layouts.app')

@section('content')




    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                            <span>
                                <a href="/Berkas" style="margin-right: 5px;">
                                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                                </a>
                            </span>
                            Tambah Berkas
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/Berkas">Berkas</a></li>
                            <li class="breadcrumb-item active">Tambah Berkas</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Berkas</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="/Simpanberkas">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="kode_booking">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Nama Berkas</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-book"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="nama_berkas" class="form-control float-right"
                                                id="reservation" placeholder="Nama Berkas">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>No Berkas</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-list-ol"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="nomor_berkas" class="form-control float-right"
                                                id="reservation" placeholder="No Berkas">
                                        </div>
                                    </div>
                                </div>
                            </div><!-- </div row>  -->
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Penyimpanan Ruangan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-door-closed"></i>
                                                </span>
                                            </div>
                                            <select class="custom-select" name="rak_id" required>
                                                <option value="">-Pilihan-</option>
                                                @foreach ($prov as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Penyimpanan Lemari</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-hdd"></i>
                                                </span>
                                            </div>
                                            <select name="city" class="custom-select">
                                                <option value="">Pilih Lemari</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Penyimpanan Rak</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-folder"></i>
                                                </span>
                                            </div>
                                            <select name="district" class="custom-select">
                                                <option value="">Pilih Rak</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- </div row>  -->
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Nama Pemegang hak</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-id-card"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="nama_pemegang_hak" class="form-control float-right"
                                                id="reservation" placeholder="Nama Pemegang Hak">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-calendar"></i>
                                                </span>
                                            </div>
                                            <input type="date" name="tanggal_lahir" class="form-control float-right"
                                                id="reservation" placeholder="Tanggal Lahir">
                                        </div>
                                    </div>
                                </div>
                            </div><!-- </div row>  -->
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>No Hak Milik</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-list-ol"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="no_hak_milik" class="form-control float-right"
                                                id="reservation" placeholder="No Hak Milik">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Kelurahan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-home"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="kelurahan" class="form-control float-right"
                                                id="reservation" placeholder="Desa">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>NIB</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-list-ol"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="nib" class="form-control float-right" id="reservation"
                                                placeholder="NIB">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Letak Tanah</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-briefcase"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="letak_tanah" class="form-control float-right"
                                                id="reservation" placeholder="Letak Tanah">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Daftar Isian 202</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-briefcase"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="daftar_isian_202" class="form-control float-right"
                                                id="reservation" placeholder="Daftar Isian 202">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Surat Ukur</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-building"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="surat_ukur" class="form-control float-right"
                                                id="reservation" placeholder="Surat Ukur">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-calendar"></i>
                                                </span>
                                            </div>
                                            <input type="date" name="tanggal" class="form-control float-right"
                                                id="reservation" placeholder="Tanggal">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Nomor</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-list-ol"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="nomor" class="form-control float-right"
                                                id="reservation" placeholder="Nomor">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Luas</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-clipboard-list"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="luas" class="form-control float-right" id="reservation"
                                                placeholder="Luas">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-home"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="keterangan" class="form-control float-right"
                                                id="reservation" placeholder="Keterangan">
                                        </div>
                                    </div>
                                </div>
                            </div><!-- </div row>  -->
                        </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="btns float-right">
                        <button type="reset" class="btn btn-danger mr-2">Reset</button>
                        <button type="submit" class="btn btn-primary">Tambah Berkas</button>
                    </div>
                    <!-- <a href="/Berkas" class="btn btn-success fa-pull-right">Back</a> -->
                </div>
                </form>
            </div>
    </div>
    </div>
    </section>
    </div>
@endsection
