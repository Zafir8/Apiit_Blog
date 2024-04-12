<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;


class EventController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('events.index', [
            'featuredEvents' => Event::published()->featured()->latest('published_at')->take(3)->get(),
            'latestEvents' => Event::published()->latest('published_at')->get()
        ]);
    }
}
