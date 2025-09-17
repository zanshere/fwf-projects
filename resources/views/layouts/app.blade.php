{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="Fajar World - Suaka margasatwa yang memadukan konservasi, edukasi, dan hiburan. Jelajahi dunia satwa Indonesia dengan pengalaman yang tak terlupakan.">
    <meta name="keywords" content="fajar world, zoo, konservasi, edukasi satwa, wisata keluarga, indonesia">

    <title>{{ config('app.name', 'Fajar World') }} - Explore to the Jungle</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Additional CSS for enhanced animations -->
    <style>
        html {
            scroll-behavior: smooth;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #059669;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #047857;
        }

        /* Loading animation */
        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #059669, #047857);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .loading-screen.fade-out {
            opacity: 0;
            pointer-events: none;
        }

        .loader {
            width: 60px;
            height: 60px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid #fbbf24;
            border-radius: 50%;
        }

        /* GSAP Animation Classes */
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
            transform: rotate(-10deg) scale(0.9);
        }

        /* Magnetic effect for buttons */
        .magnetic {
            transition: transform 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        /* Smooth transitions */
        * {
            transition: color 0.3s ease, background-color 0.3s ease;
        }

        /* Custom button hover effects */
        .btn-primary {
            @apply bg-gradient-to-r from-green-600 to-green-800 hover:from-green-700 hover:to-green-900 text-white font-bold py-3 px-6 rounded-full shadow-lg;
        }

        .btn-secondary {
            @apply bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-500 hover:to-yellow-600 text-green-900 font-bold py-3 px-6 rounded-full shadow-lg;
        }

        /* Accessibility improvements */
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }

        /* Focus styles for keyboard navigation */
        button:focus-visible,
        a:focus-visible,
        input:focus-visible,
        textarea:focus-visible {
            outline: 2px solid #fbbf24;
            outline-offset: 2px;
        }

        /* Parallax containers */
        .parallax-container {
            overflow: hidden;
        }

        /* Text reveal animations */
        .text-reveal {
            overflow: hidden;
        }

        .text-reveal span {
            display: inline-block;
            transform: translateY(100%);
        }
    </style>
</head>

