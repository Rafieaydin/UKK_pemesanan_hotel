<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            AdminSeeder::class,
            FasilitasHotelSeeder::class,
            FasilitasKamarSeeder::class,
            TipeSeeder::class,
            KamarSeeder::class,
            TamuSeeder::class,
            ResepsionisSeeder::class,
            ResevarsiSeeder::class,
            KamarReservasi::class,
        ]);

    }
}
