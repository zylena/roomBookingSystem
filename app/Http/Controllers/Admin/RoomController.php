<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = [
            ['id' => 1, 'name' => 'The Labyrinth', 'status' => 'Published'],
            ['id' => 2, 'name' => 'Haunted Mansion', 'status' => 'Draft'],
            ['id' => 3, 'name' => 'Bank Heist', 'status' => 'Published'],
        ];

        return view('admin.rooms.index', compact('rooms'));
    }
}
