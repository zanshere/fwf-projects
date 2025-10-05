<!DOCTYPE html>
<html lang="id" x-data="adminApp()" x-cloak>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Fajar World Fantasy</title>

    <!-- Vite CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-gray-900" :class="{ 'dark': darkMode }">
    <!-- Alert Container -->
    <div class="fixed top-20 right-6 z-60 space-y-3 max-w-sm w-full">
        <template x-for="(alert, index) in alerts" :key="alert.id">
            <div
                x-show="alert.visible"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="transform opacity-0 translate-x-full"
                x-transition:enter-end="transform opacity-100 translate-x-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="transform opacity-100 translate-x-0"
                x-transition:leave-end="transform opacity-0 translate-x-full"
                class="p-4 rounded-xl shadow-lg border backdrop-blur-sm"
                :class="{
                    'bg-green-50 border-green-200 text-green-800 dark:bg-green-900/20 dark:border-green-800': alert.type === 'success',
                    'bg-blue-50 border-blue-200 text-blue-800 dark:bg-blue-900/20 dark:border-blue-800': alert.type === 'info',
                    'bg-yellow-50 border-yellow-200 text-yellow-800 dark:bg-yellow-900/20 dark:border-yellow-800': alert.type === 'warning',
                    'bg-red-50 border-red-200 text-red-800 dark:bg-red-900/20 dark:border-red-800': alert.type === 'error'
                }"
            >
                <div class="flex items-start gap-3">
                    <div class="flex-shrink-0 mt-0.5">
                        <i :data-lucide="alert.icon" class="w-5 h-5"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium" x-text="alert.title"></p>
                        <p class="text-sm opacity-90 mt-1" x-text="alert.message"></p>
                    </div>
                    <button
                        @click="removeAlert(alert.id)"
                        class="flex-shrink-0 text-current hover:opacity-70 transition-opacity"
                    >
                        <i data-lucide="x" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>
        </template>
    </div>

    <!-- Sidebar -->
    <div class="fixed inset-y-0 start-0 z-50 w-64 bg-white border-e border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-col h-full">
            <!-- Logo -->
            <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                        <i data-lucide="shield-check" class="w-5 h-5 text-white"></i>
                    </div>
                    <span class="text-xl font-bold text-gray-800 dark:text-white">Admin Panel</span>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 p-3 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-green-50 dark:hover:bg-gray-700 transition-all duration-200 group"
                   :class="{ 'bg-green-50 dark:bg-gray-700': $page.url.startsWith('/admin/dashboard') }">
                    <i data-lucide="layout-dashboard" class="w-5 h-5 text-green-600"></i>
                    <span class="font-medium">Dashboard</span>
                </a>

                <a href="{{ route('admin.tickets.index') }}"
                   class="flex items-center gap-3 p-3 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-green-50 dark:hover:bg-gray-700 transition-all duration-200 group"
                   :class="{ 'bg-green-50 dark:bg-gray-700': $page.url.startsWith('/admin/tickets') }">
                    <i data-lucide="ticket" class="w-5 h-5 text-blue-600"></i>
                    <span class="font-medium">Manajemen Tiket</span>
                </a>

                <a href="{{ route('admin.rewards.redemptions') }}"
                   class="flex items-center gap-3 p-3 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-green-50 dark:hover:bg-gray-700 transition-all duration-200 group"
                   :class="{ 'bg-green-50 dark:bg-gray-700': $page.url.startsWith('/admin/rewards') }">
                    <i data-lucide="gift" class="w-5 h-5 text-purple-600"></i>
                    <span class="font-medium">Reward & Hadiah</span>
                </a>

                <a href="{{ route('admin.users.index') }}"
                   class="flex items-center gap-3 p-3 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-green-50 dark:hover:bg-gray-700 transition-all duration-200 group"
                   :class="{ 'bg-green-50 dark:bg-gray-700': $page.url.startsWith('/admin/users') }">
                    <i data-lucide="users" class="w-5 h-5 text-orange-600"></i>
                    <span class="font-medium">Manajemen User</span>
                </a>
            </nav>

            <!-- User Section -->
            <div class="p-4 border-t border-gray-200 dark:border-gray-700">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center">
                        <i data-lucide="user" class="w-5 h-5 text-white"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 dark:text-white truncate">
                            {{ Auth::user()->name ?? 'Admin' }}
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 truncate">
                            {{ Auth::user()->email ?? 'admin@fajarworld.com' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="min-h-screen lg:ms-64">
        <!-- Top Navigation -->
        <header class="sticky top-0 z-40 flex items-center justify-between w-full h-16 px-4 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700 lg:px-6">
            <!-- Page Title -->
            <div class="flex items-center gap-3">
                <button type="button"
                        class="lg:hidden text-gray-500 hover:text-gray-600"
                        @click="toggleSidebar()">
                    <i data-lucide="menu" class="w-5 h-5"></i>
                </button>
                <h1 class="text-lg font-semibold text-gray-800 dark:text-white">
                    @yield('page-title', 'Dashboard')
                </h1>
            </div>

            <!-- Right Section -->
            <div class="flex items-center gap-3">
                <!-- Dark Mode Toggle -->
                <button type="button"
                        class="flex items-center justify-center w-8 h-8 text-gray-500 transition-colors hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200"
                        @click="toggleTheme()">
                    <i data-lucide="moon" class="w-4 h-4" x-show="!darkMode"></i>
                    <i data-lucide="sun" class="w-4 h-4" x-show="darkMode"></i>
                </button>

                <!-- User Menu -->
                <div class="relative" x-data="{ open: false }">
                    <button type="button"
                            class="flex items-center gap-2"
                            @click="open = !open">
                        <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center">
                            <i data-lucide="user" class="w-4 h-4 text-white"></i>
                        </div>
                    </button>

                    <div class="absolute end-0 z-50 mt-2 w-48 bg-white shadow-2xl rounded-xl p-2 dark:bg-gray-800 border border-gray-200 dark:border-gray-700"
                         x-show="open"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         @click.outside="open = false">
                        <div class="px-3 py-2 border-b border-gray-200 dark:border-gray-700">
                            <p class="text-sm font-medium text-gray-800 dark:text-white">{{ Auth::user()->name ?? 'Admin' }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Administrator</p>
                        </div>

                        <a class="flex items-center gap-2 px-3 py-2 text-sm text-gray-800 rounded-lg hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                           href="#">
                            <i data-lucide="user" class="w-4 h-4"></i>
                            Profil Saya
                        </a>

                        <a class="flex items-center gap-2 px-3 py-2 text-sm text-gray-800 rounded-lg hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                           href="#">
                            <i data-lucide="settings" class="w-4 h-4"></i>
                            Pengaturan
                        </a>

                        <div class="border-t border-gray-200 dark:border-gray-700 my-2"></div>

                        <!-- Logout Button -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="flex items-center gap-2 w-full px-3 py-2 text-sm text-red-600 rounded-lg hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/20">
                                <i data-lucide="log-out" class="w-4 h-4"></i>
                                Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="p-4 lg:p-6">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script>
        // Alpine.js Admin Application
        function adminApp() {
            return {
                // Theme Management
                darkMode: localStorage.getItem('darkMode') === 'true',

                // Alert System
                alerts: [],
                alertId: 0,

                init() {
                    // Initialize Lucide Icons
                    if (typeof lucide !== 'undefined') {
                        lucide.createIcons();
                    }

                    // Initialize Preline UI components
                    if (typeof HSStaticMethods !== 'undefined') {
                        HSStaticMethods.autoInit();
                    }

                    // Apply initial theme
                    this.applyTheme();

                    // Check for session messages and show alerts
                    this.checkSessionMessages();

                    // GSAP animations for page transitions
                    if (typeof gsap !== 'undefined') {
                        gsap.from('main > *', {
                            duration: 0.6,
                            y: 20,
                            opacity: 0,
                            stagger: 0.1,
                            ease: "power2.out"
                        });
                    }
                },

                // Theme Methods
                toggleTheme() {
                    this.darkMode = !this.darkMode;
                    localStorage.setItem('darkMode', this.darkMode);
                    this.applyTheme();
                },

                applyTheme() {
                    if (this.darkMode) {
                        document.documentElement.classList.add('dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                    }
                },

                // Alert Methods
                showAlert(type, title, message, duration = 5000) {
                    const alertTypes = {
                        success: { icon: 'check-circle', color: 'green' },
                        error: { icon: 'alert-circle', color: 'red' },
                        warning: { icon: 'alert-triangle', color: 'yellow' },
                        info: { icon: 'info', color: 'blue' }
                    };

                    const alertConfig = alertTypes[type] || alertTypes.info;

                    const alert = {
                        id: this.alertId++,
                        type,
                        icon: alertConfig.icon,
                        title,
                        message,
                        visible: true,
                        duration
                    };

                    this.alerts.push(alert);

                    // Auto remove after duration
                    if (duration > 0) {
                        setTimeout(() => {
                            this.removeAlert(alert.id);
                        }, duration);
                    }

                    // Reinitialize icons for new alert
                    if (typeof lucide !== 'undefined') {
                        setTimeout(() => lucide.createIcons(), 100);
                    }
                },

                removeAlert(alertId) {
                    const alertIndex = this.alerts.findIndex(alert => alert.id === alertId);
                    if (alertIndex !== -1) {
                        this.alerts.splice(alertIndex, 1);
                    }
                },

                // Check for Laravel session messages
                checkSessionMessages() {
                    // Check for success message
                    @if(session('success'))
                        this.showAlert('success', 'Berhasil!', '{{ session('success') }}');
                    @endif

                    // Check for error message
                    @if(session('error'))
                        this.showAlert('error', 'Error!', '{{ session('error') }}');
                    @endif

                    // Check for warning message
                    @if(session('warning'))
                        this.showAlert('warning', 'Peringatan!', '{{ session('warning') }}');
                    @endif

                    // Check for info message
                    @if(session('info'))
                        this.showAlert('info', 'Informasi', '{{ session('info') }}');
                    @endif

                    // Show login success message if just logged in
                    @if(session('login_success'))
                        this.showAlert('success', 'Selamat Datang!', 'Anda berhasil login sebagai administrator.');
                    @endif
                },

                // Sidebar toggle for mobile
                toggleSidebar() {
                    const sidebar = document.querySelector('[x-data] aside');
                    if (sidebar) {
                        sidebar.classList.toggle('hidden');
                    }
                }
            };
        }

        // Global function to show alerts from anywhere
        function showAlert(type, title, message, duration = 5000) {
            const alpineComponent = document.querySelector('[x-data]').__x.$data;
            if (alpineComponent && alpineComponent.showAlert) {
                alpineComponent.showAlert(type, title, message, duration);
            }
        }

        // Initialize on load
        document.addEventListener('DOMContentLoaded', function() {
            // Alpine will auto-initialize due to x-data
        });
    </script>

    @stack('scripts')
</body>
</html>
