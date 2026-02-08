<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MaintenanceScheduleController;
use App\Http\Controllers\MaintenanceHistoryController;
use App\Http\Controllers\RepairWebController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\TempatServiceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| AUTH ADMIN
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

/*
|--------------------------------------------------------------------------
| AUTH STUDENT
|--------------------------------------------------------------------------
*/
Route::get('/student/login', [AuthController::class, 'showStudentLogin'])
    ->name('student.login');

Route::post('/student/login', [AuthController::class, 'studentLogin'])
    ->name('student.login.post');

Route::get('/student/register', [AuthController::class, 'showRegisterForm'])
    ->name('student.register');

Route::post('/student/register', [AuthController::class, 'register'])
    ->name('student.register.post');

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ROOT
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | ADMIN AREA
    |--------------------------------------------------------------------------
    */
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

    /*
    |--------------------------------------------------------------------------
    | STUDENT AREA
    |--------------------------------------------------------------------------
    */
    Route::get('/student', function () {
        return view('fe.dashboard');
    })->name('fe.dashboard');

});
