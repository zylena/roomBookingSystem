<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $metrics = [
            'totalRooms' => Room::count(),
            'activeBookings' => Booking::whereIn('payment_status', ['pending', 'paid'])->count(),
             'registeredUsers' => User::where('role', 'customer')->count(),
        ];

        return view('admin.dashboard', compact('metrics'));
    }

    public function settings()
    {
        return view('admin.settings');
    }
}