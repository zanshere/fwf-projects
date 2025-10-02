<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Ticket;
use App\Models\RewardRedemption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $users = User::where('role', 'user')
            ->when($search, function($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.users.index', compact('users', 'search'));
    }

    public function show(User $user)
    {
        if ($user->role === 'admin') {
            abort(403, 'Cannot view admin user details.');
        }

        $user->load(['tickets', 'rewardRedemptions.reward', 'activities']);

        $stats = [
            'total_tickets' => $user->tickets->count(),
            'active_tickets' => $user->tickets->where('status', 'aktif')->count(),
            'total_redemptions' => $user->rewardRedemptions->count(),
            'pending_redemptions' => $user->rewardRedemptions->where('status', 'pending')->count(),
        ];

        return view('admin.users.show', compact('user', 'stats'));
    }

    public function edit(User $user)
    {
        if ($user->role === 'admin') {
            abort(403, 'Cannot edit admin user.');
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        if ($user->role === 'admin') {
            abort(403, 'Cannot update admin user.');
        }

        $data = $request->validated();

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($data);

        return redirect()->route('admin.users.show', $user)
            ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        if ($user->role === 'admin') {
            abort(403, 'Cannot delete admin user.');
        }

        // Soft delete user
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }

    public function updatePoints(Request $request, User $user)
    {
        $request->validate([
            'points' => 'required|integer|min:0',
            'reason' => 'required|string|max:255'
        ]);

        $oldPoints = $user->points;
        $user->points = $request->points;
        $user->save();

        // Update member level
        $user->updateMemberLevel();

        // Record activity
        $user->activities()->create([
            'type' => 'points_adjusted',
            'description' => "Points adjusted by admin: {$oldPoints} → {$request->points}. Reason: {$request->reason}",
            'points_earned' => $request->points - $oldPoints,
            'activity_date' => now(),
        ]);

        return redirect()->back()->with('success', 'User points updated successfully.');
    }
}
