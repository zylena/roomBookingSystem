<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function index()
    {
      $rooms = Room::all();

        return view('admin.rooms.index', compact('rooms'));
    }
}
