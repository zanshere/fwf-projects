<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RewardController;

Route::get('/', function () {
    return view('index');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/stats', [DashboardController::class, 'stats'])->name('dashboard.stats');

    // Reward Routes
    Route::get('/reward', [RewardController::class, 'index'])->name('reward.index');
    Route::post('/reward/redeem/{reward}', [RewardController::class, 'redeem'])->name('reward.redeem');
    Route::get('/reward/history', [RewardController::class, 'redemptionHistory'])->name('reward.history');
});

// Ticket Routes (accessible to both auth and guest)
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
Route::get('/my-tickets', [TicketController::class, 'myTickets'])->name('tickets.my-tickets');

// QR Code Scanning
Route::post('/tickets/scan/{barcode}', [TicketController::class, 'scan'])->name('tickets.scan');

// Admin confirmation (protected)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/tickets/confirm/{ticket}', [TicketController::class, 'confirm'])->name('tickets.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/gallery', function () {
    return view('pages.gallery');
})->name('gallery');

require __DIR__.'/auth.php';
