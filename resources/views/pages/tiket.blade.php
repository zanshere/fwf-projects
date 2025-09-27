<!-- File: resources/views/pages/tiket.blade.php -->
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
            <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <!-- Header Section -->
                <section class="mb-8 text-center">
                    <h1 class="text-3xl lg:text-4xl font-black text-white mb-2">Pesan Tiket Fajar World</h1>
                    <p class="text-green-200">Nikmati pengalaman adventure yang tak terlupakan</p>
                </section>

                <!-- Pricing Cards -->
                <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Reguler Card -->
                    <div class="group relative gsap-scale">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400/20 to-cyan-400/20 rounded-2xl blur-xl opacity-75"></div>
                        <div class="relative bg-white/95 backdrop-blur-sm rounded-2xl p-6 shadow-xl border border-white/20">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center">
                                    <i data-lucide="user" class="w-6 h-6 text-white"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-1">Reguler</h3>
                            <p class="text-gray-600 text-sm">Paket standar untuk semua usia</p>
                            <p class="text-2xl font-black text-green-600 mt-4">Rp 1.500.000</p>
                            <p class="text-sm text-yellow-600 mt-2">+10 poin/tiket</p>
                        </div>
                    </div>

                    <!-- Premium Card -->
                    <div class="group relative gsap-scale">
                        <div class="absolute inset-0 bg-gradient-to-r from-yellow-400/20 to-amber-400/20 rounded-2xl blur-xl opacity-75"></div>
                        <div class="relative bg-white/95 backdrop-blur-sm rounded-2xl p-6 shadow-xl border border-white/20">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-amber-500 rounded-xl flex items-center justify-center">
                                    <i data-lucide="crown" class="w-6 h-6 text-white"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-1">Premium</h3>
                            <p class="text-gray-600 text-sm">Pengalaman premium dengan fasilitas terbaik</p>
                            <p class="text-2xl font-black text-green-600 mt-4">Rp 2.000.000</p>
                            <p class="text-sm text-yellow-600 mt-2">+25 poin/tiket</p>
                        </div>
                    </div>

                    <!-- Khusus Card -->
                    <div class="group relative gsap-scale">
                        <div class="absolute inset-0 bg-gradient-to-r from-purple-400/20 to-pink-400/20 rounded-2xl blur-xl opacity-75"></div>
                        <div class="relative bg-white/95 backdrop-blur-sm rounded-2xl p-6 shadow-xl border border-white/20">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                                    <i data-lucide="users" class="w-6 h-6 text-white"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-1">Khusus</h3>
                            <p class="text-gray-600 text-sm">Paket custom untuk rombongan</p>
                            <p class="text-2xl font-black text-green-600 mt-4">Hubungi Admin</p>
                            <p class="text-sm text-gray-600 mt-2">Poin custom</p>
                        </div>
                    </div>
                </section>

                <!-- Booking Form -->
                <section class="group relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-white/10 to-white/5 rounded-2xl blur-xl opacity-75"></div>
                    <div class="relative bg-white/95 backdrop-blur-sm rounded-2xl p-6 lg:p-8 shadow-xl border border-white/20">
                        <h2 class="text-2xl font-black text-gray-800 mb-6 text-center flex items-center justify-center gap-3">
                            <i data-lucide="ticket" class="w-6 h-6 text-green-600"></i>
                            Form Pemesanan Tiket
                        </h2>

                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center">
                                <i data-lucide="check-circle" class="w-5 h-5 mr-2"></i>
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                                <div class="flex items-center">
                                    <i data-lucide="alert-circle" class="w-5 h-5 mr-2"></i>
                                    <span class="font-semibold">Terjadi kesalahan:</span>
                                </div>
                                <ul class="list-disc pl-5 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li class="text-sm">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('tickets.store') }}" method="POST" id="ticket-form" enctype="multipart/form-data">
                            @csrf

                            <!-- User Info Section -->
                            @auth
                                <div class="mb-6 p-4 bg-blue-50 rounded-lg">
                                    <h3 class="font-semibold text-blue-800 mb-2 flex items-center">
                                        <i data-lucide="user-check" class="w-4 h-4 mr-2"></i>
                                        Informasi Pemesan (Logged In)
                                    </h3>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm">
                                        <div>
                                            <span class="text-blue-600">Nama:</span>
                                            <span class="font-medium">{{ auth()->user()->name }}</span>
                                        </div>
                                        <div>
                                            <span class="text-blue-600">Email:</span>
                                            <span class="font-medium">{{ auth()->user()->email }}</span>
                                        </div>
                                        <div>
                                            <span class="text-blue-600">Member Level:</span>
                                            <span class="font-medium">{{ auth()->user()->member_level ?? 'Bronze' }}</span>
                                        </div>
                                        <div>
                                            <span class="text-blue-600">Poin Saat Ini:</span>
                                            <span class="font-medium">{{ number_format(auth()->user()->points ?? 0) }} poin</span>
                                        </div>
                                    </div>
                                    <p class="text-xs text-blue-600 mt-2">
                                        <i data-lucide="info" class="w-3 h-3 inline mr-1"></i>
                                        Poin akan ditambahkan setelah tiket dikonfirmasi admin.
                                    </p>
                                </div>
                            @else
                                <!-- Guest Info Section -->
                                <div class="mb-6 p-4 bg-yellow-50 rounded-lg">
                                    <h3 class="font-semibold text-yellow-800 mb-2 flex items-center">
                                        <i data-lucide="user" class="w-4 h-4 mr-2"></i>
                                        Informasi Pemesan (Tamu)
                                    </h3>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                            <input type="text" name="nama" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required value="{{ old('nama') }}">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                            <input type="email" name="email" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    <div class="bg-yellow-100 border border-yellow-400 text-yellow-800 px-3 py-2 rounded mt-3">
                                        <p class="text-xs flex items-center">
                                            <i data-lucide="alert-triangle" class="w-3 h-3 mr-1"></i>
                                            <strong>Perhatian:</strong> Pemesanan sebagai tamu tidak akan mendapatkan poin reward meskipun login/daftar setelah transaksi.
                                        </p>
                                    </div>
                                </div>
                            @endauth

                            <!-- Ticket Details -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                                        <i data-lucide="ticket" class="w-4 h-4 mr-2"></i>
                                        Jenis Tiket
                                    </label>
                                    <select name="ticket_type" id="ticket_type" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                                        <option value="">Pilih Jenis Tiket</option>
                                        <option value="Reguler" {{ old('ticket_type') == 'Reguler' ? 'selected' : '' }}>Reguler - Rp 1.500.000</option>
                                        <option value="Premium" {{ old('ticket_type') == 'Premium' ? 'selected' : '' }}>Premium - Rp 2.000.000</option>
                                        <option value="Khusus" {{ old('ticket_type') == 'Khusus' ? 'selected' : '' }}>Khusus - Hubungi Admin</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                                        <i data-lucide="calendar" class="w-4 h-4 mr-2"></i>
                                        Tanggal Kunjungan
                                    </label>
                                    <input type="date" name="purchase_date" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required value="{{ old('purchase_date') }}" min="{{ date('Y-m-d') }}">
                                </div>
                            </div>

                            <!-- Passenger Count -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Jumlah Tiket
                                    </label>
                                    <input type="number" name="quantity" id="quantity" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" min="1" max="10" required value="{{ old('quantity', 1) }}">
                                    <p class="text-xs text-gray-500 mt-1">Maksimal 10 tiket per pemesanan</p>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Jumlah Dewasa
                                    </label>
                                    <input type="number" name="adult_count" id="adult_count" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" min="0" required value="{{ old('adult_count', 1) }}">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Jumlah Anak (≤ 10 tahun)
                                    </label>
                                    <input type="number" name="child_count" id="child_count" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" min="0" required value="{{ old('child_count', 0) }}">
                                    <p class="text-xs text-gray-500 mt-1">Anak usia 10 tahun ke bawah</p>
                                </div>
                            </div>

                            <!-- File Upload -->
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                                    <i data-lucide="file" class="w-4 h-4 mr-2"></i>
                                    Bukti Dokumen (Opsional)
                                </label>
                                <input type="file" name="detail_file" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, PDF (maks. 2MB)</p>
                            </div>

                            <!-- Order Summary -->
                            <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                                <h3 class="font-semibold mb-3 flex items-center">
                                    <i data-lucide="receipt" class="w-4 h-4 mr-2"></i>
                                    Ringkasan Pemesanan
                                </h3>

                                <div class="space-y-2">
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Jenis Tiket:</span>
                                        <span id="summary-ticket-type" class="font-medium">-</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Harga per Tiket:</span>
                                        <span id="summary-price-per-ticket" class="font-medium">Rp 0</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Jumlah Tiket:</span>
                                        <span id="summary-quantity" class="font-medium">0</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Dewasa:</span>
                                        <span id="summary-adults" class="font-medium">0</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Anak:</span>
                                        <span id="summary-children" class="font-medium">0</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Poin yang Didapat:</span>
                                        <span id="summary-points" class="font-medium text-yellow-600">0 poin</span>
                                    </div>
                                    <div class="border-t pt-2 mt-2">
                                        <div class="flex justify-between items-center font-bold text-lg">
                                            <span>Total Harga:</span>
                                            <span id="summary-total-price" class="text-green-600">Rp 0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg w-full transition-all duration-300 transform hover:scale-105 flex items-center justify-center">
                                <i data-lucide="shopping-cart" class="w-5 h-5 mr-2"></i>
                                Pesan Tiket Sekarang
                            </button>

                            <p class="text-xs text-gray-500 text-center mt-4">
                                <i data-lucide="info" class="w-3 h-3 inline mr-1"></i>
                                Tiket akan berstatus "Menunggu Konfirmasi" hingga dikonfirmasi oleh admin.
                            </p>
                        </form>
                    </div>
                </section>
            </main>
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
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Lucide icons
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }

            // Form elements
            const ticketTypeSelect = document.getElementById('ticket_type');
            const quantityInput = document.getElementById('quantity');
            const adultCountInput = document.getElementById('adult_count');
            const childCountInput = document.getElementById('child_count');

            // Summary elements
            const summaryTicketType = document.getElementById('summary-ticket-type');
            const summaryPricePerTicket = document.getElementById('summary-price-per-ticket');
            const summaryQuantity = document.getElementById('summary-quantity');
            const summaryAdults = document.getElementById('summary-adults');
            const summaryChildren = document.getElementById('summary-children');
            const summaryPoints = document.getElementById('summary-points');
            const summaryTotalPrice = document.getElementById('summary-total-price');

            // Price and points mapping
            const priceMap = {
                'Reguler': 1500000,
                'Premium': 2000000,
                'Khusus': 0
            };

            const pointsMap = {
                'Reguler': 10,
                'Premium': 25,
                'Khusus': 0
            };

            const ticketLabels = {
                'Reguler': 'Reguler',
                'Premium': 'Premium',
                'Khusus': 'Khusus'
            };

            // Calculate and update summary
            function updateSummary() {
                const ticketType = ticketTypeSelect.value;
                const quantity = parseInt(quantityInput.value) || 0;
                const adults = parseInt(adultCountInput.value) || 0;
                const children = parseInt(childCountInput.value) || 0;
                const pricePerTicket = priceMap[ticketType] || 0;
                const pointsPerTicket = pointsMap[ticketType] || 0;
                const isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};

                // Update summary display
                if (ticketType) {
                    summaryTicketType.textContent = ticketLabels[ticketType];
                    summaryQuantity.textContent = quantity + ' tiket';
                    summaryAdults.textContent = adults + ' orang';
                    summaryChildren.textContent = children + ' orang';

                    if (pricePerTicket > 0) {
                        summaryPricePerTicket.textContent = 'Rp ' + pricePerTicket.toLocaleString('id-ID');
                        const totalPrice = pricePerTicket * quantity;
                        summaryTotalPrice.textContent = 'Rp ' + totalPrice.toLocaleString('id-ID');

                        const totalPoints = isAuthenticated ? pointsPerTicket * quantity : 0;
                        summaryPoints.textContent = '+' + totalPoints.toLocaleString('id-ID') + ' poin';
                        summaryPoints.className = 'font-medium ' + (isAuthenticated ? 'text-yellow-600' : 'text-gray-500');
                    } else {
                        summaryPricePerTicket.textContent = 'Hubungi Admin';
                        summaryTotalPrice.textContent = 'Hubungi Admin';
                        summaryPoints.textContent = 'Poin custom';
                        summaryPoints.className = 'font-medium text-gray-500';
                    }
                } else {
                    summaryTicketType.textContent = '-';
                    summaryPricePerTicket.textContent = 'Rp 0';
                    summaryQuantity.textContent = '0';
                    summaryAdults.textContent = '0';
                    summaryChildren.textContent = '0';
                    summaryTotalPrice.textContent = 'Rp 0';
                    summaryPoints.textContent = '0 poin';
                    summaryPoints.className = 'font-medium text-yellow-600';
                }
            }

            // Validate quantity vs passenger count
            function validatePassengerCount() {
                const quantity = parseInt(quantityInput.value) || 0;
                const adults = parseInt(adultCountInput.value) || 0;
                const children = parseInt(childCountInput.value) || 0;
                const totalPassengers = adults + children;

                if (totalPassengers > quantity) {
                    alert('Jumlah penumpang (dewasa + anak) tidak boleh melebihi jumlah tiket!');
                    adultCountInput.value = Math.min(adults, quantity);
                    childCountInput.value = Math.min(children, quantity - adults);
                }
            }

            // Event listeners
            ticketTypeSelect.addEventListener('change', updateSummary);
            quantityInput.addEventListener('input', updateSummary);
            adultCountInput.addEventListener('input', function() {
                validatePassengerCount();
                updateSummary();
            });
            childCountInput.addEventListener('input', function() {
                validatePassengerCount();
                updateSummary();
            });

            // Form validation
            document.getElementById('ticket-form').addEventListener('submit', function(e) {
                const ticketType = ticketTypeSelect.value;
                const quantity = parseInt(quantityInput.value) || 0;
                const adults = parseInt(adultCountInput.value) || 0;
                const children = parseInt(childCountInput.value) || 0;
                const purchaseDate = document.querySelector('input[name="purchase_date"]').value;

                if (!ticketType) {
                    e.preventDefault();
                    alert('Silakan pilih jenis tiket');
                    ticketTypeSelect.focus();
                    return;
                }

                if (quantity < 1 || quantity > 10) {
                    e.preventDefault();
                    alert('Jumlah tiket harus antara 1 sampai 10');
                    quantityInput.focus();
                    return;
                }

                if (adults + children > quantity) {
                    e.preventDefault();
                    alert('Jumlah penumpang (dewasa + anak) tidak boleh melebihi jumlah tiket!');
                    return;
                }

                if (!purchaseDate) {
                    e.preventDefault();
                    alert('Silakan pilih tanggal kunjungan');
                    return;
                }

                if (ticketType === 'Khusus') {
                    e.preventDefault();
                    alert('Untuk pemesanan tiket khusus/rombongan, silakan hubungi admin kami melalui Customer Service');
                    return;
                }

                // Show loading state
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i data-lucide="loader" class="w-5 h-5 mr-2 animate-spin"></i>Memproses...';
                submitBtn.disabled = true;

                // Re-enable button after 5 seconds if still processing
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 5000);
            });

            // Initial summary update
            updateSummary();

            // GSAP animations
            if (typeof gsap !== 'undefined') {
                gsap.to('.gsap-scale', {
                    opacity: 1,
                    scale: 1,
                    duration: 0.8,
                    stagger: 0.2,
                    delay: 0.3,
                    ease: "back.out(1.4)"
                });
            }
        });
    </script>
</x-app-layout>
