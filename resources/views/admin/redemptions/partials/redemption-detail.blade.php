{{-- resources/views/admin/rewards/partials/redemption-detail.blade.php --}}
<div class="space-y-6">
    {{-- Header --}}
    <div class="text-center mb-6">
        <div class="w-16 h-16 bg-gradient-to-br {{ $redemption->reward->color }} rounded-2xl flex items-center justify-center mx-auto mb-4">
            <i data-lucide="{{ $redemption->reward->icon }}" class="w-8 h-8 text-white"></i>
        </div>
        <h3 class="text-2xl font-bold text-gray-800">{{ $redemption->reward->name }}</h3>
        <p class="text-gray-600">{{ $redemption->reward->description }}</p>
    </div>

    {{-- User Info --}}
    <div class="bg-gray-50 rounded-2xl p-6">
        <h4 class="text-lg font-semibold text-gray-800 mb-4">Informasi User</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="text-sm text-gray-600">Nama</p>
                <p class="font-semibold text-gray-800">{{ $redemption->user->name }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Email</p>
                <p class="font-semibold text-gray-800">{{ $redemption->user->email }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Poin Sebelum</p>
                <p class="font-semibold text-green-600">{{ number_format($redemption->points_before) }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Poin Sesudah</p>
                <p class="font-semibold text-blue-600">{{ number_format($redemption->points_after) }}</p>
            </div>
        </div>
    </div>

    {{-- Redemption Details --}}
    <div class="bg-gray-50 rounded-2xl p-6">
        <h4 class="text-lg font-semibold text-gray-800 mb-4">Detail Penukaran</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="text-sm text-gray-600">Poin Digunakan</p>
                <p class="font-semibold text-red-600">{{ number_format($redemption->points_used) }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Status</p>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                    @if($redemption->status === 'pending') bg-yellow-100 text-yellow-800
                    @elseif($redemption->status === 'approved') bg-green-100 text-green-800
                    @else bg-red-100 text-red-800 @endif">
                    <i data-lucide="@if($redemption->status === 'pending') clock
                                   @elseif($redemption->status === 'approved') check-circle
                                   @else x-circle @endif" class="w-4 h-4 mr-1"></i>
                    {{ ucfirst($redemption->status) }}
                </span>
            </div>
            <div>
                <p class="text-sm text-gray-600">Tanggal Penukaran</p>
                <p class="font-semibold text-gray-800">{{ $redemption->redeemed_at->format('d M Y H:i') }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Diproses Pada</p>
                <p class="font-semibold text-gray-800">
                    {{ $redemption->processed_at ? $redemption->processed_at->format('d M Y H:i') : 'Belum diproses' }}
                </p>
            </div>
        </div>
    </div>

    {{-- Admin Notes --}}
    @if($redemption->admin_notes)
    <div class="bg-yellow-50 rounded-2xl p-6 border border-yellow-200">
        <h4 class="text-lg font-semibold text-gray-800 mb-2">Catatan Admin</h4>
        <p class="text-gray-700">{{ $redemption->admin_notes }}</p>
    </div>
    @endif

    {{-- Approved By --}}
    @if($redemption->approvedBy)
    <div class="bg-green-50 rounded-2xl p-6 border border-green-200">
        <h4 class="text-lg font-semibold text-gray-800 mb-2">Disetujui Oleh</h4>
        <p class="text-gray-700">{{ $redemption->approvedBy->name }} pada {{ $redemption->approved_at->format('d M Y H:i') }}</p>
    </div>
    @endif
</div>
