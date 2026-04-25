<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['room', 'timeSlot'])
            ->orderBy('booking_id', 'desc')
            ->get();

        return view('admin.bookings.index', compact('bookings'));
    }

    public function edit(Booking $booking)
    {
        $rooms = Room::where('status', 'active')->get();
        $timeSlots = TimeSlot::all();

        return view('admin.bookings.edit', compact('booking', 'rooms', 'timeSlots'));
    }

    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:255'],
            'room_id' => ['required', 'exists:rooms,room_id'],
            'slot_id' => ['required', 'exists:time_slots,slot_id'],
            'pax' => ['required', 'integer', 'min:1'],
            'total_amount' => ['required', 'numeric', 'min:0'],
            'payment_status' => ['required', 'string', 'max:50'],
            'payment_method' => ['nullable', 'string', 'max:50'],
            'expires_at' => ['nullable', 'date'],
        ]);

        $booking->update($validated);

        return redirect()
            ->route('admin.bookings.index')
            ->with('success', 'Booking updated successfully.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()
            ->route('admin.bookings.index')
            ->with('success', 'Booking deleted successfully.');
    }
}