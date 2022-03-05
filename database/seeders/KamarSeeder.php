<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 99 ; $i++) {
            $counter = Floor($i/30);
            $nomor = ['A','B','C','D','E','F'];
            $nomor_kamar = $nomor[$counter];
            DB::table('kamar')->insert([
                'nomor_kamar'=> ($i>=10) ? $nomor_kamar.'00'.$i : $nomor_kamar.'0'.$i,
                'status'=> '1',
                'admin_id'=> 1,
            ]);
        }

    }
}
