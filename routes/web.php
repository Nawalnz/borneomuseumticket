<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/team', [TeamController::class, 'index'])->name('team');

Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
Route::post('/tickets', [TicketController::class, 'confirm'])->name('tickets.confirm');
Route::get('/tickets/bulk', [TicketController::class, 'bulk'])->name('tickets.bulk');
Route::get('/tickets/payment', [TicketController::class, 'payment'])->name('tickets.payment');
Route::post('/tickets/payment/complete', [TicketController::class, 'storeAfterPayment'])->name('tickets.payment.complete');


// Admin-specific routes
Route::middleware('auth')->group(function () {
    Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/tickets/admin-store', [TicketController::class, 'adminStore'])->name('tickets.admin-store');
    Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('tickets.edit');
    Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update');
    Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');
});
