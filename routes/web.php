<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Routes
Route::get('/', function () {
    return redirect('/beranda');
});
Route::get('/beranda', [HomeController::class, 'index']);

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes - All protected by auth:petugas middleware
Route::middleware('auth:petugas')->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Kategori Routes
    Route::prefix('kategori')->name('kategori.')->group(function () {
        Route::get('/', [KategoriController::class, 'index'])->name('index');
        Route::get('/create', [KategoriController::class, 'create'])->name('create');
        Route::post('/', [KategoriController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [KategoriController::class, 'edit'])->name('edit');
        Route::put('/{id}', [KategoriController::class, 'update'])->name('update');
        Route::delete('/{id}', [KategoriController::class, 'destroy'])->name('destroy');
    });

    // Posts Routes
    Route::prefix('posts')->name('posts.')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/', [PostController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [PostController::class, 'edit'])->name('edit');
        Route::put('/{id}', [PostController::class, 'update'])->name('update');
        Route::delete('/{id}', [PostController::class, 'destroy'])->name('destroy');
    });

    // Galeri Routes
    Route::prefix('galeri')->name('galeri.')->group(function () {
        Route::get('/', [GaleryController::class, 'index'])->name('index');
        Route::get('/create', [GaleryController::class, 'create'])->name('create');
        Route::post('/', [GaleryController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [GaleryController::class, 'edit'])->name('edit');
        Route::put('/{id}', [GaleryController::class, 'update'])->name('update');
        Route::delete('/{id}', [GaleryController::class, 'destroy'])->name('destroy');
    });

    // Foto Routes
    Route::prefix('foto')->name('foto.')->group(function () {
        Route::get('/', [FotoController::class, 'index'])->name('index');
        Route::get('/create', [FotoController::class, 'create'])->name('create');
        Route::post('/', [FotoController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [FotoController::class, 'edit'])->name('edit');
        Route::put('/{id}', [FotoController::class, 'update'])->name('update');
        Route::delete('/{id}', [FotoController::class, 'destroy'])->name('destroy');
    });

    // Profile Routes
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::get('/create', [ProfileController::class, 'create'])->name('create');
        Route::post('/', [ProfileController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ProfileController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ProfileController::class, 'update'])->name('update');
        Route::delete('/{id}', [ProfileController::class, 'destroy'])->name('destroy');
    });

    // Petugas Management Routes
    Route::prefix('manajemen-admin')->name('petugas.')->group(function () {
        Route::get('/', [PetugasController::class, 'index'])->name('index');
        Route::get('/create', [PetugasController::class, 'create'])->name('create');
        Route::post('/', [PetugasController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [PetugasController::class, 'edit'])->name('edit');
        Route::put('/{id}', [PetugasController::class, 'update'])->name('update');
        Route::delete('/{id}', [PetugasController::class, 'destroy'])->name('destroy');
    });

    // Preview Route
    Route::get('/preview', [HomeController::class, 'index'])->name('admin.preview');
});