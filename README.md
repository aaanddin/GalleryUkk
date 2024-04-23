<h1 align="center">Gallerium, digital website gallery</h1>

## Tentang
<p>Gallerium adalah sebuah website gallery yang memungkinkan anda untuk menyimpan kenangan-kenangan gambar yang anda tangkap dengan nuansa yang berbeda yaitu nuansa ketenangan dan keindahan laut</p>

## Tools yang digunakan

- [VScode](https://code.visualstudio.com/download).
- [XAMPP](https://www.apachefriends.org/download.html).
- [composer](https://getcomposer.org/download/)
- Laravel versi 9.0 dan Bootstrap Framework
- Git
- Github
- PHP versi 8.2
  
## Pengerjaan
- download laravel dengan menuliskan code `composer cerate-project laravel/laravel nama_aplikasi`
- untuk menjalankan aplikasi, tuliskan `php artisan serve` pada terminal

## Menggunakan aplikasi/website Gallerium
Gallerium hanya memiliki satu user/pengguna. Untuk bisa mengakses, anda tinggal membuat akun pada halaman register lalu login

Namun, sebelum menjalankan aplikasi anda harus membuat database dengan nama yang sesuai dengan nama database di folder `.env` lalu melakukan migrasi tabel database dengan menuliskan `php artisan migrate` pada terminal

## ERD/tabel database
![Screenshot (113)](https://github.com/aaanddin/GalleryUkk/assets/140687214/46138429-6b84-412a-a357-055178dc5c2b)




## Tampilan Website/aplikasi
<h3 align="center">Tampilan Home</h3>

![Screenshot (114)](https://github.com/aaanddin/GalleryUkk/assets/140687214/877fa60e-3080-47eb-81eb-fb8f05d14250) 
<h3 align="center">Tampilan Registrasi</h3>

![Screenshot (115)](https://github.com/aaanddin/GalleryUkk/assets/140687214/1dcf8e6f-703d-4dfa-ba80-ce5903a9dcdf) 
<h3 align="center">Tampilan Login</h3>

![Screenshot (116)](https://github.com/aaanddin/GalleryUkk/assets/140687214/8a919d98-849a-4d0e-b280-908594203471) 
<h3 align="center">Post Photo</h3>

![Screenshot (118)](https://github.com/aaanddin/GalleryUkk/assets/140687214/adf7b6c0-d417-4ce8-86f6-e2f190731a4f) 
<h3 align="center">Komen Photo</h3>

![Screenshot (119)](https://github.com/aaanddin/GalleryUkk/assets/140687214/ab8e3cb0-dd58-4fc9-b36a-1d0521ecd846) 
<h3 align="center">Edit Photo</h3>

![Screenshot (120)](https://github.com/aaanddin/GalleryUkk/assets/140687214/f42dfe45-8075-43cf-9311-26582c441a1a)
<h3 align="center">Hapus Photo</<3>

![Screenshot (121)](https://github.com/aaanddin/GalleryUkk/assets/140687214/543f627e-0783-4467-b6eb-bf234b127018)
<h3 align="center">Tampilan Album</h3>

![Screenshot (122)](https://github.com/aaanddin/GalleryUkk/assets/140687214/22a494d8-0fce-4828-b35f-44c3f0a6d788) 



## Source Code
<h3 align="center">Routes</h3>

```php
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
// delete album
Route::delete('/album/{AlbumID}', [AlbumController::class, 'destroy'])->name('album.destroy');
// edit album
Route::get('/album/{AlbumID}/edit', [AlbumController::class, 'edit'])->name('album.edit');
Route::put('/album/{AlbumID}', [AlbumController::class, 'update'])->name('album.update');
// post foto album
Route::post('/album/detail-album', [AlbumController::class, 'albumfoto'])->name('album.albumfoto');

// Tambah post
Route::get('/photo', [FotoController::class, 'index'])->name('page.foto')->middleware('auth');
Route::get('/create-foto', [FotoController::class, 'create'])->name('page.fotoaction.create')->middleware('auth');
Route::post('/create-foto', [FotoController::class, 'store'])->name('foto.store');
// edit post
Route::get('/photo/{FotoID}/edit', [FotoController::class, 'edit'])->name('foto.edit')->middleware('auth');
Route::put('/photo/{FotoID}', [FotoController::class, 'update'])->name('foto.update')->middleware('auth');
// delete post
Route::delete('/photo/{id}', [FotoController::class, 'destroy'])->name('foto.destroy')->middleware('auth');

// komen
Route::post('/photo', [KomenController::class, 'store'])->name('komen.store')->middleware('auth');

// Login, Logout, resgister
Route::get('/login', [LoginduaController::class, 'index'])->name('log.login')->middleware('guest');
Route::post('/login', [LoginduaController::class, 'authenticate'])->name('login.authenticate');
Route::get('/register', [RegisterController::class, 'index'])->name('log.register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/logout', [LoginduaController::class, 'logout'])->name('login.logout');
```
<h3 align="center">Komen Controller</h3>

```php
<?php

namespace App\Http\Controllers;
use App\Models\Komen;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Date;

class KomenController extends Controller
{
    public function index() {
        $komens = Komen::all();
        return view('page.foto', [
            "komens" => $komens
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'isi_komentar' => 'required',
            'fotos_id' => 'required'

        ]);
        $validated['tanggal_komentar'] = Date::now();
        $validated['users_id'] = auth()->user()->id;

        Komen::create($validated);

        return redirect()->route('page.foto');
    }
}
```


## Saran
website masih dalam proses pengembangan sehingga masih ada beberapa fitur yang belum bisa digunakan. untuk itu, disarankan untuk menggunakan fitur yang sudah berjalan seperti post photo, edit photo, delete photo, komentar photo, dan create/membuat album




