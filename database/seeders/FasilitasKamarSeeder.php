<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class FasilitasKamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
            'nama'=> 'Supperior',
            'gambar'=>  'kamar_supperior.jpg',
            ],
            [
            'nama'=> 'Deluxe',
            'gambar'=>  'kamar_deluxe.jpg',
            ],
            [
            'nama'=> 'Condotel One Bedroom',
            'gambar'=>  'kamar_one_bedroom.jpg',
            ],
        ];
        $faker = Faker::create('id_ID');
        for($i=0;$i<count($data);$i++){
            DB::table('fasilitas_kamar')->insert([
                'nama_fasilitas'=> $data[$i]['nama'],
                'gambar'=> $data[$i]['gambar'],
                'detail_fasilitas' => $faker->text($maxNbChars = 3000),
                'jumlah_kamar'=> 0,
                'admin_id'=> 1,
            ]);
        }
    }
}
