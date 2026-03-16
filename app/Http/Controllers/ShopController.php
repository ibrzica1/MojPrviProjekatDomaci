<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Repositories\ProductRepository;

class ShopController extends Controller
{

    private $productRepo;

    public function __construct()
    {
        $this->productRepo = new ProductRepository();
    }
    public function index()
    {
        $allProducts = Product::all();
        return view('shop', compact('allProducts'));
    }

    public function addProductPage()
    {
        return view("addProduct");
    }

    public function addProduct(SaveProductRequest $request)
    {
        $this->productRepo->createNew($request);
        return redirect()->route('product.shop.all');
    }

    public function allProducts()
    {
        $allProducts = Product::all();
        return view('adminProducts', compact('allProducts'));
    }

}
