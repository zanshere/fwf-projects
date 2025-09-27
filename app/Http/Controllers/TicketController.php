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
            // For authenticated users, use their info
            $validated = $request->validate($validationRules);
            $validated['nama'] = Auth::user()->name;
            $validated['email'] = Auth::user()->email;
        } else {
            // For guests, require name and email
            $guestRules = array_merge($validationRules, [
                'nama' => 'required|string|max:255',
                'email' => 'required|email'
            ]);
            $validated = $request->validate($guestRules);
        }

        // Validate quantity >= adult_count + child_count
        if ($validated['quantity'] < ($validated['adult_count'] + $validated['child_count'])) {
            return redirect()->back()
                ->with('error', 'Jumlah tiket harus lebih besar atau sama dengan jumlah dewasa + anak.')
                ->withInput();
        }

        try {
            DB::beginTransaction();

            // Calculate total price
            $priceMap = [
                'Reguler' => 1500000,
                'Premium' => 2000000,
                'Khusus' => 0
            ];

            $ticketType = $validated['ticket_type'];
            $quantity = $validated['quantity'];
            $totalPrice = $priceMap[$ticketType] * $quantity;

            // Calculate points (only for authenticated users)
            $pointsEarned = $isAuthenticated ? Ticket::calculatePoints($ticketType, $quantity) : 0;

            // Handle file upload
            $detailFilePath = null;
            if ($request->hasFile('detail_file')) {
                $detailFilePath = $request->file('detail_file')->store('public/tickets');
                $detailFilePath = str_replace('public/', 'storage/', $detailFilePath);
            }

            // Create ticket
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
                $successMessage .= ' Anda akan mendapatkan ' . $pointsEarned . ' poin setelah tiket aktif.';
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
        // Check ownership
        if (!$ticket->isOwnedByUser(Auth::user())) {
            abort(403, 'Unauthorized access to this ticket.');
        }

        // Generate QR code
        $qrCode = QrCode::size(200)->generate($ticket->getQrCodeContent());

        return response()->json([
            'ticket' => $ticket,
            'qr_code' => $qrCode
        ]);
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
                // For guests, show empty or implement session-based ticket tracking
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

            // Add points to user if authenticated at purchase
            if ($ticket->user_id && $ticket->points_earned > 0) {
                $ticket->user->addPoints($ticket->points_earned, [
                    'type' => 'ticket_confirmed',
                    'description' => 'Tiket ' . $ticket->ticket_type . ' dikonfirmasi - ' . $ticket->points_earned . ' poin'
                ]);
            }

            return response()->json(['success' => true, 'message' => 'Tiket berhasil dikonfirmasi']);
        }

        return response()->json(['success' => false, 'message' => 'Status tiket tidak valid'], 400);
    }
}
