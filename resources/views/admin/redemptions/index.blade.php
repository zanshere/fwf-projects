{{-- resources/views/admin/rewards/redemptions.blade.php --}}
@extends('layouts.admin')

@section('title', 'Manajemen Penukaran Reward')

@section('content')
<div class="space-y-6">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Penukaran Reward</h1>
            <p class="text-gray-600 mt-1">Kelola semua permintaan penukaran reward dari pengguna</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.rewards.create') }}"
               class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all duration-300 flex items-center gap-2">
                <i data-lucide="plus" class="w-4 h-4"></i>
                Tambah Reward
            </a>
        </div>
    </div>

    {{-- Statistics --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm font-medium">Total Penukaran</p>
                    <p class="text-2xl font-black mt-1">{{ $stats['total'] }}</p>
                </div>
                <i data-lucide="shopping-cart" class="w-8 h-8 text-white/80"></i>
            </div>
        </div>

        <div class="bg-gradient-to-br from-yellow-500 to-amber-600 rounded-2xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-yellow-100 text-sm font-medium">Menunggu</p>
                    <p class="text-2xl font-black mt-1">{{ $stats['pending'] }}</p>
                </div>
                <i data-lucide="clock" class="w-8 h-8 text-white/80"></i>
            </div>
        </div>

        <div class="bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium">Disetujui</p>
                    <p class="text-2xl font-black mt-1">{{ $stats['approved'] }}</p>
                </div>
                <i data-lucide="check-circle" class="w-8 h-8 text-white/80"></i>
            </div>
        </div>

        <div class="bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-red-100 text-sm font-medium">Ditolak</p>
                    <p class="text-2xl font-black mt-1">{{ $stats['rejected'] }}</p>
                </div>
                <i data-lucide="x-circle" class="w-8 h-8 text-white/80"></i>
            </div>
        </div>
    </div>

    {{-- Redemptions Table --}}
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">User & Reward</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Poin</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($redemptions as $redemption)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                                    {{ strtoupper(substr($redemption->user->name, 0, 1)) }}
                                </div>
                                <div class="flex-1">
                                    <div class="font-medium text-gray-900">{{ $redemption->user->name }}</div>
                                    <div class="text-sm text-gray-500 flex items-center gap-2 mt-1">
                                        <div class="w-6 h-6 bg-gradient-to-br {{ $redemption->reward->color }} rounded flex items-center justify-center">
                                            <i data-lucide="{{ $redemption->reward->icon }}" class="w-3 h-3 text-white"></i>
                                        </div>
                                        {{ $redemption->reward->name }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="space-y-1">
                                <div class="flex items-center gap-2 text-sm">
                                    <span class="text-gray-500">Sebelum:</span>
                                    <span class="font-semibold text-green-600">{{ number_format($redemption->points_before) }}</span>
                                </div>
                                <div class="flex items-center gap-2 text-sm">
                                    <span class="text-gray-500">Sesudah:</span>
                                    <span class="font-semibold text-blue-600">{{ number_format($redemption->points_after) }}</span>
                                </div>
                                <div class="flex items-center gap-2 text-sm">
                                    <span class="text-gray-500">Digunakan:</span>
                                    <span class="font-semibold text-red-600">-{{ number_format($redemption->points_used) }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @switch($redemption->status)
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
                            @endswitch
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            <div>{{ $redemption->redeemed_at->format('d M Y') }}</div>
                            <div class="text-gray-500">{{ $redemption->redeemed_at->format('H:i') }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <button onclick="showRedemptionDetail({{ $redemption->id }})"
                                        class="p-2 text-gray-400 hover:text-green-600 transition-colors duration-300"
                                        title="Lihat Detail">
                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                </button>
                                @if($redemption->status === 'pending')
                                <button onclick="showApproveModal({{ $redemption->id }})"
                                        class="p-2 text-gray-400 hover:text-green-600 transition-colors duration-300"
                                        title="Setujui">
                                    <i data-lucide="check" class="w-4 h-4"></i>
                                </button>
                                <button onclick="showRejectModal({{ $redemption->id }})"
                                        class="p-2 text-gray-400 hover:text-red-600 transition-colors duration-300"
                                        title="Tolak">
                                    <i data-lucide="x" class="w-4 h-4"></i>
                                </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center text-gray-400">
                                <i data-lucide="package" class="w-12 h-12 mb-3"></i>
                                <p class="text-lg font-medium text-gray-500">Belum ada penukaran reward</p>
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

{{-- Modals --}}
@include('admin.redemptions.approve-modal')
@include('admin.rewards.modals.reject-modal')
@include('admin.rewards.modals.detail-modal')
@endsection

@push('scripts')
<script>
    function showApproveModal(redemptionId) {
        const modal = document.getElementById('approveModal');
        modal.querySelector('input[name="redemption_id"]').value = redemptionId;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function showRejectModal(redemptionId) {
        const modal = document.getElementById('rejectModal');
        modal.querySelector('input[name="redemption_id"]').value = redemptionId;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function showRedemptionDetail(redemptionId) {
        // Implement AJAX to load redemption details
        fetch(`/admin/rewards/redemptions/${redemptionId}`)
            .then(response => response.json())
            .then(data => {
                const modal = document.getElementById('detailModal');
                modal.querySelector('#modalContent').innerHTML = data.html;
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            });
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    // Close modals when clicking outside
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('modal-overlay')) {
            e.target.classList.add('hidden');
            e.target.classList.remove('flex');
        }
    });
</script>
@endpush
