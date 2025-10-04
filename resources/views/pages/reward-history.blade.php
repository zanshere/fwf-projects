@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <div class="relative h-96 bg-gradient-to-r from-green-800 via-green-600 to-green-900 overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-30"></div>
        <div class="absolute inset-0 bg-[url('/images/jungle-pattern.png')] opacity-10"></div>

        <div class="relative z-10 container mx-auto px-6 h-full flex items-center justify-center text-center">
            <div class="gsap-fade-up">
                <h1 class="text-5xl md:text-6xl font-black text-white mb-4 text-reveal">
                    Riwayat Penukaran Reward
                </h1>
                <p class="text-xl text-green-100 max-w-2xl mx-auto gsap-fade-up">
                    Jelajahi semua penukaran reward yang telah Anda lakukan di Fajar World
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
                <button onclick="filterStatus('all')"
                    class="filter-btn active px-6 py-3 rounded-full font-semibold transition-all duration-300 bg-yellow-400 text-green-900 shadow-lg">
                    <i data-lucide="grid" class="w-4 h-4 inline mr-2"></i>Semua Status
                </button>
                <button onclick="filterStatus('pending')"
                    class="filter-btn px-6 py-3 rounded-full font-semibold transition-all duration-300 bg-gray-100 text-gray-700 hover:bg-yellow-100 hover:text-yellow-700">
                    <i data-lucide="clock" class="w-4 h-4 inline mr-2"></i>Menunggu
                </button>
                <button onclick="filterStatus('approved')"
                    class="filter-btn px-6 py-3 rounded-full font-semibold transition-all duration-300 bg-gray-100 text-gray-700 hover:bg-green-100 hover:text-green-700">
                    <i data-lucide="check-circle" class="w-4 h-4 inline mr-2"></i>Disetujui
                </button>
                <button onclick="filterStatus('completed')"
                    class="filter-btn px-6 py-3 rounded-full font-semibold transition-all duration-300 bg-gray-100 text-gray-700 hover:bg-blue-100 hover:text-blue-700">
                    <i data-lucide="package" class="w-4 h-4 inline mr-2"></i>Selesai
                </button>
                <button onclick="filterStatus('rejected')"
                    class="filter-btn px-6 py-3 rounded-full font-semibold transition-all duration-300 bg-gray-100 text-gray-700 hover:bg-red-100 hover:text-red-700">
                    <i data-lucide="x-circle" class="w-4 h-4 inline mr-2"></i>Ditolak
                </button>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="container mx-auto px-6 py-12">
        <!-- Back Button -->
        <div class="mb-8 gsap-fade-up">
            <a href="{{ route('reward.index') }}"
               class="inline-flex items-center bg-gradient-to-r from-green-600 to-green-800 text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                Kembali ke Reward Center
            </a>
        </div>

        <!-- Stats Summary -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="text-center gsap-scale">
                <div class="bg-white rounded-2xl shadow-lg p-6 transform hover:scale-105 transition-all duration-300 border-2 border-green-200">
                    <div class="text-3xl font-black text-green-600 mb-2" data-count="{{ $redemptions->total() }}">0</div>
                    <div class="text-gray-600 font-semibold">Total Penukaran</div>
                </div>
            </div>
            <div class="text-center gsap-scale">
                <div class="bg-white rounded-2xl shadow-lg p-6 transform hover:scale-105 transition-all duration-300 border-2 border-yellow-200">
                    <div class="text-3xl font-black text-yellow-600 mb-2">
                        {{ $redemptions->where('status', 'pending')->count() }}
                    </div>
                    <div class="text-gray-600 font-semibold">Menunggu</div>
                </div>
            </div>
            <div class="text-center gsap-scale">
                <div class="bg-white rounded-2xl shadow-lg p-6 transform hover:scale-105 transition-all duration-300 border-2 border-green-200">
                    <div class="text-3xl font-black text-green-600 mb-2">
                        {{ $redemptions->where('status', 'completed')->count() }}
                    </div>
                    <div class="text-gray-600 font-semibold">Selesai</div>
                </div>
            </div>
            <div class="text-center gsap-scale">
                <div class="bg-white rounded-2xl shadow-lg p-6 transform hover:scale-105 transition-all duration-300 border-2 border-red-200">
                    <div class="text-3xl font-black text-red-600 mb-2">
                        {{ $redemptions->where('status', 'rejected')->count() }}
                    </div>
                    <div class="text-gray-600 font-semibold">Ditolak</div>
                </div>
            </div>
        </div>

        <!-- Redemption History Grid -->
        <div id="history-grid" class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            @forelse($redemptions as $redemption)
            <div class="history-item gsap-scale" data-status="{{ $redemption->status }}">
                <div class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border-2 border-gray-100">
                    <!-- Reward Header -->
                    <div class="flex items-center justify-between p-6 bg-gradient-to-r from-gray-50 to-white border-b">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-gradient-to-br {{ $redemption->reward->color }} rounded-xl flex items-center justify-center shadow-lg">
                                <i data-lucide="{{ $redemption->reward->icon }}" class="w-6 h-6 text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-black text-gray-800">{{ $redemption->reward->name }}</h3>
                                <p class="text-gray-600 text-sm">{{ $redemption->reward->description }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-2xl font-black text-red-600">-{{ number_format($redemption->points_used) }}</div>
                            <div class="text-sm text-gray-500">Poin</div>
                        </div>
                    </div>

                    <!-- Status Badge -->
                    <div class="absolute top-4 right-4">
                        @switch($redemption->status)
                            @case('pending')
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-yellow-100 text-yellow-800 border border-yellow-300">
                                    <i data-lucide="clock" class="w-4 h-4 mr-2"></i>
                                    Menunggu
                                </span>
                                @break
                            @case('approved')
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-green-100 text-green-800 border border-green-300">
                                    <i data-lucide="check-circle" class="w-4 h-4 mr-2"></i>
                                    Disetujui
                                </span>
                                @break
                            @case('rejected')
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-red-100 text-red-800 border border-red-300">
                                    <i data-lucide="x-circle" class="w-4 h-4 mr-2"></i>
                                    Ditolak
                                </span>
                                @break
                            @case('completed')
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-blue-100 text-blue-800 border border-blue-300">
                                    <i data-lucide="package" class="w-4 h-4 mr-2"></i>
                                    Selesai
                                </span>
                                @break
                        @endswitch
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <div class="text-sm text-gray-500">Tanggal Penukaran</div>
                                <div class="font-semibold text-gray-800">{{ $redemption->redeemed_at->format('d M Y H:i') }}</div>
                            </div>
                            <div>
                                <div class="text-sm text-gray-500">Diproses Pada</div>
                                <div class="font-semibold text-gray-800">
                                    {{ $redemption->processed_at ? $redemption->processed_at->format('d M Y H:i') : 'Belum diproses' }}
                                </div>
                            </div>
                        </div>

                        @if($redemption->notes)
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <div class="text-sm text-gray-500 mb-1">Catatan Admin:</div>
                            <div class="text-gray-800">{{ $redemption->notes }}</div>
                        </div>
                        @endif
                    </div>

                    <!-- Action Buttons -->
                    <div class="px-6 pb-6">
                        @if($redemption->status === 'approved')
                        <button onclick="showCollectionInfo('{{ $redemption->reward->name }}')"
                            class="w-full bg-gradient-to-r from-green-600 to-green-800 text-white font-bold py-3 px-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                            <span class="flex items-center justify-center gap-2">
                                <i data-lucide="map-pin" class="w-4 h-4"></i>
                                Info Pengambilan
                            </span>
                        </button>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-2 text-center py-16 gsap-scale">
                <div class="w-24 h-24 bg-gradient-to-br from-gray-300 to-gray-400 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i data-lucide="package" class="w-12 h-12 text-white"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-600 mb-4">Belum Ada Riwayat Penukaran</h3>
                <p class="text-gray-500 mb-8 max-w-md mx-auto">
                    Anda belum pernah menukarkan poin untuk mendapatkan reward. Mulai jelajahi reward center dan dapatkan hadiah menarik!
                </p>
                <a href="{{ route('reward.index') }}"
                   class="inline-flex items-center bg-gradient-to-r from-green-600 to-green-800 text-white px-8 py-4 rounded-full font-bold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                    <i data-lucide="gift" class="w-5 h-5 mr-2"></i>
                    Jelajahi Reward Center
                </a>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($redemptions->hasPages())
        <div class="mt-12 gsap-fade-up">
            <div class="bg-white rounded-2xl shadow-lg p-6">
                {{ $redemptions->links() }}
            </div>
        </div>
        @endif
    </div>

    {{-- Statistics Section --}}
    <div class="bg-gradient-to-r from-green-800 to-green-900 py-16 mt-16">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 gsap-fade-up">
                <h2 class="text-4xl font-black text-white mb-4">Pencapaian Reward Anda</h2>
                <p class="text-green-200 text-lg">Lihat seberapa aktif Anda dalam program reward Fajar World</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center gsap-scale">
                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-6 transform hover:scale-105 transition-all duration-300">
                        <div class="text-4xl font-black text-yellow-400 mb-2" data-count="{{ $redemptions->total() }}">0</div>
                        <div class="text-white font-semibold">Total Penukaran</div>
                    </div>
                </div>

                <div class="text-center gsap-scale">
                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-6 transform hover:scale-105 transition-all duration-300">
                        <div class="text-4xl font-black text-yellow-400 mb-2" data-count="{{ $redemptions->where('status', 'completed')->count() }}">0</div>
                        <div class="text-white font-semibold">Reward Selesai</div>
                    </div>
                </div>

                <div class="text-center gsap-scale">
                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-6 transform hover:scale-105 transition-all duration-300">
                        <div class="text-4xl font-black text-yellow-400 mb-2" data-count="{{ $redemptions->sum('points_used') }}">0</div>
                        <div class="text-white font-semibold">Poin Digunakan</div>
                    </div>
                </div>

                <div class="text-center gsap-scale">
                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-6 transform hover:scale-105 transition-all duration-300">
                        <div class="text-4xl font-black text-yellow-400 mb-2" data-count="{{ auth()->user()->points }}">0</div>
                        <div class="text-white font-semibold">Poin Saat Ini</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Collection Info Modal --}}
    <div id="collection-modal"
        class="fixed inset-0 bg-black bg-opacity-80 backdrop-blur-sm hidden items-center justify-center z-50 p-4">
        <div
            class="bg-white rounded-2xl max-w-md w-full max-h-[90vh] overflow-hidden transform scale-0 transition-transform duration-300">
            <div class="relative p-8">
                <button onclick="closeCollectionModal()"
                    class="absolute top-4 right-4 bg-gray-100 text-gray-600 p-2 rounded-full hover:bg-gray-200 transition-all duration-300">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>

                <div class="text-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-700 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="map-pin" class="w-8 h-8 text-white"></i>
                    </div>
                    <h3 class="text-2xl font-black text-gray-800 mb-2" id="modal-reward-name"></h3>
                    <p class="text-gray-600">Informasi Pengambilan Hadiah</p>
                </div>

                <div class="space-y-4">
                    <div class="bg-green-50 rounded-xl p-4 border border-green-200">
                        <div class="flex items-center gap-3">
                            <i data-lucide="map-pin" class="w-5 h-5 text-green-600"></i>
                            <div>
                                <div class="font-semibold text-green-800">Lokasi Pengambilan</div>
                                <div class="text-green-600">Customer Service Fajar World</div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-blue-50 rounded-xl p-4 border border-blue-200">
                        <div class="flex items-center gap-3">
                            <i data-lucide="clock" class="w-5 h-5 text-blue-600"></i>
                            <div>
                                <div class="font-semibold text-blue-800">Jam Operasional</div>
                                <div class="text-blue-600">09:00 - 17:00 (Setiap Hari)</div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-yellow-50 rounded-xl p-4 border border-yellow-200">
                        <div class="flex items-center gap-3">
                            <i data-lucide="info" class="w-5 h-5 text-yellow-600"></i>
                            <div>
                                <div class="font-semibold text-yellow-800">Persyaratan</div>
                                <div class="text-yellow-600">Tunjukkan QR Code dan KTP</div>
                            </div>
                        </div>
                    </div>
                </div>

                <button onclick="closeCollectionModal()"
                    class="w-full mt-6 bg-gradient-to-r from-green-600 to-green-800 text-white font-bold py-3 px-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    Tutup
                </button>
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
            initCounterAnimation();
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

        function initCounterAnimation() {
            const counters = document.querySelectorAll('[data-count]');

            counters.forEach(counter => {
                const target = parseInt(counter.dataset.count);
                const duration = 2000;
                const increment = target / (duration / 16);
                let current = 0;

                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        counter.textContent = target;
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current);
                    }
                }, 16);
            });
        }

        // Filter functionality
        function filterStatus(status) {
            const items = document.querySelectorAll('.history-item');
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
                if (status === 'all' || item.dataset.status === status) {
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

        // Modal functionality
        function showCollectionInfo(rewardName) {
            const modal = document.getElementById('collection-modal');
            document.getElementById('modal-reward-name').textContent = rewardName;

            modal.classList.remove('hidden');
            modal.classList.add('flex');

            // Animate modal in
            gsap.to(modal.querySelector('.bg-white'), {
                scale: 1,
                duration: 0.3,
                ease: "back.out(1.7)"
            });
        }

        function closeCollectionModal() {
            const modal = document.getElementById('collection-modal');
            const modalContent = modal.querySelector('.bg-white');

            gsap.to(modalContent, {
                scale: 0,
                duration: 0.2,
                ease: "back.in(1.7)",
                onComplete: () => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                }
            });
        }

        // Close modal when clicking outside
        document.getElementById('collection-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeCollectionModal();
            }
        });

        // Keyboard navigation for modal
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeCollectionModal();
            }
        });
    </script>
@endpush
