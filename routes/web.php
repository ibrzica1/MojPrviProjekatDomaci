<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
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