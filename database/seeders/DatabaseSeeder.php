<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        \App\Models\User::factory()->create([
            'name' => 'Guru BK',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        // Students
        $s1 = \App\Models\Student::create(['nama' => 'Ahmad Fauzi', 'nis' => '2024001', 'kelas' => 'XI IPA 2', 'jk' => 'L', 'status' => 'Aktif', 'hp' => '081234567890', 'alamat' => 'Jl. Merdeka No. 12, Jakarta']);
        $s2 = \App\Models\Student::create(['nama' => 'Siti Rahma', 'nis' => '2024002', 'kelas' => 'X IPS 1', 'jk' => 'P', 'status' => 'Aktif', 'hp' => '082345678901', 'alamat' => 'Jl. Sudirman No. 45, Jakarta']);
        $s3 = \App\Models\Student::create(['nama' => 'Budi Santoso', 'nis' => '2024003', 'kelas' => 'XII IPA 1', 'jk' => 'L', 'status' => 'Aktif', 'hp' => '083456789012', 'alamat' => 'Jl. Gatot Subroto No. 7, Jakarta']);

        // Sessions
        \App\Models\CounselingSession::create(['student_id' => $s1->id, 'kelas' => 'XI IPA 2', 'tanggal' => '11 Mei 2026', 'topik' => 'Masalah Belajar', 'jenis' => 'Individu', 'status' => 'Selesai', 'durasi' => '45 mnt', 'signature' => true]);
        \App\Models\CounselingSession::create(['student_id' => $s2->id, 'kelas' => 'X IPS 1', 'tanggal' => '11 Mei 2026', 'topik' => 'Karir & Studi Lanjut', 'jenis' => 'Individu', 'status' => 'Proses', 'durasi' => '30 mnt', 'signature' => false]);
        \App\Models\CounselingSession::create(['student_id' => $s1->id, 'kelas' => 'X IPA 1', 'tanggal' => '10 Mei 2026', 'topik' => 'Orientasi BK', 'jenis' => 'Kelompok', 'status' => 'Selesai', 'durasi' => '60 mnt', 'signature' => true]);

        // Kasus
        \App\Models\Kasus::create(['student_id' => $s1->id, 'kelas' => 'XI IPA 2', 'kasus' => 'Sering membolos (Alpa > 3x)', 'poin' => 20, 'status' => 'Selesai', 'visit' => true, 'date' => '11 Mei 2026']);
        \App\Models\Kasus::create(['student_id' => $s3->id, 'kelas' => 'XII IPA 1', 'kasus' => 'Berkelahi di lingkungan sekolah', 'poin' => 50, 'status' => 'Proses', 'visit' => false, 'date' => '10 Mei 2026']);

        // Schedules
        \App\Models\Schedule::create(['class' => 'XI IPA 2', 'topic' => 'Strategi Sukses Ujian', 'time' => 'Senin, 08:00', 'status' => 'Selesai', 'attended' => 32, 'total' => 34]);
        \App\Models\Schedule::create(['class' => 'X IPS 1', 'topic' => 'Bahaya Bullying', 'time' => 'Selasa, 10:30', 'status' => 'Berlangsung', 'attended' => 0, 'total' => 36]);
        \App\Models\Schedule::create(['class' => 'XII IPA 1', 'topic' => 'Orientasi Perguruan Tinggi', 'time' => 'Rabu, 13:00', 'status' => 'Terjadwal', 'attended' => 0, 'total' => 35]);
    }
}
