<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('back-end.dashboard');
});

use App\Http\Controllers\ItemController;

Route::resource('items', ItemController::class);

use App\Http\Controllers\MaintenanceScheduleController;

Route::resource('maintenance', MaintenanceScheduleController::class);

use App\Http\Controllers\RepairWebController;

Route::resource('repairs', RepairWebController::class);

use App\Http\Controllers\NotifikasiController;


Route::get('/notifikasi', [NotifikasiController::class, 'index'])
    ->name('notifikasi.index');

Route::post('/notifikasi/{id}/read', [NotifikasiController::class, 'markAsRead'])
    ->name('notifikasi.read');

Route::delete('/notifikasi/{id}', [NotifikasiController::class, 'destroy'])
    ->name('notifikasi.destroy');

use App\Http\Controllers\TempatServiceController;

Route::resource('tempat-services', TempatServiceController::class);
