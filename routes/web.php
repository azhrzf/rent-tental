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

Route::get('/catalogs/{tool}', [ToolController::class, 'show'])
    ->name('catalogs.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/cart', [OrderController::class, 'current'])
        ->name('cart.current');

    Route::post('/cart/items', [OrderDetailController::class, 'store'])
        ->name('cart.items.store');

    Route::patch('/cart/items/{orderDetail}', [OrderDetailController::class, 'update'])
        ->name('cart.items.update');

    Route::delete('/cart/items/{orderDetail}', [OrderDetailController::class, 'destroy'])
        ->name('cart.items.destroy');

    Route::patch('/orders/{order}', [OrderController::class, 'update'])
        ->name('orders.update');

    Route::get('/orders', [OrderController::class, 'index'])
        ->name('orders.index');

    Route::get('/orders/{order}', [OrderController::class, 'show'])
        ->name('orders.show');
});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/manage/orders', [OrderController::class, 'adminIndex'])
        ->name('manage.orders.index');

    Route::get('/manage/tools', [ToolController::class, 'adminIndex'])
        ->name('manage.tools.index');

    Route::post('/manage/tools/store', [ToolController::class, 'store'])
        ->name('manage.tools.store');

    Route::patch('/manage/tools/{id}', [ToolController::class, 'update'])
        ->name('manage.tools.update');

    Route::delete('/manage/tools/{id}', [ToolController::class, 'destroy'])
        ->name('manage.tools.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

Route::get('/images/tools/{filename}', function ($filename) {
    $path = storage_path('app/public/images/tools/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
});

require __DIR__ . '/auth.php';
