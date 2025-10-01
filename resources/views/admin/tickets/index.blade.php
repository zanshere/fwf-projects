{{-- resources/views/admin/tickets/index.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Tiket - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-green-100 to-green-200 min-h-screen">

    <!-- Header -->
    <div class="bg-white shadow p-4 flex justify-between items-center rounded-b-2xl">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
            <span>Manajemen Tiket</span>
        </h1>
        <a href="{{ route('admin.dashboard') }}" class="text-green-600 hover:underline font-medium">← Kembali ke Dashboard</a>
    </div>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <!-- Total Ticket -->
            <div class="bg-white p-6 rounded-2xl shadow flex items-center space-x-4">
                <div class="bg-green-100 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M3 6a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V6zM9 6h12a1 1 0 011 1v3h-2a1 1 0 100 2h2v3h-2a1 1 0 100 2h2v3a1 1 0 01-1 1H9V6z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total Tiket</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['total'] }}</p>
                </div>
            </div>

            <!-- Pending -->
            <div class="bg-white p-6 rounded-2xl shadow flex items-center space-x-4">
                <div class="bg-yellow-100 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M12 8v4l3 3m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Pending</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['pending'] }}</p>
                </div>
            </div>

            <!-- Active -->
            <div class="bg-white p-6 rounded-2xl shadow flex items-center space-x-4">
                <div class="bg-blue-100 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M9 17v-6h13v6M9 5v6h13V5M5 5h.01M5 11h.01M5 17h.01"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Aktif</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['active'] }}</p>
                </div>
            </div>

            <!-- Used -->
            <div class="bg-white p-6 rounded-2xl shadow flex items-center space-x-4">
                <div class="bg-gray-100 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M9 12h6m-6 4h6M5 8h14M5 16h14M5 12h14M5 20h14"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Terpakai</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['used'] }}</p>
                </div>
            </div>
        </div>

        <!-- Tickets Table -->
        <div class="bg-white shadow rounded-2xl overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-800">Daftar Tiket</h2>
            </div>

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Customer</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Qty</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($tickets as $ticket)
                        <tr>
                            <td class="px-6 py-4">
                                <div class="text-sm font-semibold text-gray-900">
                                    {{ $ticket->user ? $ticket->user->name : 'Guest' }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ $ticket->user ? $ticket->user->email : '-' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $ticket->ticket_type }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $ticket->quantity }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">Rp {{ number_format($ticket->total_price, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs rounded-full
                                    {{ $ticket->status === 'proses' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ $ticket->status === 'aktif' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $ticket->status === 'terpakai' ? 'bg-gray-100 text-gray-800' : '' }}
                                    {{ $ticket->status === 'ditolak' ? 'bg-red-100 text-red-800' : '' }}">
                                    {{ ucfirst($ticket->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                {{ $ticket->created_at->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-sm font-medium">
                                @if($ticket->status === 'proses')
                                    <form action="{{ route('admin.tickets.confirm', $ticket->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="text-green-600 hover:text-green-900">Confirm</button>
                                    </form>
                                    <form action="{{ route('admin.tickets.reject', $ticket->id) }}" method="POST" class="inline ml-2">
                                        @csrf
                                        <button type="submit" class="text-red-600 hover:text-red-900">Reject</button>
                                    </form>
                                @else
                                    <span class="text-gray-400">No actions</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                Tidak ada tiket ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $tickets->links() }}
            </div>
        </div>
    </div>

</body>
</html>
