<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelurahan_desa;
use Session;
 
use App\Imports\Kelurahan_desa_Import;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class KelurahanDesaController extends Controller
{
    public function index()
    {
        $dataKelurahan = Kelurahan_desa::get();
        // $dataCari = Berkas::get();
        return view('Kelurahan_Desa.index', compact('dataKelurahan'));
    }
    // public function import_excel(Request $request) 
	// {
	// 	// validasi
	// 	$this->validate($request, [
	// 		'file' => 'required|mimes:csv,xls,xlsx'
	// 	]);
 
	// 	// menangkap file excel
	// 	$file = $request->file('file');
 
	// 	// membuat nama file unik
	// 	$nama_file = rand().$file->getClientOriginalName();
 
	// 	// upload ke folder file_siswa di dalam folder public
	// 	$file->move('file_kelurahan_desa',$nama_file);
 
	// 	// import data
	// 	Excel::import(new Kelurahan_desa_Import, public_path('/file_kelurahan_desa/'.$nama_file));
 
	// 	// notifikasi dengan session
	// 	Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
	// 	// alihkan halaman kembali
	// 	return redirect('/Kelurahan');
	// }
	public function import_excel(Request $request) {
		Excel::import(new Kelurahan_desa_Import, $request->file('file'));
		$message = 'Upload Success';
		return redirect()->back()->withMessage($message);
	}
}
