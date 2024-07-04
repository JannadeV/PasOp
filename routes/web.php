<?php

use App\Http\Controllers\AanvraagController;
use App\Http\Controllers\DierfotoController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\HuisdierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(HuisdierController::class)->group(function () {
    Route::get('/overview', 'index');
    Route::get('/pet/{id}', 'show')->middleware(['auth', 'verified'])->name('pet.show');
});

Route::resource('dierfotos', DierfotoController::class);
Route::post('/upload', [FotoController::class, 'store']);

Route::controller(AanvraagController::class)->group(function() {
    Route::get('/aanvragen', 'index')->name('aanvragen.index');
    Route::get('/aanvragen/{id}', 'show')->middleware(['auth', 'verified'])->name('aanvragen.show');
    Route::post('/aanvragen', 'store')->name('aanvragen.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
