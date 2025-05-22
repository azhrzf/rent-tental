<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('routes.static.home');
});

Route::get('/catalogs', [ToolController::class, 'index'])->name('catalogs');

Route::get('/cart', [OrderController::class, 'current'])
    ->middleware(['auth', 'verified'])
    ->name('cart.current');

Route::post('/cart/items', [OrderDetailController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('cart.items.store');

Route::patch('/cart/items/{orderDetail}', [OrderDetailController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('cart.items.update');

Route::delete('/cart/items/{orderDetail}', [OrderDetailController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('cart.items.destroy');

Route::put('/orders/{order}', [OrderController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('orders.update');

Route::get('/orders/history', [OrderController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('orders.history');

// Route::middleware(['auth', 'verified', 'admin'])->group(function () {
//     // Admin-only routes go here
//     Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
//     // More admin routes...
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/images/tools/{filename}', function ($filename) {
    $path = storage_path('app/public/images/tools/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
});

require __DIR__ . '/auth.php';
