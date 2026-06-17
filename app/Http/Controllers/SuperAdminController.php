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

        // Tambahkan dummy data agar akun baru langsung memiliki isi yang sama dengan Guru BK 1
        \Illuminate\Database\Eloquent\Model::unguard();
        
        $s1 = Student::create(['user_id' => $user->id, 'nama' => 'Ahmad Fauzi', 'nis' => '2024' . $user->id . '001', 'kelas' => 'XI IPA 2', 'jk' => 'L', 'status' => 'Aktif', 'hp' => '081234567890', 'alamat' => 'Jl. Merdeka No. 12, Jakarta']);
        $s2 = Student::create(['user_id' => $user->id, 'nama' => 'Siti Rahma', 'nis' => '2024' . $user->id . '002', 'kelas' => 'X IPS 1', 'jk' => 'P', 'status' => 'Aktif', 'hp' => '082345678901', 'alamat' => 'Jl. Sudirman No. 45, Jakarta']);
        $s3 = Student::create(['user_id' => $user->id, 'nama' => 'Budi Santoso', 'nis' => '2024' . $user->id . '003', 'kelas' => 'XII IPA 1', 'jk' => 'L', 'status' => 'Aktif', 'hp' => '083456789012', 'alamat' => 'Jl. Gatot Subroto No. 7, Jakarta']);

        CounselingSession::create(['user_id' => $user->id, 'student_id' => $s1->id, 'kelas' => 'XI IPA 2', 'tanggal' => '11 Mei 2026', 'topik' => 'Masalah Belajar', 'jenis' => 'Individu', 'status' => 'Selesai', 'durasi' => '45 mnt', 'signature' => true]);
        CounselingSession::create(['user_id' => $user->id, 'student_id' => $s2->id, 'kelas' => 'X IPS 1', 'tanggal' => '11 Mei 2026', 'topik' => 'Karir & Studi Lanjut', 'jenis' => 'Individu', 'status' => 'Proses', 'durasi' => '30 mnt', 'signature' => false]);
        CounselingSession::create(['user_id' => $user->id, 'student_id' => $s1->id, 'kelas' => 'X IPA 1', 'tanggal' => '10 Mei 2026', 'topik' => 'Orientasi BK', 'jenis' => 'Kelompok', 'status' => 'Selesai', 'durasi' => '60 mnt', 'signature' => true]);

        Kasus::create(['user_id' => $user->id, 'student_id' => $s1->id, 'kelas' => 'XI IPA 2', 'kasus' => 'Sering membolos (Alpa > 3x)', 'poin' => 20, 'status' => 'Selesai', 'visit' => true, 'date' => '11 Mei 2026']);
        Kasus::create(['user_id' => $user->id, 'student_id' => $s3->id, 'kelas' => 'XII IPA 1', 'kasus' => 'Berkelahi di lingkungan sekolah', 'poin' => 50, 'status' => 'Proses', 'visit' => false, 'date' => '10 Mei 2026']);

        \App\Models\Schedule::create(['user_id' => $user->id, 'class' => 'XI IPA 2', 'topic' => 'Strategi Sukses Ujian', 'date' => '2026-06-08', 'time' => '08:00', 'status' => 'Selesai', 'attended' => 32, 'total' => 34, 'materi' => 'Strategi kognitif untuk ujian']);
        \App\Models\Schedule::create(['user_id' => $user->id, 'class' => 'X IPS 1', 'topic' => 'Bahaya Bullying', 'date' => '2026-06-09', 'time' => '10:30', 'status' => 'Berlangsung', 'attended' => 0, 'total' => 36, 'materi' => 'Dampak psikologis dari bullying']);
        \App\Models\Schedule::create(['user_id' => $user->id, 'class' => 'XII IPA 1', 'topic' => 'Orientasi Perguruan Tinggi', 'date' => '2026-06-10', 'time' => '13:00', 'status' => 'Terjadwal', 'attended' => 0, 'total' => 35, 'materi' => 'Memilih jurusan sesuai minat']);
        
        \Illuminate\Database\Eloquent\Model::reguard();

        // Seed assessment templates for the new user
        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'AssessmentTemplateSeeder']);
        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'AssessmentTemplateBakatMinatSeeder']);
        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'AssessmentTemplateGayaBelajarSeeder']);

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
