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
                            <h3 class="text-xl lg:text-2xl font-black text-gray-800 mb-1" id="visits-count">
                                {{ $user->total_visits ?? 0 }}
                            </h3>
                            <p class="text-gray-600 text-xs lg:text-sm">Kunjungan</p>
                        </div>
                    </div>

                    <!-- Poin Harian Card (Daily Points) -->
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
                                    class="text-xs font-medium text-yellow-600 bg-yellow-100 px-2 py-1 rounded-full">Hari
                                    Ini</span>
                            </div>
                            <h3 class="text-xl lg:text-2xl font-black text-gray-800 mb-1" id="daily-points-count">
                                {{ number_format($user->daily_points ?? 0) }}
                            </h3>
                            <p class="text-gray-600 text-xs lg:text-sm">Poin Hari Ini</p>
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
                            <h3 class="text-xl lg:text-2xl font-black text-gray-800 mb-1" id="active-tickets-count">
                                {{ $user->activeTickets()->count() ?? 0 }}
                            </h3>
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
                                    class="text-xs font-medium text-purple-600 bg-purple-100 px-2 py-1 rounded-full">{{ $user->member_level ?? 'Bronze' }}</span>
                            </div>
                            <h3 class="text-xl lg:text-2xl font-black text-gray-800 mb-1">
                                {{ $user->member_level ?? 'Bronze' }}</h3>
                            <p class="text-gray-600 text-xs lg:text-sm">Member Level</p>
                        </div>
                    </div>
                </section>

                <!-- Main Content Grid -->
                <div class="grid lg:grid-cols-3 gap-6 lg:gap-8">
                    <!-- Left Column - Activities & Events -->
                    <div class="lg:col-span-2 space-y-6 lg:space-y-8">
                        <!-- Recent Activities Section -->
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
                                    @if ($recentActivities && $recentActivities->count() > 0)
                                        @foreach ($recentActivities as $activity)
                                            @php
                                                $activityColor = \App\Helpers\DashboardHelper::getActivityColor(
                                                    $activity->type,
                                                );
                                                $activityColorTo = \App\Helpers\DashboardHelper::getActivityColor(
                                                    $activity->type,
                                                    'to',
                                                );
                                                $activityIcon = \App\Helpers\DashboardHelper::getActivityIcon(
                                                    $activity->type,
                                                );
                                            @endphp
                                            <div
                                                class="flex items-start gap-3 lg:gap-4 p-3 lg:p-4 bg-gradient-to-r from-{{ $activityColor }}-50 to-{{ $activityColorTo }}-50 rounded-xl lg:rounded-2xl hover:shadow-lg transition-all duration-300">
                                                <div
                                                    class="w-10 h-10 lg:w-12 lg:h-12 bg-gradient-to-br from-{{ $activityColor }}-500 to-{{ $activityColorTo }}-500 rounded-full flex items-center justify-center flex-shrink-0">
                                                    <i data-lucide="{{ $activityIcon }}"
                                                        class="w-5 h-5 lg:w-6 lg:h-6 text-white"></i>
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <h3 class="font-bold text-gray-800 text-sm lg:text-base">
                                                        {{ $activity->description }}</h3>
                                                    <p class="text-gray-600 text-xs lg:text-sm">{{ $activity->type }}
                                                    </p>
                                                    <p class="text-{{ $activityColor }}-600 text-xs mt-1">
                                                        {{ $activity->activity_date->diffForHumans() }}</p>
                                                </div>
                                                <div
                                                    class="text-{{ $activityColor }}-600 font-bold text-xs lg:text-sm">
                                                    @if ($activity->points_earned > 0)
                                                        +{{ $activity->points_earned }} poin
                                                    @elseif($activity->points_used > 0)
                                                        -{{ $activity->points_used }} poin
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="text-center py-8">
                                            <i data-lucide="activity" class="w-12 h-12 text-gray-400 mx-auto mb-4"></i>
                                            <p class="text-gray-600">Belum ada aktivitas terbaru</p>
                                        </div>
                                    @endif
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
                                        {{ $user->name }}</h3>
                                    <p class="text-gray-600 text-sm">{{ $user->member_level ?? 'Bronze' }} Member</p>
                                    <div class="flex items-center justify-center gap-1 mt-2">
                                        @php
                                            $stars = \App\Helpers\DashboardHelper::getMemberLevelStars(
                                                $user->member_level ?? 'Bronze',
                                            );
                                        @endphp
                                        @for ($i = 0; $i < 5; $i++)
                                            <i data-lucide="star"
                                                class="w-4 h-4 {{ $i < $stars ? 'text-yellow-500 fill-current' : 'text-gray-300' }}"></i>
                                        @endfor
                                    </div>
                                </div>

                                <div class="space-y-3 lg:space-y-4 mb-6">
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600 text-sm">Poin Aktif</span>
                                        <span class="font-semibold text-gray-800 text-sm" id="profile-active-points">
                                            {{ number_format($user->points ?? 0) }} poin
                                        </span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600 text-sm">Total Kunjungan</span>
                                        <span class="font-semibold text-gray-800 text-sm">
                                            {{ $user->total_visits ?? 0 }} kali
                                        </span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600 text-sm">Poin Terpakai</span>
                                        <span class="font-semibold text-orange-600 text-sm" id="profile-used-points">
                                            {{ number_format($user->points_used ?? 0) }} poin
                                        </span>
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
                                    <button onclick="window.location.href='{{ route('tickets.create') }}'"
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

                                    <button onclick="window.location.href='{{ route('reward.index') }}'"
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
                    </div>
                </div>

                <!-- Weather Section - Full Width -->
                <section class="group relative gsap-fade-up mt-6 lg:mt-8">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-white/10 to-white/5 rounded-2xl lg:rounded-3xl blur-xl opacity-75">
                    </div>
                    <div
                        class="relative bg-white/95 backdrop-blur-sm rounded-2xl lg:rounded-3xl p-6 lg:p-8 shadow-xl border border-white/20 w-full">
                        <h3 class="text-lg lg:text-xl font-black text-gray-800 mb-6 flex items-center gap-2">
                            <i data-lucide="cloud-sun" class="w-5 h-5 text-blue-600"></i>
                            Cuaca Hari Ini & Besok (Fajar World Fantasy)
                        </h3>

                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8" id="weather-content">
                            <!-- Today's Weather -->
                            <div
                                class="text-center bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl lg:rounded-2xl p-6 lg:p-8">
                                <h4 class="font-bold text-gray-800 mb-4 text-sm lg:text-base">Hari Ini</h4>
                                <div class="flex items-center justify-center gap-4 mb-4">
                                    <i id="weather-icon-today" data-lucide="sun"
                                        class="w-12 h-12 lg:w-16 lg:h-16 text-yellow-500"></i>
                                    <div>
                                        <div id="weather-temp-today"
                                            class="text-2xl lg:text-3xl font-black text-gray-800">--°C</div>
                                        <div id="weather-desc-today" class="text-gray-600 text-sm">Memuat...</div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-3 text-xs lg:text-sm">
                                    <div class="text-center">
                                        <i data-lucide="thermometer" class="w-4 h-4 text-blue-500 mx-auto mb-1"></i>
                                        <div id="temp-min-today" class="text-gray-600">Min: --°C</div>
                                    </div>
                                    <div class="text-center">
                                        <i data-lucide="thermometer" class="w-4 h-4 text-red-500 mx-auto mb-1"></i>
                                        <div id="temp-max-today" class="text-gray-600">Max: --°C</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Weather Details -->
                            <div
                                class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl lg:rounded-2xl p-6 lg:p-8">
                                <h4 class="font-bold text-gray-800 mb-4 text-sm lg:text-base">Detail Cuaca</h4>
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <i data-lucide="wind" class="w-4 h-4 text-blue-500"></i>
                                            <span class="text-gray-600 text-sm">Kecepatan Angin</span>
                                        </div>
                                        <span id="wind-speed" class="font-semibold text-gray-800 text-sm">--
                                            km/h</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <i data-lucide="droplets" class="w-4 h-4 text-cyan-500"></i>
                                            <span class="text-gray-600 text-sm">Kelembapan</span>
                                        </div>
                                        <span id="humidity" class="font-semibold text-gray-800 text-sm">--%</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <i data-lucide="eye" class="w-4 h-4 text-purple-500"></i>
                                            <span class="text-gray-600 text-sm">Kondisi</span>
                                        </div>
                                        <span id="conditions" class="font-semibold text-gray-800 text-sm">--</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Tomorrow's Weather -->
                            <div
                                class="text-center bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl lg:rounded-2xl p-6 lg:p-8">
                                <h4 class="font-bold text-gray-800 mb-4 text-sm lg:text-base">Besok</h4>
                                <div class="flex items-center justify-center gap-4 mb-4">
                                    <i id="weather-icon-tomorrow" data-lucide="cloud"
                                        class="w-12 h-12 lg:w-16 lg:h-16 text-gray-500"></i>
                                    <div>
                                        <div id="weather-temp-tomorrow"
                                            class="text-2xl lg:text-3xl font-black text-gray-800">--°C</div>
                                        <div id="weather-desc-tomorrow" class="text-gray-600 text-sm">Memuat...</div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-3 text-xs lg:text-sm">
                                    <div class="text-center">
                                        <i data-lucide="thermometer" class="w-4 h-4 text-blue-500 mx-auto mb-1"></i>
                                        <div id="temp-min-tomorrow" class="text-gray-600">Min: --°C</div>
                                    </div>
                                    <div class="text-center">
                                        <i data-lucide="thermometer" class="w-4 h-4 text-red-500 mx-auto mb-1"></i>
                                        <div id="temp-max-tomorrow" class="text-gray-600">Max: --°C</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Weather Summary -->
                        <div id="weather-summary"
                            class="bg-gradient-to-r from-green-100 to-emerald-100 rounded-xl p-4 mt-6 text-green-800 font-semibold text-sm text-center">
                            <i data-lucide="loader" class="w-4 h-4 inline mr-1 animate-spin"></i>
                            Mengambil data cuaca...
                        </div>
                    </div>
                </section>
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
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Lucide icons
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }

            // Initialize GSAP
            if (typeof gsap !== 'undefined') {
                gsap.registerPlugin(ScrollTrigger);
                initAnimations();
                initInteractiveElements();
                initCountUpAnimations();
            }

            // Load real stats from API
            loadRealStats();

            // Load weather data
            loadWeatherData();
        });

        function initAnimations() {
            const tl = gsap.timeline();

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
                .to('.gsap-scale', {
                    opacity: 1,
                    scale: 1,
                    duration: 0.8,
                    stagger: 0.1,
                    ease: "back.out(1.4)"
                }, "-=0.3")
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
            });
        }

        function initCountUpAnimations() {
            const visits = parseInt(document.getElementById('visits-count').textContent) || 0;
            const dailyPoints = parseInt(document.getElementById('daily-points-count').textContent.replace(/,/g, '')) || 0;
            const activeTickets = parseInt(document.getElementById('active-tickets-count').textContent) || 0;

            const statsData = [{
                    selector: '#visits-count',
                    value: visits
                },
                {
                    selector: '#daily-points-count',
                    value: dailyPoints,
                    useComma: true
                },
                {
                    selector: '#active-tickets-count',
                    value: activeTickets
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
                            const currentValue = Math.round(this.targets()[0].value);
                            element.textContent = stat.useComma ? currentValue.toLocaleString() :
                                currentValue;
                        }
                    });
                }
            });
        }

        async function loadRealStats() {
            try {
                const response = await fetch('{{ route('dashboard.stats') }}');
                const stats = await response.json();

                // Update stats dengan animasi smooth
                if (stats.daily_points !== undefined) {
                    animateValue('daily-points-count', 0, stats.daily_points, 1500, true);
                }

                if (stats.total_visits !== undefined) {
                    animateValue('visits-count', 0, stats.total_visits, 1500, false);
                }

                if (stats.active_tickets !== undefined) {
                    animateValue('active-tickets-count', 0, stats.active_tickets, 1500, false);
                }

                // Update profile points
                if (stats.points_active !== undefined) {
                    const activePointsEl = document.getElementById('profile-active-points');
                    if (activePointsEl) {
                        activePointsEl.textContent = stats.points_active.toLocaleString() + ' poin';
                    }
                }

                if (stats.points_lifetime !== undefined) {
                    const lifetimePointsEl = document.getElementById('profile-lifetime-points');
                    if (lifetimePointsEl) {
                        lifetimePointsEl.textContent = stats.points_lifetime.toLocaleString() + ' poin';
                    }
                }

            } catch (error) {
                console.log('Error loading stats:', error);
            }
        }

        // Helper function untuk animasi angka
        function animateValue(id, start, end, duration, useComma = false) {
            const element = document.getElementById(id);
            if (!element) return;

            const range = end - start;
            const increment = range / (duration / 16);
            let current = start;

            const timer = setInterval(() => {
                current += increment;
                if ((increment > 0 && current >= end) || (increment < 0 && current <= end)) {
                    current = end;
                    clearInterval(timer);
                }

                const displayValue = Math.round(current);
                element.textContent = useComma ? displayValue.toLocaleString() : displayValue;
            }, 16);
        }

        async function loadWeatherData() {
            const LAT = -6.3971493;
            const LON = 106.9650053;

            const mapWeatherCode = (code) => {
                const map = {
                    0: {
                        text: 'Cerah',
                        icon: 'sun',
                        color: 'text-yellow-500'
                    },
                    1: {
                        text: 'Cerah Berawan',
                        icon: 'cloud-sun',
                        color: 'text-yellow-400'
                    },
                    2: {
                        text: 'Berawan',
                        icon: 'cloud',
                        color: 'text-gray-500'
                    },
                    3: {
                        text: 'Mendung',
                        icon: 'cloud',
                        color: 'text-gray-600'
                    },
                    45: {
                        text: 'Kabut',
                        icon: 'cloud-fog',
                        color: 'text-gray-400'
                    },
                    61: {
                        text: 'Hujan Ringan',
                        icon: 'cloud-drizzle',
                        color: 'text-blue-500'
                    },
                    63: {
                        text: 'Hujan Sedang',
                        icon: 'cloud-rain',
                        color: 'text-blue-600'
                    },
                    65: {
                        text: 'Hujan Lebat',
                        icon: 'cloud-rain',
                        color: 'text-blue-700'
                    },
                    80: {
                        text: 'Hujan Lokal',
                        icon: 'cloud-rain',
                        color: 'text-blue-600'
                    },
                    95: {
                        text: 'Badai Petir',
                        icon: 'cloud-lightning',
                        color: 'text-yellow-600'
                    },
                };
                return map[code] || {
                    text: 'Tidak Diketahui',
                    icon: 'cloud',
                    color: 'text-gray-500'
                };
            };

            const url =
                `https://api.open-meteo.com/v1/forecast?latitude=${LAT}&longitude=${LON}&hourly=temperature_2m,relativehumidity_2m,windspeed_10m,weathercode&daily=temperature_2m_max,temperature_2m_min,weathercode&forecast_days=2&timezone=Asia%2FJakarta&windspeed_unit=kmh`;

            try {
                const res = await fetch(url);
                const data = await res.json();

                // Check if required data exists
                if (!data.daily || !data.hourly) {
                    throw new Error('Data cuaca tidak lengkap');
                }

                const today = {
                    tempMin: data.daily.temperature_2m_min[0],
                    tempMax: data.daily.temperature_2m_max[0],
                    wc: data.daily.weathercode[0],
                    humidity: Math.round(data.hourly.relativehumidity_2m.slice(0, 24).reduce((a, b) => a + b) / 24),
                    wind: Math.round(data.hourly.windspeed_10m.slice(0, 24).reduce((a, b) => a + b) / 24)
                };
                const tomorrow = {
                    tempMin: data.daily.temperature_2m_min[1],
                    tempMax: data.daily.temperature_2m_max[1],
                    wc: data.daily.weathercode[1],
                    humidity: Math.round(data.hourly.relativehumidity_2m.slice(24, 48).reduce((a, b) => a + b) /
                        24),
                    wind: Math.round(data.hourly.windspeed_10m.slice(24, 48).reduce((a, b) => a + b) / 24)
                };

                const nowAvg = Math.round((today.tempMin + today.tempMax) / 2);
                const wcToday = mapWeatherCode(today.wc);
                const wcTomorrow = mapWeatherCode(tomorrow.wc);

                // Safe element updates with null checks
                const updateElement = (id, value) => {
                    const element = document.getElementById(id);
                    if (element) element.textContent = value;
                };

                const updateIcon = (id, icon, color) => {
                    const element = document.getElementById(id);
                    if (element) {
                        element.setAttribute("data-lucide", icon);
                        element.className = `w-12 h-12 lg:w-16 lg:h-16 ${color}`;
                    }
                };

                // Update Today's Weather
                updateIcon('weather-icon-today', wcToday.icon, wcToday.color);
                updateElement('weather-temp-today', `${nowAvg}°C`);
                updateElement('weather-desc-today', wcToday.text);
                updateElement('temp-min-today', `Min: ${today.tempMin}°C`);
                updateElement('temp-max-today', `Max: ${today.tempMax}°C`);

                // Update Tomorrow's Weather
                const tomorrowAvg = Math.round((tomorrow.tempMin + tomorrow.tempMax) / 2);
                updateIcon('weather-icon-tomorrow', wcTomorrow.icon, wcTomorrow.color);
                updateElement('weather-temp-tomorrow', `${tomorrowAvg}°C`);
                updateElement('weather-desc-tomorrow', wcTomorrow.text);
                updateElement('temp-min-tomorrow', `Min: ${tomorrow.tempMin}°C`);
                updateElement('temp-max-tomorrow', `Max: ${tomorrow.tempMax}°C`);

                // Update Weather Details
                updateElement('wind-speed', `${today.wind} km/h`);
                updateElement('humidity', `${today.humidity}%`);
                updateElement('conditions', wcToday.text);

                // Update Summary
                const summaryElement = document.getElementById('weather-summary');
                if (summaryElement) {
                    summaryElement.innerHTML = `
                <i data-lucide="thermometer" class="w-4 h-4 inline mr-1"></i>
                Hari ini ${wcToday.text.toLowerCase()} dengan suhu antara <b>${today.tempMin}°C - ${today.tempMax}°C</b>,
                kelembapan rata-rata <b>${today.humidity}%</b>, kecepatan angin <b>${today.wind} km/h</b>.
                Besok: suhu <b>${tomorrow.tempMin}°C - ${tomorrow.tempMax}°C</b>, ${wcTomorrow.text.toLowerCase()}.
            `;
                }

                // Reinitialize Lucide icons
                if (typeof lucide !== 'undefined') {
                    lucide.createIcons();
                }

            } catch (err) {
                console.error('Error loading weather data:', err);
                const summaryElement = document.getElementById('weather-summary');
                if (summaryElement) {
                    summaryElement.innerHTML = `
                <i data-lucide="alert-triangle" class="w-4 h-4 inline mr-1 text-red-500"></i>
                Gagal memuat data cuaca. Silakan refresh halaman.
            `;
                }

                if (typeof lucide !== 'undefined') {
                    lucide.createIcons();
                }
            }
        }
    </script>
</x-app-layout>
