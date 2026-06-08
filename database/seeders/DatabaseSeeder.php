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
        // Super Admin User
        \App\Models\User::factory()->create([
            'name' => 'Super Admin Utama',
            'email' => 'super@admin.com',
            'password' => bcrypt('password'),
            'role' => 'super_admin',
        ]);

        // Guru BK User
        $guruBk = \App\Models\User::factory()->create([
            'name' => 'Guru BK 1',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'role' => 'guru_bk',
        ]);

        // Students
        $s1 = \App\Models\Student::create(['user_id' => $guruBk->id, 'nama' => 'Ahmad Fauzi', 'nis' => '2024001', 'kelas' => 'XI IPA 2', 'jk' => 'L', 'status' => 'Aktif', 'hp' => '081234567890', 'alamat' => 'Jl. Merdeka No. 12, Jakarta']);
        $s2 = \App\Models\Student::create(['user_id' => $guruBk->id, 'nama' => 'Siti Rahma', 'nis' => '2024002', 'kelas' => 'X IPS 1', 'jk' => 'P', 'status' => 'Aktif', 'hp' => '082345678901', 'alamat' => 'Jl. Sudirman No. 45, Jakarta']);
        $s3 = \App\Models\Student::create(['user_id' => $guruBk->id, 'nama' => 'Budi Santoso', 'nis' => '2024003', 'kelas' => 'XII IPA 1', 'jk' => 'L', 'status' => 'Aktif', 'hp' => '083456789012', 'alamat' => 'Jl. Gatot Subroto No. 7, Jakarta']);

        // Sessions
        \App\Models\CounselingSession::create(['user_id' => $guruBk->id, 'student_id' => $s1->id, 'kelas' => 'XI IPA 2', 'tanggal' => '11 Mei 2026', 'topik' => 'Masalah Belajar', 'jenis' => 'Individu', 'status' => 'Selesai', 'durasi' => '45 mnt', 'signature' => true]);
        \App\Models\CounselingSession::create(['user_id' => $guruBk->id, 'student_id' => $s2->id, 'kelas' => 'X IPS 1', 'tanggal' => '11 Mei 2026', 'topik' => 'Karir & Studi Lanjut', 'jenis' => 'Individu', 'status' => 'Proses', 'durasi' => '30 mnt', 'signature' => false]);
        \App\Models\CounselingSession::create(['user_id' => $guruBk->id, 'student_id' => $s1->id, 'kelas' => 'X IPA 1', 'tanggal' => '10 Mei 2026', 'topik' => 'Orientasi BK', 'jenis' => 'Kelompok', 'status' => 'Selesai', 'durasi' => '60 mnt', 'signature' => true]);

        // Kasus
        \App\Models\Kasus::create(['user_id' => $guruBk->id, 'student_id' => $s1->id, 'kelas' => 'XI IPA 2', 'kasus' => 'Sering membolos (Alpa > 3x)', 'poin' => 20, 'status' => 'Selesai', 'visit' => true, 'date' => '11 Mei 2026']);
        \App\Models\Kasus::create(['user_id' => $guruBk->id, 'student_id' => $s3->id, 'kelas' => 'XII IPA 1', 'kasus' => 'Berkelahi di lingkungan sekolah', 'poin' => 50, 'status' => 'Proses', 'visit' => false, 'date' => '10 Mei 2026']);

        // Schedules
        \App\Models\Schedule::create(['user_id' => $guruBk->id, 'class' => 'XI IPA 2', 'topic' => 'Strategi Sukses Ujian', 'time' => 'Senin, 08:00', 'status' => 'Selesai', 'attended' => 32, 'total' => 34]);
        \App\Models\Schedule::create(['user_id' => $guruBk->id, 'class' => 'X IPS 1', 'topic' => 'Bahaya Bullying', 'time' => 'Selasa, 10:30', 'status' => 'Berlangsung', 'attended' => 0, 'total' => 36]);
        \App\Models\Schedule::create(['user_id' => $guruBk->id, 'class' => 'XII IPA 1', 'topic' => 'Orientasi Perguruan Tinggi', 'time' => 'Rabu, 13:00', 'status' => 'Terjadwal', 'attended' => 0, 'total' => 35]);
    }
}
