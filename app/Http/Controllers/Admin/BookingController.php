<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();

        return view('admin.bookings.index', compact('bookings'));
    }
}
