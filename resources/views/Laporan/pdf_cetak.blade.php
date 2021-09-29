@extends('layouts.app')

@section('content')


<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Membuat Laporan PDF Dengan DOMPDF Laravel</h4>
		<h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a></h5>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
                <th>#</th>
                <th>No Berkas</th>
                <th>Nama Berkas</th>
                <th>Nama Ruangan</th>
                <th>Nama Lemari</th>
                <th>Nama Rak</th>
                <th>Status</th>
                <th>Tanggal Verifikasi</th>
			</tr>
		</thead>
		<tbody>
			
			@foreach ($dataBerkas as $data)
			<tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nomor_berkas }}</td>
                <td>{{ $data->nama_berkas }}</td>
                <td>{{ $data->isiRak->isiLemari->isiRuangan->nama_ruangan }}</td>
                <td>{{ $data->isiRak->isiLemari->nama_lemari }}</td>
                <td>{{ $data->isiRak->nama_rak }}</td>
                <td class="project-state"> <span
                        class="badge badge-success">{{ $data->status_pinjam }}</span></td>
                        <td>{{ $data->updated_at }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>
@endsection