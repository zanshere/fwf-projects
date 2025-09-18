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

    <div class="flex items-center justify-center min-h-screen p-4 relative z-10">
        <div class="w-full max-w-md">
            <!-- Logo/Brand Section -->
            <div class="text-center mb-8 gsap-fade-up">
                <div class="mb-6">
                    <div
                        class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full mb-4 shadow-2xl group hover:scale-110 transition-transform duration-300">
                        <i data-lucide="compass"
                            class="w-10 h-10 text-green-900 group-hover:rotate-12 transition-transform duration-300"></i>
                    </div>
                    <h1 class="text-4xl font-black text-white mb-2">
                        <span class="text-reveal">FAJAR WORLD</span>
                    </h1>
                    <p class="text-green-200 text-lg italic">Welcome to the Adventure</p>
                </div>
            </div>

            <!-- Login Card -->
            <div class="group relative gsap-scale">
                <!-- Glow Effect -->
                <div
                    class="absolute inset-0 bg-gradient-to-r from-yellow-400/20 to-orange-400/20 rounded-3xl blur-xl opacity-75 group-hover:opacity-100 transition-opacity duration-300">
                </div>

                <!-- Main Card -->
                <div
                    class="relative bg-white/95 backdrop-blur-sm rounded-3xl p-8 shadow-2xl hover:shadow-3xl transition-all duration-300 border border-white/20">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Header -->
                        <div class="text-center mb-6 gsap-fade-up">
                            <h2 class="text-3xl font-black text-green-800 mb-2">MASUK AKUN</h2>
                            <p class="text-green-600">Mulai petualangan Anda di Fajar World</p>
                            <div class="w-16 h-1 bg-yellow-400 mx-auto rounded-full mt-2"></div>
                        </div>

                        <!-- Email Field -->
                        <div class="gsap-fade-up">
                            <x-input-label for="email" :value="__('Email')" class="text-green-800 font-semibold mb-2" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i data-lucide="mail" class="w-5 h-5 text-green-500"></i>
                                </div>
                                <x-text-input id="email"
                                    class="block w-full pl-12 pr-4 py-4 border-2 border-green-200 rounded-xl focus:border-green-500 focus:ring-4 focus:ring-green-200/50 transition-all duration-300 bg-white/90 hover:bg-white hover:shadow-lg"
                                    type="email" name="email" :value="old('email')" required autofocus
                                    autocomplete="username" placeholder="masukkan@email.com" />
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password Field -->
                        <div class="gsap-fade-up">
                            <x-input-label for="password" :value="__('Password')" class="text-green-800 font-semibold mb-2" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i data-lucide="lock" class="w-5 h-5 text-green-500"></i>
                                </div>
                                <x-text-input id="password"
                                    class="block w-full pl-12 pr-4 py-4 border-2 border-green-200 rounded-xl focus:border-green-500 focus:ring-4 focus:ring-green-200/50 transition-all duration-300 bg-white/90 hover:bg-white hover:shadow-lg"
                                    type="password" name="password" required autocomplete="current-password"
                                    placeholder="Masukkan password Anda" />
                                <button type="button" id="togglePassword"
                                    class="absolute inset-y-0 right-0 pr-4 flex items-center">
                                    <i data-lucide="eye"
                                        class="w-5 h-5 text-green-500 hover:text-green-700 transition-colors"></i>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center justify-between gsap-fade-up">
                            <label for="remember_me" class="inline-flex items-center group cursor-pointer">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-green-300 text-green-600 shadow-sm focus:ring-green-500 transition-all duration-300"
                                    name="remember">
                                <span
                                    class="ml-3 text-sm text-green-700 group-hover:text-green-900 transition-colors">{{ __('Ingat saya') }}</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-green-600 hover:text-green-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors font-medium"
                                    href="{{ route('password.request') }}">
                                    {{ __('Lupa password?') }}
                                </a>
                            @endif
                        </div>

                        <!-- Login Button -->
                        <div class="gsap-fade-up">
                            <x-primary-button
                                class="group relative overflow-hidden w-full bg-gradient-to-r from-green-600 to-green-800 hover:from-green-700 hover:to-green-900 text-white font-bold py-4 px-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border-0 justify-center">
                                <span class="relative z-10 flex items-center justify-center gap-3">
                                    <i data-lucide="log-in"
                                        class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1"></i>
                                    {{ __('MASUK') }}
                                    <i data-lucide="arrow-right"
                                        class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1"></i>
                                </span>
                                <!-- Animated background -->
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-green-700 to-green-900 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left">
                                </div>
                                <!-- Shimmer effect -->
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-transparent via-green-300/30 to-transparent transform -translate-x-full group-hover:translate-x-full transition-transform duration-700">
                                </div>
                            </x-primary-button>
                        </div>

                        <!-- Register Link -->
                        <div class="text-center pt-4 gsap-fade-up">
                            <p class="text-green-700">
                                Belum punya akun?
                                <a href="{{ route('register') }}"
                                    class="font-bold text-green-800 hover:text-yellow-600 transition-colors duration-300 underline decoration-wavy decoration-yellow-400">
                                    Daftar sekarang
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-8 gsap-fade-up">
                <p class="text-green-200/80 text-sm">
                    © 2025 Fajar World - Explore to the Jungle
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
        box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.2);
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

    /* Custom scrollbar for webkit browsers */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: rgba(34, 197, 94, 0.1);
    }

    ::-webkit-scrollbar-thumb {
        background: rgba(34, 197, 94, 0.3);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: rgba(34, 197, 94, 0.5);
    }
</style>

<!-- GSAP Animations Script -->
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
<!-- ScrollSmoother requires ScrollTrigger -->
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

        // Password toggle functionality
        initPasswordToggle();
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

        // Fade up animations
        gsap.utils.toArray('.gsap-fade-up').forEach((el, index) => {
            gsap.to(el, {
                opacity: 1,
                y: 0,
                duration: 1,
                delay: index * 0.2,
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

        // Floating elements
        gsap.utils.toArray('.floating-element').forEach((element, index) => {
            gsap.to(element, {
                y: -15,
                rotation: 5,
                duration: 5 + index,
                repeat: -1,
                yoyo: true,
                ease: "sine.inOut",
                delay: index * 0.5
            });
        });
    }

    function initInteractiveElements() {
        // Enhanced hover effects for form elements
        document.querySelectorAll('input[type="email"], input[type="password"]').forEach(input => {
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
        const toggleButton = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');

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
    }
</script>
