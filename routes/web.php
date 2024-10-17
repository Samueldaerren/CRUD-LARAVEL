<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\ProfileController; // Pastikan ini diimpor
use App\Models\User; // Impor model User
use App\Models\Product; // Impor model Product
use App\Http\Controllers\SearchController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register'); 
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        $totalAccounts = User::count(); // Hitung total akun
        $totalProducts = Product::count(); // Hitung total produk

        return view('dashboard', compact('totalAccounts', 'totalProducts')); // Kirim data ke tampilan
    })->name('dashboard');

    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('products');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('show/{id}', 'show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
    });

    Route::controller(AkunController::class)->prefix('akun')->group(function () {
        Route::get('', 'index')->name('akun.index');         // Menampilkan daftar akun
        Route::get('create', 'create')->name('akun.create'); // Form untuk tambah akun
        Route::post('store', 'store')->name('akun.store');   // Menyimpan akun baru
        Route::get('show/{id}', 'show')->name('akun.show');  // Menampilkan detail akun
        Route::get('edit/{id}', 'edit')->name('akun.edit');  // Form untuk edit akun
        Route::put('edit/{id}', 'update')->name('akun.update'); // Update akun yang diedit
        Route::delete('destroy/{id}', 'destroy')->name('akun.destroy'); // Menghapus akun
    });

    
    // Rute untuk Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // Rute untuk menampilkan form edit profil
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update'); // Rute untuk memperbarui profil
});


