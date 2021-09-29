<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berkas;
use App\Transaksi;
use App\Penyewa;
use App\RincianTransaksi;
use App\InventoryBaru;
use DB;
use App\JenisHak;

class LaporanTransaksiController extends Controller
{
    private $searchParams = ['jenis_id','nomor','kecamatan','kelurahan_desa','tanggal_ambil_berkas','tanggal_pengembalian_berkas',];
    public function index(Request $request)
    {
        $jsonObj= array();
         $dataJenisHak = JenisHak::get();
        // $district = DB::table('districts')->pluck("name","id");
        $kelurahan = DB::table('kelurahan_desas')->get();
        // $dataTransaksi = RincianTransaksi::get();
        $dataPenyewa = Penyewa::get();
        $dataTransaksi = RincianTransaksi::orderBy('id', 'DESC');
          if($request->get('jenis_id')) {
            $dataTransaksi->whereHas('isiInventory.isiJenis', function($q) use($request){
                $q->where('id', '=',$request->get('jenis_id'));
             });
            };
            if($request->get('nomor')) {
                $dataTransaksi->whereHas('isiInventory', function($q) use($request){
                    $q->where('nomor', '=',$request->get('nomor'));
                 });
                };
                if($request->get('kecamatan')) {
                    $dataTransaksi->whereHas('isiInventory.isiKecamatan', function($q) use($request){
                        $q->where('id', '=',$request->get('kecamatan'));
                     });
                    };
                if($request->get('kelurahan')) {
                    $dataTransaksi->whereHas('isiInventory.isiKelurahan', function($q) use($request){
                        $q->where('id', '=',$request->get('kelurahan'));
                     });
                    };
                    if($request->get('tanggal_pengembalian_berkas')) {
                        $dataTransaksi->whereHas('isiTransaksi', function($q) use($request){
                            $q->where('tanggal_pengembalian_berkas', '=',$request->get('tanggal_pengembalian_berkas'));
                         });
                        };
                    if($request->get('tanggal_ambil_berkas')) {
                        $dataTransaksi->whereHas('isiTransaksi', function($q) use($request){
                            $q->where('tanggal_ambil_berkas', '=',$request->get('tanggal_ambil_berkas'));
                         });
                        };
            // dd($dataCari->get());
        
        

        // if($request->get('nomor')) {
        //     $dataCari->where(function($q) use($request) {
        //         $q->where('nomor', 'LIKE', '%' . $request->get('nomor') . '%');
        //     });
        // }
        
        if($request->get('kelurahan_desa')) {
            $dataTransaksi->where(function($q) use($request) {
                $q->where('kelurahan_desa', 'LIKE', '%' . $request->get('kelurahan_desa') . '%');
            });
        }
        foreach($dataTransaksi->get() as $data) {  
				$row = $data->isiInventory->nomor;          
				$row = array($data->transaksi_id, 
                            $data->isiInventory->nomor,
                            $data->isiInventory->isiJenis->nama_jenis_hak, 
                            $data->isiInventory->isiKecamatan->nama,
                            $data->isiInventory->isiKelurahan->nama,
                            $data->isiTransaksi->isiPenyewa->nama_penyewa,
                            $data->isiTransaksi->isiPetugas->name,
                            $data->isiInventory->status,
                            $data->isiTransaksi->tanggal_ambil_berkas,
                            $data->isiTransaksi->tanggal_pengembalian_berkas,
                            
                        );  
				array_push($jsonObj,$row);
        }
      
        // dd($jsonObj);
        // dd($dataTransaksi);
       
        return view('LaporanTransaksi.index', compact('dataJenisHak','kelurahan','dataPenyewa','jsonObj'));
    }
    public function postIndex(Request $request) {
        $params = array_filter($request->only($this->searchParams));
        return redirect()->action('LaporanTransaksiController@index', $params);
    }
    public function filterdatetransaksi(Request $request)
    {
        $dataCari = InventoryBaru::orderBy('id', 'asc');

        if($request->get('jenis_id')) {
            $dataCari->where(function($q) use($request) {
                $q->where('jenis_id', 'LIKE', '%' . $request->get('jenis_id') . '%');
            });
        }

        if($request->get('nomor')) {
            $dataCari->where(function($q) use($request) {
                $q->where('nomor', 'LIKE', '%' . $request->get('nomor') . '%');
            });
        }
        if($request->get('kecamatan')) {
            $dataCari->where(function($q) use($request) {
                $q->where('kecamatan', 'LIKE', '%' . $request->get('kecamatan') . '%');
            });
        }
        if($request->get('kelurahan_desa')) {
            $dataCari->where(function($q) use($request) {
                $q->where('kelurahan_desa', 'LIKE', '%' . $request->get('kelurahan_desa') . '%');
            });
        }
        if($request->get('tanggal_pengambilan_berkas')) {
            $dataCari->where(function($q) use($request) {
                $q->where('tanggal_pengambilan', 'LIKE', '%' . $request->get('tanggal_pengambil_berkas') . '%');
            });
        }
        // dd($request->all());
        // Berkas::create($request->all());
        // $dataBerkas = Berkas::get();
        // $jenis_id = $request->jenis_id;
        // $nomor = $request->nomor;
        // $kecamatan = $request->kecamatan;
        // $kelurahan_desa = $request->kelurahan_desa;
     
        // dd($request->all());
        // $dataCari = InventoryBaru::where('nomor','like',"%".$nomor."%")
        // ->Orwhere('jenis_id','=',$jenis_id)
        // ->Orwhere('kecamatan','like',"%".$kecamatan."%")
        // ->Orwhere('kelurahan_desa','like',"%".$kelurahan_desa."%")
        // ->get();
        // $dari = $request ->dari;
        // $ke = $request ->ke;
        // $dataTransaksi= RincianTransaksi::whereBetween('updated_at', [$dari.' 00:00:00',$ke.' 23:59:59'])->get();
        // dd($dataBerkas);
        // return view('LaporanTransaksi.data.laporanTransaksi', compact('dataCari'));
        return view('LaporanTransaksi.data.laporanTransaksi')->withDataCari($dataCari->get());
    }
    public function detailberkas($id)
    {
        $datas = Transaksi::all();
        $datas = Transaksi::where('id','=',$id)-> get();
        return view('Transaksi.show', compact('datas'));
    }
    // public function datatransaksi(Request $request)   {
    //     $jsonObj= array();
    //      $dataJenisHak = JenisHak::get();
    //     // $district = DB::table('districts')->pluck("name","id");
    //     $kelurahan = DB::table('kelurahan_desas')->get();
    //     // $dataTransaksi = RincianTransaksi::get();
    //     $dataPenyewa = Penyewa::get();
    //     $dataTransaksi = RincianTransaksi::orderBy('id', 'DESC')->get();
    //     foreach($dataTransaksi as $data) {  
	// 			$row = $data->isiInventory->nomor;          
	// 			$row = array($data->transaksi_id, 
    //                         $data->isiInventory->nomor,
    //                         $data->isiInventory->isiJenis->nama_jenis_hak, 
    //                         $data->isiInventory->isiKecamatan->nama,
    //                         $data->isiInventory->isiKelurahan->nama,
    //                         $data->isiTransaksi->isiPenyewa->nama_penyewa,
    //                         $data->isiTransaksi->isiPetugas->name,
    //                         $data->isiInventory->status,
    //                         $data->isiTransaksi->tanggal_ambil_berkas,
    //                         $data->isiTransaksi->tanggal_pengembalian_berkas,
                            
