@extends('layouts.app')

@section('content')




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Transaksi Peminjaman</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Transaksi Peminjaman</li>
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
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Sukses!!!!</h5>
                    {{ session('tambah') }}
                </div>
            @endif
            @if (('session')('input'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Peringatan!!!!</h5>
                {{ session('input') }}
            </div>
        @endif
            @if (('session')('pinjam'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-info"></i>  Peringatan!!!</h5>
                    {{ session('pinjam') }}
                </div>
            @endif
                <div class="card">


                    {{-- <div class="card-header d-flex">
                        <a href="{{ route('berkas.create') }}" class="btn btn-primary btn-rounded btn-fw"><i
                                class="icon-nav fa fa-plus"></i>&nbsp; Tambah Data</a>
                    </div><!-- /.card-header --> --}}
                    <!-- /.card-header -->

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan/Desa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->isiKecamatan->name }}</td>
                                        <td>{{ $data->isiKelurahan->name }}</td>
                                        
                                    </tr>
                                  
                                    
                                 
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
                <form role="form" method="POST" action="/SimpanKeranjangBaru">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <table class="table table-bordered table-striped">
                       
                            <thead>
                                <tr>
                                    <td> 
                                        <label>Kecamatan</label>
                                        <select class="form-control select2 " name="district" style="width:200px" >
                                            <option selected="selected" value="">-Pilihan-</option>
                                            @foreach ($district as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                          </select>
                                    </td>
                                    <td> 
                                        <label>Kelurahan/Desa</label>
                                        <select class="form-control select2 " name="village" style="width:200px" >
                                            <option value="">Kelurahan/Desa</option>
                                          </select>
                                    </td>
                                </tr>
                                
                            </thead>
                       
                    </table>
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
                    <hr/>
    </div>
        </div>
    </section>
    </div>


@endsection
@section('jsIsian')
<script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="ruangan_id"]').on('change',function(){
              var cityID = jQuery(this).val();
              if(cityID)
              {
                  jQuery.ajax({
                    url : 'dataLemari/' +cityID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                        console.log(data);
                        jQuery('select[name="lemari_id"]').empty();
                        $('select[name="lemari_id"]').append('<option>--- Select Lemari ---</option>');
                        jQuery.each(data, function(key,value){
                          $('select[name="lemari_id"]').append('<option value="'+ key +'">'+ value +'</option>');
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
            jQuery('select[name="lemari_id"]').on('change',function(){
              var cityID = jQuery(this).val();
              if(cityID)
              {
                  jQuery.ajax({
                    url : 'dataRak/' +cityID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                        console.log(data);
                        jQuery('select[name="rak_id"]').empty();
                        $('select[name="rak_id"]').append('<option>--- Select Rak ---</option>');
                        jQuery.each(data, function(key,value){
                          $('select[name="rak_id"]').append('<option value="'+ key +'">'+ value +'</option>');
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
                var districtID = jQuery(this).val();
                if(districtID)
                {
                    jQuery.ajax({
                      url : 'getVillage/' +districtID,
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
