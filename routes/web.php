<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'loginForm'])->name('login');
Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




// Middleware admin untuk dashboard & schedules
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/export', [DashboardController::class, 'export'])->name('dashboard.export');
    Route::post('/dashboard/import', [DashboardController::class, 'import'])->name('dashboard.import');
    Route::post('/schedules/{schedule}/status', [ScheduleController::class, 'updateStatus'])
     ->name('schedules.updateStatus')
     ->middleware('auth');

    Route::resource('schedules', ScheduleController::class);
    Route::resource('categories', CategoryController::class);
});

// Register
Route::get('/register', [AuthController::class, 'registerForm'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register.post');

