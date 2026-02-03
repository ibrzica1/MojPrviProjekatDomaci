<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/about','about');

Route::view('/shop','shop');

Route::view('/contact','contact');