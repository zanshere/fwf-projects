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
            class="parallax-element absolute top-1/2 left-1/4 w-36 h-36 bg-blue-400 rounded-full opacity-15 blur-3xl floating-element">
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

    <div class="flex items-center justify-center min-h-screen p-4 relative z-10">
        <div class="w-full max-w-md">
            <!-- Logo/Brand Section -->
            <div class="text-center mb-8 gsap-fade-up">
                <div class="mb-6">
                    <div
                        class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full mb-4 shadow-2xl group hover:scale-110 transition-transform duration-300">
                        <i data-lucide="key"
                            class="w-10 h-10 text-green-900 group-hover:rotate-12 transition-transform duration-300"></i>
                    </div>
                    <h1 class="text-4xl font-black text-white mb-2">
                        <span class="text-reveal">FAJAR WORLD</span>
                    </h1>
                    <p class="text-green-200 text-lg italic">Reset Your Adventure Key</p>
                </div>
            </div>

            <!-- Forgot Password Card -->
            <div class="group relative gsap-scale">
                <!-- Glow Effect -->
                <div
                    class="absolute inset-0 bg-gradient-to-r from-blue-400/20 to-cyan-400/20 rounded-3xl blur-xl opacity-75 group-hover:opacity-100 transition-opacity duration-300">
                </div>

                <!-- Main Card -->
                <div
                    class="relative bg-white/95 backdrop-blur-sm rounded-3xl p-8 shadow-2xl hover:shadow-3xl transition-all duration-300 border border-white/20">

                    <!-- Header -->
                    <div class="text-center mb-6 gsap-fade-up">
                        <div
                            class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-full mb-4 shadow-lg">
                            <i data-lucide="mail" class="w-8 h-8 text-white"></i>
                        </div>
                        <h2 class="text-3xl font-black text-green-800 mb-2">LUPA PASSWORD</h2>
                        <p class="text-green-600 text-center leading-relaxed">
                            Tidak masalah! Masukkan email Anda dan kami akan mengirimkan tautan reset password untuk
                            memulai petualangan kembali.
                        </p>
                        <div class="w-16 h-1 bg-blue-400 mx-auto rounded-full mt-4"></div>
                    </div>

                    <!-- Decorative Info Box -->
                    <div
                        class="mb-6 p-4 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-2xl border-l-4 border-blue-400 gsap-fade-up">
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0">
                                <i data-lucide="info" class="w-5 h-5 text-blue-600 mt-0.5"></i>
                            </div>
                            <div class="text-sm text-blue-800 leading-relaxed">
                                <p class="font-semibold mb-1">Cara Reset Password:</p>
                                <ul class="space-y-1 text-blue-700">
                                    <li>• Masukkan alamat email yang terdaftar</li>
                                    <li>• Cek inbox email Anda</li>
                                    <li>• Klik tautan reset yang kami kirim</li>
                                    <li>• Buat password baru yang kuat</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Forgot Password Form -->
                    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                        @csrf

                        <!-- Email Field -->
                        <div class="gsap-fade-up">
                            <x-input-label for="email" :value="__('Email')" class="text-green-800 font-semibold mb-2" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i data-lucide="mail" class="w-5 h-5 text-blue-500"></i>
                                </div>
                                <x-text-input id="email"
                                    class="block w-full pl-12 pr-4 py-4 border-2 border-blue-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-200/50 transition-all duration-300 bg-white/90 hover:bg-white hover:shadow-lg"
                                    type="email" name="email" :value="old('email')" required autofocus
                                    placeholder="masukkan@email.com" />
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Submit Button -->
                        <div class="gsap-fade-up">
                            <x-primary-button
                                class="group relative overflow-hidden w-full bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white font-bold py-4 px-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border-0 justify-center">
                                <span class="relative z-10 flex items-center justify-center gap-3">
                                    <i data-lucide="send"
                                        class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1"></i>
                                    {{ __('KIRIM LINK RESET') }}
                                    <i data-lucide="arrow-right"
                                        class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1"></i>
                                </span>
                                <!-- Animated background -->
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-blue-700 to-cyan-700 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left">
                                </div>
                                <!-- Shimmer effect -->
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-transparent via-blue-300/30 to-transparent transform -translate-x-full group-hover:translate-x-full transition-transform duration-700">
                                </div>
                            </x-primary-button>
                        </div>
                    </form>

                    <!-- Additional Info -->
                    <div class="mt-6 p-4 bg-gradient-to-r from-yellow-50 to-orange-50 rounded-2xl gsap-fade-up">
                        <div class="flex items-center gap-3">
                            <div class="flex-shrink-0">
                                <i data-lucide="clock" class="w-5 h-5 text-yellow-600"></i>
                            </div>
                            <div class="text-sm text-yellow-800">
                                <p class="font-semibold">Link reset akan expired dalam 60 menit</p>
                                <p class="text-yellow-700">Pastikan untuk segera menggunakan link yang dikirim</p>
                            </div>
                        </div>
                    </div>

                    <!-- Back to Login -->
                    <div class="text-center pt-6 gsap-fade-up">
                        <p class="text-green-700 mb-4">
                            Sudah ingat password Anda?
                        </p>
                        <a href="{{ route('login') }}"
                            class="group inline-flex items-center gap-2 font-bold text-green-800 hover:text-blue-600 transition-all duration-300 underline decoration-wavy decoration-green-400 hover:decoration-blue-400">
                            <i data-lucide="arrow-left"
                                class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>
                            Kembali ke Login
                        </a>
                    </div>
                </div>
            </div>

            <!-- Additional Help -->
            <div class="mt-8 text-center gsap-fade-up">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                    <h3 class="text-white font-bold text-lg mb-3">Butuh Bantuan?</h3>
                    <p class="text-green-200/90 text-sm mb-4">
                        Tim customer service Fajar World siap membantu Anda
                    </p>
                    <div class="flex flex-col sm:flex-row gap-3 justify-center">
                        <a href="https://wa.me/628151748232" target="_blank"
                            class="group inline-flex items-center justify-center gap-2 bg-green-600/20 border border-green-500/30 text-green-200 px-4 py-2 rounded-xl hover:bg-green-600 hover:text-white transition-all duration-300">
                            <i data-lucide="message-circle"
                                class="w-4 h-4 group-hover:rotate-12 transition-transform"></i>
                            WhatsApp
                        </a>
                        <a href="mailto:fajarworld@gmail.com"
                            class="group inline-flex items-center justify-center gap-2 bg-blue-600/20 border border-blue-500/30 text-blue-200 px-4 py-2 rounded-xl hover:bg-blue-600 hover:text-white transition-all duration-300">
                            <i data-lucide="mail" class="w-4 h-4 group-hover:rotate-12 transition-transform"></i>
                            Email
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-8 gsap-fade-up">
                <p class="text-green-200/80 text-sm">
                    © 2025 Fajar World - Your Adventure Awaits
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
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.2);
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

    /* Success message styling */
    .alert-success {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
        padding: 1rem;
        border-radius: 1rem;
        margin-bottom: 1rem;
        border: 1px solid rgba(16, 185, 129, 0.3);
        box-shadow: 0 10px 25px rgba(16, 185, 129, 0.2);
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
        background: rgba(59, 130, 246, 0.1);
    }

    ::-webkit-scrollbar-thumb {
        background: rgba(59, 130, 246, 0.3);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: rgba(59, 130, 246, 0.5);
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
        document.querySelectorAll('input[type="email"]').forEach(input => {
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

        // Button hover effects - sama seperti login
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
                buttonText.innerHTML =
                '<i data-lucide="loader-2" class="w-5 h-5 animate-spin"></i> MENGIRIM...';

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

        // Enhanced email validation
        const emailInput = document.getElementById('email');
        if (emailInput) {
            emailInput.addEventListener('input', function() {
                const email = this.value;
                const isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);

                if (email && !isValid) {
                    this.classList.add('border-red-300', 'focus:border-red-500', 'focus:ring-red-200');
                    this.classList.remove('border-blue-200', 'focus:border-blue-500', 'focus:ring-blue-200');
                } else {
                    this.classList.remove('border-red-300', 'focus:border-red-500', 'focus:ring-red-200');
                    this.classList.add('border-blue-200', 'focus:border-blue-500', 'focus:ring-blue-200');
                }
            });
        }
    }
</script>
