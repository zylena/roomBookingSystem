<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Room;

class HomeController extends Controller
{
    public function index()
    {
        $rooms = Room::all();

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
