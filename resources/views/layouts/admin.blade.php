<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex">

    {{-- Sidebar --}}
    <aside class="w-64 bg-white shadow-lg min-h-screen fixed">
        <div class="p-6 text-center border-b">
            <h1 class="text-2xl font-bold text-green-600">Admin Panel</h1>
        </div>
        <nav class="p-4 space-y-2">
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center p-3 rounded-lg hover:bg-green-50 transition">
                <i data-lucide="home" class="w-5 h-5 mr-3 text-green-600"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.tickets.index') }}"
               class="flex items-center p-3 rounded-lg hover:bg-green-50 transition">
                <i data-lucide="ticket" class="w-5 h-5 mr-3 text-green-600"></i>
                <span>Tickets</span>
            </a>
            <a href="#"
               class="flex items-center p-3 rounded-lg hover:bg-green-50 transition">
                <i data-lucide="gift" class="w-5 h-5 mr-3 text-green-600"></i>
                <span>Rewards</span>
            </a>
        </nav>
    </aside>

    {{-- Main Content --}}
    <div class="flex-1 ml-64">
        {{-- Top Navbar --}}
        <header class="bg-white shadow px-6 py-4 flex justify-between items-center sticky top-0 z-50">
            <h2 class="text-xl font-semibold">@yield('page-title', 'Dashboard')</h2>
            <div class="flex items-center space-x-4">
                <div class="w-10 h-10 rounded-full bg-green-500 text-white flex items-center justify-center">
                    <i data-lucide="user"></i>
                </div>
            </div>
        </header>

        <main class="p-6">
            @yield('content')
        </main>
    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
</body>
</html>
