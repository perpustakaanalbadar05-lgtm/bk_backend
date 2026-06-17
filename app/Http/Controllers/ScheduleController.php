<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return response()->json(Schedule::orderBy('created_at', 'desc')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'class'    => 'required|string|max:50',
            'topic'    => 'required|string|max:255',
            'time'     => 'required|string|max:100',
            'date'     => 'nullable|string|max:50',
            'materi'   => 'nullable|string|max:255',
            'metode'   => 'nullable|string|max:255',
            'catatan'  => 'nullable|string',
            'status'   => 'required|in:Terjadwal,Berlangsung,Selesai',
            'attended' => 'nullable|integer|min:0',
            'total'    => 'nullable|integer|min:0',
            'attendance_data' => 'nullable|array',
        ]);

        $schedule = Schedule::create($validated);
        return response()->json($schedule, 201);
    }

    public function show(Schedule $schedule)
    {
        return response()->json($schedule);
    }

    public function update(Request $request, Schedule $schedule)
    {
        $validated = $request->validate([
            'class'    => 'sometimes|required|string|max:50',
            'topic'    => 'sometimes|required|string|max:255',
            'time'     => 'sometimes|required|string|max:100',
            'date'     => 'nullable|string|max:50',
            'materi'   => 'nullable|string|max:255',
            'metode'   => 'nullable|string|max:255',
            'catatan'  => 'nullable|string',
            'status'   => 'sometimes|required|in:Terjadwal,Berlangsung,Selesai',
            'attended' => 'nullable|integer|min:0',
            'total'    => 'nullable|integer|min:0',
            'attendance_data' => 'nullable|array',
        ]);

        $schedule->update($validated);
        return response()->json($schedule);
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return response()->json(['message' => 'Jadwal berhasil dihapus.']);
    }
}
