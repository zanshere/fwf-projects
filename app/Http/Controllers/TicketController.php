<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        return view('pages.tiket');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'kategori' => 'required|in:dewasa,anak,rombongan',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required|date|after_or_equal:today',
        ]);

        Order::create($validated);

        return redirect()->route('tickets.index')
            ->with('success', 'Pemesanan tiket berhasil! Kami akan mengirim detail ke email Anda.');
    }
}
