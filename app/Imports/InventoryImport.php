<?php

namespace App\Imports;

use App\InventoryBaru;
use App\Kecamatan;
use App\Kelurahan_desa;
use App\JenisHak;
use App\Ruangan;
use App\Lemari;
use App\Rak;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
HeadingRowFormatter::default('none');

class InventoryImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // cek jenis hak
        $dataJenisHak = JenisHak::where('nama_jenis_hak',$row['Jenis'])->first();
        if ($dataJenisHak != null) {
            $jenisHak = $dataJenisHak->id;
        } else {
            $dataCekJenisHak = JenisHak::latest('created_at')->first();

            if ($dataCekJenisHak != null) {
                $no_jenis_hak = intval($dataCekJenisHak->id);
                do {			
                    $tokenJenisHak = $no_jenis_hak++ + 1;
                }
                while($dataCekJenisHak->where('id',$tokenJenisHak)->exists());
            } else {
                $tokenJenisHak = 1;
            }

            $jenisHak = $tokenJenisHak;
            JenisHak::create([       
                'nama_jenis_hak' => $row['Jenis'],
            ]);
        }

        // cek kecamatan
        $dataKecamatan = Kecamatan::where('nama',$row['Kecamatan'])->first();
        if ($dataKecamatan != null) {
            $kecamatan = $dataKecamatan->id;
        } else {
            $dataCekKecamatan = Kecamatan::latest('created_at')->first();

            if ($dataCekKecamatan != null) {
                $no_kecamatan = intval($dataCekKecamatan->id);
                do {			
                    $tokenKecamatan = $no_kecamatan++ + 1;
                }
                while($dataCekKecamatan->where('id',$tokenKecamatan)->exists());
            } else {
                $tokenKecamatan = 1;
            }

            $kecamatan = $tokenKecamatan;
            Kecamatan::create([                        
                'id' => $kecamatan,
                'nama' => $row['Kecamatan'],
            ]);
        }

        // cek kelurahan
        $dataKelurahan = Kelurahan_desa::where([
            ['kecamatan_id', '=', $kecamatan],
            ['nama', '=', $row['Kelurahan/Desa']],
        ])->first();

        if ($dataKelurahan != null) {
            $kelurahan = $dataKelurahan->id;
        } else {
            $dataCekKelurahan = Kelurahan_desa::latest('created_at')->first();

            if ($dataCekKelurahan != null) {
                $no_kelurahan = intval($dataCekKelurahan->id);
                do {			
                    $tokenKelurahan = $no_kelurahan++ + 1;
                }
                while($dataCekKelurahan->where('id',$tokenKelurahan)->exists());
            } else {
                $tokenKelurahan = 1;
            }

            $kelurahan = $tokenKelurahan;
            Kelurahan_desa::create([                        
                'kecamatan_id' => $kecamatan,
                'nama' => $row['Kelurahan/Desa'],
            ]);
        }

        // cek ruangan
        $dataRuangan = Ruangan::where('nama_ruangan',$row['Ruangan'])->first();
        if ($dataRuangan != null) {
            $ruangan = $dataRuangan->id;
        } else {
            $dataCekRuangan = Ruangan::latest('created_at')->first();

            if ($dataCekRuangan != null) {
                $no_ruangan = intval($dataCekRuangan->id);
                do {			
                    $tokenRuangan = $no_ruangan++ + 1;
                }
                while($dataCekRuangan->where('id',$tokenRuangan)->exists());
            } else {
                $tokenRuangan = 1;
            }

            $ruangan = $tokenRuangan;
            Ruangan::create([                        
                'id' => $ruangan,
                'nama_ruangan' => $row['Ruangan'],
            ]);
        }

        // cek lemari
        $dataLemari = Lemari::where([
            ['ruangan_id', '=', $ruangan],
            ['nama_lemari', '=', $row['Lemari']],
        ])->first();

        if ($dataLemari != null) {
            $lemari = $dataLemari->id;
        } else {
            $dataCekLemari = Lemari::latest('created_at')->first();

            if ($dataCekLemari != null) {
                $no_lemari = intval($dataCekLemari->id);
                do {			
                    $tokenLemari = $no_lemari++ + 1;
                }
                while($dataCekLemari->where('id',$tokenLemari)->exists());
            } else {
                $tokenLemari = 1;
            }

            $lemari = $tokenLemari;
            Lemari::create([                        
                'id' => $lemari,
                'ruangan_id' => $ruangan,
                'nama_lemari' => $row['Lemari'],
            ]);
        }

        // cek rak
        $dataRak = Rak::where([
            ['lemari_id', '=', $lemari],
            ['nama_rak', '=', $row['Rak']],
        ])->first();

        if ($dataRak != null) {
            $rak = $dataRak->id;
        } else {
            $dataCekRak = Rak::latest('created_at')->first();

            if ($dataCekRak != null) {
                $no_rak = intval($dataCekRak->id);
                do {			
                    $tokenRak = $no_rak++ + 1;
                }
                while($dataCekRak->where('id',$tokenRak)->exists());
            } else {
                $tokenRak = 1;
            }

            $rak = $tokenRak;
            Rak::create([                        
                'id' => $rak,
                'lemari_id' => $lemari,
                'nama_rak' => $row['Rak'],
            ]);
        }

        return InventoryBaru::updateOrCreate([
			'jenis_id' => $jenisHak,
			'nomor' => $row["Nomor"],
			'kecamatan' => $kecamatan,
			'kelurahan_desa' => $kelurahan,
		],[
            'jenis_id' => $jenisHak,
			'nomor' => $row["Nomor"],
			'kecamatan' => $kecamatan,
			'kelurahan_desa' => $kelurahan,
			'status' => $row['Status'],
			'ruangan_id' => $ruangan,
			'lemari_id' => $lemari,
			'rak_id' => $rak,
            'status_berkas' => $row['Status Berkas'],
		]);
        
    }
}