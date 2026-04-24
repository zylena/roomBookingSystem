<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();

        return view('public.rooms.index', compact('rooms'));
    }

    public function show($room_id)
    {
        $room = Room::where('room_id', $room_id)->firstOrFail();

        return view('public.rooms.show', compact('room'));
    }
}