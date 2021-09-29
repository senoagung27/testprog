<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjangs';
    // protected $fillable = ['ruangans_id', 'nomor_berkas', 'judul','keterangan'];
    protected $guarded=[];

    public function isiUser() {
        return $this->belongsTo('App\User','user_id');
    }
    public function isiBerkas() {
        return $this->belongsTo('App\Berkas', 'berkas_id','berkas_id');
    }
}
