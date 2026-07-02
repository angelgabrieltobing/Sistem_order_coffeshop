<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\MenuController as CustomerMenuController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\CheckoutController;
use App\Http\Controllers\Customer\HistoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\MejaController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Menu Customer
Route::get('/menu', [CustomerMenuController::class, 'index'])->name('menu');
Route::get('/menu', [CustomerMenuController::class, 'index'])->name('customer.menu');
Route::get('/menu/{id}', [CustomerMenuController::class, 'show'])->name('customer.menu.show');

// Tentang
Route::view('/tentang', 'tentang')->name('tentang');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| Customer Area (Harus Login)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'customer'])->group(function () {

    // Cart
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/add/{menu}', [CartController::class, 'add'])->name('add');
        Route::post('/update/{menu}', [CartController::class, 'update'])->name('update');
        Route::delete('/remove/{menu}', [CartController::class, 'remove'])->name('remove');
        Route::delete('/clear', [CartController::class, 'clear'])->name('clear');
    });

    // Checkout
    Route::prefix('checkout')->name('checkout.')->group(function () {
        Route::get('/', [CheckoutController::class, 'index'])->name('index');
        Route::post('/', [CheckoutController::class, 'store'])->name('store');
    });

    // Riwayat Pesanan Customer
    Route::prefix('pesanan')->name('customer.pesanan.')->group(function () {
        Route::get('/', [HistoryController::class, 'index'])->name('index');
        Route::get('/{pesanan}', [HistoryController::class, 'show'])->name('show');
        Route::get('/{pesanan}/receipt', [HistoryController::class, 'receipt'])->name('receipt');
    });

});

/*
|--------------------------------------------------------------------------
| Admin Area (Harus Login & Admin)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Menu Management
        Route::resource('menu', AdminMenuController::class);
        Route::post('/menu/toggle/{id}', [AdminMenuController::class, 'toggleAvailable'])->name('menu.toggle');

        // Kategori Management
        Route::resource('kategori', KategoriController::class);

        // Meja Management
        Route::resource('meja', MejaController::class);
        Route::post('/meja/toggle/{id}', [MejaController::class, 'toggle'])->name('meja.toggle');

        // Pesanan Management
        Route::resource('pesanan', PesananController::class);
        Route::put('/pesanan/{id}/status', [PesananController::class, 'updateStatus'])->name('pesanan.status');

        // User Management
        Route::resource('users', UserController::class);

        // Laporan
        Route::get('/laporan', [DashboardController::class, 'laporan'])->name('laporan');
        Route::get('/laporan/export', [DashboardController::class, 'exportLaporan'])->name('laporan.export');

    });

/*
|--------------------------------------------------------------------------
| Fallback Route (404 Custom)
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    return view('errors.404');
});