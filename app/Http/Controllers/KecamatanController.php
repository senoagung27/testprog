<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kecamatan;
use Session;
 
use App\Imports\KecamatanImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class KecamatanController extends Controller
{
    public function index()
    {
        $dataKecamatan = Kecamatan::get();
        // $dataCari = Berkas::get();
        return view('Kecamatan.index', compact('dataKecamatan'));
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
	// 	$file->move('file_kecamatan',$nama_file);
 
	// 	// import data
	// 	Excel::import(new KecamatanImport, public_path('/file_kecamatan/'.$nama_file));
 
	// 	// notifikasi dengan session
	// 	Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
	// 	// alihkan halaman kembali
	// 	return redirect('/Kecamatan');
	// }
	public function import_excel(Request $request) {
		Excel::import(new KecamatanImport, $request->file('file'));
		$message = 'Upload Success';
		return redirect()->back()->withMessage($message);
	}
}
