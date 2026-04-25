<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'upcomingBookings' => Booking::where('user_id', Auth::id())
                ->where('payment_status', 'Pending')
                ->count(),

            'pastBookings' => Booking::where('user_id', Auth::id())
                ->whereIn('payment_status', ['Paid', 'Completed', 'Cancelled'])
                ->count(),

            
        ];

        return view('user.dashboard', compact('stats'));
    }
}