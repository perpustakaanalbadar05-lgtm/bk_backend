<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Kasus;
use App\Models\CounselingSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    public function dashboardStats()
    {
        return response()->json([
            'total_guru_bk' => User::where('role', 'guru_bk')->count(),
            'total_students' => Student::count(),
            'total_cases' => Kasus::count(),
            'total_sessions' => CounselingSession::count(),
        ]);
    }

    public function getGuruBk()
    {
        return response()->json(User::where('role', 'guru_bk')->get());
    }

    public function storeGuruBk(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'nip' => 'nullable|string',
            'hp' => 'nullable|string',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'nip' => $validated['nip'] ?? null,
            'hp' => $validated['hp'] ?? null,
            'role' => 'guru_bk',
        ]);

        return response()->json($user, 201);
    }

    public function updateGuruBk(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'nip' => 'nullable|string',
            'hp' => 'nullable|string',
        ]);

        $data = [
            'name' => $validated['name'] ?? $user->name,
            'email' => $validated['email'] ?? $user->email,
            'nip' => $validated['nip'] ?? $user->nip,
            'hp' => $validated['hp'] ?? $user->hp,
        ];

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        $user->update($data);

        return response()->json($user);
    }

    public function deleteGuruBk($id)
    {
        $user = User::where('role', 'guru_bk')->findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
