@extends('layouts.admin')

@section('title', 'Verifikasi Tiket')

@section('content')
<div class="min-h-screen bg-gray-900 text-gray-100 py-10 px-6">
    <div class="max-w-3xl mx-auto space-y-8">

        {{-- Header --}}
        <div class="text-center">
            <h1 class="text-3xl font-bold text-emerald-400 mb-2">Verifikasi Tiket</h1>
            <p class="text-gray-400">Gunakan Token atau Scan QR Code untuk memverifikasi tiket.</p>
        </div>

        {{-- Tabs --}}
        <div class="flex justify-center space-x-4">
            <button id="tokenTab" class="px-5 py-2 bg-emerald-600 hover:bg-emerald-700 rounded-full font-medium transition">Verifikasi Token</button>
            <button id="qrTab" class="px-5 py-2 bg-gray-700 hover:bg-gray-600 rounded-full font-medium transition">Scan QR</button>
        </div>

        {{-- Token Verification Form --}}
        <div id="tokenSection" class="bg-gray-800 rounded-2xl p-8 shadow-xl">
            <h2 class="text-xl font-semibold mb-4 text-emerald-400">Verifikasi Menggunakan Token</h2>
            <form id="tokenForm" method="POST" action="{{ route('admin.tickets.verify.token') }}">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-gray-400 mb-2">Masukkan Token Tiket</label>
                        <input type="text" name="token" class="w-full px-4 py-2 bg-gray-900 border border-gray-700 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:outline-none" placeholder="Contoh: FWF123456">
                    </div>
                    <button type="submit" class="w-full py-2 bg-emerald-600 hover:bg-emerald-700 rounded-lg font-semibold">Verifikasi Token</button>
                </div>
            </form>
        </div>

      {{-- QR Code Verification Form --}}
        <div id="qrSection" class="hidden bg-gray-800 rounded-2xl p-8 shadow-xl">
            <h2 class="text-xl font-semibold mb-4 text-emerald-400">Verifikasi Menggunakan QR Code</h2>

            <div id="qr-reader" class="w-full rounded-lg overflow-hidden border border-gray-700"></div>
            <form id="qrForm" method="POST" action="{{ route('admin.tickets.verify.qr') }}">
                @csrf
                <input type="hidden" id="ticket_id_input" name="ticket_id">
            </form>

            <p class="mt-4 text-sm text-gray-400 text-center">Arahkan kamera ke QR Code tiket untuk memverifikasi.</p>
        </div>
    </div>
</div>

{{-- SweetAlert2 CDN --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tokenTab = document.getElementById('tokenTab');
    const qrTab = document.getElementById('qrTab');
    const tokenSection = document.getElementById('tokenSection');
    const qrSection = document.getElementById('qrSection');

    // Switch tabs
    tokenTab.addEventListener('click', () => {
        tokenTab.classList.add('bg-emerald-600', 'text-white');
        tokenTab.classList.remove('bg-gray-700');
        qrTab.classList.remove('bg-emerald-600', 'text-white');
        qrTab.classList.add('bg-gray-700');
        tokenSection.classList.remove('hidden');
        qrSection.classList.add('hidden');
    });

    qrTab.addEventListener('click', () => {
        qrTab.classList.add('bg-emerald-600', 'text-white');
        qrTab.classList.remove('bg-gray-700');
        tokenTab.classList.remove('bg-emerald-600', 'text-white');
        tokenTab.classList.add('bg-gray-700');
        qrSection.classList.remove('hidden');
        tokenSection.classList.add('hidden');
    });

    // SweetAlert popup (untuk session flash)
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            confirmButtonColor: '#10B981',
            background: '#1F2937',
            color: '#E5E7EB'
        });
    @endif

    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: "{{ session('error') }}",
            confirmButtonColor: '#EF4444',
            background: '#1F2937',
            color: '#E5E7EB'
        });
    @endif
});


</script>

{{-- Library QR Scanner --}}
<script src="https://unpkg.com/html5-qrcode"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tokenTab = document.getElementById('tokenTab');
    const qrTab = document.getElementById('qrTab');
    const tokenSection = document.getElementById('tokenSection');
    const qrSection = document.getElementById('qrSection');
    let qrScanner;

    // Switch tabs
    tokenTab.addEventListener('click', () => {
        tokenTab.classList.add('bg-emerald-600', 'text-white');
        qrTab.classList.remove('bg-emerald-600', 'text-white');
        tokenSection.classList.remove('hidden');
        qrSection.classList.add('hidden');
        if (qrScanner) qrScanner.stop(); // Stop camera
    });

    qrTab.addEventListener('click', () => {
        qrTab.classList.add('bg-emerald-600', 'text-white');
        tokenTab.classList.remove('bg-emerald-600', 'text-white');
        qrSection.classList.remove('hidden');
        tokenSection.classList.add('hidden');

        // Start QR Scanner
        if (!qrScanner) {
            qrScanner = new Html5Qrcode("qr-reader");
        }
        qrScanner.start(
            { facingMode: "environment" },
            {
                fps: 10,
                qrbox: { width: 250, height: 250 }
            },
            qrCodeMessage => {
                // Masukkan hasil ke input & submit form otomatis
                document.getElementById('ticket_id_input').value = qrCodeMessage;
                document.getElementById('qrForm').submit();
                qrScanner.stop();
            },
            errorMessage => {
                console.log("QR Scan Error:", errorMessage);
            }
        ).catch(err => {
            console.error("Camera Error:", err);
        });
    });

    // SweetAlert hasil
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            confirmButtonColor: '#10B981',
            background: '#1F2937',
            color: '#E5E7EB'
        });
    @endif

    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: "{{ session('error') }}",
            confirmButtonColor: '#EF4444',
            background: '#1F2937',
            color: '#E5E7EB'
        });
    @endif
});
</script>

@endsection
