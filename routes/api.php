<?php

use App\Http\Controllers\Api\AuthMobileController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::post('/register', [AuthMobileController::class, 'register']);
Route::post('/login', [AuthMobileController::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthMobileController::class, 'logout']);
    Route::get('/user', [AuthMobileController::class, 'user']);

    // Routes untuk perawat
    // Route::middleware('perawat')->group(function () {
    //     Route::get('/perawat/dashboard', [UserController::class, 'perawatDashboard']);
    // });

    // Routes untuk keluarga
    // Route::middleware('keluarga')->group(function () {
    //     Route::get('/keluarga/dashboard', [UserController::class, 'keluargaDashboard']);
    // });
});
