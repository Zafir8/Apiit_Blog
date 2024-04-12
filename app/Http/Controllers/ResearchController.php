<?php

namespace App\Http\Controllers;

use App\Models\Research;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('research.index', [
            'featuredResearch' => Research::published()->featured()->latest('published_at')->take(3)->get(),
            'latestResearch' => Research::published()->latest('published_at')->get()
        ]);


    }
}
