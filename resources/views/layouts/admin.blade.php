<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Fajar World</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .nav-item {
            transition: all 0.3s ease;
        }
        .nav-item:hover {
            transform: translateX(5px);
        }
        .active-nav {
            background: linear-gradient(90deg, #059669 0%, #10b981 100%);
            color: white;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navbar Admin -->
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                    <!-- Mobile menu button -->
                    <button data-hs-overlay="#sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>

                    <!-- Logo -->
                    <a href="{{ route('admin.dashboard') }}" class="flex ml-2 md:mr-24">
                        <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-green-600">
                            <i data-lucide="shield" class="w-8 h-8 inline mr-2"></i>
                            Fajar World Admin
                        </span>
                    </a>
                </div>

                <!-- User menu -->
                <div class="flex items-center">
                    <div class="flex items-center ml-3">
                        <div>
                            <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300" id="user-menu-button">
                                <span class="sr-only">Open user menu</span>
                                <div class="w-8 h-8 rounded-full bg-green-500 flex items-center justify-center text-white font-semibold">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                            </button>
                        </div>

                        <!-- Dropdown menu -->
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow" id="user-dropdown">
                            <div class="px-4 py-3">
                                <span class="block text-sm text-gray-900">{{ Auth::user()->name }}</span>
                                <span class="block text-sm text-gray-500 truncate">{{ Auth::user()->email }}</span>
                            </div>
                            <ul class="py-1">
                                <li>
                                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i data-lucide="layout-dashboard" class="w-4 h-4 inline mr-2"></i>
                                        User Dashboard
                                    </a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            <i data-lucide="log-out" class="w-4 h-4 inline mr-2"></i>
                                            Sign out
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
            <ul class="space-y-2 font-medium mt-5">
                <!-- Dashboard -->
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="nav-item flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->routeIs('admin.dashboard') ? 'active-nav' : '' }}">
                        <i data-lucide="layout-dashboard" class="w-5 h-5 text-gray-500 group-hover:text-green-600"></i>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>

                <!-- Users -->
                <li>
                    <a href="{{ route('admin.users.index') }}" class="nav-item flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->routeIs('admin.users.*') ? 'active-nav' : '' }}">
                        <i data-lucide="users" class="w-5 h-5 text-gray-500 group-hover:text-green-600"></i>
                        <span class="ms-3">Users</span>
                    </a>
                </li>

                <!-- Tickets -->
                <li>
                    <a href="{{ route('admin.tickets.index') }}" class="nav-item flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->routeIs('admin.tickets.*') ? 'active-nav' : '' }}">
                        <i data-lucide="ticket" class="w-5 h-5 text-gray-500 group-hover:text-green-600"></i>
                        <span class="ms-3">Tickets</span>
                    </a>
                </li>

                <!-- Rewards -->
                <li>
                    <a href="{{ route('admin.rewards.redemptions') }}" class="nav-item flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->routeIs('admin.rewards.*') ? 'active-nav' : '' }}">
                        <i data-lucide="gift" class="w-5 h-5 text-gray-500 group-hover:text-green-600"></i>
                        <span class="ms-3">Rewards</span>
                    </a>
                </li>

                <!-- QR Scanner -->
                <li>
                    <button type="button" data-hs-overlay="#qr-scanner-modal" class="nav-item w-full flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <i data-lucide="qr-code" class="w-5 h-5 text-gray-500 group-hover:text-green-600"></i>
                        <span class="ms-3">QR Scanner</span>
                    </button>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="p-4 md:ml-64 mt-14">
        @yield('content')
    </div>

    <!-- QR Scanner Modal -->
    <div id="qr-scanner-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div class="flex flex-col bg-white border shadow-sm rounded-xl">
                <div class="flex justify-between items-center py-3 px-4 border-b">
                    <h3 class="font-bold text-gray-800">
                        <i data-lucide="qr-code" class="w-5 h-5 inline mr-2"></i>
                        QR Code Scanner
                    </h3>
                    <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100" data-hs-overlay="#qr-scanner-modal">
                        <span class="sr-only">Close</span>
                        <i data-lucide="x" class="w-4 h-4"></i>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <div id="qr-reader" class="w-full"></div>
                    <div id="qr-result" class="mt-4 hidden">
                        <h4 class="font-semibold mb-2">Scan Result:</h4>
                        <div class="bg-gray-100 p-3 rounded-lg">
                            <p id="result-text"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
        <!-- GSAP Animations Script -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
    <!-- ScrollSmoother requires ScrollTrigger -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollSmoother.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/TextPlugin.min.js"></script>
    <script>
    <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>

    <script>
        // Initialize Lucide Icons
        lucide.createIcons();

        // Initialize user dropdown
        document.getElementById('user-menu-button').addEventListener('click', function() {
            document.getElementById('user-dropdown').classList.toggle('hidden');
        });

        // GSAP Animations
        gsap.from(".nav-item", {
            duration: 0.6,
            x: -50,
            opacity: 0,
            stagger: 0.1,
            ease: "power2.out"
        });

        // QR Code Scanner
        function onScanSuccess(decodedText, decodedResult) {
            // Handle the scanned code
            document.getElementById('result-text').textContent = decodedText;
            document.getElementById('qr-result').classList.remove('hidden');

            // You can add AJAX call here to validate the ticket
            console.log(`Scan result: ${decodedText}`, decodedResult);
        }

        function onScanFailure(error) {
            console.warn(`QR scan error: ${error}`);
        }

        // Initialize QR Scanner when modal opens
        document.addEventListener('DOMContentLoaded', function() {
            const qrScannerModal = document.getElementById('qr-scanner-modal');
            let html5QrcodeScanner;

            qrScannerModal.addEventListener('open.hs.overlay', function() {
                html5QrcodeScanner = new Html5QrcodeScanner(
                    "qr-reader",
                    { fps: 10, qrbox: { width: 250, height: 250 } },
                    false
                );
                html5QrcodeScanner.render(onScanSuccess, onScanFailure);
            });

            qrScannerModal.addEventListener('close.hs.overlay', function() {
                if (html5QrcodeScanner) {
                    html5QrcodeScanner.clear().catch(error => {
                        console.error("Failed to clear QR scanner", error);
                    });
                }
                document.getElementById('qr-result').classList.add('hidden');
            });
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const userMenu = document.getElementById('user-menu-button');
            const dropdown = document.getElementById('user-dropdown');

            if (!userMenu.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
