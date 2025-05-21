<?php

use App\Http\Controllers\AdminArticleController;
use App\Http\Controllers\AdminBannerController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OderController;
use App\Http\Controllers\OrderHistoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
Route::get('/dashboard', [BannerController::class, 'index'])->name('dashboard');
Route::get('/', [BannerController::class, 'index'])->name('dashboard');
Route::get('AllProducts', [ProductsController::class, 'show_allhotproduct'])->name('AllProducts');
 Route::get('/Products/{id}', [ProductsController::class, 'show_product'])->name('Products/{id}');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/OrderHistory',  [OrderHistoryController::class, 'index'])->name('OrderHistory');
    Route::get('/Search',  [ProductsController::class, 'search'])->name('Search');
    Route::post('/cart/add', [CartController::class, 'add_cart']);
    Route::get('/cart', [CartController::class, 'show_cart']);
    Route::get('/cart/count', function () {
        $cartCount = session()->get('Cart') ? array_sum(array_column(session()->get('Cart'), 'quantity')) : 0;
        return response()->json(['cartCount' => $cartCount]);
    });

    Route::get('/cart/delete/{id}', [CartController::class, 'delete_cart']);
    Route::post('/cart/update', [CartController::class, 'update_cart']);
    Route::post('/calculate-cost', [CartController::class, 'calculateStayCost']);
    Route::post('/cart/send', [CartController::class, 'store']);
    Route::get('/vnpay_return', [CartController::class, 'vnpayReturn'])->name('vnpay.return');


    Route::get('/order_success', [OderController::class, 'index']);
    Route::get('/order_failed', [OderController::class, 'failed']);
});
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::middleware((['auth', 'admin']))->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index']);
    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard.home');

    Route::post('/admin/product/add', [AdminProductController::class, 'insert_product']);
    Route::get('/admin/product/create', [AdminProductController::class, 'add_product']);
    Route::get('/admin/product/list', [AdminProductController::class, 'list_product']);
    Route::get('/admin/product/delete', [AdminProductController::class, 'delete_product']);
    Route::get('/admin/product/edit/{id}', [AdminProductController::class, 'edit_product']);
    Route::post('/admin/product/edit/{id}', [AdminProductController::class, 'update_product']);

    Route::post('admin/slide/add', [AdminBannerController::class, 'insert_banner']);
    Route::get('admin/slide/create', [AdminBannerController::class, 'add_banner']);
    Route::get('admin/slide/list', [AdminBannerController::class, 'list_banner']);
    Route::get('admin/slide/delete', [AdminBannerController::class, 'delete_banner']);
    Route::get('admin/slide/edit/{id}', [AdminBannerController::class, 'edit_banner']);
    Route::post('admin/slide/edit/{id}', [AdminBannerController::class, 'update_banner']);

    Route::post('admin/article/add', [AdminArticleController::class, 'insert_article']);
    Route::get('admin/article/create', [AdminArticleController::class, 'add_article']);
    Route::get('admin/article/list', [AdminArticleController::class, 'list_article']);
    Route::get('admin/article/delete', [AdminArticleController::class, 'delete_article']);
    Route::get('admin/article/edit/{id}', [AdminArticleController::class, 'edit_article']);
    Route::post('admin/article/edit/{id}', [AdminArticleController::class, 'update_article']);

    Route::get('admin/account/list', [UserController::class, 'list_account']);
    Route::post('/admin/account/delete', [UserController::class, 'delete_account']);
    Route::get('/admin/account/edit/{id}', [UserController::class, 'edit_account']);
    Route::post('/admin/account/edit/{id}', [UserController::class, 'update_account']);


    Route::get('/admin/order/list', [AdminOrderController::class, 'list_order']);
    Route::get('/admin/order/listsuscess', [AdminOrderController::class, 'listsc_order']);
    Route::post('/admin/order/delete', [AdminOrderController::class, 'delete_order']);
    Route::get('/admin/order/detail/{id}', [AdminOrderController::class, 'detail_order']);

});






Route::middleware((['auth', 'employee']))->group(function () {
    Route::get('employee/dashboard', [EmployeeController::class, 'index']);
    Route::get('/employee/dashboard', [EmployeeController::class, 'index'])->name('employee.dashboard');
});


Route::post('/upload', [UploadController::class, 'upload']);
Route::post('/uploads', [uploadcontroller::class, 'uploadImage']);

// Route::post('/vnpay_payment', [PaymentController::class, 'vnpay_payment']);
