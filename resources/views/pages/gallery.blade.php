@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10">
    <h2 class="text-3xl font-bold text-center mb-8">Galeri Taman Safari</h2>

    {{-- 🦁 Karnivora --}}
    <h3 class="text-2xl font-semibold mb-4 mt-10">🦁 Karnivora</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        <!-- Singa -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/pg4.jpeg') }}" alt="Singa" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Singa</h3>
                <p class="text-sm text-gray-600">Penghuni hutan rimba yang gagah.</p>
            </div>
        </div>

        <!-- Cheetah -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/cheetah.jpg') }}" alt="Singa" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Cheetah</h3>
                <p class="text-sm text-gray-600">Hewan tercepat di darat (bisa 100 km/jam), tubuh ramping, berburu dengan kecepatan.</p>
            </div>
        </div>

         <!-- beruang madu -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/beruangmadu.webp') }}" alt="Panda" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Beruang Madu</h3>
                <p class="text-sm text-gray-600">Beruang terkecil, ada di Asia Tenggara, suka madu, kukunya panjang untuk memanjat.</p>
            </div>
        </div>

         <!-- Harimau Sumatra -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/harimausumatra.jpg') }}" alt="Panda" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Harimau Sumatra</h3>
                <p class="text-sm text-gray-600">Harimau terkecil di dunia, asli Indonesia, soliter, pandai berenang.</p>
            </div>
        </div>
         <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/harimauputih.jpg') }}" alt="Panda" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Harimau Putih</h3>
                <p class="text-sm text-gray-600">Varian harimau Bengal dengan gen resesif, bulu putih dengan belang hitam.</p>
            </div>
        </div>
         <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/hyena.jpg') }}" alt="Singa" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Hyena</h3>
                <p class="text-sm text-gray-600">Punya rahang super kuat, pemakan bangkai, tapi juga pemburu ulung.</p>
            </div>
        </div>
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/serigala.jpeg') }}" alt="Singa" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Serigala  </h3>
                <p class="text-sm text-gray-600">Hidup berkelompok (pack), dikenal setia dengan kelompoknya, karnivora oportunis.</p>
            </div>
        </div>
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/komodo.jpeg') }}" alt="Singa" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Komodo</h3>
                <p class="text-sm text-gray-600">Kadal terbesar di dunia, hanya ada di Indonesia, berbisa, mangsa bisa kerbau.</p>
            </div>
        </div>
        
    </div>

    {{-- 🐘 Herbivora --}}
    <h3 class="text-2xl font-semibold mb-4 mt-10">🐘 Herbivora</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        <!-- Gajah -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/pg10.jpg') }}" alt="Gajah" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Gajah</h3>
                <p class="text-sm text-gray-600">Raksasa lembut dari Asia.</p>
            </div>
        </div>

        <!-- Zebra -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/pg3.jpeg') }}" alt="Zebra" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Zebra</h3>
                <p class="text-sm text-gray-600">Kuda belang khas Afrika.</p>
            </div>
        </div>

        <!-- Kelinci -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/pg1.jpeg') }}" alt="Kelinci" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Kelinci</h3>
                <p class="text-sm text-gray-600">Hewan imut favorit anak-anak.</p>
            </div>
        </div>

        <!-- Capibara -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/capibara.jpeg') }}" alt="Capibara" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Capibara</h3>
                <p class="text-sm text-gray-600">Rodensia terbesar di dunia, jinak, hidup berkelompok dekat air.</p>
            </div>
        </div>

        <!-- Llama -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/llama.jpeg') }}" alt="Llama" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Llama</h3>
                <p class="text-sm text-gray-600">Hewan gunung Andes, kuat & dipakai sebagai hewan angkut.</p>
            </div>
        </div>

        <!-- Alpaka -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/alpaka.jpeg') }}" alt="Alpaka" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Alpaka</h3>
                <p class="text-sm text-gray-600">Hewan gunung Andes, berbulu tebal, jinak.</p>
            </div>
        </div>

        <!-- Panda -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/panda.jpeg') }}" alt="Panda" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Panda</h3>
                <p class="text-sm text-gray-600">Pemakan bambu, simbol konservasi dunia.</p>
            </div>
        </div>

        <!-- Kuda Nil -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/kudanil.jpg') }}" alt="Panda" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Kuda Nil</h3>
                <p class="text-sm text-gray-600">Hewan semi-akuatik, hidup di air sungai, sangat agresif walau herbivora.</p>
            </div>
        </div>

        <!-- Rusa -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/rusa.jpg') }}" alt="Panda" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Rusa</h3>
                <p class="text-sm text-gray-600">Mamalia pemakan rumput, pejantan punya tanduk bercabang.</p>
            </div>
        </div>

        <!-- buffalo-->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/buffalo.jpg') }}" alt="Panda" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Kerbau Afrika</h3>
                <p class="text-sm text-gray-600">Hewan tangguh di padang rumput Afrika, suka hidup berkelompok.</p>
            </div>
        </div>
        <!-- Jerapah-->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/jerapah.jpg') }}" alt="Panda" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Jerapah</h3>
                <p class="text-sm text-gray-600">Hewan tertinggi di dunia, leher panjang untuk meraih daun tinggi.</p>
            </div>
        </div>
    </div>

    {{-- 🐒 Primata --}}
    <h3 class="text-2xl font-semibold mb-4 mt-10">🐒 Primata</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        <!-- Monyet Ekor Panjang -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/monyet.jpeg') }}" alt="Monyet Ekor Panjang" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Monyet Ekor Panjang</h3>
                <p class="text-sm text-gray-600">Sering dijumpai di Indonesia, pintar & suka hidup dekat manusia.</p>
            </div>
        </div>

        <!-- Koala -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/koala.jpeg') }}" alt="Koala" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Koala</h3>
                <p class="text-sm text-gray-600">Marsupial, suka makan daun eukaliptus, tidur hingga 20 jam/hari.</p>
            </div>
        </div>

        <!-- Kanguru -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/kanguru.jpeg') }}" alt="Kanguru" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Kanguru</h3>
                <p class="text-sm text-gray-600">Marsupial dari Australia, punya kantong untuk anaknya.</p>
            </div>
        </div>

        <!-- simpanse -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/simpanse.webp') }}" alt="Kanguru" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Simpanse</h3>
                <p class="text-sm text-gray-600">Cerdas, bisa pakai alat, mirip perilaku manusia.</p>
            </div>
        </div>

        <!-- Orang Utan -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/orangutan.jpg') }}" alt="Kanguru" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Orang Utan</h3>
                <p class="text-sm text-gray-600">Primata asli Indonesia (Sumatra & Kalimantan), pintar, arboreal, hidup soliter.</p>
            </div>
        </div>

        <!-- Bekantan -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/Bekantan.jpeg') }}" alt="Kanguru" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Bekantan</h3>
                <p class="text-sm text-gray-600">Monyet berhidung panjang, hidup di hutan mangrove Kalimantan.</p>
            </div>
        </div>
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/gorila.jpg') }}" alt="Kanguru" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Gorilla</h3>
                <p class="text-sm text-gray-600">Primata terbesar, hidup berkelompok dengan pemimpin jantan "silverback".</p>
            </div>
        </div>
    </div>

    {{-- 🐍 Reptil & Amfibi --}}
    <h3 class="text-2xl font-semibold mb-4 mt-10">🐍 Reptil & Amfibi</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        <!-- Buaya -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/buaya.jpeg') }}" alt="Buaya Muara" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Buaya Muara</h3>
                <p class="text-sm text-gray-600">Reptil purba, hidup di air tawar, predator penyergap.</p>
            </div>
        </div>

        <!-- Iguana -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/iguana.jpeg') }}" alt="Iguana" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Iguana</h3>
                <p class="text-sm text-gray-600">Kadal besar, suka berjemur, pemakan tumbuhan.</p>
            </div>
        </div>

        <!-- Kura-kura -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/kura.jpeg') }}" alt="Kura-kura" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Kura-kura</h3>
                <p class="text-sm text-gray-600">Hidup ratusan tahun, herbivora, geraknya lambat.</p>
            </div>
        </div>

        <!-- Ular -->
        <div class="rounded-xl overflow-hidden border-4 border-white shadow-lg hover:scale-105 hover:shadow-2xl transition">
            <img src="{{ asset('../images/ular.jpeg') }}" alt="Ular" class="w-full h-60 object-cover">
            <div class="p-4 bg-white">
                <h3 class="font-semibold text-lg">Ular</h3>
                <p class="text-sm text-gray-600">Ular besar tidak berbisa, membunuh mangsa dengan lilitan.</p>
            </div>
        </div>
    </div>

    {{-- 🐦 Burung --}}
    <h3 class="text-2xl font-semibold mb-4 mt-10">🐦 Burung</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
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

</div>
@endsection
