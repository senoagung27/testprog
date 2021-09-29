<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryBaru extends Model
{
    protected $table = 'inventory_barus';
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
        return $this->belongsTo('App\Kecamatan','kecamatan','id');
    }

    public function isiKelurahan()
    {
        return $this->belongsTo('App\Kelurahan_desa','kelurahan_desa','id');
    }
    public function isiRak()
    {
        return $this->belongsTo('App\Rak','rak_id','id');
    }
    public function isiRuangan()
    {
        return $this->belongsTo('App\Ruangan','ruangan_id','id');
    }
    public function isiLemari()
    {
        return $this->belongsTo('App\Lemari','lemari_id','id');
    }
    // public function isiRincian()
    // {
    //     return $this->belongsTo('App\RincianTransaksi','rincian_id','id');
    // }
    public function isiInventory()
    {
        return $this->belongsTo('App\InventoryBaru','berkas_id','id');
    }

    public function isiRincian()
    {
        return $this->hasMany('App\RincianTransaksi','berkas_id','id');
    }
    public function isiTransaksi()
    {
        return $this->belongsTo('App\Transaksi','inventory_id','id');
    }
}
