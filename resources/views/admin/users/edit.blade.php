@extends('layouts.admin')

@section('title', 'Edit Pengguna')
@section('page-title', 'Edit Pengguna')

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
                        <span class="text-green-600 font-medium">Edit Pengguna</span>
                    </li>
                </ol>
            </nav>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Edit Pengguna</h1>
            <p class="text-gray-600 dark:text-gray-400 mt-1">Edit informasi pengguna {{ $user->name }}</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.users.show', $user->id) }}"
               class="px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-xl hover:border-green-500 dark:hover:border-green-500 transition-all duration-300 flex items-center gap-2">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                Kembali
            </a>
        </div>
    </div>

    {{-- Form Edit --}}
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 gsap-fade-up">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- User Info --}}
            <div class="flex items-center gap-4 mb-6 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl">
                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center text-white font-semibold text-lg">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800 dark:text-white">{{ $user->name }}</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">ID: {{ $user->id }} • {{ $user->email }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Nama --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2 flex items-center gap-2">
                        <i data-lucide="user" class="w-4 h-4 text-green-600"></i>
                        Nama Lengkap
                    </label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                           class="w-full px-4 py-3 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition-all duration-300">
                    @error('name')
                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                            <i data-lucide="alert-circle" class="w-4 h-4"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2 flex items-center gap-2">
                        <i data-lucide="mail" class="w-4 h-4 text-blue-600"></i>
                        Email
                    </label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                           class="w-full px-4 py-3 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition-all duration-300">
                    @error('email')
                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                            <i data-lucide="alert-circle" class="w-4 h-4"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Points --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2 flex items-center gap-2">
                        <i data-lucide="award" class="w-4 h-4 text-yellow-600"></i>
                        Poin
                    </label>
                    <input type="number" name="points" value="{{ old('points', $user->points) }}"
                           class="w-full px-4 py-3 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition-all duration-300">
                    @error('points')
                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                            <i data-lucide="alert-circle" class="w-4 h-4"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Member Level --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2 flex items-center gap-2">
                        <i data-lucide="shield" class="w-4 h-4 text-purple-600"></i>
                        Level Member
                    </label>
                    <select name="member_level"
                            class="w-full px-4 py-3 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition-all duration-300">
                        <option value="Bronze" {{ old('member_level', $user->member_level) == 'Bronze' ? 'selected' : '' }}>Bronze</option>
                        <option value="Silver" {{ old('member_level', $user->member_level) == 'Silver' ? 'selected' : '' }}>Silver</option>
                        <option value="Gold" {{ old('member_level', $user->member_level) == 'Gold' ? 'selected' : '' }}>Gold</option>
                        <option value="Platinum" {{ old('member_level', $user->member_level) == 'Platinum' ? 'selected' : '' }}>Platinum</option>
                    </select>
                    @error('member_level')
                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                            <i data-lucide="alert-circle" class="w-4 h-4"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            {{-- Tombol --}}
            <div class="flex justify-end space-x-3 mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                <a href="{{ route('admin.users.show', $user->id) }}"
                   class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all duration-300 flex items-center gap-2">
                    <i data-lucide="x" class="w-4 h-4"></i>
                    Batal
                </a>
                <button type="submit"
                        class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all duration-300 flex items-center gap-2">
                    <i data-lucide="save" class="w-4 h-4"></i>
                    Simpan Perubahan
                </button>
            </div>
        </form>
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
    });
</script>
@endpush
