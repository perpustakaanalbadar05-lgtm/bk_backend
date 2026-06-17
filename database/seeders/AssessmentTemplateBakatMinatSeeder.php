<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\AssessmentTemplate;

class AssessmentTemplateBakatMinatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gurus = User::where('role', 'guru_bk')->get();

        $bakatMinatData = [
            [ "no" => 1, "pernyataan" => "Saya senang memperbaiki atau merakit suatu benda.", "bidangKode" => "R", "bidang" => "Realistis", "materi" => "Minat Realistis" ],
            [ "no" => 2, "pernyataan" => "Saya tertarik menggunakan alat, mesin, atau peralatan kerja.", "bidangKode" => "R", "bidang" => "Realistis", "materi" => "Minat Realistis" ],
            [ "no" => 3, "pernyataan" => "Saya lebih suka praktik daripada teori.", "bidangKode" => "R", "bidang" => "Realistis", "materi" => "Minat Realistis" ],
            [ "no" => 4, "pernyataan" => "Saya menikmati kegiatan di luar ruangan.", "bidangKode" => "R", "bidang" => "Realistis", "materi" => "Minat Realistis" ],
            [ "no" => 5, "pernyataan" => "Saya tertarik pada pekerjaan teknik atau konstruksi.", "bidangKode" => "R", "bidang" => "Realistis", "materi" => "Minat Realistis" ],
            [ "no" => 6, "pernyataan" => "Saya senang membuat sesuatu dengan tangan saya sendiri.", "bidangKode" => "R", "bidang" => "Realistis", "materi" => "Minat Realistis" ],
            [ "no" => 7, "pernyataan" => "Saya suka memecahkan masalah yang rumit.", "bidangKode" => "I", "bidang" => "Investigatif", "materi" => "Minat Investigatif" ],
            [ "no" => 8, "pernyataan" => "Saya tertarik melakukan penelitian atau eksperimen.", "bidangKode" => "I", "bidang" => "Investigatif", "materi" => "Minat Investigatif" ],
            [ "no" => 9, "pernyataan" => "Saya senang menganalisis data atau informasi.", "bidangKode" => "I", "bidang" => "Investigatif", "materi" => "Minat Investigatif" ],
            [ "no" => 10, "pernyataan" => "Saya suka mencari tahu penyebab suatu peristiwa.", "bidangKode" => "I", "bidang" => "Investigatif", "materi" => "Minat Investigatif" ],
            [ "no" => 11, "pernyataan" => "Saya tertarik pada pelajaran sains dan matematika.", "bidangKode" => "I", "bidang" => "Investigatif", "materi" => "Minat Investigatif" ],
            [ "no" => 12, "pernyataan" => "Saya senang menemukan solusi baru terhadap masalah.", "bidangKode" => "I", "bidang" => "Investigatif", "materi" => "Minat Investigatif" ],
            [ "no" => 13, "pernyataan" => "Saya suka menggambar atau membuat desain.", "bidangKode" => "A", "bidang" => "Artistik", "materi" => "Minat Artistik" ],
            [ "no" => 14, "pernyataan" => "Saya senang menulis cerita, puisi, atau karya kreatif.", "bidangKode" => "A", "bidang" => "Artistik", "materi" => "Minat Artistik" ],
            [ "no" => 15, "pernyataan" => "Saya tertarik pada musik, tari, atau teater.", "bidangKode" => "A", "bidang" => "Artistik", "materi" => "Minat Artistik" ],
            [ "no" => 16, "pernyataan" => "Saya memiliki banyak ide kreatif.", "bidangKode" => "A", "bidang" => "Artistik", "materi" => "Minat Artistik" ],
            [ "no" => 17, "pernyataan" => "Saya senang mengekspresikan diri melalui karya.", "bidangKode" => "A", "bidang" => "Artistik", "materi" => "Minat Artistik" ],
            [ "no" => 18, "pernyataan" => "Saya lebih suka kegiatan yang fleksibel daripada yang kaku.", "bidangKode" => "A", "bidang" => "Artistik", "materi" => "Minat Artistik" ],
            [ "no" => 19, "pernyataan" => "Saya senang membantu orang lain.", "bidangKode" => "S", "bidang" => "Sosial", "materi" => "Minat Sosial" ],
            [ "no" => 20, "pernyataan" => "Saya tertarik mengajar atau membimbing teman.", "bidangKode" => "S", "bidang" => "Sosial", "materi" => "Minat Sosial" ],
            [ "no" => 21, "pernyataan" => "Saya mudah memahami perasaan orang lain.", "bidangKode" => "S", "bidang" => "Sosial", "materi" => "Minat Sosial" ],
            [ "no" => 22, "pernyataan" => "Saya senang bekerja dalam kelompok.", "bidangKode" => "S", "bidang" => "Sosial", "materi" => "Minat Sosial" ],
            [ "no" => 23, "pernyataan" => "Saya suka terlibat dalam kegiatan sosial.", "bidangKode" => "S", "bidang" => "Sosial", "materi" => "Minat Sosial" ],
            [ "no" => 24, "pernyataan" => "Saya merasa puas ketika dapat membantu seseorang.", "bidangKode" => "S", "bidang" => "Sosial", "materi" => "Minat Sosial" ],
            [ "no" => 25, "pernyataan" => "Saya senang memimpin suatu kegiatan.", "bidangKode" => "E", "bidang" => "Enterprising", "materi" => "Minat Enterprising" ],
            [ "no" => 26, "pernyataan" => "Saya percaya diri berbicara di depan banyak orang.", "bidangKode" => "E", "bidang" => "Enterprising", "materi" => "Minat Enterprising" ],
            [ "no" => 27, "pernyataan" => "Saya suka meyakinkan orang lain terhadap suatu ide.", "bidangKode" => "E", "bidang" => "Enterprising", "materi" => "Minat Enterprising" ],
            [ "no" => 28, "pernyataan" => "Saya tertarik menjalankan usaha atau bisnis.", "bidangKode" => "E", "bidang" => "Enterprising", "materi" => "Minat Enterprising" ],
            [ "no" => 29, "pernyataan" => "Saya senang mengambil keputusan penting.", "bidangKode" => "E", "bidang" => "Enterprising", "materi" => "Minat Enterprising" ],
            [ "no" => 30, "pernyataan" => "Saya suka mengorganisasi kegiatan atau acara.", "bidangKode" => "E", "bidang" => "Enterprising", "materi" => "Minat Enterprising" ],
            [ "no" => 31, "pernyataan" => "Saya senang bekerja dengan data atau dokumen.", "bidangKode" => "C", "bidang" => "Konvensional", "materi" => "Minat Konvensional" ],
            [ "no" => 32, "pernyataan" => "Saya suka membuat daftar dan jadwal kegiatan.", "bidangKode" => "C", "bidang" => "Konvensional", "materi" => "Minat Konvensional" ],
            [ "no" => 33, "pernyataan" => "Saya teliti dalam mengerjakan tugas.", "bidangKode" => "C", "bidang" => "Konvensional", "materi" => "Minat Konvensional" ],
            [ "no" => 34, "pernyataan" => "Saya menyukai pekerjaan yang teratur dan sistematis.", "bidangKode" => "C", "bidang" => "Konvensional", "materi" => "Minat Konvensional" ],
            [ "no" => 35, "pernyataan" => "Saya senang mengelola arsip atau informasi.", "bidangKode" => "C", "bidang" => "Konvensional", "materi" => "Minat Konvensional" ],
            [ "no" => 36, "pernyataan" => "Saya merasa nyaman mengikuti prosedur yang jelas.", "bidangKode" => "C", "bidang" => "Konvensional", "materi" => "Minat Konvensional" ]
        ];

        foreach ($gurus as $guruBk) {
            AssessmentTemplate::updateOrCreate(
                ['user_id' => $guruBk->id, 'type' => 'bakat-minat'],
                ['master_data' => $bakatMinatData]
            );
        }
    }
}
