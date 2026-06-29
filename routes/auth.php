<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
|
| Login
| Register
| Logout
|
*/

// ==================================
// Guest
// ==================================
Route::middleware('guest')->group(function () {

    /*
    |--------------------------------
    | Login
    |--------------------------------
    */

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store']);



    /*
    |--------------------------------
    | Register
    |--------------------------------
    */

    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store']);

});


// ==================================
// Authenticated User
// ==================================
Route::middleware('auth')->group(function () {

    /*
    |--------------------------------
    | Logout
    |--------------------------------
    */

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

});