<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        // Provide a small set of featured rooms for the home page.
        $rooms = [
            ['slug' => 'the-labyrinth', 'name' => 'The Labyrinth', 'duration' => '60 min', 'difficulty' => 'Medium', 'tagline' => 'Escape the twisting maze before time runs out.'],
            ['slug' => 'haunted-mansion', 'name' => 'Haunted Mansion', 'duration' => '75 min', 'difficulty' => 'Hard', 'tagline' => 'A ghostly mystery with puzzles around every corner.'],
            ['slug' => 'bank-heist', 'name' => 'Bank Heist', 'duration' => '50 min', 'difficulty' => 'Easy', 'tagline' => 'Pull off a daring robbery without getting caught.'],
        ];

        return view('public.home', compact('rooms'));
    }

    public function about()
    {
        return view('public.about');
    }

    public function contact()
    {
        return view('public.contact');
    }
}
