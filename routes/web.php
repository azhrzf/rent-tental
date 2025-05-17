<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ToolController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('routes.static.home');
});

Route::get('/catalogs', [ToolController::class, 'index']);
Route::get('/catalogs', [ToolController::class, 'search'])->name('tools.search');

Route::get('/cart', function () {
    return view('routes.dashboard.cart');
});

// Route::middleware(['auth', 'verified', 'admin'])->group(function () {
//     // Admin-only routes go here
//     Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
//     // More admin routes...
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
