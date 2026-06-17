<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\AssessmentTemplate;

class AssessmentTemplateGayaBelajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gurus = User::where('role', 'guru_bk')->get();

        $gayaBelajarData = [
            [ "no" => 1, "pernyataan" => "Saya lebih mudah memahami materi melalui gambar atau diagram.", "bidangKode" => "V", "bidang" => "Visual", "materi" => "Gaya Belajar Visual" ],
            [ "no" => 2, "pernyataan" => "Saya suka menggunakan warna pada catatan belajar.", "bidangKode" => "V", "bidang" => "Visual", "materi" => "Gaya Belajar Visual" ],
            [ "no" => 3, "pernyataan" => "Saya mudah mengingat apa yang pernah saya lihat.", "bidangKode" => "V", "bidang" => "Visual", "materi" => "Gaya Belajar Visual" ],
            [ "no" => 4, "pernyataan" => "Saya lebih suka menonton video pembelajaran daripada mendengarkan penjelasan.", "bidangKode" => "V", "bidang" => "Visual", "materi" => "Gaya Belajar Visual" ],
            [ "no" => 5, "pernyataan" => "Saya senang membaca sendiri untuk memahami materi.", "bidangKode" => "V", "bidang" => "Visual", "materi" => "Gaya Belajar Visual" ],
            [ "no" => 6, "pernyataan" => "Saya sering membuat rangkuman dalam bentuk bagan atau peta konsep.", "bidangKode" => "V", "bidang" => "Visual", "materi" => "Gaya Belajar Visual" ],
            [ "no" => 7, "pernyataan" => "Saya lebih cepat memahami contoh yang diperlihatkan daripada dijelaskan.", "bidangKode" => "V", "bidang" => "Visual", "materi" => "Gaya Belajar Visual" ],
            [ "no" => 8, "pernyataan" => "Saya mudah mengenali wajah seseorang.", "bidangKode" => "V", "bidang" => "Visual", "materi" => "Gaya Belajar Visual" ],
            [ "no" => 9, "pernyataan" => "Saya memperhatikan tampilan tulisan atau gambar saat belajar.", "bidangKode" => "V", "bidang" => "Visual", "materi" => "Gaya Belajar Visual" ],
            [ "no" => 10, "pernyataan" => "Saya lebih mudah memahami informasi dalam bentuk grafik atau tabel.", "bidangKode" => "V", "bidang" => "Visual", "materi" => "Gaya Belajar Visual" ],
            [ "no" => 11, "pernyataan" => "Saya lebih mudah memahami pelajaran dengan mendengarkan penjelasan guru.", "bidangKode" => "A", "bidang" => "Auditori", "materi" => "Gaya Belajar Auditori" ],
            [ "no" => 12, "pernyataan" => "Saya senang berdiskusi saat belajar.", "bidangKode" => "A", "bidang" => "Auditori", "materi" => "Gaya Belajar Auditori" ],
            [ "no" => 13, "pernyataan" => "Saya mudah mengingat apa yang saya dengar.", "bidangKode" => "A", "bidang" => "Auditori", "materi" => "Gaya Belajar Auditori" ],
            [ "no" => 14, "pernyataan" => "Saya sering membaca materi dengan suara keras.", "bidangKode" => "A", "bidang" => "Auditori", "materi" => "Gaya Belajar Auditori" ],
            [ "no" => 15, "pernyataan" => "Saya lebih suka mendengarkan daripada membaca sendiri.", "bidangKode" => "A", "bidang" => "Auditori", "materi" => "Gaya Belajar Auditori" ],
            [ "no" => 16, "pernyataan" => "Saya mudah mengingat lagu atau irama tertentu.", "bidangKode" => "A", "bidang" => "Auditori", "materi" => "Gaya Belajar Auditori" ],
            [ "no" => 17, "pernyataan" => "Saya suka bertanya saat pembelajaran berlangsung.", "bidangKode" => "A", "bidang" => "Auditori", "materi" => "Gaya Belajar Auditori" ],
            [ "no" => 18, "pernyataan" => "Saya lebih fokus ketika mendengarkan penjelasan langsung.", "bidangKode" => "A", "bidang" => "Auditori", "materi" => "Gaya Belajar Auditori" ],
            [ "no" => 19, "pernyataan" => "Saya sering mengulang materi dengan mengucapkannya.", "bidangKode" => "A", "bidang" => "Auditori", "materi" => "Gaya Belajar Auditori" ],
            [ "no" => 20, "pernyataan" => "Saya mudah memahami instruksi yang dijelaskan secara lisan.", "bidangKode" => "A", "bidang" => "Auditori", "materi" => "Gaya Belajar Auditori" ],
            [ "no" => 21, "pernyataan" => "Saya lebih mudah belajar melalui praktik langsung.", "bidangKode" => "K", "bidang" => "Kinestetik", "materi" => "Gaya Belajar Kinestetik" ],
            [ "no" => 22, "pernyataan" => "Saya suka mencoba sendiri daripada hanya melihat.", "bidangKode" => "K", "bidang" => "Kinestetik", "materi" => "Gaya Belajar Kinestetik" ],
            [ "no" => 23, "pernyataan" => "Saya sering bergerak saat berpikir atau belajar.", "bidangKode" => "K", "bidang" => "Kinestetik", "materi" => "Gaya Belajar Kinestetik" ],
            [ "no" => 24, "pernyataan" => "Saya senang kegiatan praktik atau eksperimen.", "bidangKode" => "K", "bidang" => "Kinestetik", "materi" => "Gaya Belajar Kinestetik" ],
            [ "no" => 25, "pernyataan" => "Saya lebih mudah memahami materi melalui simulasi atau permainan.", "bidangKode" => "K", "bidang" => "Kinestetik", "materi" => "Gaya Belajar Kinestetik" ],
            [ "no" => 26, "pernyataan" => "Saya merasa kurang nyaman duduk diam terlalu lama.", "bidangKode" => "K", "bidang" => "Kinestetik", "materi" => "Gaya Belajar Kinestetik" ],
            [ "no" => 27, "pernyataan" => "Saya lebih mudah mengingat sesuatu setelah melakukannya sendiri.", "bidangKode" => "K", "bidang" => "Kinestetik", "materi" => "Gaya Belajar Kinestetik" ],
            [ "no" => 28, "pernyataan" => "Saya suka belajar sambil bergerak atau berpindah tempat.", "bidangKode" => "K", "bidang" => "Kinestetik", "materi" => "Gaya Belajar Kinestetik" ],
            [ "no" => 29, "pernyataan" => "Saya lebih memahami petunjuk setelah mencobanya langsung.", "bidangKode" => "K", "bidang" => "Kinestetik", "materi" => "Gaya Belajar Kinestetik" ],
            [ "no" => 30, "pernyataan" => "Saya suka menggunakan alat atau benda saat belajar.", "bidangKode" => "K", "bidang" => "Kinestetik", "materi" => "Gaya Belajar Kinestetik" ]
        ];

        foreach ($gurus as $guruBk) {
            AssessmentTemplate::updateOrCreate(
                ['user_id' => $guruBk->id, 'type' => 'gaya-belajar'],
                ['master_data' => $gayaBelajarData]
            );
        }
    }
}
