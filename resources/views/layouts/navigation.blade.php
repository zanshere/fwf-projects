{{-- resources/views/layouts/navigation.blade.php --}}
<nav class="fixed w-full z-50 transition-all duration-300" id="navbar">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="flex items-center space-x-3 gsap-fade-left">
                <a href="{{ url('/') }}" class="bg-white rounded-full p-2 shadow-lg magnetic">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-600 to-green-800 rounded-full flex items-center justify-center">
                        <i data-lucide="mountain" class="w-6 h-6 text-white"></i>
                    </div>
                </a>
                <div class="text-white">
                    <div class="text-xl font-black text-reveal">FAJAR</div>
                    <div class="text-xs text-green-200">WORLD</div>
                </div>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-8 gsap-fade-up">
                <a href="{{ url('/') }}#home" class="nav-link text-white font-bold text-lg hover:text-yellow-400 transition-colors relative group magnetic">
                    <span class="flex items-center gap-2">
                        <i data-lucide="home" class="w-4 h-4"></i>
                        HOME
                    </span>
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ url('/') }}#about" class="nav-link text-white font-bold text-lg hover:text-yellow-400 transition-colors relative group magnetic">
                    <span class="flex items-center gap-2">
                        <i data-lucide="info" class="w-4 h-4"></i>
                        ABOUT US
                    </span>
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ url('/') }}#gallery" class="nav-link text-white font-bold text-lg hover:text-yellow-400 transition-colors relative group magnetic">
                    <span class="flex items-center gap-2">
                        <i data-lucide="image" class="w-4 h-4"></i>
                        GALLERY
                    </span>
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ url('/') }}#tickets" class="nav-link text-white font-bold text-lg hover:text-yellow-400 transition-colors relative group magnetic">
                    <span class="flex items-center gap-2">
                        <i data-lucide="ticket" class="w-4 h-4"></i>
                        TICKETS
                    </span>
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ url('/') }}#contact" class="nav-link text-white font-bold text-lg hover:text-yellow-400 transition-colors relative group magnetic">
                    <span class="flex items-center gap-2">
                        <i data-lucide="phone" class="w-4 h-4"></i>
                        CONTACT
                    </span>
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
            </div>

            <!-- CTA Button -->
            <div class="hidden lg:block gsap-fade-right">
                <button class="bg-yellow-400 hover:bg-yellow-300 text-green-900 font-bold py-3 px-6 rounded-full transform hover:scale-105 transition-all duration-300 shadow-lg magnetic" id="cta-button">
                    <span class="flex items-center gap-2">
                        <i data-lucide="shopping-cart" class="w-4 h-4"></i>
                        Beli Tiket
                    </span>
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button class="lg:hidden text-white p-2 magnetic gsap-fade-right" id="mobile-menu-button">
                <i data-lucide="menu" class="w-6 h-6" id="menu-icon"></i>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <div class="lg:hidden hidden" id="mobile-menu">
            <div class="bg-white/95 backdrop-blur-md rounded-2xl mt-4 p-6 shadow-2xl gsap-scale">
                <div class="space-y-4">
                    <a href="{{ url('/') }}#home" class="mobile-nav-link block text-green-800 font-bold text-lg hover:text-green-600 transition-colors">
                        <span class="flex items-center gap-3">
                            <i data-lucide="home" class="w-5 h-5"></i>
                            HOME
                        </span>
                    </a>
                    <a href="{{ url('/') }}#about" class="mobile-nav-link block text-green-800 font-bold text-lg hover:text-green-600 transition-colors">
                        <span class="flex items-center gap-3">
                            <i data-lucide="info" class="w-5 h-5"></i>
                            ABOUT US
                        </span>
                    </a>
                    <a href="{{ url('/') }}#gallery" class="mobile-nav-link block text-green-800 font-bold text-lg hover:text-green-600 transition-colors">
                        <span class="flex items-center gap-3">
                            <i data-lucide="image" class="w-5 h-5"></i>
                            GALLERY
                        </span>
                    </a>
                    <a href="{{ url('/') }}#tickets" class="mobile-nav-link block text-green-800 font-bold text-lg hover:text-green-600 transition-colors">
                        <span class="flex items-center gap-3">
                            <i data-lucide="ticket" class="w-5 h-5"></i>
                            TICKETS
                        </span>
                    </a>
                    <a href="{{ url('/') }}#contact" class="mobile-nav-link block text-green-800 font-bold text-lg hover:text-green-600 transition-colors">
                        <span class="flex items-center gap-3">
                            <i data-lucide="phone" class="w-5 h-5"></i>
                            CONTACT
                        </span>
                    </a>
                    <div class="pt-4 border-t border-green-200">
                        <button class="w-full bg-yellow-400 hover:bg-yellow-300 text-green-900 font-bold py-3 px-6 rounded-full transition-all duration-300 magnetic">
                            <span class="flex items-center justify-center gap-2">
                                <i data-lucide="shopping-cart" class="w-4 h-4"></i>
                                Beli Tiket
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
/* Navbar scroll effect */
.navbar-scrolled {
    background: rgba(34, 197, 94, 0.95);
    backdrop-filter: blur(10px);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.navbar-scrolled .nav-link {
    color: white;
}

.navbar-scrolled .nav-link:hover {
    color: #fbbf24;
}

/* Mobile menu animations */
.mobile-menu-enter {
    opacity: 0;
    transform: translateY(-10px) scale(0.95);
}

.mobile-menu-enter-active {
    opacity: 1;
    transform: translateY(0) scale(1);
    transition: all 0.3s ease-out;
}

.mobile-menu-exit {
    opacity: 1;
    transform: translateY(0) scale(1);
}

.mobile-menu-exit-active {
    opacity: 0;
    transform: translateY(-10px) scale(0.95);
    transition: all 0.2s ease-in;
}

/* Navigation link hover effects */
.nav-link {
    position: relative;
    overflow: hidden;
}

.nav-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transition: left 0.5s;
}

