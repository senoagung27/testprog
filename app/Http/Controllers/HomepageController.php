<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Berkas;
use App\Penyewa;

class HomepageController extends Controller
{
    public function index()
    {
        // $dataBerkas = Berkas::get();
        $dataTransaksi = Transaksi::all();
        $dataPenyewa = Penyewa::get();
        $dataTransaksi = Transaksi::count();
        $dataPenyewa = Penyewa::count();
        $dataTotalBerkas = Berkas::count();
        $dataKembali = Transaksi::count();
        $dataTransaksi = Transaksi::where('status_pinjam','=','Pinjam')-> get();
        $dataPinjam = Transaksi::where('status_pinjam','=','Booking')-> get();
        // $dataPenyewa = Penyewa::all();
        return view('homepage', compact('dataTransaksi','dataPenyewa','dataKembali','dataTotalBerkas','dataPinjam'));
    }
    // public function PengembalianBerkas(Request $request) {
    //     // dd($request->all());
    //     $dataTransaksi = Transaksi::where('id','=',$request->id)->first();
	// 	Transaksi::where('id',$request->id)->update([
	// 		 'status_pinjam' => 'Tersedia'
	// 	]);
    //     Berkas::where('id',$dataTransaksi->berkas_id)->update([
    //         'status_pinjam' => 'Tersedia',
    //     ]);
    //     return redirect('/Homepage');

    // }

   
}
