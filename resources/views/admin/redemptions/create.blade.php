{{-- resources/views/admin/rewards/create.blade.php --}}
@extends('layouts.admin')

@section('title', 'Tambah Reward Baru')

@section('content')
<div class="space-y-6">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Tambah Reward Baru</h1>
            <p class="text-gray-600 mt-1">Buat reward baru untuk ditukarkan dengan poin</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.rewards.redemptions') }}"
               class="px-4 py-2 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all duration-300 flex items-center gap-2">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                Kembali
            </a>
        </div>
    </div>

    {{-- Form --}}
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <form action="{{ route('admin.rewards.store') }}" method="POST">
            @csrf
            <div class="p-6 space-y-6">
                {{-- Nama Reward --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Reward</label>
                    <input type="text" name="name" id="name" required
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-300"
                           placeholder="Contoh: Tiket Reguler Gratis">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="description" id="description" rows="3" required
                              class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-300"
                              placeholder="Deskripsi reward..."></textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Poin dan Stok --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="points_required" class="block text-sm font-medium text-gray-700 mb-2">Poin Diperlukan</label>
                        <input type="number" name="points_required" id="points_required" required min="1"
                               class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-300"
                               placeholder="0">
                        @error('points_required')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="stock" class="block text-sm font-medium text-gray-700 mb-2">Stok</label>
                        <input type="number" name="stock" id="stock" required min="0"
                               class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-300"
                               placeholder="0">
                        @error('stock')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Icon dan Warna --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">Icon</label>
                        <select name="icon" id="icon" required
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-300">
                            <option value="">Pilih Icon</option>
                            <option value="ticket">Ticket</option>
                            <option value="smartphone">Smartphone</option>
                            <option value="monitor">Monitor</option>
                            <option value="gift">Gift</option>
                            <option value="award">Award</option>
                            <option value="star">Star</option>
                            <option value="coffee">Coffee</option>
                            <option value="shopping-bag">Shopping Bag</option>
                            <option value="headphones">Headphones</option>
                            <option value="camera">Camera</option>
                        </select>
                        @error('icon')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="color" class="block text-sm font-medium text-gray-700 mb-2">Warna Gradient</label>
                        <select name="color" id="color" required
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-300">
                            <option value="">Pilih Warna</option>
                            <option value="from-blue-500 to-cyan-500">Blue to Cyan</option>
                            <option value="from-green-500 to-emerald-500">Green to Emerald</option>
                            <option value="from-purple-500 to-pink-500">Purple to Pink</option>
                            <option value="from-yellow-500 to-orange-500">Yellow to Orange</option>
                            <option value="from-red-500 to-pink-500">Red to Pink</option>
                            <option value="from-indigo-500 to-purple-500">Indigo to Purple</option>
                            <option value="from-teal-500 to-cyan-500">Teal to Cyan</option>
                            <option value="from-orange-500 to-red-500">Orange to Red</option>
                            <option value="from-gray-500 to-blue-500">Gray to Blue</option>
                            <option value="from-pink-500 to-rose-500">Pink to Rose</option>
                        </select>
                        @error('color')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Status Aktif --}}
                <div class="flex items-center gap-3">
                    <input type="checkbox" name="is_active" id="is_active" value="1" checked
                           class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                    <label for="is_active" class="text-sm font-medium text-gray-700">Aktif</label>
                </div>
            </div>

            {{-- Form Actions --}}
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end gap-3">
                <a href="{{ route('admin.rewards.redemptions') }}"
                   class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all duration-300">
                    Batal
                </a>
                <button type="submit"
                        class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all duration-300 flex items-center gap-2">
                    <i data-lucide="plus" class="w-4 h-4"></i>
                    Tambah Reward
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Initialize Lucide icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
</script>
@endpush
