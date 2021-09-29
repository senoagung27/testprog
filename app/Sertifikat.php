<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    protected $table = 'sertifikats';
    protected $guarded = [];

    public function isiPenyewa()
    {
        return $this->belongsTo('App\Penyewa','penyewas_id','id');
    }
    public function isiJenis()
    {
        return $this->belongsTo('App\JenisHak','jenis_id','id');
    }
    public function isiKecamatan()
    {
        return $this->belongsTo('App\District','kecamatan','id');
    }

    public function isiKelurahan()
    {
        return $this->belongsTo('App\Village','kelurahan_desa','id');
    }
    public function isiRak()
    {
        return $this->belongsTo('App\Rak','rak_id','id');
    }
    public function isiRincian()
    {
        return $this->belongsTo('App\RincianTransaksi','rincian_id','id');
    }
}
