<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = [
            ['id' => 101, 'room' => 'The Labyrinth', 'date' => '2026-04-01', 'status' => 'Confirmed'],
            ['id' => 102, 'room' => 'Haunted Mansion', 'date' => '2026-04-12', 'status' => 'Pending'],
        ];

        return view('user.bookings.index', compact('bookings'));
    }

    public function show($id)
    {
        $booking = [
            'id' => $id,
            'room' => 'The Labyrinth',
            'date' => '2026-04-01',
            'time' => '19:00',
            'status' => 'Confirmed',
            'participants' => 4,
            'notes' => 'Arrive 10 minutes early.',
        ];

        return view('user.bookings.show', compact('booking'));
    }

    public function create()
    {
        $rooms = [
            ['id' => 1, 'name' => 'The Labyrinth'],
            ['id' => 2, 'name' => 'Haunted Mansion'],
            ['id' => 3, 'name' => 'Bank Heist'],
        ];

        return view('user.bookings.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|integer',
            'date' => 'required|date',
            'time' => 'required',
            'participants' => 'required|integer|min:1',
        ]);

        // In a real app, the booking would be stored in the database.
        return redirect()->route('user.bookings.index')->with('status', 'Booking created (placeholder).');
    }

    public function payment($id)
    {
        $booking = [
            'id' => $id,
            'room' => 'The Labyrinth',
            'date' => '2026-04-01',
            'amount' => 120,
        ];

        return view('user.bookings.payment', compact('booking'));
    }

    public function history()
    {
        $history = [
            ['id' => 84, 'room' => 'Bank Heist', 'date' => '2025-12-10', 'status' => 'Completed'],
            ['id' => 59, 'room' => 'Haunted Mansion', 'date' => '2025-10-21', 'status' => 'Completed'],
        ];

        return view('user.bookings.history', compact('history'));
    }
}
