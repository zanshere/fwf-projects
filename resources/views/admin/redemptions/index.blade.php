@extends('layouts.admin')

@section('title', 'Manajemen Rewards')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Penukaran Reward</h1>
            <p class="text-gray-500">Lihat daftar penukaran reward oleh user.</p>
        </div>
        <div>
            <a href="{{ route('admin.rewards.redemptions') }}" 
               class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                Refresh
            </a>
        </div>
    </div>

    {{-- Statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <div class="bg-white p-4 rounded-lg shadow text-center">
            <p class="text-sm text-gray-500">Total Redemption</p>
            <p class="text-2xl font-bold text-gray-800">{{ $redemptions->count() }}</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow text-center">
            <p class="text-sm text-gray-500">Menunggu</p>
            <p class="text-2xl font-bold text-yellow-600">
                {{ $redemptions->where('status', 'pending')->count() }}
            </p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow text-center">
            <p class="text-sm text-gray-500">Disetujui</p>
            <p class="text-2xl font-bold text-green-600">
                {{ $redemptions->where('status', 'approved')->count() }}
            </p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow text-center">
            <p class="text-sm text-gray-500">Ditolak</p>
            <p class="text-2xl font-bold text-red-600">
                {{ $redemptions->where('status', 'rejected')->count() }}
            </p>
        </div>
    </div>

    {{-- Alert Messages --}}
    @if(session('success'))
        <div class="p-4 bg-green-100 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="p-4 bg-red-100 text-red-800 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    {{-- Table Rewards --}}
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full text-sm text-gray-700">
            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="px-6 py-3 text-left">ID</th>
                    <th class="px-6 py-3 text-left">User</th>
                    <th class="px-6 py-3 text-left">Reward</th>
                    <th class="px-6 py-3 text-left">Poin</th>
                    <th class="px-6 py-3 text-left">Tanggal</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($redemptions as $redeem)
                    <tr class="border-b">
                        <td class="px-6 py-3">{{ $redeem->id }}</td>
                        <td class="px-6 py-3">{{ $redeem->user->name }}</td>
                        <td class="px-6 py-3">{{ $redeem->reward->name }}</td>
                        <td class="px-6 py-3">{{ $redeem->reward->points }}</td>
                        <td class="px-6 py-3">{{ $redeem->created_at->format('d M Y H:i') }}</td>
                        <td class="px-6 py-3 text-center">
                            <a href="{{ route('admin.rewards.show', $redeem->id) }}" 
                               class="text-blue-600 hover:underline">Lihat</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-3 text-center text-gray-500">
                            Belum ada data penukaran reward.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
