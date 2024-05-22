<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HuisdierController;
use App\Http\Controllers\AanvraagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(HuisdierController::class)->group(function () {
    Route::get('/overview', 'index');
    Route::get('/pet/{id}', 'show')->middleware(['auth', 'verified'])->name('pet.show');
});

Route::controller(AanvraagController::class)->group(function() {
    Route::post('/aanvragen', 'store')->name('aanvragen.store');
    Route::post('/aanvragen/{id}', 'show')->middleware(['auth', 'verified'])->name('aanvragen.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
