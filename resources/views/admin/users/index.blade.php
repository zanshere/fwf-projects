@extends('layouts.admin')

@section('title', 'Manajemen Pengguna')
@section('page-title', 'Manajemen Pengguna')

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
                        <span class="text-green-600 font-medium">Manajemen Pengguna</span>
                    </li>
                </ol>
            </nav>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Manajemen Pengguna</h1>
            <p class="text-gray-600 dark:text-gray-400 mt-1">Kelola semua pengguna sistem</p>
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
                    <p class="text-green-100 text-sm font-medium">Total Pengguna</p>
                    <p class="text-2xl font-black mt-1">{{ $users->total() }}</p>
                </div>
                <i data-lucide="users" class="w-8 h-8 text-white/80"></i>
            </div>
        </div>

        <div class="bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl p-6 text-white gsap-scale">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium">Pengguna Aktif</p>
                    <p class="text-2xl font-black mt-1">{{ $users->total() }}</p>
                </div>
                <i data-lucide="user-check" class="w-8 h-8 text-white/80"></i>
            </div>
        </div>

        <div class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl p-6 text-white gsap-scale">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-100 text-sm font-medium">Member Gold</p>
                    <p class="text-2xl font-black mt-1">0</p>
                </div>
                <i data-lucide="award" class="w-8 h-8 text-white/80"></i>
            </div>
        </div>

        <div class="bg-gradient-to-br from-orange-500 to-amber-600 rounded-2xl p-6 text-white gsap-scale">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-orange-100 text-sm font-medium">Poin Tertinggi</p>
                    <p class="text-2xl font-black mt-1">{{ $users->max('points') ?? 0 }}</p>
                </div>
                <i data-lucide="star" class="w-8 h-8 text-white/80"></i>
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
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Cari nama atau email..."
                           class="w-full pl-10 pr-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-300">
                </div>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-xl hover:bg-green-700 transition-all duration-300 flex items-center gap-2">
                    <i data-lucide="search" class="w-4 h-4"></i>
                    Cari
                </button>
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
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Pengguna</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Poin</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Level Member</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Bergabung</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($users as $user)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="font-medium text-gray-900 dark:text-white">{{ $user->name }}</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">ID: {{ $user->id }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900 dark:text-white">{{ $user->email }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300">
                                <i data-lucide="award" class="w-3 h-3 mr-1"></i>
                                {{ $user->points }} pts
                            </span>
                        </td>
                        <td class="px-6 py-4">
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
                                @default
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                        <i data-lucide="shield" class="w-3 h-3 mr-1"></i>
                                        {{ $user->member_level }}
                                    </span>
                            @endswitch
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">
                            {{ $user->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.users.show', $user) }}"
                                   class="p-2 text-gray-400 hover:text-green-600 dark:hover:text-green-400 transition-colors duration-300"
                                   title="Lihat Detail">
                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                </a>
                                <a href="{{ route('admin.users.edit', $user) }}"
                                   class="p-2 text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300"
                                   title="Edit">
                                    <i data-lucide="edit" class="w-4 h-4"></i>
                                </a>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="p-2 text-gray-400 hover:text-red-600 dark:hover:text-red-400 transition-colors duration-300"
                                            title="Hapus">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center text-gray-400">
                                <i data-lucide="users" class="w-12 h-12 mb-3"></i>
                                <p class="text-lg font-medium text-gray-500 dark:text-gray-400">Tidak ada pengguna</p>
                                <p class="text-sm text-gray-400 dark:text-gray-500 mt-1">Tidak ada pengguna yang ditemukan</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($users->hasPages())
        <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
            {{ $users->links() }}
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

        // Add search form functionality
        const searchInput = document.querySelector('input[name="search"]');
        const searchButton = document.querySelector('button[type="submit"]');

        searchButton.addEventListener('click', function() {
            const searchValue = searchInput.value;
            if (searchValue.trim()) {
                window.location.href = '{{ route("admin.users.index") }}?search=' + encodeURIComponent(searchValue);
            }
        });

        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchButton.click();
            }
        });
    });
</script>
@endpush