    //                     );  
	// 			array_push($jsonObj,$row);
    //     }
    //     if($request->get('jenis_id')) {
    //         $dataTransaksi->whereHas('isiRincian.isiInventory.isiJenis', function($q) use($request){
    //             $q->where('id', '=',$request->get('jenis_id'));
    //          });
    //         };
    //         if($request->get('nomor')) {
    //             $dataTransaksi->whereHas('isiRincian.isiInventory', function($q) use($request){
    //                 $q->where('nomor', '=',$request->get('nomor'));
    //              });
    //             };
    //             if($request->get('kecamatan')) {
    //                 $dataTransaksi->whereHas('isiRincian.isiInventory.isiKecamatan', function($q) use($request){
    //                     $q->where('id', '=',$request->get('kecamatan'));
    //                  });
    //                 };
    //             if($request->get('kelurahan')) {
    //                 $dataTransaksi->whereHas('isiRincian.isiInventory.isiKelurahan', function($q) use($request){
    //                     $q->where('id', '=',$request->get('kelurahan'));
    //                  });
    //                 };
    //                 if($request->get('tanggal_pengembalian_berkas')) {
    //                     $dataTransaksi->whereHas('isiRincian.isiTransaksi', function($q) use($request){
    //                         $q->where('tanggal_pengembalian_berkas', '=',$request->get('tanggal_pengembalian_berkas'));
    //                      });
    //                     };
    //                 if($request->get('tanggal_ambil_berkas')) {
    //                     $dataTransaksi->whereHas('isiRincian.isiTransaksi', function($q) use($request){
    //                         $q->where('tanggal_ambil_berkas', '=',$request->get('tanggal_ambil_berkas'));
    //                      });
    //                     };
    //         // dd($dataCari->get());
        
        

