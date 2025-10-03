<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UserManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public Routes
Route::get('/', function () {
    return view('index');
});

Route::get('/gallery', function () {
    return view('pages.gallery');
})->name('gallery');

// Ticket Routes (accessible to both auth and guest)
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
Route::get('/my-tickets', [TicketController::class, 'myTickets'])->name('tickets.my-tickets');

// QR Code Scanning
Route::post('/tickets/scan/{barcode}', [TicketController::class, 'scan'])->name('tickets.scan');

// Auth Middleware Routes - USER DASHBOARD
Route::middleware(['auth', 'verified'])->group(function () {
    // User Dashboard (hanya untuk user biasa)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/stats', [DashboardController::class, 'stats'])->name('dashboard.stats');

    // Reward Routes
    Route::get('/reward', [RewardController::class, 'index'])->name('reward.index');
    Route::post('/reward/redeem/{reward}', [RewardController::class, 'redeem'])->name('reward.redeem');
    Route::get('/reward/history', [RewardController::class, 'redemptionHistory'])->name('reward.history');

    // Ticket Confirmation (protected)
    Route::post('/tickets/confirm/{ticket}', [TicketController::class, 'confirm'])->name('tickets.confirm');
});

// Admin Routes Group - ADMIN DASHBOARD
Route::prefix('admin')->name('admin.')->group(function () {
    // Middleware untuk admin routes
    Route::middleware(['auth', 'verified', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
        // Dashboard Admin
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // User Management
        Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
        Route::get('/users/{user}', [UserManagementController::class, 'show'])->name('users.show');
        Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserManagementController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserManagementController::class, 'destroy'])->name('users.destroy');
        Route::post('/users/{user}/points', [UserManagementController::class, 'updatePoints'])->name('users.update-points');

        // Ticket Management
        Route::get('/tickets', [AdminController::class, 'tickets'])->name('tickets.index');
        Route::post('/tickets/{ticket}/confirm', [AdminController::class, 'confirmTicket'])->name('tickets.confirm');
        Route::post('/tickets/{ticket}/reject', [AdminController::class, 'rejectTicket'])->name('tickets.reject');
        Route::post('/tickets/special', [AdminController::class, 'createSpecialTicket'])->name('tickets.create-special');

        // Reward Management
      // Reward Management
       Route::get('/rewards/redemptions', [AdminController::class, 'rewardsRedemptions'])->name('admin.rewards.redemptions');
Route::get('/rewards/{reward}', [AdminController::class, 'showReward'])->name('rewards.show');
Route::get('/rewards/{reward}/edit', [AdminController::class, 'editReward'])->name('rewards.edit');
Route::put('/rewards/{reward}', [AdminController::class, 'updateReward'])->name('rewards.update');
Route::delete('/rewards/{reward}', [AdminController::class, 'destroyReward'])->name('rewards.destroy');

// Reward Redemptions
Route::get('/rewards/redemptions', [AdminController::class, 'rewardRedemptions'])->name('rewards.redemptions');
Route::post('/rewards/redemptions/{redemption}/approve', [AdminController::class, 'approveRewardRedemption'])->name('rewards.approve');
Route::post('/rewards/redemptions/{redemption}/reject', [AdminController::class, 'rejectRewardRedemption'])->name('rewards.reject');

// Export Rewards
Route::get('/rewards-export', [AdminController::class, 'exportRewards'])->name('rewards.export');

        // QR Code & Scanning
        Route::post('/tickets/scan', [AdminController::class, 'scanTicket'])->name('tickets.scan');
        Route::get('/tickets/{ticket}/qrcode', [AdminController::class, 'generateQrCode'])->name('tickets.qrcode');
    });
});

// Profile Routes (accessible by all authenticated users)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
