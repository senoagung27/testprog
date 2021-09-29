<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatans';
    // protected $fillable = ['ruangans_id', 'nomor_berkas', 'judul','keterangan'];
    protected $guarded=[];

    public function isiKelurahan()
    {
        return $this->belongsTo('App\Village','kelurahan_desa','id');
    }
}