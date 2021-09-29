<?php

namespace App\Imports;

use App\Ruangan;
use Maatwebsite\Excel\Concerns\ToModel;

class RuanganImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Ruangan([
            'nama_ruangan' => $row[1],
        ]);
    }
}
