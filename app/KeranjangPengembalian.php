<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeranjangPengembalian extends Model
{
    protected $guarded=[];

    public function isiJenis()
    {
        return $this->belongsTo('App\JenisHak','jenis_id','id');
    }
    
    public function isiKecamatan()
    {
        return $this->belongsTo('App\Kecamatan','kecamatan','id');
    }

    public function isiKelurahan()
    {
        return $this->belongsTo('App\Kelurahan_desa','kelurahan_desa','id');
    }

    public function isiRincianTransaksi() {
        return $this->belongsTo('App\RincianTransaksi','id_rincian_transaksi','id');
    }
    
}