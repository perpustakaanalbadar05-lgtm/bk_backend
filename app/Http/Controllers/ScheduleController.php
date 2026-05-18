<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return response()->json(Schedule::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'class' => 'required|string',
            'topic' => 'required|string',
            'time' => 'required|string',
            'status' => 'required|string',
            'attended' => 'integer',
            'total' => 'integer',
        ]);

        $schedule = Schedule::create($validated);
        return response()->json($schedule, 201);
    }
}
