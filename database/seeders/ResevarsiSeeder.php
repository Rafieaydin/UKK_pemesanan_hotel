<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
class ResevarsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 20 ; $i++) {
            $reservasis = DB::table('reservasi')->insert([
                'uuid' => Str::uuid(),
                'nama_pemesan' => $faker->name,
                'email_pemesan' => $faker->email,
                'nomor_hp_pemesan' => $faker->phoneNumber,
                'tanggal_checkin' => Carbon::now()->format('Y-m-d'),
                'tanggal_checkout'=> Carbon::now()->addDay(1)->format('Y-m-d'),
                'jumlah_kamar' => 20,
                'tipe_id' => $faker->randomElement([1,2,3]),
                'nama_tamu' => $faker->name,
                // 'tamu_id' => $faker->randomElement([1,2,3,4]),
            ]);
            // $reservasi = DB::table('reservasi')->where('uuid',$reservasis->uuid)->first();
            // $kamar = DB::table('kamar')->where('id', $i)->first();
            // $reservasi->attach($kamar->id);
        }

    }
}
