<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Rak;
use DB;
use App\Berkas;
use App\Keranjang;

class TransaksiCariController extends Controller
{
    public function index()
    {
        $dataTransaksiCari = Transaksi::get();
        $dataTransaksiCari = Berkas::get();
        return view('TransaksiCari.indexTransaksiCari', compact('dataTransaksiCari'));
    }
    public function tambah()
    {
        $dataRak = Rak::get();
        $dataTransaksiCari = Berkas::get();
        $prov = DB::table('provinces')->pluck("name","id");
        $dataPenyimpan = DB::table('ruangans')->pluck("nama_ruangan","id");
        return view('TransaksiCari.isidata', compact('dataRak','dataPenyimpan','prov','dataTransaksiCari'));
    }
    public function simpantambah(Request $request)
    {
        
        Berkas::create( 
             [
                'tipe_hak_buku_tanah' => $request->tipe_hak_buku_tanah,
                'no_buku_tanah'=>$request->no_buku_tanah,
                'nama_buku_tanah'=>$request->nama_buku_tanah,
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
    return redirect('/TransaksiCari');
    }
    public function simpanberkaskerjang(Request $request)
    {
        
        // dd($request->all());
       $dataBerkas = Berkas::create( 
             [
                'tipe_hak_buku_tanah' => $request->tipe_hak_buku_tanah,
                'no_buku_tanah'=>$request->no_buku_tanah,
                'nama_buku_tanah'=>$request->nama_buku_tanah,
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

            Keranjang::create([
                'user_id'=> $request->id,
                'berkas_id'=>$dataBerkas ->berkas_id
            ]);

    return redirect('/TransaksiCari');
    }
   
public function tambahkeranjang(Request $request) {
    $dataTransaksi = Berkas::where('id','=',$request->id)->first();
    Berkas::where('id',$request->id)->update([
         'status_pinjam' => 'Pinjam'
    ]);
    return redirect('/Pinjam');

}
    public function dataLemari($id) {        
        // $cities = DB::table("regencies")->where("province_id",$id)->pluck("name","id");
        $dataLemari = DB::table("lemaris")->where("ruangan_id",$id)->pluck("nama_lemari","id");
        return json_encode($dataLemari);
    }

    public function dataRak($id) {        
        // $distr = DB::table("districts")->where("regency_id",$id)->pluck("name","id");
        $dataRak = DB::table("raks")->where("lemari_id",$id)->pluck("nama_rak","id");
        return json_encode($dataRak);
    }
    public function getCity($id) {        
        $cities = DB::table("regencies")->where("province_id",$id)->pluck("name","id");
        // $dataLemari = DB::table("lemaris")->where("ruangans_id",$id)->pluck("nama_lemari","id");
        return json_encode($cities);
    }

    public function getDistrict($id) {        
        $distr = DB::table("districts")->where("regency_id",$id)->pluck("name","id");
        // $distr = DB::table("raks")->where("lemaris_id",$id)->pluck("nama_rak","id");
        return json_encode($distr);
    }
    public function getVillage($id) {        
        $village = DB::table("villages")->where("district_id",$id)->pluck("name","id");
        // $distr = DB::table("raks")->where("lemaris_id",$id)->pluck("nama_rak","id");
        return json_encode($village);
    }
}
