<?php

namespace App\Imports;

use App\Kelurahan_desa;
use Maatwebsite\Excel\Concerns\ToModel;

class Kelurahan_desa_Import implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kelurahan_desa([
            'kecamatan_id' => $row[0],
            'nama' => $row[1],
        ]);
    }
}
