<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MenuController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Halaman Home
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| Halaman User
|--------------------------------------------------------------------------
*/

Route::get('/menu', [MenuController::class, 'index'])
    ->name('menu');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class,'index'])
        ->name('dashboard');

    Route::resource('/menu', MenuController::class)
        ->names('admin.menu');

});

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';