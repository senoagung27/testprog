<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Berkas;
use App\Penyewa;
use App\User;
use PDF;
use App\RincianTransaksi;
use App\KeranjangBaru;
use App\InventoryBaru;

class TransaksiController extends Controller
{
    public function index()
    {
        $dataTransaksi = RincianTransaksi::get();
        // $dataTransaksi = RincianTransaksi::get();
        // $dataTransaksi = Transaksi::where('status_pinjam','=','Pinjam')-> get();
        return view('Transaksi.indexTransaksi', compact('dataTransaksi'));
    }

    public function simpanedit(Request $request) {
		Transaksi::where('id',$request->id)->update([
			 'tanggal_ambil_berkas' => $request->tanggal_ambil_berkas,
			 'status_pinjam' => $request->status_pinjam,
		]);
        return redirect('/Transaksi');

    }
    public function hapus($id) {
        $dataTransaksi = RincianTransaksi::where('id','=',$id)->first();
        // dd($dataBiodata);
        $dataTransaksi->delete();
        return redirect('/Transaksi');

    }
    public function detailtransaksi($id)
    {
        // $dataTransaksi = Transaksi::get();
        $dataBerkas = Berkas::get();
        $datas = RincianTransaksi::where('transaksi_id','=',$id)->where('status_pengembalian',0)->get();
        // dd($datas);
        // $datas = Berkas::where('id','=',$id)-> get();

        return view('Transaksi.show', compact('datas','dataBerkas'));
    }
    public function cetak_pdf()
    {   
       
        // $dataBerkas = Berkas::get();
        // $pdf = PDF::loadView('Laporan.data.laporanBerkas', compact('dataBerkas'));
        // return $pdf->download('laporan.pdf_cetak'.date('Y-m-d_H-i-s').'.pdf');
 
    	$dataBerkas = Transaksi::get();
        $pdf = PDF::loadView('Transaksi.pdf_cetak', compact('dataBerkas'));
        return $pdf->download('Laporan.pdf');
    }
}