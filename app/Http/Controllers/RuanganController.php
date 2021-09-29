<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruangan;
use App\Rak;
use App\Lemari;
use Session;
 
use App\Imports\RuanganImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class RuanganController extends Controller
{
    public function index()
    {
        $dataRuangan = Ruangan::get();
        return view('Ruangan.indexRuangan', compact('dataRuangan'));
    }
    public function ruangan()
    {
        $dataRuangan = Ruangan::get();
        return view('Ruangan.ruangan', compact('dataRuangan'));
    }
    public function detailruangan($id)
    {
        $dataLemari = Lemari::where('ruangan_id', $id)->get();
        return view('Ruangan.show', compact('dataLemari','id'));
    }
    public function tambah()
    {
        $dataLemari = Lemari::get();
        $dataRuangan = Ruangan::get();
        return view('Ruangan.create', compact('dataRuangan'));
    }
    public function create(Request $request)
    {
        Ruangan::create(
            [
                'nama_ruangan' => $request->nama_ruangan,
            ]
        );
        // return view('Ruangan.create');
        // return redirect('/Ruangan');
        return redirect('/InfoRuangan')->with('tambah', 'Data Berhasil Di Tambah');
    }
    public function edit($id)
    {
        $dataRuangan = Ruangan::where('id','=',$id)->first();
        return view('Ruangan.edit',compact('dataRuangan'));
    }
    public function simpanedit(Request $request) {
		Ruangan::where('id',$request->id)->update([
			 'nama_ruangan' => $request->nama_ruangan,
		]);
        return redirect('/InfoRuangan')->with('edit', 'Data Berhasil Di Edit');

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
		$file->move('file_ruangan',$nama_file);
 
		// import data
		Excel::import(new RuanganImport, public_path('/file_ruangan/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/InfoRuangan');
	}
    public function hapus($id) {
        $dataRuangan = Ruangan::where('id','=',$id)->first();
        // dd($dataBiodata);
        $dataRuangan->delete();
        return redirect('/InfoRuangan');

    }
}