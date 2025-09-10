@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen">
    {{-- Hero Section --}}
    <div class="relative h-64 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1508672019048-805c876b67e2?ixlib=rb-4.0.3');">
        <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white">Tiket Fajar World</h1>
        </div>
    </div>

    <div class="container mx-auto py-12 px-4">
        {{-- Info Harga Tiket --}}
        <h2 class="text-2xl font-bold mb-6 text-center">Daftar Harga Tiket</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-white p-6 rounded-2xl shadow-lg text-center">
                <h3 class="text-xl font-bold">Premium</h3>
                <p class="text-gray-600">Usia 12 tahun ke atas</p>
                <p class="text-3xl font-bold text-green-600 mt-4">Rp 2.000.000</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-lg text-center">
                <h3 class="text-xl font-bold">Reguler</h3>
                <p class="text-gray-600">Usia 5 – 11 tahun</p>
                <p class="text-3xl font-bold text-green-600 mt-4">Rp 1.500.000</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-lg text-center">
                <h3 class="text-xl font-bold">Paket Keluarga</h3>
                <p class="text-gray-600">Minimal sekeluarga</p>
                <p class="text-3xl font-bold text-green-600 mt-4">Hubungi Admin</p>
            </div>
        </div>

        {{-- Form Pemesanan --}}
        <h2 class="text-2xl font-bold mb-6 text-center">Pesan Tiket Anda</h2>
        <div class="bg-white p-8 rounded-2xl shadow-lg max-w-2xl mx-auto">
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
    <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


            <form action="{{ route('tickets.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block font-semibold mb-1">Nama Lengkap</label>
                    <input type="text" name="nama" class="w-full p-3 border rounded-lg" required>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold mb-1">Email</label>
                    <input type="email" name="email" class="w-full p-3 border rounded-lg" required>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold mb-1">Kategori Tiket</label>
                    <select name="kategori" class="w-full p-3 border rounded-lg" required>
                        <option value="dewasa">Dewasa</option>
                        <option value="anak">Anak</option>
                        <option value="rombongan">Rombongan</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold mb-1">Jumlah Tiket</label>
                    <input type="number" name="jumlah" class="w-full p-3 border rounded-lg" min="1" required>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold mb-1">Tanggal Kunjungan</label>
                    <input type="date" name="tanggal" class="w-full p-3 border rounded-lg" required>
                </div>

            <div class="mb-4">
    <label class="block font-semibold mb-1">Harga</label>
    <input type="text" id="harga_display" class="w-full p-3 border rounded-lg bg-gray-100" readonly>
    <input type="hidden" name="harga" id="harga">
</div>

<script>
document.querySelector('select[name="kategori"]').addEventListener('change', function () {
    let harga = 0;
    if (this.value === 'dewasa') harga = 2000000;
    if (this.value === 'anak') harga = 1500000;
    if (this.value === 'rombongan') harga = 0; // hubungi admin
    
    // update value ke form
    document.getElementById('harga').value = harga;
    document.getElementById('harga_display').value = harga > 0 ? "Rp " + harga.toLocaleString() : "Hubungi Admin";
});
</script>


                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg w-full">
                    Pesan Sekarang
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
