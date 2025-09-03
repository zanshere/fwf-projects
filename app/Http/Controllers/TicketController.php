<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    // tampilkan daftar ticket
    public function index()
    {
        $tickets = Ticket::latest()->get();
        return view('pages.tiket', compact('tickets'));
    }

    // simpan ticket baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:open,in_progress,closed',
        ]);

        Ticket::create($request->all());

        return redirect()->route('tickets.index')->with('success', 'Ticket berhasil dibuat!');
    }
}
