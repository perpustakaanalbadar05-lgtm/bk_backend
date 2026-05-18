<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CounselingSessionController;
use App\Http\Controllers\KasusController;
use App\Http\Controllers\ScheduleController;
use App\Http\Middleware\ApiAuth;

Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware([ApiAuth::class])->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    Route::get('/students', [StudentController::class, 'index']);
    Route::post('/students', [StudentController::class, 'store']);
    Route::get('/sessions', [CounselingSessionController::class, 'index']);
    Route::post('/sessions', [CounselingSessionController::class, 'store']);
    Route::get('/kasus', [KasusController::class, 'index']);
    Route::post('/kasus', [KasusController::class, 'store']);
    Route::get('/schedules', [ScheduleController::class, 'index']);
    Route::post('/schedules', [ScheduleController::class, 'store']);
});

// Example of API resource
// Route::apiResource('items', ItemController::class);
