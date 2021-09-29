<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporan;
use App\Berkas;
use App\Penyewa;
use App\Transaksi;
use App\RincianTransaksi;
use App\JenisHak;
use PDF;
use DB;
use App\InventoryBaru;
use Session;
 
use App\Imports\InventoryImport;
set_time_limit(10800);

use App\Exports\BerkasExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    private $searchParams = ['jenis_id','nomor','kecamatan','kelurahan_desa','tanggal_pengambilan_berkas',];
    public function index(Request $request)
    {
        // $dataBerkas = Berkas::get();
        $dataTransaksi = Transaksi::get();
        $dataPenyewa = Penyewa::get();
        $dataJenisHak = JenisHak::get();
        
        // $district = DB::table('districts')->pluck("name","id");
        $kelurahan = DB::table('kelurahan_desas')->get();

        $dataBerkas = InventoryBaru::orderBy('id', 'desc');
        // $dataBerkas = InventoryBaru::select('*');
        // dd($dataBerkas);

        if($request->get('jenis_id')) {
            $dataBerkas->where(function($q) use($request) {
                $q->where('jenis_id', '=',$request->get('jenis_id'));
            });
        }

        if($request->get('nomor')) {
            $dataBerkas->where(function($q) use($request) {
                $q->where('nomor', 'LIKE', '%' . $request->get('nomor') . '%');
            });
        }
        if($request->get('kecamatan')) {
            $dataBerkas->where(function($q) use($request) {
                $q->where('kecamatan', 'LIKE', '%' . $request->get('kecamatan') . '%');
            });
        }
        if($request->get('kelurahan_desa')) {
            $dataBerkas->where(function($q) use($request) {
                $q->where('kelurahan_desa', 'LIKE', '%' . $request->get('kelurahan_desa') . '%');
            });
        }
        if($request->get('tanggal_pengambilan_berkas')) {
            $dataBerkas->where(function($q) use($request) {
                $q->where('tanggal_pengambilan', 'LIKE', '%' . $request->get('tanggal_pengambil_berkas') . '%');
            });
        }


        // return view('Laporan.index', compact('dataTransaksi','dataPenyewa','dataJenisHak','kelurahan'))->withDataBerkas($dataBerkas->get());
        return view('Laporan.index', compact('dataTransaksi','dataPenyewa','dataJenisHak','kelurahan'))->withDataBerkas($dataBerkas->paginate(10));
    }
    public function postIndex(Request $request) {
        $params = array_filter($request->only($this->searchParams));
        return redirect()->action('LaporanController@index', $params);
    }
     public function test()   {
        $jsonObj= array();
        $dataTransaksi = RincianTransaksi::orderBy('id', 'DESC')->get();
        foreach($dataTransaksi as $data) {  
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
       
        return view('Laporan.test',compact('jsonObj'));
    }
    public function laporan_anggota()
    {
        $dataBerkas = Berkas::get();
        // $dataTransaksi = Transaksi::get();
        $dataPenyewa = Penyewa::get();
        return view('Laporan.indexlaporananggota', compact('dataBerkas','dataPenyewa'));
    }
    public function filterdateberkas(Request $request)
    {
        // dd($request->all());
        // Berkas::create($request->all());
        // $dataBerkas = Berkas::get();
        $dari = $request ->dari;
        $ke = $request ->ke;
        $dataBerkas= InventoryBaru::whereBetween('updated_at', [$dari.' 00:00:00',$ke.' 23:59:59'])->get();
        // dd($dataBerkas);
        return view('Laporan.data.laporanBerkas', compact('dataBerkas','ke','dari'));
    }
    public function detailberkas($id)
    {
        $datas = Berkas::all();
        $datas = Berkas::where('id','=',$id)-> get();
        return view('Berkas.show', compact('datas'));
    }
    public function cetak_pdf()
    {   
        $dataBerkas = Berkas::get();
        $pdf = PDF::loadView('Laporan.pdf_cetak',  ['dataBerkas' => $dataBerkas]);
        return $pdf->download('laporan.pdf');
    	
        // $pdf = PDF::loadView('Laporan.cetak_pdf', compact('dataBerkas'));
        // return $pdf->download('laporanberkas.pdf');
        // $pdf = PDF::loadView('cetak_pdf', $dataBerkas);
	    // return $pdf->stream('document.pdf');
        // return view('Laporan.cetak_pdf', compact('dataBerkas'));
    }
    // public function export_excel()
	// {
	// 	return Excel::download(new BerkasExport, 'berkas.xlsx');
	// }
//     public function export_excel(Request $request){

//         $tanggal_otomatis = $this->convertdate();
//         $dari = $request->dari;
//         $ke = $request->ke;
//         $headings = [
//             'No Berkas', 
//             'Nama Berkas', 
//             'Status',
//             'Nama Pemegang Hak',
//             'Tanggal Lahir',
//             'No Hak Milik',
//             'Kelurahan',
//             'NIB',
//             'Letak Tanah',
//             'Daftar Isian 202',
//             'Surat Ukur',
//             'Tanggal',
//             'Nomor',
//             'Luas'
//         ];

// //         $ee = Berkas::select('nomor_berkas','nama_berkas')->whereBetween('updated_at', [$dari.' 00:00:00',$ke.' 23:59:59'])->get();
// // dd($dari,$ke,$ee);

//         // return (new TransactionsExport($date,$headings))->download($date.'_inventory.xlsx');
//         return Excel::download(new BerkasExport($dari,$ke,$tanggal_otomatis,$headings), 'laporan.xlsx');

//     }

    public static function convertdate(){
        date_default_timezone_set('Asia/Jakarta');
        $date = date('d/m/Y');
        return $date;
    }
    public function hapus($id) {
        $dataInventoryBerkas = InventoryBaru::where('id','=',$id)->first();
        // dd($dataBiodata);
        $dataInventoryBerkas->delete();
        return redirect()->back();

    }
    public function edit($id)
    {
        $dataBerkas = InventoryBaru::where('id','=',$id)->first();
        $dataJenisHak = JenisHak::where('id','=',$id)->first();
        // $dataBerkas = InventoryBaru::get();
        return view('Laporan.edit',compact('dataBerkas','dataJenisHak'));
    }
    public function simpanedit(Request $request) {
		InventoryBaru::where('id',$request->id)->update([
			 'nama_jenis_hak' => $request->nama_jenis_hak,
			 'nomor' => $request->nomor,
			 'kecamatan' => $request->kecamatan,
			 'kelurahan_desa' => $request->kelurahan_desa,
			 'status' => $request->status,
			 'status_berkas' => $request->status_berkas,
			 'ruangan_id' => $request->ruangan_id,
			 'lemari_id' => $request->lemari_id,
			 'rak_id' => $request->rak_id,
		]);
        return redirect('/JenisHak')->with('edit', 'Data Berhasil Di Edit');

    }

    // public function filterdateberkas()
    // {
    //    DB::table('berkas')->whereDate($day);
    //    DB::table('berkas')->whereMonth($month);
    //    DB::table('berkas')->whereYear($year);
    //     return view('Laporan.index', compact('date','day','month','year'));
    // }
    // public function berkasFilter(Request $request){
    //     $month = $request->get('month');
    //     $year = $request->get('year');
            
    //     $dataBerkas = Berkas::whereYear('created_at', '=', $year)
    //               ->whereMonth('created_at', '=', $month)
    //               ->get();
            
            
    //         return view('Laporan.index', ['dataBerkas' => $dataBerkas]);
    //     }
    // public function import_excel(Request $request) 
	// {
	// 	// validasi
	// 	$this->validate($request, [
	// 		'file' => 'required|mimes:csv,xls,xlsx'
	// 	]);
 
	// 	// menangkap file excel
	// 	$file = $request->file('file');
 
	// 	// membuat nama file unik
	// 	$nama_file = rand().$file->getClientOriginalName();
 
	// 	// upload ke folder file_siswa di dalam folder public
	// 	$file->move('file_inventory',$nama_file);
 
	// 	// import data
	// 	Excel::import(new InventoryImport, public_path('/file_inventory/'.$nama_file));
 
	// 	// notifikasi dengan session
	// 	Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
	// 	// alihkan halaman kembali
	// 	return redirect('/Laporan');
	// }
    public function import_excel(Request $request) {
		Excel::import(new InventoryImport, $request->file('file'));
		$message = 'Upload Success';
		return redirect()->back()->withMessage($message);
	}
    public function dataKel($id) {        
        $kelurahan = DB::table("kelurahan_desas")->where("kecamatan_id",$id)->pluck("nama","id");
        // $distr = DB::table("raks")->where("lemaris_id",$id)->pluck("nama_rak","id");
        return json_encode($kelurahan);
    }
    public function dataKec($id) {        
        $kecamatan = DB::table("kecamatans")->where("id",$id)->pluck("nama","id");
        // $distr = DB::table("raks")->where("lemaris_id",$id)->pluck("nama_rak","id");
        return json_encode($kecamatan);

    }
    
    

}