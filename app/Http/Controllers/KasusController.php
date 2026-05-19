<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use Illuminate\Http\Request;

class KasusController extends Controller
{
    public function index()
    {
        return response()->json(Kasus::orderBy('created_at', 'desc')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa'  => 'required|string|max:255',
            'kelas'  => 'required|string|max:50',
            'kasus'  => 'required|string',
            'poin'   => 'required|integer|min:0|max:100',
            'status' => 'required|in:Proses,Selesai,Terjadwal',
            'visit'  => 'boolean',
            'date'   => 'required|string',
        ]);

        $kasus = Kasus::create($validated);
        return response()->json($kasus, 201);
    }

    public function show(Kasus $kasus)
    {
        return response()->json($kasus);
    }

    public function update(Request $request, Kasus $kasus)
    {
        $validated = $request->validate([
            'siswa'  => 'sometimes|required|string|max:255',
            'kelas'  => 'sometimes|required|string|max:50',
            'kasus'  => 'sometimes|required|string',
            'poin'   => 'sometimes|required|integer|min:0|max:100',
            'status' => 'sometimes|required|in:Proses,Selesai,Terjadwal',
            'visit'  => 'boolean',
            'date'   => 'sometimes|required|string',
        ]);

        $kasus->update($validated);
        return response()->json($kasus);
    }

    public function destroy(Kasus $kasus)
    {
        $kasus->delete();
        return response()->json(['message' => 'Kasus berhasil dihapus.']);
    }
}
