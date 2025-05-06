<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthControllers;
use App\Http\Controllers\SanphamController;
use App\Http\Controllers\CartController;
use App\Http\Middleware\CheckAdmin;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\VNPay;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home']);
Route::get('/detail/{slug}', [SanphamController::class, 'detail']);
Route::resource('/cart', CartController::class);
Route::get('/product', [SanphamController::class, 'allPro']);

Route::get('/cart/remove/{id}', [CartController::class, 'destroy'])->name('cart.remove');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

Route::post('/comment/{id_sanpham}', [CommentController::class, 'store'])->name('comment.store');
Route::get('/product/{slug}', [CommentController::class, 'show'])->name('comment.show');
Route::post('/product/{slug}/comment', [CommentController::class, 'store'])->name('product.comment');
Route::post('/comment/reply/{comment_id}', [CommentController::class, 'reply'])->name('comment.reply');
Route::get('/sanphams', [SanphamController::class, 'index']);
Route::get('/sanpham/{slug}', [SanPhamController::class, 'show']);

// // Hiển thị sản phẩm kèm bình luận
// Route::get('/sanpham/{slug}', [CommentController::class, 'index']);

// // Thêm bình luận
// Route::post('/sanpham/{slug}/comment', [CommentController::class, 'store']);
Route::post('/product/{id}/comment', [CommentController::class, 'store'])->name('product.comment');


// // Đăng ký
// Route::get('/register', [AuthControllers::class, 'showRegister'])->name('register');
// Route::post('/register', [AuthController::class, 'register']);

// // Đăng nhập
// Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);

// // Đăng xuất
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// // quên MK
// Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('forgot-password');
// Route::post('/forgot-password', [AuthController::class, 'sendResetPassword']);
// Route::get('/reset-password/{email}', [AuthController::class, 'showResetPassword'])->name('reset-password');
// Route::post('/reset-password', [AuthController::class, 'resetPassword']);

Route::post('/vnpay_php/vnpay_create_payment', [VNPay::class, 'create']);

Route::get('/login', [AuthControllers::class, 'login'])->name('login');
Route::get('/register', [AuthControllers::class, 'register'])->name('register');
Route::post('/postLogin', [AuthControllers::class, 'postLogin']);
Route::get('/logout', [AuthControllers::class, 'logout']);
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [Admin::class, 'dasboard']);
});


