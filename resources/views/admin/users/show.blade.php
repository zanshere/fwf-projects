@extends('layouts.admin')

@section('title', 'Detail Pengguna')
@section('page-title', 'Detail Pengguna')

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
                        <a href="{{ route('admin.users.index') }}" class="text-gray-500 hover:text-green-600 transition-colors">
                            Manajemen Pengguna
                        </a>
                    </li>
                    <li class="flex items-center">
                        <i data-lucide="chevron-right" class="w-4 h-4 text-gray-400 mx-2"></i>
                        <span class="text-green-600 font-medium">Detail Pengguna</span>
                    </li>
                </ol>
            </nav>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Detail Pengguna</h1>
            <p class="text-gray-600 dark:text-gray-400 mt-1">Informasi lengkap pengguna {{ $user->name }}</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.users.edit', $user->id) }}"
               class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all duration-300 flex items-center gap-2">
                <i data-lucide="edit" class="w-4 h-4"></i>
                Edit Pengguna
            </a>
            <a href="{{ route('admin.users.index') }}"
               class="px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-xl hover:border-green-500 dark:hover:border-green-500 transition-all duration-300 flex items-center gap-2">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                Kembali
            </a>
        </div>
    </div>

    {{-- Profile Card --}}
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-8 flex flex-col md:flex-row items-center md:items-start gap-8 gsap-fade-up">
        {{-- Avatar --}}
        <div class="flex flex-col items-center">
            @if($user->avatar)
                <img src="{{ Storage::url($user->avatar) }}" class="h-28 w-28 rounded-full object-cover ring-4 ring-green-500/40 dark:ring-green-600/40">
            @else
                <div class="h-28 w-28 rounded-full bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center ring-4 ring-green-500/40 dark:ring-green-600/40">
                    <i data-lucide="user" class="w-12 h-12 text-white"></i>
                </div>
            @endif
            <p class="mt-4 text-lg font-semibold text-gray-800 dark:text-white">{{ $user->name }}</p>
            <p class="text-gray-600 dark:text-gray-400 text-sm">{{ $user->email }}</p>
            <div class="mt-3">
                @switch($user->member_level)
                    @case('Bronze')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-800 dark:bg-orange-900/30 dark:text-orange-300">
                            <i data-lucide="shield" class="w-3 h-3 mr-1"></i>
                            Bronze
                        </span>
                        @break
                    @case('Silver')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                            <i data-lucide="shield" class="w-3 h-3 mr-1"></i>
                            Silver
                        </span>
                        @break
                    @case('Gold')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300">
                            <i data-lucide="shield" class="w-3 h-3 mr-1"></i>
                            Gold
                        </span>
                        @break
                    @case('Platinum')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300">
                            <i data-lucide="shield" class="w-3 h-3 mr-1"></i>
                            Platinum
                        </span>
                        @break
                @endswitch
            </div>
        </div>

        {{-- User Info --}}
        <div class="flex-1 space-y-6">
            <div>
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4 flex items-center gap-2">
                    <i data-lucide="info" class="w-5 h-5 text-green-600"></i>
                    Informasi Akun
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700 dark:text-gray-300">
                    <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-700/50 rounded-xl">
                        <i data-lucide="shield" class="w-4 h-4 text-green-600"></i>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Level Member</p>
                            <p class="font-semibold">{{ ucfirst($user->member_level) }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-700/50 rounded-xl">
                        <i data-lucide="calendar" class="w-4 h-4 text-blue-600"></i>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Bergabung</p>
                            <p class="font-semibold">{{ $user->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-700/50 rounded-xl">
                        <i data-lucide="check-circle" class="w-4 h-4 text-green-600"></i>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Status</p>
                            <p class="font-semibold text-green-600 dark:text-green-400">Aktif</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-700/50 rounded-xl">
                        <i data-lucide="refresh-cw" class="w-4 h-4 text-purple-600"></i>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Terakhir Diupdate</p>
                            <p class="font-semibold">{{ $user->updated_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Points Progress --}}
            <div class="mt-6">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4 flex items-center gap-2">
                    <i data-lucide="trending-up" class="w-5 h-5 text-yellow-600"></i>
                    Progress Poin
                </h2>
                <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-6">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-gray-700 dark:text-gray-300 font-medium">Total Poin</span>
                        <span class="text-green-600 dark:text-green-400 font-semibold text-lg">{{ $user->points }} pts</span>
                    </div>
                    @php
                        $maxPoints = 1000;
                        $progress = min(($user->points / $maxPoints) * 100, 100);
                        $nextLevel = $user->member_level === 'Bronze' ? 'Silver' :
                                    ($user->member_level === 'Silver' ? 'Gold' :
                                    ($user->member_level === 'Gold' ? 'Platinum' : 'Max'));
                    @endphp
                    <div class="w-full bg-gray-200 dark:bg-gray-600 rounded-full h-3 overflow-hidden">
                        <div class="bg-gradient-to-r from-green-500 to-emerald-600 h-3 rounded-full transition-all duration-1000 ease-out"
                            style="width: {{ $progress }}%"></div>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <p class="text-xs text-gray-500 dark:text-gray-400">Progress ke level berikutnya</p>
                        <p class="text-xs font-semibold text-gray-700 dark:text-gray-300">{{ number_format($progress, 0) }}%</p>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-3 text-center">
                        Menuju <span class="font-semibold text-green-600 dark:text-green-400">{{ $nextLevel }}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistics Section --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 text-center gsap-scale">
            <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-xl flex items-center justify-center mx-auto mb-4">
                <i data-lucide="ticket" class="w-6 h-6 text-blue-600 dark:text-blue-400"></i>
            </div>
            <h3 class="text-gray-500 dark:text-gray-400 text-sm uppercase mb-2">Total Tiket</h3>
            <p class="text-3xl font-bold text-gray-800 dark:text-white">{{ $user->tickets_count ?? 0 }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 text-center gsap-scale">
            <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-xl flex items-center justify-center mx-auto mb-4">
                <i data-lucide="gift" class="w-6 h-6 text-purple-600 dark:text-purple-400"></i>
            </div>
            <h3 class="text-gray-500 dark:text-gray-400 text-sm uppercase mb-2">Reward Diperoleh</h3>
            <p class="text-3xl font-bold text-gray-800 dark:text-white">{{ $user->rewards_count ?? 0 }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 text-center gsap-scale">
            <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-xl flex items-center justify-center mx-auto mb-4">
                <i data-lucide="calendar" class="w-6 h-6 text-green-600 dark:text-green-400"></i>
            </div>
            <h3 class="text-gray-500 dark:text-gray-400 text-sm uppercase mb-2">Member Sejak</h3>
            <p class="text-3xl font-bold text-green-600 dark:text-green-400">{{ $user->created_at->format('Y') }}</p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize animations
        gsap.from('.gsap-fade-up', {
            opacity: 0,
            y: 20,
            duration: 0.6,
            ease: "power2.out"
        });

        gsap.from('.gsap-scale', {
            opacity: 0,
            scale: 0.8,
            duration: 0.6,
            stagger: 0.1,
            ease: "back.out(1.4)"
        });
    });
</script>
@endpush
