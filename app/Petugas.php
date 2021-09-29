<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'petugas';
    // protected $fillable = ['nik', 'nama_penyewa', 'alamat','email','no_tlp','user_id'];
    protected $guarded=[];
}
