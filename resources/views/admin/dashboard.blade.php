@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="space-y-8">

    {{-- Welcome Banner --}}
    <div class="relative overflow-hidden rounded-2xl shadow-xl">
        <div class="absolute inset-0 bg-gradient-to-r from-green-500 to-emerald-600"></div>
        <div class="absolute top-0 right-0 -mr-10 -mt-10 w-32 h-32 bg-white/10 rounded-full"></div>
        <div class="absolute bottom-0 left-0 -ml-10 -mb-10 w-24 h-24 bg-white/10 rounded-full"></div>
        
        <div class="relative p-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-white mb-2">Dashboard Admin</h1>
                    <p class="text-green-100 text-lg">Selamat datang kembali, {{ Auth::user()->name ?? 'Admin' }} 👋</p>
                </div>
                <div class="hidden md:block">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center">
                        <i data-lucide="shield-check" class="w-8 h-8 text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Stats Cards Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        {{-- Total Tiket --}}
        <div class="group relative">
            <div class="relative bg-white rounded-2xl p-6 shadow-lg border">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center">
                        <i data-lucide="ticket" class="w-6 h-6 text-white"></i>
                    </div>
                    <span class="text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded-full">Total</span>
                </div>
                <h3 class="text-3xl font-black text-gray-800 mb-1">{{ $stats['total_tickets'] ?? 0 }}</h3>
                <p class="text-gray-600 text-sm">Total Tiket</p>
            </div>
        </div>

        {{-- Reward Pending --}}
        <div class="group relative">
            <div class="relative bg-white rounded-2xl p-6 shadow-lg border">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center">
                        <i data-lucide="gift" class="w-6 h-6 text-white"></i>
                    </div>
                    <span class="text-xs font-medium text-blue-600 bg-blue-100 px-2 py-1 rounded-full">Pending</span>
                </div>
                <h3 class="text-3xl font-black text-gray-800 mb-1">{{ $stats['total_rewards_pending'] ?? 0 }}</h3>
                <p class="text-gray-600 text-sm">Reward Menunggu</p>
            </div>
        </div>

        {{-- Total User --}}
        <div class="group relative">
            <div class="relative bg-white rounded-2xl p-6 shadow-lg border">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-purple-500 rounded-xl flex items-center justify-center">
                        <i data-lucide="users" class="w-6 h-6 text-white"></i>
                    </div>
                    <span class="text-xs font-medium text-purple-600 bg-purple-100 px-2 py-1 rounded-full">Users</span>
                </div>
                <h3 class="text-3xl font-black text-gray-800 mb-1">{{ $stats['total_users'] ?? 0 }}</h3>
                <p class="text-gray-600 text-sm">Total User</p>
            </div>
        </div>
    </div>

    {{-- Charts & Recent Tickets --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Grafik Absensi --}}
        <div class="relative bg-white rounded-2xl p-6 shadow-lg border">
            <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                <i data-lucide="bar-chart-3" class="w-5 h-5 text-green-600"></i>
                Grafik Absensi
            </h2>
            <div class="h-64">
                <canvas id="chartAbsensi" class="w-full h-full"></canvas>
            </div>
        </div>

        {{-- Tiket Terbaru --}}
        <div class="relative bg-white rounded-2xl p-6 shadow-lg border">
            <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                <i data-lucide="clock" class="w-5 h-5 text-blue-600"></i>
                Tiket Terbaru
            </h2>

            @if($recentTickets->count())
                <div class="space-y-4">
                    @foreach($recentTickets as $ticket)
                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl">
                        <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center">
                            <i data-lucide="ticket" class="w-5 h-5 text-white"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-gray-800 text-sm truncate">{{ $ticket->title }}</h3>
                            <p class="text-gray-600 text-xs">{{ $ticket->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="text-right">
                            <span class="inline-block px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                                {{ ucfirst($ticket->status) }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 text-sm">Belum ada tiket terbaru</p>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        const ctx = document.getElementById('chartAbsensi');
        if (ctx) {
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($chart['labels']),
                    datasets: [{
                        label: 'Absensi',
                        data: @json($chart['data']),
                        borderColor: 'rgb(34, 197, 94)',
                        backgroundColor: function(ctx) {
                            const chart = ctx.chart;
                            const gradient = chart.ctx.createLinearGradient(0, 0, 0, 200);
                            gradient.addColorStop(0, 'rgba(34, 197, 94, 0.4)');
                            gradient.addColorStop(1, 'rgba(34, 197, 94, 0)');
                            return gradient;
                        },
                        borderWidth: 3,
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true },
                        x: { grid: { display: false } }
                    }
                }
            });
        }
    });
</script>
@endpush
