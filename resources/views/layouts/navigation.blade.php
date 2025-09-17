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

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-8">
                <a href="{{ url('/') }}#home"
                    class="nav-link text-white font-bold text-lg hover:text-yellow-400 transition-all duration-300 relative group">
                    <span class="flex items-center gap-2">
                        <i data-lucide="home" class="w-4 h-4 transition-transform duration-300 group-hover:scale-110"></i>
                        HOME
                    </span>
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ url('/') }}#about"
                    class="nav-link text-white font-bold text-lg hover:text-yellow-400 transition-all duration-300 relative group">
                    <span class="flex items-center gap-2">
                        <i data-lucide="info" class="w-4 h-4 transition-transform duration-300 group-hover:scale-110"></i>
                        ABOUT US
                    </span>
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ url('/') }}#gallery" 
                    class="nav-link text-white font-bold text-lg hover:text-yellow-400 transition-all duration-300 relative group">
                    <span class="flex items-center gap-2">
                        <i data-lucide="image" class="w-4 h-4 transition-transform duration-300 group-hover:scale-110"></i>
                        GALLERY
                    </span>
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ url('/') }}#tickets" 
                    class="nav-link text-white font-bold text-lg hover:text-yellow-400 transition-all duration-300 relative group">
                    <span class="flex items-center gap-2">
                        <i data-lucide="ticket" class="w-4 h-4 transition-transform duration-300 group-hover:scale-110"></i>
                        TICKETS
                    </span>
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ url('/') }}#contact" 
                    class="nav-link text-white font-bold text-lg hover:text-yellow-400 transition-all duration-300 relative group">
                    <span class="flex items-center gap-2">
                        <i data-lucide="phone" class="w-4 h-4 transition-transform duration-300 group-hover:scale-110"></i>
                        CONTACT
                    </span>
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
            </div>

            <!-- CTA Buttons & User Menu -->
            <div class="hidden lg:flex items-center space-x-4">
                @auth
                    <!-- User Dropdown Menu -->
                    <div class="hs-dropdown relative inline-flex">
                        <button id="hs-dropdown-with-header" type="button" 
                                class="hs-dropdown-toggle flex items-center space-x-2 text-white hover:text-yellow-400 transition-colors duration-300">
                            <div class="w-10 h-10 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-full flex items-center justify-center shadow-lg">
                                <i data-lucide="user" class="w-5 h-5 text-green-900"></i>
                            </div>
                            <span class="font-semibold">{{ Auth::user()->name }}</span>
                            <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-300 hs-dropdown-open:rotate-180"></i>
                        </button>

                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white/95 backdrop-blur-md shadow-2xl rounded-2xl p-2 mt-2 border border-white/20"
                             aria-labelledby="hs-dropdown-with-header">
                            <!-- User Info -->
                            <div class="py-3 px-4 border-b border-green-100">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-green-600 to-green-800 rounded-full flex items-center justify-center">
                                        <i data-lucide="user" class="w-6 h-6 text-white"></i>
                                    </div>
                                    <div>
                                        <p class="font-bold text-green-800">{{ Auth::user()->name }}</p>
                                        <p class="text-sm text-green-600">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Menu Items -->
                            <div class="py-2">
                                <a href="{{ route('dashboard') }}" 
                                   class="flex items-center space-x-3 px-4 py-2 text-sm text-green-800 hover:bg-green-50 rounded-lg transition-colors duration-200">
                                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                                    <span>Dashboard</span>
                                </a>
                                <a href="{{ route('profile.edit') }}" 
                                   class="flex items-center space-x-3 px-4 py-2 text-sm text-green-800 hover:bg-green-50 rounded-lg transition-colors duration-200">
                                    <i data-lucide="settings" class="w-4 h-4"></i>
                                    <span>Profile Settings</span>
                                </a>
                                <a href="{{ route('tickets.index') }}" 
                                   class="flex items-center space-x-3 px-4 py-2 text-sm text-green-800 hover:bg-green-50 rounded-lg transition-colors duration-200">
                                    <i data-lucide="ticket" class="w-4 h-4"></i>
                                    <span>My Tickets</span>
                                </a>
                            </div>
                            
                            <!-- Logout -->
                            <div class="py-2 border-t border-green-100">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" 
                                            class="w-full flex items-center space-x-3 px-4 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg transition-colors duration-200">
                                        <i data-lucide="log-out" class="w-4 h-4"></i>
                                        <span>Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Login Button -->
                    <button onclick="window.location.href='{{ route('login') }}'" 
                            class="group relative overflow-hidden bg-white/10 backdrop-blur-sm border border-white/20 text-white font-bold py-2.5 px-5 rounded-full hover:bg-white hover:text-green-800 transition-all duration-500 shadow-lg">
                        <span class="relative z-10 flex items-center gap-2">
                            <i data-lucide="log-in" class="w-4 h-4 transition-transform duration-300 group-hover:rotate-12"></i>
                            <span>Login</span>
                        </span>
                        <!-- Animated background -->
                        <div class="absolute inset-0 bg-gradient-to-r from-white to-yellow-100 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                        <!-- Shimmer effect -->
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent transform -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
                    </button>
                @endauth
                
                <!-- Buy Ticket Button - Same style as Login -->
                <button onclick="window.location.href='{{ route('tickets.index') }}'" 
                        class="group relative overflow-hidden bg-yellow-400/20 backdrop-blur-sm border border-yellow-400/30 text-yellow-400 font-bold py-2.5 px-5 rounded-full hover:bg-yellow-400 hover:text-green-900 transition-all duration-500 shadow-lg">
                    <span class="relative z-10 flex items-center gap-2">
                        <i data-lucide="shopping-cart" class="w-4 h-4 transition-transform duration-300 group-hover:rotate-12"></i>
                        <span>Beli Tiket</span>
                    </span>
                    <!-- Animated background -->
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-400 to-yellow-300 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                    <!-- Shimmer effect -->
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-yellow-300/30 to-transparent transform -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
                </button>
            </div>

            <!-- Mobile Menu Button -->
            <button class="lg:hidden text-white p-2" id="mobile-menu-toggle">
                <i data-lucide="menu" class="w-6 h-6" id="mobile-menu-icon"></i>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <div class="lg:hidden hidden" id="mobile-menu">
            <div class="bg-white/95 backdrop-blur-md rounded-2xl mt-4 p-6 shadow-2xl border border-white/10">
                <div class="space-y-4">
                    <!-- Mobile Navigation Links -->
                    <a href="{{ url('/') }}#home"
                        class="mobile-nav-link block text-green-800 font-bold text-lg hover:text-green-600 transition-colors duration-200">
                        <span class="flex items-center gap-3">
                            <i data-lucide="home" class="w-5 h-5"></i>
                            HOME
                        </span>
                    </a>
                    <a href="{{ url('/') }}#about"
                        class="mobile-nav-link block text-green-800 font-bold text-lg hover:text-green-600 transition-colors duration-200">
                        <span class="flex items-center gap-3">
                            <i data-lucide="info" class="w-5 h-5"></i>
                            ABOUT US
                        </span>
                    </a>
                    <a href="{{ url('/') }}#gallery" 
                        class="mobile-nav-link block text-green-800 font-bold text-lg hover:text-green-600 transition-colors duration-200">
                        <span class="flex items-center gap-3">
                            <i data-lucide="image" class="w-5 h-5"></i>
                            GALLERY
                        </span>
                    </a>
                    <a href="{{ url('/') }}#tickets" 
                        class="mobile-nav-link block text-green-800 font-bold text-lg hover:text-green-600 transition-colors duration-200">
                        <span class="flex items-center gap-3">
                            <i data-lucide="ticket" class="w-5 h-5"></i>
                            TICKETS
                        </span>
                    </a>
                    <a href="{{ url('/') }}#contact" 
                        class="mobile-nav-link block text-green-800 font-bold text-lg hover:text-green-600 transition-colors duration-200">
                        <span class="flex items-center gap-3">
                            <i data-lucide="phone" class="w-5 h-5"></i>
                            CONTACT
                        </span>
                    </a>
                    
                    <!-- Mobile User Section -->
                    <div class="pt-4 border-t border-green-200">
                        @auth
                            <!-- User Info -->
                            <div class="flex items-center space-x-3 mb-4 p-3 bg-green-50 rounded-xl">
                                <div class="w-10 h-10 bg-gradient-to-br from-green-600 to-green-800 rounded-full flex items-center justify-center">
                                    <i data-lucide="user" class="w-5 h-5 text-white"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-green-800">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-green-600">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            
                            <!-- User Actions -->
                            <div class="space-y-2 mb-4">
                                <a href="{{ route('dashboard') }}" 
                                   class="w-full flex items-center gap-3 p-3 bg-green-50 hover:bg-green-100 text-green-800 rounded-lg transition-colors duration-200">
                                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                                    <span>Dashboard</span>
                                </a>
                                <a href="{{ route('profile.edit') }}" 
                                   class="w-full flex items-center gap-3 p-3 bg-green-50 hover:bg-green-100 text-green-800 rounded-lg transition-colors duration-200">
                                    <i data-lucide="settings" class="w-4 h-4"></i>
                                    <span>Profile Settings</span>
                                </a>
                            </div>
                            
                            <!-- Logout Button -->
                            <form method="POST" action="{{ route('logout') }}" class="mb-4">
                                @csrf
                                <button type="submit" 
                                        class="w-full bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded-full transition-all duration-300 shadow-lg">
                                    <span class="flex items-center justify-center gap-2">
                                        <i data-lucide="log-out" class="w-4 h-4"></i>
                                        Logout
                                    </span>
                                </button>
                            </form>
                        @else
                            <!-- Mobile Login Button -->
                            <button onclick="window.location.href='{{ route('login') }}'" 
                                    class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-full transition-all duration-300 shadow-lg mb-4">
                                <span class="flex items-center justify-center gap-2">
                                    <i data-lucide="log-in" class="w-4 h-4"></i>
                                    Login
                                </span>
                            </button>
                        @endauth
                        
                        <!-- Buy Ticket Button -->
                        <button onclick="window.location.href='{{ route('tickets.index') }}'" 
                                class="w-full bg-yellow-400 hover:bg-yellow-300 text-green-900 font-bold py-3 px-6 rounded-full transition-all duration-300 shadow-lg">
                            <span class="flex items-center justify-center gap-2">
                                <i data-lucide="shopping-cart" class="w-4 h-4"></i>
                                Beli Tiket
                            </span>
                        </button>
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

    /* Mobile menu transition */
    #mobile-menu {
        transition: all 0.3s ease-in-out;
        transform: translateY(-10px);
        opacity: 0;
    }

    #mobile-menu.show {
        transform: translateY(0);
        opacity: 1;
    }

    /* Remove magnetic effects and simplify navigation links */
    .nav-link {
        position: relative;
    }

    /* Smooth icon transitions */
    .nav-link i {
        transition: transform 0.3s ease;
    }

    .nav-link:hover i {
        transform: scale(1.1);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.getElementById('navbar');
        const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuIcon = document.getElementById('mobile-menu-icon');
        
        let mobileMenuOpen = false;

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });

        // Mobile menu toggle
        mobileMenuToggle.addEventListener('click', function() {
            if (!mobileMenuOpen) {
                openMobileMenu();
            } else {
                closeMobileMenu();
            }
        });

        function openMobileMenu() {
            mobileMenuOpen = true;
            mobileMenu.classList.remove('hidden');
            
            // Change icon to X
            mobileMenuIcon.setAttribute('data-lucide', 'x');
            lucide.createIcons();
            
            // Show menu with transition
            setTimeout(() => {
                mobileMenu.classList.add('show');
            }, 10);
        }

        function closeMobileMenu() {
            mobileMenuOpen = false;
            mobileMenu.classList.remove('show');
            
            // Change icon back to menu
            mobileMenuIcon.setAttribute('data-lucide', 'menu');
            lucide.createIcons();
            
            // Hide menu after transition
            setTimeout(() => {
                mobileMenu.classList.add('hidden');
            }, 300);
        }

        // Close mobile menu when clicking on links
        document.querySelectorAll('.mobile-nav-link').forEach(link => {
            link.addEventListener('click', function() {
                closeMobileMenu();
            });
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(e) {
            if (mobileMenuOpen && 
                !mobileMenu.contains(e.target) && 
                !mobileMenuToggle.contains(e.target)) {
                closeMobileMenu();
            }
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const offsetTop = target.offsetTop - 100;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    });
</script>