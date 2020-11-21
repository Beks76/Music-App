<?php

use App\Http\Controllers\ChartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/home');
Route::resource('/home', HomeController::class);

Route::resource('/chart', ChartController::class);

Route::get('/signin', [AuthController::class, 'getSignin'])->name('auth.signin');
Route::post('/signin', [AuthController::class, 'postSignin'])->name('auth.postSignin');
Route::get('/signup', [AuthController::class, 'getSignup'])->name('auth.signup');
Route::post('/signup', [AuthController::class, 'store'])->name('auth.store');