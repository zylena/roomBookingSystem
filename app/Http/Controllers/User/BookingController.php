<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use App\Models\TimeSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BookingController extends Controller
{
   public function index()
{
    $bookings = Booking::with('room')
        ->where('user_id', Auth::id())
        ->where('payment_status', 'pending')
        ->where(function ($query) {
            $query->whereNull('expires_at')
                ->orWhere('expires_at', '>=', now());
        })
        ->orderByDesc('booking_id')
        ->get();

    return view('user.bookings.index', compact('bookings'));
}

    public function create()
    {
        $rooms = Room::all();

        return view('user.bookings.create', compact('rooms'));
    }


public function payment($id)
{
    $room = Room::findOrFail($id);

    $timeSlots = TimeSlot::where('room_id', $room->room_id)
        ->orderBy('start_time')
        ->get();

    return view('user.bookings.payment', compact('room', 'timeSlots'));
}
public function store(Request $request)
{
    $request->validate([
        'room_id' => 'required|integer|exists:rooms,room_id',
        'date' => 'required|date',
        'time' => 'required',
        'participants' => 'required|integer|min:1',
    ]);

    $room = Room::findOrFail($request->room_id);

    $maxPax = $room->max_pax ?? $room->capacity ?? $room->pax ?? 1;
    $pricePerPax = $room->price_per_pax ?? $room->price ?? $room->room_price ?? 0;

    if ($request->participants > $maxPax) {
        return back()
            ->withErrors(['participants' => 'Participants cannot exceed the maximum pax for this room.'])
            ->withInput();
    }

  
    $tempReference = 'TMP' . strtoupper(Str::random(10));

    $booking = Booking::create([
        'booking_reference' => $tempReference,
        'user_id' => Auth::id(),
        'room_id' => $room->room_id,
        'slot_id' => null,
        'customer_name' => Auth::user()->name,
        'pax' => $request->participants,
        'total_amount' => $pricePerPax * $request->participants,
        'payment_status' => 'pending',
        'payment_method' => null,
        'expires_at' => now()->addMinutes(15),
    ]);

   
    $booking->booking_reference = 'BK' . now()->format('Ymd') . str_pad($booking->booking_id, 4, '0', STR_PAD_LEFT);
    $booking->save();

    return redirect()->route('user.bookings.create')
        ->with('status', 'Booking created successfully.');
}
   public function history()
{
    $history = Booking::with('room')
        ->where('user_id', Auth::id())
        ->where(function ($query) {
            $query->whereIn('payment_status', ['paid', 'cancelled'])
                ->orWhere('expires_at', '<', now());
        })
        ->orderByDesc('booking_id')
        ->get();

    return view('user.bookings.history', compact('history'));
}
}