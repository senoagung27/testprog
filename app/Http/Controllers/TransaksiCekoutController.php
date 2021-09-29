<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\RincianTransaksi;
use App\Berkas;
use App\Keranjang;
use App\Penyewa;
use Carbon\Carbon;
use Auth;
use DB;

class TransaksiCekoutController extends Controller
{
    public function index()
    {
        $dataCari = Berkas::get();
        $dataKeranjang = Keranjang::get();
        // dd($dataKeranjang);
        $dataPenyewa = Penyewa::get();
        return view('TransaksiCari.cekout', compact('dataCari','dataKeranjang',));
    }
    public function tambah()
    {
        $dataPenyewa = Penyewa::get();
        $dataKeranjang = Keranjang::get();
        $dataCeriBerkas = Berkas::get();
        return view('TransaksiCari.cekout', compact('dataCeriBerkas','dataKeranjang','dataPenyewa'));
    }
    public function Simpancekout(Request $request)
    {
        // dd($request->all());
        Carbon::setWeekendDays([Carbon::SATURDAY,Carbon::SUNDAY,]);

        $tempo = Carbon::parse($request->tanggal)->addWeekdays(7);
        $dataKeranjang = Keranjang::where('user_id',$request->id_admin)->get();
        // dd($dataKeranjang);
        $dataTransaksi = Transaksi::create([
            'tanggal_ambil_berkas'=> $request->tanggal,
            'penyewas_id'=>$request->penyewas_id,
            'tanggal_kembali_berkas'=>$tempo,
            'status_pinjam' =>'Pinjam',
            'petugas_id' =>Auth::user()->id
        ]);

        foreach ($dataKeranjang as $item) {
            RincianTransaksi::create([
                'berkas_id'=>$item->berkas_id,
                'transaksi_id'=>$dataTransaksi->id_booking
            ]);
            Berkas::where('berkas_id',$item->berkas_id)->update([
                'status_pinjam' => 'Pinjam',
            ]);
        }
       

        DB::table('keranjangs')->where('user_id',$request->id_admin)->delete();


        return redirect('/');
    }
}
