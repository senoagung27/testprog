<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InventoryBaru;
use DB;

class TestingController extends Controller
{
    public function index()
    {
        $datas = InventoryBaru::get();
        $district = DB::table('districts')->pluck("name","id");
        $village = DB::table('villages')->pluck("name","id");
        return view('testing.index', compact('datas','district'));
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
    public function aphbbukti()
    {
        return view('testing.aphb.bukti');
    }
     public function aphbbio()
    {
        return view('testing.aphb.biodata');
    }
     public function aphbpajak()
    {
        return view('testing.aphb.pajak');
    }
     public function aphtbukti()
    {
        return view('testing.apht.bukti');
    }
     public function aphtbio()
    {
        return view('testing.apht.biodata');
    }
     public function aphtpajak()
    {
        return view('testing.apht.pajak');
    }
     public function hibahbukti()
    {
        return view('testing.hibah.bukti');
    }
     public function hibahbio()
    {
        return view('testing.hibah.biodata');
    }
     public function hibahpajak()
    {
        return view('testing.hibah.pajak');
    }
     public function legalbio()
    {
        return view('testing.legalitas.biodata');
    }
     public function legalsurat()
    {
        return view('testing.legalitas.surat');
    }
     public function warmekingbio()
    {
        return view('testing.warmeking.biodata');
    }
     public function warmekingsurat()
    {
        return view('testing.warmeking.surat');
    }

}
 