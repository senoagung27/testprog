@extends('layouts.app')

@section('content')




    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Tambah Berkas</h1>
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

            <div class="container-fluid">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Berkas</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="/SimpanBerkasKeranjang">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                {{-- <input type="hidden" name="kode_booking"> --}}
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Tipe Hak Buku Tanah</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-door-closed"></i>
                                                </span>
                                            </div>
                                            <select class="custom-select" name="tipe_hak_buku_tanah" required>
                                                <option value="">-Pilihan-</option>
                                                <option value="">Milik</option>
                                                <option value="">Guna Bagunan</option>
                                                <option value="">Pakai Wakaf</option>
                                                <option value="">Pengolahan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>No Buku Tanah</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-list-ol"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="no_buku_tanah" class="form-control float-right"
                                                id="reservation" placeholder="No Buku Tanah">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Nama Buku Tanah</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-list-ol"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="nama_buku_tanah" class="form-control float-right"
                                                id="reservation" placeholder="No Buku Tanah">
                                        </div>
                                    </div>
                                </div>
                                <hr size="10px" width="100%">
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
                                <hr size="10px" width="100%">
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
                                                @foreach ($dataPenyimpan as $key => $value)
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
                                            <select name="lemari" class="custom-select">
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
                                            <select name="rak" class="custom-select">
                                                <option value="">Pilih Rak</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr size="10px" width="100%">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-door-closed"></i>
                                                </span>
                                            </div>
                                            <select class="custom-select" name="id" required>
                                                <option value="">Provinsi</option>
                                                @foreach ($prov as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Kota/Kabupaten</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-hdd"></i>
                                                </span>
                                            </div>
                                            <select name="city" class="custom-select">
                                                <option value="">Pilih Kota/Kabupaten</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Kecamatan/Desa</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-folder"></i>
                                                </span>
                                            </div>
                                            <select name="district" class="custom-select">
                                                <option value="">Pilih Kecamatan/Desa</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Kelurahan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-folder"></i>
                                                </span>
                                            </div>
                                            <select name="village" class="custom-select">
                                                <option value="">Pilih Kelurahan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr size="10px" width="100%">
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
                                <hr size="10px" width="100%">
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
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Tambah Berkas</button>
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

@section('jsIsian')

<script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="id"]').on('change',function(){
               var provID = jQuery(this).val();
               if(provID)
               {
                  jQuery.ajax({
                     url : 'getCity/' +provID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="city"]').empty();
                        $('select[name="city"]').append('<option>--- Kota ---</option>');
                        jQuery.each(data, function(key,value){
                           $('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="state"]').empty();
               }
            });
    });
    </script>
    
    
      

    <script type="text/javascript">
      jQuery(document).ready(function ()
      {
              jQuery('select[name="city"]').on('change',function(){
                var cityID = jQuery(this).val();
                if(cityID)
                {
                    jQuery.ajax({
                      url : 'getDistrict/' +cityID,
                      type : "GET",
                      dataType : "json",
                      success:function(data)
                      {
                          console.log(data);
                          jQuery('select[name="district"]').empty();
                          $('select[name="district"]').append('<option>--- Kabupaten ---</option>');
                          jQuery.each(data, function(key,value){
                            $('select[name="district"]').append('<option value="'+ key +'">'+ value +'</option>');
                          });
                      }
                    });
                }
                else
                {
                    $('select[name="state"]').empty();
                }
              });
      });
      </script>
      <script type="text/javascript">
        jQuery(document).ready(function ()
        {
                jQuery('select[name="district"]').on('change',function(){
                  var cityID = jQuery(this).val();
                  if(cityID)
                  {
                      jQuery.ajax({
                        url : 'getVillage/' +cityID,
                        type : "GET",
                        dataType : "json",
                        success:function(data)
                        {
                            console.log(data);
                            jQuery('select[name="village"]').empty();
                            $('select[name="village"]').append('<option>--- Kelurahan ---</option>');
                            jQuery.each(data, function(key,value){
                              $('select[name="village"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                      });
                  }
                  else
                  {
                      $('select[name="state"]').empty();
                  }
                });
        });
        </script>









@endsection