.nav-link:hover::before {
    left: 100%;
}

/* CTA Button pulse effect */
@keyframes pulse-glow {
    0%, 100% { box-shadow: 0 0 20px rgba(251, 191, 36, 0.3); }
    50% { box-shadow: 0 0 30px rgba(251, 191, 36, 0.6); }
}

.cta-glow {
    animation: pulse-glow 2s infinite;
}

/* Mobile navigation link stagger animation */
.mobile-nav-link {
    opacity: 0;
    transform: translateX(-20px);
}

.mobile-nav-link.animate {
    opacity: 1;
    transform: translateX(0);
    transition: all 0.3s ease-out;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.getElementById('navbar');
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const ctaButton = document.getElementById('cta-button');

    // Initialize navbar animations
    initNavbarAnimations();

    // Navbar scroll effect with GSAP
    ScrollTrigger.create({
        trigger: "body",
        start: "50px top",
        onUpdate: self => {
            if (self.direction === 1 && self.progress > 0) {
                // Scrolling down
                gsap.to(navbar, {
                    duration: 0.3,
                    backgroundColor: "rgba(34, 197, 94, 0.95)",
                    backdropFilter: "blur(10px)",
                    boxShadow: "0 4px 20px rgba(0, 0, 0, 0.1)",
                    ease: "power2.out"
                });
                navbar.classList.add('navbar-scrolled');
            } else if (self.direction === -1 && self.progress === 0) {
                // Scrolling up to top
                gsap.to(navbar, {
                    duration: 0.3,
                    backgroundColor: "transparent",
                    backdropFilter: "none",
                    boxShadow: "none",
                    ease: "power2.out"
                });
                navbar.classList.remove('navbar-scrolled');
            }
        }
    });

    // CTA Button pulse effect
    if (ctaButton) {
        gsap.to(ctaButton, {
            boxShadow: "0 0 30px rgba(251, 191, 36, 0.6)",
            duration: 2,
            repeat: -1,
            yoyo: true,
            ease: "power2.inOut"
        });
    }

    // Mobile menu toggle with GSAP
    let mobileMenuOpen = false;

    mobileMenuButton.addEventListener('click', function() {
        if (!mobileMenuOpen) {
            openMobileMenu();
        } else {
            closeMobileMenu();
        }
    });

    function openMobileMenu() {
        mobileMenuOpen = true;
        mobileMenu.classList.remove('hidden');

        // Animate menu icon
        gsap.to(menuIcon, {
            rotation: 180,
            duration: 0.3,
            ease: "power2.out",
            onComplete: () => {
                menuIcon.setAttribute('data-lucide', 'x');
                lucide.createIcons();
            }
        });

        // Animate menu container
        gsap.fromTo(mobileMenu, {
            opacity: 0,
            y: -20,
            scale: 0.95
        }, {
            opacity: 1,
            y: 0,
            scale: 1,
            duration: 0.4,
            ease: "back.out(1.7)"
        });

        // Stagger animate menu links
        gsap.fromTo('.mobile-nav-link', {
            opacity: 0,
            x: -30
        }, {
            opacity: 1,
            x: 0,
            duration: 0.3,
            stagger: 0.1,
            delay: 0.2,
            ease: "power2.out"
        });
    }

    function closeMobileMenu() {
        mobileMenuOpen = false;

        // Animate menu icon
        gsap.to(menuIcon, {
            rotation: 0,
            duration: 0.3,
            ease: "power2.out",
            onComplete: () => {
                menuIcon.setAttribute('data-lucide', 'menu');
                lucide.createIcons();
            }
        });

        // Animate menu out
        gsap.to(mobileMenu, {
            opacity: 0,
            y: -10,
            scale: 0.95,
            duration: 0.2,
            ease: "power2.in",
            onComplete: () => {
                mobileMenu.classList.add('hidden');
            }
        });
    }

    // Close mobile menu when clicking on links
    document.querySelectorAll('.mobile-nav-link').forEach(link => {
        link.addEventListener('click', function() {
            closeMobileMenu();
        });
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(e) {
        if (mobileMenuOpen && !mobileMenu.contains(e.target) && !mobileMenuButton.contains(e.target)) {
            closeMobileMenu();
        }
    });

    function initNavbarAnimations() {
        // Animate navbar on load
        gsap.fromTo(navbar, {
            y: -100,
            opacity: 0
        }, {
            y: 0,
            opacity: 1,
            duration: 1,
            ease: "power3.out",
            delay: 0.5
        });

        // Add hover animations to navigation links
        document.querySelectorAll('.nav-link').forEach(link => {
            const icon = link.querySelector('i');

            link.addEventListener('mouseenter', () => {
                gsap.to(icon, {
                    scale: 1.2,
                    rotation: 10,
                    duration: 0.3,
                    ease: "back.out(1.7)"
                });
            });

            link.addEventListener('mouseleave', () => {
                gsap.to(icon, {
                    scale: 1,
                    rotation: 0,
                    duration: 0.3,
                    ease: "back.out(1.7)"
                });
            });
        });

        // Add magnetic effect to logo
        const logo = document.querySelector('.magnetic');
        if (logo) {
            logo.addEventListener('mousemove', (e) => {
                const rect = logo.getBoundingClientRect();
                const x = e.clientX - rect.left - rect.width / 2;
                const y = e.clientY - rect.top - rect.height / 2;

                gsap.to(logo, {
                    duration: 0.3,
                    x: x * 0.1,
                    y: y * 0.1,
                    rotation: x * 0.1,
                    ease: "power2.out"
                });
            });

            logo.addEventListener('mouseleave', () => {
                gsap.to(logo, {
                    duration: 0.5,
                    x: 0,
                    y: 0,
                    rotation: 0,
                    ease: "elastic.out(1, 0.3)"
                });
            });
        }
    }

    // Smooth scroll to sections on the same page
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            // Only handle if it's on the same page
            if (this.getAttribute('href').startsWith('#') && 
                window.location.pathname === '/') {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    gsap.to(window, {
                        duration: 1.2,
                        scrollTo: {
                            y: target.offsetTop - 100,
                            autoKill: false
                        },
                        ease: "power3.inOut"
                    });
                }
            }
        });
    });
});
</script>