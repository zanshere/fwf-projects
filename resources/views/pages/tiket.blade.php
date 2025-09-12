@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen">
    {{-- Hero Section dengan Animasi GSAP --}}
    <div class="relative h-64 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1508672019048-805c876b67e2?ixlib=rb-4.0.3');" id="ticket-hero">
        <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white opacity-0 transform translate-y-10" id="hero-title">Tiket Fajar World</h1>
        </div>
    </div>

    <div class="container mx-auto py-12 px-4">
        {{-- Info Harga Tiket dengan Animasi --}}
        <h2 class="text-2xl font-bold mb-6 text-center opacity-0 transform translate-y-10" id="price-title">Daftar Harga Tiket</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-white p-6 rounded-2xl shadow-lg text-center opacity-0 transform translate-y-10 ticket-card">
                <div class="bg-gradient-to-br from-green-400 to-green-600 rounded-2xl p-4 w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                    <i data-lucide="crown" class="w-8 h-8 text-white"></i>
                </div>
                <h3 class="text-xl font-bold">Premium</h3>
                <p class="text-gray-600">Usia 12 tahun ke atas</p>
                <p class="text-3xl font-bold text-green-600 mt-4">Rp 2.000.000</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-lg text-center opacity-0 transform translate-y-10 ticket-card">
                <div class="bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl p-4 w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                    <i data-lucide="user" class="w-8 h-8 text-white"></i>
                </div>
                <h3 class="text-xl font-bold">Reguler</h3>
                <p class="text-gray-600">Usia 5 – 11 tahun</p>
                <p class="text-3xl font-bold text-green-600 mt-4">Rp 1.500.000</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-lg text-center opacity-0 transform translate-y-10 ticket-card">
                <div class="bg-gradient-to-br from-purple-400 to-purple-600 rounded-2xl p-4 w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                    <i data-lucide="users" class="w-8 h-8 text-white"></i>
                </div>
                <h3 class="text-xl font-bold">Paket Keluarga</h3>
                <p class="text-gray-600">Minimal sekeluarga</p>
                <p class="text-3xl font-bold text-green-600 mt-4">Hubungi Admin</p>
            </div>
        </div>

        {{-- Form Pemesanan dengan Animasi --}}
        <h2 class="text-2xl font-bold mb-6 text-center opacity-0 transform translate-y-10" id="form-title">Pesan Tiket Anda</h2>
        <div class="bg-white p-8 rounded-2xl shadow-lg max-w-2xl mx-auto opacity-0 transform translate-y-10" id="booking-form">
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                    <div class="flex items-center">
                        <i data-lucide="check-circle" class="w-5 h-5 mr-2"></i>
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            
            @if ($errors->any())
                <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                    <div class="flex items-center">
                        <i data-lucide="alert-circle" class="w-5 h-5 mr-2"></i>
                        <span>Terjadi kesalahan:</span>
                    </div>
                    <ul class="list-disc pl-5 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tickets.store') }}" method="POST" id="ticket-form">
                @csrf
                <div class="mb-4">
                    <label class="font-semibold mb-1 flex items-center">
                        <i data-lucide="user" class="w-4 h-4 mr-2"></i>
                        Nama Lengkap
                    </label>
                    <input type="text" name="nama" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required value="{{ old('nama') }}">
                </div>

                <div class="mb-4">
                    <label class="font-semibold mb-1 flex items-center">
                        <i data-lucide="mail" class="w-4 h-4 mr-2"></i>
                        Email
                    </label>
                    <input type="email" name="email" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required value="{{ old('email') }}">
                </div>

                <div class="mb-4">
                    <label class="font-semibold mb-1 flex items-center">
                        <i data-lucide="phone" class="w-4 h-4 mr-2"></i>
                        Nomor Telepon
                    </label>
                    <input type="tel" name="telepon" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required value="{{ old('telepon') }}">
                </div>

                <div class="mb-4">
                    <label class="font-semibold mb-1 flex items-center">
                        <i data-lucide="ticket" class="w-4 h-4 mr-2"></i>
                        Kategori Tiket
                    </label>
                    <select name="kategori" id="kategori" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                        <option value="">Pilih Kategori</option>
                        <option value="dewasa" {{ old('kategori') == 'dewasa' ? 'selected' : '' }}>Dewasa (Rp 2.000.000)</option>
                        <option value="anak" {{ old('kategori') == 'anak' ? 'selected' : '' }}>Anak (Rp 1.500.000)</option>
                        <option value="rombongan" {{ old('kategori') == 'rombongan' ? 'selected' : '' }}>Rombongan (Hubungi Admin)</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="font-semibold mb-1 flex items-center">
                        <i data-lucide="hash" class="w-4 h-4 mr-2"></i>
                        Jumlah Tiket
                    </label>
                    <input type="number" name="jumlah" id="jumlah" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" min="1" required value="{{ old('jumlah', 1) }}">
                </div>

                <div class="mb-4">
                    <label class="font-semibold mb-1 flex items-center">
                        <i data-lucide="calendar" class="w-4 h-4 mr-2"></i>
                        Tanggal Kunjungan
                    </label>
                    <input type="date" name="tanggal" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required value="{{ old('tanggal') }}" min="{{ date('Y-m-d') }}">
                </div>

                <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-semibold flex items-center">
                            <i data-lucide="credit-card" class="w-4 h-4 mr-2"></i>
                            Harga per Tiket:
                        </span>
                        <span id="harga-per-tiket">Rp 0</span>
                    </div>
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-semibold">Jumlah:</span>
                        <span id="display-jumlah">0 tiket</span>
                    </div>
                    <div class="flex justify-between items-center font-bold text-lg">
                        <span>Total Harga:</span>
                        <span id="total-harga">Rp 0</span>
                    </div>
                    <input type="hidden" name="harga" id="harga" value="0">
                </div>

                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg w-full transition-all duration-300 transform hover:scale-105 flex items-center justify-center">
                    <i data-lucide="shopping-cart" class="w-5 h-5 mr-2"></i>
                    Pesan Sekarang
                </button>
            </form>
        </div>
    </div>
