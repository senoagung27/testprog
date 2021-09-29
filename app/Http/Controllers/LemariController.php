<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lemari;
use App\Ruangan;
use Session;
 
use App\Imports\LemariImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class LemariController extends Controller
{
    public function index()
    {
        $dataLemari = Lemari::get();
        return view('Lemari.Lemari', compact('dataLemari'));
    }
    public function tambah()
    {
        $dataLemari = Lemari::get();
        return view('Lemari.create', compact('dataLemari'));
    }
    public function tambahlemari($id)
    {
        $dataRuangan = Ruangan::where('id', $id)->first();
        return view('Lemari.create', compact('dataRuangan','id'));
    }
    public function create(Request $request)
    {
        Lemari::create(
            [
                'ruangan_id' => $request->ruangan_id,
                'nama_lemari' => $request->nama_lemari,
            ]
        );
        return redirect('/DetailRuangan/'.$request->ruangan_id)->with('sukses', 'Data Berhasil Di Input');
    }
    public function edit($id)
    {
        $dataLemari = Lemari::where('id','=',$id)->first();
        return view('Lemari.edit',compact('dataLemari'));
    }
    public function simpanedit(Request $request) {
		Lemari::where('id',$request->id)->update([
             'ruangan_id' => $request->ruangan_id,
			 'nama_lemari' => $request->nama_lemari,
		]);
        return redirect('/DetailRuangan/'.$request->ruangan_id)->with('edit', 'Data Berhasil Di Edit');

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
		$file->move('file_lemari',$nama_file);
 
		// import data
		Excel::import(new LemariImport, public_path('/file_lemari/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect()->back();
	}

    public function hapus($id) {
        $dataLemari = Lemari::where('id','=',$id)->first();
        // dd($dataBiodata);
        $dataLemari->delete();
        return redirect()->back();

    }
}