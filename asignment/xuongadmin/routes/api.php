<?php

use App\Http\Controllers\Api\CategoryController as ApiCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductResource;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('user', UserController::class);
Route::get('/users', [UserController::class, 'index']);
// Route::resource('product', ProductResource::class);
// Route::resource('category', CategoryController::class);

Route::resource('product', ProductResource::class);
Route::get('/products', [ProductResource::class, 'index']);

Route::resource('category', CategoryController::class); // REST API
Route::get('/categories', [CategoryController::class, 'index']); // nếu bạn dùng riêng lẻ



// Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::post('/category', [CategoryController::class, 'store']);
Route::put('/category/{id}', [CategoryController::class, 'update']);
Route::delete('/category/{id}', [CategoryController::class, 'destroy']);
