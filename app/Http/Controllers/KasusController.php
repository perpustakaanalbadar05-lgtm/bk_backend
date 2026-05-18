<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use Illuminate\Http\Request;

class KasusController extends Controller
{
    public function index()
    {
        return response()->json(Kasus::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa' => 'required|string',
            'kelas' => 'required|string',
            'kasus' => 'required|string',
            'poin' => 'required|integer',
            'status' => 'required|string',
            'visit' => 'boolean',
            'date' => 'required|string',
        ]);

        $kasus = Kasus::create($validated);
        return response()->json($kasus, 201);
    }
}
