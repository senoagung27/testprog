<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Berkas;
use App\Keranjang;
use Auth;
use DB;

class TransaksiHasilController extends Controller
{
    public function index()
    {
        $dataCari = DB::table('berkas')->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('TransaksiCari.hasil',['dataCari' => $dataCari]);
    }
    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
     
         // mengambil data dari table pegawai sesuai pencarian data
        
    
        $dataKeranjangUser = Keranjang::where('user_id',Auth::user()->id)->get();
        $jsonObjBerkas= array();
        foreach($dataKeranjangUser as $data) { 				              
            $row = $data->berkas_id;       
            array_push($jsonObjBerkas,$row);
        }
        // dd($jsonObjBerkas);
        // $dataCari = DB::table('berkas')
        // ->where('tipe_hak_buku_tanah','like',"%".$cari."%")
        // ->Orwhere('nama_berkas','like',"%".$cari."%")
        // ->Orwhere('no_buku_tanah','like',"%".$cari."%")
        // ->whereIn('berkas_id', [$jsonObjBerkas])
        // ->get();



        $dataCari = Berkas::where('status_pinjam', 'Tersedia')
        ->where(function($query) use ($cari,$jsonObjBerkas) {
            $query->where('tipe_hak_buku_tanah','like',"%".$cari."%")
                  ->whereNotIn("berkas_id", $jsonObjBerkas);
        })->orWhere(function($query) use ($cari,$jsonObjBerkas) {
                $query->where('nama_berkas','like',"%".$cari."%")
                    ->whereNotIn("berkas_id", $jsonObjBerkas);
        })
        ->orWhere(function($query) use ($cari,$jsonObjBerkas) {
                $query->where('no_buku_tanah','like',"%".$cari."%")
                    ->whereNotIn("berkas_id", $jsonObjBerkas);
        })
        ->orWhere(function($query) use ($cari,$jsonObjBerkas) {
            $query->where('nama_buku_tanah','like',"%".$cari."%")
                ->whereNotIn("berkas_id", $jsonObjBerkas);
        })
         ->get();



        // dd($dataCari);
        if ($dataCari->count()>0) {
            return view('TransaksiCari.hasil',['dataCari' => $dataCari]);
        } else {
            return redirect('Tambahdata');
        }
     
    }
    public function simpanKeranjang(Request $request)
    {
        Keranjang::create([
            'user_id'=> $request->id,
            'berkas_id'=>$request->berkas_id
        ]);
        return redirect('Keranjang');
    }
}
