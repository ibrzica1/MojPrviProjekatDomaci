<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomepageController::class,'index']);
/* Route::get('/', function () {
    return view('welcome');
}); */

Route::view('/about','about');

Route::get('/shop',[ShopController::class,'index']);
//Route::view('/shop','shop');

Route::get('/contact',[ContactController::class,'index']);
// Route::view('/contact','contact');

Route::get('/admin/all-contacts',[ContactController::class,'allContacts']);
Route::get('/admin/all-products', [ProductController::class, 'index'])
->name('allProducts');
Route::get('/admin/delete-product/{product}', [ProductController::class, 'delete'])
->name("productDelete");
Route::get('/admin/delete-contact/{contact}', [ContactController::class, 'delete'])
->name("contactDelete");

Route::post('/send-contact',[ContactController::class,'sendContact']);

Route::get('/admin/add-product',[ShopController::class,'addProductPage']);
Route::post('/add__product',[ShopController::class,'addProduct'])
->name("productSave");

Route::get('/admin/products',[ShopController::class,'allProducts']);