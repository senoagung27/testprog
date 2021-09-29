<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangans';
    // protected $fillable = ['ruangans_id', 'nomor_berkas', 'judul','keterangan'];
    protected $guarded=[];

    public function isiRuangan()
    {
        return $this->belongsTo('App\Ruangan','ruangan_id','id');
    }
    public function isiLemari()
    {
        return $this->hasMany('App\Lemari','ruangan_id','id');
    }
    public function isiRak()
    {
        return $this->belongsTo('App\Rak','rak_id','id');
    }
}
