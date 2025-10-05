@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Overview')

@section('content')
<div class="space-y-6">
    <!-- Welcome Banner -->
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-green-500 via-emerald-600 to-green-700 p-8 shadow-2xl">
        <div class="absolute top-0 right-0 -mr-10 -mt-10 w-32 h-32 bg-white/10 rounded-full"></div>
        <div class="absolute bottom-0 left-0 -ml-10 -mb-10 w-24 h-24 bg-white/10 rounded-full"></div>

        <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between">
            <div class="flex-1">
                <h1 class="text-3xl lg:text-4xl font-black text-white mb-3">Dashboard Admin</h1>
                <p class="text-green-100 text-lg mb-4">Selamat datang kembali, <span class="font-semibold">{{ Auth::user()->name ?? 'Admin' }}</span>! 👋</p>
                <p class="text-green-200 text-sm max-w-2xl">
                    Pantau aktivitas terbaru, kelola tiket, dan lihat statistik sistem dari dashboard ini.
                </p>
            </div>
            <div class="mt-6 lg:mt-0 lg:ml-6">
                <div class="w-20 h-20 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                    <i data-lucide="shield-check" class="w-10 h-10 text-white"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Tiket -->
        <div class="group relative">
            <div class="absolute inset-0 bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-300"></div>
            <div class="relative bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                        <i data-lucide="ticket" class="w-6 h-6 text-white"></i>
                    </div>
                    <span class="text-xs font-semibold text-green-600 bg-green-100 dark:bg-green-900/30 px-3 py-1 rounded-full">Total</span>
                </div>
                <h3 class="text-3xl font-black text-gray-800 dark:text-white mb-1">{{ $stats['total_tickets'] ?? 0 }}</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm">Total Tiket Terjual</p>
                <div class="mt-3 flex items-center text-xs text-green-600">
                    <i data-lucide="trending-up" class="w-4 h-4 mr-1"></i>
                    <span>+12% dari bulan lalu</span>
                </div>
            </div>
        </div>

        <!-- Reward Pending -->
        <div class="group relative">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-cyan-600 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-300"></div>
            <div class="relative bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center shadow-lg">
                        <i data-lucide="gift" class="w-6 h-6 text-white"></i>
                    </div>
                    <span class="text-xs font-semibold text-blue-600 bg-blue-100 dark:bg-blue-900/30 px-3 py-1 rounded-full">Pending</span>
                </div>
                <h3 class="text-3xl font-black text-gray-800 dark:text-white mb-1">{{ $stats['total_rewards_pending'] ?? 0 }}</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm">Reward Menunggu</p>
                <div class="mt-3 flex items-center text-xs text-blue-600">
                    <i data-lucide="clock" class="w-4 h-4 mr-1"></i>
                    <span>Perlu konfirmasi</span>
                </div>
            </div>
        </div>

        <!-- Total Users -->
        <div class="group relative">
            <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-600 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-300"></div>
            <div class="relative bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center shadow-lg">
                        <i data-lucide="users" class="w-6 h-6 text-white"></i>
                    </div>
                    <span class="text-xs font-semibold text-purple-600 bg-purple-100 dark:bg-purple-900/30 px-3 py-1 rounded-full">Users</span>
                </div>
                <h3 class="text-3xl font-black text-gray-800 dark:text-white mb-1">{{ $stats['total_users'] ?? 0 }}</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm">Total Pengguna</p>
                <div class="mt-3 flex items-center text-xs text-purple-600">
                    <i data-lucide="user-plus" class="w-4 h-4 mr-1"></i>
                    <span>+5 pengguna baru</span>
                </div>
            </div>
        </div>

        <!-- Pendapatan -->
        <div class="group relative">
            <div class="absolute inset-0 bg-gradient-to-r from-orange-500 to-amber-600 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-300"></div>
            <div class="relative bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-amber-600 rounded-xl flex items-center justify-center shadow-lg">
                        <i data-lucide="dollar-sign" class="w-6 h-6 text-white"></i>
                    </div>
                    <span class="text-xs font-semibold text-orange-600 bg-orange-100 dark:bg-orange-900/30 px-3 py-1 rounded-full">Revenue</span>
                </div>
                <h3 class="text-3xl font-black text-gray-800 dark:text-white mb-1">Rp {{ number_format($stats['revenue'] ?? 0, 0, ',', '.') }}</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm">Total Pendapatan</p>
                <div class="mt-3 flex items-center text-xs text-orange-600">
                    <i data-lucide="trending-up" class="w-4 h-4 mr-1"></i>
                    <span>+18% dari bulan lalu</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts & Recent Activity -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <!-- Grafik Absensi -->
        <div class="xl:col-span-2 relative bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-800 dark:text-white flex items-center gap-2">
                    <i data-lucide="bar-chart-3" class="w-5 h-5 text-green-600"></i>
                    Grafik Absensi 7 Hari Terakhir
                </h2>
                <div class="flex items-center gap-2">
                    <span class="text-sm text-gray-500 dark:text-gray-400">Total: {{ array_sum($chart['data'] ?? []) }} pengunjung</span>
                </div>
            </div>
            <div class="h-80">
                <canvas id="chartAbsensi" class="w-full h-full"></canvas>
            </div>
        </div>

        <!-- Aktivitas Terbaru -->
        <div class="relative bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-800 dark:text-white flex items-center gap-2">
                    <i data-lucide="activity" class="w-5 h-5 text-blue-600"></i>
                    Aktivitas Terbaru
                </h2>
                <a href="{{ route('admin.tickets.index') }}" class="text-sm text-green-600 hover:text-green-700 font-medium">
                    Lihat Semua
                </a>
            </div>

            <div class="space-y-4">
                @forelse($recentTickets as $ticket)
                <div class="flex items-center gap-4 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl transition-all duration-200 hover:shadow-md">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i data-lucide="ticket" class="w-6 h-6 text-white"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-semibold text-gray-800 dark:text-white text-sm truncate">
                            Tiket {{ $ticket->ticket_type ?? 'Baru' }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 text-xs mt-1">
                            {{ $ticket->user->name ?? 'Guest' }} • {{ $ticket->created_at->diffForHumans() }}
                        </p>
                    </div>
                    <div class="text-right">
                        <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full
                            @if($ticket->status == 'aktif') bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300
                            @elseif($ticket->status == 'proses') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300
                            @else bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300 @endif">
                            {{ ucfirst($ticket->status) }}
                        </span>
                    </div>
                </div>
                @empty
                <div class="text-center py-8">
                    <i data-lucide="calendar" class="w-12 h-12 text-gray-400 mx-auto mb-3"></i>
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Belum ada aktivitas terbaru</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="{{ route('admin.tickets.create-special') }}"
           class="group p-4 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 hover:border-green-500 dark:hover:border-green-500 transition-all duration-200 shadow-sm hover:shadow-md">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center group-hover:bg-green-500 transition-colors duration-200">
                    <i data-lucide="plus" class="w-5 h-5 text-green-600 group-hover:text-white"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800 dark:text-white">Tiket Baru</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Buat tiket manual</p>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.rewards.redemptions') }}"
           class="group p-4 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 hover:border-blue-500 dark:hover:border-blue-500 transition-all duration-200 shadow-sm hover:shadow-md">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center group-hover:bg-blue-500 transition-colors duration-200">
                    <i data-lucide="gift" class="w-5 h-5 text-blue-600 group-hover:text-white"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800 dark:text-white">Kelola Reward</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Konfirmasi penukaran</p>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.users.index') }}"
           class="group p-4 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 hover:border-purple-500 dark:hover:border-purple-500 transition-all duration-200 shadow-sm hover:shadow-md">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center group-hover:bg-purple-500 transition-colors duration-200">
                    <i data-lucide="users" class="w-5 h-5 text-purple-600 group-hover:text-white"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800 dark:text-white">Data User</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Kelola pengguna</p>
                </div>
            </div>
        </a>

        <a href="#"
           class="group p-4 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 hover:border-orange-500 dark:hover:border-orange-500 transition-all duration-200 shadow-sm hover:shadow-md">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-orange-100 dark:bg-orange-900/30 rounded-lg flex items-center justify-center group-hover:bg-orange-500 transition-colors duration-200">
                    <i data-lucide="calendar-check" class="w-5 h-5 text-orange-600 group-hover:text-white"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800 dark:text-white">Laporan</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Lihat statistik</p>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Lucide Icons
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        // Chart.js Implementation
        const ctx = document.getElementById('chartAbsensi');
        if (ctx) {
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($chart['labels'] ?? []),
                    datasets: [{
                        label: 'Jumlah Pengunjung',
                        data: @json($chart['data'] ?? []),
                        borderColor: 'rgb(34, 197, 94)',
                        backgroundColor: function(ctx) {
                            const chart = ctx.chart;
                            const gradient = chart.ctx.createLinearGradient(0, 0, 0, 300);
                            gradient.addColorStop(0, 'rgba(34, 197, 94, 0.3)');
                            gradient.addColorStop(1, 'rgba(34, 197, 94, 0.05)');
                            return gradient;
                        },
                        borderWidth: 3,
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: 'rgb(34, 197, 94)',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 5,
                        pointHoverRadius: 7
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            titleColor: 'white',
                            bodyColor: 'white',
                            borderColor: 'rgb(34, 197, 94)',
                            borderWidth: 1,
                            cornerRadius: 8,
                            displayColors: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            },
                            ticks: {
                                color: 'rgb(107, 114, 128)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: 'rgb(107, 114, 128)'
                            }
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index'
                    }
                }
            });
        }

        // GSAP Animations
        if (typeof gsap !== 'undefined') {
            // Animate stats cards
            gsap.from('.group', {
                duration: 0.8,
                y: 30,
                opacity: 0,
                stagger: 0.1,
                ease: "power2.out",
                delay: 0.2
            });

            // Animate chart and recent activity
            gsap.from(['#chartAbsensi', '.space-y-4 > *'], {
                duration: 0.6,
                y: 20,
                opacity: 0,
                stagger: 0.05,
                ease: "power2.out",
                delay: 0.5
            });
        }
    });
</script>
@endpush
