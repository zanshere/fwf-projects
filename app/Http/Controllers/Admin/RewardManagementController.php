<?php
// app/Http/Controllers/Admin/RewardManagementController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reward;
use App\Models\RewardRedemption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RewardManagementController extends Controller
{
    public function index()
    {
        $redemptions = RewardRedemption::with(['user', 'reward', 'approvedBy'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $stats = [
            'total' => RewardRedemption::count(),
            'pending' => RewardRedemption::pending()->count(),
            'approved' => RewardRedemption::approved()->count(),
            'rejected' => RewardRedemption::rejected()->count(),
        ];

        return view('admin.redemptions.index', compact('redemptions', 'stats'));
    }

    public function showRedemption($id)
    {
        $redemption = RewardRedemption::with(['user', 'reward', 'approvedBy'])->findOrFail($id);
        return view('admin.rewards.redemption-detail', compact('redemption'));
    }

    public function approveRedemption(Request $request, $id)
    {
        try {
            $redemption = RewardRedemption::findOrFail($id);

            $request->validate([
                'admin_notes' => 'nullable|string|max:500'
            ]);

            // Approve redemption
            $redemption->approve(Auth::id(), $request->admin_notes);

            return redirect()->route('admin.rewards.redemptions')
                ->with('success', 'Penukaran reward berhasil disetujui.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function rejectRedemption(Request $request, $id)
    {
        try {
            $redemption = RewardRedemption::findOrFail($id);

            $request->validate([
                'admin_notes' => 'required|string|max:500'
            ]);

            // Reject redemption
            $redemption->reject(Auth::id(), $request->admin_notes);

            return redirect()->route('admin.rewards.redemptions')
                ->with('success', 'Penukaran reward berhasil ditolak.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function createReward()
    {
        return view('admin.rewards.create');
    }

    public function storeReward(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'points_required' => 'required|integer|min:1',
            'stock' => 'required|integer|min:0',
            'icon' => 'required|string',
            'color' => 'required|string',
        ]);

        try {
            Reward::create([
                'name' => $request->name,
                'description' => $request->description,
                'points_required' => $request->points_required,
                'stock' => $request->stock,
                'icon' => $request->icon,
                'color' => $request->color,
                'is_active' => $request->has('is_active'),
            ]);

            return redirect()->route('admin.rewards.index')
                ->with('success', 'Reward berhasil ditambahkan.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function editReward($id)
    {
        $reward = Reward::findOrFail($id);
        return view('admin.rewards.edit', compact('reward'));
    }

    public function updateReward(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'points_required' => 'required|integer|min:1',
            'stock' => 'required|integer|min:0',
            'icon' => 'required|string',
            'color' => 'required|string',
        ]);

        try {
            $reward = Reward::findOrFail($id);
            $reward->update([
                'name' => $request->name,
                'description' => $request->description,
                'points_required' => $request->points_required,
                'stock' => $request->stock,
                'icon' => $request->icon,
                'color' => $request->color,
                'is_active' => $request->has('is_active'),
            ]);

            return redirect()->route('admin.rewards.index')
                ->with('success', 'Reward berhasil diperbarui.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
