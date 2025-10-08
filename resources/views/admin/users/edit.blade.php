@extends('layouts.admin')

@section('title', 'Edit Pengguna')

@section('content')
<div class="space-y-8">
    {{-- Header --}}
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-100">Edit Pengguna</h1>
        <a href="{{ route('admin.users.show', $user->id) }}" 
           class="px-4 py-2 bg-gray-700 text-gray-200 rounded-lg hover:bg-gray-600 transition">
            ← Kembali
        </a>
    </div>

    {{-- Form Edit --}}
    <div class="bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-700">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-300 mb-2">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                       class="w-full px-4 py-2 bg-gray-700 border border-gray-600 text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500 outline-none">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                       class="w-full px-4 py-2 bg-gray-700 border border-gray-600 text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500 outline-none">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Points --}}
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-300 mb-2">Poin</label>
                <input type="number" name="points" value="{{ old('points', $user->points) }}"
                       class="w-full px-4 py-2 bg-gray-700 border border-gray-600 text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500 outline-none">
                @error('points')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Member Level --}}
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-300 mb-2">Level Member</label>
                <select name="member_level" 
                        class="w-full px-4 py-2 bg-gray-700 border border-gray-600 text-gray-100 rounded-lg focus:ring-2 focus:ring-green-500 outline-none">
                    <option value="Bronze" {{ old('member_level', $user->member_level) == 'Bronze' ? 'selected' : '' }}>Bronze</option>
                    <option value="Silver" {{ old('member_level', $user->member_level) == 'Silver' ? 'selected' : '' }}>Silver</option>
                    <option value="Gold" {{ old('member_level', $user->member_level) == 'Gold' ? 'selected' : '' }}>Gold</option>
                    <option value="Platinum" {{ old('member_level', $user->member_level) == 'Platinum' ? 'selected' : '' }}>Platinum</option>
                </select>
                @error('member_level')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="flex justify-end space-x-3 mt-6">
                <a href="{{ route('admin.users.show', $user->id) }}" 
                   class="px-4 py-2 bg-gray-600 text-gray-200 rounded-lg hover:bg-gray-500 transition">
                    Batal
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-500 transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
