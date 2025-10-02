<!-- File: resources/views/pages/my-ticket.blade.php -->
<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-green-800 via-green-600 to-green-900 relative overflow-hidden pt-20">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-32 h-32 bg-green-400 rounded-full opacity-10 blur-3xl animate-float"></div>
            <div class="absolute top-40 right-20 w-24 h-24 bg-yellow-400 rounded-full opacity-10 blur-2xl animate-float-delayed"></div>
            <div class="absolute bottom-20 left-20 w-40 h-40 bg-orange-400 rounded-full opacity-10 blur-3xl animate-float"></div>
            <div class="absolute bottom-40 right-10 w-28 h-28 bg-pink-400 rounded-full opacity-10 blur-2xl animate-float-delayed"></div>
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
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400/20 to-cyan-400/20 rounded-2xl blur-xl opacity-75"></div>
                        <div class="relative bg-white/95 backdrop-blur-sm rounded-2xl p-6 shadow-xl border border-white/20">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center">
                                    <i data-lucide="ticket" class="w-6 h-6 text-white"></i>
                                </div>
                            </div>
                            <h3 class="text-2xl font-black text-gray-800 mb-1">{{ $tickets->count() }}</h3>
                            <p class="text-gray-600 text-sm">Total Tiket</p>
                        </div>
                    </div>

                    <!-- Tiket Proses Card -->
                    <div class="group relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-yellow-400/20 to-amber-400/20 rounded-2xl blur-xl opacity-75"></div>
                        <div class="relative bg-white/95 backdrop-blur-sm rounded-2xl p-6 shadow-xl border border-white/20">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-amber-500 rounded-xl flex items-center justify-center">
                                    <i data-lucide="clock" class="w-6 h-6 text-white"></i>
                                </div>
                            </div>
                            <h3 class="text-2xl font-black text-gray-800 mb-1">{{ $tickets->where('status', 'proses')->count() }}</h3>
                            <p class="text-gray-600 text-sm">Menunggu Konfirmasi</p>
                        </div>
                    </div>

                    <!-- Tiket Aktif Card -->
                    <div class="group relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-green-400/20 to-emerald-400/20 rounded-2xl blur-xl opacity-75"></div>
                        <div class="relative bg-white/95 backdrop-blur-sm rounded-2xl p-6 shadow-xl border border-white/20">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center">
                                    <i data-lucide="check-circle" class="w-6 h-6 text-white"></i>
                                </div>
                            </div>
                            <h3 class="text-2xl font-black text-gray-800 mb-1">{{ $tickets->where('status', 'aktif')->count() }}</h3>
                            <p class="text-gray-600 text-sm">Tiket Aktif</p>
                        </div>
                    </div>

                    <!-- Poin dari Tiket Card -->
                    <div class="group relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-purple-400/20 to-pink-400/20 rounded-2xl blur-xl opacity-75"></div>
                        <div class="relative bg-white/95 backdrop-blur-sm rounded-2xl p-6 shadow-xl border border-white/20">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                                    <i data-lucide="star" class="w-6 h-6 text-white"></i>
                                </div>
                            </div>
                            <h3 class="text-2xl font-black text-gray-800 mb-1">{{ number_format($tickets->sum('points_earned')) }}</h3>
                            <p class="text-gray-600 text-sm">Poin Didapat</p>
                        </div>
                    </div>
                </section>

                <!-- Tickets Table Section -->
                <section class="group relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-white/10 to-white/5 rounded-2xl lg:rounded-3xl blur-xl opacity-75"></div>
                    <div class="relative bg-white/95 backdrop-blur-sm rounded-2xl lg:rounded-3xl p-6 lg:p-8 shadow-xl border border-white/20">
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

                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center">
                                <i data-lucide="check-circle" class="w-5 h-5 mr-2"></i>
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(isset($error))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                                {{ $error }}
                            </div>
                        @endif

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Tiket</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dewasa</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Anak</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Pembelian</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Poin Didapat</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @forelse($tickets as $index => $ticket)
                                    <tr class="hover:bg-gray-50 transition-colors gsap-fade-up">
                                        <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $index + 1 }}</td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 bg-gradient-to-br
                                                    @if($ticket->ticket_type == 'Premium') from-yellow-500 to-orange-500
                                                    @elseif($ticket->ticket_type == 'Reguler') from-blue-500 to-cyan-500
                                                    @else from-purple-500 to-pink-500 @endif
                                                    rounded-lg flex items-center justify-center">
                                                    <i data-lucide="ticket" class="w-4 h-4 text-white"></i>
                                                </div>
                                                <div>
                                                    <div class="font-semibold text-gray-900">{{ $ticket->ticket_type }}</div>
                                                    <div class="text-xs text-gray-500">Rp {{ number_format($ticket->total_price, 0, ',', '.') }}</div>
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
                                            <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs font-medium">
                                                +{{ number_format($ticket->points_earned, 0, ',', '.') }} poin
                                            </span>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                                @if($ticket->status == 'proses') bg-yellow-100 text-yellow-800
                                                @elseif($ticket->status == 'aktif') bg-green-100 text-green-800
                                                @else bg-gray-100 text-gray-800 @endif">
                                                @if($ticket->status == 'proses')
                                                    Menunggu Konfirmasi
                                                @elseif($ticket->status == 'aktif')
                                                    Aktif
                                                @else
                                                    Terpakai
                                                @endif
                                            </span>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                            @if($ticket->status == 'proses')
                                                <button disabled class="text-gray-400 cursor-not-allowed bg-gray-100 px-3 py-1 rounded text-xs">
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
                                            <i data-lucide="ticket" class="w-12 h-12 text-gray-400 mx-auto mb-4"></i>
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
        <div class="relative top-20 mx-auto p-5 border w-full max-w-md shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                    <i data-lucide="ticket" class="h-6 w-6 text-green-600"></i>
                </div>
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Detail Tiket</h3>

                <div class="mt-2 px-7 py-3">
                    <div class="text-left space-y-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jenis Tiket</label>
                            <p class="text-sm text-gray-900" id="modal-ticket-type"></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal Pembelian</label>
                            <p class="text-sm text-gray-900" id="modal-purchase-date"></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jumlah Tiket</label>
                            <p class="text-sm text-gray-900" id="modal-quantity"></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Dewasa</label>
                            <p class="text-sm text-gray-900" id="modal-adult-count"></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Anak</label>
                            <p class="text-sm text-gray-900" id="modal-child-count"></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Poin Didapat</label>
                            <p class="text-sm text-gray-900" id="modal-points-earned"></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Total Harga</label>
                            <p class="text-lg font-bold text-green-600" id="modal-total-price"></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kode Tiket</label>
                            <p class="text-sm font-mono bg-gray-100 p-2 rounded" id="modal-barcode"></p>
                        </div>
                    </div>

                    <!-- QR Code Section -->
                    <div class="mt-4 p-4 bg-gray-50 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-2">QR Code Tiket</label>
                        <div class="flex justify-center mb-2" id="qr-code-container">
                            <!-- QR Code akan dimuat di sini -->
                        </div>
                        <p class="text-xs text-gray-500">Scan QR code untuk validasi tiket</p>
                    </div>

                    <!-- Scanner Section (hanya untuk tiket aktif) -->
                    <div id="scanner-section" class="hidden mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Scan QR Code</label>
                        <div id="reader" class="w-full mb-2"></div>
                        <button id="start-scanner" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center justify-center gap-2">
                            <i data-lucide="camera" class="w-4 h-4"></i>
                            Mulai Scanner
                        </button>
                        <button id="stop-scanner" class="hidden w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-2">
                            Hentikan Scanner
                        </button>
                    </div>
                </div>

                <div class="items-center px-4 py-3">
                    <button id="ok-btn" class="px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(3deg); }
        }
        @keyframes floatReverse {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-12px) rotate(-2deg); }
        }
        .animate-float { animation: float 8s ease-in-out infinite; }
        .animate-float-delayed { animation: floatReverse 9s ease-in-out infinite; animation-delay: 1s; }

        .gsap-fade-up {
            opacity: 0;
            transform: translateY(20px);
        }
    </style>

    <!-- Include HTML5 QR Code Scanner -->
    <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>

    <script src="{{ asset('js/ticket-scan.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Lucide icons
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }

            // GSAP animations for table rows
            if (typeof gsap !== 'undefined') {
                gsap.to('.gsap-fade-up', {
                    opacity: 1,
                    y: 0,
                    duration: 0.6,
                    stagger: 0.1,
                    delay: 0.3,
                    ease: "power2.out"
                });
            }

            // Initialize ticket modal functionality
            initTicketModal();
        });

        function initTicketModal() {
            let html5QrCode = null;
            let currentTicketId = null;

            // Ticket modal functionality
            document.querySelectorAll('.view-ticket').forEach(button => {
                button.addEventListener('click', function() {
                    const ticketId = this.getAttribute('data-ticket-id');
                    currentTicketId = ticketId;
                    const modal = document.getElementById('ticket-modal');

                    // Show loading state
                    modal.querySelector('#modal-title').textContent = 'Memuat...';
                    document.getElementById('qr-code-container').innerHTML = '<div class="animate-spin rounded-full h-20 w-20 border-b-2 border-green-600 mx-auto"></div>';

                    // Fetch ticket details
                    fetch(`/tickets/${ticketId}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            const ticket = data.ticket;

                            // Update modal content
                            document.getElementById('modal-ticket-type').textContent = ticket.ticket_type;
                            document.getElementById('modal-purchase-date').textContent = new Date(ticket.purchase_date).toLocaleDateString('id-ID', {
                                weekday: 'long',
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            });
                            document.getElementById('modal-quantity').textContent = ticket.quantity + ' tiket';
                            document.getElementById('modal-adult-count').textContent = ticket.adult_count + ' orang';
                            document.getElementById('modal-child-count').textContent = ticket.child_count + ' orang';
                            document.getElementById('modal-points-earned').textContent = '+' + ticket.points_earned.toLocaleString('id-ID') + ' poin';
                            document.getElementById('modal-total-price').textContent = 'Rp ' + ticket.total_price.toLocaleString('id-ID');
                            document.getElementById('modal-barcode').textContent = ticket.barcode;
                            document.getElementById('modal-title').textContent = 'Detail Tiket ' + ticket.ticket_type;

                            // Display QR code
                            document.getElementById('qr-code-container').innerHTML = data.qr_code;

                            // Show/hide scanner based on ticket status
                            const scannerSection = document.getElementById('scanner-section');
                            if (ticket.status === 'aktif') {
                                scannerSection.classList.remove('hidden');
                            } else {
                                scannerSection.classList.add('hidden');
                            }

                            // Show modal
                            modal.classList.remove('hidden');
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            document.getElementById('modal-title').textContent = 'Error Memuat Data';
                            document.getElementById('qr-code-container').innerHTML = '<p class="text-red-500">Gagal memuat data tiket</p>';
                        });
                });
            });

            // Scanner functionality
            document.getElementById('start-scanner').addEventListener('click', function() {
                startScanner();
            });

            document.getElementById('stop-scanner').addEventListener('click', function() {
                stopScanner();
            });

            function startScanner() {
                Html5Qrcode.getCameras().then(devices => {
                    if (devices && devices.length) {
                        const scannerBtn = document.getElementById('start-scanner');
                        const stopScannerBtn = document.getElementById('stop-scanner');

                        scannerBtn.classList.add('hidden');
                        stopScannerBtn.classList.remove('hidden');

                        html5QrCode = new Html5Qrcode("reader");
                        html5QrCode.start(
                            devices[0].id,
                            {
                                fps: 10,
                                qrbox: { width: 250, height: 250 }
                            },
                            qrCodeMessage => {
                                handleScannedCode(qrCodeMessage);
                            },
                            errorMessage => {
                                // Ignore parsing errors
                            }
                        ).catch(err => {
                            console.error('Scanner error:', err);
                            alert('Error starting scanner: ' + err);
                            stopScanner();
                        });
                    } else {
                        alert('Tidak ada kamera yang ditemukan!');
                    }
                }).catch(err => {
                    console.error('Camera error:', err);
                    alert('Error accessing camera: ' + err);
                });
            }

            function stopScanner() {
                if (html5QrCode) {
                    html5QrCode.stop().then(() => {
                        html5QrCode.clear();
                        html5QrCode = null;

                        const scannerBtn = document.getElementById('start-scanner');
                        const stopScannerBtn = document.getElementById('stop-scanner');

                        scannerBtn.classList.remove('hidden');
                        stopScannerBtn.classList.add('hidden');
                    }).catch(err => {
                        console.error('Stop scanner error:', err);
                    });
                }
            }

            function handleScannedCode(scannedData) {
                try {
                    const qrData = JSON.parse(scannedData);

                    // Send scan request to server
                    fetch(`/tickets/scan/${qrData.barcode}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('✅ ' + data.message);
                            stopScanner();
                            document.getElementById('ticket-modal').classList.add('hidden');

                            // Reload page to update status
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);
                        } else {
                            alert('❌ ' + data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Scan request error:', error);
                        alert('Error validating ticket');
                    });
                } catch (error) {
                    console.error('QR code parsing error:', error);
                    alert('❌ QR code tidak valid!');
                }
            }

            // Close modal
            document.getElementById('ok-btn').addEventListener('click', function() {
                stopScanner();
                document.getElementById('ticket-modal').classList.add('hidden');
            });

            // Close modal when clicking outside
            window.addEventListener('click', function(event) {
                const modal = document.getElementById('ticket-modal');
                if (event.target === modal) {
                    stopScanner();
                    modal.classList.add('hidden');
                }
            });
        }
    </script>
</x-app-layout>
