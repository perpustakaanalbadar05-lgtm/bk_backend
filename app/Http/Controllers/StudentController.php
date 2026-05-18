<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return response()->json(Student::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'nis' => 'required|string|unique:students',
            'kelas' => 'required|string',
            'jk' => 'required|in:L,P',
            'status' => 'required|string',
            'hp' => 'nullable|string',
            'alamat' => 'nullable|string',
        ]);

        $student = Student::create($validated);
        return response()->json($student, 201);
    }
}
