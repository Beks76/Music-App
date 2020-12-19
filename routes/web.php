<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ChartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\Subscriptions\SubscriptionController;
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


Route::get('/backend', [AdminController::class, 'index'])->middleware(['auth', 'auth.admin'])->name('backend.index');

Route::get('/album', [AlbumController::class, 'index'])->middleware(['auth', 'auth.admin'])->name('album.index');
Route::get('/album/gen/{genre}', [AlbumController::class, 'albumByGenre'])->middleware(['auth', 'auth.admin'])->name('album.genre');
Route::post('/album', [AlbumController::class, 'store'])->middleware('auth')->name('album.store');
Route::get('/album/create', [AlbumController::class, 'create'])->middleware(['auth', 'auth.admin'])->name('album.create');
Route::get('/album/{album}', [AlbumController::class, 'show'])->middleware('auth')->name('album.show');
Route::get('/album/listen/{album}', [AlbumController::class, 'listen'])->middleware('auth')->name('album.listen');
Route::patch('/album/{album}', [AlbumController::class, 'update'])->middleware('auth')->name('album.update');
Route::delete('/album/{album}', [AlbumController::class, 'destroy'])->middleware('auth')->name('album.destroy');
Route::get('/album/{album}/edit', [AlbumController::class, 'edit'])->middleware(['auth', 'auth.admin'])->name('album.edit');

Route::get('/genre', [GenreController::class, 'index'])->middleware(['auth', 'auth.admin'])->name('genre.index');
Route::post('/genre', [GenreController::class, 'store'])->middleware(['auth', 'auth.admin'])->name('genre.store');
Route::get('/genre/create', [GenreController::class, 'create'])->middleware(['auth', 'auth.admin'])->name('genre.create');
// Route::get('/genre/{create}', [GenreController::class, 'show'])->middleware('auth')->name('genre.show');
Route::patch('/genre/{genre}', [GenreController::class, 'update'])->middleware(['auth', 'auth.admin'])->name('genre.update');
Route::delete('/genre/{genre}', [GenreController::class, 'destroy'])->middleware(['auth', 'auth.admin'])->name('genre.destroy');
Route::get('/genre/{genre}/edit', [GenreController::class, 'edit'])->middleware(['auth', 'auth.admin'])->name('genre.edit');

Route::get('/tag', [TagController::class, 'index'])->middleware(['auth', 'auth.admin'])->name('tag.index');
Route::post('/tag', [TagController::class, 'store'])->middleware(['auth', 'auth.admin'])->name('tag.store');
Route::get('/tag/create', [TagController::class, 'create'])->middleware(['auth', 'auth.admin'])->name('tag.create');
// Route::get('/tag/{create}', [GenrTagControllereController::class, 'show'])->middleware('auth')->name('tag.show');
Route::patch('/tag/{tag}', [TagController::class, 'update'])->middleware(['auth', 'auth.admin'])->name('tag.update');
Route::delete('/tag/{tag}', [TagController::class, 'destroy'])->middleware(['auth', 'auth.admin'])->name('tag.destroy');
Route::get('/tag/{tag}/edit', [TagController::class, 'edit'])->middleware(['auth', 'auth.admin'])->name('tag.edit');

Route::get('/user', [UserRoleController::class, 'index'])->middleware(['auth', 'auth.admin'])->name('user.index');
Route::post('/user', [UserRoleController::class, 'store'])->middleware(['auth', 'auth.admin'])->name('user.store');
Route::get('/user/create', [UserRoleController::class, 'create'])->middleware(['auth', 'auth.admin'])->name('user.create');
// Route::get('/tag/{create}', [GenrTagControllereController::class, 'show'])->middleware('auth')->name('tag.show');
Route::patch('/user/{user}', [UserRoleController::class, 'update'])->middleware(['auth', 'auth.admin'])->name('user.update');
Route::delete('/user/{user}', [UserRoleController::class, 'destroy'])->middleware(['auth', 'auth.admin'])->name('user.destroy');
Route::get('/user/{user}/edit', [UserRoleController::class, 'edit'])->middleware(['auth', 'auth.admin'])->name('user.edit');
Route::get('/user/{user}', [UserRoleController::class, 'show'])->middleware(['auth', 'auth.admin'])->name('user.show');
Route::delete('/user/{user}/destroyrole', [UserRoleController::class, 'destroyRole'])->middleware(['auth', 'auth.admin'])->name('user.destroyrole');


