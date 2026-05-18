<?php

namespace App\Http\Controllers;

use App\Models\CounselingSession;
use Illuminate\Http\Request;

class CounselingSessionController extends Controller
{
    public function index()
    {
        return response()->json(CounselingSession::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa' => 'required|string',
            'kelas' => 'required|string',
            'tanggal' => 'required|string',
            'topik' => 'required|string',
            'jenis' => 'required|string',
            'status' => 'required|string',
            'durasi' => 'nullable|string',
            'signature' => 'boolean',
        ]);

        $session = CounselingSession::create($validated);
        return response()->json($session, 201);
    }
}
