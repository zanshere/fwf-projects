@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <div class="relative h-96 bg-gradient-to-r from-green-800 via-green-600 to-green-900 overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-30"></div>
        <div class="absolute inset-0 bg-[url('/images/jungle-pattern.png')] opacity-10"></div>

        <div class="relative z-10 container mx-auto px-6 h-full flex items-center justify-center text-center">
            <div class="gsap-fade-up">
                <h1 class="text-5xl md:text-6xl font-black text-white mb-4 text-reveal">
                    Reward Center
                </h1>
                <p class="text-xl text-green-100 max-w-2xl mx-auto gsap-fade-up">
                    Tukarkan poin Anda dengan hadiah menarik! Setiap kunjungan dan transaksi memberi Anda poin reward.
                </p>
            </div>
        </div>

        {{-- Floating Elements --}}
        <div class="absolute top-10 left-10 w-20 h-20 bg-yellow-400 rounded-full opacity-20 gsap-scale"></div>
        <div class="absolute bottom-20 right-20 w-32 h-32 bg-green-300 rounded-full opacity-15 gsap-rotate"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-white rounded-full opacity-10 gsap-fade-left"></div>
    </div>

    {{-- Filter Navigation --}}
    <div class="bg-white shadow-md sticky top-0 z-30 border-b-4 border-yellow-400">
        <div class="container mx-auto px-6 py-4">
            <div class="flex flex-wrap justify-center gap-4 gsap-fade-up">
                <button onclick="filterReward('all')"
                    class="filter-btn active px-6 py-3 rounded-full font-semibold transition-all duration-300 bg-yellow-400 text-green-900 shadow-lg">
                    <i data-lucide="grid" class="w-4 h-4 inline mr-2"></i>Semua Hadiah
                </button>
                <button onclick="filterReward('tech')"
                    class="filter-btn px-6 py-3 rounded-full font-semibold transition-all duration-300 bg-gray-100 text-gray-700 hover:bg-blue-100 hover:text-blue-700">
                    <i data-lucide="smartphone" class="w-4 h-4 inline mr-2"></i>Teknologi
                </button>
                <button onclick="filterReward('electronics')"
                    class="filter-btn px-6 py-3 rounded-full font-semibold transition-all duration-300 bg-gray-100 text-gray-700 hover:bg-purple-100 hover:text-purple-700">
                    <i data-lucide="tv" class="w-4 h-4 inline mr-2"></i>Elektronik
                </button>
                <button onclick="filterReward('travel')"
                    class="filter-btn px-6 py-3 rounded-full font-semibold transition-all duration-300 bg-gray-100 text-gray-700 hover:bg-green-100 hover:text-green-700">
                    <i data-lucide="plane" class="w-4 h-4 inline mr-2"></i>Travel
                </button>
                <button onclick="filterReward('ticket')"
                    class="filter-btn px-6 py-3 rounded-full font-semibold transition-all duration-300 bg-gray-100 text-gray-700 hover:bg-red-100 hover:text-red-700">
                    <i data-lucide="ticket" class="w-4 h-4 inline mr-2"></i>Tiket
                </button>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="container mx-auto px-6 py-12">
        <!-- Points Balance Card -->
        <div class="max-w-4xl mx-auto mb-12 gsap-scale">
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-yellow-400/20 to-orange-400/20 rounded-2xl blur-xl opacity-75 group-hover:opacity-100 transition-opacity"></div>
                <div class="relative bg-white/95 backdrop-blur-sm rounded-2xl p-8 shadow-2xl hover:shadow-3xl transition-all duration-300 border-2 border-yellow-200">
                    <div class="text-center">
                        <div class="flex items-center justify-center gap-6 mb-6">
                            <div class="w-20 h-20 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-full flex items-center justify-center shadow-2xl">
                                <i data-lucide="star" class="w-10 h-10 text-white"></i>
                            </div>
                            <div class="text-left">
                                <p class="text-gray-600 text-lg">Total Poin Anda</p>
                                <h2 class="text-4xl lg:text-5xl font-black text-gray-800">
                                    {{ number_format(auth()->user()->points) }} Poin
                                </h2>
                                <p class="text-gray-600 mt-2">
                                    <i data-lucide="award" class="w-4 h-4 inline mr-1"></i>
                                    Level Member: <span class="font-bold text-green-600 text-lg">{{ auth()->user()->member_level }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Session Messages -->
        @if(session('success'))
            <div class="max-w-4xl mx-auto mb-8 p-6 bg-green-100 border-2 border-green-400 text-green-700 rounded-2xl gsap-fade-up">
                <div class="flex items-center">
                    <i data-lucide="check-circle" class="w-6 h-6 mr-3"></i>
                    <span class="font-semibold">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="max-w-4xl mx-auto mb-8 p-6 bg-red-100 border-2 border-red-400 text-red-700 rounded-2xl gsap-fade-up">
                <div class="flex items-center">
                    <i data-lucide="alert-circle" class="w-6 h-6 mr-3"></i>
                    <span class="font-semibold">{{ session('error') }}</span>
                </div>
            </div>
        @endif

        <!-- Rewards Grid -->
        <div id="rewards-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($rewards as $reward)
                @php
                    $userPoints = auth()->user()->points;
                    $canRedeem = $reward->canBeRedeemedBy(auth()->user());
                    $pointsNeeded = $reward->points_required - $userPoints;

                    // Determine category for filtering
                    $category = 'other';
                    if (str_contains(strtolower($reward->name), 'tiket')) {
                        $category = 'ticket';
                    } elseif (str_contains(strtolower($reward->name), 'android') || str_contains(strtolower($reward->name), 'iphone')) {
                        $category = 'tech';
                    } elseif (str_contains(strtolower($reward->name), 'tv')) {
                        $category = 'electronics';
                    } elseif (str_contains(strtolower($reward->name), 'wisata') || str_contains(strtolower($reward->name), 'travel')) {
                        $category = 'travel';
                    }
                @endphp

                <div class="reward-item gsap-scale" data-category="{{ $category }}">
                    <div class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border-2 border-gray-100">
                        <!-- Image Section -->
                        <div class="aspect-w-16 aspect-h-10 overflow-hidden">
                            @if($category === 'tech')
                                <img src="{{ asset('images/android.png') }}" alt="{{ $reward->name }}"
                                     class="w-full h-48 object-contain p-4 group-hover:scale-110 transition-transform duration-700 bg-gray-50">
                                     @elseif($category === 'tech')
                                <img src="{{ asset('images/iphone_17.png') }}" alt="{{ $reward->name }}"
                                     class="w-full h-48 object-contain p-4 group-hover:scale-110 transition-transform duration-700 bg-gray-50">
                            @elseif($category === 'electronics')
                                <img src="{{ asset('images/lg.png') }}" alt="{{ $reward->name }}"
                                     class="w-full h-48 object-contain p-4 group-hover:scale-110 transition-transform duration-700 bg-gray-50">
                                     @elseif($category === 'electronics')
                                <img src="{{ asset('images/lg.png') }}" alt="{{ $reward->name }}"
                                     class="w-full h-48 object-contain p-4 group-hover:scale-110 transition-transform duration-700 bg-gray-50">
                            @elseif($category === 'transportations')
                                <img src="{{ asset('images/ninja_h2.png') }}" alt="{{ $reward->name }}"
                                     class="w-full h-48 object-contain p-4 group-hover:scale-110 transition-transform duration-700 bg-gray-50">
                            @elseif($category === 'transportations')
                                <img src="{{ asset('images/vellfire.png') }}" alt="{{ $reward->name }}"
                                     class="w-full h-48 object-contain p-4 group-hover:scale-110 transition-transform duration-700 bg-gray-50">
                            @elseif($category === 'transportations')
                                <img src="{{ asset('images/agats.png') }}" alt="{{ $reward->name }}"
                                     class="w-full h-48 object-contain p-4 group-hover:scale-110 transition-transform duration-700 bg-gray-50">
                            @else
                                <div class="w-full h-48 bg-gradient-to-br {{ $reward->color }} flex items-center justify-center">
                                    <i data-lucide="{{ $reward->icon }}" class="w-16 h-16 text-white"></i>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>

                        <!-- Category Badge -->
                        <div class="absolute top-4 left-4">
                            @switch($category)
                                @case('tech')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-800 border border-blue-300">
                                        <i data-lucide="smartphone" class="w-3 h-3 mr-1"></i>Teknologi
                                    </span>
                                    @break
                                @case('electronics')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-purple-100 text-purple-800 border border-purple-300">
                                        <i data-lucide="tv" class="w-3 h-3 mr-1"></i>Elektronik
                                    </span>
                                    @break
                                @case('travel')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-800 border border-green-300">
                                        <i data-lucide="plane" class="w-3 h-3 mr-1"></i>Travel
                                    </span>
                                    @break
                                @case('ticket')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-800 border border-red-300">
                                        <i data-lucide="ticket" class="w-3 h-3 mr-1"></i>Tiket
                                    </span>
                                    @break
                            @endswitch
                        </div>

                        <!-- Points Badge -->
                        <div class="absolute top-4 right-4 bg-gradient-to-r from-yellow-500 to-orange-500 text-white px-3 py-1 rounded-full text-sm font-bold shadow-lg">
                            <i data-lucide="star" class="w-3 h-3 inline mr-1"></i>
                            {{ number_format($reward->points_required) }}
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-black text-gray-800 mb-2 group-hover:text-green-600 transition-colors">{{ $reward->name }}</h3>
                            <p class="text-gray-600 text-sm mb-4 leading-relaxed">{{ $reward->description }}</p>

                            <!-- Stock Information -->
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-gray-500 text-sm">Stok Tersedia:</span>
                                <span class="font-bold text-sm {{ $reward->available_stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $reward->available_stock }} unit
                                </span>
                            </div>

                            <!-- Redeem Button -->
                            @if($canRedeem)
                                <form method="POST" action="{{ route('reward.redeem', $reward->id) }}" class="redeem-form">
                                    @csrf
                                    <button type="submit"
                                        class="w-full group/btn bg-gradient-to-r {{ $reward->color }} text-white font-bold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                                        <span class="flex items-center justify-center gap-3">
                                            <i data-lucide="gift" class="w-5 h-5 group-hover/btn:rotate-12 transition-transform"></i>
                                            <span class="text-lg">Tukar Sekarang</span>
                                        </span>
                                    </button>
                                </form>
                            @else
                                <button disabled
                                    class="w-full bg-gray-300 text-gray-500 font-bold py-4 px-6 rounded-xl cursor-not-allowed shadow-lg">
                                    <span class="flex items-center justify-center gap-3">
                                        <i data-lucide="lock" class="w-5 h-5"></i>
                                        <span class="text-lg">
                                            @if($userPoints < $reward->points_required)
                                                Poin Tidak Cukup
                                            @else
                                                Stok Habis
                                            @endif
                                        </span>
                                    </span>
                                </button>
                                @if($userPoints < $reward->points_required)
                                    <p class="text-red-500 text-sm text-center mt-3 font-semibold">
                                        Butuh {{ number_format($pointsNeeded) }} poin lagi
                                    </p>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Quick Actions -->
        <div class="max-w-4xl mx-auto mt-16 gsap-fade-up">
            <div class="grid md:grid-cols-2 gap-8">
                <!-- How It Works -->
                <div class="group relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-green-500/10 to-blue-500/10 rounded-2xl blur-xl opacity-75"></div>
                    <div class="relative bg-white/95 backdrop-blur-sm rounded-2xl p-8 shadow-2xl border-2 border-green-200">
                        <h2 class="text-2xl font-black text-gray-800 mb-6 text-center">
                            <i data-lucide="help-circle" class="w-6 h-6 inline mr-2 text-green-600"></i>
                            Cara Menukarkan Poin
                        </h2>
                        <div class="space-y-4">
                            <div class="flex items-start gap-4 p-4 bg-green-50 rounded-xl border border-green-200">
                                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-white text-sm font-bold">1</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Kumpulkan Poin</h4>
                                    <p class="text-gray-600 text-sm mt-1">Kunjungi Fajar World dan lakukan transaksi untuk mendapatkan poin reward</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4 p-4 bg-yellow-50 rounded-xl border border-yellow-200">
                                <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-white text-sm font-bold">2</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Pilih Hadiah</h4>
                                    <p class="text-gray-600 text-sm mt-1">Pilih hadiah yang ingin ditukar dan pastikan poin Anda mencukupi</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4 p-4 bg-purple-50 rounded-xl border border-purple-200">
                                <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-white text-sm font-bold">3</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Tukar & Terima</h4>
                                    <p class="text-gray-600 text-sm mt-1">Klik tombol tukar dan tunggu persetujuan, lalu ambil hadiah di lokasi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- History & Actions -->
                <div class="group relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500/10 to-purple-500/10 rounded-2xl blur-xl opacity-75"></div>
                    <div class="relative bg-white/95 backdrop-blur-sm rounded-2xl p-8 shadow-2xl border-2 border-blue-200">
                        <h2 class="text-2xl font-black text-gray-800 mb-6 text-center">
                            <i data-lucide="history" class="w-6 h-6 inline mr-2 text-blue-600"></i>
                            Riwayat & Status
                        </h2>
                        <div class="space-y-6">
                            <div class="text-center">
                                <div class="text-3xl font-black text-blue-600 mb-2">{{ $userRedemptions->count() }}</div>
                                <div class="text-gray-600 font-semibold">Total Penukaran</div>
                            </div>
                            <a href="{{ route('reward.history') }}"
                               class="w-full bg-gradient-to-r from-blue-500 to-cyan-500 text-white font-bold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 block text-center">
                                <span class="flex items-center justify-center gap-3">
                                    <i data-lucide="list" class="w-5 h-5"></i>
                                    <span class="text-lg">Lihat Riwayat Lengkap</span>
                                </span>
                            </a>
                            <p class="text-gray-500 text-sm text-center">
                                Pantau status penukaran reward dan informasi pengambilan hadiah
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/ScrollTrigger.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Lucide icons
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }

            // Initialize animations
            initAnimations();
            initFilterFunctionality();
        });

        function initAnimations() {
            // Header animation
            gsap.to('.gsap-fade-up', {
                opacity: 1,
                y: 0,
                duration: 1,
                stagger: 0.2,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: '.gsap-fade-up',
                    start: 'top 80%',
                }
            });

            // Scale animations
            gsap.to('.gsap-scale', {
                opacity: 1,
                scale: 1,
                duration: 0.8,
                stagger: 0.1,
                ease: "back.out(1.4)",
                scrollTrigger: {
                    trigger: '.gsap-scale',
                    start: 'top 85%',
                }
            });
        }

        function initFilterFunctionality() {
            // Filter functionality
            function filterReward(category) {
                const items = document.querySelectorAll('.reward-item');
                const buttons = document.querySelectorAll('.filter-btn');

                // Update button states
                buttons.forEach(btn => {
                    btn.classList.remove('active', 'bg-yellow-400', 'text-green-900');
                    btn.classList.add('bg-gray-100', 'text-gray-700');
                });

                event.target.classList.add('active', 'bg-yellow-400', 'text-green-900');
                event.target.classList.remove('bg-gray-100', 'text-gray-700');

                // Filter items with animation
                items.forEach(item => {
                    if (category === 'all' || item.dataset.category === category) {
                        gsap.to(item, {
                            opacity: 1,
                            scale: 1,
                            duration: 0.5,
                            display: 'block'
                        });
                    } else {
                        gsap.to(item, {
                            opacity: 0,
                            scale: 0.8,
                            duration: 0.3,
                            onComplete: () => {
                                item.style.display = 'none';
                            }
                        });
                    }
                });
            }

            // Add confirmation to redeem forms
            document.querySelectorAll('.redeem-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    const rewardName = this.closest('.reward-item').querySelector('h3').textContent;
                    const pointsRequired = this.closest('.reward-item').querySelector('.bg-gradient-to-r').textContent;

                    if (!confirm(`Anda yakin ingin menukar ${pointsRequired} poin untuk ${rewardName}?`)) {
                        e.preventDefault();
                    }
                });
            });

            // Make filter function global
            window.filterReward = filterReward;
        }
    </script>
@endpush
