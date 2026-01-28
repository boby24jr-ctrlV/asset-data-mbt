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



