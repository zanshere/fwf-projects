<x-app-layout>
    <!-- Main Dashboard Wrapper - Added proper padding for navbar -->
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
            <div class="absolute top-1/2 left-1/4 w-36 h-36 bg-blue-400 rounded-full opacity-8 blur-3xl animate-float">
            </div>
        </div>

        <!-- Nature Icons Floating -->
        <div class="absolute top-20 left-10 animate-float pointer-events-none">
            <i data-lucide="leaf" class="w-8 h-8 text-green-300 opacity-30"></i>
        </div>
        <div class="absolute top-40 right-20 animate-float-delayed pointer-events-none">
            <i data-lucide="bird" class="w-6 h-6 text-yellow-300 opacity-30"></i>
        </div>
        <div class="absolute bottom-20 left-20 animate-float pointer-events-none">
            <i data-lucide="flower" class="w-6 h-6 text-pink-300 opacity-30"></i>
        </div>
        <div class="absolute bottom-40 right-16 animate-float-delayed pointer-events-none">
            <i data-lucide="tree-pine" class="w-7 h-7 text-green-300 opacity-30"></i>
        </div>

        <!-- Main Content Container -->
        <div class="relative z-10">
            <!-- Dashboard Content -->
            <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <!-- Stats Cards Grid -->
                <section class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-8" id="stats-section">
                    <!-- Kunjungan Card -->
                    <div class="group relative gsap-scale">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-blue-400/20 to-cyan-400/20 rounded-2xl lg:rounded-3xl blur-xl opacity-75 group-hover:opacity-100 transition-opacity">
                        </div>
                        <div
                            class="relative bg-white/95 backdrop-blur-sm rounded-2xl lg:rounded-3xl p-4 lg:p-6 shadow-xl hover:shadow-2xl transition-all duration-300 border border-white/20">
                            <div class="flex items-center justify-between mb-3 lg:mb-4">
                                <div
                                    class="w-10 h-10 lg:w-12 lg:h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center">
                                    <i data-lucide="map-pin" class="w-5 h-5 lg:w-6 lg:h-6 text-white"></i>
                                </div>
                                <span
                                    class="text-xs font-medium text-blue-600 bg-blue-100 px-2 py-1 rounded-full">Total</span>
                            </div>
                            <h3 class="text-xl lg:text-2xl font-black text-gray-800 mb-1">5</h3>
                            <p class="text-gray-600 text-xs lg:text-sm">Kunjungan</p>
                        </div>
                    </div>

                    <!-- Poin Reward Card -->
                    <div class="group relative gsap-scale">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-yellow-400/20 to-orange-400/20 rounded-2xl lg:rounded-3xl blur-xl opacity-75 group-hover:opacity-100 transition-opacity">
                        </div>
                        <div
                            class="relative bg-white/95 backdrop-blur-sm rounded-2xl lg:rounded-3xl p-4 lg:p-6 shadow-xl hover:shadow-2xl transition-all duration-300 border border-white/20">
                            <div class="flex items-center justify-between mb-3 lg:mb-4">
                                <div
                                    class="w-10 h-10 lg:w-12 lg:h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center">
                                    <i data-lucide="star" class="w-5 h-5 lg:w-6 lg:h-6 text-white"></i>
                                </div>
                                <span
                                    class="text-xs font-medium text-yellow-600 bg-yellow-100 px-2 py-1 rounded-full">Aktif</span>
                            </div>
                            <h3 class="text-xl lg:text-2xl font-black text-gray-800 mb-1">2,450</h3>
                            <p class="text-gray-600 text-xs lg:text-sm">Poin Reward</p>
                        </div>
                    </div>

                    <!-- Tiket Card -->
                    <div class="group relative gsap-scale">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-green-400/20 to-emerald-400/20 rounded-2xl lg:rounded-3xl blur-xl opacity-75 group-hover:opacity-100 transition-opacity">
                        </div>
                        <div
                            class="relative bg-white/95 backdrop-blur-sm rounded-2xl lg:rounded-3xl p-4 lg:p-6 shadow-xl hover:shadow-2xl transition-all duration-300 border border-white/20">
                            <div class="flex items-center justify-between mb-3 lg:mb-4">
                                <div
                                    class="w-10 h-10 lg:w-12 lg:h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center">
                                    <i data-lucide="ticket" class="w-5 h-5 lg:w-6 lg:h-6 text-white"></i>
                                </div>
                                <span
                                    class="text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded-full">Tersedia</span>
                            </div>
                            <h3 class="text-xl lg:text-2xl font-black text-gray-800 mb-1">3</h3>
                            <p class="text-gray-600 text-xs lg:text-sm">Tiket Aktif</p>
                        </div>
                    </div>

                    <!-- Member Level Card -->
                    <div class="group relative gsap-scale">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-purple-400/20 to-pink-400/20 rounded-2xl lg:rounded-3xl blur-xl opacity-75 group-hover:opacity-100 transition-opacity">
                        </div>
                        <div
                            class="relative bg-white/95 backdrop-blur-sm rounded-2xl lg:rounded-3xl p-4 lg:p-6 shadow-xl hover:shadow-2xl transition-all duration-300 border border-white/20">
                            <div class="flex items-center justify-between mb-3 lg:mb-4">
                                <div
                                    class="w-10 h-10 lg:w-12 lg:h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                                    <i data-lucide="crown" class="w-5 h-5 lg:w-6 lg:h-6 text-white"></i>
                                </div>
                                <span
                                    class="text-xs font-medium text-purple-600 bg-purple-100 px-2 py-1 rounded-full">Gold</span>
                            </div>
                            <h3 class="text-xl lg:text-2xl font-black text-gray-800 mb-1">Gold</h3>
                            <p class="text-gray-600 text-xs lg:text-sm">Member Level</p>
                        </div>
                    </div>
                </section>

                <!-- Main Content Grid -->
                <div class="grid lg:grid-cols-3 gap-6 lg:gap-8">
                    <!-- Left Column - Activities & Events -->
                    <div class="lg:col-span-2 space-y-6 lg:space-y-8">
                        <!-- Recent Activities -->
                        <section class="group relative gsap-fade-up">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-white/10 to-white/5 rounded-2xl lg:rounded-3xl blur-xl opacity-75">
                            </div>
                            <div
                                class="relative bg-white/95 backdrop-blur-sm rounded-2xl lg:rounded-3xl p-6 lg:p-8 shadow-xl border border-white/20">
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-3">
                                    <h2 class="text-xl lg:text-2xl font-black text-gray-800 flex items-center gap-3">
                                        <i data-lucide="activity" class="w-5 h-5 lg:w-6 lg:h-6 text-green-600"></i>
                                        Aktivitas Terbaru
                                    </h2>
                                    <button
                                        class="text-green-600 hover:text-green-800 font-medium text-sm self-start sm:self-auto">Lihat
                                        Semua</button>
                                </div>

                                <div class="space-y-4">
                                    <!-- Activity Item 1 -->
                                    <div
                                        class="flex items-start gap-3 lg:gap-4 p-3 lg:p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl lg:rounded-2xl hover:shadow-lg transition-all duration-300">
                                        <div
                                            class="w-10 h-10 lg:w-12 lg:h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-full flex items-center justify-center flex-shrink-0">
                                            <i data-lucide="map-pin" class="w-5 h-5 lg:w-6 lg:h-6 text-white"></i>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="font-bold text-gray-800 text-sm lg:text-base">Kunjungan ke Fajar
                                                World</h3>
                                            <p class="text-gray-600 text-xs lg:text-sm">Anda mengunjungi Wildlife
                                                Photography area</p>
                                            <p class="text-green-600 text-xs mt-1">2 hari yang lalu</p>
                                        </div>
                                        <div class="text-green-600 font-bold text-xs lg:text-sm">+50 poin</div>
                                    </div>

                                    <!-- Activity Item 2 -->
                                    <div
                                        class="flex items-start gap-3 lg:gap-4 p-3 lg:p-4 bg-gradient-to-r from-yellow-50 to-orange-50 rounded-xl lg:rounded-2xl hover:shadow-lg transition-all duration-300">
                                        <div
                                            class="w-10 h-10 lg:w-12 lg:h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-full flex items-center justify-center flex-shrink-0">
                                            <i data-lucide="gift" class="w-5 h-5 lg:w-6 lg:h-6 text-white"></i>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="font-bold text-gray-800 text-sm lg:text-base">Reward Claim</h3>
                                            <p class="text-gray-600 text-xs lg:text-sm">Anda menukar 1000 poin dengan
                                                merchandise</p>
                                            <p class="text-orange-600 text-xs mt-1">1 minggu yang lalu</p>
                                        </div>
                                        <div class="text-orange-600 font-bold text-xs lg:text-sm">-1000 poin</div>
                                    </div>

                                    <!-- Activity Item 3 -->
                                    <div
                                        class="flex items-start gap-3 lg:gap-4 p-3 lg:p-4 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl lg:rounded-2xl hover:shadow-lg transition-all duration-300">
                                        <div
                                            class="w-10 h-10 lg:w-12 lg:h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-full flex items-center justify-center flex-shrink-0">
                                            <i data-lucide="ticket" class="w-5 h-5 lg:w-6 lg:h-6 text-white"></i>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="font-bold text-gray-800 text-sm lg:text-base">Pembelian Tiket
                                            </h3>
                                            <p class="text-gray-600 text-xs lg:text-sm">Tiket Premium untuk 2 orang</p>
                                            <p class="text-blue-600 text-xs mt-1">2 minggu yang lalu</p>
                                        </div>
                                        <div class="text-blue-600 font-bold text-xs lg:text-sm">+100 poin</div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- Upcoming Events -->
                        <section class="group relative gsap-fade-up">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-white/10 to-white/5 rounded-2xl lg:rounded-3xl blur-xl opacity-75">
                            </div>
                            <div
                                class="relative bg-white/95 backdrop-blur-sm rounded-2xl lg:rounded-3xl p-6 lg:p-8 shadow-xl border border-white/20">
                                <div class="flex items-center justify-between mb-6">
                                    <h2 class="text-xl lg:text-2xl font-black text-gray-800 flex items-center gap-3">
                                        <i data-lucide="calendar" class="w-5 h-5 lg:w-6 lg:h-6 text-purple-600"></i>
                                        Event Mendatang
                                    </h2>
                                </div>

                                <div class="grid sm:grid-cols-2 gap-4 lg:gap-4">
                                    <!-- Event 1 -->
                                    <div
                                        class="bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl lg:rounded-2xl p-4 lg:p-6 text-white hover:shadow-xl transition-all duration-300 cursor-pointer group/event">
                                        <div class="flex items-start gap-3 mb-3 lg:mb-4">
                                            <i data-lucide="camera"
                                                class="w-6 h-6 lg:w-8 lg:h-8 group-hover/event:rotate-12 transition-transform flex-shrink-0 mt-1"></i>
                                            <div class="min-w-0">
                                                <h3 class="font-bold text-sm lg:text-base leading-tight">Wildlife
                                                    Photography Workshop</h3>
                                                <p class="text-purple-100 text-xs lg:text-sm">15 Februari 2025</p>
                                            </div>
                                        </div>
                                        <p class="text-purple-100 text-xs lg:text-sm mb-3 lg:mb-4">Belajar fotografi
                                            satwa langsung dari ahlinya</p>
                                        <div class="flex justify-between items-center">
                                            <span class="text-xs bg-white/20 px-2 py-1 rounded-full">Terbatas</span>
                                            <span class="text-xs lg:text-sm font-bold">Rp 150.000</span>
                                        </div>
                                    </div>

                                    <!-- Event 2 -->
                                    <div
                                        class="bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl lg:rounded-2xl p-4 lg:p-6 text-white hover:shadow-xl transition-all duration-300 cursor-pointer group/event">
                                        <div class="flex items-start gap-3 mb-3 lg:mb-4">
                                            <i data-lucide="sunrise"
                                                class="w-6 h-6 lg:w-8 lg:h-8 group-hover/event:rotate-12 transition-transform flex-shrink-0 mt-1"></i>
                                            <div class="min-w-0">
                                                <h3 class="font-bold text-sm lg:text-base leading-tight">Sunrise
                                                    Adventure</h3>
                                                <p class="text-green-100 text-xs lg:text-sm">20 Februari 2025</p>
                                            </div>
                                        </div>
                                        <p class="text-green-100 text-xs lg:text-sm mb-3 lg:mb-4">Nikmati keindahan
                                            sunrise dengan view terbaik</p>
                                        <div class="flex justify-between items-center">
                                            <span class="text-xs bg-white/20 px-2 py-1 rounded-full">Tersedia</span>
                                            <span class="text-xs lg:text-sm font-bold">Rp 75.000</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                    <!-- Right Column - Profile & Quick Actions -->
                    <div class="space-y-6 lg:space-y-8">
                        <!-- Profile Summary -->
                        <section class="group relative gsap-fade-left">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-white/10 to-white/5 rounded-2xl lg:rounded-3xl blur-xl opacity-75">
                            </div>
                            <div
                                class="relative bg-white/95 backdrop-blur-sm rounded-2xl lg:rounded-3xl p-6 lg:p-8 shadow-xl border border-white/20">
                                <div class="text-center mb-6">
                                    <div
                                        class="w-16 h-16 lg:w-20 lg:h-20 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full mx-auto mb-4 flex items-center justify-center shadow-xl">
                                        <i data-lucide="user" class="w-8 h-8 lg:w-10 lg:h-10 text-green-900"></i>
                                    </div>
                                    <h3 class="text-lg lg:text-xl font-black text-gray-800 mb-1">
                                        {{ Auth::user()->name }}</h3>
                                    <p class="text-gray-600 text-sm">Gold Member</p>
                                    <div class="flex items-center justify-center gap-1 mt-2">
                                        <i data-lucide="star" class="w-4 h-4 text-yellow-500 fill-current"></i>
                                        <i data-lucide="star" class="w-4 h-4 text-yellow-500 fill-current"></i>
                                        <i data-lucide="star" class="w-4 h-4 text-yellow-500 fill-current"></i>
                                        <i data-lucide="star" class="w-4 h-4 text-yellow-500 fill-current"></i>
                                        <i data-lucide="star" class="w-4 h-4 text-gray-300"></i>
                                    </div>
                                </div>

                                <div class="space-y-3 lg:space-y-4 mb-6">
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600 text-sm">Member Sejak</span>
                                        <span class="font-semibold text-gray-800 text-sm">Jan 2024</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600 text-sm">Total Kunjungan</span>
                                        <span class="font-semibold text-gray-800 text-sm">5 kali</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600 text-sm">Poin Lifetime</span>
                                        <span class="font-semibold text-gray-800 text-sm">3,450 poin</span>
                                    </div>
                                </div>

                                <button onclick="window.location.href='{{ route('profile.edit') }}'"
                                    class="group relative overflow-hidden w-full bg-gradient-to-r from-green-600 to-emerald-600 text-white font-bold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                                    <span class="relative z-10 flex items-center justify-center gap-2">
                                        <i data-lucide="edit"
                                            class="w-4 h-4 group-hover:rotate-12 transition-transform"></i>
                                        Edit Profile
                                    </span>
                                </button>
                            </div>
                        </section>

                        <!-- Quick Links -->
                        <section class="group relative gsap-fade-left">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-white/10 to-white/5 rounded-2xl lg:rounded-3xl blur-xl opacity-75">
                            </div>
                            <div
                                class="relative bg-white/95 backdrop-blur-sm rounded-2xl lg:rounded-3xl p-6 lg:p-8 shadow-xl border border-white/20">
                                <h3 class="text-lg lg:text-xl font-black text-gray-800 mb-6 flex items-center gap-2">
                                    <i data-lucide="zap" class="w-5 h-5 text-yellow-600"></i>
                                    Quick Actions
                                </h3>

                                <div class="space-y-3">
                                    <button onclick="window.location.href='{{ route('tickets.index') }}'"
                                        class="group w-full flex items-center gap-3 p-3 lg:p-4 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl hover:shadow-lg transition-all duration-300">
                                        <div
                                            class="w-10 h-10 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                            <i data-lucide="ticket"
                                                class="w-5 h-5 text-white group-hover:rotate-12 transition-transform"></i>
                                        </div>
                                        <div class="text-left">
                                            <p class="font-semibold text-gray-800 text-sm">Beli Tiket</p>
                                            <p class="text-xs text-gray-600">Pesan tiket adventure</p>
                                        </div>
                                    </button>

                                    <button
                                        class="group w-full flex items-center gap-3 p-3 lg:p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl hover:shadow-lg transition-all duration-300">
                                        <div
                                            class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                            <i data-lucide="map"
                                                class="w-5 h-5 text-white group-hover:rotate-12 transition-transform"></i>
                                        </div>
                                        <div class="text-left">
                                            <p class="font-semibold text-gray-800 text-sm">Peta Lokasi</p>
                                            <p class="text-xs text-gray-600">Lihat area adventure</p>
                                        </div>
                                    </button>

                                    <button
                                        class="group w-full flex items-center gap-3 p-3 lg:p-4 bg-gradient-to-r from-yellow-50 to-orange-50 rounded-xl hover:shadow-lg transition-all duration-300">
                                        <div
                                            class="w-10 h-10 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                            <i data-lucide="gift"
                                                class="w-5 h-5 text-white group-hover:rotate-12 transition-transform"></i>
                                        </div>
                                        <div class="text-left">
                                            <p class="font-semibold text-gray-800 text-sm">Tukar Poin</p>
                                            <p class="text-xs text-gray-600">Dapatkan reward menarik</p>
                                        </div>
                                    </button>

                                    <button
                                        class="group w-full flex items-center gap-3 p-3 lg:p-4 bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl hover:shadow-lg transition-all duration-300">
                                        <div
                                            class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                            <i data-lucide="headphones"
                                                class="w-5 h-5 text-white group-hover:rotate-12 transition-transform"></i>
                                        </div>
                                        <div class="text-left">
                                            <p class="font-semibold text-gray-800 text-sm">Customer Service</p>
                                            <p class="text-xs text-gray-600">Butuh bantuan?</p>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </section>

                        <!-- Weather Widget -->
                        <section class="group relative gsap-fade-left">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-white/10 to-white/5 rounded-2xl lg:rounded-3xl blur-xl opacity-75">
                            </div>
                            <div
                                class="relative bg-white/95 backdrop-blur-sm rounded-2xl lg:rounded-3xl p-6 lg:p-8 shadow-xl border border-white/20">
                                <h3 class="text-lg lg:text-xl font-black text-gray-800 mb-4 flex items-center gap-2">
                                    <i data-lucide="cloud-sun" class="w-5 h-5 text-blue-600"></i>
                                    Cuaca Hari Ini
                                </h3>

                                <div class="text-center">
                                    <div class="flex items-center justify-center gap-4 mb-4">
                                        <i data-lucide="sun"
                                            class="w-10 h-10 lg:w-12 lg:h-12 text-yellow-500 animate-spin-slow"></i>
                                        <div>
                                            <div class="text-2xl lg:text-3xl font-black text-gray-800">28°C</div>
                                            <div class="text-gray-600 text-sm">Cerah</div>
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
                        </section>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Enhanced Styles -->
    <style>
        /* Custom animations */
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

        @keyframes spin-slow {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .animate-float {
            animation: float 8s ease-in-out infinite;
        }

        .animate-float-delayed {
            animation: floatReverse 9s ease-in-out infinite;
            animation-delay: 1s;
        }

        .animate-spin-slow {
            animation: spin-slow 20s linear infinite;
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

        /* Enhanced hover states */
        .group:hover {
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

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(34, 197, 94, 0.5);
        }

        /* Smooth transitions */
        * {
            transition-property: transform, opacity, box-shadow;
            transition-duration: 300ms;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>

    <!-- Enhanced JavaScript with GSAP -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/ScrollTrigger.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Lucide icons
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }

            // Initialize GSAP
            gsap.registerPlugin(ScrollTrigger);

            initAnimations();
            initInteractiveElements();
            initCountUpAnimations();
        });

        function initAnimations() {
            // Timeline for sequential animations
            const tl = gsap.timeline();

            // Header animations
            tl.to('.gsap-fade-right', {
                    opacity: 1,
                    x: 0,
                    duration: 1,
                    ease: "power2.out"
                })
                .to('.gsap-fade-left', {
                    opacity: 1,
                    x: 0,
                    duration: 1,
                    ease: "power2.out"
                }, "-=0.5")

                // Stats cards with stagger
                .to('.gsap-scale', {
                    opacity: 1,
                    scale: 1,
                    duration: 0.8,
                    stagger: 0.1,
                    ease: "back.out(1.4)"
                }, "-=0.3")

                // Content sections
                .to('.gsap-fade-up', {
                    opacity: 1,
                    y: 0,
                    duration: 1,
                    stagger: 0.2,
                    ease: "power2.out"
                }, "-=0.5");
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
                    if (icon && (icon.classList.contains('group-hover:rotate-12') || icon.classList
                            .contains('group-hover:animate-pulse'))) {
                        gsap.to(icon, {
                            rotation: icon.classList.contains('group-hover:animate-pulse') ? 0 : 12,
                            scale: icon.classList.contains('group-hover:animate-pulse') ? 1.1 : 1,
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
                            scale: 1,
                            duration: 0.3,
                            ease: "power2.out"
                        });
                    }
                });

                button.addEventListener('click', (e) => {
                    // Prevent double animations
                    e.preventDefault();

                    gsap.to(button, {
                        scale: 0.95,
                        duration: 0.1,
                        yoyo: true,
                        repeat: 1,
                        onComplete: () => {
                            // Execute original click action
                            if (button.onclick) {
                                button.onclick();
                            } else if (button.getAttribute('onclick')) {
                                eval(button.getAttribute('onclick'));
                            }
                        }
                    });
                });
            });

            // Activity items hover effects
            document.querySelectorAll('.space-y-4 > div').forEach(item => {
                item.addEventListener('mouseenter', () => {
                    gsap.to(item, {
                        scale: 1.02,
                        duration: 0.2,
                        ease: "power2.out"
                    });
                });

                item.addEventListener('mouseleave', () => {
                    gsap.to(item, {
                        scale: 1,
                        duration: 0.2,
                        ease: "power2.out"
                    });
                });
            });
        }

        function initCountUpAnimations() {
            // Animate numbers in stats cards
            const statsData = [{
                    selector: '.gsap-scale:nth-child(1) h3',
                    value: 5
                },
                {
                    selector: '.gsap-scale:nth-child(2) h3',
                    value: 2450
                },
                {
                    selector: '.gsap-scale:nth-child(3) h3',
                    value: 3
                }
            ];

            statsData.forEach((stat, index) => {
                const element = document.querySelector(stat.selector);
                if (element && !isNaN(stat.value)) {
                    gsap.from({
                        value: 0
                    }, {
                        value: stat.value,
                        duration: 2,
                        delay: 1.2 + (index * 0.2),
                        ease: "power2.out",
                        onUpdate: function() {
                            element.textContent = Math.round(this.targets()[0].value).toLocaleString();
                        }
                    });
                }
            });
        }

        // Add notification system
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `fixed top-24 right-4 z-50 p-4 rounded-xl shadow-xl text-white max-w-sm ${
                type === 'success' ? 'bg-green-500' :
                type === 'warning' ? 'bg-yellow-500' :
                type === 'error' ? 'bg-red-500' : 'bg-blue-500'
            }`;

            notification.innerHTML = `
                <div class="flex items-start gap-3">
                    <i data-lucide="${
                        type === 'success' ? 'check-circle' :
                        type === 'warning' ? 'alert-triangle' :
                        type === 'error' ? 'x-circle' : 'info'
                    }" class="w-5 h-5 flex-shrink-0 mt-0.5"></i>
                    <div>
                        <p class="font-medium text-sm">${message}</p>
                    </div>
                    <button class="ml-auto text-white/80 hover:text-white" onclick="this.parentElement.parentElement.remove()">
                        <i data-lucide="x" class="w-4 h-4"></i>
                    </button>
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
                duration: 0.3,
                ease: "back.out(1.7)"
            });

            // Auto remove after 5 seconds
            setTimeout(() => {
                gsap.to(notification, {
                    x: 100,
                    opacity: 0,
                    duration: 0.3,
                    onComplete: () => notification.remove()
                });
            }, 5000);
        }

        // Demo notifications
        setTimeout(() => {
            showNotification('Selamat datang di Dashboard Fajar World! 🎉', 'success');
        }, 2000);

        setTimeout(() => {
            showNotification('Jangan lupa cek event terbaru kami!', 'info');
        }, 6000);

        // Weather animation
        const weatherIcon = document.querySelector('[data-lucide="sun"]');
        if (weatherIcon) {
            gsap.to(weatherIcon, {
                rotation: 360,
                duration: 20,
                repeat: -1,
                ease: "none"
            });
        }

        // Simulate real-time updates
        function simulateRealtimeUpdates() {
            // Update visitor count randomly
            setInterval(() => {
                const visitorElement = document.querySelector('.gsap-scale:nth-child(1) h3');
                if (visitorElement) {
                    const currentValue = parseInt(visitorElement.textContent);
                    const newValue = currentValue + Math.floor(Math.random() * 2);

                    gsap.to({
                        value: currentValue
                    }, {
                        value: newValue,
                        duration: 1,
                        ease: "power2.out",
                        onUpdate: function() {
                            visitorElement.textContent = Math.round(this.targets()[0].value);
                        }
                    });
                }
            }, 30000); // Update every 30 seconds

            // Update points occasionally
            setInterval(() => {
                const pointsElement = document.querySelector('.gsap-scale:nth-child(2) h3');
                if (pointsElement) {
                    const currentValue = parseInt(pointsElement.textContent.replace(',', ''));
                    const newValue = currentValue + Math.floor(Math.random() * 50) + 10;

                    gsap.to({
                        value: currentValue
                    }, {
                        value: newValue,
                        duration: 1.5,
                        ease: "power2.out",
                        onUpdate: function() {
                            pointsElement.textContent = Math.round(this.targets()[0].value)
                                .toLocaleString();
                        }
                    });

                    // Show notification for points earned
                    showNotification(`Anda mendapat ${newValue - currentValue} poin baru!`, 'success');
                }
            }, 45000); // Update every 45 seconds
        }

        // Start real-time updates
        setTimeout(simulateRealtimeUpdates, 10000);

        // Add scroll-triggered animations for mobile
        if (window.innerWidth <= 768) {
            gsap.utils.toArray('.gsap-fade-up, .gsap-fade-left').forEach((element, index) => {
                gsap.set(element, {
                    opacity: 0,
                    y: 30
                });

                ScrollTrigger.create({
                    trigger: element,
                    start: "top 80%",
                    onEnter: () => {
                        gsap.to(element, {
                            opacity: 1,
                            y: 0,
                            duration: 0.8,
                            delay: index * 0.1,
                            ease: "power2.out"
                        });
                    }
                });
            });
        }
    </script>
</x-app-layout>
