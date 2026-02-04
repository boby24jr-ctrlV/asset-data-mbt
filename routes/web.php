<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Controller Imports
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MaintenanceScheduleController;
use App\Http\Controllers\MaintenanceHistoryController;
use App\Http\Controllers\RepairWebController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\TempatServiceController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Redirect root ke dashboard
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('dashboard');
});

/*
|--------------------------------------------------------------------------
| Protected Routes (HARUS LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Master Data
    |--------------------------------------------------------------------------
    */
    Route::resource('items', ItemController::class);

    /*
    |--------------------------------------------------------------------------
    | Maintenance History (WAJIB DIATAS schedule)
    |--------------------------------------------------------------------------
    */
    Route::prefix('maintenance')->group(function () {
        Route::resource('histories', MaintenanceHistoryController::class)
            ->names('maintenance.histories');
    });

    /*
    |--------------------------------------------------------------------------
    | Maintenance Schedule
    |--------------------------------------------------------------------------
    */
    Route::resource('maintenance', MaintenanceScheduleController::class);

    /*
    |--------------------------------------------------------------------------
    | Repair & Tempat Service
    |--------------------------------------------------------------------------
    */
    Route::resource('repairs', RepairWebController::class);
    Route::resource('tempat_services', TempatServiceController::class);

    /*
    |--------------------------------------------------------------------------
    | Notifications
    |--------------------------------------------------------------------------
    */
    Route::get('/notifikasi', [NotifikasiController::class, 'index'])
        ->name('notifikasi.index');

    Route::post('/notifikasi/{id}/read', [NotifikasiController::class, 'markAsRead'])
        ->name('notifikasi.read');

    Route::delete('/notifikasi/{id}', [NotifikasiController::class, 'destroy'])
        ->name('notifikasi.destroy');

});
