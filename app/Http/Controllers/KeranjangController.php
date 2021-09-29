<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Keranjang;
use App\Berkas;

class KeranjangController extends Controller
{
    public function index()
    {
        $dataKeranjang = Keranjang::get();
        $dataTotalKerjang = Keranjang::count();
        // $dataCari = Berkas::get();
        return view('TransaksiCari.keranjang', compact('dataKeranjang','dataTotalKerjang'));
    }
    public function tambahKeranjang(Request $request)
    {
        // Keranjang::create([
        //     'user_id'=> $request->id,
        //     'berkas_id'=>$request->berkas_id
        // ]);
        $dataKeranjang = Keranjang::get();
        return view('TransaksiCari.keranjang', compact('dataKeranjang'));
    }
    public function simpanKeranjang(Request $request)
    {
        Keranjang::create([
            'user_id'=> $request->id,
            'berkas_id'=>$request->berkas_id
        ]);
        return redirect('Keranjang');
    }
    public function hapus($id) {
        $dataKeranjang = Keranjang::where('berkas_id','=',$id)->first();
        // dd($dataBiodata);
        $dataKeranjang->delete();
        return redirect('/Keranjang');

    }
}
