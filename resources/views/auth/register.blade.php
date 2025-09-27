@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="min-h-screen bg-gradient-to-br from-green-800 via-green-600 to-green-900 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div
            class="parallax-element absolute top-20 left-10 w-32 h-32 bg-green-400 rounded-full opacity-20 blur-3xl floating-element">
        </div>
        <div
            class="parallax-element absolute top-40 right-20 w-24 h-24 bg-yellow-400 rounded-full opacity-20 blur-2xl floating-element">
        </div>
        <div
            class="parallax-element absolute bottom-20 left-20 w-40 h-40 bg-orange-400 rounded-full opacity-20 blur-3xl floating-element">
        </div>
        <div
            class="parallax-element absolute bottom-40 right-10 w-28 h-28 bg-pink-400 rounded-full opacity-20 blur-2xl floating-element">
        </div>
        <div
            class="parallax-element absolute top-1/2 left-1/4 w-36 h-36 bg-purple-400 rounded-full opacity-15 blur-3xl floating-element">
        </div>
    </div>

    <!-- Nature Icons Floating -->
    <div class="floating-element absolute top-20 left-10">
        <i data-lucide="leaf" class="w-12 h-12 text-green-300 opacity-60"></i>
    </div>
    <div class="floating-element absolute top-40 right-20">
        <i data-lucide="bird" class="w-10 h-10 text-yellow-300 opacity-60"></i>
    </div>
    <div class="floating-element absolute bottom-20 left-20">
        <i data-lucide="flower" class="w-8 h-8 text-pink-300 opacity-60"></i>
    </div>
    <div class="floating-element absolute bottom-40 right-16">
        <i data-lucide="tree-pine" class="w-10 h-10 text-green-300 opacity-60"></i>
    </div>
    <div class="floating-element absolute top-1/3 right-1/3">
        <i data-lucide="butterfly" class="w-9 h-9 text-orange-300 opacity-50"></i>
    </div>

    <div class="flex items-center justify-center min-h-screen p-4 sm:p-6 lg:p-8 relative z-10">
        <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-5xl">
            <!-- Logo/Brand Section -->
            <div class="text-center mb-8 gsap-fade-up">
                <div class="mb-6">
                    <div
                        class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full mb-4 shadow-2xl group hover:scale-110 transition-transform duration-300">
                        <i data-lucide="user-plus"
                            class="w-10 h-10 text-green-900 group-hover:rotate-12 transition-transform duration-300"></i>
                    </div>
                    <h1 class="text-4xl font-black text-white mb-2">
                        <span class="text-reveal">FAJAR WORLD</span>
                    </h1>
                    <p class="text-green-200 text-lg italic">Join the Adventure Community</p>
                </div>
            </div>

            <!-- Register Card -->
            <div class="group relative gsap-scale">
                <!-- Glow Effect -->
                <div
                    class="absolute inset-0 bg-gradient-to-r from-purple-400/20 to-pink-400/20 rounded-3xl blur-xl opacity-75 group-hover:opacity-100 transition-opacity duration-300">
                </div>

                <!-- Main Card -->
                <div
                    class="relative bg-white/95 backdrop-blur-sm rounded-2xl sm:rounded-3xl p-4 sm:p-6 lg:p-8 shadow-2xl hover:shadow-3xl transition-all duration-300 border border-white/20">

                    <!-- Header -->
                    <div class="text-center mb-6 gsap-fade-up">
                        <div
                            class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full mb-4 shadow-lg">
                            <i data-lucide="compass" class="w-8 h-8 text-white"></i>
                        </div>
                        <h2 class="text-3xl font-black text-green-800 mb-2">DAFTAR AKUN</h2>
                        <p class="text-green-600 text-center leading-relaxed">
                            Bergabunglah dengan ribuan petualang lainnya dan mulai eksplorasi tak terlupakan di Fajar World
                        </p>
                        <div class="w-16 h-1 bg-purple-400 mx-auto rounded-full mt-4"></div>
                    </div>

                    <!-- Benefits Info Box -->
                    <div
                        class="mb-6 p-4 bg-gradient-to-r from-purple-50 to-pink-50 rounded-2xl border-l-4 border-purple-400 gsap-fade-up">
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0">
                                <i data-lucide="gift" class="w-5 h-5 text-purple-600 mt-0.5"></i>
                            </div>
                            <div class="text-sm text-purple-800 leading-relaxed">
                                <p class="font-semibold mb-1">Keuntungan Member:</p>
                                <ul class="space-y-1 text-purple-700">
                                    <li>• Diskon khusus tiket masuk</li>
                                    <li>• Akses prioritas wahana premium</li>
                                    <li>• Newsletter adventure terbaru</li>
                                    <li>• Poin reward setiap kunjungan</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Register Form -->
                    <form method="POST" action="{{ route('register') }}" class="space-y-6">
                        @csrf

                        <!-- Name & Email Row -->
                        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                            <!-- Name Field -->
                            <div class="gsap-fade-up">
                                <x-input-label for="name" :value="__('Nama Lengkap')" class="text-green-800 font-semibold mb-2 text-sm sm:text-base" />
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                        <i data-lucide="user" class="w-4 h-4 sm:w-5 sm:h-5 text-purple-500"></i>
                                    </div>
                                    <x-text-input id="name"
                                        class="block w-full pl-10 sm:pl-12 pr-3 sm:pr-4 py-3 sm:py-4 text-sm sm:text-base border-2 border-purple-200 rounded-lg sm:rounded-xl focus:border-purple-500 focus:ring-4 focus:ring-purple-200/50 transition-all duration-300 bg-white/90 hover:bg-white hover:shadow-lg"
                                        type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                                        placeholder="Nama lengkap Anda" />
                                </div>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email Field -->
                            <div class="gsap-fade-up">
                                <x-input-label for="email" :value="__('Email')" class="text-green-800 font-semibold mb-2 text-sm sm:text-base" />
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                        <i data-lucide="mail" class="w-4 h-4 sm:w-5 sm:h-5 text-purple-500"></i>
                                    </div>
                                    <x-text-input id="email"
                                        class="block w-full pl-10 sm:pl-12 pr-3 sm:pr-4 py-3 sm:py-4 text-sm sm:text-base border-2 border-purple-200 rounded-lg sm:rounded-xl focus:border-purple-500 focus:ring-4 focus:ring-purple-200/50 transition-all duration-300 bg-white/90 hover:bg-white hover:shadow-lg"
                                        type="email" name="email" :value="old('email')" required autocomplete="username"
                                        placeholder="masukkan@email.com" />
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Password & Confirm Password Row -->
                        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                            <!-- Password Field -->
                            <div class="gsap-fade-up">
                                <x-input-label for="password" :value="__('Password')" class="text-green-800 font-semibold mb-2 text-sm sm:text-base" />
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                        <i data-lucide="lock" class="w-4 h-4 sm:w-5 sm:h-5 text-purple-500"></i>
                                    </div>
                                    <x-text-input id="password"
                                        class="block w-full pl-10 sm:pl-12 pr-10 sm:pr-12 py-3 sm:py-4 text-sm sm:text-base border-2 border-purple-200 rounded-lg sm:rounded-xl focus:border-purple-500 focus:ring-4 focus:ring-purple-200/50 transition-all duration-300 bg-white/90 hover:bg-white hover:shadow-lg"
                                        type="password" name="password" required autocomplete="new-password"
                                        placeholder="Password kuat" />
                                    <button type="button" id="togglePassword"
                                        class="absolute inset-y-0 right-0 pr-3 sm:pr-4 flex items-center">
                                        <i data-lucide="eye"
                                            class="w-4 h-4 sm:w-5 sm:h-5 text-purple-500 hover:text-purple-700 transition-colors"></i>
                                    </button>
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="gsap-fade-up">
                                <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')"
                                    class="text-green-800 font-semibold mb-2 text-sm sm:text-base" />
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                        <i data-lucide="shield-check" class="w-4 h-4 sm:w-5 sm:h-5 text-purple-500"></i>
                                    </div>
                                    <x-text-input id="password_confirmation"
                                        class="block w-full pl-10 sm:pl-12 pr-10 sm:pr-12 py-3 sm:py-4 text-sm sm:text-base border-2 border-purple-200 rounded-lg sm:rounded-xl focus:border-purple-500 focus:ring-4 focus:ring-purple-200/50 transition-all duration-300 bg-white/90 hover:bg-white hover:shadow-lg"
                                        type="password" name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Ulangi password" />
                                    <button type="button" id="togglePasswordConfirm"
                                        class="absolute inset-y-0 right-0 pr-3 sm:pr-4 flex items-center">
                                        <i data-lucide="eye"
                                            class="w-4 h-4 sm:w-5 sm:h-5 text-purple-500 hover:text-purple-700 transition-colors"></i>
                                    </button>
                                </div>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Terms & Conditions -->
                        <div class="flex items-start gap-2 sm:gap-3 gsap-fade-up">
                            <input id="terms" type="checkbox"
                                class="mt-1 rounded border-purple-300 text-purple-600 shadow-sm focus:ring-purple-500 transition-all duration-300 w-4 h-4 sm:w-5 sm:h-5"
                                required>
                            <label for="terms" class="text-xs sm:text-sm text-green-700 leading-relaxed">
                                Saya menyetujui <a href="#"
                                    class="text-purple-600 hover:text-purple-800 underline font-medium">Syarat &
                                    Ketentuan</a>
                                dan <a href="#"
                                    class="text-purple-600 hover:text-purple-800 underline font-medium">Kebijakan
                                    Privasi</a>
                                Fajar World
                            </label>
                        </div>

                        <!-- Register Button -->
                        <div class="gsap-fade-up">
                            <x-primary-button
                                class="group relative overflow-hidden w-full bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-bold py-3 sm:py-4 px-6 sm:px-8 rounded-lg sm:rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border-0 justify-center text-sm sm:text-base">
                                <span class="relative z-10 flex items-center justify-center gap-2 sm:gap-3">
                                    <i data-lucide="user-plus"
                                        class="w-4 h-4 sm:w-5 sm:h-5 transition-transform duration-300 group-hover:rotate-12"></i>
                                    {{ __('DAFTAR SEKARANG') }}
                                    <i data-lucide="arrow-right"
                                        class="w-4 h-4 sm:w-5 sm:h-5 transition-transform duration-300 group-hover:translate-x-1"></i>
                                </span>
                                <!-- Animated background -->
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-purple-700 to-pink-700 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left">
                                </div>
                                <!-- Shimmer effect -->
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-transparent via-purple-300/30 to-transparent transform -translate-x-full group-hover:translate-x-full transition-transform duration-700">
                                </div>
                            </x-primary-button>
                        </div>
                    </form>

                    <!-- Additional Info -->
                    <div class="mt-6 p-4 bg-gradient-to-r from-yellow-50 to-orange-50 rounded-2xl gsap-fade-up">
                        <div class="flex items-center gap-3">
                            <div class="flex-shrink-0">
                                <i data-lucide="shield-check" class="w-5 h-5 text-yellow-600"></i>
                            </div>
                            <div class="text-sm text-yellow-800">
                                <p class="font-semibold">Data Anda aman dan terenkripsi</p>
                                <p class="text-yellow-700">Kami melindungi privasi dan keamanan informasi Anda</p>
                            </div>
                        </div>
                    </div>

                    <!-- Back to Login -->
                    <div class="text-center pt-6 gsap-fade-up">
                        <p class="text-green-700 mb-4">
                            Sudah punya akun?
                        </p>
                        <a href="{{ route('login') }}"
                            class="group inline-flex items-center gap-2 font-bold text-green-800 hover:text-purple-600 transition-all duration-300 underline decoration-wavy decoration-green-400 hover:decoration-purple-400">
                            <i data-lucide="arrow-left"
                                class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>
                            Masuk sekarang
                        </a>
                    </div>
                </div>
            </div>

            <!-- Additional Help -->
            <div class="mt-8 text-center gsap-fade-up">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                    <h3 class="text-white font-bold text-lg mb-3">Kenapa Harus Daftar?</h3>
                    <p class="text-green-200/90 text-sm mb-6">
                        Nikmati pengalaman terbaik dengan berbagai keuntungan eksklusif
                    </p>
                    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4">
                        <div class="text-center">
                            <div
                                class="bg-yellow-500/20 rounded-full p-2 sm:p-3 mb-2 sm:mb-3 mx-auto w-10 h-10 sm:w-12 sm:h-12 md:w-14 md:h-14 flex items-center justify-center">
                                <i data-lucide="percent" class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 text-yellow-300"></i>
                            </div>
                            <p class="text-green-200 text-xs sm:text-sm font-medium">Diskon Eksklusif</p>
                        </div>
                        <div class="text-center">
                            <div
                                class="bg-blue-500/20 rounded-full p-2 sm:p-3 mb-2 sm:mb-3 mx-auto w-10 h-10 sm:w-12 sm:h-12 md:w-14 md:h-14 flex items-center justify-center">
                                <i data-lucide="star" class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 text-blue-300"></i>
                            </div>
                            <p class="text-green-200 text-xs sm:text-sm font-medium">Poin Reward</p>
                        </div>
                        <div class="text-center">
                            <div
                                class="bg-purple-500/20 rounded-full p-2 sm:p-3 mb-2 sm:mb-3 mx-auto w-10 h-10 sm:w-12 sm:h-12 md:w-14 md:h-14 flex items-center justify-center">
                                <i data-lucide="crown" class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 text-purple-300"></i>
                            </div>
                            <p class="text-green-200 text-xs sm:text-sm font-medium">Akses Prioritas</p>
                        </div>
                        <div class="text-center">
                            <div
                                class="bg-green-500/20 rounded-full p-2 sm:p-3 mb-2 sm:mb-3 mx-auto w-10 h-10 sm:w-12 sm:h-12 md:w-14 md:h-14 flex items-center justify-center">
                                <i data-lucide="mail" class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 text-green-300"></i>
                            </div>
                            <p class="text-green-200 text-xs sm:text-sm font-medium">Newsletter</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-8 gsap-fade-up">
                <p class="text-green-200/80 text-sm">
                    © 2025 Fajar World - Your Greatest Adventure Starts Here
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Enhanced Styles -->
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
        animation: float 6s ease-in-out infinite;
    }

    .floating-element:nth-child(even) {
        animation: floatReverse 7s ease-in-out infinite;
        animation-delay: 1s;
    }

    /* Form focus effects */
    input:focus {
        box-shadow: 0 0 0 4px rgba(147, 51, 234, 0.2);
    }

    /* GSAP animation classes */
    .gsap-fade-up {
        opacity: 0;
        transform: translateY(30px);
    }

    .gsap-scale {
        opacity: 0;
        transform: scale(0.9);
    }

    /* Text reveal animation */
    .text-reveal {
        display: inline-block;
    }

    /* Parallax elements */
    .parallax-element {
        will-change: transform;
    }

    /* Enhanced hover states */
    .group:hover .group-hover\:rotate-12 {
        transform: rotate(12deg);
    }

    .group:hover .group-hover\:translate-x-1 {
        transform: translateX(0.25rem);
    }

    .group:hover .group-hover\:-translate-x-1 {
        transform: translateX(-0.25rem);
    }

    /* Password strength indicator */
    .password-strength {
        height: 4px;
        border-radius: 2px;
        transition: all 0.3s ease;
    }

    .password-weak {
        background: #ef4444;
    }

    .password-medium {
        background: #f59e0b;
    }

    .password-strong {
        background: #10b981;
    }

    /* Loading state */
    .loading {
        position: relative;
        overflow: hidden;
    }

    .loading::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        animation: loading 1.5s infinite;
    }

    @keyframes loading {
        0% {
            left: -100%;
        }

        100% {
            left: 100%;
        }
    }

    /* Custom scrollbar for webkit browsers */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: rgba(147, 51, 234, 0.1);
    }

    ::-webkit-scrollbar-thumb {
        background: rgba(147, 51, 234, 0.3);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: rgba(147, 51, 234, 0.5);
    }
