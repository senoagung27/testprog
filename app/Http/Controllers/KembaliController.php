<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kembali;
use App\Transaksi;
use App\Berkas;
use App\Penyewa;
use App\RincianTransaksi;
use App\JenisHak;
use App\KeranjangPengembalian;
use App\InventoryBaru;
use Carbon\Carbon;
use DateTime;
use Auth;
use DB;

class KembaliController extends Controller
{
    // public function index()
    // {
    //     // $dataKembali = Transaksi::where('status_pinjam','=','Kembali')->get();
    //     // return view('Kembali.indexKembali', compact('dataKembali'));
    //     $dataKembali3 = Transaksi::where([['status_pinjam', '=', 'Pinjam'],]) 
    //     ->doesntHave('isiRincian')
    //     ->orwhereHas('isiRincian', function($q) {
    //         $q->select(\DB::raw('SUM(status_pengembalian) as balance'),\DB::raw('COUNT(status_pengembalian) as followers'))
    //             ->havingRaw('balance != followers');
    //     })->get();


    //     $hari_ini = Carbon::now('Asia/Jakarta')->format('Y-m-d');
    //     $hari_h2 = Carbon::now('Asia/Jakarta')->addDays(2)->format('Y-m-d');
    //     $dataInventoryProses = Transaksi::where('status_pinjam','Pinjam')->whereBetween('tanggal_kembali_berkas', [$hari_ini,$hari_h2])->get();
    //     $dataInventoryWaktu = Transaksi::whereDate('tanggal_kembali_berkas','<' ,$hari_ini)->get();
    //     $jsonObj= array();
	// 	foreach($dataKembali3 as $data){

    //         $fdate = $data->tanggal_kembali_berkas;
	// 		$tdate = Carbon::now('Asia/Jakarta')->format('Y-m-d');
	// 		$datetime1 = new DateTime($fdate);
	// 		$datetime2 = new DateTime($tdate);
	// 		$interval = $datetime1->diff($datetime2);
	// 		$days = $interval->format('%a');//now do whatever you like with $days

	// 		if ($fdate < $tdate) {
	// 			$selisih = $days;
	// 			$pesan = 'Hari';
	// 		} else {
	// 			$selisih = '-'.$days;
	// 			$pesan = 'Hari';
	// 		}

	// 		$row['id'] = $data->id;
	// 		$row['id_booking'] = $data->id_booking;
	// 		$row['berkas_id'] = $data->berkas_id;
	// 		$row['nama_peminjam'] = $data->isiPenyewa->nama_penyewa;
	// 		$row['status_pinjam'] = $data->status_pinjam;
	// 		$row['tanggal_ambil'] = $data->tanggal_ambil_berkas;
	// 		$row['tanggal_kembali'] = $data->tanggal_kembali_berkas;
	// 		$row['tanggal_reminder'] = $selisih.' '.$pesan;
						
	// 		array_push($jsonObj,$row);
	// 	}
    //     // dd($jsonObj);
    //     dd($dataInventoryWaktu);
    //     // $dataPenyewa = Penyewa::all();
    //     return view('Kembali.indexKembali', compact('jsonObj','dataKembali3'));
    // }
    public function index()
    {
        $userId = Auth::user()->id;
        $keranjangKembali = KeranjangPengembalian::where('user_id',$userId)->get();
        $dataJenisHak = JenisHak::get();
        $kelurahan = DB::table('kelurahan_desas')->get();
        $dataPenyewa = Penyewa::get();
        return view('TransaksiPengembalian.indexPengembalian', compact('keranjangKembali','dataJenisHak','kelurahan','dataPenyewa'));        
    }

    public function SimpanKeranjangPengembalian(Request $request) {
        $daftarNomor = explode(',', $request->nomor);

        foreach ($daftarNomor as $value) {
            $dataKeranjangCek = InventoryBaru::where([
                ['jenis_id', '=', $request->jenis_id],
                ['nomor', '=', $value],
                ['kecamatan', '=', $request->kecamatan],
                ['kelurahan_desa', '=', $request->kelurahan],
                ['status', '=', 'Dipinjam'],
            ])->first();

            if ($dataKeranjangCek != null) {

                $dataTransaksiRincian = RincianTransaksi::where('berkas_id',$dataKeranjangCek->id)->latest('created_at')->first();

                KeranjangPengembalian::create([                        
                    'id_rincian_transaksi' => $dataTransaksiRincian->id,
                    'jenis_id' => $dataTransaksiRincian->isiInventory->jenis_id,
                    'nomor' => $dataTransaksiRincian->isiInventory->nomor,
                    'kecamatan' => $dataTransaksiRincian->isiInventory->kecamatan,
                    'kelurahan_desa' => $dataTransaksiRincian->isiInventory->kelurahan_desa,
                    'user_id' => $request->user_id,
                ]);
            }            
        }
        // return redirect('/Pengembalian')->with('tambah', 'Data Berhasil Ditambah');
        return redirect('/Pengembalian');
        
    }

    public function SimpanTransaksiPengembalian(Request $request) {
        $dataPengembalian = KeranjangPengembalian::where('user_id',$request->user_id)->get();
        foreach ($dataPengembalian as $value) {
            // dd($value);
            // Transaksi::where('id',$value)->update([
            //     'status_pinjam' => 'Kembali'
            // ]);
            InventoryBaru::where('id',$value->isiRincianTransaksi->berkas_id)->update([
                'tanggal_pengembalian_berkas' => $request->tanggal_pengembalian_berkas,
                'status' => 'Tersedia'
            ]);
            RincianTransaksi::where('berkas_id',$value->isiRincianTransaksi->berkas_id)->update([
                'tanggal_pengembalian_berkas' => $request->tanggal_pengembalian_berkas,
                'status_pengembalian' => 1
            ]);
            // dd($dataPengembalian);
        }
            
        $dataPengembalianHapus = KeranjangPengembalian::where('user_id',$request->user_id)->delete();
       
        return redirect('/');
        
    }
    
