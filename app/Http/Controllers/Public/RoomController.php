<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = [
            ['slug' => 'the-labyrinth', 'name' => 'The Labyrinth', 'duration' => '60 min', 'difficulty' => 'Medium', 'tagline' => 'Escape the twisting maze before time runs out.'],
            ['slug' => 'haunted-mansion', 'name' => 'Haunted Mansion', 'duration' => '75 min', 'difficulty' => 'Hard', 'tagline' => 'A ghostly mystery with puzzles around every corner.'],
            ['slug' => 'bank-heist', 'name' => 'Bank Heist', 'duration' => '50 min', 'difficulty' => 'Easy', 'tagline' => 'Pull off a daring robbery without getting caught.'],
        ];

        return view('public.rooms.index', compact('rooms'));
    }

    public function show($slug)
    {
        $room = [
            'slug' => $slug,
            'name' => ucwords(str_replace('-', ' ', $slug)),
            'duration' => '60 min',
            'difficulty' => 'Medium',
            'players' => '2-6',
            'description' => 'A compelling escape room experience designed for groups who love a challenge. Work together, find clues, and escape in time.',
            'features' => [
                'Immersive environment',
                'Puzzles & riddles',
                'Hint system available',
            ],
        ];

        return view('public.rooms.show', compact('room'));
    }
}
