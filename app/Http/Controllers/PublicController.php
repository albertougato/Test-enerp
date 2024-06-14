<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $events = Event::all();

        return view('welcome', compact('events'));
    }
}
