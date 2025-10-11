<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TicketController extends Controller
{
    public function showVerifyPage()
    {
        return view('admin.tickets.verify');
    }

    public function verifyByToken(Request $request)
    {
        $request->validate(['token' => 'required|string']);

        $ticket = Ticket::where('barcode', $request->token)->first();

        if (!$ticket) {
            return back()->with('error', 'Token tidak ditemukan.');
        }

        if ($ticket->status === 'terpakai') {
            return back()->with('error', 'Tiket sudah digunakan.');
        }

        $ticket->update(['status' => 'terpakai']);

        return back()->with('success', 'Tiket berhasil dikonfirmasi via Token.');
    }

    public function verifyByQr(Request $request)
    {
        $request->validate(['ticket_id' => 'required|integer']);

        $ticket = Ticket::find($request->ticket_id);

        if (!$ticket) {
            return response()->json(['status' => 'error', 'message' => 'Tiket tidak ditemukan.']);
        }

        if ($ticket->status === 'terpakai') {
            return response()->json(['status' => 'error', 'message' => 'Tiket sudah digunakan.']);
        }

        $ticket->update(['status' => 'terpakai']);

        return response()->json(['status' => 'success', 'message' => 'Tiket berhasil dikonfirmasi via QR.']);
    }

    public function index()
    {
        return view('pages.tiket');
    }

    public function create()
    {
        return view('pages.tiket');
    }

    public function store(Request $request)
    {
        $isAuthenticated = Auth::check();

        $validationRules = [
            'ticket_type' => 'required|in:Reguler,Premium,Khusus',
            'quantity' => 'required|integer|min:1|max:10',
            'adult_count' => 'required|integer|min:0',
            'child_count' => 'required|integer|min:0',
            'purchase_date' => 'required|date|after_or_equal:today',
            'detail_file' => 'nullable|file|max:2048|mimes:jpg,jpeg,png,pdf'
        ];

        if ($isAuthenticated) {
            $validated = $request->validate($validationRules);
            $validated['nama'] = Auth::user()->name;
            $validated['email'] = Auth::user()->email;
        } else {
            $guestRules = array_merge($validationRules, [
                'nama' => 'required|string|max:255',
                'email' => 'required|email'
            ]);
            $validated = $request->validate($guestRules);
        }

        if ($validated['quantity'] < ($validated['adult_count'] + $validated['child_count'])) {
            return redirect()->back()
                ->with('error', 'Jumlah tiket harus lebih besar atau sama dengan jumlah dewasa + anak.')
                ->withInput();
        }

        try {
            DB::beginTransaction();

            $priceMap = [
                'Reguler' => 1500000,
                'Premium' => 2000000,
                'Khusus' => 0
            ];

            $ticketType = $validated['ticket_type'];
            $quantity = $validated['quantity'];
            $totalPrice = $priceMap[$ticketType] * $quantity;

            // ✅ Calculate points - akan diberikan saat tiket dikonfirmasi
            $pointsEarned = $isAuthenticated ? Ticket::calculatePoints($ticketType, $quantity) : 0;

            $detailFilePath = null;
            if ($request->hasFile('detail_file')) {
                $detailFilePath = $request->file('detail_file')->store('public/tickets');
                $detailFilePath = str_replace('public/', 'storage/', $detailFilePath);
            }

            $ticketData = [
                'ticket_type' => $ticketType,
                'quantity' => $quantity,
                'adult_count' => $validated['adult_count'],
                'child_count' => $validated['child_count'],
                'purchase_date' => $validated['purchase_date'],
                'status' => 'proses',
                'points_earned' => $pointsEarned,
                'barcode' => 'FW' . Str::random(10) . time(),
                'total_price' => $totalPrice,
                'detail_file' => $detailFilePath
            ];

            if ($isAuthenticated) {
                $ticketData['user_id'] = Auth::id();
            } else {
                $ticketData['guest_name'] = $validated['nama'];
                $ticketData['guest_email'] = $validated['email'];
            }

            $ticket = Ticket::create($ticketData);

            DB::commit();

            $successMessage = 'Tiket berhasil dipesan! Status: Menunggu Konfirmasi.';
            if ($isAuthenticated && $pointsEarned > 0) {
                $successMessage .= ' Anda akan mendapatkan ' . $pointsEarned . ' poin setelah tiket dikonfirmasi.';
            } elseif (!$isAuthenticated) {
                $successMessage .= ' Catatan: Pemesanan sebagai tamu tidak mendapatkan poin reward.';
            }

            return redirect()->route('tickets.my-tickets')
                ->with('success', $successMessage);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function show(Ticket $ticket)
    {
        if (!$ticket->isOwnedByUser(Auth::user())) {
            abort(403, 'Unauthorized access to this ticket.');
        }

        return response()->json([
            'ticket' => [
                'id' => $ticket->id,
                'ticket_type' => $ticket->ticket_type,
                'quantity' => $ticket->quantity,
                'adult_count' => $ticket->adult_count,
                'child_count' => $ticket->child_count,
                'purchase_date' => $ticket->purchase_date->format('Y-m-d'),
                'points_earned' => $ticket->points_earned,
                'total_price' => $ticket->total_price,
                'barcode' => $ticket->barcode,
                'status' => $ticket->status
            ]
        ]);
    }

    public function showUser($id)
    {
        $ticket = Ticket::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('user.tickets.show', compact('ticket'));
    }

    public function myTickets()
    {
        try {
            if (Auth::check()) {
                $tickets = Auth::user()->tickets()
                    ->orderBy('created_at', 'desc')
                    ->orderBy('purchase_date', 'desc')
                    ->get();
            } else {
                $tickets = collect();
            }

            return view('pages.my-ticket', compact('tickets'));
        } catch (\Exception $e) {
            $tickets = collect();
            return view('pages.my-ticket', compact('tickets'))
                ->with('error', 'Terjadi masalah saat memuat data tiket.');
        }
    }

    public function scan($barcode)
    {
        try {
            $ticket = Ticket::where('barcode', $barcode)->firstOrFail();

            if ($ticket->status !== 'aktif') {
                return response()->json([
                    'success' => false,
                    'message' => 'Tiket tidak dapat digunakan. Status: ' . $ticket->status
                ], 400);
            }

            $ticket->update(['status' => 'terpakai']);

            return response()->json([
                'success' => true,
                'message' => 'Tiket berhasil divalidasi!',
                'ticket' => $ticket
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Tiket tidak ditemukan atau terjadi kesalahan.'
            ], 500);
        }
    }

    public function confirm(Ticket $ticket)
    {
        if ($ticket->status === 'proses') {
            $ticket->update(['status' => 'aktif']);

            // ✅ Tambahkan poin menggunakan method addPoints (otomatis masuk ke daily_points)
            if ($ticket->user_id && $ticket->points_earned > 0) {
                $ticket->user->addPoints($ticket->points_earned, [
                    'type' => 'ticket_confirmed',
                    'description' => "Pembelian tiket {$ticket->ticket_type} dikonfirmasi - earned {$ticket->points_earned} points"
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Tiket berhasil dikonfirmasi dan poin telah ditambahkan'
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Status tiket tidak valid'], 400);
    }
}
