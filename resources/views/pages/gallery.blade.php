@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10">
    <h2 class="text-3xl font-bold text-center mb-8">Galeri Taman Safari</h2>

    {{-- 🦁 Karnivora --}}
    <h3 class="text-2xl font-semibold mb-4 mt-10">🦁 Karnivora</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        <!-- Singa -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('images/pg4.jpeg') }}" alt="Singa" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Singa</h3>
                <p class="text-sm text-gray-600">Penghuni hutan rimba yang gagah.</p>
            </div>
        </div>

        <!-- Cheetah -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('images/cheetah.jpg') }}" alt="Cheetah" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Cheetah</h3>
                <p class="text-sm text-gray-600">Hewan tercepat di darat, bisa berlari 100 km/jam.</p>
            </div>
        </div>

        <!-- Beruang Madu -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('images/beruangmadu.webp') }}" alt="Beruang Madu" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Beruang Madu</h3>
                <p class="text-sm text-gray-600">Beruang terkecil di dunia, suka madu, pandai memanjat.</p>
            </div>
        </div>

        <!-- Harimau Sumatra -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('images/harimausumatra.jpg') }}" alt="Harimau Sumatra" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Harimau Sumatra</h3>
                <p class="text-sm text-gray-600">Harimau terkecil di dunia, asli Indonesia.</p>
            </div>
        </div>

        <!-- Harimau Putih -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('images/harimauputih.jpg') }}" alt="Harimau Putih" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Harimau Putih</h3>
                <p class="text-sm text-gray-600">Varian Bengal dengan gen resesif, bulu putih belang hitam.</p>
            </div>
        </div>

        <!-- Hyena -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('images/hyena.jpg') }}" alt="Hyena" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Hyena</h3>
                <p class="text-sm text-gray-600">Rahang kuat, pemakan bangkai sekaligus pemburu ulung.</p>
            </div>
        </div>

        <!-- Serigala -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('images/serigala.jpeg') }}" alt="Serigala" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Serigala</h3>
                <p class="text-sm text-gray-600">Hidup berkelompok (pack), setia dengan kawanan.</p>
            </div>
        </div>
    </div>

    {{-- 🐘 Herbivora --}}
    <h3 class="text-2xl font-semibold mb-4 mt-10">🐘 Herbivora</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        <!-- Gajah -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('images/pg10.jpg') }}" alt="Gajah" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Gajah</h3>
                <p class="text-sm text-gray-600">Raksasa lembut dari Asia.</p>
            </div>
        </div>

        <!-- Zebra -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('images/pg3.jpeg') }}" alt="Zebra" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Zebra</h3>
                <p class="text-sm text-gray-600">Kuda belang khas Afrika.</p>
            </div>
        </div>

        <!-- Unta -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('images/unta.webp') }}" alt="Unta" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Unta</h3>
                <p class="text-sm text-gray-600">Hidup di gurun, mampu bertahan tanpa air lama.</p>
            </div>
        </div>

        <!-- Jerapah -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('images/jerapah.jpg') }}" alt="Jerapah" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Jerapah</h3>
                <p class="text-sm text-gray-600">Hewan tertinggi di dunia, makan daun pohon tinggi.</p>
            </div>
        </div>
    </div>

    {{-- 🐒 Primata --}}
    <h3 class="text-2xl font-semibold mb-4 mt-10">🐒 Primata</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        <!-- Orang Utan -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('images/orangutan.jpg') }}" alt="Orang Utan" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Orang Utan</h3>
                <p class="text-sm text-gray-600">Primata asli Indonesia, sangat pintar.</p>
            </div>
        </div>

        <!-- Simpanse -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('images/simpanse.webp') }}" alt="Simpanse" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Simpanse</h3>
                <p class="text-sm text-gray-600">Cerdas, bisa gunakan alat, mirip manusia.</p>
            </div>
        </div>

        <!-- Gorilla -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('images/gorila.jpg') }}" alt="Gorilla" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Gorilla</h3>
                <p class="text-sm text-gray-600">Primata terbesar, dipimpin pejantan silverback.</p>
            </div>
        </div>

        <!-- Bekantan -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('images/Bekantan.jpeg') }}" alt="Gorilla" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Bekantan</h3>
                <p class="text-sm text-gray-600">Monyet berhidung panjang, hidup di hutan mangrove Kalimantan.</p>
            </div>
        </div>

        <!-- Lutung -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('images/Lutung.jpeg') }}" alt="Gorilla" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Lutung</h3>
                <p class="text-sm text-gray-600">Primata pemakan daun, bulu sering hitam atau keemasan.</p>
            </div>
        </div>
    </div>

    {{-- 🐍 Reptil & Amfibi --}}
    <h3 class="text-2xl font-semibold mb-4 mt-10">🐍 Reptil & Amfibi</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        <!-- Komodo -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('images/komodo.jpeg') }}" alt="Komodo" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Komodo</h3>
                <p class="text-sm text-gray-600">Kadal terbesar di dunia, hanya ada di Indonesia.</p>
            </div>
        </div>

        <!-- Buaya -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('images/buaya.jpeg') }}" alt="Buaya" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Buaya</h3>
                <p class="text-sm text-gray-600">Reptil purba, predator penyergap di air.</p>
            </div>
        </div>

        <!-- Iguanan -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('images/iguana.jpeg') }}" alt="Buaya" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Iguana</h3>
                <p class="text-sm text-gray-600">Kadal besar, suka berjemur, pemakan tumbuhan.</p>
            </div>
        </div>
    </div>

    {{-- 🐦 Burung --}}
    <h3 class="text-2xl font-semibold mb-4 mt-10">🐦 Burung</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        <!-- Flamingo -->
        <!-- Sanctuary Burung -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/pg6.jpeg') }}" alt="Burung" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Sanctuary Burung</h3>
                <p class="text-sm text-gray-600">Koleksi burung langka Indonesia.</p>
            </div>
        </div>

        <!-- Penguin -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/penguin.jpeg') }}" alt="Penguin" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Penguin</h3>
                <p class="text-sm text-gray-600">Burung laut tidak bisa terbang, pandai berenang.</p>
            </div>
        </div>

        <!-- Rangkong -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/rangkong.jpeg') }}" alt="Rangkong" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Rangkong</h3>
                <p class="text-sm text-gray-600">Burung khas hutan tropis, punya paruh besar & kantong suara unik.</p>
            </div>
        </div>

        <!-- Burung Hantu -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/burung_hantu.jpeg') }}" alt="Burung Hantu" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Burung Hantu</h3>
                <p class="text-sm text-gray-600">Pemburu malam dengan penglihatan tajam.</p>
            </div>
        </div>

        <!-- Flamingo -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/flamingo.jpeg') }}" alt="Flamingo" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Flamingo</h3>
                <p class="text-sm text-gray-600">Berwarna merah muda karena makanan (alga/udang kecil), berdiri dengan satu kaki.</p>
            </div>
        </div>

        <!-- Merak -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/merak.jpeg') }}" alt="Merak" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Merak</h3>
                <p class="text-sm text-gray-600">Indah dengan ekor panjang warna-warni, jantan memamerkan ekornya saat kawin.</p>
            </div>
        </div>

        <!-- Burung Unta -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/burung_unta.jpeg') }}" alt="Burung Unta" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Burung Unta</h3>
                <p class="text-sm text-gray-600">Burung terbesar di dunia, tidak bisa terbang, larinya sangat cepat</p>
            </div>
        </div> 
        
    </div>

     {{-- 🦓 Lainnya --}}
    <h3 class="text-2xl font-semibold mb-4 mt-10">🦓 Lainnya</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        <!-- Aquarium -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/pg8.jpeg') }}" alt="Aquarium" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Aquarium Spektakuler</h3>
                <p class="text-sm text-gray-600">Ribuan spesies ikan eksotis.</p>
            </div>
        </div>
    </div>

@endsection
