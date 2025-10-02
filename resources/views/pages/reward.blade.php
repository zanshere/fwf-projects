{{-- resources/views/reward.blade.php --}}
<x-app-layout>
    <!-- Main Reward Wrapper -->
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
            <i data-lucide="gift" class="w-8 h-8 text-yellow-300 opacity-30"></i>
        </div>
        <div class="absolute top-40 right-20 animate-float-delayed pointer-events-none">
            <i data-lucide="star" class="w-6 h-6 text-yellow-300 opacity-30"></i>
        </div>
        <div class="absolute bottom-20 left-20 animate-float pointer-events-none">
            <i data-lucide="sparkles" class="w-6 h-6 text-pink-300 opacity-30"></i>
        </div>

        <!-- Main Content Container -->
        <div class="relative z-10">
            <!-- Reward Content -->
            <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <!-- Header Section -->
                <section class="text-center mb-8 lg:mb-12 gsap-fade-up">
                    <h1 class="text-3xl lg:text-5xl font-black text-white mb-4">
                        <i data-lucide="gift" class="w-8 h-8 lg:w-12 lg:h-12 inline-block mr-3 text-yellow-400"></i>
                        Reward Center
                    </h1>
                    <p class="text-green-200 text-lg lg:text-xl max-w-3xl mx-auto">
                        Tukarkan poin Anda dengan hadiah menarik! Setiap kunjungan dan transaksi memberi Anda poin reward.
                    </p>
                </section>

                <!-- Points Balance Card -->
                <section class="max-w-2xl mx-auto mb-8 lg:mb-12 gsap-scale">
                    <div class="group relative">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-yellow-400/20 to-orange-400/20 rounded-2xl lg:rounded-3xl blur-xl opacity-75 group-hover:opacity-100 transition-opacity">
                        </div>
                        <div
                            class="relative bg-white/95 backdrop-blur-sm rounded-2xl lg:rounded-3xl p-6 lg:p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-white/20">
                            <div class="text-center">
                                <div class="flex items-center justify-center gap-3 mb-4">
                                    <div
                                        class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-full flex items-center justify-center shadow-lg">
                                        <i data-lucide="star" class="w-8 h-8 text-white"></i>
                                    </div>
                                    <div class="text-left">
                                        <p class="text-gray-600 text-sm">Total Poin Anda</p>
                                        <h2 class="text-3xl lg:text-4xl font-black text-gray-800">
                                            {{ number_format(Auth::user()->points ?? 2500) }} Poin
                                        </h2>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-sm">
                                    <i data-lucide="info" class="w-4 h-4 inline mr-1"></i>
                                    Poin akan bertambah setiap kali Anda berkunjung atau melakukan transaksi
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Rewards Grid -->
                <section class="mb-8 lg:mb-12">
                    <h2 class="text-2xl lg:text-3xl font-black text-white mb-6 lg:mb-8 text-center gsap-fade-up">
                        Pilihan Hadiah Menarik
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 lg:gap-6">
                        @php
                            $rewards = [
                                [
                                    'id' => 1,
                                    'name' => 'Tiket Reguler Gratis',
                                    'description' => 'Tiket masuk reguler untuk 1 orang',
                                    'points' => 500,
                                    'icon' => 'ticket',
                                    'color' => 'from-blue-500 to-cyan-500',
                                    'bg_color' => 'from-blue-50 to-cyan-50'
                                ],
                                [
                                    'id' => 2,
                                    'name' => 'Tiket Premium Gratis',
                                    'description' => 'Tiket premium dengan akses lengkap',
                                    'points' => 1000,
                                    'icon' => 'ticket-check',
                                    'color' => 'from-purple-500 to-pink-500',
                                    'bg_color' => 'from-purple-50 to-pink-50'
                                ],
                                [
                                    'id' => 3,
                                    'name' => 'Smart TV 55"',
                                    'description' => 'Smart TV LED 55 inch merek ternama',
                                    'points' => 25000,
                                    'icon' => 'monitor',
                                    'color' => 'from-gray-500 to-blue-500',
                                    'bg_color' => 'from-gray-50 to-blue-50'
                                ],
                                [
                                    'id' => 4,
                                    'name' => 'Handphone Android',
                                    'description' => 'Smartphone Android flagship terbaru',
                                    'points' => 15000,
                                    'icon' => 'smartphone',
                                    'color' => 'from-green-500 to-emerald-500',
                                    'bg_color' => 'from-green-50 to-emerald-50'
                                ],
                                [
                                    'id' => 5,
                                    'name' => 'Handphone iPhone',
                                    'description' => 'iPhone series terbaru 128GB',
                                    'points' => 30000,
                                    'icon' => 'smartphone',
                                    'color' => 'from-gray-500 to-black',
                                    'bg_color' => 'from-gray-50 to-black-50'
                                ],
                                [
                                    'id' => 6,
                                    'name' => 'Sepeda Gunung',
                                    'description' => 'Sepeda gunung full suspension',
                                    'points' => 8000,
                                    'icon' => 'bike',
                                    'color' => 'from-orange-500 to-red-500',
                                    'bg_color' => 'from-orange-50 to-red-50'
                                ],
                                [
                                    'id' => 7,
                                    'name' => 'Sepeda Listrik',
                                    'description' => 'Sepeda listrik dengan baterai tahan lama',
                                    'points' => 12000,
                                    'icon' => 'bike',
                                    'color' => 'from-teal-500 to-cyan-500',
                                    'bg_color' => 'from-teal-50 to-cyan-50'
                                ],
                                [
                                    'id' => 8,
                                    'name' => 'Mobil City Car',
                                    'description' => 'Mobil city car baru 1000cc',
                                    'points' => 150000,
                                    'icon' => 'car',
                                    'color' => 'from-red-500 to-pink-500',
                                    'bg_color' => 'from-red-50 to-pink-50'
                                ],
                                [
                                    'id' => 9,
                                    'name' => 'Motor Sport',
                                    'description' => 'Motor sport 150cc terbaru',
                                    'points' => 50000,
                                    'icon' => 'motorcycle',
                                    'color' => 'from-blue-500 to-indigo-500',
                                    'bg_color' => 'from-blue-50 to-indigo-50'
                                ],
                                [
                                    'id' => 10,
                                    'name' => 'Mystery Box',
                                    'description' => 'Hadiah misteri dengan nilai hingga 5 juta',
                                    'points' => 5000,
                                    'icon' => 'box',
                                    'color' => 'from-yellow-500 to-orange-500',
                                    'bg_color' => 'from-yellow-50 to-orange-50'
                                ]
                            ];
                            $userPoints = Auth::user()->points ?? 2500;
                        @endphp

                        @foreach($rewards as $index => $reward)
                        <div class="reward-card gsap-scale" data-delay="{{ $index * 0.1 }}">
                            <div class="group relative h-full">
                                <!-- Background Glow -->
                                <div
                                    class="absolute inset-0 bg-gradient-to-r {{ $reward['color'] }}/20 rounded-2xl blur-xl opacity-75 group-hover:opacity-100 transition-opacity">
                                </div>

                                <!-- Main Card -->
                                <div
                                    class="relative bg-white/95 backdrop-blur-sm rounded-2xl p-6 h-full flex flex-col shadow-xl hover:shadow-2xl transition-all duration-300 border border-white/20">
                                    <!-- Icon -->
                                    <div class="text-center mb-4">
                                        <div
                                            class="w-16 h-16 bg-gradient-to-br {{ $reward['color'] }} rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-lg">
                                            <i data-lucide="{{ $reward['icon'] }}" class="w-8 h-8 text-white"></i>
                                        </div>
                                        <h3 class="font-black text-gray-800 text-lg mb-2">{{ $reward['name'] }}</h3>
                                        <p class="text-gray-600 text-sm">{{ $reward['description'] }}</p>
                                    </div>

                                    <!-- Points Required -->
                                    <div class="mt-auto">
                                        <div class="flex items-center justify-between mb-4">
                                            <span class="text-gray-600 text-sm">Poin Dibutuhkan:</span>
                                            <span class="font-black text-lg {{ $userPoints >= $reward['points'] ? 'text-green-600' : 'text-red-600' }}">
                                                {{ number_format($reward['points']) }}
                                            </span>
                                        </div>

                                        <!-- Redeem Button -->
                                        @if($userPoints >= $reward['points'])
                                        <form method="POST" action="{{ route('reward.index', $reward['id']) }}" class="redeem-form">
                                            @csrf
                                            <button type="submit"
                                                class="w-full group/btn bg-gradient-to-r {{ $reward['color'] }} text-white font-bold py-3 px-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                                                <span class="flex items-center justify-center gap-2">
                                                    <i data-lucide="gift"
                                                        class="w-4 h-4 group-hover/btn:rotate-12 transition-transform"></i>
                                                    Tukar Sekarang
                                                </span>
                                            </button>
                                        </form>
                                        @else
                                        <button disabled
                                            class="w-full bg-gray-300 text-gray-500 font-bold py-3 px-4 rounded-xl cursor-not-allowed">
                                            <span class="flex items-center justify-center gap-2">
                                                <i data-lucide="lock" class="w-4 h-4"></i>
                                                Poin Tidak Cukup
                                            </span>
                                        </button>
                                        <p class="text-red-500 text-xs text-center mt-2">
                                            Butuh {{ number_format($reward['points'] - $userPoints) }} poin lagi
                                        </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>

                <!-- How It Works Section -->
                <section class="max-w-4xl mx-auto gsap-fade-up">
                    <div class="group relative">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-white/10 to-white/5 rounded-2xl lg:rounded-3xl blur-xl opacity-75">
                        </div>
                        <div
                            class="relative bg-white/95 backdrop-blur-sm rounded-2xl lg:rounded-3xl p-6 lg:p-8 shadow-xl border border-white/20">
                            <h2 class="text-2xl lg:text-3xl font-black text-gray-800 mb-6 text-center">
                                <i data-lucide="help-circle" class="w-6 h-6 lg:w-8 lg:h-8 inline-block mr-2 text-green-600"></i>
                                Cara Menukarkan Poin
                            </h2>

                            <div class="grid md:grid-cols-3 gap-6 lg:gap-8">
                                <div class="text-center">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-3">
                                        <i data-lucide="star" class="w-6 h-6 text-white"></i>
                                    </div>
                                    <h3 class="font-bold text-gray-800 mb-2">1. Kumpulkan Poin</h3>
                                    <p class="text-gray-600 text-sm">Kunjungi Fajar World dan lakukan transaksi untuk mendapatkan poin</p>
                                </div>

                                <div class="text-center">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-3">
                                        <i data-lucide="gift" class="w-6 h-6 text-white"></i>
                                    </div>
                                    <h3 class="font-bold text-gray-800 mb-2">2. Pilih Hadiah</h3>
                                    <p class="text-gray-600 text-sm">Pilih hadiah yang ingin Anda tukar dengan poin</p>
                                </div>

                                <div class="text-center">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-3">
                                        <i data-lucide="package" class="w-6 h-6 text-white"></i>
                                    </div>
                                    <h3 class="font-bold text-gray-800 mb-2">3. Terima Hadiah</h3>
                                    <p class="text-gray-600 text-sm">Tukarkan poin dan terima hadiah Anda di lokasi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <!-- Enhanced Styles -->
    <style>
        /* Custom animations matching dashboard */
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

        /* GSAP animation classes */
        .gsap-fade-up {
            opacity: 0;
            transform: translateY(30px);
        }

        .gsap-fade-left {
            opacity: 0;
            transform: translateX(-30px);
        }

        .gsap-scale {
            opacity: 0;
            transform: scale(0.95);
        }

        /* Reward card specific styles */
        .reward-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .reward-card:hover {
            transform: translateY(-5px);
        }

        /* Button animations */
        .redeem-form button:not(:disabled):hover {
            transform: translateY(-2px);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(34, 197, 94, 0.1);
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(34, 197, 94, 0.3);
            border-radius: 4px;
        }
    </style>

    <!-- Enhanced JavaScript with GSAP -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Lucide icons
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }

            // Initialize animations
            initRewardAnimations();
            initInteractiveElements();
        });

        function initRewardAnimations() {
            // Header animation
            gsap.to('.gsap-fade-up', {
                opacity: 1,
                y: 0,
                duration: 1,
                ease: "power2.out"
            });

            // Points balance card animation
            gsap.to('.gsap-scale', {
                opacity: 1,
                scale: 1,
                duration: 0.8,
                ease: "back.out(1.4)"
            });

            // Reward cards staggered animation
            const rewardCards = document.querySelectorAll('.reward-card');
            rewardCards.forEach((card, index) => {
                const delay = parseFloat(card.dataset.delay) || index * 0.1;

                gsap.to(card, {
                    opacity: 1,
                    scale: 1,
                    duration: 0.6,
                    delay: delay,
                    ease: "power2.out"
                });
            });
        }

        function initInteractiveElements() {
            // Reward card hover effects
            document.querySelectorAll('.reward-card').forEach(card => {
                card.addEventListener('mouseenter', () => {
                    gsap.to(card, {
                        y: -5,
                        scale: 1.02,
                        duration: 0.3,
                        ease: "power2.out"
                    });
                });

                card.addEventListener('mouseleave', () => {
                    gsap.to(card, {
                        y: 0,
                        scale: 1,
                        duration: 0.3,
                        ease: "power2.out"
                    });
                });
            });

            // Redeem button animations
            document.querySelectorAll('.redeem-form button').forEach(button => {
                button.addEventListener('mouseenter', () => {
                    const icon = button.querySelector('i');
                    if (icon) {
                        gsap.to(icon, {
                            rotation: 12,
                            duration: 0.3,
                            ease: "power2.out"
                        });
                    }
                });

                button.addEventListener('mouseleave', () => {
                    const icon = button.querySelector('i');
                    if (icon) {
                        gsap.to(icon, {
                            rotation: 0,
                            duration: 0.3,
                            ease: "power2.out"
                        });
                    }
                });

                button.addEventListener('click', function(e) {
                    const form = this.closest('form');
                    const rewardName = this.closest('.reward-card').querySelector('h3').textContent;

                    // Add loading animation
                    gsap.to(this, {
                        scale: 0.95,
                        duration: 0.1,
                        yoyo: true,
                        repeat: 1,
                        onComplete: () => {
                            // Show confirmation (you can replace this with actual form submission)
                            showRedeemConfirmation(rewardName);
                        }
                    });

                    // Prevent actual form submission for demo (remove this in production)
                    e.preventDefault();
                });
            });

            // Points counter animation
            const pointsElement = document.querySelector('h2.text-3xl');
            if (pointsElement) {
                const currentPoints = parseInt(pointsElement.textContent.replace(/[^0-9]/g, ''));

                gsap.from({
                    value: 0
                }, {
                    value: currentPoints,
                    duration: 2,
                    delay: 0.5,
                    ease: "power2.out",
                    onUpdate: function() {
                        pointsElement.textContent = Math.round(this.targets()[0].value).toLocaleString() + ' Poin';
                    }
                });
            }
        }

        function showRedeemConfirmation(rewardName) {
            // Create confirmation modal
            const modal = document.createElement('div');
            modal.className = 'fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm';
            modal.innerHTML = `
                <div class="bg-white/95 backdrop-blur-sm rounded-2xl p-6 lg:p-8 max-w-md mx-4 shadow-2xl border border-white/20">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i data-lucide="check-circle" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-black text-gray-800 mb-2">Konfirmasi Penukaran</h3>
                        <p class="text-gray-600">Anda akan menukarkan poin untuk:</p>
                        <p class="font-bold text-lg text-green-600">${rewardName}</p>
                    </div>
                    <div class="flex gap-4">
                        <button onclick="this.closest('.fixed').remove()"
                                class="flex-1 bg-gray-300 text-gray-700 font-bold py-3 rounded-xl transition-all duration-300 hover:bg-gray-400">
                            Batal
                        </button>
                        <button onclick="processRedeem(this)"
                                class="flex-1 bg-gradient-to-r from-green-500 to-emerald-500 text-white font-bold py-3 rounded-xl transition-all duration-300 hover:from-green-600 hover:to-emerald-600">
                            Konfirmasi
                        </button>
                    </div>
                </div>
            `;

            document.body.appendChild(modal);

            // Reinitialize icons
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }

            // Animate in
            gsap.from(modal, {
                opacity: 0,
                scale: 0.8,
                duration: 0.3,
                ease: "back.out(1.7)"
            });
        }

        function processRedeem(button) {
            // Show loading state
            const originalText = button.textContent;
            button.innerHTML = '<i data-lucide="loader" class="w-4 h-4 animate-spin mx-auto"></i>';
            button.disabled = true;

            // Simulate API call
            setTimeout(() => {
                // Show success message
                const modal = button.closest('.fixed');
                modal.innerHTML = `
                    <div class="bg-white/95 backdrop-blur-sm rounded-2xl p-6 lg:p-8 max-w-md mx-4 shadow-2xl border border-white/20 text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i data-lucide="party-popper" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-black text-gray-800 mb-2">Penukaran Berhasil!</h3>
                        <p class="text-gray-600 mb-4">Hadiah Anda akan segera diproses. Silakan ambil di customer service.</p>
                        <button onclick="this.closest('.fixed').remove()"
                                class="w-full bg-gradient-to-r from-green-500 to-emerald-500 text-white font-bold py-3 rounded-xl transition-all duration-300 hover:from-green-600 hover:to-emerald-600">
                            Tutup
                        </button>
                    </div>
                `;

                // Reinitialize icons
                if (typeof lucide !== 'undefined') {
                    lucide.createIcons();
                }
            }, 2000);
        }

        // Make functions available globally
        window.showRedeemConfirmation = showRedeemConfirmation;
        window.processRedeem = processRedeem;
    </script>
</x-app-layout>
