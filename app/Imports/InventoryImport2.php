<?php

namespace App\Imports;

use App\InventoryBaru;
use Maatwebsite\Excel\Concerns\ToModel;

class InventoryImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new InventoryBaru([
            'jenis_id' => $row[1],
            'nomor' => $row[2],
            'kecamatan' => $row[3],
            'kelurahan_desa' => $row[4],
            'status' => $row[5],
            'ruangan_id' => $row[6],
            'lemari_id' => $row[7],
            'rak_id' => $row[8],
            'status_berkas' => $row[9],
        ]);
    }
}
