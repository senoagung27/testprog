<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rak;
use App\Lemari;
use Session;
 
use App\Imports\RakImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;


class RakController extends Controller
{
    public function index()
    {
        $dataRak = Rak::get();
        return view('Rak.Rak', compact('dataRak'));
    }
    public function tambah()
    {
        return view('Rak.create');
    }
    public function detailrak($id)
    {
        $dataRak = Rak::where('lemari_id', $id)->get();
        return view('Rak.show', compact('dataRak','id'));
    }
    public function tambahrak($id)
    {
        $dataLemari = Lemari::where('id', $id)->first();
        return view('Rak.create', compact('dataLemari','id'));
    }
    public function create(Request $request)
    {
        Rak::create(
            [
                'lemari_id' => $request->lemari_id,
                'nama_rak' => $request->nama_rak,
            ]
        );
        return redirect('/detailRak/'.$request->lemari_id);
    }
    public function edit($id)
    {
        $dataRak = Rak::where('id','=',$id)->first();
        return view('Rak.edit',compact('dataRak'));
    }
    public function simpanedit(Request $request) {
		Rak::where('id',$request->id)->update([
            'lemari_id' => $request->lemari_id,
			 'nama_rak' => $request->nama_rak,
		]);
        return redirect('/detailRak/'.$request->lemari_id)->with('edit', 'Data Berhasil Di Edit');

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
		$file->move('file_rak',$nama_file);
 
		// import data
		Excel::import(new RakImport, public_path('/file_rak/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect()->back();
	}
    public function hapus($id) {
        $dataRak = Rak::where('id','=',$id)->first();
        // dd($dataBiodata);
        $dataRak->delete();
        return redirect()->back();

    }
}