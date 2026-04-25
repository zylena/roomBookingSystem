<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('user_id', auth()->id())
            ->whereIn('payment_status', ['pending', 'paid'])
            ->with(['room', 'timeSlot'])
            ->orderBy('booking_id', 'desc')
            ->get();

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
       $rooms = Room::all();

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
       

        return view('user.bookings.payment', compact('booking'));
    }

    public function history()
    {
        $bookings = Booking::where('user_id', auth()->id())
            ->where('payment_status', 'cancelled')
            ->with(['room', 'timeSlot'])
            ->orderBy('booking_id', 'desc')
            ->get();

        return view('user.bookings.history', compact('bookings'));
    }
}
