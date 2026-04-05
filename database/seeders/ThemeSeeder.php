<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('themes')->insert([
            [
                'theme_id' => 1,
                'theme_name' => 'Horror',
                'description' => 'Scary and dark escape room experiences.',
                'created_at' => '2026-04-04 10:52:47',
            ],
            [
                'theme_id' => 2,
                'theme_name' => 'Mystery',
                'description' => 'Solve clues and investigate hidden secrets.',
                'created_at' => '2026-04-04 10:52:47',
            ],
            [
                'theme_id' => 3,
                'theme_name' => 'Adventure',
                'description' => 'Exciting escape room missions and exploration.',
                'created_at' => '2026-04-04 10:52:47',
            ],
            [
                'theme_id' => 4,
                'theme_name' => 'Sci-Fi',
                'description' => 'Futuristic escape rooms with technology and space elements.',
                'created_at' => '2026-04-04 10:52:47',
            ],
            [
                'theme_id' => 5,
                'theme_name' => 'Prison Break',
                'description' => 'Escape from locked prison cells using teamwork and logic.',
                'created_at' => '2026-04-04 10:52:47',
            ],
            [
                'theme_id' => 6,
                'theme_name' => 'Fantasy',
                'description' => 'Magic, mythical objects, and fantasy world adventures.',
                'created_at' => '2026-04-04 10:52:47',
            ],
            [
                'theme_id' => 7,
                'theme_name' => 'Zombie',
                'description' => 'Survive a zombie outbreak and escape in time.',
                'created_at' => '2026-04-04 10:52:47',
            ],
            [
                'theme_id' => 8,
                'theme_name' => 'Pirate',
                'description' => 'Treasure hunting and pirate ship mysteries.',
                'created_at' => '2026-04-04 10:52:47',
            ],
            [
                'theme_id' => 9,
                'theme_name' => 'Historical',
                'description' => 'Escape rooms inspired by ancient history and past events.',
                'created_at' => '2026-04-04 10:52:47',
            ],
            [
                'theme_id' => 10,
                'theme_name' => 'Heist',
                'description' => 'Break into secure vaults and complete a high-risk mission.',
                'created_at' => '2026-04-04 10:52:47',
            ],
        ]);
    }
}