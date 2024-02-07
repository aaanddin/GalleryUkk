<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/foto');

Route::get('/', [HomeController::class, 'index'])->name('page.home');
Route::get('/album', [AlbumController::class, 'index'])->name('page.album');
Route::get('/create-album', [AlbumController::class, 'create'])->name('page.albumaction.create');
Route::get('/photo', [FotoController::class, 'index'])->name('page.foto');

// Tambah post
Route::get('/create-foto', [FotoController::class, 'create'])->name('page.fotoaction.create');
Route::post('/create-foto', [FotoController::class, 'store'])->name('foto.store');

// Login dan Logout
Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');