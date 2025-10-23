<?php

use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatalansiaController;
use App\Http\Controllers\DataperawatController;
use App\Http\Controllers\Middleware\LaporanController as MiddlewareLaporanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Authentication Routes
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');
});

// login dan dashboard admin
Route::middleware(['auth'])->group(function () {
Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

// Laporan
Route::get('/laporan/pemasukan', [MiddlewareLaporanController::class, 'pemasukan'])->name('laporan.pemasukan');
Route::get('/laporan/pengeluaran', [MiddlewareLaporanController::class, 'pengeluaran'])->name('laporan.pengeluaran');

// data lansia (admin)
Route::get('/datalansia', [DatalansiaController::class, 'index'])->name('admin.datalansia.index');
Route::get('/datalansia/tambah', [DatalansiaController::class, 'create'])->name('admin.datalansia.create');
Route::post('/datalansia/store', [DatalansiaController::class, 'store'])->name('admin.datalansia.store');
Route::get('/datalansia/edit/{id}', [DatalansiaController::class, 'edit'])->name('admin.datalansia.edit');
Route::post('/datalansia/update/{id}', [DatalansiaController::class, 'update'])->name('admin.datalansia.update');
Route::get('/datalansia/hapus/{id}', [DatalansiaController::class, 'destroy'])->name('admin.datalansia.destroy');
});

// data perawat (admin)
Route::get('/dataperawat', [DataperawatController::class, 'index'])->name('admin.dataperawat.index');
Route::get('/dataperawat/tambah', [DataperawatController::class, 'create'])->name('admin.dataperawat.create');
Route::post('/dataperawat/store', [DataperawatController::class, 'store'])->name('admin.dataperawat.store');
Route::get('/dataperawat/edit/{id}', [DataperawatController::class, 'edit'])->name('admin.dataperawat.edit');
Route::post('/dataperawat/update/{id}', [DataperawatController::class, 'update'])->name('admin.dataperawat.update');
Route::get('/dataperawat/hapus/{id}', [DataperawatController::class, 'destroy'])->name('admin.dataperawat.destroy');



