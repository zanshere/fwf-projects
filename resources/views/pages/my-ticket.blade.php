<!-- File: resources/views/pages/my-ticket.blade.php -->
<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-green-800 via-green-600 to-green-900 relative overflow-hidden pt-20">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-32 h-32 bg-green-400 rounded-full opacity-10 blur-3xl animate-float">
            </div>
            <div
                class="absolute top-40 right-20 w-24 h-24 bg-yellow-400 rounded-full opacity-10 blur-2xl animate-float-delayed">
            </div>
            <div
                class="absolute bottom-20 left-20 w-40 h-40 bg-orange-400 rounded-full opacity-10 blur-3xl animate-float">
            </div>
            <div
                class="absolute bottom-40 right-10 w-28 h-28 bg-pink-400 rounded-full opacity-10 blur-2xl animate-float-delayed">
            </div>
        </div>

        <!-- Nature Icons Floating -->
        <div class="absolute top-20 left-10 animate-float pointer-events-none">
            <i data-lucide="leaf" class="w-8 h-8 text-green-300 opacity-30"></i>
        </div>
        <div class="absolute top-40 right-20 animate-float-delayed pointer-events-none">
            <i data-lucide="ticket" class="w-6 h-6 text-yellow-300 opacity-30"></i>
        </div>

        <!-- Main Content Container -->
        <div class="relative z-10">
            <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <!-- Header Section -->
                <section class="mb-8">
                    <h1 class="text-3xl lg:text-4xl font-black text-white mb-2">Tiket Saya</h1>
                    <p class="text-green-200">Riwayat pembelian dan tiket aktif Anda</p>
                </section>

                <!-- Stats Cards -->
                <section class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <!-- Total Tiket Card -->
                    <div class="group relative">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-blue-400/20 to-cyan-400/20 rounded-2xl blur-xl opacity-75">
                        </div>
                        <div
                            class="relative bg-white/95 backdrop-blur-sm rounded-2xl p-6 shadow-xl border border-white/20">
                            <div class="flex items-center justify-between mb-4">
                                <div
                                    class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center">
                                    <i data-lucide="ticket" class="w-6 h-6 text-white"></i>
                                </div>
                            </div>
                            <h3 class="text-2xl font-black text-gray-800 mb-1">{{ $tickets->count() }}</h3>
                            <p class="text-gray-600 text-sm">Total Tiket</p>
                        </div>
                    </div>

                    <!-- Tiket Proses Card -->
                    <div class="group relative">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-yellow-400/20 to-amber-400/20 rounded-2xl blur-xl opacity-75">
                        </div>
                        <div
                            class="relative bg-white/95 backdrop-blur-sm rounded-2xl p-6 shadow-xl border border-white/20">
                            <div class="flex items-center justify-between mb-4">
                                <div
                                    class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-amber-500 rounded-xl flex items-center justify-center">
                                    <i data-lucide="clock" class="w-6 h-6 text-white"></i>
                                </div>
                            </div>
                            <h3 class="text-2xl font-black text-gray-800 mb-1">
                                {{ $tickets->where('status', 'proses')->count() }}</h3>
                            <p class="text-gray-600 text-sm">Menunggu Konfirmasi</p>
                        </div>
                    </div>

                    <!-- Tiket Aktif Card -->
                    <div class="group relative">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-green-400/20 to-emerald-400/20 rounded-2xl blur-xl opacity-75">
                        </div>
                        <div
                            class="relative bg-white/95 backdrop-blur-sm rounded-2xl p-6 shadow-xl border border-white/20">
                            <div class="flex items-center justify-between mb-4">
                                <div
                                    class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center">
                                    <i data-lucide="check-circle" class="w-6 h-6 text-white"></i>
                                </div>
                            </div>
                            <h3 class="text-2xl font-black text-gray-800 mb-1">
                                {{ $tickets->where('status', 'aktif')->count() }}</h3>
                            <p class="text-gray-600 text-sm">Tiket Aktif</p>
                        </div>
                    </div>

                    <!-- Poin dari Tiket Card -->
                    <div class="group relative">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-purple-400/20 to-pink-400/20 rounded-2xl blur-xl opacity-75">
                        </div>
                        <div
                            class="relative bg-white/95 backdrop-blur-sm rounded-2xl p-6 shadow-xl border border-white/20">
                            <div class="flex items-center justify-between mb-4">
                                <div
                                    class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                                    <i data-lucide="star" class="w-6 h-6 text-white"></i>
                                </div>
                            </div>
                            <h3 class="text-2xl font-black text-gray-800 mb-1">
                                {{ number_format($tickets->sum('points_earned')) }}</h3>
                            <p class="text-gray-600 text-sm">Poin Didapat</p>
                        </div>
                    </div>
                </section>

                <!-- Tickets Table Section -->
                <section class="group relative">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-white/10 to-white/5 rounded-2xl lg:rounded-3xl blur-xl opacity-75">
                    </div>
                    <div
                        class="relative bg-white/95 backdrop-blur-sm rounded-2xl lg:rounded-3xl p-6 lg:p-8 shadow-xl border border-white/20">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-3">
                            <h2 class="text-xl lg:text-2xl font-black text-gray-800 flex items-center gap-3">
                                <i data-lucide="list" class="w-5 h-5 lg:w-6 lg:h-6 text-green-600"></i>
                                Riwayat Tiket
                            </h2>
                            <button onclick="window.location.href='{{ route('tickets.create') }}'"
                                class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg transition-all duration-300 transform hover:scale-105 flex items-center gap-2">
                                <i data-lucide="plus" class="w-4 h-4"></i>
                                Beli Tiket Baru
                            </button>
                        </div>

                        @if (session('success'))
                            <div
                                class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center">
                                <i data-lucide="check-circle" class="w-5 h-5 mr-2"></i>
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (isset($error))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                                {{ $error }}
                            </div>
                        @endif

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            No</th>
                                        <th
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Jenis Tiket</th>
                                        <th
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Jumlah</th>
                                        <th
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Dewasa</th>
                                        <th
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Anak</th>
                                        <th
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tanggal Pembelian</th>
                                        <th
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Poin Didapat</th>
                                        <th
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status</th>
                                        <th
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @forelse($tickets as $index => $ticket)
                                        <tr class="hover:bg-gray-50 transition-colors gsap-fade-up">
                                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $index + 1 }}</td>
                                            <td class="px-4 py-4 whitespace-nowrap">
                                                <div class="flex items-center gap-3">
                                                    <div
                                                        class="w-8 h-8 bg-gradient-to-br
                                                    @if ($ticket->ticket_type == 'Premium') from-yellow-500 to-orange-500
                                                    @elseif($ticket->ticket_type == 'Reguler') from-blue-500 to-cyan-500
                                                    @else from-purple-500 to-pink-500 @endif
                                                    rounded-lg flex items-center justify-center">
                                                        <i data-lucide="ticket" class="w-4 h-4 text-white"></i>
                                                    </div>
                                                    <div>
                                                        <div class="font-semibold text-gray-900">
                                                            {{ $ticket->ticket_type }}</div>
                                                        <div class="text-xs text-gray-500">Rp
                                                            {{ number_format($ticket->total_price, 0, ',', '.') }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $ticket->quantity }} tiket
                                            </td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $ticket->adult_count }} orang
                                            </td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $ticket->child_count }} orang
                                            </td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $ticket->purchase_date->format('d M Y') }}
                                            </td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <span
                                                    class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs font-medium">
                                                    +{{ number_format($ticket->points_earned, 0, ',', '.') }} poin
                                                </span>
                                            </td>
                                            <td class="px-4 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                                @if ($ticket->status == 'proses') bg-yellow-100 text-yellow-800
                                                @elseif($ticket->status == 'aktif') bg-green-100 text-green-800
                                                @else bg-gray-100 text-gray-800 @endif">
                                                    @if ($ticket->status == 'proses')
                                                        Menunggu Konfirmasi
                                                    @elseif($ticket->status == 'aktif')
                                                        Aktif
                                                    @else
                                                        Terpakai
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                                @if ($ticket->status == 'proses')
                                                    <button disabled
                                                        class="text-gray-400 cursor-not-allowed bg-gray-100 px-3 py-1 rounded text-xs">
                                                        <i data-lucide="clock" class="w-3 h-3 inline mr-1"></i>
                                                        Menunggu Konfirmasi
                                                    </button>
                                                @elseif($ticket->status == 'aktif')
                                                    <button type="button"
                                                        class="flex items-center text-green-600 hover:text-green-900 mr-3 view-ticket"
                                                        data-ticket-id="{{ $ticket->id }}">
                                                        <i data-lucide="eye" class="w-4 h-4 mr-1"></i>
                                                        <span>Lihat Tiket</span>
                                                    </button>
                                                @else
                                                    <span class="text-gray-400">-</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="px-4 py-8 text-center">
                                                <i data-lucide="ticket"
                                                    class="w-12 h-12 text-gray-400 mx-auto mb-4"></i>
                                                <p class="text-gray-600">Belum ada tiket yang dibeli.</p>
                                                <button onclick="window.location.href='{{ route('tickets.create') }}'"
                                                    class="mt-4 bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg transition-all duration-300 transform hover:scale-105">
                                                    Beli Tiket Pertama
                                                </button>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <!-- Ticket Detail Modal -->
    <div id="ticket-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-full max-w-2xl shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <!-- Header -->
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center">
                            <i data-lucide="ticket" class="h-6 w-6 text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900" id="modal-title">Detail Tiket</h3>
                            <p class="text-sm text-gray-500">Tunjukkan QR Code ini untuk scan masuk</p>
                        </div>
                    </div>
                    <button id="close-modal" class="text-gray-400 hover:text-gray-600">
                        <i data-lucide="x" class="w-6 h-6"></i>
                    </button>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Left Column - Ticket Information -->
                    <div class="space-y-4">
                        <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl p-4">
                            <h4 class="font-semibold text-gray-800 mb-3 flex items-center gap-2">
                                <i data-lucide="info" class="w-4 h-4"></i>
                                Informasi Tiket
                            </h4>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-sm font-medium text-gray-600">Jenis Tiket</span>
                                    <span class="text-sm font-semibold text-gray-900" id="modal-ticket-type"></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm font-medium text-gray-600">Tanggal Pembelian</span>
                                    <span class="text-sm text-gray-900" id="modal-purchase-date"></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm font-medium text-gray-600">Jumlah Tiket</span>
                                    <span class="text-sm text-gray-900" id="modal-quantity"></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm font-medium text-gray-600">Dewasa</span>
                                    <span class="text-sm text-gray-900" id="modal-adult-count"></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm font-medium text-gray-600">Anak</span>
                                    <span class="text-sm text-gray-900" id="modal-child-count"></span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gradient-to-r from-yellow-50 to-amber-50 rounded-xl p-4">
                            <h4 class="font-semibold text-gray-800 mb-3 flex items-center gap-2">
                                <i data-lucide="star" class="w-4 h-4"></i>
                                Reward & Harga
                            </h4>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-sm font-medium text-gray-600">Poin Didapat</span>
                                    <span class="text-sm font-semibold text-yellow-700"
                                        id="modal-points-earned"></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm font-medium text-gray-600">Total Harga</span>
                                    <span class="text-lg font-bold text-green-600" id="modal-total-price"></span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl p-4">
                            <h4 class="font-semibold text-gray-800 mb-3 flex items-center gap-2">
                                <i data-lucide="hash" class="w-4 h-4"></i>
                                Kode Tiket
                            </h4>
                            <div class="bg-white p-3 rounded-lg border">
                                <code class="text-sm font-mono text-gray-800" id="modal-barcode"></code>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - QR Code -->
                    <div class="space-y-4">
                        <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-6 text-center">
                            <h4 class="font-semibold text-gray-800 mb-4 flex items-center justify-center gap-2">
                                <i data-lucide="qr-code" class="w-4 h-4"></i>
                                QR Code Tiket
                            </h4>

                            <!-- QR Code Container -->
                            <div class="bg-white p-4 rounded-xl border-2 border-green-200 mb-4">
                                <div id="qr-code-container" class="flex justify-center">
                                    <!-- QR Code akan dimuat di sini -->
                                </div>
                            </div>

                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-3">
                                <div class="flex items-center justify-center gap-2 text-blue-700 mb-2">
                                    <i data-lucide="info" class="w-4 h-4"></i>
                                    <span class="text-sm font-semibold">Informasi Scan</span>
                                </div>
                                <p class="text-xs text-blue-600">
                                    Tunjukkan QR Code ini kepada petugas untuk scan masuk.
                                    QR Code hanya berlaku untuk tiket aktif.
                                </p>
                            </div>
                        </div>

                        <!-- Status Info -->
                        <div id="ticket-status-info"
                            class="bg-gradient-to-r from-green-100 to-emerald-100 rounded-xl p-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                                    <i data-lucide="check" class="w-5 h-5 text-white"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-green-800 text-sm">Tiket Aktif</p>
                                    <p class="text-green-600 text-xs">Siap digunakan untuk masuk</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-3 mt-6">
                    <button id="ok-btn"
                        class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-300 flex items-center justify-center gap-2">
                        <i data-lucide="check" class="w-4 h-4"></i>
                        Tutup
                    </button>
                    <button id="print-btn"
                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-300 flex items-center justify-center gap-2">
                        <i data-lucide="printer" class="w-4 h-4"></i>
                        Cetak Tiket
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-15px) rotate(3deg);
            }
        }

        @keyframes floatReverse {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-12px) rotate(-2deg);
            }
        }

        .animate-float {
            animation: float 8s ease-in-out infinite;
        }

        .animate-float-delayed {
            animation: floatReverse 9s ease-in-out infinite;
            animation-delay: 1s;
        }

        .gsap-fade-up {
            opacity: 0;
            transform: translateY(20px);
        }

        /* QR Code Animation */
        @keyframes pulse-glow {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.4);
            }

            50% {
                box-shadow: 0 0 0 10px rgba(34, 197, 94, 0);
            }
        }

        .qr-code-glow {
            animation: pulse-glow 2s infinite;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    // Initialize Lucide icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    // Initialize ticket modal functionality
    initTicketModal();
});

