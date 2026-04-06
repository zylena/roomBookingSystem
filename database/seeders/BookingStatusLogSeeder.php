<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingStatusLogSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('booking_status_logs')->insert([
            [
                'log_id' => 1,
                'booking_id' => 1,
                'old_status' => 'new',
                'new_status' => 'pending',
                'changed_at' => '2026-04-04 10:53:05',
                'remarks' => 'Booking created when customer clicked Pay.',
            ],
            [
                'log_id' => 2,
                'booking_id' => 2,
                'old_status' => 'pending',
                'new_status' => 'paid',
                'changed_at' => '2026-04-04 10:53:05',
                'remarks' => 'Payment confirmed successfully.',
            ],
            [
                'log_id' => 3,
                'booking_id' => 3,
                'old_status' => 'pending',
                'new_status' => 'cancelled',
                'changed_at' => '2026-04-04 10:53:05',
                'remarks' => 'Payment not completed within 15 minutes.',
            ],
            [
                'log_id' => 4,
                'booking_id' => 4,
                'old_status' => 'pending',
                'new_status' => 'paid',
                'changed_at' => '2026-04-04 10:53:05',
                'remarks' => 'Customer completed card payment successfully.',
            ],
            [
                'log_id' => 5,
                'booking_id' => 5,
                'old_status' => 'pending',
                'new_status' => 'paid',
                'changed_at' => '2026-04-04 10:53:05',
                'remarks' => 'Online transfer verified by staff.',
            ],
            [
                'log_id' => 6,
                'booking_id' => 6,
                'old_status' => 'pending',
                'new_status' => 'paid',
                'changed_at' => '2026-04-04 10:53:05',
                'remarks' => 'Cash payment received at counter.',
            ],
            [
                'log_id' => 7,
                'booking_id' => 7,
                'old_status' => 'new',
                'new_status' => 'pending',
                'changed_at' => '2026-04-04 10:53:05',
                'remarks' => 'Booking created and awaiting payment confirmation.',
            ],
            [
                'log_id' => 8,
                'booking_id' => 8,
                'old_status' => 'pending',
                'new_status' => 'paid',
                'changed_at' => '2026-04-04 10:53:05',
                'remarks' => 'Card payment approved successfully.',
            ],
            [
                'log_id' => 9,
                'booking_id' => 9,
                'old_status' => 'pending',
                'new_status' => 'cancelled',
                'changed_at' => '2026-04-04 10:53:05',
                'remarks' => 'Payment window expired and booking was cancelled automatically.',
            ],
            [
                'log_id' => 10,
                'booking_id' => 10,
                'old_status' => 'pending',
                'new_status' => 'paid',
                'changed_at' => '2026-04-04 10:53:05',
                'remarks' => 'Customer paid by card before slot started.',
            ],
        ]);
    }
}