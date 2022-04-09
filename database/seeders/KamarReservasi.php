<?php

namespace Database\Seeders;

use App\Models\Kamar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KamarReservasi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (DB::table('reservasi')->get() as $key => $value) {
            $kamar = DB::table('kamar')->where('tipe_id',$value->tipe_id)->get()->toArray();
            for($i=0; $i<1; $i++){
                for($j = 0 ; $j < 4 ; $j++){
                DB::table('reservasi_kamar')->insert([
                    'reservasi_id' => $value->uuid,
                    'kamar_id' => $kamar[$i]->id,
                    'status' => 'booking',
                ]);
            }
            }
        }
    }
}
