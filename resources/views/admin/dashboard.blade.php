@extends('layouts.app')


@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-600 to-green-800 py-10 px-6">
    <div class="max-w-7xl mx-auto space-y-8">

        {{-- Header --}}
        <div class="text-white text-center">
            <h1 class="text-3xl font-bold mb-2">Admin Dashboard</h1>
            <p class="opacity-80">Kontrol penuh atas tiket, reward, dan pengguna</p>
        </div>

        {{-- Stats Overview --}}
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-2xl shadow-lg">
                 <div class="flex items-center space-x-2">
            <i data-lucide="ticket" class="w-6 h-6 text-green-500"></i>
            <p class="text-gray-500 text-sm">Total Tiket</p>
        </div>
                <p class="text-2xl font-bold">{{ $stats['total_tickets'] ?? 0 }}</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-lg">
                 <div class="flex items-center space-x-2">
            <i data-lucide="loader" class="w-6 h-6 text-yellow-500"></i>
            <p class="text-gray-500 text-sm">Pending Tiket</p>
        </div>
                <p class="text-2xl font-bold">{{ $stats['pending_tickets'] ?? 0 }}</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-lg">
                  <div class="flex items-center space-x-2">
            <i data-lucide="check-circle" class="w-6 h-6 text-blue-500"></i>
            <p class="text-gray-500 text-sm">Tiket Aktif</p>
        </div>
                <p class="text-2xl font-bold">{{ $stats['active_tickets'] ?? 0 }}</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-lg">
               <div class="flex items-center space-x-2">
            <i data-lucide="ticket-check" class="w-6 h-6 text-purple-500"></i>
            <p class="text-gray-500 text-sm">Tiket Terpakai</p>
        </div>
                <p class="text-2xl font-bold">{{ $stats['used_tickets'] ?? 0 }}</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-lg">
                  <div class="flex items-center space-x-2">
            <i data-lucide="gift" class="w-6 h-6 text-pink-500"></i>
            <p class="text-gray-500 text-sm">Reward Pending</p>
        </div>
                <p class="text-2xl font-bold">{{ $stats['total_rewards_pending'] ?? 0 }}</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-lg">
                <div class="flex items-center space-x-2">
            <i data-lucide="users" class="w-6 h-6 text-indigo-500"></i>
            <p class="text-gray-500 text-sm">Total User</p>
        </div>
                <p class="text-2xl font-bold">{{ $stats['total_users'] ?? 0 }}</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-lg">
                 <div class="flex items-center space-x-2">
            <i data-lucide="coins" class="w-6 h-6 text-orange-500"></i>
            <p class="text-gray-500 text-sm">Total Poin Beredar</p>
        </div>
                <p class="text-2xl font-bold">{{ $stats['total_points'] ?? 0 }}</p>
            </div>
        </div>

        {{-- Recent Tickets --}}
        <div class="bg-white p-6 rounded-2xl shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Tiket Terbaru</h2>
                <a href="{{ route('admin.tickets.index') }}" class="text-green-600 text-sm">Lihat Semua</a>
            </div>
            <ul class="divide-y">
                @forelse($recentTickets as $ticket)
                    <li class="py-3 flex justify-between items-center">
                        <div>
                            <p class="font-medium">{{ $ticket->user->name ?? 'Unknown' }} - {{ ucfirst($ticket->ticket_type) }}</p>
                            <p class="text-xs text-gray-500">{{ $ticket->created_at->diffForHumans() }}</p>
                        </div>
                        <span class="px-2 py-1 text-xs rounded-lg
                            {{ $ticket->status == 'aktif' ? 'bg-green-100 text-green-600' :
                               ($ticket->status == 'proses' ? 'bg-yellow-100 text-yellow-600' : 'bg-red-100 text-red-600') }}">
                            {{ ucfirst($ticket->status) }}
                        </span>
                    </li>
                @empty
                    <li class="py-3 text-gray-500 text-sm">Belum ada tiket terbaru</li>
                @endforelse
            </ul>
        </div>

        {{-- Pending Reward Redemption --}}
        <div class="bg-white p-6 rounded-2xl shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Reward Menunggu Konfirmasi</h2>
                <a href="{{ route('admin.rewards.redemptions') }}" class="text-green-600 text-sm">Kelola Semua</a>
            </div>
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-4 py-2">User</th>
                        <th class="px-4 py-2">Reward</th>
                        <th class="px-4 py-2">Tanggal</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pendingRedemptions as $redeem)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $redeem->user->name }}</td>
                            <td class="px-4 py-2">{{ $redeem->reward->name }}</td>
                            <td class="px-4 py-2">{{ $redeem->created_at->diffForHumans() }}</td>
                            <td class="px-4 py-2">
                                <form action="{{ route('admin.rewards.confirm', $redeem) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded-md text-xs">Approve</button>
                                </form>
                                <form action="{{ route('admin.rewards.reject', $redeem) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md text-xs">Reject</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-4 py-3 text-center text-gray-500">Tidak ada reward pending</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
