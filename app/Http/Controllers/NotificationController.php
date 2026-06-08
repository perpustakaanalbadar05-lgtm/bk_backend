<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use App\Models\CounselingSession;
use App\Models\Schedule;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $notifications = [];
        $id = 1;

        // 1. Kasus belum selesai (Proses / Baru)
        $unresolvedCases = Kasus::where('status', '!=', 'Selesai')->count();
        if ($unresolvedCases > 0) {
            $notifications[] = [
                'id' => $id++,
                'title' => 'Peringatan Kasus',
                'text' => "Terdapat {$unresolvedCases} kasus siswa yang perlu tindak lanjut atau masih dalam proses.",
                'time' => 'Baru saja',
                'read' => false,
                'type' => 'alert'
            ];
        }

        // 2. Sesi Konseling Proses
        $upcomingSessions = CounselingSession::where('status', 'Proses')->count();
        if ($upcomingSessions > 0) {
            $notifications[] = [
                'id' => $id++,
                'title' => 'Sesi Konseling Aktif',
                'text' => "Ada {$upcomingSessions} sesi konseling yang masih berstatus proses dan belum diselesaikan.",
                'time' => 'Baru saja',
                'read' => false,
                'type' => 'info'
            ];
        }

        // 3. Jadwal Klasikal
        $upcomingSchedules = Schedule::where('status', 'Terjadwal')->count();
        if ($upcomingSchedules > 0) {
            $notifications[] = [
                'id' => $id++,
                'title' => 'Jadwal Masuk Kelas',
                'text' => "Anda memiliki {$upcomingSchedules} jadwal bimbingan klasikal yang akan datang.",
                'time' => 'Baru saja',
                'read' => false,
                'type' => 'warning'
            ];
        }

        return response()->json($notifications);
    }
}
