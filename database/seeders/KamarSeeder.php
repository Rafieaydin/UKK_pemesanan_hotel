<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        
        for ($i=0; $i < 99 ; $i++) {
            $counter = Floor($i/30); // kelipatan 30
            $nomor = ['A','B','C','D','E','F'];
            $nomor_kamar = $nomor[$counter];
            DB::table('kamar')->insert([
                'kode_kamar'=> $nomor_kamar.$i,
                'tipe_id' => $faker->randomElement(['1','2','3']),
                'status'=> '0',
                'admin_id'=> 1,
                // 'reservasi_id' => 0
            ]);
        }

    }
}
