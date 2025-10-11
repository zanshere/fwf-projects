<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class AdminTicketController extends Controller
{
    /**
     * Verify ticket by code (accessed via URL dari QR).
     * Route ini harus dilindungi oleh admin middleware (lihat routes).
     */
    public function verify($code)
    {
        // Jika belum login atau bukan admin, middleware AdminMiddleware biasanya sudah
        // mencegah akses. Namun untuk double-safe, kita cek auth juga.
        if (!Auth::check()) {
            abort(403, 'Unauthorized');
        }

        // Jika AdminMiddleware sudah dipasang di route group, admin dipastikan.
        // Cari tiket berdasarkan code
        $ticket = Ticket::where('code', $code)->first();

        if (!$ticket) {
            // Bisa juga return 404 blade, tapi keep simple:
            abort(404, 'Ticket not found');
        }

        if ($ticket->status === 'aktif') {
            // Tandai jadi terpakai
            $ticket->status = 'terpakai';
            $ticket->save();

            // Tampilkan halaman detail tiket (admin)
            return view('admin.tickets.detail', compact('ticket'));
        }

        // Sudah dipakai -> tampil page already-used
        return view('admin.tickets.already-used', compact('ticket'));
    }
}
