<?php

namespace Database\Seeders;

use App\Models\TipeKamar;
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
        for ($i=0; $i < 1 ; $i++) {
            $uuid =  Str::uuid();
            $reservasis = DB::table('reservasi')->insert([
                'uuid' => $uuid,
                'kode_booking' => Str::random(8),
                'nama_pemesan' => $faker->name,
                'email_pemesan' => $faker->email,
                'nomor_hp_pemesan' => $faker->phoneNumber,
                'tanggal_checkin' => Carbon::now()->format('Y-m-d'),
                'tanggal_checkout'=> Carbon::now()->addDay(1)->format('Y-m-d'),
                // 'jumlah_kamar' => 5,
                'tipe_id' => 1,
                'nama_tamu' => $faker->name,
                'total_harga' => $faker->numberBetween(1000000,5000000),
                // 'tamu_id' => $faker->randomElement([1,2,3,4]),
            ]);
        }

    }
}
