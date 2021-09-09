<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    ProductController,
    BasketController,
    OrderController
};
use App\Http\Controllers\Dashboard\{
    OrderController as OrderControllerD,
};

Route::redirect('/','/products');

Route::get('/products',       [ProductController::class,'index'])->name('product.index');
Route::post('/addBasket',     [ProductController::class,'addToBasket'])->name('product.addToBasket');

Route::get('/basket',         [BasketController::class,'index'])->name('basket.index');
Route::DELETE('/basket/{id}', [BasketController::class,'destroy'])->name('basket.delete');

Route::post('/order',         [OrderController::class,'order'])->name('order');

Route::group(['prefix'=>'admin'], function (){
    Route::resource('orders', OrderControllerD::class);
});

