<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyewa;
use App\JenisHak;
use App\Transaksi;
use DB;
use App\KeranjangBaru;
use App\Sertifikat;
use Auth;
use Carbon\Carbon;
use App\RincianTransaksi;
use App\KeranjangSertifikat;
use App\InventoryBaru;
use App\Kelurahan_desa;


class SertifikatController extends Controller
{
    public function index()
    {
        
        $dataKeranjangBaru = KeranjangSertifikat::get();
        $dataPenyewa = Penyewa::get();
        $dataJenisHak = JenisHak::get();
        $dataTransaksi = Transaksi::get();
        // dd($dataKeranjangBaru);
        $kelurahan = DB::table('kelurahan_desas')->get();
        $district = DB::table('districts')->pluck("name","id");
        $dataRuangan = DB::table('ruangans')->pluck("nama_ruangan","id");
        return view('Sertifikat.index', compact('dataKeranjangBaru','kelurahan','dataTransaksi','district','dataRuangan','dataJenisHak','dataPenyewa'));

    }
    public function sertifikat()
    {
        $dataSertifikat = Sertifikat::get();
        return view('Sertifikat.sertifikat', compact('dataSertifikat'));

    }
     public function SimpanKeranjangSertifika(Request $request)
    {
        
        $daftarNomor = explode(',', $request->nomor);
        
        

        foreach ($daftarNomor as $value) {
            // dd($value);
            $dataKelurahan = Kelurahan_desa::where('kecamatan_id',$request->kecamatan)->first();
            $dataKeranjangCek = KeranjangSertifikat::where([
                ['jenis_id', '=', $request->jenis_id],
                ['nomor', '=', $value],
                ['kecamatan', '=', $request->kecamatan],
                ['kelurahan_desa', '=', $dataKelurahan->id],
            ])->first();

            if ($dataKeranjangCek != null) {
                return redirect()->back();
            } else {
                // dd($request->all());
                $dataCek = InventoryBaru::where([
                    ['jenis_id', '=', $request->jenis_id],
                    ['nomor', '=', $value],
                    ['kecamatan', '=', $request->kecamatan],
                    ['kelurahan_desa', '=', $request->kelurahan],
                ])->first();

                if ($dataCek != null) {

                    if ($dataCek->status === 'Tersedia') {
                        KeranjangSertifikat::create([
                        
                            'jenis_id' => $request->jenis_id,
                            'nomor' => $value,
                            'status' => $request->status,
                            'kecamatan' => $request->kecamatan,
                            'kelurahan_desa' => $request->kelurahan,
                            'status' => 'Tersedia',
                            'rak_id' => $dataCek->rak_id,
                            'lemari_id' => $dataCek->lemari_id,
                            'ruangan_id' => $dataCek->ruangan_id,
                            'user_id' => $request->user_id,
                        ]);
                    } else {
                        KeranjangSertifikat::create([
                        
                            'jenis_id' => $request->jenis_id,
                            'nomor' => $value,
                            'status' => $request->status,
                            'kecamatan' => $request->kecamatan,
                            'kelurahan_desa' => $request->kelurahan,
                            'status' => 'Dipinjam',
                            'rak_id' => $dataCek->rak_id,
                            'lemari_id' => $dataCek->lemari_id,
                            'ruangan_id' => $dataCek->ruangan_id,
                            'user_id' => $request->user_id,
                        ]);
                    }
                } else {
                    KeranjangSertifikat::create([
                        
                        'jenis_id' => $request->jenis_id,
                        'nomor' => $value,
                        'status' => $request->status,
                        'kecamatan' => $request->kecamatan,
                        'kelurahan_desa' => $request->kelurahan,
                        'status' => 'Belum Terdaftar',
                        'rak_id' => $request->rak_id,
                        'lemari_id' => $request->lemari_id,
                        'ruangan_id' => $request->ruangan_id,
                        'user_id' => $request->user_id,
                    ]);
                }

            }

            
        }
        return redirect('/SertifikatBaru')->with('tambah', 'Data Berhasil Ditambah');
        
    }
    // public function SimpanKeranjangSertifikat(Request $request)
    // {
       

