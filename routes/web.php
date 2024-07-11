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

Route::middleware(['auth', 'verified'])->group(function() {
    Route::resource('aanvraag', AanvraagController::class);
    Route::resource('dierfotos', DierfotoController::class);
    Route::resource('huisdier', HuisdierController::class)->except(['index']);
});

Route::controller(HuisdierController::class)->group(function () {
    Route::get('/overview', 'index')->name('huisdier.overview');
});

Route::get('/dashboard', [UserController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/upload', [FotoController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
