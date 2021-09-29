<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RincianTransaksi extends Model
{
    protected $table = 'rinciantransaksis';
    // protected $fillable = ['ruangans_id', 'nomor_berkas', 'judul','keterangan'];
    protected $guarded=[];

    public function isiTransaksi()
    {
        return $this->belongsTo('App\Transaksi','transaksi_id','id_booking');
    }
    public function isiBerkas()
    {
        return $this->belongsTo('App\Berkas','berkas_id','berkas_id');
    }
   
    public function isiPenyewa()
    {
        return $this->belongsTo('App\Penyewa','penyewas_id','id');
    }
    public function isiRak()
    {
        return $this->belongsTo('App\Rak','rak_id','id');
    }
    public function isiKecamatan()
    {
        return $this->belongsTo('App\District','kecamatan','id');
    }
    // public function isiSertifikat()
    // {
    //     return $this->belongsTo('App\Berkas','sertifikat_id','id');
    // }
    public function isiInventory()
    {
        return $this->belongsTo('App\InventoryBaru','berkas_id','id');
    }
    
}