    public function tambah()
    {
        $dataBerkas = Berkas::where('status_pinjam','=','Tersedia')->get();
        $dataPenyewa = Penyewa::get();
        return view('Kembali.create', compact('dataBerkas','dataPenyewa'));
    }
    public function create(Request $request)
    {
        // dd($request->all());
        Transaksi::create(
            [
                'berkas_id' => $request->berkas_id,
                'penyewas_id' => $request->penyewas_id,
                'petugas_id' => $request->petugas_id,
                'tanggal_ambil_berkas' => $request->tanggal_ambil_berkas,
            ]
        );

        Berkas::where('id',$request->berkas_id)->update([
            'status_pinjam' => 'Booking',
       ]);
        return redirect('/');
    }
    public function Pengembalian(Request $request) {
        // dd($request->all());
        $dataKembali = Transaksi::where('id','=',$request->id)->first();
		Berkas::where('id',$request->id)->update([
			 'status_pinjam' => 'Kembali'
		]);
        // Berkas::where('id',$dataKembali->berkas_id)->update([
        //     'status_pinjam' => 'Kembali',
        // ]);
        return redirect('/Kembali');
        // return view('Kembali.indexKembali', compact('dataKembali'));

    }
    public function updateKembali(Request $request) {
        $dataTransaksi = Berkas::where('id','=',$request->id)->first();
		Berkas::where('id',$request->id)->update([
			 'status_pinjam' => 'Tersedia'
		]);
        Berkas::where('id',$dataTransaksi->berkas_id)->update([
            'status_pinjam' => 'Tersedia',
        ]);
        return redirect('/Kembali');

    }

    public function edit($id)
    {
        Berkas::where('id',$request->id)->update([
            'status_pinjam' => 'Tersedia'
       ]);
        return view('Transaksi.edit',compact('dataTransaksi'));
    }
    public function simpanedit(Request $request) {
		Berkas::where('id',$request->id)->update([
			 'status_pinjam' => 'Tersedia',
		]);
        return redirect('/Kembali');

    }
    public function hapus($id) {
        $dataTransaksi = Transaksi::where('id','=',$id)->first();
        // dd($dataBiodata);
        $dataTransaksi->delete();
        return redirect('/Kembali');

    }

    public function detailkembalikan($id)
    {
        // $dataKembali = Transaksi::where('status_pinjam','=','Pinjam')
        // withCount('isiRincian')
        //  ->having('status_pengembalian', '=', 3)
        // ->get();
        $datas = RincianTransaksi::where('transaksi_id','=',$id)->where('status_pengembalian',0)->get();
        // $dataKembali = RincianTransaksi::get();
        return view('Kembali.indexKembali', compact('datas'));
    }

    public function SimpanPengembalian(Request $request)
    {
        // dd(count($request->ceklis));
        if ($request->ceklis != null) { 

            foreach ($request->ceklis as $value) {
                // dd($value);
                Transaksi::where('id',$value)->update([
                 'status_pinjam' => 'Kembali'
               ]);
                Berkas::where('berkas_id',$value)->update([
                    'status_pinjam' => 'Tersedia'
               ]);
                RincianTransaksi::where('berkas_id',$value)->update([
                    'status_pengembalian' => 1
               ]);
            }
            
           
            // for($i = 0; $i < count($request->ceklis) ; $i++) {
            //     Berkas::where('id',$request->ceklis[i])->update([
            //         'status_pinjam' => 'Tersedia'
            //    ]);
            // }
        }
       
        return redirect('/');
    }
    public function detailInventory($id)
    {
        // $dataKembali = Transaksi::where('status_pinjam','=','Pinjam')
        // withCount('isiRincian')
        //  ->having('status_pengembalian', '=', 3)
        // ->get();

        
        $datas = RincianTransaksi::where('transaksi_id','=',$id)->where('status_pengembalian',0)->get();
        // $dataKembali = RincianTransaksi::get();
        return view('Kembali.detailpeminjaman', compact('datas'));
    }
    public function SimpanInventory(Request $request)
    {
        // dd(count($request->ceklis));
        if ($request->ceklis != null) { 

            foreach ($request->ceklis as $value) {
                // dd($value);
                $data = RincianTransaksi::where('berkas_id',$value)->first();
                // dd($data);
                Transaksi::where('id_booking',$data->transaksi_id)->update([
                 'tanggal_pengembalian_berkas' => $request->tanggal_pengembalian_berkas,
                 'status_pinjam' => 'Kembali'
               ]);
                InventoryBaru::where('id',$value)->update([
                    'tanggal_pengembalian_berkas' => $request->tanggal_pengembalian_berkas,
                    'status' => 'Tersedia'
               ]);
                RincianTransaksi::where('berkas_id',$value)->update([
                    'tanggal_pengembalian_berkas' => $request->tanggal_pengembalian_berkas,
                    'status_pengembalian' => 1
               ]);
               
            }
           
            // for($i = 0; $i < count($request->ceklis) ; $i++) {
            //     Berkas::where('id',$request->ceklis[i])->update([
            //         'status_pinjam' => 'Tersedia'
            //    ]);
            // }
        }
       
        return redirect('/Pengembalian');
    }
    
}