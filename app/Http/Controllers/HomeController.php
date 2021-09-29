<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Berkas;
use App\Penyewa;
use App\RincianTransaksi;
use App\KeranjangBaru;
use App\InventoryBaru;
use Carbon\Carbon;
use DateTime;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dataTransaksi = Transaksi::all();
        $dataKeranjangBaru = KeranjangBaru::all();
        $dataPenyewa = Penyewa::get();
        $dataTransaksi = Transaksi::count();
        $dataPenyewa = Penyewa::count();
        $dataTotalBerkas = InventoryBaru::count();
        $dataPijam = InventoryBaru::where('status','=','Dipinjam')->count();
        $dataTotalRincian = RincianTransaksi::count();
        $dataTotalTransaksi = Transaksi::count();
        $dataKembali = Transaksi::count();
        $dataTransaksi = Transaksi::where('status_pinjam','=','Pinjam')->count();
        $hari_ini = Carbon::now('Asia/Jakarta')->format('Y-m-d');
        $dataTotalPinjam = InventoryBaru::where('status','=','Dipinjam')->count();
        $dataKembali3 = Transaksi::where([['status_pinjam', '=', 'Pinjam'],])
        ->whereDate('tanggal_kembali_berkas','<' ,$hari_ini) 
        // ->doesntHave('isiRincian')
        // ->orwhereHas('isiRincian', function($q) {$q
        // ->select(\DB::raw('SUM(status_pengembalian) as balance'),\DB::raw('COUNT(status_pengembalian) as followers'))
        // ->havingRaw('balance != followers');
        // })
        ->get();
        // dd($dataKembali3);

       
        $hari_h2 = Carbon::now('Asia/Jakarta')->addDays(2)->format('Y-m-d');
        $dataInventoryProses = Transaksi::where('status_pinjam','Pinjam')->whereBetween('tanggal_kembali_berkas', [$hari_ini,$hari_h2])->get();
        // $dataInventoryProses = Transaksi::where('status_pinjam','Pinjam')->whereDate('tanggal_kembali_berkas','>' ,$hari_ini)->get();
        $dataInventoryWaktu = Transaksi::whereDate('tanggal_kembali_berkas','>' ,$hari_ini)->get();
        $jsonObj= array();
		foreach($dataKembali3 as $data){

            $fdate = $data->tanggal_kembali_berkas;
			$tdate = Carbon::now('Asia/Jakarta')->format('Y-m-d');
			$datetime1 = new DateTime($fdate);
			$datetime2 = new DateTime($tdate);
			$interval = $datetime1->diff($datetime2);
			$days = $interval->format('%a');//now do whatever you like with $days

			if ($fdate < $tdate) {
				$selisih = $days;
				$pesan = 'Hari';
			} else {
				$selisih = '-'.$days;
				$pesan = 'Hari';
			}

			$row['id'] = $data->id;
			$row['id_booking'] = $data->id_booking;
			$row['berkas_id'] = $data->berkas_id;
			$row['nama_peminjam'] = $data->isiPenyewa->nama_penyewa;
			$row['status_pinjam'] = $data->status_pinjam;
			$row['tanggal_ambil'] = $data->tanggal_ambil_berkas;
			$row['tanggal_kembali'] = $data->tanggal_kembali_berkas;
			$row['tanggal_reminder'] = $selisih.' '.$pesan;
			$row['jumlah'] = $data->isiRincian->count('berkas_id');
						
			array_push($jsonObj,$row);
		}
        // dd($jsonObj);
// dd($dataInventoryWaktu);
        // $dataPenyewa = Penyewa::all();
        return view('home', compact('dataTotalTransaksi','dataPijam','jsonObj','dataTotalPinjam','dataKeranjangBaru','dataPenyewa','dataKembali','dataKembali3','dataTotalBerkas','dataTotalRincian','dataInventoryProses'));
    }
    public function transaksiTerbaru()
    {
        $datas = Transaksi::get();
        return view('home', compact('datas'));
    }
    public function MonitorBerkas() {
        // dd($request->all());
        $datas = Berkas::where('status_pinjam','=','Pinjam')-> get();
        return view('monitorberkas', compact('datas'));

    }
    


}
