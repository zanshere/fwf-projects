@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <div class="relative h-96 bg-gradient-to-r from-green-800 via-green-600 to-green-900 overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-30"></div>
        <div class="absolute inset-0 bg-[url('/images/jungle-pattern.png')] opacity-10"></div>

        <div class="relative z-10 container mx-auto px-6 h-full flex items-center justify-center text-center">
            <div class="gsap-fade-up">
                <h1 class="text-5xl md:text-6xl font-black text-white mb-4 text-reveal">
                    Galeri Fajar World
                </h1>
                <p class="text-xl text-green-100 max-w-2xl mx-auto gsap-fade-up">
                    Jelajahi keajaiban dunia satwa melalui koleksi foto menakjubkan dari habitat alami mereka
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
                <button onclick="filterCategory('all')"
                    class="filter-btn active px-6 py-3 rounded-full font-semibold transition-all duration-300 bg-yellow-400 text-green-900 shadow-lg">
                    <i data-lucide="grid" class="w-4 h-4 inline mr-2"></i>Semua
                </button>
                <button onclick="filterCategory('carnivore')"
                    class="filter-btn px-6 py-3 rounded-full font-semibold transition-all duration-300 bg-gray-100 text-gray-700 hover:bg-red-100 hover:text-red-700">
                    <i data-lucide="zap" class="w-4 h-4 inline mr-2"></i>Karnivora
                </button>
                <button onclick="filterCategory('herbivore')"
                    class="filter-btn px-6 py-3 rounded-full font-semibold transition-all duration-300 bg-gray-100 text-gray-700 hover:bg-green-100 hover:text-green-700">
                    <i data-lucide="leaf" class="w-4 h-4 inline mr-2"></i>Herbivora
                </button>
                <button onclick="filterCategory('primate')"
                    class="filter-btn px-6 py-3 rounded-full font-semibold transition-all duration-300 bg-gray-100 text-gray-700 hover:bg-orange-100 hover:text-orange-700">
                    <i data-lucide="smile" class="w-4 h-4 inline mr-2"></i>Primata
                </button>
                <button onclick="filterCategory('reptile')"
                    class="filter-btn px-6 py-3 rounded-full font-semibold transition-all duration-300 bg-gray-100 text-gray-700 hover:bg-purple-100 hover:text-purple-700">
                    <i data-lucide="turtle" class="w-4 h-4 inline mr-2"></i>Reptil & Amfibi
                </button>
                <button onclick="filterCategory('bird')"
                    class="filter-btn px-6 py-3 rounded-full font-semibold transition-all duration-300 bg-gray-100 text-gray-700 hover:bg-blue-100 hover:text-blue-700">
                    <i data-lucide="bird" class="w-4 h-4 inline mr-2"></i>Burung
                </button>
                <button onclick="filterCategory('other')"
                    class="filter-btn px-6 py-3 rounded-full font-semibold transition-all duration-300 bg-gray-100 text-gray-700 hover:bg-teal-100 hover:text-teal-700">
                    <i data-lucide="fish" class="w-4 h-4 inline mr-2"></i>Lainnya
                </button>
            </div>
        </div>
    </div>

    {{-- Gallery Grid --}}
    <div class="container mx-auto px-6 py-12">
        <div id="gallery-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

            {{-- Karnivora --}}
            <div class="gallery-item carnivore gsap-scale" data-category="carnivore">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ asset('images/singa.png') }}" alt="Singa"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        <i data-lucide="zap" class="w-3 h-3 inline mr-1"></i>Karnivora
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">Singa
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">Raja hutan dengan suara menggelegar yang menggema hingga 8 km
                            jauhnya.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">🌍 Afrika</span>
                            <button onclick="openModal('singa')"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery-item carnivore gsap-scale" data-category="carnivore">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ asset('images/cheetah.jpg') }}" alt="Cheetah"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        <i data-lucide="zap" class="w-3 h-3 inline mr-1"></i>Karnivora
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">
                            Cheetah</h3>
                        <p class="text-gray-600 text-sm mb-4">Pelari tercepat di dunia, mampu mencapai kecepatan 120 km/jam
                            dalam 3 detik.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">🌍 Afrika</span>
                            <button onclick="openModal('cheetah')"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery-item carnivore gsap-scale" data-category="carnivore">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ asset('images/beruangmadu.webp') }}" alt="Beruang Madu"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        <i data-lucide="zap" class="w-3 h-3 inline mr-1"></i>Karnivora
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">
                            Beruang Madu</h3>
                        <p class="text-gray-600 text-sm mb-4">Beruang terkecil di dunia, pandai memanjat pohon setinggi 15
                            meter untuk mencari madu.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">🌍 Asia Tenggara</span>
                            <button onclick="openModal('beruang-madu')"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery-item carnivore gsap-scale" data-category="carnivore">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ asset('images/harimausumatra.jpg') }}" alt="Harimau Sumatra"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        <i data-lucide="zap" class="w-3 h-3 inline mr-1"></i>Karnivora
                    </div>
                    <div class="absolute top-4 left-4 bg-red-600 text-white px-2 py-1 rounded-full text-xs font-bold">
                        LANGKA
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">
                            Harimau Sumatra</h3>
                        <p class="text-gray-600 text-sm mb-4">Sub-spesies harimau terkecil dan paling terancam, hanya
                            tersisa 400 ekor di alam liar.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">🇮🇩 Sumatra</span>
                            <button onclick="openModal('harimau-sumatra')"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery-item carnivore gsap-scale" data-category="carnivore">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ asset('images/harimauputih.jpg') }}" alt="Harimau Putih"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        <i data-lucide="zap" class="w-3 h-3 inline mr-1"></i>Karnivora
                    </div>
                    <div class="absolute top-4 left-4 bg-purple-600 text-white px-2 py-1 rounded-full text-xs font-bold">
                        UNIK
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">
                            Harimau Putih</h3>
                        <p class="text-gray-600 text-sm mb-4">Varian langka harimau Bengal dengan mutasi genetik, 1 dari
                            10.000 kelahiran.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">🌍 India</span>
                            <button onclick="openModal('harimau-putih')"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery-item carnivore gsap-scale" data-category="carnivore">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ asset('images/hyena.jpg') }}" alt="Hyena"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        <i data-lucide="zap" class="w-3 h-3 inline mr-1"></i>Karnivora
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">Hyena
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">Memiliki kekuatan gigitan terkuat di antara karnivora Afrika,
                            1.100 psi.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">🌍 Afrika</span>
                            <button onclick="openModal('hyena')"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery-item carnivore gsap-scale" data-category="carnivore">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ asset('images/serigala.jpeg') }}" alt="Serigala"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        <i data-lucide="zap" class="w-3 h-3 inline mr-1"></i>Karnivora
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">
                            Serigala</h3>
                        <p class="text-gray-600 text-sm mb-4">Hidup dalam kelompok (pack) dengan hierarki yang ketat,
                            komunikasi melalui lolongan.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">🌍 Amerika Utara</span>
                            <button onclick="openModal('serigala')"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Herbivora --}}
            <div class="gallery-item herbivore gsap-scale" data-category="herbivore">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ asset('images/pg10.jpg') }}" alt="Gajah"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        <i data-lucide="leaf" class="w-3 h-3 inline mr-1"></i>Herbivora
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">Gajah
                            Asia</h3>
                        <p class="text-gray-600 text-sm mb-4">Mamalia darat terbesar kedua, memiliki ingatan luar biasa dan
                            empati tinggi.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">🌍 Asia</span>
                            <button onclick="openModal('gajah')"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery-item herbivore gsap-scale" data-category="herbivore">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ asset('images/pg3.jpeg') }}" alt="Zebra"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        <i data-lucide="leaf" class="w-3 h-3 inline mr-1"></i>Herbivora
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">Zebra
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">Setiap zebra memiliki pola belang yang unik seperti sidik
                            jari manusia.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">🌍 Afrika</span>
                            <button onclick="openModal('zebra')"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery-item herbivore gsap-scale" data-category="herbivore">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ asset('images/unta.webp') }}" alt="Unta"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        <i data-lucide="leaf" class="w-3 h-3 inline mr-1"></i>Herbivora
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">Unta
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">Dapat bertahan hidup tanpa air selama 2 minggu dan kehilangan
                            40% berat badan.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">🌍 Asia & Afrika</span>
                            <button onclick="openModal('unta')"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery-item herbivore gsap-scale" data-category="herbivore">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ asset('images/jerapah.jpg') }}" alt="Jerapah"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        <i data-lucide="leaf" class="w-3 h-3 inline mr-1"></i>Herbivora
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">
                            Jerapah</h3>
                        <p class="text-gray-600 text-sm mb-4">Mamalia tertinggi di dunia, lidahnya sepanjang 50 cm untuk
                            meraih daun tertinggi.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">🌍 Afrika</span>
                            <button onclick="openModal('jerapah')"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Primata --}}
            <div class="gallery-item primate gsap-scale" data-category="primate">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ asset('images/orangutan.jpg') }}" alt="Orangutan"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 bg-orange-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        <i data-lucide="smile" class="w-3 h-3 inline mr-1"></i>Primata
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">
                            Simpanse</h3>
                        <p class="text-gray-600 text-sm mb-4">DNA paling mirip manusia (99%), dapat belajar bahasa isyarat
                            dan memecahkan masalah kompleks.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">🌍 Afrika</span>
                            <button onclick="openModal('simpanse')"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery-item primate gsap-scale" data-category="primate">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ asset('images/gorila.jpg') }}" alt="Gorilla"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 bg-orange-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        <i data-lucide="smile" class="w-3 h-3 inline mr-1"></i>Primata
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">
                            Gorilla</h3>
                        <p class="text-gray-600 text-sm mb-4">Primata terbesar, sangat damai meskipun kuat, dipimpin oleh
                            silverback jantan.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">🌍 Afrika</span>
                            <button onclick="openModal('gorilla')"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery-item primate gsap-scale" data-category="primate">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ asset('images/Bekantan.jpeg') }}" alt="Bekantan"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 bg-orange-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        <i data-lucide="smile" class="w-3 h-3 inline mr-1"></i>Primata
                    </div>
                    <div class="absolute top-4 left-4 bg-red-600 text-white px-2 py-1 rounded-full text-xs font-bold">
                        ENDEMIK
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">
                            Bekantan</h3>
                        <p class="text-gray-600 text-sm mb-4">Monyet berhidung besar khas Kalimantan, hidup di hutan
                            mangrove.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">🇮🇩 Kalimantan</span>
                            <button onclick="openModal('bekantan')"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery-item primate gsap-scale" data-category="primate">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ asset('images/Lutung.jpeg') }}" alt="Lutung"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 bg-orange-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        <i data-lucide="smile" class="w-3 h-3 inline mr-1"></i>Primata
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">
                            Lutung</h3>
                        <p class="text-gray-600 text-sm mb-4">Primata pemakan daun dengan sistem pencernaan khusus untuk
                            mencerna selulosa.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">🇮🇩 Indonesia</span>
                            <button onclick="openModal('lutung')"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Reptil & Amfibi --}}
            <div class="gallery-item reptile gsap-scale" data-category="reptile">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ asset('images/komodo.jpeg') }}" alt="Komodo"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 bg-purple-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        <i data-lucide="turtle" class="w-3 h-3 inline mr-1"></i>Reptil
                    </div>
                    <div class="absolute top-4 left-4 bg-red-600 text-white px-2 py-1 rounded-full text-xs font-bold">
                        ENDEMIK
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">
                            Komodo</h3>
                        <p class="text-gray-600 text-sm mb-4">Kadal terbesar di dunia, hanya ada di 5 pulau Indonesia, air
                            liurnya beracun.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">🇮🇩 Komodo, Rinca</span>
                            <button onclick="openModal('komodo')"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery-item reptile gsap-scale" data-category="reptile">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ asset('images/buaya.jpeg') }}" alt="Buaya"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 bg-purple-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        <i data-lucide="turtle" class="w-3 h-3 inline mr-1"></i>Reptil
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">Buaya
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">Reptil purba yang bertahan sejak zaman dinosaurus, predator
                            penyergap sempurna.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">🌍 Tropis</span>
                            <button onclick="openModal('buaya')"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery-item reptile gsap-scale" data-category="reptile">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ asset('images/iguana.jpeg') }}" alt="Iguana"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 bg-purple-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        <i data-lucide="turtle" class="w-3 h-3 inline mr-1"></i>Reptil
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">
                            Iguana</h3>
                        <p class="text-gray-600 text-sm mb-4">Kadal herbivora besar, memiliki mata ketiga (parietal eye)
                            untuk mendeteksi predator.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">🌍 Amerika</span>
                            <button onclick="openModal('iguana')"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Burung --}}
            <div class="gallery-item bird gsap-scale" data-category="bird">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ asset('images/pg6.jpeg') }}" alt="Sanctuary Burung"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 bg-blue-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        <i data-lucide="bird" class="w-3 h-3 inline mr-1"></i>Burung
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">
                            Sanctuary Burung</h3>
                        <p class="text-gray-600 text-sm mb-4">Koleksi burung langka Indonesia dalam habitat yang
                            terlindungi.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">🇮🇩 Nusantara</span>
                            <button onclick="openModal('sanctuary-burung')"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery-item bird gsap-scale" data-category="bird">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ asset('images/penguin.jpeg') }}" alt="Penguin"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 bg-blue-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        <i data-lucide="bird" class="w-3 h-3 inline mr-1"></i>Burung
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">
                            Penguin</h3>
                        <p class="text-gray-600 text-sm mb-4">Burung laut yang tidak bisa terbang, berenang dengan
                            kecepatan 35 km/jam.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">🌍 Antarktika</span>
                            <button onclick="openModal('penguin')"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery-item bird gsap-scale" data-category="bird">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ asset('images/rangkong.jpeg') }}" alt="Rangkong"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 bg-blue-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        <i data-lucide="bird" class="w-3 h-3 inline mr-1"></i>Burung
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">
                            Rangkong</h3>
                        <p class="text-gray-600 text-sm mb-4">Burung ikonik hutan tropis, punya peran penting sebagai
                            penyebar biji.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">🇮🇩 Kalimantan</span>
                            <button onclick="openModal('rangkong')"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery-item bird gsap-scale" data-category="bird">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ asset('images/burung_hantu.jpeg') }}" alt="Burung Hantu"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 bg-blue-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        <i data-lucide="bird" class="w-3 h-3 inline mr-1"></i>Burung
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">
                            Burung Hantu</h3>
                        <p class="text-gray-600 text-sm mb-4">Predator malam dengan penglihatan super tajam dan terbang
                            tanpa suara.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">🌍 Global</span>
                            <button onclick="openModal('burung-hantu')"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery-item bird gsap-scale" data-category="bird">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ asset('images/flamingo.jpeg') }}" alt="Flamingo"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 bg-blue-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        <i data-lucide="bird" class="w-3 h-3 inline mr-1"></i>Burung
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">
                            Flamingo</h3>
                        <p class="text-gray-600 text-sm mb-4">Warna pink dari makanan kaya karotenoid, tidur dengan satu
                            kaki.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">🌍 Tropis</span>
                            <button onclick="openModal('flamingo')"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery-item bird gsap-scale" data-category="bird">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ asset('images/merak.jpeg') }}" alt="Merak"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 bg-blue-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        <i data-lucide="bird" class="w-3 h-3 inline mr-1"></i>Burung
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">Merak
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">Ekor indah dengan 200 mata palsu untuk menarik pasangan dan
                            mengintimidasi predator.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">🌍 Asia</span>
                            <button onclick="openModal('merak')"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery-item bird gsap-scale" data-category="bird">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ asset('images/burung_unta.jpeg') }}" alt="Burung Unta"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 bg-blue-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        <i data-lucide="bird" class="w-3 h-3 inline mr-1"></i>Burung
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">
                            Burung Unta</h3>
                        <p class="text-gray-600 text-sm mb-4">Burung terbesar di dunia, lari 70 km/jam, mata lebih besar
                            dari otaknya.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">🌍 Afrika</span>
                            <button onclick="openModal('burung-unta')"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Lainnya --}}
            <div class="gallery-item other gsap-scale" data-category="other">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden">
                        <img src="{{ asset('images/pg8.png') }}" alt="Aquarium"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 bg-teal-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        <i data-lucide="fish" class="w-3 h-3 inline mr-1"></i>Akuatik
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">
                            Aquarium Spektakuler</h3>
                        <p class="text-gray-600 text-sm mb-4">Dunia bawah laut dengan ribuan spesies ikan eksotis dari
                            seluruh dunia.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">🌊 Global</span>
                            <button onclick="openModal('aquarium')"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Load More Button --}}
        <div class="text-center mt-12 gsap-fade-up">
            <button id="load-more"
                class="bg-gradient-to-r from-green-600 to-green-800 hover:from-green-700 hover:to-green-900 text-white font-bold py-4 px-8 rounded-full shadow-lg transform hover:scale-105 transition-all duration-300 magnetic">
                <i data-lucide="plus" class="w-5 h-5 inline mr-2"></i>
                Muat Lebih Banyak
            </button>
        </div>
    </div>

    {{-- Statistics Section --}}
    <div class="bg-gradient-to-r from-green-800 to-green-900 py-16 mt-16">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 gsap-fade-up">
                <h2 class="text-4xl font-black text-white mb-4">Statistik Koleksi Kami</h2>
                <p class="text-green-200 text-lg">Komitmen kami terhadap konservasi dan edukasi</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center gsap-scale">
                    <div
                        class="bg-white/20 backdrop-blur-sm rounded-2xl p-6 transform hover:scale-105 transition-all duration-300">
                        <div class="text-4xl font-black text-yellow-400 mb-2" data-count="150">0</div>
                        <div class="text-white font-semibold">Spesies Satwa</div>
                    </div>
                </div>

                <div class="text-center gsap-scale">
                    <div
                        class="bg-white/20 backdrop-blur-sm rounded-2xl p-6 transform hover:scale-105 transition-all duration-300">
                        <div class="text-4xl font-black text-yellow-400 mb-2" data-count="25">0</div>
                        <div class="text-white font-semibold">Satwa Langka</div>
                    </div>
                </div>

                <div class="text-center gsap-scale">
                    <div
                        class="bg-white/20 backdrop-blur-sm rounded-2xl p-6 transform hover:scale-105 transition-all duration-300">
                        <div class="text-4xl font-black text-yellow-400 mb-2" data-count="50">0</div>
                        <div class="text-white font-semibold">Hektar Habitat</div>
                    </div>
                </div>

                <div class="text-center gsap-scale">
                    <div
                        class="bg-white/20 backdrop-blur-sm rounded-2xl p-6 transform hover:scale-105 transition-all duration-300">
                        <div class="text-4xl font-black text-yellow-400 mb-2" data-count="12">0</div>
                        <div class="text-white font-semibold">Program Konservasi</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal for Animal Details --}}
    <div id="animal-modal"
        class="fixed inset-0 bg-black bg-opacity-80 backdrop-blur-sm hidden items-center justify-center z-50 p-4">
        <div
            class="bg-white rounded-2xl max-w-4xl w-full max-h-[90vh] overflow-hidden transform scale-0 transition-transform duration-300">
            <div class="relative">
                <img id="modal-image" src="" alt="" class="w-full h-80 object-cover">
                <button onclick="closeModal()"
                    class="absolute top-4 right-4 bg-black bg-opacity-50 text-white p-3 rounded-full hover:bg-opacity-70 transition-all duration-300">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
                <div class="absolute bottom-4 left-4">
                    <span id="modal-category"
                        class="bg-green-600 text-white px-4 py-2 rounded-full text-sm font-bold"></span>
                </div>
            </div>

            <div class="p-8">
                <h2 id="modal-title" class="text-3xl font-black text-gray-800 mb-4"></h2>
                <div id="modal-content" class="space-y-6">
                    <div>
                        <h3 class="text-xl font-bold text-green-600 mb-2">Deskripsi</h3>
                        <p id="modal-description" class="text-gray-600 leading-relaxed"></p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-xl font-bold text-green-600 mb-2">Habitat</h3>
                            <p id="modal-habitat" class="text-gray-600"></p>
                        </div>

                        <div>
                            <h3 class="text-xl font-bold text-green-600 mb-2">Status Konservasi</h3>
                            <p id="modal-status" class="text-gray-600"></p>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-xl font-bold text-green-600 mb-2">Fakta Menarik</h3>
                        <ul id="modal-facts" class="text-gray-600 space-y-2"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Filter functionality
        function filterCategory(category) {
            const items = document.querySelectorAll('.gallery-item');
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
                if (category === 'all' || item.classList.contains(category)) {
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
        const animalData = {
            'singa': {
                image: '{{ asset('images/pg4.jpeg') }}',
                title: 'Singa (Panthera leo)',
                category: 'Karnivora',
                description: 'Singa adalah salah satu kucing besar yang paling ikonik dan dikenal sebagai "Raja Hutan". Mereka adalah satu-satunya kucing yang hidup dalam kelompok sosial yang disebut pride.',
                habitat: 'Padang rumput, savana, dan hutan terbuka di Afrika',
                status: 'Vulnerable (Rentan) - Populasi menurun drastis',
                facts: [
                    'Suara menggelegar singa dapat terdengar hingga 8 km jauhnya',
                    'Singa jantan dapat tidur hingga 20 jam per hari',
                    'Kecepatan lari maksimal mencapai 80 km/jam',
                    'Betina yang melakukan sebagian besar perburuan dalam pride'
                ]
            },
            'cheetah': {
                image: '{{ asset('images/cheetah.jpg') }}',
                title: 'Cheetah (Acinonyx jubatus)',
                category: 'Karnivora',
                description: 'Cheetah adalah hewan darat tercepat di dunia, mampu berakselerasi dari 0 hingga 100 km/jam hanya dalam 3 detik. Tubuhnya dirancang khusus untuk kecepatan.',
                habitat: 'Padang rumput dan savana terbuka di Afrika dan Iran',
                status: 'Vulnerable (Rentan) - Hanya tersisa 7.000 ekor di alam liar',
                facts: [
                    'Kecepatan maksimal 120 km/jam',
                    'Tidak dapat mengaum, hanya dapat mendengkur seperti kucing rumah',
                    'Cakar yang tidak dapat ditarik masuk untuk traksi maksimal',
                    'Berburu pada siang hari untuk menghindari kompetisi dengan predator lain'
                ]
            },
            'beruang-madu': {
                image: '{{ asset('images/beruangmadu.webp') }}',
                title: 'Beruang Madu (Helarctos malayanus)',
                category: 'Karnivora',
                description: 'Beruang madu adalah beruang terkecil di dunia dan satu-satunya spesies beruang yang hidup di hutan hujan tropis. Mereka adalah pendaki pohon yang sangat ahli.',
                habitat: 'Hutan hujan tropis di Asia Tenggara',
                status: 'Vulnerable (Rentan) - Habitat terus menyusut',
                facts: [
                    'Dapat memanjat pohon setinggi 15 meter',
                    'Lidah sepanjang 25 cm untuk mengambil madu dan serangga',
                    'Aktif pada siang dan malam (arrhythmic)',
                    'Membangun sarang tidur di atas pohon'
                ]
            }
            // Add more animal data as needed...
        };

        function openModal(animalKey) {
            const modal = document.getElementById('animal-modal');
            const data = animalData[animalKey];

            if (data) {
                document.getElementById('modal-image').src = data.image;
                document.getElementById('modal-title').textContent = data.title;
                document.getElementById('modal-category').textContent = data.category;
                document.getElementById('modal-description').textContent = data.description;
                document.getElementById('modal-habitat').textContent = data.habitat;
                document.getElementById('modal-status').textContent = data.status;

                const factsList = document.getElementById('modal-facts');
                factsList.innerHTML = '';
                data.facts.forEach(fact => {
                    const li = document.createElement('li');
                    li.innerHTML =
                        `<i data-lucide="check-circle" class="w-4 h-4 inline mr-2 text-green-600"></i>${fact}`;
                    factsList.appendChild(li);
                });

                // Re-initialize Lucide icons
                lucide.createIcons();

                modal.classList.remove('hidden');
                modal.classList.add('flex');

                // Animate modal in
                gsap.to(modal.querySelector('.bg-white'), {
                    scale: 1,
                    duration: 0.3,
                    ease: "back.out(1.7)"
                });
            }
        }

        function closeModal() {
            const modal = document.getElementById('animal-modal');
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

        // Counter animation for statistics
        function animateCounters() {
            const counters = document.querySelectorAll('[data-count]');

            counters.forEach(counter => {
                const target = parseInt(counter.dataset.count);
                const duration = 2000; // 2 seconds
                const increment = target / (duration / 16); // 60fps
                let current = 0;

                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        counter.textContent = target + '+';
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current);
                    }
                }, 16);
            });
        }

        // Initialize counter animation when statistics section comes into view
        ScrollTrigger.create({
            trigger: '[data-count]',
            start: 'top 80%',
            onEnter: animateCounters,
            once: true
        });

        // Load more functionality (placeholder)
        document.getElementById('load-more').addEventListener('click', function() {
            // Add your load more logic here
            gsap.to(this, {
                scale: 0.95,
                duration: 0.1,
                yoyo: true,
                repeat: 1
            });
        });

        // Close modal when clicking outside
        document.getElementById('animal-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Keyboard navigation for modal
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    </script>
@endpush
