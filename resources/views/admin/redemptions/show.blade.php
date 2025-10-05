@extends('layouts.admin')

@section('title', 'Detail Reward - ' . $reward->name)

@section('content')
    {{-- Hero Section --}}
    <div class="relative bg-gradient-to-r from-green-800 via-green-600 to-green-900 py-16 overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-30"></div>
        <div class="absolute inset-0 bg-[url('/images/jungle-pattern.png')] opacity-10"></div>

        <div class="relative z-10 container mx-auto px-6">
            <div class="flex items-center justify-between">
                <div class="gsap-fade-left">
                    <div class="flex items-center gap-4 mb-4">
                        <a href="{{ route('admin.rewards.redemptions') }}"
                           class="inline-flex items-center text-green-200 hover:text-white transition-colors duration-300">
                            <i data-lucide="arrow-left" class="w-5 h-5 mr-2"></i>
                            Kembali ke Daftar Reward
                        </a>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-black text-white mb-4">
                        <i data-lucide="gift" class="w-8 h-8 md:w-10 md:h-10 inline-block mr-3 text-yellow-400"></i>
                        Detail Reward
                    </h1>
                    <p class="text-xl text-green-100 max-w-2xl">
                        Kelola dan pantau detail reward {{ $reward->name }}
                    </p>
                </div>
                <div class="gsap-fade-right">
                    <div class="w-20 h-20 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-2xl flex items-center justify-center shadow-2xl">
                        <i data-lucide="{{ $reward->icon }}" class="w-10 h-10 text-white"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Floating Elements --}}
        <div class="absolute top-10 left-10 w-20 h-20 bg-yellow-400 rounded-full opacity-20 gsap-scale"></div>
        <div class="absolute bottom-10 right-20 w-32 h-32 bg-green-300 rounded-full opacity-15 gsap-rotate"></div>
    </div>

    {{-- Main Content --}}
    <div class="container mx-auto px-6 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Left Column: Reward Details --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Reward Information Card --}}
                <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden gsap-fade-up">
                    <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                        <h2 class="text-xl font-black text-gray-800">
                            <i data-lucide="info" class="w-5 h-5 inline mr-2 text-green-600"></i>
                            Informasi Reward
                        </h2>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-600 mb-2">Nama Reward</label>
                                <p class="text-lg font-bold text-gray-800">{{ $reward->name }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-600 mb-2">Status</label>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold {{ $reward->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    <i data-lucide="{{ $reward->is_active ? 'check-circle' : 'x-circle' }}" class="w-4 h-4 mr-1"></i>
                                    {{ $reward->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-600 mb-2">Poin Diperlukan</label>
                                <p class="text-2xl font-black text-green-600">{{ number_format($reward->points_required) }} Poin</p>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-600 mb-2">Stok Tersedia</label>
                                <p class="text-2xl font-black {{ $reward->available_stock > 0 ? 'text-blue-600' : 'text-red-600' }}">
                                    {{ $reward->available_stock }} / {{ $reward->stock }}
                                </p>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-600 mb-2">Deskripsi</label>
                                <p class="text-gray-700 leading-relaxed">{{ $reward->description }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-600 mb-2">Icon</label>
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br {{ $reward->color }} rounded-xl flex items-center justify-center">
                                        <i data-lucide="{{ $reward->icon }}" class="w-6 h-6 text-white"></i>
                                    </div>
                                    <span class="text-gray-700 font-mono">{{ $reward->icon }}</span>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-600 mb-2">Warna</label>
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 {{ $reward->color }} rounded-xl border border-gray-300"></div>
                                    <span class="text-gray-700 font-mono">{{ $reward->color }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Redemption Statistics --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-200 p-6 text-center gsap-scale">
                        <div class="text-3xl font-black text-green-600 mb-2">{{ $reward->redemptions->count() }}</div>
                        <div class="text-gray-600 font-semibold">Total Penukaran</div>
                    </div>
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-200 p-6 text-center gsap-scale">
                        <div class="text-3xl font-black text-blue-600 mb-2">
                            {{ $reward->redemptions->where('status', 'completed')->count() }}
                        </div>
                        <div class="text-gray-600 font-semibold">Selesai</div>
                    </div>
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-200 p-6 text-center gsap-scale">
                        <div class="text-3xl font-black text-yellow-600 mb-2">
                            {{ $reward->redemptions->where('status', 'pending')->count() }}
                        </div>
                        <div class="text-gray-600 font-semibold">Menunggu</div>
                    </div>
                </div>

                {{-- Recent Redemptions --}}
                <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden gsap-fade-up">
                    <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                        <h2 class="text-xl font-black text-gray-800">
                            <i data-lucide="history" class="w-5 h-5 inline mr-2 text-blue-600"></i>
                            Penukaran Terbaru
                        </h2>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">User</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($reward->redemptions()->latest()->take(5)->get() as $redemption)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 bg-gradient-to-br from-green-500 to-green-700 rounded-full flex items-center justify-center text-white font-bold text-sm">
                                                {{ substr($redemption->user->name, 0, 1) }}
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $redemption->user->name }}</div>
                                                <div class="text-sm text-gray-500">{{ $redemption->user->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @switch($redemption->status)
                                            @case('pending')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-yellow-100 text-yellow-800">
                                                    <i data-lucide="clock" class="w-4 h-4 mr-1"></i>
                                                    Menunggu
                                                </span>
                                                @break
                                            @case('approved')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-green-100 text-green-800">
                                                    <i data-lucide="check-circle" class="w-4 h-4 mr-1"></i>
                                                    Disetujui
                                                </span>
                                                @break
                                            @case('rejected')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-red-100 text-red-800">
                                                    <i data-lucide="x-circle" class="w-4 h-4 mr-1"></i>
                                                    Ditolak
                                                </span>
                                                @break
                                            @case('completed')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-blue-100 text-blue-800">
                                                    <i data-lucide="package" class="w-4 h-4 mr-1"></i>
                                                    Selesai
                                                </span>
                                                @break
                                        @endswitch
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $redemption->redeemed_at->format('d M Y H:i') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button onclick="showRedemptionDetail({{ $redemption->id }})"
                                                class="text-green-600 hover:text-green-900 transition-colors duration-300">
                                            <i data-lucide="eye" class="w-4 h-4"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                                        <i data-lucide="package" class="w-12 h-12 mx-auto mb-3 text-gray-400"></i>
                                        <p>Belum ada penukaran untuk reward ini</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Right Column: Actions & Quick Stats --}}
            <div class="space-y-6">
                {{-- Quick Actions --}}
                <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden gsap-fade-left">
                    <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                        <h2 class="text-xl font-black text-gray-800">
                            <i data-lucide="settings" class="w-5 h-5 inline mr-2 text-purple-600"></i>
                            Kelola Reward
                        </h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <a href="{{ route('admin.rewards.edit', $reward) }}"
                           class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold py-3 px-4 rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
                            <i data-lucide="edit" class="w-4 h-4"></i>
                            Edit Reward
                        </a>

                        <form action="{{ route('admin.rewards.update-status', $reward) }}" method="POST" class="space-y-4">
                            @csrf
                            @method('PATCH')
                            <div>
                                <label class="block text-sm font-semibold text-gray-600 mb-2">Status Reward</label>
                                <select name="is_active"
                                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-300">
                                    <option value="1" {{ $reward->is_active ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ !$reward->is_active ? 'selected' : '' }}>Nonaktif</option>
                                </select>
                            </div>
                            <button type="submit"
                                    class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold py-3 px-4 rounded-xl hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:scale-105">
                                <i data-lucide="refresh-cw" class="w-4 h-4"></i>
                                Update Status
                            </button>
                        </form>

                        <form action="{{ route('admin.rewards.destroy', $reward) }}" method="POST"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus reward ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-red-500 to-red-600 text-white font-semibold py-3 px-4 rounded-xl hover:from-red-600 hover:to-red-700 transition-all duration-300 transform hover:scale-105">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                Hapus Reward
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Reward Preview --}}
                <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden gsap-fade-left">
                    <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                        <h2 class="text-xl font-black text-gray-800">
                            <i data-lucide="eye" class="w-5 h-5 inline mr-2 text-orange-600"></i>
                            Preview Reward
                        </h2>
                    </div>
                    <div class="p-6">
                        <div class="bg-gradient-to-br {{ $reward->color }} rounded-2xl p-8 text-center text-white shadow-lg">
                            <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-4 backdrop-blur-sm">
                                <i data-lucide="{{ $reward->icon }}" class="w-8 h-8 text-white"></i>
                            </div>
                            <h3 class="text-xl font-black mb-2">{{ $reward->name }}</h3>
                            <p class="text-white/80 text-sm mb-4">{{ $reward->description }}</p>
                            <div class="bg-white/20 rounded-xl p-3 backdrop-blur-sm">
                                <div class="text-2xl font-black">{{ number_format($reward->points_required) }} Poin</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- System Information --}}
                <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden gsap-fade-left">
                    <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                        <h2 class="text-xl font-black text-gray-800">
                            <i data-lucide="database" class="w-5 h-5 inline mr-2 text-gray-600"></i>
                            Informasi Sistem
                        </h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Dibuat Pada</span>
                            <span class="font-semibold text-gray-800">{{ $reward->created_at->format('d M Y H:i') }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Diupdate Pada</span>
                            <span class="font-semibold text-gray-800">{{ $reward->updated_at->format('d M Y H:i') }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">ID Reward</span>
                            <span class="font-mono text-gray-800">#{{ $reward->id }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Redemption Detail Modal --}}
    <div id="redemption-modal"
        class="fixed inset-0 bg-black bg-opacity-80 backdrop-blur-sm hidden items-center justify-center z-50 p-4">
        <div
            class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-hidden transform scale-0 transition-transform duration-300">
            <div class="relative p-8">
                <button onclick="closeRedemptionModal()"
                    class="absolute top-4 right-4 bg-gray-100 text-gray-600 p-2 rounded-full hover:bg-gray-200 transition-all duration-300">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>

                <div id="modal-content">
                    {{-- Content will be loaded via AJAX --}}
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
        });

        function initAnimations() {
            // Header animation
            gsap.to('.gsap-fade-left', {
                opacity: 1,
                x: 0,
                duration: 1,
                stagger: 0.2,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: '.gsap-fade-left',
                    start: 'top 80%',
                }
            });

            gsap.to('.gsap-fade-right', {
                opacity: 1,
                x: 0,
                duration: 1,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: '.gsap-fade-right',
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

            // Fade up animations
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
        }

        // Modal functionality for redemption details
        function showRedemptionDetail(redemptionId) {
            const modal = document.getElementById('redemption-modal');
            const modalContent = document.getElementById('modal-content');

            // Show loading state
            modalContent.innerHTML = `
                <div class="text-center py-8">
                    <i data-lucide="loader" class="w-8 h-8 animate-spin mx-auto mb-4 text-green-600"></i>
                    <p class="text-gray-600">Memuat detail penukaran...</p>
                </div>
            `;

            modal.classList.remove('hidden');
            modal.classList.add('flex');

            // Animate modal in
            gsap.to(modal.querySelector('.bg-white'), {
                scale: 1,
                duration: 0.3,
                ease: "back.out(1.7)"
            });

            // Load redemption details via AJAX
            fetch(`/admin/redemptions/${redemptionId}/detail`)
                .then(response => response.json())
                .then(data => {
                    modalContent.innerHTML = data.html;
                    // Reinitialize Lucide icons in modal
                    if (typeof lucide !== 'undefined') {
                        lucide.createIcons();
                    }
                })
                .catch(error => {
                    modalContent.innerHTML = `
                        <div class="text-center py-8">
                            <i data-lucide="alert-circle" class="w-12 h-12 mx-auto mb-4 text-red-600"></i>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Terjadi Kesalahan</h3>
                            <p class="text-gray-600">Gagal memuat detail penukaran.</p>
                        </div>
                    `;
                });
        }

        function closeRedemptionModal() {
            const modal = document.getElementById('redemption-modal');
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
        document.getElementById('redemption-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeRedemptionModal();
            }
        });

        // Keyboard navigation for modal
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeRedemptionModal();
            }
        });
    </script>
@endpush

@push('styles')
    <style>
        .gsap-fade-left {
            opacity: 0;
            transform: translateX(-30px);
        }

        .gsap-fade-right {
            opacity: 0;
            transform: translateX(30px);
        }

        .gsap-fade-up {
            opacity: 0;
            transform: translateY(30px);
        }

        .gsap-scale {
            opacity: 0;
            transform: scale(0.95);
        }

        .gsap-rotate {
            opacity: 0;
            transform: rotate(-10deg);
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(3deg); }
        }

        .animate-float {
            animation: float 8s ease-in-out infinite;
        }
    </style>
@endpush
