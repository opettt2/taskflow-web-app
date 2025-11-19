<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\taskc;
use Illuminate\Support\Facades\Route;

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])
    ->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])
    ->name('google.callback');

Route::middleware('auth')->group(function () {
    Route::get('/', [taskc::class, 'index']);

    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('task', taskc::class)->except(['show']);
    Route::patch('/task/{task}/complete', [taskc::class, 'markComplete'])->name('task.complete');
});

require __DIR__.'/auth.php';