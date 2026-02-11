<?php

use App\Http\Controllers\Api\Product\Category\CategoryController;
use App\Http\Controllers\Api\Product\ProductController;

use Illuminate\Support\Facades\Route;

Route::get('products', [ProductController::class, 'index']);
Route::group(['prefix' => 'product'], function () {
    Route::post('/', [ProductController::class, 'save']);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::post('category', [CategoryController::class, 'save']);
});
