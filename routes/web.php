<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
Route::middleware(['auth', 'verified'])->group(function () {
// Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
Route::get('/Products',  [ProductsController::class, 'index'])->name('Products');

});
Route::middleware('auth')->group(function () {
   
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::middleware((['auth', 'admin']))->group(function () {
Route::get('admin/dashboard', [HomeController::class, 'index']);
Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

});

