<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Controllers
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Customer Controllers
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\MenuController as CustomerMenuController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\CheckoutController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::view('/tentang', 'tentang')
    ->name('tentang');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Customer Area
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','customer'])->group(function () {

    Route::get('/menu', [CustomerMenuController::class, 'index'])
        ->name('menu');

    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/cart/add/{menu}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::post('/cart/update/{menu}', [CartController::class, 'update'])
        ->name('cart.update');

    Route::delete('/cart/remove/{menu}', [CartController::class, 'remove'])
        ->name('cart.remove');

    Route::delete('/cart/clear', [CartController::class, 'clear'])
        ->name('cart.clear');

    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout.index');

    Route::post('/checkout', [CheckoutController::class, 'store'])
        ->name('checkout.store');
});
/*
|--------------------------------------------------------------------------
| Admin Area
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->middleware(['auth','admin'])
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('menu', AdminMenuController::class);

        Route::resource('pesanan', PesananController::class);

        Route::resource('users', UserController::class);

    });