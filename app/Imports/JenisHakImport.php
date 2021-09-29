<?php

namespace App\Imports;

use App\JenisHak;
use Maatwebsite\Excel\Concerns\ToModel;

class JenisHakImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new JenisHak([
            'nama_jenis_hak' => $row[1],
        ]);
    }
}
