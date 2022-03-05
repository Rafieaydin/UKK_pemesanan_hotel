<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class ResepsionisSeeder extends Seeder
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
        DB::table('resepsionis')->insert([
            'username' => $faker->userName(),
            'password' => Hash::make('password'),
            'nama_resepsionis' => $faker->name,
            'email' => $faker->email,
            'no_hp'=> $faker->phoneNumber,
            'alamat'=> $faker->address,
            'jk' => $faker->randomElement(['L','P']),
            'status'=> 1
        ]);
    }
    }
}
