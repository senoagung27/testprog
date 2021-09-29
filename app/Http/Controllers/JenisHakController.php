<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisHak;
use Session;
 
use App\Imports\JenisHakImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class JenisHakController extends Controller
{
    public function index()
    {
        $dataJenisHak = JenisHak::get();
        return view('JenisHak.index', compact('dataJenisHak'));
    }
    public function tambah()
    {
        $dataJenisHak = JenisHak::get();
        
        return view('JenisHak.create', compact('dataJenisHak',));
    }
    public function create(Request $request)
    {
        // dd($request->all());
        JenisHak::create(
            [
                'nama_jenis_hak' => $request->nama_jenis_hak,
            ]
        );
        // return view('JenisHak.create');
        // return redirect('/JenisHak');
        return redirect('/JenisHak')->with('tambah', 'Data Berhasil Di Tambah');
    }
    public function edit($id)
    {
        $dataJenisHak = JenisHak::where('id','=',$id)->first();
        return view('JenisHak.edit',compact('dataJenisHak'));
    }
    public function simpanedit(Request $request) {
		JenisHak::where('id',$request->id)->update([
			 'nama_jenis_hak' => $request->nama_jenis_hak,
		]);
        return redirect('/JenisHak')->with('edit', 'Data Berhasil Di Edit');

    }
    public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_jenishak',$nama_file);
 
		// import data
		Excel::import(new JenisHakImport, public_path('/file_jenishak/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/JenisHak');
	}
    public function hapus($id) {
        $dataJenisHak = JenisHak::where('id','=',$id)->first();
        // dd($dataBiodata);
        $dataJenisHak->delete();
        return redirect('/JenisHak');

    }
}
