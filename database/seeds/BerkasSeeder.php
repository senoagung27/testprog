<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BerkasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
        foreach(range(0,20) as $i){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('berkas')->insert([
    			'nomor_berkas' => $faker->randomNumber(5),
    			'nama_berkas' => $faker->name,
    			'status_pinjam' => 'Tersedia',
                'nama_pemegang_hak' => $faker->name,
                'tanggal_lahir' => $faker->dateTimeCentury()->format('Y-m-d'),
                'no_hak_milik' => $faker->randomNumber(10),
                'nib' => $faker->randomNumber(10),
                'kelurahan' => $faker->state,
                'letak_tanah' => $faker->streetName,
                'tanggal' => $faker->date,
                'provinsi' => $faker->state,
                'kota' => $faker->city,

    		]);
 
    	}
}
