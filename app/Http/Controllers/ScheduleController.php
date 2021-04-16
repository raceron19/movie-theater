<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function store(Request $request, Movie $movie)
    {
        $data = $request->validate([
            'date' => ['required','date'],
            'theater_hall' => ['required'],
            'capacity' => ['required','numeric','between:1,999'],
        ]);
        $schedule = $movie->schedules()->create($data);
        return $schedule;
    }
}
