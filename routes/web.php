<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [HomeController::class, 'redirect']);

Route::get('/', [HomeController::class, 'index']);


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::post('/uploadproduct', [AdminController::class, 'uploadproduct']);
    Route::get('/product', [AdminController::class, 'product']);
    Route::get('/showproduct', [AdminController::class, 'showproduct']);
    Route::get('/deleteproduct/{id}', [AdminController::class, 'deleteproduct']);
    Route::get('/updateview/{id}', [AdminController::class, 'updateview']);
    Route::post('/updateproduct/{id}', [AdminController::class, 'updateproduct']);
    Route::get('/showorder', [AdminController::class, 'allorders'])->name('showorder');
    //Route::get('/confirmstatus/{id}', [AdminController::class, 'confirmstatus']);
    //Route::get('/cancelstatus/{id}', [AdminController::class, 'cancelstatus']); 
    Route::get('/details/{id?}', [AdminController::class, 'detail'])->name('detail');
    Route::get('confirmstatus/{id}', [AdminController::class, 'confirmStatus'])->name('confirmstatus');
    Route::get('cancelstatus/{id}', [AdminController::class, 'cancelStatus'])->name('cancelstatus');
});





//Route::post('/addcart/{id}', [CartController::class, 'addcart']);

//Route::get('/showcart', [CartController::class, 'showcart'])->name('showcart');;

//Route::get('/delete/{id}', [CartController::class, 'deletecart']);

//Route::post('/order', [CartController::class, 'confirmorder']);



Route::get('/search', [HomeController::class, 'search']);
Route::get('/showcategories', [HomeController::class, 'showcategories'])->name('showcategories');
Route::get('/category/{id}', [HomeController::class, 'category'])->name('category');
Route::get('/category/product/{id?}', [HomeController::class, 'product'])->name('product');




Route::get('/showcart', [CartController::class, 'showcart'])->name('showcart')->middleware('auth');
Route::post('showcart/add/{product}', [CartController::class, 'addToCart'])->name('addToCart');
Route::post('/showcart/checkout', [CartController::class, 'checkout'])->name('cartcheckout');
Route::delete('/showcart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cartremove');
Route::patch('/cart/{id}/increase', [CartController::class, 'increaseQuantity'])->name('cartincrease');
Route::patch('/cart/{id}/decrease', [CartController::class, 'decreaseQuantity'])->name('cartdecrease');




Route::get('orders', [OrderController::class, 'orders'])->name('orders')->middleware('auth');
Route::get('/orders/{order}', [OrderController::class, 'detailorders'])->name('detailorders')->middleware('auth');




