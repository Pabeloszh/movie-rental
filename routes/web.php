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
use App\Http\Controllers\MyMovies\RentedMoviesController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\AdminMoviesController;
use App\Http\Controllers\Admin\AdminRentsController;

Route::get('/', [HomeController::class, 'index']) -> name('home');

Route::get('/movie/{movie}', [MovieController::class, 'index'])->name('movie');

Route::post('/rent/{movie}', [RentingController::class, 'store'])->name('rent');
Route::post('/back/{movie}', [RentingController::class, 'back'])->name('back');

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

Route::get('/setnewpassword/{prop}', [RemindPasswordController::class, 'index'])->name('new-password');
Route::post('/setnewpassword/{prop}', [RemindPasswordController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/update', [UpdateUserController::class, 'index'])->name('update');
Route::post('/update', [UpdateUserController::class, 'store']);
Route::delete('/update', [UpdateUserController::class, 'destroy']);

Route::get('/mymovies/rentedmovies', [RentedMoviesController::class, 'index'])->name('mymovies');

Route::get('/admin/users', [AdminUsersController::class, 'index'])->name('adminusers');
Route::delete('/admin/users/{user}', [AdminUsersController::class, 'ban'])->name('adminuser.ban');

Route::get('/admin/movies', [AdminMoviesController::class, 'index'])->name('adminmovies');
Route::post('/admin/movies', [AdminMoviesController::class, 'store'])->name('adminmovies.post');
Route::delete('/admin/movies/{movie}', [AdminMoviesController::class, 'destroy'])->name('adminmovies.delete');
Route::get('/admin/movies/{movie}', [AdminMoviesController::class, 'movieindex'])->name('adminmovies.edit');
Route::post('/admin/movies/{movie}', [AdminMoviesController::class, 'moviestore']);

Route::get('/admin/rents', [AdminRentsController::class, 'index'])->name('adminrents');


