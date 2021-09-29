<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Berkas extends Model
{
    
    protected $table = 'berkas';
    // protected $fillable = ['ruangans_id', 'nomor_berkas', 'judul','keterangan'];
    protected $guarded=[];

    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'berkas_id' => [
                'format' => 'B?', // autonumber format. '?' will be replaced with the generated number.
                'length' => 10 // The number of digits in an autonumber
            ]
        ];
    }
   
    public function isiRuangan()
    {
        return $this->belongsTo('App\Ruangan','ruangan_id','id');
    }
    public function isiLemari()
    {
        return $this->belongsTo('App\Lemari','lemari_id','id');
    }
    public function isiRak()
    {
        return $this->belongsTo('App\Rak','rak_id','id');
    }
    public function isiRincian()
    {
        return $this->belongsTo('App\RincianTransaksi','berkas_id','berkas_id');
    }
    
   

}
