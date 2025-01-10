<?php

use App\Http\Controllers\CommissionsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
  Route::get('/', [ProductsController::class, 'index'])->name('products');
  Route::post('/buy-product', [ProductsController::class, 'buyProduct'])->name('product.buy');

  Route::prefix('/orders')->group(function () {
    Route::get('/', [OrdersController::class, 'index'])->name('orders');
    Route::get('/order-datatable', [OrdersController::class, 'dataTable'])->name('order.datatable');
  });

  Route::prefix('/commission')->group(function () {
    Route::get('/', [CommissionsController::class, 'index'])->name('commission');
    Route::get('/commission-datatable', [CommissionsController::class, 'dataTable'])->name('commission.datatable');
  });
});

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
