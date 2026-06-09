<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return response()->json(Student::withCount('counselingSessions')->orderBy('created_at', 'desc')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'   => 'required|string|max:255',
            'nis'    => 'required|string|unique:students,nis',
            'kelas'  => 'required|string|max:50',
            'jk'     => 'required|in:L,P',
            'status' => 'required|in:Aktif,Perhatian,Alumni',
            'hp'     => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
        ]);

        $student = Student::create($validated);
        return response()->json($student, 201);
    }

    public function bulkStore(Request $request)
    {
        $validated = $request->validate([
            'students' => 'required|array',
            'students.*.nama'   => 'required|string|max:255',
            'students.*.nis'    => 'required|string|distinct|unique:students,nis',
            'students.*.kelas'  => 'required|string|max:50',
            'students.*.jk'     => 'required|in:L,P',
            'students.*.status' => 'required|in:Aktif,Perhatian,Alumni',
            'students.*.hp'     => 'nullable|string|max:20',
            'students.*.alamat' => 'nullable|string',
        ]);

        $students = [];
        $userId = auth()->id();
        foreach ($validated['students'] as $studentData) {
            $studentData['user_id'] = $userId;
            $studentData['created_at'] = now()->toDateTimeString();
            $studentData['updated_at'] = now()->toDateTimeString();
            $students[] = $studentData;
        }

        Student::insert($students);

        return response()->json(['message' => count($students) . ' students imported successfully'], 201);
    }

    public function show(Student $student)
    {
        return response()->json($student->loadCount('counselingSessions'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'nama'      => 'sometimes|required|string|max:255',
            'nis'       => 'sometimes|required|string|unique:students,nis,' . $student->id,
            'kelas'     => 'sometimes|required|string|max:50',
            'jk'        => 'sometimes|required|in:L,P',
            'status'    => 'sometimes|required|in:Aktif,Perhatian,Alumni',
            'hp'        => 'nullable|string|max:20',
            'alamat'    => 'nullable|string',
        ]);

        $student->update($validated);
        return response()->json($student);
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json(['message' => 'Siswa berhasil dihapus.']);
    }
}
