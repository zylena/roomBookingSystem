<?php

use Illuminate\Support\Facades\Route;

use App\Models\Room;

use App\Http\Controllers\Auth\ForgotPasswordController;

use App\Http\Controllers\Auth\ResetPasswordController;


Route::get('/test', function () {
    return Room::with('theme')->get();

});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is intentionally kept minimal. Most application routes are
| organized into side-specific route files (public, user, admin).
|
*/

// Keep this file available for quickly adding global routes if needed.
// All primary routes are defined in routes/public.php, routes/user.php, and routes/admin.php.

// Password Reset Routes (add these)
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/simple-login', function () {
    Auth::attempt(['email' => 'alice@example.com', 'password' => 'password123']);
    return redirect('/user/profile');
});
