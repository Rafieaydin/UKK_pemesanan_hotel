<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FasilitasHotelSeeder extends Seeder
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
            'nama'=> 'bliard',
            'gambar'=>  'fasilitas_biliard.jpg',
            ],
            [
            'nama'=> 'kolam renang',
            'gambar'=>  'fasilitas_kolamrenang.jpg',
            ],
            [
            'nama'=> 'kamar',
            'gambar'=>  'kamar_hotel.jpg',
            ],
        ];
        for($i=0;$i<count($data);$i++){
            DB::table('fasilitas_hotel')->insert([
                'nama_fasilitas'=> $data[$i]['nama'],
                'gambar'=> $data[$i]['gambar'],
                'admin_id'=> 1,
            ]);
        }
    }
}
