@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Detail Tiket</h1>
                <p class="text-gray-600">Barcode: {{ $ticket->barcode }}</p>
            </div>
            <span class="px-3 py-1 text-sm rounded-full
                {{ $ticket->status === 'proses' ? 'bg-yellow-100 text-yellow-800' : '' }}
                {{ $ticket->status === 'aktif' ? 'bg-green-100 text-green-800' : '' }}
                {{ $ticket->status === 'terpakai' ? 'bg-gray-100 text-gray-800' : '' }}
                {{ $ticket->status === 'ditolak' ? 'bg-red-100 text-red-800' : '' }}">
                {{ ucfirst($ticket->status) }}
            </span>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Ticket Information -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                <i data-lucide="info" class="w-5 h-5 mr-2 text-green-600"></i>
                Informasi Tiket
            </h2>

            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-600">Customer:</span>
                    <span class="font-medium">
                        {{ $ticket->user ? $ticket->user->name : $ticket->guest_name }}
                    </span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Email:</span>
                    <span class="font-medium">
                        {{ $ticket->user ? $ticket->user->email : $ticket->guest_email }}
                    </span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Tipe Tiket:</span>
                    <span class="font-medium">{{ $ticket->ticket_type }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Quantity:</span>
                    <span class="font-medium">{{ $ticket->quantity }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Dewasa:</span>
                    <span class="font-medium">{{ $ticket->adult_count }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Anak-anak:</span>
                    <span class="font-medium">{{ $ticket->child_count }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Total Harga:</span>
                    <span class="font-medium">Rp {{ number_format($ticket->total_price, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Poin Diperoleh:</span>
                    <span class="font-medium">{{ $ticket->points_earned }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Tanggal Pembelian:</span>
                    <span class="font-medium">{{ $ticket->purchase_date->format('d M Y') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Dibuat Pada:</span>
                    <span class="font-medium">{{ $ticket->created_at->format('d M Y H:i') }}</span>
                </div>
            </div>

            <!-- Action Buttons -->
            @if($ticket->status === 'proses')
            <div class="mt-6 flex space-x-3">
                <form action="{{ route('admin.tickets.confirm', $ticket->id) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg flex items-center hover:bg-green-700 transition">
                        <i data-lucide="check-circle" class="w-4 h-4 mr-2"></i>
                        Konfirmasi
                    </button>
                </form>
                <form action="{{ route('admin.tickets.reject', $ticket->id) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg flex items-center hover:bg-red-700 transition">
                        <i data-lucide="x-circle" class="w-4 h-4 mr-2"></i>
                        Tolak
                    </button>
                </form>
            </div>
            @endif
        </div>

        <!-- QR Code Section -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                <i data-lucide="qr-code" class="w-5 h-5 mr-2 text-green-600"></i>
                QR Code Tiket
            </h2>

            @if($ticket->status === 'aktif')
            <div class="text-center">
                <div id="qrcode-container" class="flex justify-center mb-4">
                    <!-- QR Code will be loaded here via AJAX -->
                    <div class="animate-pulse bg-gray-200 w-48 h-48 rounded-lg"></div>
                </div>
                <p class="text-sm text-gray-600 mb-4">Scan QR code ini untuk validasi tiket di lokasi</p>

                <div class="bg-gray-50 p-3 rounded-lg">
                    <p class="text-xs text-gray-500 font-mono break-all">{{ $ticket->barcode }}</p>
                </div>
            </div>
            @else
            <div class="text-center py-8">
                <i data-lucide="alert-circle" class="w-16 h-16 text-gray-400 mx-auto mb-4"></i>
                <p class="text-gray-500">
                    @if($ticket->status === 'proses')
                    QR Code akan tersedia setelah tiket dikonfirmasi
                    @elseif($ticket->status === 'terpakai')
                    Tiket sudah digunakan
                    @elseif($ticket->status === 'ditolak')
                    Tiket ditolak
                    @endif
                </p>
            </div>
            @endif
        </div>
    </div>

    <!-- Back Button -->
    <div class="mt-6">
        <a href="{{ route('admin.tickets.index') }}" class="inline-flex items-center text-green-600 hover:text-green-800">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
            Kembali ke Daftar Tiket
        </a>
    </div>
</div>

@push('scripts')
<script>
// Load QR Code via AJAX when page loads
@if($ticket->status === 'aktif')
document.addEventListener('DOMContentLoaded', function() {
    fetch('{{ route("admin.tickets.qrcode", $ticket->id) }}')
        .then(response => response.json())
        .then(data => {
            document.getElementById('qrcode-container').innerHTML = data.qr_code;
        })
        .catch(error => {
            console.error('Error loading QR code:', error);
            document.getElementById('qrcode-container').innerHTML =
                '<div class="text-red-500">Error loading QR code</div>';
        });
});
@endif
</script>
@endpush
@endsection
