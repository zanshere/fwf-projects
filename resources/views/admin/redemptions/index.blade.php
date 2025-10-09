{{-- resources/views/admin/rewards/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Manajemen Penukaran Reward')

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
                        <span class="text-green-600 font-medium">Penukaran Reward</span>
                    </li>
                </ol>
            </nav>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Manajemen Penukaran Reward</h1>
            <p class="text-gray-600 dark:text-gray-400 mt-1 ">Kelola semua permintaan penukaran reward dari pengguna</p>
        </div>
        <div class="flex gap-3">
            <button class="px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl text-gray-700 dark:text-gray-300 hover:border-green-500 dark:hover:border-green-500 transition-all duration-300 flex items-center gap-2">
                <i data-lucide="filter" class="w-4 h-4"></i>
                Filter
            </button>
            <button class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all duration-300 flex items-center gap-2">
                <i data-lucide="download" class="w-4 h-4"></i>
                Export
            </button>
        </div>
    </div>

    {{-- Statistik Cards --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl p-6 text-white gsap-scale">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm font-medium">Total Penukaran</p>
                    <p class="text-2xl font-black mt-1">{{ $redemptions->count() }}</p>
                </div>
                <i data-lucide="shopping-cart" class="w-8 h-8 text-white/80"></i>
            </div>
        </div>

        <div class="bg-gradient-to-br from-yellow-500 to-amber-600 rounded-2xl p-6 text-white gsap-scale">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-yellow-100 text-sm font-medium">Menunggu</p>
                    <p class="text-2xl font-black mt-1">{{ $redemptions->where('status', 'pending')->count() }}</p>
                </div>
                <i data-lucide="clock" class="w-8 h-8 text-white/80"></i>
            </div>
        </div>

        <div class="bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl p-6 text-white gsap-scale">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium">Disetujui</p>
                    <p class="text-2xl font-black mt-1">{{ $redemptions->where('status', 'approved')->count() }}</p>
                </div>
                <i data-lucide="check-circle" class="w-8 h-8 text-white/80"></i>
            </div>
        </div>

        <div class="bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl p-6 text-white gsap-scale">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-red-100 text-sm font-medium">Ditolak</p>
                    <p class="text-2xl font-black mt-1">{{ $redemptions->where('status', 'rejected')->count() }}</p>
                </div>
                <i data-lucide="x-circle" class="w-8 h-8 text-white/80"></i>
            </div>
        </div>
    </div>

    {{-- Alert Messages --}}
    @if(session('success'))
    <div class="bg-green-50 border border-green-200 rounded-2xl p-4 flex items-center gap-3 gsap-fade-up">
        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
            <i data-lucide="check-circle" class="w-4 h-4 text-green-600"></i>
        </div>
        <div class="flex-1">
            <p class="text-green-800 font-medium">{{ session('success') }}</p>
        </div>
        <button type="button" class="text-green-600 hover:text-green-800">
            <i data-lucide="x" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    {{-- Table Container --}}
    <div class="bg-white dark:bg-gray-800  rounded-2xl shadow-lg border border-gray-100 overflow-hidden gsap-fade-up">
        {{-- Table Header dengan Search --}}
        <div class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="relative flex-1 sm:max-w-xs">
                    <i data-lucide="search" class="w-4 h-4 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="text" placeholder="Cari penukaran..."
                           class="w-full pl-10 pr-4 py-2 dark:bg-gray-700 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-300">
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
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">User</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Reward</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Poin</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($redemptions as $redeem)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                                    {{ strtoupper(substr($redeem->user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="font-medium text-gray-900">{{ $redeem->user->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $redeem->user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-gradient-to-br {{ $redeem->reward->color }} rounded-lg flex items-center justify-center">
                                    <i data-lucide="{{ $redeem->reward->icon }}" class="w-4 h-4 text-white"></i>
                                </div>
                                <span class="font-medium text-gray-900">{{ $redeem->reward->name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <i data-lucide="award" class="w-3 h-3 mr-1"></i>
                                {{ number_format($redeem->points_used) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            {{ $redeem->created_at->format('d M Y H:i') }}
                        </td>
                        <td class="px-6 py-4">
                            @switch($redeem->status)
                                @case('pending')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        <i data-lucide="clock" class="w-3 h-3 mr-1"></i>
                                        Menunggu
                                    </span>
                                    @break
                                @case('approved')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <i data-lucide="check-circle" class="w-3 h-3 mr-1"></i>
                                        Disetujui
                                    </span>
                                    @break
                                @case('rejected')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        <i data-lucide="x-circle" class="w-3 h-3 mr-1"></i>
                                        Ditolak
                                    </span>
                                    @break
                                @case('completed')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        <i data-lucide="package" class="w-3 h-3 mr-1"></i>
                                        Selesai
                                    </span>
                                    @break
                            @endswitch
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <button onclick="showRedemptionDetail({{ $redeem->id }})"
                                        class="p-2 text-gray-400 hover:text-green-600 transition-colors duration-300"
                                        title="Lihat Detail">
                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                </button>
                                @if($redeem->status === 'pending')
                                <form action="{{ route('admin.rewards.approve', $redeem->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="p-2 text-gray-400 hover:text-green-600 transition-colors duration-300" title="Setujui">
                                        <i data-lucide="check" class="w-4 h-4"></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.rewards.reject', $redeem->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="p-2 text-gray-400 hover:text-red-600 transition-colors duration-300" title="Tolak">
                                        <i data-lucide="x" class="w-4 h-4"></i>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center text-gray-400">
                                <i data-lucide="package" class="w-12 h-12 mb-3"></i>
                                <p class="text-lg font-medium text-gray-500">Belum ada penukaran reward</p>
                                <p class="text-sm text-gray-400 mt-1">Pengguna belum melakukan penukaran reward</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($redemptions->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $redemptions->links() }}
        </div>
        @endif
    </div>
</div>

{{-- Detail Modal --}}
<div id="redemptionModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50 p-4 transition-opacity duration-300">
    <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-hidden transform scale-95 transition-transform duration-300">
        <div class="relative p-8">
            <button onclick="closeModal()" class="absolute top-4 right-4 p-2 text-gray-400 hover:text-gray-600 transition-colors">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
            <div id="modalContent">
                {{-- Content loaded via AJAX --}}
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
<script>
    function showRedemptionDetail(id) {
        const modal = document.getElementById('redemptionModal');
        const content = document.getElementById('modalContent');

        // Show loading
        content.innerHTML = `
            <div class="text-center py-12">
                <i data-lucide="loader" class="w-8 h-8 animate-spin mx-auto mb-4 text-green-600"></i>
                <p class="text-gray-600">Memuat detail penukaran...</p>
            </div>
        `;

        modal.classList.remove('hidden');
        modal.classList.add('flex');

        // Animate in
        gsap.to(modal.querySelector('.bg-white'), {
            scale: 1,
            duration: 0.3,
            ease: "back.out(1.7)"
        });

        // Load content via AJAX
        // Implementation depends on your backend
    }

    function closeModal() {
        const modal = document.getElementById('redemptionModal');
        gsap.to(modal.querySelector('.bg-white'), {
            scale: 0.95,
            duration: 0.2,
            ease: "back.in(1.7)",
            onComplete: () => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        });
    }

    // Initialize animations
    document.addEventListener('DOMContentLoaded', function() {
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
