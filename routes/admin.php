<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReportController;

// Admin area
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
