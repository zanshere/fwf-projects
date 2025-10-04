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
        $recentActivities = UserActivity::where('user_id', $user->id)
            ->recent(5)
            ->get();

        // Record visit if not already recorded today
        $todayVisit = $user->activities()
            ->where('type', 'visit')
            ->whereDate('activity_date', today())
            ->first();

        if (!$todayVisit) {
            $user->recordVisit();
        }

        return view('dashboard', compact('user', 'recentActivities'));
    }

    public function stats()
    {
        $user = Auth::user();

        $stats = [
            'total_visits' => $user->total_visits,
            'points' => $user->points,
            'active_tickets' => $user->tickets, 
            'member_level' => $user->member_level,
            'lifetime_points' => $user->activities()->pointsEarned()->sum('points_earned'),
        ];

        return response()->json($stats);
    }
}
