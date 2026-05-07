<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUser;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Dashboard redirect
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::middleware(['auth', IsAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Pengajuan Surat routes for admin
    Route::get('/pengajuan', [PengajuanSuratController::class, 'indexAdmin'])->name('pengajuan.index');
    Route::get('/pengajuan/{pengajuanSurat}', [PengajuanSuratController::class, 'showAdmin'])->name('pengajuan.show');
    Route::get('/pengajuan/{pengajuanSurat}/edit', [PengajuanSuratController::class, 'edit'])->name('pengajuan.edit');
    Route::patch('/pengajuan/{pengajuanSurat}', [PengajuanSuratController::class, 'update'])->name('pengajuan.update');
    Route::delete('/pengajuan/{pengajuanSurat}', [PengajuanSuratController::class, 'destroy'])->name('pengajuan.destroy');
});

// User routes
Route::middleware(['auth', IsUser::class])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

    // Pengajuan Surat routes for user
    Route::get('/pengajuan', [PengajuanSuratController::class, 'indexUser'])->name('pengajuan.index');
    Route::get('/pengajuan/create', [PengajuanSuratController::class, 'create'])->name('pengajuan.create');
    Route::post('/pengajuan', [PengajuanSuratController::class, 'store'])->name('pengajuan.store');
    Route::get('/pengajuan/{pengajuanSurat}', [PengajuanSuratController::class, 'show'])->name('pengajuan.show');
    Route::get('/pengajuan/{pengajuanSurat}/download', [PengajuanSuratController::class, 'downloadSurat'])->name('pengajuan.download');
});

require __DIR__ . '/auth.php';
