<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Transaksi extends Model
{
    protected $table = 'transaksis';
    // protected $fillable = ['ruangans_id', 'nomor_berkas', 'judul','keterangan'];
    protected $guarded=[];

    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'id_booking' => [
                'format' =>  date('Y') . '-' . '?', // autonumber format. '?' will be replaced with the generated number.
                'length' => 3 // The number of digits in an autonumber
            ]
        ];
    }

    public function isiBerkas()
    {
        return $this->belongsTo('App\Berkas','berkas_id','id');
    }
    public function isiPenyewa()
    {
        return $this->belongsTo('App\Penyewa','penyewas_id','id');
    }
    public function isiPetugas()
    {
        return $this->belongsTo('App\User','petugas_id','id');
    }
    public function isiRincian()
    {
        return $this->hasMany('App\RincianTransaksi','transaksi_id','id_booking');
    }
    
}