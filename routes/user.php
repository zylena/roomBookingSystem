<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\BookingController;

// User (customer) area
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

Route::get('/bookings/{id}/payment', [BookingController::class, 'payment'])->name('bookings.payment');
Route::get('/history', [BookingController::class, 'history'])->name('history');

Route::put('/profile', [App\Http\Controllers\User\ProfileController::class, 'update'])->name('profile.update');


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    

    Route::middleware('auth')->group(function () {
        Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
        Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
        Route::get('/bookings/{id}/payment', [BookingController::class, 'payment'])->name('bookings.payment');
        Route::get('/bookings-history', [BookingController::class, 'history'])->name('bookings.history');
    });