<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\AssessmentTemplate;

class AssessmentTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gurus = User::where('role', 'guru_bk')->get();

        $kecerdasanData = [
            [ "no" => 1, "pernyataan" => "Saya senang membaca buku atau artikel.", "bidangKode" => "L", "bidang" => "Linguistik", "materi" => "Kecerdasan Linguistik" ],
            [ "no" => 2, "pernyataan" => "Saya suka menulis cerita, catatan, atau pengalaman.", "bidangKode" => "L", "bidang" => "Linguistik", "materi" => "Kecerdasan Linguistik" ],
            [ "no" => 3, "pernyataan" => "Saya mudah menjelaskan sesuatu kepada orang lain.", "bidangKode" => "L", "bidang" => "Linguistik", "materi" => "Kecerdasan Linguistik" ],
            [ "no" => 4, "pernyataan" => "Saya senang berdiskusi atau berbicara di depan orang lain.", "bidangKode" => "L", "bidang" => "Linguistik", "materi" => "Kecerdasan Linguistik" ],
            [ "no" => 5, "pernyataan" => "Saya mudah memahami arti kata-kata baru.", "bidangKode" => "L", "bidang" => "Linguistik", "materi" => "Kecerdasan Linguistik" ],
            [ "no" => 6, "pernyataan" => "Saya senang memecahkan teka-teki atau soal logika.", "bidangKode" => "M", "bidang" => "Logika-Matematika", "materi" => "Kecerdasan Logika-Matematika" ],
            [ "no" => 7, "pernyataan" => "Saya suka berhitung dan bekerja dengan angka.", "bidangKode" => "M", "bidang" => "Logika-Matematika", "materi" => "Kecerdasan Logika-Matematika" ],
            [ "no" => 8, "pernyataan" => "Saya tertarik mencari penyebab suatu peristiwa.", "bidangKode" => "M", "bidang" => "Logika-Matematika", "materi" => "Kecerdasan Logika-Matematika" ],
            [ "no" => 9, "pernyataan" => "Saya senang mengelompokkan atau mengurutkan sesuatu.", "bidangKode" => "M", "bidang" => "Logika-Matematika", "materi" => "Kecerdasan Logika-Matematika" ],
            [ "no" => 10, "pernyataan" => "Saya suka mencari solusi dari suatu masalah.", "bidangKode" => "M", "bidang" => "Logika-Matematika", "materi" => "Kecerdasan Logika-Matematika" ],
            [ "no" => 11, "pernyataan" => "Saya mudah memahami gambar, peta, atau diagram.", "bidangKode" => "V", "bidang" => "Visual-Spasial", "materi" => "Kecerdasan Visual-Spasial" ],
            [ "no" => 12, "pernyataan" => "Saya senang menggambar atau membuat desain.", "bidangKode" => "V", "bidang" => "Visual-Spasial", "materi" => "Kecerdasan Visual-Spasial" ],
            [ "no" => 13, "pernyataan" => "Saya mudah membayangkan bentuk suatu benda.", "bidangKode" => "V", "bidang" => "Visual-Spasial", "materi" => "Kecerdasan Visual-Spasial" ],
            [ "no" => 14, "pernyataan" => "Saya suka melihat ilustrasi saat belajar.", "bidangKode" => "V", "bidang" => "Visual-Spasial", "materi" => "Kecerdasan Visual-Spasial" ],
            [ "no" => 15, "pernyataan" => "Saya memperhatikan detail visual di sekitar saya.", "bidangKode" => "V", "bidang" => "Visual-Spasial", "materi" => "Kecerdasan Visual-Spasial" ],
            [ "no" => 16, "pernyataan" => "Saya lebih mudah belajar dengan praktik langsung.", "bidangKode" => "K", "bidang" => "Kinestetik", "materi" => "Kecerdasan Kinestetik" ],
            [ "no" => 17, "pernyataan" => "Saya senang kegiatan yang melibatkan gerakan tubuh.", "bidangKode" => "K", "bidang" => "Kinestetik", "materi" => "Kecerdasan Kinestetik" ],
            [ "no" => 18, "pernyataan" => "Saya suka membuat atau merakit sesuatu.", "bidangKode" => "K", "bidang" => "Kinestetik", "materi" => "Kecerdasan Kinestetik" ],
            [ "no" => 19, "pernyataan" => "Saya sulit duduk diam dalam waktu lama.", "bidangKode" => "K", "bidang" => "Kinestetik", "materi" => "Kecerdasan Kinestetik" ],
            [ "no" => 20, "pernyataan" => "Saya lebih mudah memahami sesuatu setelah mencobanya.", "bidangKode" => "K", "bidang" => "Kinestetik", "materi" => "Kecerdasan Kinestetik" ],
            [ "no" => 21, "pernyataan" => "Saya senang mendengarkan musik.", "bidangKode" => "Mu", "bidang" => "Musikal", "materi" => "Kecerdasan Musikal" ],
            [ "no" => 22, "pernyataan" => "Saya mudah mengingat lirik lagu.", "bidangKode" => "Mu", "bidang" => "Musikal", "materi" => "Kecerdasan Musikal" ],
            [ "no" => 23, "pernyataan" => "Saya sering bersenandung atau mengetuk irama.", "bidangKode" => "Mu", "bidang" => "Musikal", "materi" => "Kecerdasan Musikal" ],
            [ "no" => 24, "pernyataan" => "Saya tertarik bermain alat musik atau bernyanyi.", "bidangKode" => "Mu", "bidang" => "Musikal", "materi" => "Kecerdasan Musikal" ],
            [ "no" => 25, "pernyataan" => "Saya mudah mengenali perbedaan nada atau suara.", "bidangKode" => "Mu", "bidang" => "Musikal", "materi" => "Kecerdasan Musikal" ],
            [ "no" => 26, "pernyataan" => "Saya mudah bergaul dengan banyak orang.", "bidangKode" => "Ie", "bidang" => "Interpersonal", "materi" => "Kecerdasan Interpersonal" ],
            [ "no" => 27, "pernyataan" => "Saya senang bekerja dalam kelompok.", "bidangKode" => "Ie", "bidang" => "Interpersonal", "materi" => "Kecerdasan Interpersonal" ],
            [ "no" => 28, "pernyataan" => "Saya sering membantu teman yang mengalami kesulitan.", "bidangKode" => "Ie", "bidang" => "Interpersonal", "materi" => "Kecerdasan Interpersonal" ],
            [ "no" => 29, "pernyataan" => "Saya mudah memahami perasaan orang lain.", "bidangKode" => "Ie", "bidang" => "Interpersonal", "materi" => "Kecerdasan Interpersonal" ],
            [ "no" => 30, "pernyataan" => "Saya nyaman berbicara dengan orang yang baru dikenal.", "bidangKode" => "Ie", "bidang" => "Interpersonal", "materi" => "Kecerdasan Interpersonal" ],
            [ "no" => 31, "pernyataan" => "Saya memahami kelebihan dan kekurangan diri saya.", "bidangKode" => "Ia", "bidang" => "Intrapersonal", "materi" => "Kecerdasan Intrapersonal" ],
            [ "no" => 32, "pernyataan" => "Saya sering memikirkan tujuan hidup saya.", "bidangKode" => "Ia", "bidang" => "Intrapersonal", "materi" => "Kecerdasan Intrapersonal" ],
            [ "no" => 33, "pernyataan" => "Saya senang mengevaluasi diri setelah melakukan sesuatu.", "bidangKode" => "Ia", "bidang" => "Intrapersonal", "materi" => "Kecerdasan Intrapersonal" ],
            [ "no" => 34, "pernyataan" => "Saya mampu mengambil keputusan sendiri.", "bidangKode" => "Ia", "bidang" => "Intrapersonal", "materi" => "Kecerdasan Intrapersonal" ],
            [ "no" => 35, "pernyataan" => "Saya lebih suka menyelesaikan beberapa tugas secara mandiri.", "bidangKode" => "Ia", "bidang" => "Intrapersonal", "materi" => "Kecerdasan Intrapersonal" ],
            [ "no" => 36, "pernyataan" => "Saya menyukai tumbuhan, hewan, atau lingkungan alam.", "bidangKode" => "N", "bidang" => "Naturalis", "materi" => "Kecerdasan Naturalis" ],
            [ "no" => 37, "pernyataan" => "Saya tertarik mempelajari fenomena alam.", "bidangKode" => "N", "bidang" => "Naturalis", "materi" => "Kecerdasan Naturalis" ],
            [ "no" => 38, "pernyataan" => "Saya senang berada di taman, kebun, atau alam terbuka.", "bidangKode" => "N", "bidang" => "Naturalis", "materi" => "Kecerdasan Naturalis" ],
            [ "no" => 39, "pernyataan" => "Saya peduli terhadap kebersihan lingkungan.", "bidangKode" => "N", "bidang" => "Naturalis", "materi" => "Kecerdasan Naturalis" ],
            [ "no" => 40, "pernyataan" => "Saya mudah mengenali berbagai jenis tumbuhan atau hewan.", "bidangKode" => "N", "bidang" => "Naturalis", "materi" => "Kecerdasan Naturalis" ]
        ];

        foreach ($gurus as $guruBk) {
            AssessmentTemplate::updateOrCreate(
                ['user_id' => $guruBk->id, 'type' => 'kecerdasan'],
                ['master_data' => $kecerdasanData]
            );
        }
    }
}
