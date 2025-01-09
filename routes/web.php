<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
  Route::get('/', [ProductsController::class, 'index'])->name('shoping');
  Route::get('/commission', function () {
    return view('commission');
  })->name('commission');
  Route::get('/dashboard', function () {
    return view('dashboard');
  })->name('dashboard');

});
Route::post('/order', [ProductsController::class, 'order'])->name('order');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
