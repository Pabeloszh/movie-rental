<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\UpdateUserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RemindPasswordController;
use App\Http\Controllers\Movies\HomeController;
use App\Http\Controllers\Movies\MovieController;
use App\Http\Controllers\Movies\RentingController;

Route::get('/', [HomeController::class, 'index']) -> name('home');

Route::get('/movie/{movie}', [MovieController::class, 'index'])->name('movie');

Route::post('/rent/{movie}', [RentingController::class, 'store'])->name('rent');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/check-email', [ function(){
    return view('auth.checkemail');
}]) -> name('email');

Route::get('/verify/{name}/{token}', [VerificationController::class, 'verify'])->name('verify');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store']);

Route::get('/set-new-password/{prop}', [RemindPasswordController::class, 'index'])->name('new-password');
Route::post('/set-new-password/{prop}', [RemindPasswordController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/update', [UpdateUserController::class, 'index'])->name('update');
Route::post('/update', [UpdateUserController::class, 'store']);

