<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    ItemController,
    MaintenanceScheduleController,
    MaintenanceHistoryController,
    RepairWebController,
    NotifikasiController,
    TempatServiceController,
    AuthController,
    UserController,
    PemeliharaanController,
    PerbaikanController
};

/*
|--------------------------------------------------------------------------
| PUBLIC / LANDING
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| AUTH ADMIN
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.post');

/*
|--------------------------------------------------------------------------
| AUTH STUDENT
|--------------------------------------------------------------------------
*/
Route::prefix('student')->group(function () {
    Route::get('/login', [AuthController::class, 'showStudentLogin'])
        ->name('student.login');

    Route::post('/login', [AuthController::class, 'studentLogin'])
        ->name('student.login.post');

    Route::get('/register', [AuthController::class, 'showRegisterForm'])
        ->name('student.register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('student.register.post');
});

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN AREA - Gunakan middleware auth (guard web)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('items', ItemController::class);
    Route::resource('maintenance', MaintenanceScheduleController::class);

    Route::prefix('maintenance')->group(function () {
        Route::resource('histories', MaintenanceHistoryController::class)
            ->names('maintenance.histories');
    });

    Route::resource('repairs', RepairWebController::class);
    Route::resource('tempat_services', TempatServiceController::class);

    Route::get('/notifikasi', [NotifikasiController::class, 'index'])
        ->name('notifikasi.index');
});

/*
|--------------------------------------------------------------------------
| STUDENT AREA - Gunakan middleware auth:student
|--------------------------------------------------------------------------
*/
Route::prefix('student')->middleware('auth:student')->group(function () {
    Route::get('/dashboard', function () {
        return view('fe.dashboard');
    })->name('fe.dashboard');

    Route::get('/pemeliharaan', [PemeliharaanController::class, 'index'])
        ->name('pemeliharaan.index');

    Route::post('/pemeliharaan', [PemeliharaanController::class, 'store'])
        ->name('pemeliharaan.store');

    Route::get('/perbaikan', [PerbaikanController::class, 'index'])
        ->name('perbaikan.index');

    Route::post('/perbaikan', [PerbaikanController::class, 'store'])
        ->name('perbaikan.store');
});