</div>

<script>
// Inisialisasi Lucide Icons
document.addEventListener('DOMContentLoaded', function() {
    // Pastikan Lucide tersedia
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
    
    // Animasi GSAP untuk halaman tickets
    if (typeof gsap !== 'undefined') {
        // Animasi untuk hero section
        gsap.to('#hero-title', {
            opacity: 1,
            y: 0,
            duration: 1,
            ease: "power3.out"
        });
        
        // Animasi untuk judul harga
        gsap.to('#price-title', {
            opacity: 1,
            y: 0,
            duration: 0.8,
            delay: 0.3,
            ease: "power2.out"
        });
        
        // Animasi untuk kartu harga
        gsap.to('.ticket-card', {
            opacity: 1,
            y: 0,
            duration: 0.8,
            stagger: 0.2,
            delay: 0.5,
            ease: "power2.out"
        });
        
        // Animasi untuk judul form
        gsap.to('#form-title', {
            opacity: 1,
            y: 0,
            duration: 0.8,
            delay: 0.8,
            ease: "power2.out"
        });
        
        // Animasi untuk form
        gsap.to('#booking-form', {
            opacity: 1,
            y: 0,
            duration: 0.8,
            delay: 1,
            ease: "power2.out"
        });
    }
    
    // Fungsi untuk kalkulasi harga
    const kategoriSelect = document.getElementById('kategori');
    const jumlahInput = document.getElementById('jumlah');
    const hargaPerTiketEl = document.getElementById('harga-per-tiket');
    const displayJumlahEl = document.getElementById('display-jumlah');
    const totalHargaEl = document.getElementById('total-harga');
    const hargaInput = document.getElementById('harga');
    
    // Harga untuk setiap kategori
    const hargaKategori = {
        'dewasa': 2000000,
        'anak': 1500000,
        'rombongan': 0
    };
    
    // Fungsi untuk menghitung total harga
    function hitungTotalHarga() {
        const kategori = kategoriSelect.value;
        const jumlah = parseInt(jumlahInput.value) || 0;
        const hargaPerTiket = hargaKategori[kategori] || 0;
        
        // Update tampilan
        if (kategori && hargaPerTiket > 0) {
            hargaPerTiketEl.textContent = `Rp ${hargaPerTiket.toLocaleString('id-ID')}`;
            displayJumlahEl.textContent = `${jumlah} tiket`;
            
            const totalHarga = hargaPerTiket * jumlah;
            totalHargaEl.textContent = `Rp ${totalHarga.toLocaleString('id-ID')}`;
            hargaInput.value = totalHarga;
        } else if (kategori === 'rombongan') {
            hargaPerTiketEl.textContent = 'Hubungi Admin';
            displayJumlahEl.textContent = `${jumlah} tiket`;
            totalHargaEl.textContent = 'Hubungi Admin';
            hargaInput.value = 0;
        } else {
            hargaPerTiketEl.textContent = 'Rp 0';
            displayJumlahEl.textContent = '0 tiket';
            totalHargaEl.textContent = 'Rp 0';
            hargaInput.value = 0;
        }
    }
    
    // Event listeners
    kategoriSelect.addEventListener('change', hitungTotalHarga);
    jumlahInput.addEventListener('input', hitungTotalHarga);
    
    // Hitung harga awal
    hitungTotalHarga();
    
    // Validasi form
    document.getElementById('ticket-form').addEventListener('submit', function(e) {
        const kategori = kategoriSelect.value;
        const jumlah = parseInt(jumlahInput.value) || 0;
        
        if (!kategori) {
            e.preventDefault();
            alert('Silakan pilih kategori tiket');
            return;
        }
        
        if (jumlah < 1) {
            e.preventDefault();
            alert('Jumlah tiket harus minimal 1');
            return;
        }
        
        if (kategori === 'rombongan') {
            e.preventDefault();
            alert('Untuk pemesanan tiket rombongan, silakan hubungi admin kami');
            return;
        }
    });
});
</script>

<style>
/* Menambahkan beberapa style untuk memperbaiki tampilan */
input, select {
    transition: all 0.3s ease;
}

input:focus, select:focus {
    outline: none;
    ring: 2px;
    ring-color: #10B981;
    border-color: #10B981;
}

button:disabled {
    opacity: 0.7;
    cursor: not-allowed;
}

button:disabled:hover {
    transform: none;
}

/* Loading state */
.loading {
    position: relative;
    pointer-events: none;
}

.loading::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 20px;
    height: 20px;
    margin: -10px 0 0 -10px;
    border: 2px solid #ffffff;
    border-radius: 50%;
    border-right-color: transparent;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    to {
        transform: rotate(360deg);
    }
}

/* Hover effect untuk kartu tiket */
.ticket-card {
    transition: all 0.3s ease;
}

.ticket-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}
</style>
@endsection