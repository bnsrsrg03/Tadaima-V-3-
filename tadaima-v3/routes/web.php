<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

use App\Http\Controllers\TentangController;
Route::get('/tentang-kami', [TentangController::class, 'index'])->name('halaman.tentang');

use App\Http\Controllers\GaleriController;
Route::get('/galeri', [GaleriController::class, 'index']);

use App\Http\Controllers\MenuController;
Route::get('/menu/makanan', [MenuController::class, 'makanan'])->name('menu.makanan');
use App\Http\Controllers\ReviewController;

Route::get('/ulasan', [ReviewController::class, 'index'])->name('review.index');
Route::post('/ulasan', [ReviewController::class, 'store'])->name('review.store');


Route::get('/menu/minuman', function () {
    return view('menu.minuman');
})->name('menu.minuman');

Route::get('/menu/cemilan', function () {
    return view('menu.cemilan');
})->name('menu.cemilan');