    //     $dataKelurahan = Kelurahan_desa::where('kecamatan_id',$request->kecamatan)->first();
    //     // dd($dataKelurahan->id);
    //     $dataKeranjangCek = KeranjangSertifikat::where([
    //         ['jenis_id', '=', $request->jenis_id],
    //         ['nomor', '=', $request->nomor],
    //         ['kecamatan', '=', $request->kecamatan],
    //         ['kelurahan_desa', '=', $dataKelurahan->id],
    //     ])->first();

    //     if ($dataKeranjangCek != null) {
    //         return redirect()->back();
    //     } else {
    //         // dd($request->all());
    //         $dataCek = InventoryBaru::where([
    //             ['jenis_id', '=', $request->jenis_id],
    //             ['nomor', '=', $request->nomor],
    //             ['kecamatan', '=', $request->kecamatan],
    //             ['kelurahan_desa', '=', $request->kelurahan],
    //         ])->first();

    //     if ($dataCek != null) {

    //         if ($dataCek->status === 'Tersedia') {
    //             KeranjangSertifikat::create([
                
    //                 'jenis_id' => $request->jenis_id,
    //                 'nomor' => $request->nomor,
    //                 'status' => $request->status,
    //                 'kecamatan' => $request->kecamatan,
    //                 'kelurahan_desa' => $request->kelurahan,
    //                 'status' => 'Tersedia',
    //                 'rak_id' => $dataCek->rak_id,
    //                 'lemari_id' => $dataCek->lemari_id,
    //                 'ruangan_id' => $dataCek->ruangan_id,
    //                 'user_id' => $request->user_id,
    //             ]);
    //         } else {
    //             KeranjangSertifikat::create([
                
    //                 'jenis_id' => $request->jenis_id,
    //                 'nomor' => $request->nomor,
    //                 'status' => $request->status,
    //                 'kecamatan' => $request->kecamatan,
    //                 'kelurahan_desa' => $request->kelurahan,
    //                 'status' => 'Dipinjam',
    //                 'rak_id' => $dataCek->rak_id,
    //                 'lemari_id' => $dataCek->lemari_id,
    //                 'ruangan_id' => $dataCek->ruangan_id,
    //                 'user_id' => $request->user_id,
    //             ]);
    //         }
    //     } else {
    //         KeranjangSertifikat::create([
                
    //             'jenis_id' => $request->jenis_id,
    //             'nomor' => $request->nomor,
    //             'status' => $request->status,
    //             'kecamatan' => $request->kecamatan,
    //             'kelurahan_desa' => $request->kelurahan,
    //             'status' => 'Belum Terdaftar',
    //             'rak_id' => $request->rak_id,
    //             'lemari_id' => $request->lemari_id,
    //             'ruangan_id' => $request->ruangan_id,
    //             'user_id' => $request->user_id,
    //         ]);
    //     }
        
        
    //     return redirect('/SertifikatBaru')->with('tambah', 'Data Berhasil Ditambah');
    //     }
        
        
    // }

