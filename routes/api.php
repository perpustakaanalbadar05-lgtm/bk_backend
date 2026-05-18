<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\ApiAuth;

Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware([ApiAuth::class])->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    Route::get('/students', [StudentController::class, 'index']);
    Route::post('/students', [StudentController::class, 'store']);
});

// Example of API resource
// Route::apiResource('items', ItemController::class);