Route::get('/role', [RoleController::class, 'index'])->middleware(['auth', 'auth.admin'])->name('role.index');
Route::post('/role', [RoleController::class, 'store'])->middleware(['auth', 'auth.admin'])->name('role.store');
Route::get('/role/create', [RoleController::class, 'create'])->middleware(['auth', 'auth.admin'])->name('role.create');
// Route::get('/role/{create}', [RoleController::class, 'show'])->middleware('auth')->name('role.show');
Route::patch('/role/{role}', [RoleController::class, 'update'])->middleware(['auth', 'auth.admin'])->name('role.update');
Route::delete('/role/{role}', [RoleController::class, 'destroy'])->middleware(['auth', 'auth.admin'])->name('role.destroy');
Route::get('/role/{role}/edit', [RoleController::class, 'edit'])->middleware(['auth', 'auth.admin'])->name('role.edit');

Route::get('/song', [SongController::class, 'index'])->middleware(['auth', 'auth.admin'])->name('song.index');
Route::post('/song', [SongController::class, 'store'])->middleware(['auth', 'auth.admin'])->name('song.store');
Route::get('/song/create', [SongController::class, 'create'])->middleware(['auth', 'auth.admin'])->name('song.create');

Route::redirect('/', '/home');
Route::resource('/home', HomeController::class);

Route::get('/search', [searchController::class, 'index'])->middleware('auth')->name('search.index');

Route::get('user/{user}/profile', [ProfilesController::class, 'index'])->middleware('auth')->name('profile.index');
Route::get('/user/{user}/station', [ProfilesController::class, 'station'])->middleware('artist')->name('profile.station');
Route::get('/user/{user}/albums', [ProfilesController::class, 'albums'])->middleware('artist')->name('profile.albums');
Route::get('/user/{user}/edit', [ProfilesController::class, 'edit'])->middleware('auth')->name('profile.edit');
Route::patch('/user/{profile}', [ProfilesController::class, 'update'])->middleware('auth')->name('profile.update');
Route::get('/user/like/{album_id}', [ProfilesController::class, 'like'])->middleware('auth')->name('profile.like');
Route::get('/user/follow/{artist_id}', [ProfilesController::class, 'follow'])->middleware('auth')->name('profile.follow');
Route::get('/user/album/{album_id}/delete', [ProfilesController::class, 'delete_album'])->middleware('auth')->name('profile.album_delete');
Route::get('/user/{user}/album/create', [ProfilesController::class, 'album_create'])->middleware('auth')->name('profile.album_create');
Route::get('/user/{user}/album/{album}/edit', [ProfilesController::class, 'album_edit'])->middleware('auth')->name('profile.album_edit');
Route::get('/artists', [ProfilesController::class, 'artists'])->middleware('auth')->name('profile.artists');


// // Route::get('/profile/{user}/station', [ArtistController::class, 'station'])->middleware('auth')->name('artist.station');
// Route::get('/profile/{user}/album/create', [ArtistController::class, 'album_create'])->middleware('auth')->name('artist.album_create');

Route::get('/chart', [ChartController::class, 'index'])->middleware('auth')->name('chart.index');

Route::get('/signin', [AuthController::class, 'getSignin'])->middleware('guest')->name('auth.signin');
Route::post('/signin', [AuthController::class, 'postSignin'])->middleware('guest')->name('auth.postSignin');
Route::get('/signup', [AuthController::class, 'getSignup'])->middleware('guest')->name('auth.signup');
Route::post('/signup', [AuthController::class, 'store'])->middleware('guest')->name('auth.store');
Route::get('/logout', [AuthController::class, 'getLogOut'])->name('auth.logout');

Route::group(['namespace' => 'Subscriptions'], function() {
    Route::get('/subscribe', [SubscriptionController::class, 'index'])->middleware('auth')->name('payments');
    Route::post('/subscribe', [SubscriptionController::class, 'store'])->middleware('auth')->name('payments.store');
    Route::post('/subscancel', [SubscriptionController::class, 'cancel'])->middleware('auth')->name('payments.cancel');
});
