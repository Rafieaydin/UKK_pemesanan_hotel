<?php

namespace Database\Seeders;

use App\Models\TipeKamar;
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
            "kapasitas_orang" => 2,
            ],
            [
            'nama'=> 'Deluxe',
            'gambar'=>  'kamar_deluxe.jpg',
            'nama_fasilitas' => "TV 32 ichi",
            "kapasitas_orang" => 4,
            ],
            [
            'nama'=> 'Condotel One Bedroom',
            'gambar'=>  'kamar_one_bedroom.jpg',
            'nama_fasilitas' => "TV 32 ichi",
            "kapasitas_orang" => 3,
            ],
        ];
        $faker = Faker::create('id_ID');
        for($i=0;$i<count($data);$i++){
            $tipe = DB::table('tipe_kamar')->insert([
                'nama_tipe' => $data[$i]['nama'],
                'keterangan' => $faker->text($maxNbChars = 50),
                'gambar'=> $data[$i]['gambar'],
                'harga'=> '2000000',
                'kapasitas_orang' => $data[$i]['kapasitas_orang'],
                'admin_id'=> 1,
            ]);
        }
        foreach (TipeKamar::get() as $key => $value) {
            $value->fasilitas()->attach([1,2,3]);
        }
    }
}
