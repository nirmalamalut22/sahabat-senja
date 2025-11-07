<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthMobileController;
use App\Http\Controllers\Api\DatalansiaController;
use App\Http\Controllers\Api\KondisiController;

// 🔓 Public routes (tanpa login)
Route::post('/register', [AuthMobileController::class, 'register']);
Route::post('/login', [AuthMobileController::class, 'login']);

// 🔐 Protected routes (perlu token Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthMobileController::class, 'logout']);
    Route::get('/user', [AuthMobileController::class, 'user']);

    // 📄 CRUD Data Lansia (akses oleh perawat/keluarga)
    Route::get('/datalansia', [DatalansiaController::class, 'index']);        // GET semua data
    Route::post('/datalansia', [DatalansiaController::class, 'store']);       // POST tambah data
    Route::get('/datalansia/{id}', [DatalansiaController::class, 'show']);    // GET detail data
    Route::put('/datalansia/{id}', [DatalansiaController::class, 'update']);  // PUT update data
    Route::delete('/datalansia/{id}', [DatalansiaController::class, 'destroy']); // DELETE hapus data

    Route::post('/kondisi', [KondisiController::class, 'store']);
    Route::get('/kondisi/{id_lansia}', [KondisiController::class, 'show']);
});
