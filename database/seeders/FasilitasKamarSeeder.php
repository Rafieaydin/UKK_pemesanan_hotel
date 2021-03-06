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
            'nama_fasilitas' => "Bath",
            'icon'=> 'fas fa-bath'
            ],
            [
            'nama'=> 'Deluxe',
            'gambar'=>  'kamar_deluxe.jpg',
            'nama_fasilitas' => "TV",
            'icon' => 'fas fa-tv'
            ],
            [
            'nama'=> 'Condotel One Bedroom',
            'gambar'=>  'kamar_one_bedroom.jpg',
            'nama_fasilitas' => "Bed",
            'icon' => 'fas fa-bed'
            ],
        ];
        $faker = Faker::create('id_ID');
        for($i=0;$i<count($data);$i++){
            DB::table('fasilitas_kamar')->insert([
                'nama_fasilitas' => $data[$i]['nama_fasilitas'],
                // 'gambar'=> $data[$i]['gambar'],
                'admin_id'=> 1,
                'icon_fasilitas' => $data[$i]['icon'],
            ]);
        }
    }
}
