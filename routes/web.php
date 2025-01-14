<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;

use App\Http\Controllers\TicketController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PaymentController;

// Public Routes
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');

// Admin Routes (Protected by Middleware)
Route::middleware(['auth', 'role:admin,superadmin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/admin/tickets', TicketController::class);
    Route::resource('/admin/reservations', ReservationController::class);
});

// Superadmin Routes (Exclusive to Superadmin)
Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/admin/manage-users', [AdminController::class, 'manageUsers'])->name('admin.manageUsers');
});

Route::resource('tickets', TicketController::class);
Route::resource('payments', PaymentController::class);

require __DIR__.'/auth.php';
