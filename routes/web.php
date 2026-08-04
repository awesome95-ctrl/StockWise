<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SaleController;

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

require __DIR__.'/auth.php';
