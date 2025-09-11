@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-green-800 via-green-600 to-green-900">
        <!-- Hero Section -->
        <section id="home" class="relative overflow-hidden min-h-screen flex items-center">
            <div class="absolute inset-0 bg-black opacity-20"></div>

            <!-- Animated Background Elements -->
            <div class="absolute inset-0 overflow-hidden">
                <div
                    class="parallax-element absolute top-20 left-10 w-32 h-32 bg-green-400 rounded-full opacity-20 blur-3xl">
                </div>
                <div
                    class="parallax-element absolute top-40 right-20 w-24 h-24 bg-yellow-400 rounded-full opacity-20 blur-2xl">
                </div>
                <div
                    class="parallax-element absolute bottom-20 left-20 w-40 h-40 bg-orange-400 rounded-full opacity-20 blur-3xl">
                </div>
            </div>

            <div class="relative z-10 container mx-auto px-4 py-20">
                <div class="flex flex-col lg:flex-row items-center gap-12">
                    <!-- Hero Content -->
                    <div class="lg:w-1/2 text-center lg:text-left">
                        <div class="mb-8">
                            <span
                                class="inline-block bg-yellow-400 text-green-900 px-6 py-2 rounded-full text-lg font-bold mb-4 shadow-lg magnetic gsap-fade-up">
                                THE EXCITING
                            </span>
                            <h1 class="text-6xl lg:text-8xl font-black text-white mb-4 drop-shadow-2xl">
                                <span class="text-reveal">FAJAR</span>
                                <br>
                                <span class="text-yellow-400 text-reveal">WORLD</span>
                                <br>
                                <span class="text-3xl lg:text-4xl font-normal text-green-200 text-reveal">FANTASY</span>
                            </h1>
                        </div>

                        <div class="mb-8">
                            <h2 class="text-3xl lg:text-5xl font-bold text-white mb-6 italic gsap-rotate">
                                <span class="text-reveal">EXPLORE</span>
                                <br>
                                <span class="text-reveal">TO THE</span>
                                <br>
                                <span class="text-reveal">JUNGLE</span>
                            </h2>
                        </div>

                        <div class="gsap-fade-up">
                            <button
                                class="group bg-yellow-400 hover:bg-yellow-300 text-green-900 font-bold py-4 px-8 rounded-full text-xl shadow-2xl magnetic"
                                id="hero-cta">
                                <span class="flex items-center gap-3">
                                    <i data-lucide="compass" class="w-6 h-6"></i>
                                    Mulai Petualangan
                                    <i data-lucide="arrow-right"
                                        class="w-5 h-5 transition-transform group-hover:translate-x-1"></i>
                                </span>
                            </button>
                        </div>
                    </div>

                    <!-- Hero Images -->
                    <div class="lg:w-1/2 relative">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="space-y-6">
                                <div class="relative group cursor-pointer gsap-scale">
                                    <div
                                        class="bg-gradient-to-br from-orange-400 to-yellow-600 rounded-3xl p-1 shadow-2xl magnetic">
                                        <div
                                            class="bg-orange-100 rounded-2xl p-4 h-64 flex items-center justify-center overflow-hidden">
                                            <i data-lucide="sunrise" class="w-24 h-24 text-orange-600"></i>
                                        </div>
                                    </div>
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                                        <span class="text-white font-semibold">Sunrise Adventure</span>
                                    </div>
                                </div>

                                <div class="relative group cursor-pointer gsap-scale">
                                    <div
                                        class="bg-gradient-to-br from-green-400 to-emerald-600 rounded-3xl p-1 shadow-2xl magnetic">
                                        <div
                                            class="bg-green-100 rounded-2xl p-4 h-48 flex items-center justify-center overflow-hidden">
                                            <i data-lucide="trees" class="w-20 h-20 text-green-600"></i>
                                        </div>
                                    </div>
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                                        <span class="text-white font-semibold">Forest Expedition</span>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-12">
                                <div class="relative group cursor-pointer gsap-scale">
                                    <div
                                        class="bg-gradient-to-br from-amber-400 to-orange-600 rounded-3xl p-1 shadow-2xl magnetic">
                                        <div
                                            class="bg-amber-100 rounded-2xl p-4 h-80 flex items-center justify-center overflow-hidden">
                                            <div class="text-center">
                                                <i data-lucide="mountain" class="w-32 h-32 text-amber-600 mx-auto mb-4"></i>
                                                <div
                                                    class="bg-amber-600 rounded-full w-16 h-16 mx-auto flex items-center justify-center">
                                                    <i data-lucide="camera" class="w-8 h-8 text-white"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                                        <span class="text-white font-semibold">Wildlife Photography</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Floating Elements -->
            <div class="floating-element absolute top-20 left-10">
                <i data-lucide="leaf" class="w-12 h-12 text-green-300 opacity-60"></i>
            </div>
            <div class="floating-element absolute top-40 right-20">
                <i data-lucide="bird" class="w-10 h-10 text-yellow-300 opacity-60"></i>
            </div>
            <div class="floating-element absolute bottom-20 left-20">
                <i data-lucide="flower" class="w-8 h-8 text-pink-300 opacity-60"></i>
            </div>

            <!-- Scroll Indicator -->
            <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 gsap-fade-up">
                <div class="flex flex-col items-center text-white/70 animate-bounce">
                    <span class="text-sm mb-2">Scroll untuk menjelajah</span>
                    <i data-lucide="chevron-down" class="w-6 h-6"></i>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="py-20 bg-gradient-to-r from-yellow-100 to-orange-100 relative overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-10 left-10 w-32 h-32 bg-green-400 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute bottom-20 right-20 w-40 h-40 bg-yellow-400 rounded-full blur-3xl animate-pulse"></div>
            </div>

            <div class="container mx-auto px-4 relative z-10">
                <div class="flex flex-col lg:flex-row items-center gap-16">
                    <div class="lg:w-1/2">
                        <h2 class="text-5xl font-black text-green-800 mb-8 gsap-fade-left">
                            <span class="text-reveal">FAJAR WORLD</span>
                        </h2>

                        <div class="space-y-6 text-lg text-green-700 leading-relaxed">
                            <p class="gsap-fade-up">
                                Terletak di tengah rimbunnya pepohonan Indonesia, terdapat sebuah surga tempat satwa liar
                                berkeliaran bebas, dan manusia dapat menjelajahi dunia mereka.
                            </p>

                            <p class="gsap-fade-up">
                                Suaka margasatwa ini, yang dikenal sebagai <span class="font-bold text-green-800">Fajar
                                    World</span>, bukan sekedar kebun binatang, melainkan sebuah konsep visioner yang
                                memadukan konservasi, edukasi, dan hiburan.
                            </p>

                            <p class="gsap-fade-up">
                                Kisah Fajar World berawal dari kecintaan mendalam terhadap satwa dan komitmen terhadap
                                kesejahteraan mereka. Semangat inilah yang mendorong para pendirinya untuk menciptakan
                                tempat-tempat di mana satwa dapat hidup bebas dan diperlakukan dengan layak.
                            </p>
                        </div>

                        <div class="mt-8 gsap-fade-up">
                            <button
                                class="group bg-green-600 hover:bg-green-700 text-white font-bold py-4 px-8 rounded-full shadow-xl magnetic">
                                <span class="flex items-center gap-3">
                                    <i data-lucide="book-open" class="w-5 h-5"></i>
                                    Pelajari Lebih Lanjut
                                    <i data-lucide="external-link"
                                        class="w-4 h-4 transition-transform group-hover:translate-x-1 group-hover:-translate-y-1"></i>
                                </span>
                            </button>
                        </div>
                    </div>

                    <div class="lg:w-1/2">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div class="group bg-white rounded-3xl p-6 shadow-xl cursor-pointer gsap-scale magnetic">
                                    <div class="bg-gradient-to-br from-orange-400 to-red-500 rounded-2xl p-4 mb-4">
                                        <i data-lucide="crown" class="w-12 h-12 text-white mx-auto"></i>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-800 mb-2">Raja Hutan</h3>
                                    <p class="text-gray-600">Saksikan keagungan singa dalam habitat alaminya</p>
                                </div>

                                <div class="group bg-white rounded-3xl p-6 shadow-xl cursor-pointer gsap-scale magnetic">
                                    <div class="bg-gradient-to-br from-yellow-400 to-orange-500 rounded-2xl p-4 mb-4">
                                        <i data-lucide="zap" class="w-12 h-12 text-white mx-auto"></i>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-800 mb-2">Jerapah Tinggi</h3>
                                    <p class="text-gray-600">Berinteraksi dengan jerapah yang ramah</p>
                                </div>
                            </div>

                            <div class="pt-8">
                                <div class="group bg-white rounded-3xl p-6 shadow-xl cursor-pointer gsap-scale magnetic">
                                    <div class="bg-gradient-to-br from-gray-700 to-black rounded-2xl p-4 mb-4">
                                        <i data-lucide="heart" class="w-12 h-12 text-white mx-auto"></i>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-800 mb-2">Panda Lucu</h3>
                                    <p class="text-gray-600">Nikmati kelucuan panda yang menggemaskan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Gallery Section -->
        <section id="gallery"
            class="py-20 bg-gradient-to-br from-green-900 via-green-800 to-green-700 relative overflow-hidden">
            <div class="container mx-auto px-4">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-black text-white mb-4 gsap-fade-up">
                        <span class="text-reveal">GALLERY</span>
                    </h2>
                    <p class="text-green-200 text-xl gsap-fade-up">Jelajahi keindahan Fajar World melalui foto-foto
                        menakjubkan</p>
                    <div class="w-32 h-1 bg-yellow-400 mx-auto rounded-full mt-4 gsap-scale"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Gallery items will be animated -->
                    <div class="gallery-item group cursor-pointer gsap-fade-up">
                        <div class="bg-gradient-to-br from-blue-400 to-cyan-500 rounded-3xl p-1 shadow-xl magnetic">
                            <div class="bg-blue-100 rounded-2xl h-64 flex items-center justify-center overflow-hidden">
                                <i data-lucide="fish" class="w-24 h-24 text-blue-600"></i>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <h3 class="text-white font-bold text-lg">Aquarium Spektakuler</h3>
                            <p class="text-green-200">Ribuan spesies ikan eksotis</p>
                        </div>
                    </div>

                    <div class="gallery-item group cursor-pointer gsap-fade-up">
                        <div class="bg-gradient-to-br from-purple-400 to-pink-500 rounded-3xl p-1 shadow-xl magnetic">
                            <div class="bg-purple-100 rounded-2xl h-64 flex items-center justify-center overflow-hidden">
                                <i data-lucide="rabbit" class="w-24 h-24 text-purple-600"></i>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <h3 class="text-white font-bold text-lg">Taman Kelinci</h3>
                            <p class="text-green-200">Interaksi langsung dengan kelinci lucu</p>
                        </div>
                    </div>

                    <div class="gallery-item group cursor-pointer gsap-fade-up">
                        <div class="bg-gradient-to-br from-green-400 to-teal-500 rounded-3xl p-1 shadow-xl magnetic">
                            <div class="bg-green-100 rounded-2xl h-64 flex items-center justify-center overflow-hidden">
                                <i data-lucide="bird" class="w-24 h-24 text-green-600"></i>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <h3 class="text-white font-bold text-lg">Sanctuary Burung</h3>
                            <p class="text-green-200">Koleksi burung langka Indonesia</p>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-12">
                    <button
                        class="bg-yellow-400 hover:bg-yellow-300 text-green-900 font-bold py-4 px-8 rounded-full shadow-xl magnetic gsap-fade-up">
                        <span class="flex items-center gap-3">
                            <i data-lucide="image" class="w-5 h-5"></i>
                            Lihat Semua Foto
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </span>
                    </button>
                </div>
            </div>
        </section>

        <!-- Ticket Pricing Section -->
        <section id="tickets"
            class="py-20 bg-gradient-to-br from-green-800 via-green-700 to-green-900 relative overflow-hidden">
            <div class="absolute inset-0 bg-black opacity-20"></div>

            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-20 left-20 w-64 h-64 border-4 border-white rounded-full floating-element"></div>
                <div
                    class="absolute bottom-20 right-20 w-48 h-48 border-4 border-yellow-400 rounded-full floating-element">
                </div>
            </div>

            <div class="container mx-auto px-4 relative z-10">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-black text-white mb-4 gsap-fade-up">
                        <span class="text-reveal">HARGA TIKET MASUK</span>
                    </h2>
                    <div class="w-32 h-1 bg-yellow-400 mx-auto rounded-full gsap-scale"></div>
                </div>

                <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                    <!-- Regular Ticket -->
                    <div class="ticket-card group relative gsap-fade-left">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-yellow-400 to-orange-400 rounded-3xl blur-xl opacity-75 group-hover:opacity-100 transition-opacity">
                        </div>
                        <div class="relative bg-white rounded-3xl p-8 shadow-2xl magnetic">
                            <div class="text-center mb-8">
                                <div
                                    class="bg-gradient-to-r from-green-600 to-green-800 text-white rounded-2xl py-3 px-6 mb-6">
                                    <h3 class="text-2xl font-black">REGULER</h3>
                                    <span class="text-red-500 font-bold text-lg">TIKET</span>
                                </div>

                                <div class="mb-6">
                                    <span class="text-gray-600 text-lg">MULAI DARI</span>
                                    <div class="text-5xl font-black text-green-800 mb-2">
                                        1.500<span class="text-2xl">.000</span>
                                    </div>
                                    <span class="text-yellow-600 font-bold text-lg">IDR</span>
                                </div>
                            </div>

                            <div class="space-y-4 mb-8">
                                <div class="bg-green-50 rounded-xl p-4">
                                    <h4 class="font-bold text-green-800 mb-2">Benefit Journey</h4>
                                    <ul class="text-green-700 space-y-1">
                                        <li class="flex items-center gap-2">
                                            <i data-lucide="check" class="w-4 h-4 text-green-600"></i>
                                            Fajar Journey | 8 Presentasi
                                        </li>
                                        <li class="flex items-center gap-2">
                                            <i data-lucide="check" class="w-4 h-4 text-green-600"></i>
                                            Edukasi Satwa
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <button
                                class="w-full bg-gradient-to-r from-green-600 to-green-800 hover:from-green-700 hover:to-green-900 text-white font-bold py-4 px-8 rounded-2xl shadow-xl magnetic">
                                <span class="flex items-center justify-center gap-3">
                                    <i data-lucide="shopping-cart" class="w-5 h-5"></i>
                                    BELI SEKARANG
                                </span>
                            </button>
                        </div>
                    </div>

                    <!-- Premium Ticket -->
                    <div class="ticket-card group relative gsap-fade-right">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-500 rounded-3xl blur-xl opacity-75 group-hover:opacity-100 transition-opacity">
                        </div>
                        <div
                            class="relative bg-white rounded-3xl p-8 shadow-2xl border-4 border-gradient-to-r from-purple-400 to-pink-400 magnetic">
                            <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                                <div
                                    class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-2 rounded-full font-bold shadow-lg">
                                    <i data-lucide="star" class="w-4 h-4 inline mr-2"></i>
                                    POPULER
                                </div>
                            </div>

                            <div class="text-center mb-8 mt-4">
                                <div
                                    class="bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-2xl py-3 px-6 mb-6">
                                    <h3 class="text-2xl font-black">PREMIUM</h3>
                                    <span class="text-yellow-300 font-bold text-lg">TIKET</span>
                                </div>

                                <div class="mb-6">
                                    <span class="text-gray-600 text-lg">MULAI DARI</span>
                                    <div class="text-5xl font-black text-purple-800 mb-2">
                                        2.000<span class="text-2xl">.000</span>
                                    </div>
                                    <span class="text-pink-600 font-bold text-lg">IDR</span>
                                </div>
                            </div>

                            <div class="space-y-4 mb-8">
                                <div class="bg-purple-50 rounded-xl p-4">
                                    <h4 class="font-bold text-purple-800 mb-2">Benefit Journey</h4>
                                    <ul class="text-purple-700 space-y-1 text-sm">
                                        <li class="flex items-center gap-2">
                                            <i data-lucide="check" class="w-4 h-4 text-purple-600"></i>
                                            Fajar Journey | 8 Presentasi
                                        </li>
                                        <li class="flex items-center gap-2">
                                            <i data-lucide="check" class="w-4 h-4 text-purple-600"></i>
                                            Edukasi Satwa | Istana Fajar
                                        </li>
                                        <li class="flex items-center gap-2">
                                            <i data-lucide="check" class="w-4 h-4 text-purple-600"></i>
                                            Air Terjun Curug Fajar
                                        </li>
                                        <li class="flex items-center gap-2">
                                            <i data-lucide="check" class="w-4 h-4 text-purple-600"></i>
                                            8 Presentasi Edukasi Satwa
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <button
                                class="w-full bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-bold py-4 px-8 rounded-2xl shadow-xl magnetic">
                                <span class="flex items-center justify-center gap-3">
                                    <i data-lucide="crown" class="w-5 h-5"></i>
                                    BELI SEKARANG
                                </span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-16">
                    <p class="text-white/80 text-lg mb-6 gsap-fade-up">Ingin pengalaman yang lebih personal?</p>
                    <button
                        class="bg-yellow-400 hover:bg-yellow-300 text-green-900 font-bold py-3 px-8 rounded-full shadow-xl magnetic gsap-fade-up">
                        <span class="flex items-center gap-2">
                            <i data-lucide="phone" class="w-5 h-5"></i>
                            Hubungi Kami untuk Paket Khusus
                        </span>
                    </button>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-20 bg-gradient-to-r from-yellow-100 to-orange-100">
            <div class="container mx-auto px-4">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-black text-green-800 mb-4">
                        <span>HUBUNGI KAMI</span>
                    </h2>
                    <p class="text-green-700 text-xl">Siap memulai petualangan di Fajar World?</p>
                    <div class="w-32 h-1 bg-green-600 mx-auto rounded-full mt-4"></div>
                </div>

                <div class="grid lg:grid-cols-3 gap-12">
                    <!-- Contact Info -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-3xl p-8 shadow-xl contact-card">
                            <div class="mb-8">
                                <div class="bg-green-600 rounded-2xl p-4 w-16 h-16 mx-auto mb-4">
                                    <i data-lucide="map-pin" class="w-8 h-8 text-white mx-auto"></i>
                                </div>
                                <h3 class="text-2xl font-black text-green-800 mb-4 text-center">LOKASI</h3>
                                <p class="text-green-700 text-center">
                                    Jl. Raya Cileungsi-Jonggol, Kec. Cileungsi, Kab. Bogor
                                </p>
                            </div>

                            <div class="mb-8">
                                <div class="bg-blue-600 rounded-2xl p-4 w-16 h-16 mx-auto mb-4">
                                    <i data-lucide="phone" class="w-8 h-8 text-white mx-auto"></i>
                                </div>
                                <h3 class="text-2xl font-black text-green-800 mb-4 text-center">TELEPON</h3>
                                <p class="text-green-700 text-center">
                                    +628151748232
                                </p>
                            </div>

                            <div class="mb-8">
                                <div class="bg-purple-600 rounded-2xl p-4 w-16 h-16 mx-auto mb-4">
                                    <i data-lucide="mail" class="w-8 h-8 text-white mx-auto"></i>
                                </div>
                                <h3 class="text-2xl font-black text-green-800 mb-4 text-center">EMAIL</h3>
                                <p class="text-green-700 text-center">
                                    fajarworld@gmail.com
                                </p>
                            </div>

                            <div class="text-center">
                                <h3 class="text-2xl font-black text-green-800 mb-6">SOCIAL MEDIA</h3>
                                <div class="flex justify-center gap-4">
                                    <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-xl">
                                        <i data-lucide="facebook" class="w-6 h-6"></i>
                                    </a>
                                    <a href="#"
                                        class="bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 text-white p-3 rounded-xl">
                                        <i data-lucide="instagram" class="w-6 h-6"></i>
                                    </a>
                                    <a href="#" class="bg-red-600 hover:bg-red-700 text-white p-3 rounded-xl">
                                        <i data-lucide="youtube" class="w-6 h-6"></i>
                                    </a>
                                    <a href="#" class="bg-green-600 hover:bg-green-700 text-white p-3 rounded-xl">
                                        <i data-lucide="message-circle" class="w-6 h-6"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form & Info -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-3xl p-8 shadow-xl contact-card">
                            <div class="grid md:grid-cols-2 gap-8">
                                <div>
                                    <h3 class="text-2xl font-black text-green-800 mb-6">TENTANG KAMI</h3>
                                    <p class="text-green-700 leading-relaxed mb-6">
                                        Fajar World adalah destinasi wisata keluarga yang menggabungkan konservasi satwa,
                                        edukasi lingkungan, dan hiburan berkelanjutan. Kami berkomitmen untuk memberikan
                                        pengalaman tak terlupakan sambil melindungi keanekaragaman hayati Indonesia.
                                    </p>
                                    <div class="space-y-4">
                                        <div class="flex items-center gap-3">
                                            <div class="bg-green-100 p-2 rounded-lg">
                                                <i data-lucide="clock" class="w-5 h-5 text-green-600"></i>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-800">Jam Operasional</p>
                                                <p class="text-gray-600">08:00 - 17:00 WIB</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <div class="bg-blue-100 p-2 rounded-lg">
                                                <i data-lucide="calendar" class="w-5 h-5 text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-800">Buka Setiap Hari</p>
                                                <p class="text-gray-600">Senin - Minggu</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <div class="bg-yellow-100 p-2 rounded-lg">
                                                <i data-lucide="users" class="w-5 h-5 text-yellow-600"></i>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-800">Grup Rombongan</p>
                                                <p class="text-gray-600">Diskon khusus tersedia</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <h3 class="text-2xl font-black text-green-800 mb-6">QUICK CONTACT</h3>
                                    <form class="space-y-4" id="quick-contact-form">
                                        <div>
                                            <input type="text" placeholder="Nama Lengkap"
                                                class="w-full p-4 border border-gray-200 rounded-xl focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all">
                                        </div>
                                        <div>
                                            <input type="email" placeholder="Email"
                                                class="w-full p-4 border border-gray-200 rounded-xl focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all">
                                        </div>
                                        <div>
                                            <input type="tel" placeholder="Nomor WhatsApp"
                                                class="w-full p-4 border border-gray-200 rounded-xl focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all">
                                        </div>
                                        <div>
                                            <textarea placeholder="Pesan Anda" rows="4"
                                                class="w-full p-4 border border-gray-200 rounded-xl focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all resize-none"></textarea>
                                        </div>
                                        <button type="submit"
                                            class="w-full bg-gradient-to-r from-green-600 to-green-800 hover:from-green-700 hover:to-green-900 text-white font-bold py-4 px-8 rounded-xl shadow-lg">
                                            <span class="flex items-center justify-center gap-3">
                                                <i data-lucide="send" class="w-5 h-5"></i>
                                                Kirim Pesan
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Member Logos -->
                <div class="mt-16 text-center">
                    <h3 class="text-2xl font-black text-green-800 mb-8">MEMBER OF</h3>
                    <div
                        class="flex flex-wrap justify-center items-center gap-8 opacity-60 hover:opacity-100 transition-opacity">
                        <div
                            class="w-16 h-16 bg-gradient-to-r from-blue-500 to-green-500 rounded-full flex items-center justify-center">
                            <i data-lucide="shield" class="w-8 h-8 text-white"></i>
                        </div>
                        <div
                            class="w-16 h-16 bg-gradient-to-r from-red-500 to-yellow-500 rounded-full flex items-center justify-center">
                            <i data-lucide="globe" class="w-8 h-8 text-white"></i>
                        </div>
                        <div
                            class="w-16 h-16 bg-gradient-to-r from-blue-600 to-blue-800 rounded-full flex items-center justify-center">
                            <i data-lucide="users" class="w-8 h-8 text-white"></i>
                        </div>
                        <div
                            class="w-16 h-16 bg-gradient-to-r from-pink-500 to-purple-600 rounded-full flex items-center justify-center">
                            <i data-lucide="camera" class="w-8 h-8 text-white"></i>
                        </div>
                        <div
                            class="w-16 h-16 bg-gradient-to-r from-green-600 to-blue-600 rounded-full flex items-center justify-center">
                            <i data-lucide="award" class="w-8 h-8 text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Enhanced GSAP Animation Styles -->
    <style>
        /* Floating animations */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(5deg);
            }
        }

        @keyframes floatReverse {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-15px) rotate(-3deg);
            }
        }

        .floating-element {
            animation: float 4s ease-in-out infinite;
        }

        .floating-element:nth-child(even) {
            animation: floatReverse 5s ease-in-out infinite;
            animation-delay: 1s;
        }

        /* Gallery hover effects */
        .gallery-item:hover .magnetic {
            transform: translateY(-10px) scale(1.05);
        }

        .gallery-item:hover i {
            transform: scale(1.2) rotate(10deg);
        }

        /* Ticket card hover effects */
        .ticket-card:hover {
            transform: translateY(-5px);
        }

        /* Text typing effect */
        .typewriter {
            overflow: hidden;
            border-right: .15em solid orange;
            white-space: nowrap;
            margin: 0 auto;
            letter-spacing: .15em;
            animation: typing 3.5s steps(40, end), blink-caret .75s step-end infinite;
        }

        @keyframes typing {
            from {
                width: 0
            }

            to {
                width: 100%
            }
        }

        @keyframes blink-caret {

            from,
            to {
                border-color: transparent
            }

            50% {
                border-color: orange;
            }
        }

        /* Pulse animation for CTA buttons */
        .pulse-button {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        /* Stagger animation delays */
        .stagger-1 {
            animation-delay: 0.1s;
        }

        .stagger-2 {
            animation-delay: 0.2s;
        }

        .stagger-3 {
            animation-delay: 0.3s;
        }

        .stagger-4 {
            animation-delay: 0.4s;
        }

        .stagger-5 {
            animation-delay: 0.5s;
        }

        /* Form focus effects */
        input:focus,
        textarea:focus {
            box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.2);
        }

        /* Magnetic effect for interactive elements */
        .magnetic {
            transition: transform 0.3s ease-out, box-shadow 0.3s ease-out;
        }

        .magnetic:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Contact card hover glow effect */
        .contact-card {
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }

        .contact-card:hover {
            border-color: rgba(34, 197, 94, 0.3);
            box-shadow: 0 0 15px rgba(34, 197, 94, 0.3);
        }

        /* Parallax elements */
        .parallax-element {
            will-change: transform;
        }

        /* ScrollTrigger animations */
        .gsap-fade-up {
            opacity: 0;
            transform: translateY(50px);
        }

        .gsap-fade-left {
            opacity: 0;
            transform: translateX(-50px);
        }

        .gsap-fade-right {
            opacity: 0;
            transform: translateX(50px);
        }

        .gsap-scale {
            opacity: 0;
            transform: scale(0.8);
        }

        .gsap-rotate {
            opacity: 0;
            transform: rotate(-5deg);
        }

        .text-reveal {
            display: inline-block;
            overflow: hidden;
            vertical-align: bottom;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #16a34a, #22c55e);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #15803d, #16a34a);
        }
    </style>

    <!-- GSAP and ScrollTrigger Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
    <!-- ScrollSmoother requires ScrollTrigger -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollSmoother.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/TextPlugin.min.js"></script>

    <script>
        // Initialize Lucide icons
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Lucide icons
            lucide.createIcons();

            // Initialize GSAP and plugins
            gsap.registerPlugin(ScrollTrigger, TextPlugin, ScrollSmoother);

            // Create the smooth scroller
            ScrollSmoother.create({
                smooth: 1.5,
                effects: true,
                smoothTouch: 0.1
            });

            // Hero section animations
            gsap.to('.text-reveal', {
                y: 0,
                opacity: 1,
                duration: 1.2,
                stagger: 0.2,
                ease: "power3.out"
            });

            // Animate hero CTA button
            gsap.to('#hero-cta', {
                opacity: 1,
                y: 0,
                duration: 1,
                delay: 1.5,
                ease: "back.out(1.7)"
            });

            // Animate floating elements
            gsap.to('.floating-element', {
                y: 20,
                rotation: 5,
                duration: 3,
                repeat: -1,
                yoyo: true,
                ease: "sine.inOut",
                stagger: 0.5
            });

            // Animate parallax elements
            gsap.to('.parallax-element', {
                y: (i, el) => (i % 2 === 0 ? 100 : -100),
                scrollTrigger: {
                    trigger: '#home',
                    start: 'top bottom',
                    end: 'bottom top',
                    scrub: true
                }
            });

            // Setup ScrollTrigger animations for all sections
            gsap.utils.toArray('.gsap-fade-up').forEach(el => {
                gsap.to(el, {
                    opacity: 1,
                    y: 0,
                    duration: 1,
                    scrollTrigger: {
                        trigger: el,
                        start: 'top 80%',
                        end: 'bottom 20%',
                        toggleActions: 'play none none reverse'
                    }
                });
            });

            gsap.utils.toArray('.gsap-fade-left').forEach(el => {
                gsap.to(el, {
                    opacity: 1,
                    x: 0,
                    duration: 1,
                    scrollTrigger: {
                        trigger: el,
                        start: 'top 80%',
                        end: 'bottom 20%',
                        toggleActions: 'play none none reverse'
                    }
                });
            });

            gsap.utils.toArray('.gsap-fade-right').forEach(el => {
                gsap.to(el, {
                    opacity: 1,
                    x: 0,
                    duration: 1,
                    scrollTrigger: {
                        trigger: el,
                        start: 'top 80%',
                        end: 'bottom 20%',
                        toggleActions: 'play none none reverse'
                    }
                });
            });

            gsap.utils.toArray('.gsap-scale').forEach(el => {
                gsap.to(el, {
                    opacity: 1,
                    scale: 1,
                    duration: 1,
                    scrollTrigger: {
                        trigger: el,
                        start: 'top 80%',
                        end: 'bottom 20%',
                        toggleActions: 'play none none reverse'
                    }
                });
            });

            gsap.utils.toArray('.gsap-rotate').forEach(el => {
                gsap.to(el, {
                    opacity: 1,
                    rotation: 0,
                    duration: 1,
                    scrollTrigger: {
                        trigger: el,
                        start: 'top 80%',
                        end: 'bottom 20%',
                        toggleActions: 'play none none reverse'
                    }
                });
            });

            // Gallery item animations
            gsap.utils.toArray('.gallery-item').forEach((item, i) => {
                gsap.to(item, {
                    opacity: 1,
                    y: 0,
                    duration: 0.8,
                    delay: i * 0.2,
                    scrollTrigger: {
                        trigger: item,
                        start: 'top 85%',
                        end: 'bottom 20%',
                        toggleActions: 'play none none reverse'
                    }
                });
            });

            // Ticket card animations
            gsap.utils.toArray('.ticket-card').forEach((card, i) => {
                gsap.to(card, {
                    opacity: 1,
                    y: 0,
                    duration: 1,
                    delay: i * 0.3,
                    scrollTrigger: {
                        trigger: card,
                        start: 'top 85%',
                        end: 'bottom 20%',
                        toggleActions: 'play none none reverse'
                    }
                });
            });

            // Magnetic effect for interactive elements
            document.querySelectorAll('.magnetic').forEach(el => {
                el.addEventListener('mousemove', function(e) {
                    const rect = this.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;

                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;

                    const deltaX = (x - centerX) / centerX * 10;
                    const deltaY = (y - centerY) / centerY * 10;

                    gsap.to(this, {
                        x: deltaX,
                        y: deltaY,
                        rotation: deltaX * 0.5,
                        duration: 1,
                        ease: "power2.out"
                    });
                });

                el.addEventListener('mouseleave', function() {
                    gsap.to(this, {
                        x: 0,
                        y: 0,
                        rotation: 0,
                        duration: 1,
                        ease: "elastic.out(1, 0.5)"
                    });
                });
            });

            // Text reveal animation for headings
            gsap.utils.toArray('h1, h2, h3').forEach(heading => {
                if (heading.classList.contains('text-reveal')) {
                    gsap.to(heading, {
                        text: {
                            value: heading.textContent,
                            delimiter: "",
                            speed: 1
                        },
                        scrollTrigger: {
                            trigger: heading,
                            start: 'top 80%',
                            toggleActions: 'play none none reverse'
                        },
                        duration: 2,
                        ease: "power2.out"
                    });
                }
            });
        });
    </script>
@endsection
