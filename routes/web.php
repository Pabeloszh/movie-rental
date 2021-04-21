<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\UpdateUserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RemindPasswordController;

Route::get('/', [ function(){
    return view('home');
}]) -> name('home');

Route::get('/check-email', [ function(){
    return view('auth.checkemail');
}]) -> name('email');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

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

