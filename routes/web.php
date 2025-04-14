<?php

use App\Http\Controllers\AdminBannerController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

    Route::get('/', function () {return view('welcome');});

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

require __DIR__ . '/auth.php';
Route::middleware((['auth', 'admin']))->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index']);
    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/home',[HomeController::class,'home']);

    Route::post('/admin/product/add',[AdminProductController::class,'insert_product']);
    Route::get('/admin/product/create',[AdminProductController::class,'add_product']);
    Route::get('/admin/product/list',[AdminProductController::class,'list_product']);
    Route::get('/admin/product/delete',[AdminProductController::class,'delete_product']);
    Route::get('/admin/product/edit/{id}',[AdminProductController::class,'edit_product']);
    Route::post('/admin/product/edit/{id}',[AdminProductController::class,'update_product']);

    Route::post('admin/slide/add',[AdminBannerController::class,'insert_banner']);
    Route::get('admin/slide/create',[AdminBannerController::class,'add_banner']);
    Route::get('admin/slide/list',[AdminBannerController::class,'list_banner']);
    Route::get('admin/slide/delete',[AdminBannerController::class,'delete_banner']);
    Route::get('admin/slide/edit/{id}',[AdminBannerController::class,'edit_banner']);
    Route::post('admin/slide/edit/{id}',[AdminBannerController::class,'update_banner']);

    Route::get('admin/account/list',[UserController::class,'list_account']);
    Route::post('/admin/account/delete',[UserController::class,'delete_account']);
    Route::get('/admin/account/edit/{id}',[UserController::class,'edit_account']);
    Route::post('/admin/account/edit/{id}',[UserController::class,'update_account']);
});
Route::middleware((['auth', 'employee']))->group(function () {
Route::get('employee/dashboard', [EmployeeController::class, 'index']);
Route::get('/employee/dashboard', [EmployeeController::class, 'index'])->name('employee.dashboard');
});