<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccountRequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/request-account', [AccountRequestController::class, 'create'])->name('requests.create');
Route::post('/request-account', [AccountRequestController::class, 'store'])->name('requests.store');

Route::middleware(['auth','role:Admin'])->group(function () {
    Route::get('/requests', [AccountRequestController::class, 'index'])->name('requests.index');
    Route::post('/requests/{id}/approve', [AccountRequestController::class, 'approve'])->name('requests.approve');
});



require __DIR__.'/auth.php';
