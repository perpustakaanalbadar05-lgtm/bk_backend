<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CounselingSessionController;
use App\Http\Controllers\KasusController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AssessmentTemplateController;
use App\Http\Controllers\AssessmentResultController;
use App\Http\Controllers\SavedReportController;
use App\Http\Controllers\PortalAccountController;

// ── Public routes ──────────────────────────────────────────────────────────
Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/public/assessment-templates/{userId}/{type}', [AssessmentTemplateController::class, 'getPublicTemplate']);
Route::get('/public/assessment-results/{userId}/{type}', [AssessmentResultController::class, 'publicShow']);
Route::post('/public/assessment-results/{userId}/{type}', [AssessmentResultController::class, 'publicSubmit']);

// Portal login (public — no auth needed)
Route::post('/portal/login', [PortalAccountController::class, 'login']);

// ── Protected routes ────────────────────────────────────────────────────────
Route::middleware(['auth:sanctum'])->group(function () {

    // Auth & Profile
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    Route::put('/user', [AuthController::class, 'updateProfile']);
    Route::post('/auth/change-password', [AuthController::class, 'changePassword']);

    // Notifications
    Route::get('/notifications', [\App\Http\Controllers\NotificationController::class, 'index']);

    // Assessment Templates (instrument builder)
    Route::get('/assessment-templates/{type}', [AssessmentTemplateController::class, 'getTemplate']);
    Route::post('/assessment-templates/{type}', [AssessmentTemplateController::class, 'saveTemplate']);

    // Assessment Results (stored in DB, replaces localStorage)
    Route::get('/assessment-results', [AssessmentResultController::class, 'index']);
    Route::get('/assessment-results/{type}', [AssessmentResultController::class, 'show']);
    Route::post('/assessment-results/{type}', [AssessmentResultController::class, 'save']);

    // Saved Reports (real archive, replaces hardcoded data)
    Route::get('/saved-reports', [SavedReportController::class, 'index']);
    Route::post('/saved-reports', [SavedReportController::class, 'store']);
    Route::delete('/saved-reports/{savedReport}', [SavedReportController::class, 'destroy']);

    // Portal Account Management
    Route::get('/portal-accounts', [PortalAccountController::class, 'index']);
    Route::post('/portal-accounts', [PortalAccountController::class, 'store']);
    Route::put('/portal-accounts/{portalAccount}', [PortalAccountController::class, 'update']);
    Route::delete('/portal-accounts/{portalAccount}', [PortalAccountController::class, 'destroy']);

    // Core CRUD resources (scoped by user_id via Tenantable trait)
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
