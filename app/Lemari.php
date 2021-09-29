<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lemari extends Model
{
    protected $table = 'lemaris';
    // protected $fillable = ['ruangans_id', 'nomor_berkas', 'judul','keterangan'];
    protected $guarded=[];

    public function isiRuangan()
    {
        return $this->belongsTo('App\Ruangan','ruangan_id','id');
    }

    public function isiRak()
    {
        return $this->hasMany('App\Rak','lemari_id','id');
    }


}
