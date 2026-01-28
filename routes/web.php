<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// ADMIN CONTROLLERS
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\TiketController;
use App\Http\Controllers\Admin\LokasiController;

// USER CONTROLLERS
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\User\EventUserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HistoriesController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/events/{event}', [EventUserController::class, 'show'])->name('events.show');

Route::prefix('orders')->name('orders.')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::get('/{order}', [OrderController::class, 'show'])->name('show');
    Route::post('/', [OrderController::class, 'store'])->name('store');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    // ADMIN
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        // DASHBOARD
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // CATEGORY MANAGEMENT
        Route::resource('categories', CategoryController::class);

        // LOCATION MANAGEMENT
        Route::resource('locations', LokasiController::class);

        // EVENT MANAGEMENT
        Route::resource('events', EventController::class);

        // TIKET MANAGEMENT
        Route::resource('tickets', TiketController::class);

        // HISTORY MANAGEMENT
        Route::prefix('histories')->name('histories.')->group(function () {
            Route::get('/', [HistoriesController::class, 'index'])->name('index');
            Route::get('/{history}', [HistoriesController::class, 'show'])->name('show');
        });
    });
});

require __DIR__ . '/auth.php';
