<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $metrics = [
            'totalRooms' => 12,
            'activeBookings' => 8,
            'registeredUsers' => 64,
        ];

        return view('admin.dashboard', compact('metrics'));
    }

    public function settings()
    {
        return view('admin.settings');
    }
}
