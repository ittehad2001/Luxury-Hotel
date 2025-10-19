<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('booking.index');
});

Route::get('/rooms', [App\Http\Controllers\BookingController::class, 'rooms'])->name('rooms');

Route::prefix('booking')->name('booking.')->group(function () {
    Route::get('/', [App\Http\Controllers\BookingController::class, 'index'])->name('index');
    Route::post('/check-availability', [App\Http\Controllers\BookingController::class, 'checkAvailability'])->name('check-availability');
    Route::post('/', [App\Http\Controllers\BookingController::class, 'store'])->name('store');
    Route::get('/thank-you/{id}', [App\Http\Controllers\BookingController::class, 'thankYou'])->name('thank-you');
    Route::get('/lookup', [App\Http\Controllers\BookingController::class, 'lookup'])->name('lookup');
    Route::post('/lookup', [App\Http\Controllers\BookingController::class, 'findBooking'])->name('find');
    Route::get('/unavailable-dates', [App\Http\Controllers\BookingController::class, 'getUnavailableDates'])->name('unavailable-dates');
});

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Public routes (no authentication required)
    Route::get('/login', [App\Http\Controllers\Auth\AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Auth\AdminAuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [App\Http\Controllers\Auth\AdminAuthController::class, 'logout'])->name('logout');
    
    // Protected admin routes (authentication required)
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/bookings', [App\Http\Controllers\AdminController::class, 'bookings'])->name('bookings');
        Route::get('/bookings/{id}', [App\Http\Controllers\AdminController::class, 'getBooking'])->name('bookings.show');
        Route::post('/bookings/{id}/cancel', [App\Http\Controllers\AdminController::class, 'cancelBooking'])->name('bookings.cancel');
        Route::post('/bookings/{id}/confirm', [App\Http\Controllers\AdminController::class, 'confirmBooking'])->name('bookings.confirm');
        
        // Room Categories Management
        Route::get('/rooms', [App\Http\Controllers\AdminController::class, 'rooms'])->name('rooms');
        Route::post('/rooms', [App\Http\Controllers\AdminController::class, 'storeRoomCategory'])->name('rooms.store');
        Route::get('/rooms/{id}', [App\Http\Controllers\AdminController::class, 'getRoomCategory'])->name('rooms.show');
        Route::put('/rooms/{id}', [App\Http\Controllers\AdminController::class, 'updateRoomCategory'])->name('rooms.update');
        Route::delete('/rooms/{id}', [App\Http\Controllers\AdminController::class, 'deleteRoomCategory'])->name('rooms.delete');
        
        Route::get('/availability', [App\Http\Controllers\AdminController::class, 'availability'])->name('availability');
    });
});