<body class="font-sans antialiased bg-gray-50 cursor-glow">
    <!-- Custom Cursor -->
    {{-- <div class="custom-cursor" id="cursor"></div> --}}

    <!-- Loading Screen -->
    <div class="loading-screen" id="loading-screen">
        <div class="text-center">
            <div class="loader mx-auto mb-4" id="loader"></div>
            <div class="text-white font-bold text-xl gsap-fade-up">Loading Fajar World...</div>
            <div class="text-green-200 text-sm mt-2 gsap-fade-up">Preparing your adventure</div>
        </div>
    </div>

    <div class="min-h-screen" id="app">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            @yield('content')
            {{ $slot ?? '' }}
        </main>

        <!-- Footer -->
        <footer class="bg-gradient-to-r from-green-800 to-green-900 text-white py-8 mt-20">
            <div class="container mx-auto px-4">
                <div class="text-center">
                    <div class="flex justify-center items-center space-x-3 mb-4 gsap-fade-up">
                        <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center">
                            <i data-lucide="mountain" class="w-5 h-5 text-green-900"></i>
                        </div>
                        <div>
                            <div class="text-lg font-black">FAJAR WORLD</div>
                            <div class="text-xs text-green-200">Explore to the Jungle</div>
                        </div>
                    </div>

                    <p class="text-green-200 mb-4 max-w-2xl mx-auto gsap-fade-up">
                        Fajar World berkomitmen untuk memberikan pengalaman terbaik dalam konservasi, edukasi, dan
                        hiburan satwa. Mari bersama-sama menjaga kelestarian alam Indonesia.
                    </p>

                    <div class="flex justify-center space-x-6 mb-6 gsap-fade-up">
                        <a href="#" class="text-green-200 hover:text-yellow-400 transition-colors magnetic">
                            <i data-lucide="facebook" class="w-5 h-5"></i>
                            <span class="sr-only">Facebook</span>
                        </a>
                        <a href="#" class="text-green-200 hover:text-yellow-400 transition-colors magnetic">
                            <i data-lucide="instagram" class="w-5 h-5"></i>
                            <span class="sr-only">Instagram</span>
                        </a>
                        <a href="#" class="text-green-200 hover:text-yellow-400 transition-colors magnetic">
                            <i data-lucide="youtube" class="w-5 h-5"></i>
                            <span class="sr-only">YouTube</span>
                        </a>
                        <a href="#" class="text-green-200 hover:text-yellow-400 transition-colors magnetic">
                            <i data-lucide="mail" class="w-5 h-5"></i>
                            <span class="sr-only">Email</span>
                        </a>
                    </div>

                    <div class="border-t border-green-700 pt-4 gsap-fade-up">
                        <p class="text-green-300 text-sm">
                            &copy; {{ date('Y') }} Fajar World. All rights reserved. |
                            <a href="#" class="hover:text-yellow-400 transition-colors">Privacy Policy</a> |
                            <a href="#" class="hover:text-yellow-400 transition-colors">Terms of Service</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Back to Top Button -->
        <button id="back-to-top"
            class="fixed bottom-8 right-8 bg-yellow-400 hover:bg-yellow-500 text-green-900 p-3 rounded-full shadow-lg transform translate-y-16 transition-all duration-300 z-40 magnetic">
            <i data-lucide="arrow-up" class="w-5 h-5"></i>
            <span class="sr-only">Back to top</span>
        </button>
    </div>

    <!-- GSAP Animations Script -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
    <!-- ScrollSmoother requires ScrollTrigger -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollSmoother.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/TextPlugin.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize GSAP
            initializeGSAP();

            // Magnetic effect
            initMagneticEffect();

            // Loading animation
            initLoadingAnimation();

            // Back to top functionality
            initBackToTop();

            // Smooth scrolling
            initSmoothScrolling();

            // Error handling for images
            initImageErrorHandling();
        });

        function initializeGSAP() {
            // Set default ease
            gsap.defaults({
                ease: "power3.out"
            });

            // Fade up animations
            gsap.utils.toArray('.gsap-fade-up').forEach(element => {
                gsap.fromTo(element, {
                    opacity: 0,
                    y: 50
                }, {
                    opacity: 1,
                    y: 0,
                    duration: 1,
                    scrollTrigger: {
                        trigger: element,
                        start: "top 90%",
                        end: "top 60%",
                        toggleActions: "play none none reverse"
                    }
                });
            });

            // Fade left animations
            gsap.utils.toArray('.gsap-fade-left').forEach(element => {
                gsap.fromTo(element, {
                    opacity: 0,
                    x: -50
                }, {
                    opacity: 1,
                    x: 0,
                    duration: 1,
                    scrollTrigger: {
                        trigger: element,
                        start: "top 90%",
                        end: "top 60%",
                        toggleActions: "play none none reverse"
                    }
                });
            });

            // Fade right animations
            gsap.utils.toArray('.gsap-fade-right').forEach(element => {
                gsap.fromTo(element, {
                    opacity: 0,
                    x: 50
                }, {
                    opacity: 1,
                    x: 0,
                    duration: 1,
                    scrollTrigger: {
                        trigger: element,
                        start: "top 90%",
                        end: "top 60%",
                        toggleActions: "play none none reverse"
                    }
                });
            });

            // Scale animations
            gsap.utils.toArray('.gsap-scale').forEach(element => {
                gsap.fromTo(element, {
                    opacity: 0,
                    scale: 0.8
                }, {
                    opacity: 1,
                    scale: 1,
                    duration: 1,
                    scrollTrigger: {
                        trigger: element,
                        start: "top 90%",
                        end: "top 60%",
                        toggleActions: "play none none reverse"
                    }
                });
            });

            // Rotate animations
            gsap.utils.toArray('.gsap-rotate').forEach(element => {
                gsap.fromTo(element, {
                    opacity: 0,
                    rotation: -10,
                    scale: 0.9
                }, {
                    opacity: 1,
                    rotation: 0,
                    scale: 1,
                    duration: 1.2,
                    scrollTrigger: {
                        trigger: element,
                        start: "top 90%",
                        end: "top 60%",
                        toggleActions: "play none none reverse"
                    }
                });
            });

            // Text reveal animations
            gsap.utils.toArray('.text-reveal').forEach(container => {
                const text = container.textContent;
                container.innerHTML = '';

                [...text].forEach(char => {
                    const span = document.createElement('span');
                    span.textContent = char === ' ' ? '\u00A0' : char;
                    container.appendChild(span);
                });

                gsap.fromTo(container.children, {
                    y: '100%'
                }, {
                    y: '0%',
                    duration: 0.05,
                    stagger: 0.02,
                    scrollTrigger: {
                        trigger: container,
                        start: "top 90%",
                        end: "top 60%",
                        toggleActions: "play none none reverse"
                    }
                });
            });

            // Parallax effects
            gsap.utils.toArray('.parallax-element').forEach(element => {
                gsap.to(element, {
                    yPercent: -50,
                    ease: "none",
                    scrollTrigger: {
                        trigger: element,
                        start: "top bottom",
                        end: "bottom top",
                        scrub: true
                    }
                });
            });
        }

        function initMagneticEffect() {
            document.querySelectorAll('.magnetic').forEach(element => {
                element.addEventListener('mousemove', (e) => {
                    const rect = element.getBoundingClientRect();
                    const x = e.clientX - rect.left - rect.width / 2;
                    const y = e.clientY - rect.top - rect.height / 2;

                    gsap.to(element, {
                        duration: 0.3,
                        x: x * 0.2,
                        y: y * 0.2,
                        ease: "power2.out"
                    });
                });

                element.addEventListener('mouseleave', () => {
                    gsap.to(element, {
                        duration: 0.5,
                        x: 0,
                        y: 0,
                        ease: "elastic.out(1, 0.3)"
                    });
                });
            });
        }

        function initLoadingAnimation() {
            const loader = document.getElementById('loader');
            const loadingScreen = document.getElementById('loading-screen');

            // Animate loader
            gsap.to(loader, {
                rotation: 360,
                duration: 1,
                repeat: -1,
                ease: "none"
            });

            // Hide loading screen with animation
            setTimeout(() => {
                gsap.to(loadingScreen, {
                    opacity: 0,
                    duration: 0.8,
                    ease: "power2.out",
                    onComplete: () => {
                        loadingScreen.style.display = 'none';
                    }
                });
            }, 2000);
        }

        function initBackToTop() {
            const backToTopButton = document.getElementById('back-to-top');

            ScrollTrigger.create({
                trigger: "body",
                start: "300px top",
                onUpdate: self => {
                    if (self.progress > 0) {
                        gsap.to(backToTopButton, {
                            duration: 0.3,
                            y: 0,
                            ease: "back.out(1.7)"
                        });
                    } else {
                        gsap.to(backToTopButton, {
                            duration: 0.3,
                            y: 64,
                            ease: "back.in(1.7)"
                        });
                    }
                }
            });

            backToTopButton.addEventListener('click', function() {
                gsap.to(window, {
                    duration: 1,
                    scrollTo: {
                        y: 0
                    },
                    ease: "power2.inOut"
                });
            });
        }

        function initSmoothScrolling() {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        gsap.to(window, {
                            duration: 1,
                            scrollTo: {
                                y: target.offsetTop - 100
                            },
                            ease: "power2.inOut"
                        });
                    }
                });
            });
        }

        function initImageErrorHandling() {
            document.querySelectorAll('img').forEach(img => {
                img.addEventListener('error', function() {
                    this.src = '/images/placeholder.jpg';
                    this.alt = 'Image not available';
                });
            });
        }
    </script>

    <!-- Additional scripts can be added here -->
    @stack('scripts')
</body>

</html>
