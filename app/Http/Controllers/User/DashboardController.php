<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $stats = [
            'upcomingBookings' => Booking::where('user_id', $userId)
                ->whereIn('payment_status', ['pending', 'paid'])
                ->count(),
            'pastBookings' => Booking::where('user_id', $userId)
                ->where('payment_status', 'cancelled')
                ->count(),
        ];

        return view('user.dashboard', compact('stats'));
    }
}
