@extends('layouts.admin')

@section('title', 'Manajemen Tiket')
@section('page-title', 'Manajemen Tiket')

@section('content')
<div class="space-y-6">
    {{-- Header dengan Breadcrumb --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-500 hover:text-green-600 transition-colors">
                            <i data-lucide="home" class="w-4 h-4"></i>
                        </a>
                    </li>
                    <li class="flex items-center">
                        <i data-lucide="chevron-right" class="w-4 h-4 text-gray-400 mx-2"></i>
                        <span class="text-green-600 font-medium">Manajemen Tiket</span>
                    </li>
                </ol>
            </nav>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Manajemen Tiket</h1>
            <p class="text-gray-600 dark:text-gray-400 mt-1">Kelola semua tiket dari pengguna</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.tickets.verify') }}"
               class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all duration-300 flex items-center gap-2">
                <i data-lucide="check-circle" class="w-4 h-4"></i>
                Verifikasi Tiket
            </a>
            <button class="px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl text-gray-700 dark:text-gray-300 hover:border-green-500 dark:hover:border-green-500 transition-all duration-300 flex items-center gap-2">
                <i data-lucide="filter" class="w-4 h-4"></i>
                Filter
            </button>
        </div>
    </div>

    {{-- Statistik Cards --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl p-6 text-white gsap-scale">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm font-medium">Total Tiket</p>
                    <p class="text-2xl font-black mt-1">{{ $stats['total'] }}</p>
                </div>
                <i data-lucide="ticket" class="w-8 h-8 text-white/80"></i>
            </div>
        </div>

        <div class="bg-gradient-to-br from-yellow-500 to-amber-600 rounded-2xl p-6 text-white gsap-scale">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-yellow-100 text-sm font-medium">Pending</p>
                    <p class="text-2xl font-black mt-1">{{ $stats['pending'] }}</p>
                </div>
                <i data-lucide="clock" class="w-8 h-8 text-white/80"></i>
            </div>
        </div>

        <div class="bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl p-6 text-white gsap-scale">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium">Aktif</p>
                    <p class="text-2xl font-black mt-1">{{ $stats['active'] }}</p>
                </div>
                <i data-lucide="check-circle" class="w-8 h-8 text-white/80"></i>
            </div>
        </div>

        <div class="bg-gradient-to-br from-gray-500 to-gray-700 rounded-2xl p-6 text-white gsap-scale">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-100 text-sm font-medium">Terpakai</p>
                    <p class="text-2xl font-black mt-1">{{ $stats['used'] }}</p>
                </div>
                <i data-lucide="archive" class="w-8 h-8 text-white/80"></i>
            </div>
        </div>
    </div>

    {{-- Alert Messages --}}
    @if(session('success'))
    <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-2xl p-4 flex items-center gap-3 gsap-fade-up">
        <div class="w-8 h-8 bg-green-100 dark:bg-green-800 rounded-full flex items-center justify-center">
            <i data-lucide="check-circle" class="w-4 h-4 text-green-600 dark:text-green-400"></i>
        </div>
        <div class="flex-1">
            <p class="text-green-800 dark:text-green-200 font-medium">{{ session('success') }}</p>
        </div>
        <button type="button" class="text-green-600 dark:text-green-400 hover:text-green-800 dark:hover:text-green-200">
            <i data-lucide="x" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    {{-- Table Container --}}
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden gsap-fade-up">
        {{-- Table Header dengan Search --}}
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="relative flex-1 sm:max-w-xs">
                    <i data-lucide="search" class="w-4 h-4 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="text" placeholder="Cari tiket..."
                           class="w-full pl-10 pr-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-300">
                </div>
            </div>
            <div class="flex items-center gap-2">
                <button class="p-2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                    <i data-lucide="refresh-cw" class="w-4 h-4"></i>
                </button>
            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Customer</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Tipe</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Qty</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Total Harga</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($tickets as $ticket)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                                    {{ strtoupper(substr($ticket->user ? $ticket->user->name : ($ticket->guest_name ?: 'G'), 0, 1)) }}
                                </div>
                                <div>
                                    <div class="font-medium text-gray-900 dark:text-white">{{ $ticket->user ? $ticket->user->name : $ticket->guest_name }}</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">{{ $ticket->user ? $ticket->user->email : $ticket->guest_email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">{{ $ticket->ticket_type }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">{{ $ticket->quantity }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">Rp {{ number_format($ticket->total_price, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            @switch($ticket->status)
                                @case('proses')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300">
                                        <i data-lucide="clock" class="w-3 h-3 mr-1"></i>
                                        Menunggu
                                    </span>
                                    @break
                                @case('aktif')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300">
                                        <i data-lucide="check-circle" class="w-3 h-3 mr-1"></i>
                                        Aktif
                                    </span>
                                    @break
                                @case('terpakai')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                        <i data-lucide="archive" class="w-3 h-3 mr-1"></i>
                                        Terpakai
                                    </span>
                                    @break
                                @case('ditolak')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300">
                                        <i data-lucide="x-circle" class="w-3 h-3 mr-1"></i>
                                        Ditolak
                                    </span>
                                    @break
                            @endswitch
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">
                            {{ $ticket->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.tickets.index', $ticket->id) }}"
                                        class="p-2 text-gray-400 hover:text-green-600 dark:hover:text-green-400 transition-colors duration-300"
                                        title="Lihat Detail">
                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                </a>
                                @if($ticket->status === 'proses')
                                <form action="{{ route('admin.tickets.confirm', $ticket->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="p-2 text-gray-400 hover:text-green-600 dark:hover:text-green-400 transition-colors duration-300" title="Konfirmasi">
                                        <i data-lucide="check" class="w-4 h-4"></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.tickets.reject', $ticket->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="p-2 text-gray-400 hover:text-red-600 dark:hover:text-red-400 transition-colors duration-300" title="Tolak">
                                        <i data-lucide="x" class="w-4 h-4"></i>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center text-gray-400">
                                <i data-lucide="ticket" class="w-12 h-12 mb-3"></i>
                                <p class="text-lg font-medium text-gray-500 dark:text-gray-400">Belum ada tiket</p>
                                <p class="text-sm text-gray-400 dark:text-gray-500 mt-1">Tidak ada tiket yang ditemukan</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($tickets->hasPages())
        <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
            {{ $tickets->links() }}
        </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize animations
        gsap.from('.gsap-scale', {
            opacity: 0,
            scale: 0.8,
            duration: 0.6,
            stagger: 0.1,
            ease: "back.out(1.4)"
        });

        gsap.from('.gsap-fade-up', {
            opacity: 0,
            y: 20,
            duration: 0.6,
            ease: "power2.out"
        });
    });
</script>
@endpush
