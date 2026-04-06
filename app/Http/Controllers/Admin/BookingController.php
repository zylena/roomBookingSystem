<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = [
            ['id' => 101, 'customer' => 'Jane Doe', 'room' => 'The Labyrinth', 'date' => '2026-04-01', 'status' => 'Confirmed'],
            ['id' => 102, 'customer' => 'John Smith', 'room' => 'Haunted Mansion', 'date' => '2026-04-12', 'status' => 'Pending'],
        ];

        return view('admin.bookings.index', compact('bookings'));
    }
}
