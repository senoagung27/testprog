<?php

namespace App\Imports;

use App\Lemari;
use Maatwebsite\Excel\Concerns\ToModel;

class LemariImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Lemari([
            'ruangan_id' => $row[1],
            'nama_lemari' => $row[2],
        ]);
    }
}
