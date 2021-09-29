<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berkas;
use App\Ruangan;
use App\Lemari;
use App\Rak;
use App\Transaksi;
use DB;
use App\InventoryBaru;

class BerkasController extends Controller
{
    public function index()
    {
        $datas = InventoryBaru::all();
        // $datas = Berkas::where('status_pinjam','=','Tersedia')-> get();
        // $datas = Transaksi::where('status','=','Kembali','Booking','Pinjam')-> get();
        return view('Berkas.indexBerkas', compact('datas'));

    }
    // public function databooking()
    // {
    //     $dataBooking = Transaksi::get();
    //     $dataBooking = Transaksi::where('status_pinjam','=','Booking')-> get();
    //     return view('Berkas.indexBerkas', compact('dataBooking'));

    // }
    // public function berkasdipinjam()
    // {
    //     $dataPinjam = Berkas::get();
    //     $dataPinjam = Berkas::where('status_pinjam','=','Pinjam')-> get();
    //     return view('Berkas.indexBerkas', compact('dataPinjam'));

    // }
    // public function berkasdikembalikan()
    // {
    //     $dataKembali = Transaksi::get();
    //     $dataKembali = Transaksi::where('status','=','Kembali')-> get();
    //     return view('Berkas.indexBerkas', compact('datakembali'));

    // }
    public function tambah()
    {
        $dataRak = Rak::get();
        // $prov = DB::table('provinces')->pluck("name","id");
        $prov = DB::table('ruangans')->pluck("nama_ruangan","id");
        return view('Berkas.create', compact('dataRak','prov'));
    }
    public function create(Request $request)
    {
        // dd($request->all());
        Berkas::create( 
             [
                 
                'id' => $kodebooking->id,
                'nama_berkas' => $request->nama_berkas,
                'nomor_berkas' => $request->nomor_berkas,
                'rak_id' => $request->rak_id,
                'nama_pemegang_hak' => $request->nama_pemegang_hak,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_hak_milik' => $request->no_hak_milik,
                'nib' => $request->nib,
                'letak_tanah' => $request->letak_tanah,
                'daftar_isian_202' => $request->daftar_isian_202,
                'surat_ukur' => $request->surat_ukur,
                'tanggal' => $request->tanggal,
                'nomor' => $request->nomor,
                'luas' => $request->luas,
                'keterangan' => $request->keterangan,
                'status_pinjam' => 'Tersedia'
            ]
    );
    return redirect('/Berkas')->with('tambah', 'Data Berhasil Di Edit');
    }
    public function edit($id)
    {
        $dataRak = Rak::get();
        // $prov = DB::table('provinces')->pluck("name","id");
        $prov = DB::table('ruangans')->pluck("nama_ruangan","id");
        $dataBerkas = Berkas::get();
        $dataBerkas = Berkas::where('id','=',$id)->first();
        return view('Berkas.edit',compact('dataBerkas','prov','dataRak'));
    }
    public function simpanedit(Request $request) {
		Berkas::where('id',$request->id)->update([
            // 'id' => $kodebooking->id,
            'nama_berkas' => $request->nama_berkas,
            'nomor_berkas' => $request->nomor_berkas,
            'rak_id' => $request->rak_id,
            'nama_pemegang_hak' => $request->nama_pemegang_hak,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hak_milik' => $request->no_hak_milik,
            'nib' => $request->nib,
            'letak_tanah' => $request->letak_tanah,
            'daftar_isian_202' => $request->daftar_isian_202,
            'surat_ukur' => $request->surat_ukur,
            'tanggal' => $request->tanggal,
            'nomor' => $request->nomor,
            'luas' => $request->luas,
            'keterangan' => $request->keterangan,
		]);
        return redirect('/Berkas')->with('edit', 'Data Berhasil Di Edit');

    }
    public function hapus($id) {
        $dataBerkas = Berkas::where('id','=',$id)->first();
        // dd($dataBiodata);
        $dataBerkas->delete();
        return redirect('/Berkas');

    }
    public function detailberkas($id)
    {
        $datas = Berkas::get();
        $datas = Berkas::where('id','=',$id)-> get();
        return view('Berkas.show', compact('datas'));
    }

    public function getCity($id) {        
        // $cities = DB::table("regencies")->where("province_id",$id)->pluck("name","id");
        $dataLemari = DB::table("lemaris")->where("ruangan_id",$id)->pluck("nama_lemari","id");
        return json_encode($dataLemari);
    }

    public function getDistrict($id) {        
        // $distr = DB::table("districts")->where("regency_id",$id)->pluck("name","id");
        $distr = DB::table("raks")->where("lemari_id",$id)->pluck("nama_rak","id");
        return json_encode($distr);
    }


}