    public function SimpanSertifikatBaru(Request $request)
    {
        // dd($request->all());

        $cekKeranjangBaru = KeranjangSertifikat::where([
            ['user_id', '=', Auth::user()->id],
            ['status', '=', 'Belum Terdaftar'],
        ])->get();

        $cekKeranjangDipinjam = KeranjangSertifikat::where([
            ['user_id', '=', Auth::user()->id],
            ['status', '=', 'Dipinjam'],
        ])->get();

        if ($cekKeranjangBaru->count() > 0) {
            return redirect()->back()->with('input', 'Anda harus menginputkan data rak terlebih dahulu'); //munculin pesan anda harus menginputkan data rak terlebih dahulu
        } else {
            if ($cekKeranjangDipinjam->count() > 0) {
                return redirect()->back()->with('pinjam', 'Terdapat berkas yang sedang dipinjam'); // terdapat berkas yang sedang dipinjam
            }

            $dataKeranjangBaru = KeranjangSertifikat::where('user_id', Auth::user()->id)->get();
            // dd($dataKeranjang);
            foreach ($dataKeranjangBaru as $item) {
                // $dataKeranjangBaru = KeranjangSertifikat::create([
                
                //     'jenis_id' => $request->jenis_id,
                //     'nomor' => $request->nomor,
                //     'status' => $request->status,
                //     'kecamatan' => $request->kecamatan,
                //     'kelurahan_desa' => $request->kelurahan_desa,
                //     'status' => 'Tersedia',
                //     'user_id' => $request->user_id,
                // ]);
                $dataInventory = InventoryBaru::where([
                    ['jenis_id', '=', $item->jenis_id],
                    ['nomor', '=', $item->nomor],
                    ['kecamatan', '=', $item->kecamatan],
                    ['kelurahan_desa', '=', $item->kelurahan_desa],
                ])->first();
                // dd($dataInventory);
            }
            DB::table('keranjang_sertifikats')->where('user_id',Auth::user()->id)->delete();
    
    
            return redirect('/Laporan');
        }
    }

    public function updateRak(Request $request)
    {
        $dataKeranjang = KeranjangSertifikat::where('id',$request->id_keranjang)->first();
        $dataKeranjang->update([
            'rak_id' => $request->rak_id,
            'lemari_id' => $request->lemari_id,
            'ruangan_id' => $request->ruangan_id,
            'status' => 'Tersedia',
        ]);
        
        InventoryBaru::create([
                 
                'jenis_id' => $dataKeranjang->jenis_id,
                'nomor' => $dataKeranjang->nomor,
                'status' => $dataKeranjang->status,
                'kecamatan' => $dataKeranjang->kecamatan,
                'kelurahan_desa' => $dataKeranjang->kelurahan_desa,
                'status' => 'Tersedia',
                'rak_id' => $dataKeranjang->rak_id,
                'lemari_id' => $dataKeranjang->lemari_id,
                'ruangan_id' => $dataKeranjang->ruangan_id,
        ]);
        return redirect()->back();
    }
    public function dataLemari($id) {        
        // $cities = DB::table("regencies")->where("province_id",$id)->pluck("name","id");
        $dataLemari = DB::table("lemaris")->where("ruangan_id",$id)->pluck("nama_lemari","id");
        return json_encode($dataLemari);
    }

    public function dataRak($id) {        
        // $distr = DB::table("districts")->where("regency_id",$id)->pluck("name","id");
        $dataRak = DB::table("raks")->where("lemari_id",$id)->pluck("nama_rak","id");
        return json_encode($dataRak);
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
    public function dataKelurahan($id) {        
        $kelurahan = DB::table("kelurahan_desas")->where("kecamatan_id",$id)->pluck("nama","id");
        // $distr = DB::table("raks")->where("lemaris_id",$id)->pluck("nama_rak","id");
        return json_encode($kelurahan);
    }
    public function dataKecamatan($id) {    
        $kelurahan =  DB::table("kelurahan_desas")->where("id",$id)->first();      
        $kecamatan = DB::table("kecamatans")->where("id",$kelurahan->kecamatan_id)->pluck("nama","id");
        // $distr = DB::table("raks")->where("lemaris_id",$id)->pluck("nama_rak","id");
        return json_encode($kecamatan);
    }
    public function hapus($id) {
        $dataKeranjangBaru = KeranjangSertifikat::where('id','=',$id)->first();
        // dd($dataBiodata);
        $dataKeranjangBaru->delete();
        return redirect('/SertifikatBaru');
        // redirect()->back();

    }
}