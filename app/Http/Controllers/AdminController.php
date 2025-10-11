<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Reward;
use App\Models\RewardRedemption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Dashboard Admin - Tampilkan statistik dan overview
     */
    public function dashboard()
    {
        try {
            // Hitung statistik
            $stats = [
                'total_tickets' => Ticket::count(),
                'pending_tickets' => Ticket::where('status', 'proses')->count(),
                'active_tickets' => Ticket::where('status', 'aktif')->count(),
                'used_tickets' => Ticket::where('status', 'terpakai')->count(),
                'total_rewards_pending' => RewardRedemption::where('status', 'pending')->count(),
                'total_users' => User::where('role', 'user')->count(),
                'total_points' => User::sum('points'),
            ];

            // Tiket terbaru
            $recentTickets = Ticket::with('user')
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();

            // Penukaran reward pending
            $pendingRedemptions = RewardRedemption::with(['user', 'reward'])
                ->where('status', 'pending')
                ->get();

                 $chart = [
            'labels' => ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
            'data' => [65, 78, 90, 81, 86, 55, 40],
        ];

            return view('admin.dashboard', compact('stats', 'recentTickets', 'pendingRedemptions', 'chart'));

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error loading dashboard: ' . $e->getMessage());
        }
    }



    public function editUser(User $user)
{
    return view('admin.users.edit', compact('user'));
}

public function updateUser(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'points' => 'required|integer|min:0',
        'member_level' => 'required|string|max:50',
    ]);

    $user->update($request->only(['name', 'email', 'points', 'member_level']));

    return redirect()->route('admin.users.show', $user->id)->with('success', 'Data pengguna berhasil diperbarui.');
}


// Menampilkan daftar reward
public function rewards()
{
    $rewards = Reward::all();
    return view('admin.rewards.redemptions', compact('rewards'));
}


// Show detail reward
public function showReward(Reward $reward)
{
    return view('admin.rewards.show', compact('reward'));
}

// Form edit reward
public function editReward(Reward $reward)
{
    return view('admin.rewards.edit', compact('reward'));
}

// Update reward
public function updateReward(Request $request, Reward $reward)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'points' => 'required|integer',
        'description' => 'nullable|string',
    ]);

    $reward->update($request->all());

    return redirect()->route('admin.rewards.index')->with('success', 'Reward berhasil diperbarui.');
}

// Hapus reward
public function destroyReward(Reward $reward)
{
    $reward->delete();
    return redirect()->route('admin.rewards.index')->with('success', 'Reward berhasil dihapus.');
}

