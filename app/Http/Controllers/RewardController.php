<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use App\Models\RewardRedemption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $reward = Reward::findOrFail($rewardId);
        $user = Auth::user();

        if (!$reward->canBeRedeemedBy($user)) {
            return redirect()->back()->with('error', 'Reward cannot be redeemed. Check your points or reward availability.');
        }

        // Create redemption record
        $redemption = RewardRedemption::create([
            'user_id' => $user->id,
            'reward_id' => $reward->id,
            'points_used' => $reward->points_required,
            'status' => 'pending',
            'redeemed_at' => now(),
        ]);

        // Deduct points from user
        $user->deductPoints($reward->points_required, [
            'type' => 'reward_redemption',
            'description' => 'Redeemed reward: ' . $reward->name
        ]);

        return redirect()->route('reward.index')
            ->with('success', 'Reward redeemed successfully! Please wait for approval.');
    }

    public function redemptionHistory()
    {
        $user = Auth::user();
        $redemptions = RewardRedemption::where('user_id', $user->id)
            ->with('reward')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('reward-history', compact('redemptions'));
    }

    public function seedRewards()
    {
        $rewards = [
            [
                'name' => 'Tiket Reguler Gratis',
                'description' => 'Tiket masuk reguler untuk 1 orang',
                'points_required' => 500,
                'stock' => 100,
                'icon' => 'ticket',
                'color' => 'from-blue-500 to-cyan-500',
            ],
            [
                'name' => 'Tiket Premium Gratis',
                'description' => 'Tiket premium dengan akses lengkap',
                'points_required' => 1000,
                'stock' => 50,
                'icon' => 'ticket-check',
                'color' => 'from-purple-500 to-pink-500',
            ],
            [
                'name' => 'Smart TV 55"',
                'description' => 'Smart TV LED 55 inch merek ternama',
                'points_required' => 25000,
                'stock' => 5,
                'icon' => 'monitor',
                'color' => 'from-gray-500 to-blue-500',
            ],
            [
                'name' => 'Handphone Android',
                'description' => 'Smartphone Android flagship terbaru',
                'points_required' => 15000,
                'stock' => 10,
                'icon' => 'smartphone',
                'color' => 'from-green-500 to-emerald-500',
            ],
            [
                'name' => 'Handphone iPhone',
                'description' => 'iPhone series terbaru 128GB',
                'points_required' => 30000,
                'stock' => 3,
                'icon' => 'smartphone',
                'color' => 'from-gray-500 to-black',
            ],
            [
                'name' => 'Sepeda Gunung',
                'description' => 'Sepeda gunung full suspension',
                'points_required' => 8000,
                'stock' => 8,
                'icon' => 'bike',
                'color' => 'from-orange-500 to-red-500',
            ],
            [
                'name' => 'Sepeda Listrik',
                'description' => 'Sepeda listrik dengan baterai tahan lama',
                'points_required' => 12000,
                'stock' => 6,
                'icon' => 'bike',
                'color' => 'from-teal-500 to-cyan-500',
            ],
            [
                'name' => 'Mobil City Car',
                'description' => 'Mobil city car baru 1000cc',
                'points_required' => 150000,
                'stock' => 1,
                'icon' => 'car',
                'color' => 'from-red-500 to-pink-500',
            ],
            [
                'name' => 'Motor Sport',
                'description' => 'Motor sport 150cc terbaru',
                'points_required' => 50000,
                'stock' => 2,
                'icon' => 'motorcycle',
                'color' => 'from-blue-500 to-indigo-500',
            ],
            [
                'name' => 'Mystery Box',
                'description' => 'Hadiah misteri dengan nilai hingga 5 juta',
                'points_required' => 5000,
                'stock' => 20,
                'icon' => 'box',
                'color' => 'from-yellow-500 to-orange-500',
            ],
        ];

        foreach ($rewards as $rewardData) {
            Reward::create($rewardData);
        }

        return response()->json(['message' => 'Rewards seeded successfully']);
    }
}
