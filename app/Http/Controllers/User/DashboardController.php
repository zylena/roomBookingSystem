<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Placeholder dashboard metrics
        $stats = [
            'upcomingBookings' => 2,
            'pastBookings' => 5,
            'favoriteRooms' => 3,
        ];

        return view('user.dashboard', compact('stats'));
    }
}
