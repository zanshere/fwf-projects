<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use App\Models\RewardRedemption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RewardController extends Controller
{
    public function index()
    {
        $rewards = Reward::available()->get();
        $user = Auth::user();

        $userRedemptions = RewardRedemption::where('user_id', $user->id)
            ->with('reward')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.reward', compact('rewards', 'user', 'userRedemptions'));
    }

    public function redeem(Request $request, $rewardId)
    {
        try {
            DB::beginTransaction();

            $reward = Reward::findOrFail($rewardId);
            $user = Auth::user();

            // Validasi apakah reward bisa ditebus
            if (!$reward->canBeRedeemedBy($user)) {
                return redirect()->back()
                    ->with('error', 'Reward tidak dapat ditebus. Periksa poin atau ketersediaan reward.');
            }

            $pointsBefore = $user->points;
            $pointsAfter = $pointsBefore - $reward->points_required;

            // Buat record redemption
            $redemption = RewardRedemption::create([
                'user_id' => $user->id,
                'reward_id' => $reward->id,
                'points_used' => $reward->points_required,
                'points_before' => $pointsBefore,
                'points_after' => $pointsAfter,
                'status' => 'pending',
                'redeemed_at' => now(),
            ]);

            // ✅ Kurangi poin menggunakan deductPoints (otomatis tambah ke points_used)
            $user->deductPoints($reward->points_required, [
                'type' => 'reward_redemption_pending',
                'description' => "Menukarkan reward: {$reward->name} (Menunggu konfirmasi admin)"
            ]);

            DB::commit();

            return redirect()->route('reward.index')
                ->with('success', 'Reward berhasil ditukarkan! Silakan tunggu persetujuan admin.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function redemptionHistory()
    {
        $user = Auth::user();
        $redemptions = RewardRedemption::where('user_id', $user->id)
            ->with('reward')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('pages.reward-history', compact('redemptions'));
    }
}
