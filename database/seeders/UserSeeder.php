<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Alice Tan',
                'email' => 'alice@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('password123'),
                'role' => 'customer',
                'remember_token' => null,
                'created_at' => '2026-04-04 10:52:47',
                'updated_at' => null,
            ],
            [
                'id' => 2,
                'name' => 'Ben Lee',
                'email' => 'ben@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('password123'),
                'role' => 'customer',
                'remember_token' => null,
                'created_at' => '2026-04-04 10:52:47',
                'updated_at' => null,
            ],
            [
                'id' => 3,
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'remember_token' => null,
                'created_at' => '2026-04-04 10:52:47',
                'updated_at' => null,
            ],
            [
                'id' => 4,
                'name' => 'Chloe Lim',
                'email' => 'chloe@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('password123'),
                'role' => 'customer',
                'remember_token' => null,
                'created_at' => '2026-04-04 10:52:47',
                'updated_at' => null,
            ],
            [
                'id' => 5,
                'name' => 'Daniel Wong',
                'email' => 'daniel@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('password123'),
                'role' => 'customer',
                'remember_token' => null,
                'created_at' => '2026-04-04 10:52:47',
                'updated_at' => null,
            ],
            [
                'id' => 6,
                'name' => 'Emily Ng',
                'email' => 'emily@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('password123'),
                'role' => 'customer',
                'remember_token' => null,
                'created_at' => '2026-04-04 10:52:47',
                'updated_at' => null,
            ],
            [
                'id' => 7,
                'name' => 'Farah Ahmad',
                'email' => 'farah@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('password123'),
                'role' => 'customer',
                'remember_token' => null,
                'created_at' => '2026-04-04 10:52:47',
                'updated_at' => null,
            ],
            [
                'id' => 8,
                'name' => 'Gavin Teoh',
                'email' => 'gavin@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('password123'),
                'role' => 'customer',
                'remember_token' => null,
                'created_at' => '2026-04-04 10:52:47',
                'updated_at' => null,
            ],
            [
                'id' => 9,
                'name' => 'Hana Lee',
                'email' => 'hana@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'remember_token' => null,
                'created_at' => '2026-04-04 10:52:47',
                'updated_at' => null,
            ],
            [
                'id' => 10,
                'name' => 'Ian Tan',
                'email' => 'ian@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('password123'),
                'role' => 'customer',
                'remember_token' => null,
                'created_at' => '2026-04-04 10:52:47',
                'updated_at' => null,
            ],
        ]);
    }
}