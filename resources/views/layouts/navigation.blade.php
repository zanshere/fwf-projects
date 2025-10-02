{{-- resources/views/layouts/navigation.blade.php --}}
<nav class="fixed w-full z-50 transition-all duration-300" id="navbar">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <div class="bg-white rounded-full p-2 shadow-lg">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-600 to-green-800 rounded-full flex items-center justify-center">
                        <i data-lucide="mountain" class="w-6 h-6 text-white"></i>
                    </div>
                </div>
                <div class="text-white">
                    <div class="text-xl font-black">FAJAR</div>
                    <div class="text-xs text-green-200">WORLD</div>
                </div>
            </div>

            <!-- Desktop Navigation - Hidden on Dashboard -->
            @guest
            <div class="hidden lg:flex items-center space-x-8">
                <a href="{{ url('/') }}#home"
                    class="nav-link text-white font-bold text-sm tracking-wider hover:text-yellow-400 transition-all duration-300 relative group">
                    <span class="flex items-center gap-2">
                        <i data-lucide="home" class="w-4 h-4 transition-transform duration-300 group-hover:scale-110"></i>
                        HOME
                    </span>
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ url('/') }}#about"
                    class="nav-link text-white font-bold text-sm tracking-wider hover:text-yellow-400 transition-all duration-300 relative group">
                    <span class="flex items-center gap-2">
                        <i data-lucide="info" class="w-4 h-4 transition-transform duration-300 group-hover:scale-110"></i>
                        ABOUT US
                    </span>
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ url('/') }}#gallery"
                    class="nav-link text-white font-bold text-sm tracking-wider hover:text-yellow-400 transition-all duration-300 relative group">
                    <span class="flex items-center gap-2">
                        <i data-lucide="image" class="w-4 h-4 transition-transform duration-300 group-hover:scale-110"></i>
                        GALLERY
                    </span>
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ url('/') }}#tickets"
                    class="nav-link text-white font-bold text-sm tracking-wider hover:text-yellow-400 transition-all duration-300 relative group">
                    <span class="flex items-center gap-2">
                        <i data-lucide="ticket" class="w-4 h-4 transition-transform duration-300 group-hover:scale-110"></i>
                        TICKETS
                    </span>
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ url('/') }}#contact"
                    class="nav-link text-white font-bold text-sm tracking-wider hover:text-yellow-400 transition-all duration-300 relative group">
                    <span class="flex items-center gap-2">
                        <i data-lucide="phone" class="w-4 h-4 transition-transform duration-300 group-hover:scale-110"></i>
                        CONTACT
                    </span>
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
            </div>
            @endguest

            <!-- Dashboard Breadcrumb - Show only on Dashboard -->
            @if (request()->routeIs('dashboard*'))
            <div class="hidden lg:flex items-center space-x-2 text-white/80">
                @if (request()->routeIs('dashboard') && !request()->routeIs('dashboard'))
                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                    <span class="text-sm">{{ ucfirst(request()->route()->getName()) }}</span>
                @endif
            </div>
            @endif

            <!-- CTA Buttons & User Menu -->
            <div class="hidden lg:flex items-center space-x-4">
                @auth
                    <!-- Create Ticket / CTA for Authenticated -->
                    <a href="{{ route('tickets.create') }}"
                       class="inline-flex items-center gap-2 bg-white text-green-700 px-4 py-2 rounded-lg shadow hover:shadow-lg transition">
                        <i data-lucide="plus-circle" class="w-4 h-4"></i>
                        <span class="font-semibold text-sm">Create Ticket</span>
                    </a>
                @else
                    <!-- Login Button -->
                    <button onclick="window.location.href='{{ route('login') }}'"
                            class="bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-lg transition-colors">
                        <span><i data-lucide="user" class="w-5 h-5 pr-5"></i>Login</span>
                    </button>
                @endauth

                <!-- User Dropdown -->
                @auth
                <div class="relative inline-block text-left" x-data="{ open: false }" @click.away="open = false">
                    <button type="button"
                            @click="open = !open"
                            class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-white/10 hover:bg-white/20 text-white focus:outline-none focus:ring-2 focus:ring-white/20 transition-all duration-200"
                            aria-expanded="false" aria-haspopup="true">
                        <i data-lucide="user" class="w-5 h-5"></i>
                        <span class="hidden lg:inline font-medium">{{ Auth::user()->name }}</span>
                        <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-200"
                           :class="{ 'rotate-180': open }"></i>
                    </button>

                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95 -translate-y-1"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 scale-95 -translate-y-1"
                         class="origin-top-right absolute right-0 mt-2 w-64 rounded-xl shadow-lg bg-white ring-1 ring-black/5 z-50"
                         role="menu" aria-orientation="vertical" style="display: none;">

                        <!-- User Header -->
                        <div class="py-4 px-5 border-b border-gray-100">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-green-600 to-green-800 flex items-center justify-center flex-shrink-0 shadow-md">
                                    <i data-lucide="user" class="w-6 h-6 text-white"></i>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="font-bold text-gray-900 truncate text-sm">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Menu Items -->
                        <div class="py-2 px-2">
                            <!-- Dashboard/Home Link -->
                            @if (!request()->routeIs('dashboard*'))
                            <a href="{{ route('dashboard') }}"
                               class="dropdown-item flex items-center gap-3 py-3 px-3 rounded-lg text-sm text-gray-700 hover:bg-green-50 hover:text-green-800 focus:outline-none focus:bg-green-50 transition-all duration-200 group">
                                <i data-lucide="layout-dashboard" class="w-4 h-4 text-gray-500 group-hover:text-green-600"></i>
                                <span class="font-medium">Dashboard</span>
                            </a>
                            @else
                            <a href="{{ url('/') }}"
                               class="dropdown-item flex items-center gap-3 py-3 px-3 rounded-lg text-sm text-gray-700 hover:bg-green-50 hover:text-green-800 focus:outline-none focus:bg-green-50 transition-all duration-200 group">
                                <i data-lucide="home" class="w-4 h-4 text-gray-500 group-hover:text-green-600"></i>
                                <span class="font-medium">Beranda</span>
                            </a>
                            @endif

                            <!-- Profile -->
                            <a href="{{ route('profile.edit') }}"
                               class="dropdown-item flex items-center gap-3 py-3 px-3 rounded-lg text-sm text-gray-700 hover:bg-green-50 hover:text-green-800 focus:outline-none focus:bg-green-50 transition-all duration-200 group">
                                <i data-lucide="user-circle" class="w-4 h-4 text-gray-500 group-hover:text-green-600"></i>
                                <span class="font-medium">Profile</span>
                            </a>

                            <!-- My Tickets -->
                            <a href="{{ route('tickets.my-tickets') }}"
                               class="dropdown-item flex items-center gap-3 py-3 px-3 rounded-lg text-sm text-gray-700 hover:bg-green-50 hover:text-green-800 focus:outline-none focus:bg-green-50 transition-all duration-200 group">
                                <i data-lucide="ticket" class="w-4 h-4 text-gray-500 group-hover:text-green-600"></i>
                                <span class="font-medium">My Tickets</span>
                            </a>

                            <!-- Settings -->
                            <a href="{{ route('profile.edit') }}#settings"
                               class="dropdown-item flex items-center gap-3 py-3 px-3 rounded-lg text-sm text-gray-700 hover:bg-green-50 hover:text-green-800 focus:outline-none focus:bg-green-50 transition-all duration-200 group">
                                <i data-lucide="settings" class="w-4 h-4 text-gray-500 group-hover:text-green-600"></i>
                                <span class="font-medium">Settings</span>
                            </a>
                        </div>

                        <!-- Logout Section -->
                        <div class="py-2 px-2 border-t border-gray-100">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="dropdown-item w-full flex items-center gap-3 py-3 px-3 rounded-lg text-sm text-red-600 hover:bg-red-50 focus:outline-none focus:bg-red-50 transition-all duration-200 group">
                                    <i data-lucide="log-out" class="w-4 h-4 text-red-500 group-hover:text-red-600"></i>
                                    <span class="font-medium">Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <div class="lg:hidden">
                <button class="text-white p-2 focus:outline-none" id="mobile-menu-toggle">
                    <i data-lucide="menu" class="w-6 h-6" id="mobile-menu-icon"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div class="lg:hidden hidden" id="mobile-menu">
        <div class="bg-white/95 backdrop-blur-md rounded-2xl mt-4 mx-4 p-6 shadow-2xl border border-white/10">
            <div class="space-y-4">
                <!-- Mobile Navigation Links - Conditional -->
                @guest
                <a href="{{ url('/') }}#home"
                    class="mobile-nav-link block text-gray-800 font-bold text-lg hover:text-green-600 transition-colors duration-200">
                    <span class="flex items-center gap-3">
                        <i data-lucide="home" class="w-5 h-5"></i>
                        HOME
                    </span>
                </a>
                <a href="{{ url('/') }}#about"
                    class="mobile-nav-link block text-gray-800 font-bold text-lg hover:text-green-600 transition-colors duration-200">
                    <span class="flex items-center gap-3">
                        <i data-lucide="info" class="w-5 h-5"></i>
                        ABOUT
                    </span>
                </a>
                <a href="{{ url('/') }}#gallery"
                    class="mobile-nav-link block text-gray-800 font-bold text-lg hover:text-green-600 transition-colors duration-200">
                    <span class="flex items-center gap-3">
                        <i data-lucide="image" class="w-5 h-5"></i>
                        GALLERY
                    </span>
                </a>
                <a href="{{ url('/') }}#tickets"
                    class="mobile-nav-link block text-gray-800 font-bold text-lg hover:text-green-600 transition-colors duration-200">
                    <span class="flex items-center gap-3">
                        <i data-lucide="ticket" class="w-5 h-5"></i>
                        TICKETS
                    </span>
                </a>
                <a href="{{ url('/') }}#contact"
                    class="mobile-nav-link block text-gray-800 font-bold text-lg hover:text-green-600 transition-colors duration-200">
                    <span class="flex items-center gap-3">
                        <i data-lucide="phone" class="w-5 h-5"></i>
                        CONTACT
                    </span>
                </a>
                @endguest

                <!-- Mobile User Section -->
                <div class="pt-4 border-t border-green-200">
                    @auth
                        <!-- User Info -->
                        <div class="flex items-center space-x-3 mb-4 p-3 bg-green-50 rounded-xl">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-green-600 to-green-800 flex items-center justify-center flex-shrink-0">
                                <i data-lucide="user" class="w-5 h-5 text-white"></i>
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="font-bold text-green-800 truncate">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-green-600 truncate">{{ Auth::user()->email }}</p>
                            </div>
                        </div>

                        <!-- User Actions -->
                        <div class="space-y-2 mb-4">
                            @if (!request()->routeIs('dashboard*'))
                            <a href="{{ route('dashboard') }}"
                               class="mobile-dropdown-item w-full flex items-center gap-3 py-3 px-4 bg-green-50 hover:bg-green-100 text-green-800 rounded-lg transition-colors duration-200">
                                <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                                <span>Dashboard</span>
                            </a>
                            @else
                            <a href="{{ url('/') }}"
                               class="mobile-dropdown-item w-full flex items-center gap-3 py-3 px-4 bg-green-50 hover:bg-green-100 text-green-800 rounded-lg transition-colors duration-200">
                                <i data-lucide="home" class="w-4 h-4"></i>
                                <span>Beranda</span>
                            </a>
                            @endif
                            <a href="{{ route('profile.edit') }}"
                               class="mobile-dropdown-item w-full flex items-center gap-3 py-3 px-4 bg-green-50 hover:bg-green-100 text-green-800 rounded-lg transition-colors duration-200">
                                <i data-lucide="user-circle" class="w-4 h-4"></i>
                                <span>Profile</span>
                            </a>
                            <a href="{{ route('tickets.my-tickets') }}"
                               class="mobile-dropdown-item w-full flex items-center gap-3 py-3 px-4 bg-green-50 hover:bg-green-100 text-green-800 rounded-lg transition-colors duration-200">
                                <i data-lucide="ticket" class="w-4 h-4"></i>
                                <span>My Tickets</span>
                            </a>
                        </div>

                        <!-- Mobile Logout -->
                        <div class="py-2 border-t border-green-200">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="w-full flex items-center gap-3 py-3 px-4 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg transition-colors duration-200">
                                    <i data-lucide="log-out" class="w-4 h-4"></i>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    @else
                        <!-- Mobile Login Button -->
                        <button onclick="window.location.href='{{ route('login') }}'"
                                class="w-full block text-center bg-green-600 text-white px-4 py-3 rounded-lg font-medium hover:bg-green-700 transition-colors">
                            Login
                        </button>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
    /* Navbar background - Always show background on dashboard */
    #navbar {
        @if (request()->routeIs('dashboard*'))
            background: rgba(34, 197, 94, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        @endif
    }

    /* Navbar scroll effect - Only apply on non-dashboard pages */
    @if (!request()->routeIs('dashboard*'))
    .navbar-scrolled {
        background: rgba(34, 197, 94, 0.95);
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .navbar-scrolled .nav-link {
        color: #ffffff;
    }

    .navbar-scrolled .nav-link .w-4 {
        color: #fff;
    }
    @endif

    /* Custom dropdown animations */
    .dropdown-item {
        transform: translateX(0);
        transition: all 0.2s ease;
    }

    .dropdown-item:hover {
        transform: translateX(4px);
    }

    /* Alpine.js custom styles */
    [x-cloak] {
        display: none !important;
    }
</style>

<!-- Required Scripts -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="//unpkg.com/alpinejs" defer></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Lucide icons
        if (window.lucide) {
            lucide.createIcons();
        }

        // Mobile menu toggle
        const mobileToggle = document.getElementById('mobile-menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileIcon = document.getElementById('mobile-menu-icon');

        if (mobileToggle) {
            mobileToggle.addEventListener('click', function () {
                mobileMenu.classList.toggle('hidden');

                // Toggle icon with GSAP animation
                if (mobileMenu.classList.contains('hidden')) {
                    gsap.to(mobileIcon, {
                        rotation: 0,
                        duration: 0.3,
                        ease: "power2.out",
                        onComplete: () => {
                            mobileIcon.setAttribute('data-lucide', 'menu');
                            lucide.createIcons();
                        }
                    });
                } else {
                    mobileIcon.setAttribute('data-lucide', 'x');
                    lucide.createIcons();
                    gsap.fromTo(mobileIcon,
                        { rotation: -90, scale: 0.8 },
                        { rotation: 0, scale: 1, duration: 0.3, ease: "back.out(1.7)" }
                    );

                    // Animate mobile menu items
                    gsap.fromTo('.mobile-nav-link, .mobile-dropdown-item',
                        { opacity: 0, y: -20 },
                        { opacity: 1, y: 0, duration: 0.5, stagger: 0.1, ease: "power2.out" }
                    );
                }
            });
        }

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        const isDashboard = {{ request()->routeIs('dashboard*') ? 'true' : 'false' }};

        if (!isDashboard) {
            window.addEventListener('scroll', function () {
                if (window.scrollY > 40) {
                    navbar.classList.add('navbar-scrolled');
                } else {
                    navbar.classList.remove('navbar-scrolled');
                }
            });
        }

        // GSAP animations for dropdown items
        function animateDropdownItems() {
            const dropdownItems = document.querySelectorAll('.dropdown-item');

            // Animate items appearance
            gsap.fromTo(dropdownItems,
                { opacity: 0, x: -10 },
                { opacity: 1, x: 0, duration: 0.3, stagger: 0.05, ease: "power2.out" }
            );
        }

        // Observer to detect when dropdown opens
        const dropdownObserver = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.target.style.display !== 'none' && mutation.target.classList.contains('origin-top-right')) {
                    setTimeout(animateDropdownItems, 50);
                }
            });
        });

        // Start observing dropdown
        const dropdownMenu = document.querySelector('.origin-top-right');
        if (dropdownMenu) {
            dropdownObserver.observe(dropdownMenu, {
                attributes: true,
                attributeFilter: ['style']
            });
        }

        // Add hover animations for dropdown items
        document.querySelectorAll('.dropdown-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                gsap.to(this, {
                    x: 4,
                    duration: 0.2,
                    ease: "power2.out"
                });

                const icon = this.querySelector('i[data-lucide]');
                if (icon) {
                    gsap.to(icon, { scale: 1.1, duration: 0.2, ease: "power2.out" });
                }
            });

            item.addEventListener('mouseleave', function() {
                gsap.to(this, {
                    x: 0,
                    duration: 0.2,
                    ease: "power2.out"
                });

                const icon = this.querySelector('i[data-lucide]');
                if (icon) {
                    gsap.to(icon, { scale: 1, duration: 0.2, ease: "power2.out" });
                }
            });
        });

        // Add pulse animation to user avatar
        const userAvatars = document.querySelectorAll('.w-12.h-12.rounded-full, .w-10.h-10.rounded-full');
        userAvatars.forEach(avatar => {
            gsap.to(avatar, {
                scale: 1.05,
                duration: 2,
                ease: "power2.inOut",
                yoyo: true,
                repeat: -1
            });
        });

        // Animate navigation links on page load
        gsap.fromTo('.nav-link',
            { opacity: 0, y: -20 },
            { opacity: 1, y: 0, duration: 0.6, stagger: 0.1, ease: "power2.out", delay: 0.2 }
        );

        // Add click feedback animation
        document.querySelectorAll('button, a').forEach(element => {
            element.addEventListener('click', function(e) {
                if (this.closest('.dropdown-item')) return; // Skip dropdown items

                const ripple = document.createElement('span');
                ripple.className = 'absolute inset-0 rounded-full bg-white/20 pointer-events-none';
                this.style.position = 'relative';
                this.style.overflow = 'hidden';
                this.appendChild(ripple);

                gsap.fromTo(ripple,
                    { scale: 0, opacity: 0.8 },
                    { scale: 2, opacity: 0, duration: 0.4, ease: "power2.out",
                      onComplete: () => ripple.remove() }
                );
            });
        });
    });
</script>
