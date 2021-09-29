<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeranjangBaru extends Model
{
    protected $table = 'keranjang_barus';
    // protected $fillable = ['ruangans_id', 'nomor_berkas', 'judul','keterangan'];
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
    public function isiTransaksi()
    {
        return $this->belongsTo('App\Transaksi','transaksi_id','id_booking');
    }
}
