<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;

Route::get('/home', [HomeController::class, 'index'])->name('welcome.index');
Route::get('/home/buku', [HomeController::class, 'bukuindex'])->name('welcome.bukuindex');
Route::get('/home/author', [HomeController::class, 'authorindex'])->name('welcome.authorindex');
Route::get('/home/buku/{id}', [HomeController::class, 'bukushow'])->name('welcome.bukushow');
Route::get('/home/author/{id}', [HomeController::class, 'authorshow'])->name('welcome.authorshow');
Route::get('/search', [HomeController::class, 'search'])->name('welcome.search');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
    Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
    Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');
    Route::get('/authors/{id}', [AuthorController::class, 'show'])->name('authors.show');
    Route::get('/authors/{id}/edit', [AuthorController::class, 'edit'])->name('authors.edit');
    Route::put('/authors/{id}', [AuthorController::class, 'update'])->name('authors.update');
    Route::delete('/authors/{id}', [AuthorController::class, 'destroy'])->name('authors.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/bukus', [BukuController::class, 'index'])->name('bukus.index');
    Route::post('/bukus', [BukuController::class, 'store'])->name('bukus.store');
    Route::get('/bukus/{id}', [BukuController::class, 'show'])->name('bukus.show');
    Route::put('/bukus/{id}', [BukuController::class, 'update'])->name('bukus.update');
    Route::delete('/bukus/{id}', [BukuController::class, 'destroy'])->name('bukus.destroy');
});

require __DIR__.'/auth.php';