public function exportRewards()
{
    $rewards = Reward::all();

    $filename = "rewards_" . now()->format('Y-m-d_H-i-s') . ".csv";

    $handle = fopen('php://output', 'w');
    ob_start();

    // Header CSV
    fputcsv($handle, ['ID', 'Nama Reward', 'Poin', 'Deskripsi', 'Dibuat']);

    foreach ($rewards as $reward) {
        fputcsv($handle, [
            $reward->id,
            $reward->name,
            $reward->points,
            $reward->description,
            $reward->created_at->format('Y-m-d H:i:s'),
        ]);
    }

    $content = ob_get_clean();
    fclose($handle);

    return response($content)
        ->header('Content-Type', 'text/csv')
        ->header('Content-Disposition', "attachment; filename={$filename}");
}

    /**
     * Manajemen User - Tampilkan semua user
     */
    public function users(Request $request)
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

    /**
     * Detail User
     */
    public function userDetail(User $user)
    {
        // Pastikan hanya user biasa yang bisa dilihat
        if ($user->role === 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $user->load(['tickets', 'rewardRedemptions.reward']);

        $stats = [
            'total_tickets' => $user->tickets->count(),
            'active_tickets' => $user->tickets->where('status', 'aktif')->count(),
            'total_points' => $user->points,
            'total_redemptions' => $user->rewardRedemptions->count(),
        ];

        return view('admin.users.detail', compact('user', 'stats'));
    }

    /**
     * Update Poin User (Manual oleh admin)
     */
    public function updateUserPoints(Request $request, User $user)
    {
        // Pastikan hanya user biasa yang bisa diupdate
        if ($user->role === 'admin') {
            abort(403, 'Cannot update admin points.');
        }

        $request->validate([
            'points' => 'required|integer|min:0',
            'reason' => 'required|string|max:255'
        ]);

        try {
            DB::beginTransaction();

            $oldPoints = $user->points;
            $user->points = $request->points;
            $user->save();

            // Update member level
            $user->updateMemberLevel();

            // Catat aktivitas
            $user->activities()->create([
                'type' => 'points_adjusted',
                'description' => "Points adjusted by admin: {$oldPoints} → {$request->points}. Reason: {$request->reason}",
                'points_earned' => $request->points - $oldPoints,
                'activity_date' => now(),
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Poin user berhasil diupdate.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error updating points: ' . $e->getMessage());
        }
    }

    /**
     * Manajemen Tiket - Tampilkan semua tiket dengan filter
     */
    public function tickets(Request $request)
    {
        $status = $request->get('status');
        $search = $request->get('search');

        $tickets = Ticket::with('user')
            ->when($status, function($query) use ($status) {
                $query->where('status', $status);
            })
            ->when($search, function($query) use ($search) {
                $query->where(function($q) use ($search) {
                    $q->where('barcode', 'like', "%{$search}%")
                      ->orWhere('guest_name', 'like', "%{$search}%")
                      ->orWhere('guest_email', 'like', "%{$search}%")
                      ->orWhereHas('user', function($userQuery) use ($search) {
                          $userQuery->where('name', 'like', "%{$search}%")
                                   ->orWhere('email', 'like', "%{$search}%");
                      });
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        $stats = [
            'total' => Ticket::count(),
            'pending' => Ticket::where('status', 'proses')->count(),
            'active' => Ticket::where('status', 'aktif')->count(),
            'used' => Ticket::where('status', 'terpakai')->count(),
        ];

        return view('admin.tickets.index', compact('tickets', 'stats', 'status', 'search'));
    }

public function modal(Ticket $ticket)
{
    // Partial view berisi detail tiket
    $html = view('admin.partials.ticket-modal', compact('ticket'))->render();

    return response()->json(['html' => $html]);
}


    /**
     * Konfirmasi Tiket (Ubah status dari proses ke aktif)
     */
    public function confirmTicket(Ticket $ticket)
    {
        try {
            DB::beginTransaction();

            if ($ticket->status !== 'proses') {
                return redirect()->back()->with('error', 'Hanya tiket dengan status proses yang bisa dikonfirmasi.');
            }

            $ticket->update(['status' => 'aktif']);

            // Tambahkan poin ke user jika ada
            if ($ticket->user_id && $ticket->points_earned > 0) {
                $ticket->user->addPoints($ticket->points_earned, [
                    'type' => 'ticket_confirmed',
                    'description' => 'Tiket ' . $ticket->ticket_type . ' dikonfirmasi - ' . $ticket->points_earned . ' poin'
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Tiket berhasil dikonfirmasi dan poin telah ditambahkan.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error confirming ticket: ' . $e->getMessage());
        }
    }

    /**
     * Tolak Tiket
     */
    public function rejectTicket(Ticket $ticket)
    {
        try {
            $ticket->update(['status' => 'ditolak']);
            return redirect()->back()->with('success', 'Tiket berhasil ditolak.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error rejecting ticket: ' . $e->getMessage());
        }
    }

    /**
     * Buat Tiket Khusus via Admin
     */
    public function createSpecialTicket(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'ticket_type' => 'required|in:Reguler,Premium,Khusus',
            'quantity' => 'required|integer|min:1|max:10',
            'adult_count' => 'required|integer|min:0',
            'child_count' => 'required|integer|min:0',
            'purchase_date' => 'required|date|after_or_equal:today',
            'assign_points' => 'boolean'
        ]);

        try {
            DB::beginTransaction();

            $user = User::findOrFail($request->user_id);

            // Pastikan hanya user biasa yang bisa dibuatkan tiket
            if ($user->role === 'admin') {
                throw new \Exception('Cannot create tickets for admin users.');
            }

            // Hitung total harga
            $priceMap = [
                'Reguler' => 1500000,
                'Premium' => 2000000,
                'Khusus' => 0
            ];

            $totalPrice = $priceMap[$request->ticket_type] * $request->quantity;

            // Hitung poin (jika dipilih)
            $pointsEarned = $request->boolean('assign_points') ?
                Ticket::calculatePoints($request->ticket_type, $request->quantity) : 0;

            // Buat tiket
            $ticket = Ticket::create([
                'user_id' => $user->id,
                'ticket_type' => $request->ticket_type,
                'quantity' => $request->quantity,
                'adult_count' => $request->adult_count,
                'child_count' => $request->child_count,
                'purchase_date' => $request->purchase_date,
                'status' => 'aktif', // Langsung aktif karena dibuat admin
                'points_earned' => $pointsEarned,
                'barcode' => 'FW' . Str::random(10) . time(),
                'total_price' => $totalPrice,
            ]);

            // Tambahkan poin jika ada
            if ($pointsEarned > 0) {
                $user->addPoints($pointsEarned, [
                    'type' => 'special_ticket',
                    'description' => 'Tiket khusus dari admin: ' . $request->ticket_type . ' - ' . $pointsEarned . ' poin'
                ]);
            }

            DB::commit();

            return redirect()->route('admin.tickets.index')
                ->with('success', 'Tiket khusus berhasil dibuat untuk ' . $user->name);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error creating special ticket: ' . $e->getMessage());
        }
    }

    /**
     * Manajemen Reward Redemptions
     */
    public function rewardRedemptions(Request $request)
    {
        $status = $request->get('status', 'pending');

        $redemptions = RewardRedemption::with(['user', 'reward'])
            ->where('status', $status)
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.redemptions.index', compact('redemptions', 'status'));
    }

    /**
     * Approve Reward Redemption
     */
    public function approveRewardRedemption(RewardRedemption $redemption)
    {
        try {
            $redemption->approve('Approved by admin');

            return redirect()->back()->with('success', 'Reward redemption approved successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error approving reward: ' . $e->getMessage());
        }
    }

    /**
     * Reject Reward Redemption
     */
    public function rejectRewardRedemption(RewardRedemption $redemption)
    {
        try {
            $redemption->reject('Rejected by admin');

            return redirect()->back()->with('success', 'Reward redemption rejected successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error rejecting reward: ' . $e->getMessage());
        }
    }

    /**
     * Scan QR Code untuk validasi tiket
     */
    public function scanTicket(Request $request)
    {
        $request->validate([
            'barcode' => 'required|string'
        ]);

        try {
            $ticket = Ticket::where('barcode', $request->barcode)->firstOrFail();

            if ($ticket->status !== 'aktif') {
                return response()->json([
                    'success' => false,
                    'message' => 'Tiket tidak dapat digunakan. Status: ' . $ticket->status
                ], 400);
            }

            // Update status ke terpakai
            $ticket->update(['status' => 'terpakai']);

            return response()->json([
                'success' => true,
                'message' => 'Tiket berhasil divalidasi!',
                'ticket' => [
                    'id' => $ticket->id,
                    'type' => $ticket->ticket_type,
                    'customer' => $ticket->user ? $ticket->user->name : $ticket->guest_name,
                    'quantity' => $ticket->quantity
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Tiket tidak ditemukan atau terjadi kesalahan.'
            ], 500);
        }
    }

    /**
     * Generate QR Code untuk tiket
     */
    public function generateQrCode(Ticket $ticket)
    {
        $qrContent = $ticket->getQrCodeContent();
        $qrCode = QrCode::size(200)->generate($qrContent);

        return response()->json([
            'qr_code' => $qrCode,
            'ticket' => $ticket
        ]);
    }
}
