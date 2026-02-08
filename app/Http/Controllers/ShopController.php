<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        $allProducts = Product::all();
        return view('shop', compact('allProducts'));
    }

    public function addProductPage()
    {
        return view("addProduct");
    }

    public function addProductPage(Request $request)
    {
        
    }

}
