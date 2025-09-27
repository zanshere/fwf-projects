{{-- resources/views/layouts/navigation.blade.php --}}
<nav class="fixed w-full z-50 transition-all duration-300" id="navbar">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <div class="bg-white rounded-full p-2 shadow-lg">
                    <div class="w-12 h-12 bg-gradient-to-br...600 to-green-800 rounded-full flex items-center justify-center">
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
                    class="nav-link text-white font-bold te...ver:text-yellow-400 transition-all duration-300 relative group">
                    <span class="flex items-center gap-2">
                        <i data-lucide="home" class="w-4 h-4 transition-transform duration-300 group-hover:scale-110"></i>
                        HOME
                    </span>
                    <span class="absolute -bottom-1 left-0 ...llow-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ url('/') }}#about"
                    class="nav-link text-white font-bold te...ver:text-yellow-400 transition-all duration-300 relative group">
                    <span class="flex items-center gap-2">
                        <i data-lucide="info" class="w-4 h-4 transition-transform duration-300 group-hover:scale-110"></i>
                        ABOUT US
                    </span>
                    <span class="absolute -bottom-1 left-0 ...llow-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ url('/') }}#gallery"
                    class="nav-link text-white font-bold te...ver:text-yellow-400 transition-all duration-300 relative group">
                    <span class="flex items-center gap-2">
                        <i data-lucide="image" class="w-4 h-4 transition-transform duration-300 group-hover:scale-110"></i>
                        GALLERY
                    </span>
                    <span class="absolute -bottom-1 left-0 ...llow-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ url('/') }}#tickets"
                    class="nav-link text-white font-bold te...ver:text-yellow-400 transition-all duration-300 relative group">
                    <span class="flex items-center gap-2">
                        <i data-lucide="ticket" class="w-4 h-4 transition-transform duration-300 group-hover:scale-110"></i>
                        TICKETS
                    </span>
                    <span class="absolute -bottom-1 left-0 ...llow-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ url('/') }}#contact"
                    class="nav-link text-white font-bold te...ver:text-yellow-400 transition-all duration-300 relative group">
                    <span class="flex items-center gap-2">
                        <i data-lucide="phone" class="w-4 h-4 transition-transform duration-300 group-hover:scale-110"></i>
                        CONTACT
                    </span>
                    <span class="absolute -bottom-1 left-0 ...llow-400 transition-all duration-300 group-hover:w-full"></span>
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
                        <span>Login</span>
                    </button>
                @endauth

                <!-- User Dropdown -->
                @auth
                    <div class="relative inline-block text-left">
                        <button type="button"
                                class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-white/10 hover:bg-white/20 text-white focus:outline-none"
                                id="user-menu-button" aria-expanded="true" aria-haspopup="true">
                            <i data-lucide="user" class="w-5 h-5"></i>
                            <span class="hidden lg:inline">{{ Auth::user()->name }}</span>
                            <i data-lucide="chevron-down" class="w-4 h-4"></i>
                        </button>

                        <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-lg shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden hs-dropdown-menu"
                             role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <div class="py-3 px-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-green-600 to-green-800 flex items-center justify-center">
                                        <i data-lucide="user" class="w-5 h-5 text-white"></i>
                                    </div>
                                    <div class="ms-3">
                                        <p class="font-bold text-green-800">{{ Auth::user()->name }}</p>
                                        <p class="text-sm text-green-600">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu Items -->
                            <div class="py-2">
                                <!-- Dashboard link - hide when already on dashboard -->
                                @if (!request()->routeIs('dashboard*'))
                                <a href="{{ route('dashboard') }}"
                                   class="flex items-center...-50 rounded-lg transition-colors duration-200 hs-dropdown-item">
                                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                                    <span>Dashboard</span>
                                </a>
                                @endif

                                <!-- Home link - show when on dashboard -->
                                @if (request()->routeIs('dashboard*'))
                                <a href="{{ url('/dashboard') }}"
                                   class="flex items-center...-50 rounded-lg transition-colors duration-200 hs-dropdown-item">
                                    <i data-lucide="home" class="w-4 h-4"></i>
                                    <span>Beranda</span>
                                </a>
                                @endif

                                <a href="{{ route('profile.edit') }}"
                                   class="flex items-center...-50 rounded-lg transition-colors duration-200 hs-dropdown-item">
                                    <i data-lucide="user" class="w-4 h-4"></i>
                                    <span>Profile</span>
                                </a>

                                <a href="{{ route('tickets.index') }}"
                                   class="flex items-center...-50 rounded-lg transition-colors duration-200 hs-dropdown-item">
                                    <i data-lucide="ticket" class="w-4 h-4"></i>
                                    <span>My Tickets</span>
                                </a>

                                <a href="{{ route('profile.edit') }}#settings"
                                   class="flex items-center...-50 rounded-lg transition-colors duration-200 hs-dropdown-item">
                                    <i data-lucide="settings" class="w-4 h-4"></i>
                                    <span>Settings</span>
                                </a>
                            </div>

                            <!-- Logout -->
                            <div class="py-2 border-t border-green-100">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                            class="w-full flex items...-50 rounded-lg transition-colors duration-200 hs-dropdown-item">
                                        <i data-lucide="log-out" class="w-4 h-4"></i>
                                        <span>Logout</span>
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
        <div class="bg-white/95 backdrop-blur-md rounded-2xl mt-4 p-6 shadow-2xl border border-white/10">
            <div class="space-y-4">
                <!-- Mobile Navigation Links - Conditional -->
                @guest
                <a href="{{ url('/') }}#home"
                    class="mobile-nav-link block text-g...ld text-lg hover:text-green-600 transition-colors duration-200">
                    <span class="flex items-center gap-3">
                        <i data-lucide="home" class="w-5 h-5"></i>
                        HOME
                    </span>
                </a>
                <a href="{{ url('/') }}#about"
                    class="mobile-nav-link block text-g...ld text-lg hover:text-green-600 transition-colors duration-200">
                    <span class="flex items-center gap-3">
                        <i data-lucide="info" class="w-5 h-5"></i>
                        ABOUT
                    </span>
                </a>
                <a href="{{ url('/') }}#gallery"
                    class="mobile-nav-link block text-g...ld text-lg hover:text-green-600 transition-colors duration-200">
                    <span class="flex items-center gap-3">
                        <i data-lucide="image" class="w-5 h-5"></i>
                        GALLERY
                    </span>
                </a>
                <a href="{{ url('/') }}#tickets"
                    class="mobile-nav-link block text-g...ld text-lg hover:text-green-600 transition-colors duration-200">
                    <span class="flex items-center gap-3">
                        <i data-lucide="ticket" class="w-5 h-5"></i>
                        TICKETS
                    </span>
                </a>
                <a href="{{ url('/') }}#contact"
                    class="mobile-nav-link block text-g...ld text-lg hover:text-green-600 transition-colors duration-200">
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
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-green-600 to-green-800 flex items-center justify-center">
                                <i data-lucide="user" class="w-5 h-5 text-white"></i>
                            </div>
                            <div>
                                <p class="font-bold text-green-800">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-green-600">{{ Auth::user()->email }}</p>
                            </div>
                        </div>

                        <!-- User Actions -->
                        <div class="space-y-2 mb-4">
                            @if (!request()->routeIs('dashboard*'))
                            <a href="{{ route('dashboard') }}"
                               class="w-full flex items...n-100 text-green-800 rounded-lg transition-colors duration-200">
                                <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                                <span>Dashboard</span>
                            </a>
                            @else
                            <a href="{{ url('/') }}"
                               class="w-full flex items...n-100 text-green-800 rounded-lg transition-colors duration-200">
                                <i data-lucide="home" class="w-4 h-4"></i>
                                <span>Beranda</span>
                            </a>
                            @endif
                            <a href="{{ route('profile.edit') }}"
                               class="w-full flex items...n-100 text-green-800 rounded-lg transition-colors duration-200">
                                <i data-lucide="user" class="w-4 h-4"></i>
                                <span>Profile</span>
                            </a>
                            <a href="{{ route('tickets.index') }}"
                               class="w-full flex items...n-100 text-green-800 rounded-lg transition-colors duration-200">
                                <i data-lucide="ticket" class="w-4 h-4"></i>
                                <span>My Tickets</span>
                            </a>
                        </div>

                        <!-- Logout -->
                        <div class="py-2 border-t border-green-100">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="w-full flex items...n-50 rounded-lg transition-colors duration-200 hs-dropdown-item">
                                    <i data-lucide="log-out" class="w-4 h-4"></i>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    @else
                        <!-- Mobile Login Button -->
                        <button onclick="window.location.href='{{ route('login') }}'"
                                class="w-full block text-center bg-green-600 text-white px-4 py-2 rounded-lg">
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
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mobileToggle = document.getElementById('mobile-menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileIcon = document.getElementById('mobile-menu-icon');

        mobileToggle && mobileToggle.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
            // toggle icon
            if (mobileMenu.classList.contains('hidden')) {
                mobileIcon.setAttribute('data-lucide', 'menu');
            } else {
                mobileIcon.setAttribute('data-lucide', 'x');
            }
            // re-init lucide on attribute change
            if (window.lucide) lucide.replace();
        });

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        const navLinks = document.querySelectorAll('.nav-link');

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

        // Dropdown toggle (simple)
        document.querySelectorAll('[id="user-menu-button"]').forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                const menu = this.closest('div').querySelector('.hs-dropdown-menu');
                if (menu) menu.classList.toggle('hidden');
            });
        });

        // GSAP micro animations for dropdown items (if GSAP loaded)
        if (window.gsap) {
            document.querySelectorAll('.hs-dropdown-item').forEach(item => {
                gsap.from(item, { opacity: 0, y: -6, duration: 0.18, ease: "power2.out" });
            });
        }

        // Add hover effects for dropdown items
        document.querySelectorAll('.hs-dropdown-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                gsap.to(this, { x: 4, duration: 0.2, ease: "power2.out" });
            });

            item.addEventListener('mouseleave', function() {
                gsap.to(this, { x: 0, duration: 0.2, ease: "power2.out" });
            });
        });
    });
</script>
