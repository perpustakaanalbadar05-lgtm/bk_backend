<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;
use App\Models\CounselingSession;
use App\Models\Kasus;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Model;

class DummyDataSeeder extends Seeder
{
    public function run()
    {
        $users = User::where('role', 'guru_bk')->get();

        foreach ($users as $user) {
            if (Student::where('user_id', $user->id)->count() == 0) {
                Model::unguard();

                $s1 = Student::create(['user_id' => $user->id, 'nama' => 'Ahmad Fauzi', 'nis' => '2024' . $user->id . '001', 'kelas' => 'XI IPA 2', 'jk' => 'L', 'status' => 'Aktif', 'hp' => '081234567890', 'alamat' => 'Jl. Merdeka No. 12, Jakarta']);
                $s2 = Student::create(['user_id' => $user->id, 'nama' => 'Siti Rahma', 'nis' => '2024' . $user->id . '002', 'kelas' => 'X IPS 1', 'jk' => 'P', 'status' => 'Aktif', 'hp' => '082345678901', 'alamat' => 'Jl. Sudirman No. 45, Jakarta']);
                $s3 = Student::create(['user_id' => $user->id, 'nama' => 'Budi Santoso', 'nis' => '2024' . $user->id . '003', 'kelas' => 'XII IPA 1', 'jk' => 'L', 'status' => 'Aktif', 'hp' => '083456789012', 'alamat' => 'Jl. Gatot Subroto No. 7, Jakarta']);

                CounselingSession::create(['user_id' => $user->id, 'student_id' => $s1->id, 'kelas' => 'XI IPA 2', 'tanggal' => '11 Mei 2026', 'topik' => 'Masalah Belajar', 'jenis' => 'Individu', 'status' => 'Selesai', 'durasi' => '45 mnt', 'signature' => true]);
                CounselingSession::create(['user_id' => $user->id, 'student_id' => $s2->id, 'kelas' => 'X IPS 1', 'tanggal' => '11 Mei 2026', 'topik' => 'Karir & Studi Lanjut', 'jenis' => 'Individu', 'status' => 'Proses', 'durasi' => '30 mnt', 'signature' => false]);
                CounselingSession::create(['user_id' => $user->id, 'student_id' => $s1->id, 'kelas' => 'X IPA 1', 'tanggal' => '10 Mei 2026', 'topik' => 'Orientasi BK', 'jenis' => 'Kelompok', 'status' => 'Selesai', 'durasi' => '60 mnt', 'signature' => true]);

                Kasus::create(['user_id' => $user->id, 'student_id' => $s1->id, 'kelas' => 'XI IPA 2', 'kasus' => 'Sering membolos (Alpa > 3x)', 'poin' => 20, 'status' => 'Selesai', 'visit' => true, 'date' => '11 Mei 2026']);
                Kasus::create(['user_id' => $user->id, 'student_id' => $s3->id, 'kelas' => 'XII IPA 1', 'kasus' => 'Berkelahi di lingkungan sekolah', 'poin' => 50, 'status' => 'Proses', 'visit' => false, 'date' => '10 Mei 2026']);

                Schedule::create(['user_id' => $user->id, 'class' => 'XI IPA 2', 'topic' => 'Strategi Sukses Ujian', 'date' => '2026-06-08', 'time' => '08:00', 'status' => 'Selesai', 'attended' => 32, 'total' => 34, 'materi' => 'Strategi kognitif untuk ujian']);
                Schedule::create(['user_id' => $user->id, 'class' => 'X IPS 1', 'topic' => 'Bahaya Bullying', 'date' => '2026-06-09', 'time' => '10:30', 'status' => 'Berlangsung', 'attended' => 0, 'total' => 36, 'materi' => 'Dampak psikologis dari bullying']);
                Schedule::create(['user_id' => $user->id, 'class' => 'XII IPA 1', 'topic' => 'Orientasi Perguruan Tinggi', 'date' => '2026-06-10', 'time' => '13:00', 'status' => 'Terjadwal', 'attended' => 0, 'total' => 35, 'materi' => 'Memilih jurusan sesuai minat']);
                
                Model::reguard();
            }
        }
    }
}
