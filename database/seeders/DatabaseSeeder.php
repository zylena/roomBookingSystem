<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ThemeSeeder::class,
            RoomSeeder::class,
            TimeSlotSeeder::class,
            BookingSeeder::class,
            BookingStatusLogSeeder::class,
        ]);
    }
}