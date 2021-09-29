@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Tambah Transaksi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Tambah Transaksi</li>
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
                        <h3 class="card-title">Tambah Transaksi Baru</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="/Simpantransaksi">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Berkas</label>
              
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                     <i class="fas fa-book"></i>
                                    </span>
                                  </div>
                                  <select class="custom-select" name="berkas_id" required>
                                    <option value="">-Pilihan-</option>
                                    @foreach ($dataBerkas as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_berkas }}</option>                                        
                                    @endforeach
                                  </select>
                                </div>
                                <!-- /.input group -->
                                
                            </div>

                              <div class="form-group">
                                <label>Nama Anggota</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                  </span>
                                </div>
                                <select class="custom-select" name="penyewas_id" required>
                                  <option value="">-Pilihan-</option>
                                  @foreach ($dataPenyewa as $item)
                                  <option value="{{ $item->id }}">{{ $item->nama_penyewa }}</option>                                        
                                  @endforeach
                                </select>
                              </div>
                              </div>
                              <input type="hidden" name="petugas_id" value="{{ Auth::user()->id }}">
                             
                              <div class="form-group">
                                <label>Tanggal Pinjam Berkas</label>
              
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="far fa-calendar-alt"></i>
                                    </span>
                                  </div>
                                  <input type="date" name="tanggal_ambil_berkas" class="form-control float-right" id="reservation">
                                </div>
                                <!-- /.input group -->
                              </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Tambah Transaksi</button>
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

