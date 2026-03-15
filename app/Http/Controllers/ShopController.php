<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules\File;
use App\Http\Controllers\Controller;
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

    public function addProduct(Request $request)
    {
        $request->validate([
            "name" => "required|string|min:2|max:50|unique:products,name",
            "description" => "required|string|min:2|max:150",
            "amount" => "required|int",
            "price" => "required|between:0,99.99",
            "image" => "required",
            File::types(['jpg','jpeg','png','gif'])
            ->min(1024)
            ->max(12 * 1024),
        ]);

        $this->productRepo->createNew($request);

        return redirect()->route('allProducts');
    }

    public function allProducts()
    {
        $allProducts = Product::all();
        return view('adminProducts', compact('allProducts'));
    }

}
