<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\LoginduaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\KomenController;

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

Route::get('/wel', function () {
    return view('welcome');
});

Route::redirect('/home', '/photo');

Route::get('/', [WelcomeController::class, 'index'])->name('page.welcome')->middleware('guest');
Route::get('/home', [HomeController::class, 'index'])->middleware('auth');

// create album
Route::get('/album', [AlbumController::class, 'index'])->name('page.album')->middleware('auth');
Route::get('/create-album', [AlbumController::class, 'create'])->name('page.albumaction.create')->middleware('auth');
Route::post('/create-album', [AlbumController::class, 'store'])->name('album.store');
// detailalbum
Route::get('/album/detail-album', [AlbumController::class, 'detail'])->name('page.albumaction.detail')->middleware('auth');

// Tambah post
Route::get('/photo', [FotoController::class, 'index'])->name('page.foto')->middleware('auth');
Route::get('/create-foto', [FotoController::class, 'create'])->name('page.fotoaction.create')->middleware('auth');
Route::post('/create-foto', [FotoController::class, 'store'])->name('foto.store');

// komen
Route::post('/photo', [KomenController::class, 'store'])->name('komen.store');

// Login, Logout, resgister
Route::get('/login', [LoginduaController::class, 'index'])->name('log.login')->middleware('guest');
Route::post('/login', [LoginduaController::class, 'authenticate'])->name('login.authenticate');
Route::get('/register', [RegisterController::class, 'index'])->name('log.register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/logout', [LoginduaController::class, 'logout'])->name('login.logout');