<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-green-800 via-green-600 to-green-900 relative overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="parallax-element absolute top-20 left-10 w-32 h-32 bg-green-400 rounded-full opacity-10 blur-3xl floating-element"></div>
            <div class="parallax-element absolute top-40 right-20 w-24 h-24 bg-yellow-400 rounded-full opacity-10 blur-2xl floating-element"></div>
            <div class="parallax-element absolute bottom-20 left-20 w-40 h-40 bg-orange-400 rounded-full opacity-10 blur-3xl floating-element"></div>
            <div class="parallax-element absolute bottom-40 right-10 w-28 h-28 bg-pink-400 rounded-full opacity-10 blur-2xl floating-element"></div>
            <div class="parallax-element absolute top-1/2 left-1/4 w-36 h-36 bg-blue-400 rounded-full opacity-8 blur-3xl floating-element"></div>
        </div>

        <!-- Nature Icons Floating -->
        <div class="floating-element absolute top-20 left-10">
            <i data-lucide="leaf" class="w-8 h-8 text-green-300 opacity-30"></i>
        </div>
        <div class="floating-element absolute top-40 right-20">
            <i data-lucide="bird" class="w-6 h-6 text-yellow-300 opacity-30"></i>
        </div>
        <div class="floating-element absolute bottom-20 left-20">
            <i data-lucide="flower" class="w-6 h-6 text-pink-300 opacity-30"></i>
        </div>
        <div class="floating-element absolute bottom-40 right-16">
            <i data-lucide="tree-pine" class="w-7 h-7 text-green-300 opacity-30"></i>
        </div>

        <div class="relative z-10">
            <!-- Header Section -->
            <div class="bg-white/10 backdrop-blur-sm border-b border-white/20">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center py-6">
                        <!-- Welcome Section -->
                        <div class="flex items-center gap-4 gsap-fade-right">
                            <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center shadow-xl">
                                <i data-lucide="compass" class="w-8 h-8 text-green-900"></i>
                            </div>
                            <div>
                                <h1 class="text-2xl font-black text-white">
                                    Selamat Datang, <span class="text-yellow-300">{{ Auth::user()->name }}!</span>
                                </h1>
                                <p class="text-green-200">Siap untuk petualangan hari ini?</p>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="flex items-center gap-4 gsap-fade-left">
                            <button class="group relative overflow-hidden bg-white/10 backdrop-blur-sm border border-white/20 text-white px-4 py-2 rounded-xl hover:bg-white/20 transition-all duration-300">
                                <span class="relative z-10 flex items-center gap-2">
                                    <i data-lucide="bell" class="w-4 h-4 group-hover:rotate-12 transition-transform"></i>
                                    Notifikasi
                                </span>
                            </button>
                            <button class="group relative overflow-hidden bg-yellow-400/20 backdrop-blur-sm border border-yellow-400/30 text-yellow-300 px-4 py-2 rounded-xl hover:bg-yellow-400 hover:text-green-900 transition-all duration-300">
                                <span class="relative z-10 flex items-center gap-2">
                                    <i data-lucide="ticket" class="w-4 h-4 group-hover:rotate-12 transition-transform"></i>
                                    Beli Tiket
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Dashboard Content -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Kunjungan Card -->
                    <div class="group relative gsap-scale">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400/20 to-cyan-400/20 rounded-3xl blur-xl opacity-75 group-hover:opacity-100 transition-opacity"></div>
                        <div class="relative bg-white/95 backdrop-blur-sm rounded-3xl p-6 shadow-xl hover:shadow-2xl transition-all duration-300 border border-white/20">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center">
                                    <i data-lucide="map-pin" class="w-6 h-6 text-white"></i>
                                </div>
                                <span class="text-xs font-medium text-blue-600 bg-blue-100 px-2 py-1 rounded-full">Total</span>
                            </div>
                            <h3 class="text-2xl font-black text-gray-800 mb-1">5</h3>
                            <p class="text-gray-600 text-sm">Kunjungan</p>
                        </div>
                    </div>

                    <!-- Poin Reward Card -->
                    <div class="group relative gsap-scale">
                        <div class="absolute inset-0 bg-gradient-to-r from-yellow-400/20 to-orange-400/20 rounded-3xl blur-xl opacity-75 group-hover:opacity-100 transition-opacity"></div>
                        <div class="relative bg-white/95 backdrop-blur-sm rounded-3xl p-6 shadow-xl hover:shadow-2xl transition-all duration-300 border border-white/20">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center">
                                    <i data-lucide="star" class="w-6 h-6 text-white"></i>
                                </div>
                                <span class="text-xs font-medium text-yellow-600 bg-yellow-100 px-2 py-1 rounded-full">Aktif</span>
                            </div>
                            <h3 class="text-2xl font-black text-gray-800 mb-1">2,450</h3>
                            <p class="text-gray-600 text-sm">Poin Reward</p>
                        </div>
                    </div>

                    <!-- Tiket Card -->
                    <div class="group relative gsap-scale">
                        <div class="absolute inset-0 bg-gradient-to-r from-green-400/20 to-emerald-400/20 rounded-3xl blur-xl opacity-75 group-hover:opacity-100 transition-opacity"></div>
                        <div class="relative bg-white/95 backdrop-blur-sm rounded-3xl p-6 shadow-xl hover:shadow-2xl transition-all duration-300 border border-white/20">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center">
                                    <i data-lucide="ticket" class="w-6 h-6 text-white"></i>
                                </div>
                                <span class="text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded-full">Tersedia</span>
                            </div>
                            <h3 class="text-2xl font-black text-gray-800 mb-1">3</h3>
                            <p class="text-gray-600 text-sm">Tiket Aktif</p>
                        </div>
                    </div>

                    <!-- Member Level Card -->
                    <div class="group relative gsap-scale">
                        <div class="absolute inset-0 bg-gradient-to-r from-purple-400/20 to-pink-400/20 rounded-3xl blur-xl opacity-75 group-hover:opacity-100 transition-opacity"></div>
                        <div class="relative bg-white/95 backdrop-blur-sm rounded-3xl p-6 shadow-xl hover:shadow-2xl transition-all duration-300 border border-white/20">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                                    <i data-lucide="crown" class="w-6 h-6 text-white"></i>
                                </div>
                                <span class="text-xs font-medium text-purple-600 bg-purple-100 px-2 py-1 rounded-full">Gold</span>
                            </div>
                            <h3 class="text-2xl font-black text-gray-800 mb-1">Gold</h3>
                            <p class="text-gray-600 text-sm">Member Level</p>
                        </div>
                    </div>
                </div>

                <div class="grid lg:grid-cols-3 gap-8">
                    <!-- Left Column -->
                    <div class="lg:col-span-2 space-y-8">
                        <!-- Recent Activities -->
                        <div class="group relative gsap-fade-up">
                            <div class="absolute inset-0 bg-gradient-to-r from-white/10 to-white/5 rounded-3xl blur-xl opacity-75"></div>
                            <div class="relative bg-white/95 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/20">
                                <div class="flex items-center justify-between mb-6">
                                    <h2 class="text-2xl font-black text-gray-800 flex items-center gap-3">
                                        <i data-lucide="activity" class="w-6 h-6 text-green-600"></i>
                                        Aktivitas Terbaru
                                    </h2>
                                    <button class="text-green-600 hover:text-green-800 font-medium text-sm">Lihat Semua</button>
                                </div>

                                <div class="space-y-4">
                                    <!-- Activity Item 1 -->
                                    <div class="flex items-start gap-4 p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-2xl hover:shadow-lg transition-all duration-300">
                                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-full flex items-center justify-center flex-shrink-0">
                                            <i data-lucide="map-pin" class="w-6 h-6 text-white"></i>
                                        </div>
                                        <div class="flex-1">
                                            <h3 class="font-bold text-gray-800">Kunjungan ke Fajar World</h3>
                                            <p class="text-gray-600 text-sm">Anda mengunjungi Wildlife Photography area</p>
                                            <p class="text-green-600 text-xs mt-1">2 hari yang lalu</p>
                                        </div>
                                        <div class="text-green-600 font-bold">+50 poin</div>
                                    </div>

                                    <!-- Activity Item 2 -->
                                    <div class="flex items-start gap-4 p-4 bg-gradient-to-r from-yellow-50 to-orange-50 rounded-2xl hover:shadow-lg transition-all duration-300">
                                        <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-full flex items-center justify-center flex-shrink-0">
                                            <i data-lucide="gift" class="w-6 h-6 text-white"></i>
                                        </div>
                                        <div class="flex-1">
                                            <h3 class="font-bold text-gray-800">Reward Claim</h3>
                                            <p class="text-gray-600 text-sm">Anda menukar 1000 poin dengan merchandise</p>
                                            <p class="text-orange-600 text-xs mt-1">1 minggu yang lalu</p>
                                        </div>
                                        <div class="text-orange-600 font-bold">-1000 poin</div>
                                    </div>

                                    <!-- Activity Item 3 -->
                                    <div class="flex items-start gap-4 p-4 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-2xl hover:shadow-lg transition-all duration-300">
                                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-full flex items-center justify-center flex-shrink-0">
                                            <i data-lucide="ticket" class="w-6 h-6 text-white"></i>
                                        </div>
                                        <div class="flex-1">
                                            <h3 class="font-bold text-gray-800">Pembelian Tiket</h3>
                                            <p class="text-gray-600 text-sm">Tiket Premium untuk 2 orang</p>
                                            <p class="text-blue-600 text-xs mt-1">2 minggu yang lalu</p>
                                        </div>
                                        <div class="text-blue-600 font-bold">+100 poin</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Upcoming Events -->
                        <div class="group relative gsap-fade-up">
                            <div class="absolute inset-0 bg-gradient-to-r from-white/10 to-white/5 rounded-3xl blur-xl opacity-75"></div>
                            <div class="relative bg-white/95 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/20">
                                <div class="flex items-center justify-between mb-6">
                                    <h2 class="text-2xl font-black text-gray-800 flex items-center gap-3">
                                        <i data-lucide="calendar" class="w-6 h-6 text-purple-600"></i>
                                        Event Mendatang
                                    </h2>
                                </div>

                                <div class="grid md:grid-cols-2 gap-4">
                                    <!-- Event 1 -->
                                    <div class="bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl p-6 text-white hover:shadow-xl transition-all duration-300 cursor-pointer group/event">
                                        <div class="flex items-center gap-3 mb-4">
                                            <i data-lucide="camera" class="w-8 h-8 group-hover/event:rotate-12 transition-transform"></i>
                                            <div>
                                                <h3 class="font-bold">Wildlife Photography Workshop</h3>
                                                <p class="text-purple-100 text-sm">15 Februari 2025</p>
                                            </div>
                                        </div>
                                        <p class="text-purple-100 text-sm mb-4">Belajar fotografi satwa langsung dari ahlinya</p>
                                        <div class="flex justify-between items-center">
                                            <span class="text-xs bg-white/20 px-2 py-1 rounded-full">Terbatas</span>
                                            <span class="text-sm font-bold">Rp 150.000</span>
                                        </div>
                                    </div>

                                    <!-- Event 2 -->
                                    <div class="bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl p-6 text-white hover:shadow-xl transition-all duration-300 cursor-pointer group/event">
                                        <div class="flex items-center gap-3 mb-4">
                                            <i data-lucide="sunrise" class="w-8 h-8 group-hover/event:rotate-12 transition-transform"></i>
                                            <div>
                                                <h3 class="font-bold">Sunrise Adventure</h3>
                                                <p class="text-green-100 text-sm">20 Februari 2025</p>
                                            </div>
                                        </div>
                                        <p class="text-green-100 text-sm mb-4">Nikmati keindahan sunrise dengan view terbaik</p>
                                        <div class="flex justify-between items-center">
                                            <span class="text-xs bg-white/20 px-2 py-1 rounded-full">Tersedia</span>
                                            <span class="text-sm font-bold">Rp 75.000</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-8">
                        <!-- Profile Summary -->
                        <div class="group relative gsap-fade-left">
                            <div class="absolute inset-0 bg-gradient-to-r from-white/10 to-white/5 rounded-3xl blur-xl opacity-75"></div>
                            <div class="relative bg-white/95 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/20">
                                <div class="text-center mb-6">
                                    <div class="w-20 h-20 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full mx-auto mb-4 flex items-center justify-center shadow-xl">
                                        <i data-lucide="user" class="w-10 h-10 text-green-900"></i>
                                    </div>
                                    <h3 class="text-xl font-black text-gray-800">{{ Auth::user()->name }}</h3>
                                    <p class="text-gray-600">Gold Member</p>
                                    <div class="flex items-center justify-center gap-1 mt-2">
                                        <i data-lucide="star" class="w-4 h-4 text-yellow-500 fill-current"></i>
                                        <i data-lucide="star" class="w-4 h-4 text-yellow-500 fill-current"></i>
                                        <i data-lucide="star" class="w-4 h-4 text-yellow-500 fill-current"></i>
                                        <i data-lucide="star" class="w-4 h-4 text-yellow-500 fill-current"></i>
                                        <i data-lucide="star" class="w-4 h-4 text-gray-300"></i>
                                    </div>
                                </div>

                                <div class="space-y-4 mb-6">
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Member Sejak</span>
                                        <span class="font-semibold text-gray-800">Jan 2024</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Total Kunjungan</span>
                                        <span class="font-semibold text-gray-800">5 kali</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Poin Lifetime</span>
                                        <span class="font-semibold text-gray-800">3,450 poin</span>
                                    </div>
                                </div>

                                <button class="group relative overflow-hidden w-full bg-gradient-to-r from-green-600 to-emerald-600 text-white font-bold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                                    <span class="relative z-10 flex items-center justify-center gap-2">
                                        <i data-lucide="edit" class="w-4 h-4 group-hover:rotate-12 transition-transform"></i>
                                        Edit Profile
                                    </span>
                                </button>
                            </div>
                        </div>

                        <!-- Quick Links -->
                        <div class="group relative gsap-fade-left">
                            <div class="absolute inset-0 bg-gradient-to-r from-white/10 to-white/5 rounded-3xl blur-xl opacity-75"></div>
                            <div class="relative bg-white/95 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/20">
                                <h3 class="text-xl font-black text-gray-800 mb-6 flex items-center gap-2">
                                    <i data-lucide="zap" class="w-5 h-5 text-yellow-600"></i>
                                    Quick Actions
                                </h3>

                                <div class="space-y-3">
                                    <button class="group w-full flex items-center gap-3 p-4 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl hover:shadow-lg transition-all duration-300">
                                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center">
                                            <i data-lucide="ticket" class="w-5 h-5 text-white group-hover:rotate-12 transition-transform"></i>
                                        </div>
                                        <div class="text-left">
                                            <p class="font-semibold text-gray-800">Beli Tiket</p>
                                            <p class="text-xs text-gray-600">Pesan tiket adventure</p>
                                        </div>
                                    </button>

                                    <button class="group w-full flex items-center gap-3 p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl hover:shadow-lg transition-all duration-300">
                                        <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center">
                                            <i data-lucide="map" class="w-5 h-5 text-white group-hover:rotate-12 transition-transform"></i>
                                        </div>
                                        <div class="text-left">
                                            <p class="font-semibold text-gray-800">Peta Lokasi</p>
                                            <p class="text-xs text-gray-600">Lihat area adventure</p>
                                        </div>
                                    </button>

                                    <button class="group w-full flex items-center gap-3 p-4 bg-gradient-to-r from-yellow-50 to-orange-50 rounded-xl hover:shadow-lg transition-all duration-300">
                                        <div class="w-10 h-10 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center">
                                            <i data-lucide="gift" class="w-5 h-5 text-white group-hover:rotate-12 transition-transform"></i>
                                        </div>
                                        <div class="text-left">
                                            <p class="font-semibold text-gray-800">Tukar Poin</p>
                                            <p class="text-xs text-gray-600">Dapatkan reward menarik</p>
                                        </div>
                                    </button>

                                    <button class="group w-full flex items-center gap-3 p-4 bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl hover:shadow-lg transition-all duration-300">
                                        <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                                            <i data-lucide="headphones" class="w-5 h-5 text-white group-hover:rotate-12 transition-transform"></i>
                                        </div>
                                        <div class="text-left">
                                            <p class="font-semibold text-gray-800">Customer Service</p>
                                            <p class="text-xs text-gray-600">Butuh bantuan?</p>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Weather Widget -->
                        <div class="group relative gsap-fade-left">
                            <div class="absolute inset-0 bg-gradient-to-r from-white/10 to-white/5 rounded-3xl blur-xl opacity-75"></div>
                            <div class="relative bg-white/95 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/20">
                                <h3 class="text-xl font-black text-gray-800 mb-4 flex items-center gap-2">
                                    <i data-lucide="cloud-sun" class="w-5 h-5 text-blue-600"></i>
                                    Cuaca Hari Ini
                                </h3>

                                <div class="text-center">
                                    <div class="flex items-center justify-center gap-4 mb-4">
                                        <i data-lucide="sun" class="w-12 h-12 text-yellow-500"></i>
                                        <div>
                                            <div class="text-3xl font-black text-gray-800">28°C</div>
                                            <div class="text-gray-600">Cerah</div>
                                        </div>
                                    </div>
                                    <div class="bg-gradient-to-r from-green-100 to-emerald-100 rounded-xl p-4">
                                        <p class="text-green-800 font-semibold text-sm">
                                            <i data-lucide="check-circle" class="w-4 h-4 inline mr-1"></i>
                                            Cuaca sempurna untuk adventure!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Styles -->
    <style>
        /* Floating animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(3deg); }
        }

        @keyframes floatReverse {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-12px) rotate(-2deg); }
        }

        .floating-element {
            animation: float 8s ease-in-out infinite;
        }

        .floating-element:nth-child(even) {
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

        .gsap-fade-right {
            opacity: 0;
            transform: translateX(30px);
        }

        .gsap-scale {
            opacity: 0;
            transform: scale(0.95);
        }

        /* Parallax elements */
        .parallax-element {
            will-change: transform;
        }

        /* Enhanced hover states */
        .group:hover .group-hover\:rotate-12 {
            transform: rotate(12deg);
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

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(34, 197, 94, 0.5);
        }

        /* Card hover effects */
        .group:hover {
            transform: translateY(-2px);
        }

        /* Smooth transitions */
        * {
            transition-property: transform, opacity, box-shadow;
            transition-duration: 300ms;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>

    <!-- Enhanced JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollSmoother.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/TextPlugin.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Lucide icons
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }

            // Initialize GSAP
            gsap.registerPlugin(ScrollTrigger);

            // Initialize all animations and interactions
            initAnimations();
            initInteractiveElements();
            initParallaxEffects();
            initCountUpAnimations();
            initWeatherWidget();
        });

        function initAnimations() {
            // Header animations
            gsap.utils.toArray('.gsap-fade-right').forEach((el, index) => {
                gsap.to(el, {
                    opacity: 1,
                    x: 0,
                    duration: 1,
                    delay: index * 0.1,
                    ease: "power2.out"
                });
            });

            gsap.utils.toArray('.gsap-fade-left').forEach((el, index) => {
                gsap.to(el, {
                    opacity: 1,
                    x: 0,
                    duration: 1,
                    delay: 0.2 + (index * 0.15),
                    ease: "power2.out"
                });
            });

            // Stats cards with stagger
            gsap.utils.toArray('.gsap-scale').forEach((el, index) => {
                gsap.to(el, {
                    opacity: 1,
                    scale: 1,
                    duration: 0.8,
                    delay: 0.4 + (index * 0.1),
                    ease: "back.out(1.4)"
                });
            });

            // Content sections
            gsap.utils.toArray('.gsap-fade-up').forEach((el, index) => {
                gsap.to(el, {
                    opacity: 1,
                    y: 0,
                    duration: 1,
                    delay: 0.6 + (index * 0.2),
                    ease: "power2.out"
                });
            });

            // Floating elements
            gsap.utils.toArray('.floating-element').forEach((element, index) => {
                const duration = 6 + (index * 0.5);
                const delay = index * 0.4;

                gsap.to(element, {
                    y: -12,
                    rotation: 3,
                    duration: duration,
                    repeat: -1,
                    yoyo: true,
                    ease: "sine.inOut",
                    delay: delay
                });
            });
        }

        function initInteractiveElements() {
            // Enhanced hover effects for cards
            document.querySelectorAll('.group').forEach(card => {
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

            // Button interactions
            document.querySelectorAll('button').forEach(button => {
                button.addEventListener('mouseenter', () => {
                    const icon = button.querySelector('i');
                    if (icon && icon.classList.contains('group-hover:rotate-12')) {
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

                button.addEventListener('click', () => {
                    gsap.to(button, {
                        scale: 0.95,
                        duration: 0.1,
                        yoyo: true,
                        repeat: 1
                    });
                });
            });

            // Activity items hover effects
            document.querySelectorAll('.space-y-4 > div').forEach(item => {
                item.addEventListener('mouseenter', () => {
                    gsap.to(item, {
                        scale: 1.02,
                        duration: 0.2
                    });
                });

                item.addEventListener('mouseleave', () => {
                    gsap.to(item, {
                        scale: 1,
                        duration: 0.2
                    });
                });
            });
        }

        function initParallaxEffects() {
            // Background parallax elements
            gsap.utils.toArray('.parallax-element').forEach(element => {
                gsap.to(element, {
                    yPercent: -20,
                    ease: "none",
                    scrollTrigger: {
                        trigger: element,
                        start: "top bottom",
                        end: "bottom top",
                        scrub: 1
                    }
                });
            });
        }

        function initCountUpAnimations() {
            // Animate numbers in stats cards
            const statsElements = [
                { element: 'h3', finalValue: 5, prefix: '', suffix: '' },
                { element: 'h3', finalValue: 2450, prefix: '', suffix: '' },
                { element: 'h3', finalValue: 3, prefix: '', suffix: '' }
            ];

            document.querySelectorAll('.gsap-scale h3').forEach((el, index) => {
                if (index < 3) { // Only for numeric stats
                    const finalValue = [5, 2450, 3][index];

                    gsap.from({ value: 0 }, {
                        value: finalValue,
                        duration: 2,
                        delay: 0.8 + (index * 0.2),
                        ease: "power2.out",
                        onUpdate: function() {
                            el.textContent = Math.round(this.targets()[0].value).toLocaleString();
                        }
                    });
                }
            });
        }

        function initWeatherWidget() {
            // Animate weather icon
            const weatherIcon = document.querySelector('[data-lucide="sun"]');
            if (weatherIcon) {
                gsap.to(weatherIcon, {
                    rotation: 360,
                    duration: 20,
                    repeat: -1,
                    ease: "none"
                });
            }

            // Simulate weather updates
            const weatherConditions = [
                { temp: '28°C', condition: 'Cerah', icon: 'sun', message: 'Cuaca sempurna untuk adventure!' },
                { temp: '26°C', condition: 'Berawan', icon: 'cloud-sun', message: 'Cuaca bagus untuk jalan-jalan!' },
                { temp: '24°C', condition: 'Mendung', icon: 'cloud', message: 'Siap-siap bawa payung!' }
            ];

            let currentWeather = 0;

            setInterval(() => {
                currentWeather = (currentWeather + 1) % weatherConditions.length;
                const weather = weatherConditions[currentWeather];

                // Update temperature
                const tempElement = document.querySelector('.text-3xl.font-black');
                if (tempElement) {
                    gsap.to(tempElement, {
                        scale: 0.8,
                        duration: 0.2,
                        onComplete: () => {
                            tempElement.textContent = weather.temp;
                            gsap.to(tempElement, { scale: 1, duration: 0.2 });
                        }
                    });
                }

                // Update condition
                const conditionElement = tempElement?.nextElementSibling;
                if (conditionElement) {
                    conditionElement.textContent = weather.condition;
                }

                // Update message
                const messageElement = document.querySelector('.bg-gradient-to-r.from-green-100 p');
                if (messageElement) {
                    gsap.to(messageElement, {
                        opacity: 0,
                        duration: 0.2,
                        onComplete: () => {
                            messageElement.innerHTML = `<i data-lucide="check-circle" class="w-4 h-4 inline mr-1"></i>${weather.message}`;
                            gsap.to(messageElement, { opacity: 1, duration: 0.2 });

                            // Reinitialize icons
                            if (typeof lucide !== 'undefined') {
                                lucide.createIcons();
                            }
                        }
                    });
                }
            }, 10000); // Update every 10 seconds
        }

        // Add some interactive notifications
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 z-50 p-4 rounded-xl shadow-xl text-white ${
                type === 'success' ? 'bg-green-500' :
                type === 'warning' ? 'bg-yellow-500' :
                type === 'error' ? 'bg-red-500' : 'bg-blue-500'
            }`;
            notification.innerHTML = `
                <div class="flex items-center gap-2">
                    <i data-lucide="${
                        type === 'success' ? 'check-circle' :
                        type === 'warning' ? 'alert-triangle' :
                        type === 'error' ? 'x-circle' : 'info'
                    }" class="w-5 h-5"></i>
                    <span>${message}</span>
                </div>
            `;

            document.body.appendChild(notification);

            // Initialize icons
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }

            // Animate in
            gsap.from(notification, {
                x: 100,
                opacity: 0,
                duration: 0.3
            });

            // Remove after 3 seconds
            setTimeout(() => {
                gsap.to(notification, {
                    x: 100,
                    opacity: 0,
                    duration: 0.3,
                    onComplete: () => notification.remove()
                });
            }, 3000);
        }

        // Demo notifications on page load
        setTimeout(() => {
            showNotification('Selamat datang di Dashboard Fajar World!', 'success');
        }, 2000);

        setTimeout(() => {
            showNotification('Jangan lupa cek event terbaru kami!', 'info');
        }, 5000);
    </script>
</x-app-layout>
