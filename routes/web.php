<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return redirect()->route('home');
})->middleware('auth');


Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('auth.register');


Route::get('/recovery', [AuthController::class, 'recovery'])->name('auth.recovery');
Route::post('/recovery', [AuthController::class, 'postRecovery'])->name('auth.recovery');

// recovery confirmation
Route::get('/recovery/confirm', [AuthController::class, 'recoveryConfirm'])->name('auth.recovery.confirm');
Route::post('/recovery/confirm', [AuthController::class, 'postRecoveryConfirm'])->name('auth.recovery.confirm');

// for protected routes
Route::middleware('auth')->group(function () {
   Route::get('/home',[HomeController::class,'index'])->name('home');
});