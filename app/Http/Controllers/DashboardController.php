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

        // Catat aktivitas kunjungan harian
        $todayVisit = $user->activities()
            ->where('type', 'visit')
            ->whereDate('activity_date', today())
            ->first();

        if (!$todayVisit) {
            $user->recordVisit();
        }

        $recentActivities = UserActivity::where('user_id', $user->id)
            ->recent(5)
            ->get();
        
            $user->refresh();

        // ✅ Ambil poin aktif dan lifetime langsung dari tabel users
        $points_active = $user->points;
        $points_reward = $user->points_lifetime;

        return view('dashboard', compact('user', 'recentActivities', 'points_active', 'points_reward'));
    }

    public function stats()
    {
        $user = Auth::user();

        // ✅ Ambil data statistik yang lebih akurat
        $stats = [
            'total_visits'    => $user->total_visits,
            'points_active'   => $user->points,
            'points_reward'   => $user->points_lifetime, // lifetime tetap sama walau poin aktif berkurang
            'active_tickets'  => $user->tickets,
            'member_level'    => $user->member_level,
        ];

        return response()->json($stats);
    }
}
