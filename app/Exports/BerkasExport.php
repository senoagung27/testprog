<?php

namespace App\Exports;

use App\Berkas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BerkasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($dari,$ke,$tanggal_otomatis,$headings)
    {
        $this->dari = $dari;
        $this->ke = $ke;
        $this->tanggal_otomatis = $tanggal_otomatis;
        $this->headings = $headings;
    }
    public function collection()
    {
        return Berkas::select('nomor_berkas','nama_berkas','status_pinjam','nama_pemegang_hak','tanggal_lahir','no_hak_milik','kelurahan','nib','letak_tanah','daftar_isian_202','surat_ukur','tanggal','nomor','luas')
        ->whereBetween('updated_at', [$this->dari.' 00:00:00',$this->ke.' 23:59:59'])->get();
    }

    public function headings() : array
    {
        return $this->headings;
    }

}
