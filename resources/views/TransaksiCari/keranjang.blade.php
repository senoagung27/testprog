@extends('layouts.app')

@section('content')




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                        {{-- <span> 
                            <a href="/TransaksiCari" style="margin-right: 5px;">
                            <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                            </a>
                        </span>  --}}
                        Keranjang
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/TransaksiCari">Cari Berkas</a></li>
                            <li class="breadcrumb-item active">Keranjang</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- <div class="content-wrapper"> -->

                    <!-- Main content -->
                    <section class="content">
                        <div class="container-fluid">
                            <!-- <h2 class="text-center display-4">Transaksi Data Berkas</h2>
                            <div class="row">
                                <div class="col-md-8 offset-md-2 p-3">
                                    <form action="/Transaksi/Hasil" method="GET">
                                        <div class="input-group">
                                            <input type="search" name="cari" class="form-control form-control-lg" placeholder="Type your keywords here">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-lg btn-default">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> -->
                            <section class="content">
                              <div class="container-fluid">
                                  <h2 class="text-center display-4">Cari Data Berkas</h2>
                                  <div class="row">
                                      <div class="col-md-8 offset-md-2 py-4">
                                          <form action="/Transaksi/Hasil" method="GET">
                                              @csrf
                                              <div class="input-group">
                                                  <input type="search" name="cari" class="form-control form-control-lg" placeholder="Masukkan kata kunci berkas" value="{{ old('cari') }}">
                                                  <div class="input-group-append">
                                                      <button type="submit" class="btn btn-lg btn-default">
                                                          <i class="fa fa-search"></i>
                                                      </button>
                                                  </div>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </section>
                            <div class="row">
                                <div class="col-12">
                                  <!-- Main content -->
                                  <div class="invoice p-4 mb-4">
                                    <!-- title row -->
                                    <div class="row mb-4">
                                      <div class="col-12">
                                        <h4>
                                          <i class="fas fa-globe"></i> Daftar Berkas
                                        </h4>
                                      </div>
                                      <!-- /.col -->
                                    </div>
                                    <!-- info row -->
                                    
                                    <!-- /.row -->
                      
                                    <!-- Table row -->
                                    {{-- <div class="row">
                                      <div class="col-12 table-responsive"> --}}
                                        <table class="table table-striped">
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
                                          <tr>
                                            @foreach ($dataKeranjang as $data)
                                          <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->isiBerkas->no_buku_tanah }} </td>
                                            <td>{{ $data->isiBerkas->nama_buku_tanah }} </td>
                                            <td>{{ $data->isiBerkas->nomor_berkas }}</td>
                                            <td>{{ $data->isiBerkas->nama_berkas }} </td>
                                            <td>{{ $data->isiBerkas->tipe_hak_buku_tanah }}</td>
                                            <td><a href="/hapusKeranjang/{{ $data->berkas_id }}" style="color:black"
                                              data-toggle="modal" data-target="#modalhapus{{ $data->berkas_id }}">
                                              <i class="fa fa-trash"></i></a></td>
                                          </tr>
                                          
                                          <div class="modal fade right" id="modalhapus{{ $data->berkas_id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <form action="/hapusKeranjang/{{ $data->berkas_id }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <div class="modal-dialog modal-notify modal-danger" role="document">
                                                    <!--Content-->
                                                    <div class="modal-content">
                                                        <!--Header-->
                                                        <div class="modal-header">
                                                            <p class="heading">Berkas</p>
    
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
                                                                    <p>Yakin anda menghapus data dengan Berkas ini ?</p>
                                                                    <h2><span class="badge"></span>
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
                                        <div class="row no-print">
                                          <div class="col-12">
                                            <a href="/Transaksi/Cekout" class="btn btn-primary bg-white float-right" style="margin-right: 5px;">
                                              <i class="fas fa-download"></i> Cekout
                                            </a>
                                          </div>
                                        </div>
                                      {{-- </div> --}}
                                      <!-- /.col -->
                                    {{-- </div> --}}
                                    <!-- /.row -->
                      
                                    
                                    
                                    
                                  <!-- /.invoice -->
                                </div><!-- /.col -->
                              </div><!-- /.row -->
                        </div>
                        </div>
                        
                    </section>
                  <!-- </div> -->
                
                
                    
                  
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
    </script>
    <script>
      $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
      });
    </script>
@endsection
