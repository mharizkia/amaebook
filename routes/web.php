<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class, 'index'])->name('welcome.index');
Route::get('/buku', [HomeController::class, 'bukuindex'])->name('welcome.bukuindex');
Route::get('/author', [HomeController::class, 'authorindex'])->name('welcome.authorindex');
Route::get('/buku/{id}', [HomeController::class, 'bukushow'])->name('welcome.bukushow');
Route::get('/author/{id}', [HomeController::class, 'authorshow'])->name('welcome.authorshow');
Route::get('/search', [HomeController::class, 'search'])->name('welcome.search');

Route::middleware('auth', 'admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'admin')->group(function () {
    Route::get('/admauthors', [AuthorController::class, 'index'])->name('authors.index');
    Route::post('/admauthors', [AuthorController::class, 'store'])->name('authors.store');
    Route::get('/admauthors/{id}', [AuthorController::class, 'show'])->name('authors.show');
    Route::put('/admauthors/{id}', [AuthorController::class, 'update'])->name('authors.update');
    Route::delete('/admauthors/{id}', [AuthorController::class, 'destroy'])->name('authors.destroy');
});

Route::middleware('auth', 'admin')->group(function () {
    Route::get('/admbukus', [BukuController::class, 'index'])->name('bukus.index');
    Route::post('/admbukus', [BukuController::class, 'store'])->name('bukus.store');
    Route::get('/admbukus/{id}', [BukuController::class, 'show'])->name('bukus.show');
    Route::put('/admbukus/{id}', [BukuController::class, 'update'])->name('bukus.update');
    Route::delete('/admbukus/{id}', [BukuController::class, 'destroy'])->name('bukus.destroy');
});

require __DIR__.'/auth.php';

