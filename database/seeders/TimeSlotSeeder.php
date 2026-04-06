<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeSlotSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('time_slots')->insert([
            [
                'slot_id' => 1,
                'room_id' => 1,
                'slot_date' => '2026-04-10',
                'start_time' => '10:00:00',
                'end_time' => '11:00:00',
                'availability_status' => 'available',
                'created_at' => '2026-04-04 10:52:47',
            ],
            [
                'slot_id' => 2,
                'room_id' => 1,
                'slot_date' => '2026-04-10',
                'start_time' => '12:00:00',
                'end_time' => '13:00:00',
                'availability_status' => 'available',
                'created_at' => '2026-04-04 10:52:47',
            ],
            [
                'slot_id' => 3,
                'room_id' => 2,
                'slot_date' => '2026-04-10',
                'start_time' => '10:00:00',
                'end_time' => '11:00:00',
                'availability_status' => 'available',
                'created_at' => '2026-04-04 10:52:47',
            ],
            [
                'slot_id' => 4,
                'room_id' => 2,
                'slot_date' => '2026-04-10',
                'start_time' => '12:00:00',
                'end_time' => '13:00:00',
                'availability_status' => 'available',
                'created_at' => '2026-04-04 10:52:47',
            ],
            [
                'slot_id' => 5,
                'room_id' => 3,
                'slot_date' => '2026-04-11',
                'start_time' => '14:00:00',
                'end_time' => '15:00:00',
                'availability_status' => 'available',
                'created_at' => '2026-04-04 10:52:47',
            ],
            [
                'slot_id' => 6,
                'room_id' => 4,
                'slot_date' => '2026-04-11',
                'start_time' => '16:00:00',
                'end_time' => '17:00:00',
                'availability_status' => 'available',
                'created_at' => '2026-04-04 10:52:47',
            ],
            [
                'slot_id' => 7,
                'room_id' => 5,
                'slot_date' => '2026-04-12',
                'start_time' => '10:00:00',
                'end_time' => '11:00:00',
                'availability_status' => 'available',
                'created_at' => '2026-04-04 10:52:47',
            ],
            [
                'slot_id' => 8,
                'room_id' => 6,
                'slot_date' => '2026-04-12',
                'start_time' => '12:00:00',
                'end_time' => '13:00:00',
                'availability_status' => 'available',
                'created_at' => '2026-04-04 10:52:47',
            ],
            [
                'slot_id' => 9,
                'room_id' => 7,
                'slot_date' => '2026-04-13',
                'start_time' => '14:00:00',
                'end_time' => '15:00:00',
                'availability_status' => 'available',
                'created_at' => '2026-04-04 10:52:47',
            ],
            [
                'slot_id' => 10,
                'room_id' => 8,
                'slot_date' => '2026-04-13',
                'start_time' => '16:00:00',
                'end_time' => '17:00:00',
                'availability_status' => 'available',
                'created_at' => '2026-04-04 10:52:47',
            ],
        ]);
    }
}