async function initTicketModal() {
    // Load QRCode library from CDN
    const QRCode = await loadQRCodeLibrary();

    if (!QRCode) {
        console.error('Failed to load QRCode library');
        return;
    }

    // Ticket modal functionality
    const modal = document.getElementById('ticket-modal');
    const closeBtn = document.getElementById('close-modal');
    const okBtn = document.getElementById('ok-btn');
    const printBtn = document.getElementById('print-btn');

    // View ticket buttons
    document.querySelectorAll('.view-ticket').forEach(button => {
        button.addEventListener('click', async function(e) {
            e.preventDefault();
            const ticketId = this.getAttribute('data-ticket-id');

            console.log('Opening ticket:', ticketId);

            // Show modal with loading state
            modal.classList.remove('hidden');
            showLoadingState();

            try {
                // Fetch ticket details
                const response = await fetch(`/tickets/${ticketId}`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();
                console.log('Ticket data received:', data);

                if (!data.ticket) {
                    throw new Error('Data tiket tidak valid');
                }

                const ticket = data.ticket;

                // Update modal content
                updateModalContent(ticket);

                // Generate QR Code
                await generateQRCode(QRCode, ticket);

                // Update status info
                updateTicketStatusInfo(ticket.status);

                // Reinitialize Lucide icons
                if (typeof lucide !== 'undefined') {
                    lucide.createIcons();
                }

            } catch (error) {
                console.error('Error loading ticket:', error);
                showErrorState(error.message);
            }
        });
    });

    // Load QRCode library from CDN - Try multiple CDNs
    function loadQRCodeLibrary() {
        return new Promise((resolve, reject) => {
            // Check if already loaded
            if (window.QRCode) {
                console.log('QRCode library already loaded');
                resolve(window.QRCode);
                return;
            }

            // Try multiple CDN sources
            const cdnSources = [
                'https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js',
                'https://unpkg.com/qrcodejs2@0.0.2/qrcode.min.js'
            ];

            let currentCDN = 0;

            function tryLoadScript() {
                if (currentCDN >= cdnSources.length) {
                    console.error('All CDN sources failed');
                    alert('Gagal memuat library QR Code dari semua sumber. Silakan refresh halaman.');
                    reject(new Error('Failed to load QRCode library from all sources'));
                    return;
                }

                const script = document.createElement('script');
                script.src = cdnSources[currentCDN];

                script.onload = () => {
                    console.log(`QRCode library loaded successfully from: ${cdnSources[currentCDN]}`);
                    // Wait a bit for the library to initialize
                    setTimeout(() => {
                        if (window.QRCode) {
                            resolve(window.QRCode);
                        } else {
                            console.warn(`Library loaded but QRCode not available, trying next CDN...`);
                            currentCDN++;
                            tryLoadScript();
                        }
                    }, 100);
                };

                script.onerror = () => {
                    console.warn(`Failed to load from ${cdnSources[currentCDN]}, trying next...`);
                    currentCDN++;
                    tryLoadScript();
                };

                document.head.appendChild(script);
            }

            tryLoadScript();
        });
    }

    // Show loading state
    function showLoadingState() {
        document.getElementById('modal-title').textContent = 'Memuat Detail Tiket...';
        document.getElementById('qr-code-container').innerHTML = `
            <div class="flex flex-col items-center justify-center py-8">
                <div class="animate-spin rounded-full h-16 w-16 border-b-2 border-green-600 mb-4"></div>
                <p class="text-gray-500 text-sm">Memuat QR Code...</p>
            </div>
        `;
    }

    // Show error state
    function showErrorState(message) {
        document.getElementById('modal-title').textContent = 'Error Memuat Data';
        document.getElementById('qr-code-container').innerHTML = `
            <div class="flex flex-col items-center justify-center py-8">
                <i data-lucide="alert-triangle" class="w-12 h-12 text-red-500 mb-4"></i>
                <p class="text-red-500 text-sm">${message || 'Gagal memuat data tiket'}</p>
            </div>
        `;
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }

    // Update modal content with ticket data
    function updateModalContent(ticket) {
        // Parse date properly
        const purchaseDate = new Date(ticket.purchase_date);
        const formattedDate = purchaseDate.toLocaleDateString('id-ID', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });

        document.getElementById('modal-title').textContent = 'Detail Tiket - ' + ticket.ticket_type;
        document.getElementById('modal-ticket-type').textContent = ticket.ticket_type;
        document.getElementById('modal-purchase-date').textContent = formattedDate;
        document.getElementById('modal-quantity').textContent = ticket.quantity + ' tiket';
        document.getElementById('modal-adult-count').textContent = ticket.adult_count + ' orang';
        document.getElementById('modal-child-count').textContent = ticket.child_count + ' orang';
        document.getElementById('modal-points-earned').textContent = '+' +
            ticket.points_earned.toLocaleString('id-ID') + ' poin';
        document.getElementById('modal-total-price').textContent = 'Rp ' +
            ticket.total_price.toLocaleString('id-ID');
        document.getElementById('modal-barcode').textContent = ticket.barcode;
    }

    // Generate QR Code using QRCode.js library
    async function generateQRCode(QRCodeLib, ticket) {
        const qrContainer = document.getElementById('qr-code-container');

        // Data yang akan diencode dalam QR code
        const qrData = JSON.stringify({
            ticket_id: ticket.id,
            barcode: ticket.barcode,
            type: ticket.ticket_type,
            status: ticket.status
        });

        try {
            // Clear container and create a div for QR code
            qrContainer.innerHTML = '<div id="qrcode-canvas"></div>';
            const qrDiv = document.getElementById('qrcode-canvas');

            // Generate QR Code using QRCode.js
            new QRCodeLib(qrDiv, {
                text: qrData,
                width: 200,
                height: 200,
                colorDark: "#000000",
                colorLight: "#ffffff",
                correctLevel: QRCodeLib.CorrectLevel.H
            });

            // Wait for QR code to render
            await new Promise(resolve => setTimeout(resolve, 100));

            // Get the generated image
            const qrImage = qrDiv.querySelector('img') || qrDiv.querySelector('canvas');

            if (qrImage) {
                // Wrap with nice styling
                qrContainer.innerHTML = `
                    <div class="flex flex-col items-center">
                        <div class="qr-code-glow rounded-lg border-2 border-green-200 mb-3 p-2 bg-white">
                            ${qrImage.outerHTML}
                        </div>
                        <p class="text-xs text-gray-600 text-center">
                            Scan QR code untuk validasi tiket<br>
                            <span class="font-mono text-xs bg-gray-100 px-2 py-1 rounded mt-1 inline-block">${ticket.barcode}</span>
                        </p>
                    </div>
                `;
            } else {
                throw new Error('QR Code image not generated');
            }
        } catch (err) {
            console.error('QR Code generation error:', err);
            qrContainer.innerHTML = `
                <div class="flex flex-col items-center justify-center py-4">
                    <i data-lucide="alert-triangle" class="w-8 h-8 text-red-500 mb-2"></i>
                    <p class="text-red-500 text-xs">Gagal generate QR Code</p>
                    <p class="text-gray-600 text-xs mt-2">Kode: ${ticket.barcode}</p>
                </div>
            `;
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        }
    }

    // Update ticket status info
    function updateTicketStatusInfo(status) {
        const statusInfo = document.getElementById('ticket-status-info');
        let statusHtml = '';

        switch (status) {
            case 'aktif':
                statusHtml = `
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                            <i data-lucide="check" class="w-5 h-5 text-white"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-green-800 text-sm">Tiket Aktif</p>
                            <p class="text-green-600 text-xs">Siap digunakan untuk masuk</p>
                        </div>
                    </div>
                `;
                break;
            case 'proses':
                statusHtml = `
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center">
                            <i data-lucide="clock" class="w-5 h-5 text-white"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-yellow-800 text-sm">Menunggu Konfirmasi</p>
                            <p class="text-yellow-600 text-xs">Tiket sedang diproses</p>
                        </div>
                    </div>
                `;
                break;
            case 'terpakai':
                statusHtml = `
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gray-500 rounded-full flex items-center justify-center">
                            <i data-lucide="check-circle" class="w-5 h-5 text-white"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 text-sm">Tiket Terpakai</p>
                            <p class="text-gray-600 text-xs">Tiket sudah digunakan</p>
                        </div>
                    </div>
                `;
                break;
            default:
                statusHtml = `
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gray-500 rounded-full flex items-center justify-center">
                            <i data-lucide="x" class="w-5 h-5 text-white"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 text-sm">Status Tidak Dikenal</p>
                            <p class="text-gray-600 text-xs">Status: ${status}</p>
                        </div>
                    </div>
                `;
        }

        statusInfo.innerHTML = statusHtml;

        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }

    // Print functionality
    printBtn.addEventListener('click', function() {
        const ticketType = document.getElementById('modal-ticket-type').textContent;
        const purchaseDate = document.getElementById('modal-purchase-date').textContent;
        const barcode = document.getElementById('modal-barcode').textContent;
        const qrCodeImg = document.querySelector('#qr-code-container img') || document.querySelector(
            '#qr-code-container canvas');

        if (!qrCodeImg) {
            alert('QR Code tidak tersedia untuk dicetak');
            return;
        }

        // Convert canvas to image if needed
        let qrSrc = qrCodeImg.src;
        if (qrCodeImg.tagName === 'CANVAS') {
            qrSrc = qrCodeImg.toDataURL();
        }

        const printWindow = window.open('', '_blank');
        printWindow.document.write(`
            <!DOCTYPE html>
            <html>
            <head>
                <title>Cetak Tiket - ${ticketType}</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        margin: 20px;
                        text-align: center;
                    }
                    .header {
                        color: #16a34a;
                        margin-bottom: 20px;
                    }
                    .qr-code {
                        max-width: 300px;
                        margin: 20px auto;
                        border: 2px solid #16a34a;
                        padding: 10px;
                        border-radius: 10px;
                    }
                    .info {
                        text-align: left;
                        margin: 20px auto;
                        max-width: 400px;
                    }
                    .barcode {
                        font-family: monospace;
                        background: #f3f4f6;
                        padding: 10px;
                        border-radius: 5px;
                        margin: 10px 0;
                    }
                    .footer {
                        margin-top: 30px;
                        color: #666;
                        font-size: 12px;
                    }
                    @media print {
                        body { margin: 0; }
                    }
                </style>
            </head>
            <body>
                <div class="header">
                    <h1>E-Ticket</h1>
                    <h2>Fajar World Fantasy</h2>
                </div>

                <div class="info">
                    <p><strong>Jenis Tiket:</strong> ${ticketType}</p>
                    <p><strong>Tanggal Pembelian:</strong> ${purchaseDate}</p>
                    <div class="barcode">
                        <strong>Kode Tiket:</strong><br>
                        ${barcode}
                    </div>
                </div>

                <div class="qr-code">
                    <img src="${qrSrc}" alt="QR Code" style="width: 100%;">
                    <p style="margin-top: 10px; font-size: 12px; color: #666;">
                        Scan QR code untuk validasi tiket
                    </p>
                </div>

                <div class="footer">
                    <p>Cetak: ${new Date().toLocaleDateString('id-ID')}</p>
                    <p>Tunjukkan QR Code ini untuk scan masuk</p>
                </div>

                <script>
                    window.onload = function() {
                        window.print();
                        setTimeout(function() {
                            window.close();
                        }, 1000);
                    }
                <\/script>
            </body>
            </html>
        `);
        printWindow.document.close();
    });

    // Close modal events
    function closeModal() {
        modal.classList.add('hidden');
    }

    okBtn.addEventListener('click', closeModal);
    closeBtn.addEventListener('click', closeModal);

    // Close modal when clicking outside
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            closeModal();
        }
    });
}
    </script>
</x-app-layout>
