<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berkas;
use App\Penyewa;
use App\User;
use App\Pinjam;
use App\Transaksi;

class PinjamController extends Controller
{
    public function index()
    {
        $dataPinjam = Transaksi::where('status_pinjam','=','Booking')-> get();
        return view('Pinjam.indexPinjam', compact('dataPinjam'));
    }
    public function tambah()
    {
        // $getRow = Transaksi::orderBy('id', 'DESC')->get();
        // $rowCount = $getRow->count();
        
        // $lastId = $getRow->first();

        // $kode = "PMJ00001";
        
        // if ($rowCount > 0) {
        //     if ($lastId->id < 9) {
        //             $kode = "PMJ0000".''.($lastId->id + 1);
        //     } else if ($lastId->id < 99) {
        //             $kode = "PMJ000".''.($lastId->id + 1);
        //     } else if ($lastId->id < 999) {
        //             $kode = "PMJ00".''.($lastId->id + 1);
        //     } else if ($lastId->id < 9999) {
        //             $kode = "PMJ0".''.($lastId->id + 1);
        //     } else {
        //             $kode = "PMJ".''.($lastId->id + 1);
        //     }
        // }
        $dataBerkas = Berkas::where('status_pinjam','=','Tersedia')->get();
        $dataPenyewa = Penyewa::get();
        return view('Pinjam.create', compact('dataBerkas','dataPenyewa'));
    }
    public function create(Request $request)
    {
        // dd($request->all());
       
        Transaksi::create(
            [
                'berkas_id' => $request->berkas_id,
                'penyewas_id' => $request->penyewas_id,
                // 'petugas_id' => $request->petugas_id,
                'tanggal_kembali_berkas' => $request->tanggal_kembali_berkas,
                'tanggal_ambil_berkas' => $request->tanggal_ambil_berkas,
                'status_pinjam' =>'Booking'
            ]
        );

        Berkas::where('id',$request->berkas_id)->update([
            'status_pinjam' => 'Booking',
        ]);
        return redirect('/Pinjam');
    }
    public function edit($id)
    {
        $dataPinjam = Berkas::where('id','=',$id)->first();
        return view('Pinjam.edit',compact('dataPinjam'));
    }
    public function simpanedit(Request $request) {
		Transaksi::where('id',$request->id)->update([
			 'status_pinjam' => 'Pinjam'
		]);
        return redirect('/Pinjam');

    }
    public function updatePinjam(Request $request) {
        $dataTransaksi = Transaksi::where('id','=',$request->id)->first();
		Transaksi::where('id',$request->id)->update([
			 'status_pinjam' => 'Pinjam'
		]);
        Berkas::where('id',$dataTransaksi->berkas_id)->update([
            'status_pinjam' => 'Pinjam',
        ]);
        return redirect('/Pinjam');

    }
    public function updateSimpanPinjam(Request $request) {
		Transaksi::where('id',$request->id)->update([
			 'status_pinjam' => 'Kembali'
		]);
        return redirect('/Pinjam');

    }
    public function detailpinjam($id)
    {
        $datas = Berkas::get();
        $datas = Berkas::where('id','=',$id)-> get();
        return view('Berkas.show', compact('datas'));
    }

    public function hapus($id) {
        $dataBerkas = Berkas::where('id','=',$id)->first();
        // dd($dataBiodata);
        $dataBerkas->delete();
        return redirect('/Berkas');

    }
}
