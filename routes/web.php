<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('back-end.dashboard');
});

use App\Http\Controllers\ItemController;

Route::resource('items', ItemController::class);
