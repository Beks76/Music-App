<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ChartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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


Route::resource('/backend', AdminController::class)->middleware(['auth', 'auth.admin']);
Route::get('/backend/gen/{genre}', [AdminController::class, 'albumByGenre'])->middleware(['auth', 'auth.admin'])->name('backend.genre');

Route::redirect('/', '/home');
Route::resource('/home', HomeController::class);

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->middleware('auth')->name('profile.index');

Route::get('/chart', [ChartController::class, 'index']);

Route::get('/signin', [AuthController::class, 'getSignin'])->middleware('guest')->name('auth.signin');
Route::post('/signin', [AuthController::class, 'postSignin'])->middleware('guest')->name('auth.postSignin');
Route::get('/signup', [AuthController::class, 'getSignup'])->middleware('guest')->name('auth.signup');
Route::post('/signup', [AuthController::class, 'store'])->middleware('guest')->name('auth.store');
Route::get('/logout', [AuthController::class, 'getLogOut'])->name('auth.logout');


