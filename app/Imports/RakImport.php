<?php

namespace App\Imports;

use App\Rak;
use Maatwebsite\Excel\Concerns\ToModel;

class RakImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Rak([
            'lemari_id' => $row[1],
            'nama_rak' => $row[2],
        ]);
    }
}
