<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RewardController;

Route::get('/', function () {
    return view('index');
});

Route::resource('tickets', TicketController::class);

// Dashboard Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/stats', [DashboardController::class, 'stats'])->name('dashboard.stats');

    // Reward Routes
    Route::get('/reward', [RewardController::class, 'index'])->name('reward.index');
    Route::post('/reward/redeem/{reward}', [RewardController::class, 'redeem'])->name('reward.redeem');
    Route::get('/reward/history', [RewardController::class, 'redemptionHistory'])->name('reward.history');

    // Seed rewards (development only - remove in production)
    Route::post('/reward/seed', [RewardController::class, 'seedRewards'])->name('reward.seed');
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
