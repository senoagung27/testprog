@extends('layouts.app')

@section('content')




    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Berkas</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Edit Berkas</li>
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
                    <form role="form" method="POST" action="/SimpanEditBerkas">
                        @csrf
                        <input type="hidden" name="id" value="{{ $dataBerkas->id }}">
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="kode_booking" >
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Berkas</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-book"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="nama_berkas" class="form-control" value="{{ $dataBerkas->nama_berkas }}">   
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nomor Berkas</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-book"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="nomor_berkas" class="form-control"
                                            value="{{ $dataBerkas->nomor_berkas }}">   
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="col-12">
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
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Penyimpanan Lemari</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-hdd"></i>
                                                        </span>
                                                    </div>
                                                    <select name="city" class="custom-select"> 
                                                        <option value="">Pilih Lemari</option></select>
                                                </div>
                                            </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Penyimpanan Rak</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="fas fa-folder"></i>
                                                                </span>
                                                            </div>
                                                            <select name="district" class="custom-select"> 
                                                                <option value="">Pilih Rak</option></select>
                                                        </div>
                                                    </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Status</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="fas fa-door-closed"></i>
                                                                        </span>
                                                                    </div>
                                                                    <select class="custom-select" name="rak_id" required>
                                                                        <option value="">-Pilihan-</option>
                                                                        <option value="">{{ $dataBerkas->status_pinjam }}</option>                                        
                                                                      </select>
                                                                </div>
                                                            </div>
                                                                </div>
                                       
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Pemegang Hak</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-book"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="nama_pemegang_hak" class="form-control" 
                                            value="{{ $dataBerkas->nama_pemegang_hak }}">
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tanggal Lahir</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-book"></i>
                                                </span>
                                            </div>
                                            <input type="date" name="tanggal_lahir" class="form-control" 
                                            value="{{ $dataBerkas->tanggal_lahir }}">
                                        </div>
                                       
                                    </div>
                                </div>
                                        
                                <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">No Hak Milik</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-book"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="no_hak_milik" class="form-control" 
                                        value="{{ $dataBerkas->no_hak_milik }}">
                                    </div>
                                   
                                </div>
                             </div>
                             <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Kelurahan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-book"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="kelurahan" class="form-control" 
                                        value="{{ $dataBerkas->kelurahan }}">
                                    </div>
                                   
                                </div>
                              </div>
                                <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">NIB</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-book"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="nib" class="form-control" 
                                        value="{{ $dataBerkas->nib }}">
                                    </div>
                                   
                                </div>
                                 </div>
                                <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Letak Tanah</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-book"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="letak_tanah" class="form-control"
                                        value="{{ $dataBerkas->letak_tanah }}">
                                    </div>
                                   
                                </div>
                                </div>
                                <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Daftar Isian 202</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-book"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="daftar_isian_202" class="form-control"
                                    value="{{ $dataBerkas->daftar_isian_202 }}">
                                    </div>
                                   
                                </div>
                                 </div>
                                <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Surat Ukur</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-book"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="surat_ukur" class="form-control" 
                                        value="{{ $dataBerkas->surat_ukur }}">
                                    </div>
                                   
                                </div>
                                </div>
                                <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tanggal</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-book"></i>
                                            </span>
                                        </div>
                                        <input type="date" name="tanggal" class="form-control"
                                        value="{{ $dataBerkas->tanggal }}">
                                    </div>
                                   
                                </div>
                                </div>
                                <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nomor</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-book"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="nomor" class="form-control" 
                                        value="{{ $dataBerkas->nomor }}">
                                    </div>
                                   
                                </div>
                                </div>
                                <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Luas</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-book"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="luas" class="form-control"
                                        value="{{ $dataBerkas->luas }}">
                                    </div>
                                   
                                </div>
                                </div>
                                <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Keterangan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-book"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="keterangan" class="form-control"
                                        value="{{ $dataBerkas->keterangan }}">
                                    </div>
                                </div>
                                </div>
                                </div>
                            </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan Berkas</button>
                            <button type="reset" class="btn btn-danger">
                                Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>



    </div>
    </section>
    </div>





@endsection
