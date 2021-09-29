<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    protected $table = 'penyewas';
    // protected $fillable = ['nik', 'nama_penyewa', 'alamat','email','no_tlp','user_id'];
    protected $guarded=[];
}
