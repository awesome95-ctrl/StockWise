<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StockMovementController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function(){

Route::resource('products', ProductController::class);
Route::resource('categories',CategoryController::class);

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile',[ProfileController::class,'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
Route::resource('sales', SaleController::class);

});

Route::get('/stock-movements/create', [StockMovementController::class, 'create'])
        ->name('stock-movements.create');

Route::post('/stock-movements', [StockMovementController::class, 'store'])
        ->name('stock-movements.store');

Route::get('/stock-movements', [StockMovementController::class, 'index'])
        ->name('stock-movements.index');

require __DIR__.'/auth.php';
