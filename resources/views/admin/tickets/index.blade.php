{{-- resources/views/admin/tickets/index.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Tiket - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <div class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-800">Manajemen Tiket</h1>
        <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline">← Kembali ke Dashboard</a>
    </div>

    <div class="max-w-7xl mx-auto py-6 px-4">
        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-white p-4 rounded shadow">
                <p class="text-sm text-gray-600">Total Tickets</p>
                <p class="text-2xl font-semibold">{{ $stats['total'] }}</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <p class="text-sm text-gray-600">Pending</p>
                <p class="text-2xl font-semibold">{{ $stats['pending'] }}</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <p class="text-sm text-gray-600">Active</p>
                <p class="text-2xl font-semibold">{{ $stats['active'] }}</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <p class="text-sm text-gray-600">Used</p>
                <p class="text-2xl font-semibold">{{ $stats['used'] }}</p>
            </div>
        </div>

        <!-- Tickets Table -->
        <div class="bg-white shadow rounded-lg overflow-hidden">
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