    //     // if($request->get('nomor')) {
    //     //     $dataCari->where(function($q) use($request) {
    //     //         $q->where('nomor', 'LIKE', '%' . $request->get('nomor') . '%');
    //     //     });
    //     // }
        
    //     if($request->get('kelurahan_desa')) {
    //         $dataTransaksi->where(function($q) use($request) {
    //             $q->where('kelurahan_desa', 'LIKE', '%' . $request->get('kelurahan_desa') . '%');
    //         });
    //     }
    //     // dd($jsonObj);
    //     // dd($dataTransaksi);
       
    //     return view('LaporanTransaksi.index',compact('jsonObj','kelurahan','dataJenisHak','dataPenyewa'))->withDataCari($dataTransaksi->get());
    // }
    public function export_excel(Request $request){

        $tanggal_otomatis = $this->convertdate();
        $dari = $request->dari;
        $ke = $request->ke;
        $headings = [
            'No Booking', 
            'Nama Berkas', 
            'Nama Peminjam', 
            'Status', 
            'Tanggal Pengambilan', 
            'Tanggal Pengembalian', 
            'Tanggal Verifikasi',
        ];

//         $ee = Berkas::select('nomor_berkas','nama_berkas')->whereBetween('updated_at', [$dari.' 00:00:00',$ke.' 23:59:59'])->get();
// dd($dari,$ke,$ee);

        // return (new TransactionsExport($date,$headings))->download($date.'_inventory.xlsx');
        return Excel::download(new BerkasExport($dari,$ke,$tanggal_otomatis,$headings), 'laporan.xlsx');

    }
    public static function convertdate(){
        date_default_timezone_set('Asia/Jakarta');
        $date = date('d/m/Y');
        return $date;
    }
    public function pencarian()
    {
        $dataCari = DB::table('inventory_barus')->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('LaporanTransaksi.cari',['dataCari' => $dataCari]);
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
     
        // dd($jsonObjBerkas);
        $dataCari = DB::table('inventory_barus')
        ->where('nomor','like',"%".$cari."%")
        ->Orwhere('jenis_id','like',"%".$cari."%")
        ->Orwhere('kecamatan','like',"%".$cari."%")
        ->Orwhere('kecamatan_desa','like',"%".$cari."%")
        ->get();
     
        return view('LaporanTransaksi.hasil', compact('dataCari'));
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
  public function datasKel($id) {        
        $kelurahan = DB::table("kelurahan_desas")->where("kecamatan_id",$id)->pluck("nama","id");
        // $distr = DB::table("raks")->where("lemaris_id",$id)->pluck("nama_rak","id");
        return json_encode($kelurahan);
    }
    public function datasKec($id) {        
        $kecamatan = DB::table("kecamatans")->where("id",$id)->pluck("nama","id");
        // $distr = DB::table("raks")->where("lemaris_id",$id)->pluck("nama_rak","id");
        return json_encode($kecamatan);

    }
    public function hapus($id) {
        $dataCari = Transaksi::where('id','=',$id)->first();
        // dd($dataTransaksi);
        $dataCari->delete();
        return redirect()->back();

    }

}