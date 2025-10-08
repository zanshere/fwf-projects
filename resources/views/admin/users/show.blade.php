@extends('layouts.admin')

@section('title', 'Detail Pengguna')

@section('content')
<div class="space-y-8">

    {{-- Header --}}
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-bold text-white">User Details</h1>
        <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-gray-700 text-gray-200 rounded-lg hover:bg-gray-600 transition">
            ← Back
        </a>
    </div>

    {{-- Profile Card --}}
    <div class="bg-gray-800 p-8 rounded-2xl shadow-xl flex flex-col md:flex-row items-center md:items-start gap-8">
        {{-- Avatar --}}
        <div class="flex flex-col items-center">
            @if($user->avatar)
                <img src="{{ Storage::url($user->avatar) }}" class="h-28 w-28 rounded-full object-cover ring-4 ring-green-500/40">
            @else
                <div class="h-28 w-28 rounded-full bg-gray-700 flex items-center justify-center ring-4 ring-green-500/40">
                    <i data-lucide="user" class="w-10 h-10 text-gray-400"></i>
                </div>
            @endif
            <p class="mt-4 text-lg font-semibold text-white">{{ $user->name }}</p>
            <p class="text-gray-400 text-sm">{{ $user->email }}</p>
        </div>

        {{-- User Info --}}
        <div class="flex-1 space-y-6">
            <div>
                <h2 class="text-lg font-semibold text-gray-300 mb-2">Account Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-200">
                    <p><span class="font-semibold text-gray-400">Member Level:</span> {{ ucfirst($user->member_level) }}</p>
                    <p><span class="font-semibold text-gray-400">Joined:</span> {{ $user->created_at->format('M d, Y') }}</p>
                    <p><span class="font-semibold text-gray-400">Status:</span> 
                        <span class="text-green-400 font-medium">Active</span>
                    </p>
                    <p><span class="font-semibold text-gray-400">Last Updated:</span> {{ $user->updated_at->diffForHumans() }}</p>
                </div>
            </div>

            {{-- Points Progress --}}
            <div class="mt-4">
                <h2 class="text-lg font-semibold text-gray-300 mb-2">Points & Progress</h2>
                <div class="bg-gray-700 rounded-lg p-4">
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-300 font-medium">Points</span>
                        <span class="text-green-400 font-semibold">{{ $user->points }} pts</span>
                    </div>
                    @php
                        $maxPoints = 1000;
                        $progress = min(($user->points / $maxPoints) * 100, 100);
                    @endphp
                    <div class="w-full bg-gray-600 rounded-full h-3 overflow-hidden">
                     <div class="bg-green-500 h-3 rounded-full transition-all duration-1000 ease-out"
                        style="width: {{ $progress }}%"></div>
                    </div>

                    <p class="text-xs text-gray-400 mt-2">Progress to next level: {{ number_format($progress, 0) }}%</p>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="flex gap-3 mt-6">
                <a href="{{ route('admin.users.edit', $user->id) }}"
                   class="px-5 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                   Edit
                </a>
                <a href="{{ route('admin.users.index') }}"
                   class="px-5 py-2 bg-gray-700 text-gray-300 rounded-lg hover:bg-gray-600 transition">
                   Back
                </a>
            </div>
        </div>
    </div>

    {{-- Optional Statistics Section --}}
    <div class="grid md:grid-cols-3 gap-6">
        <div class="bg-gray-800 p-6 rounded-xl shadow-lg">
            <h3 class="text-gray-400 text-sm uppercase">Total Tickets</h3>
            <p class="text-3xl font-bold text-white mt-2">{{ $user->tickets_count ?? 0 }}</p>
        </div>
        <div class="bg-gray-800 p-6 rounded-xl shadow-lg">
            <h3 class="text-gray-400 text-sm uppercase">Rewards Earned</h3>
            <p class="text-3xl font-bold text-white mt-2">{{ $user->rewards_count ?? 0 }}</p>
        </div>
        <div class="bg-gray-800 p-6 rounded-xl shadow-lg">
            <h3 class="text-gray-400 text-sm uppercase">Member Since</h3>
            <p class="text-3xl font-bold text-green-400 mt-2">{{ $user->created_at->format('Y') }}</p>
        </div>
    </div>

</div>
@endsection
