

    
   @extends('layouts.app')

   @section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Transaksi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Transaksi</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex">
                    {{-- <a href="" class="btn btn-primary btn-rounded btn-fw">
                        <i class="icon-nav fa fa-plus"></i>&nbsp; Tambah Data</a> --}}
                        <h3>Transaksi</h3>
                </div><!-- /.card-header -->
                <!-- /.card-header -->

                <div class="card-body">
                    {{-- <table id="example1" class="table table-bordered table-striped">
                      
                        <tbody>
                           
                                <!-- Central Modal Danger Demo-->
                                
                        </tbody>
                    </table> --}}
                    <form action="" method="post">
                        @csrf

                    
                    <table>
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Jenis</th>
                                <th>Nomor</th>
                                <th>Kecamatan</th>
                                <th>Kelurahan / Desa</th>
                                <th>Status</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                {{-- <td><input type="checkbox" name="record"></td>
                                <td>Peter Parker</td>
                                <td>peterparker@mail.com</td> --}}
                            </tr>
                        </tbody>
                    </table>
                </form>
                    <div class="py-3">
                    <button type="button" class="delete-row">Delete Row</button>
                </div>
                  <form>
                        <input type="text" id="name" name="" placeholder="Name">
                        <input type="text" id="email" placeholder="Email Address">
                        <input type="button" class="add-row" value="Add Row">
                    </form>

                    <!-- /.tab-pane -->
                </div>

            </div>
            <!-- /.card-body -->
        </div>
</div>
</section>
</div>


@endsection

@section('jsIsian')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".add-row").click(function(){
                var name = $("#name").val();
                var email = $("#email").val();
                var markup = "<tr><td><input type='checkbox' name='record[]'></td><td>" + name + "</td><td>" + email + "</td></tr>";
                $("table tbody").append(markup);
            });
            
            // Find and remove selected table rows
            $(".delete-row").click(function(){
                $("table tbody").find('input[name="record"]').each(function(){
                    if($(this).is(":checked")){
                        $(this).parents("tr").remove();
                    }
                });
            });
        });    
    </script>
@endsection
