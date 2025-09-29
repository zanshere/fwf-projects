@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-6">

    {{-- Dashboard Stats --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow">
            <p class="text-sm text-gray-500">Total Tiket</p>
            <p class="text-2xl font-bold">{{ $stats['total_tickets'] }}</p>
        </div>
        <div class="bg-yellow-100 p-6 rounded-lg shadow">
            <p class="text-sm text-gray-600">Pending</p>
            <p class="text-2xl font-bold">{{ $stats['pending_tickets'] }}</p>
        </div>
        <div class="bg-green-100 p-6 rounded-lg shadow">
            <p class="text-sm text-gray-600">Aktif</p>
            <p class="text-2xl font-bold">{{ $stats['active_tickets'] }}</p>
        </div>
        <div class="bg-blue-100 p-6 rounded-lg shadow">
            <p class="text-sm text-gray-600">Terpakai</p>
            <p class="text-2xl font-bold">{{ $stats['used_tickets'] }}</p>
        </div>
        <div class="bg-purple-100 p-6 rounded-lg shadow">
            <p class="text-sm text-gray-600">Pending Rewards</p>
            <p class="text-2xl font-bold">{{ $stats['total_rewards_pending'] }}</p>
        </div>
        <div class="bg-pink-100 p-6 rounded-lg shadow">
            <p class="text-sm text-gray-600">Total User</p>
            <p class="text-2xl font-bold">{{ $stats['total_users'] }}</p>
        </div>
    </div>

    {{-- Recent Tickets --}}
    <div class="bg-white p-6 rounded-lg shadow mb-8">
        <h2 class="text-lg font-bold mb-4">Tiket Terbaru</h2>
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-2">#</th>
                    <th class="p-2">User</th>
                    <th class="p-2">Jenis Tiket</th>
                    <th class="p-2">Jumlah</th>
                    <th class="p-2">Status</th>
                    <th class="p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentTickets as $ticket)
                <tr class="border-t">
                    <td class="p-2">{{ $ticket->id }}</td>
                    <td class="p-2">{{ $ticket->user->name ?? $ticket->guest_name }}</td>
                    <td class="p-2">{{ $ticket->ticket_type }}</td>
                    <td class="p-2">{{ $ticket->quantity }}</td>
                    <td class="p-2">
                        <span class="px-2 py-1 text-xs rounded 
                            @if($ticket->status == 'proses') bg-yellow-200 text-yellow-700 
                            @elseif($ticket->status == 'aktif') bg-green-200 text-green-700 
                            @elseif($ticket->status == 'ditolak') bg-red-200 text-red-700 
                            @else bg-gray-200 text-gray-700 @endif">
                            {{ ucfirst($ticket->status) }}
                        </span>
                    </td>
                    <td class="p-2 flex gap-2">
                        @if($ticket->status == 'proses')
                        {{-- Konfirmasi --}}
                        <form method="POST" action="{{ route('admin.tickets.confirm', $ticket->id) }}">
                            @csrf
                            <button type="submit" class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700">
                                Konfirmasi
                            </button>
                        </form>
                        {{-- Tolak --}}
                        <form method="POST" action="{{ route('admin.tickets.reject', $ticket->id) }}">
                            @csrf
                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                Tolak
                            </button>
                        </form>
                        @else
                        <span class="text-gray-400">—</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-4 text-center text-gray-500">Belum ada tiket</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pending Rewards --}}
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-bold mb-4">Reward Pending</h2>
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-2">#</th>
                    <th class="p-2">User</th>
                    <th class="p-2">Reward</th>
                    <th class="p-2">Status</th>
                    <th class="p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pendingRedemptions as $redeem)
                <tr class="border-t">
                    <td class="p-2">{{ $redeem->id }}</td>
                    <td class="p-2">{{ $redeem->user->name }}</td>
                    <td class="p-2">{{ $redeem->reward->name }}</td>
                    <td class="p-2">{{ ucfirst($redeem->status) }}</td>
                    <td class="p-2 flex gap-2">
                        <form method="POST" action="{{ route('admin.reward-redemptions.confirm', $redeem->id) }}">
                            @csrf
                            <button type="submit" class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700">
                                Konfirmasi
                            </button>
                        </form>
                        <form method="POST" action="{{ route('admin.reward-redemptions.reject', $redeem->id) }}">
                            @csrf
                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                Tolak
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-4 text-center text-gray-500">Tidak ada reward pending</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
