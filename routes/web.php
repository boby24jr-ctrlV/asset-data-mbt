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
use App\Http\Controllers\RepairWebController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\TempatServiceController;

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Master Data
|--------------------------------------------------------------------------
*/
Route::resource('items', ItemController::class);
Route::resource('maintenance', MaintenanceScheduleController::class);
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