</style>

<!-- GSAP Animations Script -->
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollSmoother.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/TextPlugin.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Lucide icons
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        // Initialize GSAP
        gsap.registerPlugin(ScrollTrigger);

        // Initialize animations
        initAnimations();
        initInteractiveElements();
        initParallaxEffects();
        initPasswordToggle();
        initFormValidation();
        initFormHandling();
    });

    function initAnimations() {
        // Text reveal animation
        gsap.utils.toArray('.text-reveal').forEach(container => {
            const chars = container.textContent.split('');
            container.innerHTML = '';

            chars.forEach(char => {
                const span = document.createElement('span');
                span.textContent = char === ' ' ? '\u00A0' : char;
                span.style.display = 'inline-block';
                container.appendChild(span);
            });

            gsap.fromTo(container.children, {
                opacity: 0,
                y: 30,
                rotationX: -45
            }, {
                opacity: 1,
                y: 0,
                rotationX: 0,
                duration: 0.6,
                stagger: {
                    amount: 0.4,
                    from: "start"
                },
                ease: "back.out(1.4)",
                delay: 0.5
            });
        });

        // Fade up animations with stagger
        gsap.utils.toArray('.gsap-fade-up').forEach((el, index) => {
            gsap.to(el, {
                opacity: 1,
                y: 0,
                duration: 1,
                delay: index * 0.1,
                ease: "power2.out"
            });
        });

        // Scale animations
        gsap.utils.toArray('.gsap-scale').forEach(el => {
            gsap.to(el, {
                opacity: 1,
                scale: 1,
                duration: 1,
                delay: 0.3,
                ease: "back.out(1.4)"
            });
        });

        // Floating elements with varied timings
        gsap.utils.toArray('.floating-element').forEach((element, index) => {
            const duration = 4 + (index * 0.5);
            const delay = index * 0.3;

            gsap.to(element, {
                y: -15,
                rotation: 5,
                duration: duration,
                repeat: -1,
                yoyo: true,
                ease: "sine.inOut",
                delay: delay
            });
        });
    }

    function initInteractiveElements() {
        // Enhanced hover effects for form elements
        document.querySelectorAll('input[type="text"], input[type="email"], input[type="password"]').forEach(input => {
            input.addEventListener('focus', () => {
                gsap.to(input.parentElement, {
                    scale: 1.02,
                    duration: 0.3,
                    ease: "power2.out"
                });
            });

            input.addEventListener('blur', () => {
                gsap.to(input.parentElement, {
                    scale: 1,
                    duration: 0.3,
                    ease: "power2.out"
                });
            });
        });

        // Button hover effects
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('mouseenter', () => {
                gsap.to(button, {
                    scale: 1.05,
                    duration: 0.3,
                    ease: "power2.out"
                });
            });

            button.addEventListener('mouseleave', () => {
                gsap.to(button, {
                    scale: 1,
                    duration: 0.3,
                    ease: "power2.out"
                });
            });
        });
    }

    function initParallaxEffects() {
        // Subtle parallax for background elements
        gsap.utils.toArray('.parallax-element').forEach(element => {
            gsap.to(element, {
                yPercent: -10,
                ease: "none",
                scrollTrigger: {
                    trigger: element,
                    start: "top bottom",
                    end: "bottom top",
                    scrub: 1
                }
            });
        });
    }

    function initPasswordToggle() {
        const toggleButtons = ['togglePassword', 'togglePasswordConfirm'];
        const passwordFields = ['password', 'password_confirmation'];

        toggleButtons.forEach((buttonId, index) => {
            const toggleButton = document.getElementById(buttonId);
            const passwordField = document.getElementById(passwordFields[index]);

            if (toggleButton && passwordField) {
                toggleButton.addEventListener('click', function() {
                    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordField.setAttribute('type', type);

                    const icon = toggleButton.querySelector('i');
                    if (type === 'password') {
                        icon.setAttribute('data-lucide', 'eye');
                    } else {
                        icon.setAttribute('data-lucide', 'eye-off');
                    }

                    // Reinitialize lucide icons
                    if (typeof lucide !== 'undefined') {
                        lucide.createIcons();
                    }
                });
            }
        });
    }

    function initFormValidation() {
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const passwordConfirmInput = document.getElementById('password_confirmation');

        // Email validation
        if (emailInput) {
            emailInput.addEventListener('input', function() {
                const email = this.value;
                const isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);

                if (email && !isValid) {
                    this.classList.add('border-red-300', 'focus:border-red-500', 'focus:ring-red-200');
                    this.classList.remove('border-purple-200', 'focus:border-purple-500', 'focus:ring-purple-200');
                } else {
                    this.classList.remove('border-red-300', 'focus:border-red-500', 'focus:ring-red-200');
                    this.classList.add('border-purple-200', 'focus:border-purple-500', 'focus:ring-purple-200');
                }
            });
        }

        // Password strength validation
        if (passwordInput) {
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                let strength = 0;

                if (password.length >= 8) strength++;
                if (/[A-Z]/.test(password)) strength++;
                if (/[a-z]/.test(password)) strength++;
                if (/[0-9]/.test(password)) strength++;
                if (/[^A-Za-z0-9]/.test(password)) strength++;

                // Update visual feedback based on strength
                if (password.length > 0) {
                    if (strength < 3) {
                        this.classList.add('border-red-300', 'focus:border-red-500');
                        this.classList.remove('border-yellow-300', 'border-green-300', 'focus:border-yellow-500', 'focus:border-green-500');
                    } else if (strength < 4) {
                        this.classList.add('border-yellow-300', 'focus:border-yellow-500');
                        this.classList.remove('border-red-300', 'border-green-300', 'focus:border-red-500', 'focus:border-green-500');
                    } else {
                        this.classList.add('border-green-300', 'focus:border-green-500');
                        this.classList.remove('border-red-300', 'border-yellow-300', 'focus:border-red-500', 'focus:border-yellow-500');
                    }
                } else {
                    this.classList.remove('border-red-300', 'border-yellow-300', 'border-green-300', 'focus:border-red-500', 'focus:border-yellow-500', 'focus:border-green-500');
                    this.classList.add('border-purple-200', 'focus:border-purple-500');
                }
            });
        }

        // Password confirmation validation
        if (passwordConfirmInput && passwordInput) {
            passwordConfirmInput.addEventListener('input', function() {
                const password = passwordInput.value;
                const confirmPassword = this.value;

                if (confirmPassword && password !== confirmPassword) {
                    this.classList.add('border-red-300', 'focus:border-red-500', 'focus:ring-red-200');
                    this.classList.remove('border-purple-200', 'focus:border-purple-500', 'focus:ring-purple-200');
                } else {
                    this.classList.remove('border-red-300', 'focus:border-red-500', 'focus:ring-red-200');
                    this.classList.add('border-purple-200', 'focus:border-purple-500', 'focus:ring-purple-200');
                }
            });
        }
    }

    function initFormHandling() {
        const form = document.querySelector('form');
        const submitButton = document.querySelector('button[type="submit"]');

        if (form && submitButton) {
            form.addEventListener('submit', function(e) {
                // Add loading state
                submitButton.classList.add('loading');
                submitButton.disabled = true;

                // Change button text
                const buttonText = submitButton.querySelector('span');
                const originalText = buttonText.innerHTML;
                buttonText.innerHTML = '<i data-lucide="loader-2" class="w-5 h-5 animate-spin"></i> MENDAFTAR...';

                // Reinitialize icons
                if (typeof lucide !== 'undefined') {
                    lucide.createIcons();
                }

                // Reset after 3 seconds (in case of errors)
                setTimeout(() => {
                    if (submitButton.classList.contains('loading')) {
                        submitButton.classList.remove('loading');
                        submitButton.disabled = false;
                        buttonText.innerHTML = originalText;

                        if (typeof lucide !== 'undefined') {
                            lucide.createIcons();
                        }
                    }
                }, 3000);
            });
        }
    }
</script>
