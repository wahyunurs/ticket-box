<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\TiketController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ADMIN
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    // DASHBOARD
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // CATEGORY MANAGEMENT
    Route::resource('categories', CategoryController::class);

    // EVENT MANAGEMENT
    Route::resource('events', EventController::class);

    // TIKET MANAGEMENT
    Route::resource('tickets', TiketController::class);
});

require __DIR__ . '/auth.php';
