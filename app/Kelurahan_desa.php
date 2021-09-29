<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan_desa extends Model
{
    protected $table = 'kelurahan_desas';
    // protected $fillable = ['ruangans_id', 'nomor_berkas', 'judul','keterangan'];
    protected $guarded=[];

      public function isiKecamatan()
    {
        return $this->belongsTo('App\District','kecamatan','id');
    }

    
}