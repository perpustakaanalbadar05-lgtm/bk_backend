<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CounselingSessionController;
use App\Http\Controllers\KasusController;
use App\Http\Controllers\ScheduleController;
use App\Http\Middleware\ApiAuth;

// Public routes
Route::post('/auth/login', [AuthController::class, 'login']);

// Protected routes
Route::middleware([ApiAuth::class])->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    Route::put('/user', [AuthController::class, 'updateProfile']);
    Route::post('/auth/change-password', [AuthController::class, 'changePassword']);

    // Full CRUD resources
    Route::apiResource('students', StudentController::class);
    Route::apiResource('sessions', CounselingSessionController::class);
    Route::apiResource('kasus', KasusController::class)->parameters(['kasus' => 'kasus']);
    Route::apiResource('schedules', ScheduleController::class);
});
