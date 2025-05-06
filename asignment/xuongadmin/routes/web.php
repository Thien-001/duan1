<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Payment;
use App\Http\Controllers\ProductResource;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;


Route::get('/', [PageController::class, 'home']);
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.store');

Route::resource('/cart', CartController::class);
Route::get('/detail/{slug}', [ProductController::class, 'detail']);


Route::get('/detail/{slug}', [ProductController::class, 'detail']);
Route::resource('/cart', CartController::class);
Route::get('/product', [ProductController::class, 'allPro']);

Route::post('/payment', [Payment::class, 'create']);
Route::get('/payment/result', [Payment::class, 'result']);

Route::get('/cart/remove/{id}', [CartController::class, 'destroy'])->name('cart.remove');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

Route::post('/postLogin', [UserController::class, 'postLogin']);
Route::get('/logout', [UserController::class, 'logout']);
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'dasboard']);
});


Route::get('/admin/product', [ProductResource::class, 'showProducts'])->name('adminpro');
Route::get('/admin/category', [CategoryController::class, 'showCategories'])->name('admincate');
Route::get('/admin/user', [UserController::class, 'showUsers'])->name('adminuser');

Route::get('/admin/product/create', function () {
    return view('admin.formproduct');
});

Route::get('/admin/category/create', function () {
    return view('admin.formcategory');
});
Route::get('/admin/category/add', [CategoryController::class, 'addform']);
Route::post('/admin/category', [CategoryController::class, 'add'])->name('category.add');
Route::get('/admin/category/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
Route::post('/admin/category/update/{id}', [CategoryController::class, 'upcate'])->name('admin.category.update');

Route::get('/admin/user/add', [UserController::class, 'addformu']);
Route::post('/admin/user', [UserController::class, 'addUser'])->name('user.add');
Route::get('/admin/user/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
Route::post('/admin/user/update/{id}', [UserController::class, 'upuser'])->name('admin.user.update');

Route::get('/admin/product/add', [ProductResource::class, 'addform']);
Route::post('/admin/product', [ProductResource::class, 'add'])->name('product.add');
Route::get('/admin/product/delete/{id}', [ProductResource::class, 'delete'])->name('admin.product.delete');
Route::get('/admin/product/edit/{id}', [ProductResource::class, 'edit'])->name('admin.product.edit');
Route::post('/admin/product/update/{id}', [ProductResource::class, 'uppro'])->name('admin.product.update');

Route::get('/admin/order', [OrderController::class, 'index']);
Route::post('/admin/order/{id}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
Route::get('/admin/order/{id}', [OrderController::class, 'show'])->name('detailorder');
