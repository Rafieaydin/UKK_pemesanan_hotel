<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TipeSeeder extends Seeder
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
            'nama_fasilitas' => "TV 32 ichi",
            ],
            [
            'nama'=> 'Deluxe',
            'gambar'=>  'kamar_deluxe.jpg',
            'nama_fasilitas' => "TV 32 ichi",
            ],
            [
            'nama'=> 'Condotel One Bedroom',
            'gambar'=>  'kamar_one_bedroom.jpg',
            'nama_fasilitas' => "TV 32 ichi",
            ],
        ];
        $faker = Faker::create('id_ID');
        for($i=0;$i<count($data);$i++){
            DB::table('tipe_kamar')->insert([
                'nama_tipe' => $data[$i]['nama'],
                'keterangan' => $faker->text($maxNbChars = 50),
                'gambar'=> $data[$i]['gambar'],
                'harga'=> '2000000',
                'admin_id'=> 1,
            ]);
        }
    }
}
