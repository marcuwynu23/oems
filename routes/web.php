<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');




// for protected routes
Route::middleware('auth')->group(function () {
   Route::get('/home', function () {
       return view('home');
   })->name('home');
});