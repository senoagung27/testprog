@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
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
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if (('session')('tambah'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert"
                            aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Sukses!!!!</h5>
                        {{ session('tambah') }}
                    </div>
                @endif
                @if (('session')('input'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert"
                            aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Peringatan!!!!</h5>
                        {{ session('input') }}
                    </div>
                @endif
                @if (('session')('pinjam'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert"
                            aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-info"></i> Peringatan!!!</h5>
                        {{ session('pinjam') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis</th>
                                    <th>Nomor</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan/Desa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keranjangKembali as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->isiJenis->nama_jenis_hak }}</td>
                                        <td>{{ $data->nomor }}</td>
                                        <td>{{ $data->isiKecamatan->nama }}</td>
                                        <td>{{ $data->isiKelurahan->nama }}</td>
                                        <td><a href="/e-peminjamans/hapusTransaksiBaru/{{ $data->id }}"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#modalhapus{{ $data->id }}"><i
                                                    class="icon-nav fa fa-trash"> Hapus</i></a></td>
                                    </tr>

                                    <!-- Central Modal Danger Demo-->
                                    <div class="modal fade right" id="modalhapus{{ $data->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <form action="/e-peminjamans/hapusTransaksiBaru/{{ $data->id }}" method="POST">
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
                                                                <p>Yakin anda menghapus data dengan data ini ?</p>
                                                                <h2><span
                                                                        class="badge">{{ $data->nama_berkas }}</span>
                                                                </h2>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--Footer-->
                                                    <div class="modal-footer justify-content-center">
                                                        <button type="submit" class="btn btn-danger"
                                                            style="color:white">Hapus Data <i
                                                                class="fas fa-times-circle  ml-1"></i></button>
                                                        <a type="button" class="btn btn-outline-danger waves-effect"
                                                            data-dismiss="modal">No, thanks</a>
                                                    </div>
                                                </div>
                                                <!--/.Content-->
                                        </form>
                                    </div>

                                @endforeach
                            </tbody>
                        </table>

                        <!-- /.tab-pane -->
                    </div>

                </div>

                <div class="card">
                    {{-- <div class="card-header d-flex">
                        <a href="{{ route('berkas.create') }}" class="btn btn-primary btn-rounded btn-fw"><i
                                class="icon-nav fa fa-plus"></i>&nbsp; Tambah Data</a>
                    </div><!-- /.card-header --> --}}
                    <!-- /.card-header -->

                    <div class="card-body">
                        <form role="form" method="POST" action="/e-peminjamans/SimpanKeranjangPengembalian">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Jenis</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-clipboard-list"></i>
                                                </span>
                                            </div>
                                            <select class="form-control select2 " name="jenis_id" required>
                                                <option selected="selected" value="">-Pilihan-</option>
                                                @foreach ($dataJenisHak as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_jenis_hak }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Nomor</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-hashtag"></i>
                                                </span>
                                                <input type="text" name="nomor" class="input-group" data-role="tagsinput"
                                                    id="reservation" placeholder="Nomor" style="width: inherit" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Kelurahan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-file-alt"></i>
                                                </span>
                                            </div>
                                            <select class="form-control select2 " name="kelurahan" style="width:200px"
                                                required>
                                                <option selected="selected" value="">-Kelurahan-</option>
                                                @foreach ($kelurahan as $value)
                                                    <option value="{{ $value->id }}">{{ $value->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-hdd"></i>
                                                </span>
                                            </div>

                                            <select class="form-control select2 " name="kecamatan" style="width:200px"
                                                required>
                                                <option value="">Kecamatan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="py-3">
                                        <button type="submit" class="btn btn-success fa-pull-right">
                                            <i class="fa fa-plus" aria-hidden="true"> Tambah</i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr />
                    <div class="callout callout-success ml-2">
                        <form role="form" method="POST" action="/e-peminjamans/SimpanTransaksiPengembalian">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="tanggal_pengembalian_berkas" class="form-control float-right"
                                id="reservation" value="<?php echo date('Y-m-d'); ?>">
                            <h5><i class="fas fa-clipboard-check"></i> Data Transaksi Peminjaman</h5>
                            {{-- <h5>No Transaksi :<span> </span></h5> --}}
                            <div class="row">
                                <div class="col-6">
                                    <h5>Admin :<span> {{ Auth::user()->name }}</span></h5>
                                </div>

                                <div class="col-2">
                                    <h5>Peminjam :</h5>

                                </div>

                                <div class="col-2 pr-5" style="margin-left:-80px; margin-top:-5px ">
                                    {{-- <select class="custom-select coba" name="penyewas_id" required>
                                        <option value="">-Pilihan-</option>
                                        @foreach ($dataPenyewa as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_penyewa }}</option>
    
                                            <option value="{{ $item->id }}">
                                                {{ $item->nama_penyewa }}</option>
                                        @endforeach
                                    </select> --}}
                                    <select class="form-control select2" name="penyewas_id" style="width:200px" required>
                                        <option selected="selected" value="">-Pilihan-</option>
                                        @foreach ($dataPenyewa as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->nama_penyewa }}</option>
                                        @endforeach
                                    </select>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h5>Tgl Pinjam :
                                        <span> <?php echo date('d F Y'); ?>
                                            <input type="hidden" name="tanggal" value="<?php echo date('Y-m-d'); ?>">
                                        </span>
                                    </h5>
                                </div>
                                {{-- <div class="col-6">
                            <h5>Tanggal Kembali :<span> </span></h5>
                        </div> --}}

                            </div>
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
                                <button type="button" class="btn mb-3 mr-3 btn-success fa-pull-right">
                                    <i class="fa fa-times-circle" aria-hidden="true"> Cancel</i></button>
                                <button type="submit" class="btn ml-3 btn-success fa-pull-left">
                                    <i class="far fa-save"></i> Simpan</button>
                            </div>
                        </div>

                    </div>
                    </form>

                    <!-- /.tab-pane -->

                </div>

            </div>
            {{-- taro section --}}
            <!-- /.card-body -->
    </div>
    </div>
    </section>
    </div>


@endsection
@section('jsIsian')
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('select[name="ruangan_id"]').on('change', function() {
                var cityID = jQuery(this).val();
                if (cityID) {
                    jQuery.ajax({
                        url: 'dataLemari/' + cityID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            jQuery('select[name="lemari_id"]').empty();
                            $('select[name="lemari_id"]').append(
                                '<option>--- Select Lemari ---</option>');
                            jQuery.each(data, function(key, value) {
                                $('select[name="lemari_id"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="state"]').empty();
                }
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('select[name="lemari_id"]').on('change', function() {
                var cityID = jQuery(this).val();
                if (cityID) {
                    jQuery.ajax({
                        url: 'dataRak/' + cityID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            jQuery('select[name="rak_id"]').empty();
                            $('select[name="rak_id"]').append(
                                '<option>--- Select Rak ---</option>');
                            jQuery.each(data, function(key, value) {
                                $('select[name="rak_id"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="state"]').empty();
                }
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('select[name="kelurahan"]').on('change', function() {
                var kelurahanID = jQuery(this).val();
                if (kelurahanID) {
                    jQuery.ajax({
                        url: 'dataKecamatan/' + kelurahanID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            jQuery('select[name="kecamatan"]').empty();
                            $('select[name="kecamatan"]').append(
                                '<option>--- Kecamatan ---</option>');
                            jQuery.each(data, function(key, value) {
                                $('select[name="kecamatan"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="state"]').empty();
                }
            });
        });
    </script>
    {{-- <script type="text/javascript">
      jQuery(document).ready(function ()
      {
              jQuery('select[name="village"]').on('change',function(){
                var villageID = jQuery(this).val();
                if(villageID)
                {
                    jQuery.ajax({
                      url : 'getDistrict/' +villageID,
                      type : "GET",
                      dataType : "json",
                      success:function(data)
                      {
                          console.log(data);
                          jQuery('select[name="district"]').empty();
                          $('select[name="district"]').append('<option>--- Kelurahan ---</option>');
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
      </script> --}}
    {{-- <script type="text/javascript">
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
        </script> --}}
@endsection


@section('bawah')

    <script src="{{ asset('/tagAsset/tagsinput.js') }}"></script>

    <script>
        $(function() {
            $("#example1").DataTable();
            $("#example2").DataTable();
            $("#example3").DataTable();
            $('#example4').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
            });
        });
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Initialize Select2 Elements
        $('.select2').select2()
    </script>
@endsection
