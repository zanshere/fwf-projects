@extends('layouts.admin')

@section('title', 'Detail Reward Redemption')

@section('content')
<div class="space-y-8">

    {{-- Header --}}
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
            <i data-lucide="eye" class="w-6 h-6 text-green-600"></i>
            Detail Reward Redemption
        </h1>
        <a href="{{ route('admin.rewards.redemptions') }}" 
           class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 rounded-xl hover:bg-gray-300 shadow">
           <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i> Kembali
        </a>
    </div>

    {{-- Detail Card --}}
    <div class="bg-white rounded-2xl shadow-lg border p-6">
        <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <dt class="font-semibold text-gray-800">User</dt>
                <dd class="text-gray-600">{{ $redemption->user->name }}</dd>
            </div>
            <div>
                <dt class="font-semibold text-gray-800">Reward</dt>
                <dd class="text-gray-600">{{ $redemption->reward->title }}</dd>
            </div>
            <div>
                <dt class="font-semibold text-gray-800">Points</dt>
                <dd class="text-gray-600">{{ $redemption->reward->points }}</dd>
            </div>
            <div>
                <dt class="font-semibold text-gray-800">Tanggal</dt>
                <dd class="text-gray-600">{{ $redemption->created_at->format('d M Y H:i') }}</dd>
            </div>
            <div>
                <dt class="font-semibold text-gray-800">Status</dt>
                <dd>
                    <span class="px-3 py-1 rounded-full text-xs font-medium
                        @if($redemption->status === 'pending') bg-yellow-100 text-yellow-800
                        @elseif($redemption->status === 'approved') bg-green-100 text-green-800
                        @else bg-red-100 text-red-800 @endif">
                        {{ ucfirst($redemption->status) }}
                    </span>
                </dd>
            </div>
        </dl>

        <div class="mt-8 flex gap-3">
            <form method="POST" action="{{ route('admin.rewards.approve', $redemption->id) }}">
                @csrf
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700 flex items-center gap-2">
                    <i data-lucide="check" class="w-4 h-4"></i> Approve
                </button>
            </form>
            <form method="POST" action="{{ route('admin.rewards.reject', $redemption->id) }}">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-xl hover:bg-red-700 flex items-center gap-2">
                    <i data-lucide="x" class="w-4 h-4"></i> Reject
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
