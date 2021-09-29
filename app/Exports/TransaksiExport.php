<?php

namespace App\Exports;

use App\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransaksiExport implements FromCollection
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
        return Transaksi::select('id_booking','nama_berkas','nama_peminjam','status_pinjam','tanggal_ambil_berkas','tanggal_kembali_berkas')
        ->whereBetween('updated_at', [$this->dari.' 00:00:00',$this->ke.' 23:59:59'])->get();
    }
    public function headings() : array
    {
        return $this->headings;
    }
}
