<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Public API for checking room availability
Route::get('/room-availability', function (Request $request) {
    $checkIn = $request->get('check_in_date');
    $checkOut = $request->get('check_out_date');
    
    if (!$checkIn || !$checkOut) {
        return response()->json(['error' => 'Check-in and check-out dates are required'], 400);
    }
    
    $controller = new \App\Http\Controllers\BookingController();
    $request->merge(['check_in_date' => $checkIn, 'check_out_date' => $checkOut]);
    
    return $controller->checkAvailability($request);
});
