@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Peminjaman Berkas Baru</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Peminjaman Berkas Baru</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">

            {{-- <div class="container-fluid">
                


                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Peminjaman Berkas Baru</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="/Simpanpinjam">
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
                              <input type="hidden" name="penyewas_id" value="{{ Auth::user()->id }}">
                             
                              <div class="form-group">
                                <label>Tanggal Ambil Berkas</label>
              
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
                              <div class="form-group">
                                <label>Tanggal Kembali Berkas</label>
              
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="far fa-calendar-alt"></i>
                                    </span>
                                  </div>
                                  <input type="date" name="tanggal_kembali_berkas" class="form-control float-right" id="reservation">
                                </div>
                                <!-- /.input group -->
                              </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Peminjaman Berkas</button>
                            <button type="reset" class="btn btn-danger">
                                Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div> --}}

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Peminjaman Berkas</h3>
              </div>
              <form role="form" method="POST" action="/Simpanpinjam">
                @csrf
              <div class="card-body">
                <div class="row">
                  {{-- <div class="form-group{{ $errors->has('kode_booking') ? ' has-error' : '' }}">
                    <label for="kode_booking" class="col-md-4 control-label">Kode Transaksi</label>
                    <div class="col-md-6">
                        <input id="kode_booking" type="text" class="form-control" name="kode_booking" value="{{ $kode }}" required readonly="">
                        @if ($errors->has('kode_booking'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kode_transaksi') }}</strong>
                            </span>
                        @endif
                    </div>
                </div> --}}
                {{-- <div class="col-6"> --}}
                  {{-- <div class="form-group{{ $errors->has('kode_booking') ? ' has-error' : '' }}">
                    <label for="kode_booking" class="col-md-4 control-label">Kode Booking</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                       <i class="fas fa-hashtag"></i>
                      </span>
                    </div>
                    <input id="kode_booking" type="text" class="form-control" name="kode_booking" value="{{ $kode }}" required readonly="">
                        @if ($errors->has('kode_booking'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kode_booking') }}</strong>
                            </span>
                        @endif
                  </div>
                  </div> --}}
                  {{-- <label for="kode_booking" class="col-md-4 control-label">Kode Booking</label> --}}
                  <div class="input-group">
                    <div class="input-group-prepend">
                      {{-- <span class="input-group-text"> --}}
                       {{-- <i class="fas fa-hashtag"></i> --}}
                      </span>
                    </div>
                    <input id="kode_booking" type="hidden" class="form-control" name="kode_booking" required readonly="">
                  </div>
                {{-- </div> --}}


                  <div class="col-12">
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
                    </div>
                  </div>
                  <div class="col-6">
                    <label>Tanggal Pinjam Berkas</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar"></i>
                        </span>
                      </div>
                      <input type="date" name="tanggal_ambil_berkas" class="form-control float-right" id="reservation">
                    </div>
                  </div>
                  <div class="col-6">
                    <label>Tanggal Kembali Berkas</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar"></i>
                        </span>
                      </div>
                      <input type="date" name="tanggal_kembali_berkas" class="form-control float-right" id="reservation">
                  </div>
                </div>
                @if (auth()->user()->role == 'anggota')
                <input type="hidden" name="penyewas_id" value="{{ auth()->user()->isiAnggota->id_user }}">    
                @else
                <div class="col-6">
                  <div class="form-group"><p></p>
                  <label>Nama Anggota</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                       <i class="fas fa-book"></i>
                      </span>
                    </div>
                    <select class="custom-select" name="penyewas_id" required>
                      <option value="">-Pilihan-</option>
                      @foreach ($dataPenyewa as $item)
                      {{-- <option value="{{ $item->id }}">{{ $item->nama_penyewa }}</option>--}}
                        
                      <option value="{{ $item->id }}">{{ $item->nama_penyewa}}</option>
                      @endforeach
                    </select>
                  </div>
                  </div>
                </div>
                @endif
               
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn btn-danger">
                  Reset
              </button>
              <a href="/Pinjam" class="btn btn-success fa-pull-right">Back</a>
          </div>
          </form>
    </div>
    </section>
    </div>
@endsection

