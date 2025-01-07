<?php

use App\Http\Controllers\ProfileController;
use App\Models\Products;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('shoping');
})->middleware('auth')->name('shoping');

Route::middleware('auth')->group(function () {
  Route::get('/shoping', function () {
    return view('shoping');
  })->name('shoping');

  Route::get('/dashboard', function () {
    return view('dashboard');
  })->name('dashboard');
});

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
