<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CounselingSessionController;
use App\Http\Controllers\KasusController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;


// Public routes
Route::post('/auth/login', [AuthController::class, 'login']);

// Protected routes
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    Route::put('/user', [AuthController::class, 'updateProfile']);
    Route::post('/auth/change-password', [AuthController::class, 'changePassword']);
    Route::get('/notifications', [\App\Http\Controllers\NotificationController::class, 'index']);

    // Full CRUD resources
    Route::post('students/bulk', [StudentController::class, 'bulkStore']);
    Route::apiResource('students', StudentController::class);
    Route::apiResource('sessions', CounselingSessionController::class);
    Route::apiResource('kasus', KasusController::class)->parameters(['kasus' => 'kasus']);
    Route::apiResource('schedules', ScheduleController::class);

    // Super Admin Routes
    Route::prefix('super-admin')->group(function () {
        Route::get('dashboard', [\App\Http\Controllers\SuperAdminController::class, 'dashboardStats']);
        Route::get('guru-bk', [\App\Http\Controllers\SuperAdminController::class, 'getGuruBk']);
        Route::post('guru-bk', [\App\Http\Controllers\SuperAdminController::class, 'storeGuruBk']);
        Route::put('guru-bk/{id}', [\App\Http\Controllers\SuperAdminController::class, 'updateGuruBk']);
        Route::delete('guru-bk/{id}', [\App\Http\Controllers\SuperAdminController::class, 'deleteGuruBk']);
    });
});
