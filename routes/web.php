<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\BimbelController;
use App\Http\Controllers\Admin\RuleController;
use App\Http\Controllers\Admin\FuzzySetController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\PreferensiController;

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| User Dashboard (Authenticated User)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/preferensi', [PreferensiController::class, 'create'])->name('preferensi.create');
    Route::post('/preferensi', [PreferensiController::class, 'store'])->name('preferensi.store');
    Route::get('/preferensi/result', [PreferensiController::class, 'result'])->name('preferensi.result');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (Authenticated + Admin Only)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('bimbels', BimbelController::class);
    Route::resource('rules', RuleController::class);
});
