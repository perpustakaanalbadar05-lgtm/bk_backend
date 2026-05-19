<?php

namespace App\Http\Controllers;

use App\Models\CounselingSession;
use Illuminate\Http\Request;

class CounselingSessionController extends Controller
{
    public function index()
    {
        return response()->json(CounselingSession::orderBy('created_at', 'desc')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa'     => 'required|string|max:255',
            'kelas'     => 'required|string|max:50',
            'tanggal'   => 'required|string',
            'topik'     => 'required|string|max:255',
            'jenis'     => 'required|in:Individu,Kelompok,Klasikal',
            'status'    => 'required|in:Selesai,Proses,Terjadwal',
            'durasi'    => 'nullable|string|max:20',
            'ringkasan' => 'nullable|string',
            'signature' => 'boolean',
        ]);

        $session = CounselingSession::create($validated);
        return response()->json($session, 201);
    }

    public function show(CounselingSession $session)
    {
        return response()->json($session);
    }

    public function update(Request $request, CounselingSession $session)
    {
        $validated = $request->validate([
            'siswa'     => 'sometimes|required|string|max:255',
            'kelas'     => 'sometimes|required|string|max:50',
            'tanggal'   => 'sometimes|required|string',
            'topik'     => 'sometimes|required|string|max:255',
            'jenis'     => 'sometimes|required|in:Individu,Kelompok,Klasikal',
            'status'    => 'sometimes|required|in:Selesai,Proses,Terjadwal',
            'durasi'    => 'nullable|string|max:20',
            'ringkasan' => 'nullable|string',
            'signature' => 'boolean',
        ]);

        $session->update($validated);
        return response()->json($session);
    }

    public function destroy(CounselingSession $session)
    {
        $session->delete();
        return response()->json(['message' => 'Sesi konseling berhasil dihapus.']);
    }
}
