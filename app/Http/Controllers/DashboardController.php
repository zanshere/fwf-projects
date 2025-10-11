<?php

namespace App\Http\Controllers;

use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Reset daily points jika sudah berbeda hari
        $user->checkAndResetDailyPoints();

        // Catat aktivitas kunjungan harian (hanya sekali per hari)
        $todayVisit = $user->activities()
            ->where('type', 'visit')
            ->whereDate('activity_date', today())
            ->first();

        if (!$todayVisit) {
            $user->recordVisit();
            $user->refresh();
        }

        // Ambil aktivitas terbaru
        $recentActivities = $user->activities()
            ->recent(5)
            ->get();

        return view('dashboard', compact('user', 'recentActivities'));
    }

    public function stats()
    {
        $user = Auth::user();

        // Reset daily points jika perlu
        $user->checkAndResetDailyPoints();

        $stats = [
            'daily_points'    => $user->daily_points,           // Poin hari ini
            'points_active'   => $user->points,                 // Poin aktif yang bisa dipakai
            'points_used'     => $user->points_used,            // ✅ Total poin yang terpakai
            'total_earned'    => $user->points + $user->points_used, // Total poin yang pernah dikumpulkan
            'total_visits'    => $user->total_visits,
            'active_tickets'  => $user->activeTickets()->count(),
            'member_level'    => $user->member_level,
        ];

        return response()->json($stats);
    }
}
