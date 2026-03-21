<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminCheckMiddleware;
use App\Http\Middleware\TestMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/',[HomepageController::class,'index'])
    ->name('home');
Route::view('/about','about')
    ->name('about');
Route::get('/shop',[ShopController::class,'index'])
    ->name('shop');
Route::get('/contact',[ContactController::class,'index'])
    ->name('contact');

Route::middleware(['auth',AdminCheckMiddleware::class])->prefix('admin')->group(function() {

    Route::controller(ContactController::class)->prefix('/contact')->group(function() {

        Route::name('contact.')->group(function() {
            Route::get('/all','allContacts')->name('all');
            Route::post('/send','sendContact')->name('add');
            Route::get('/edit/{contactId}','editContactPage')->name('change.page');
            Route::patch('/change/{contact}','editContact')->name('change');
            Route::get('/delete/{contact}','delete')->name("delete");
        });
    });
    
    Route::controller(ProductController::class)->prefix('/product')->group(function() {

        Route::name('product.')->group(function() {
            Route::get('/all','index')->middleware('auth')->name('all');
            Route::get('/delete/{product}','delete')->name("delete");
            Route::get('/edit/{product}','editProductPage')->name('change.page');
            Route::patch('/change/{product}','editProduct')->name('change');
        });
    });
    
    Route::controller(ShopController::class)->group(function() {

        Route::name('product.')->group(function() {
            Route::get('/add-product','addProductPage')->name('add.page');
            Route::post('/add_product','addProduct')->name("save");
            Route::get('/products','allProducts')->name('shop.all');
            Route::get('/product/{product}', 'productPage')->name('page');
        });
    });

    Route::controller(CartController::class)
    ->name('cart.')->prefix('/cart')->group(function() {
        Route::get('/page', 'cartPage')->name('page');
        Route::post('/add', 'addToCart')->name('add');
    });

    
});