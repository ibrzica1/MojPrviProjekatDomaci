<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepo;

    public function __construct()
    {
        $this->productRepo = new ProductRepository();
    }

    public function index()
    {
        $allProducts = Product::all();
        return view("allProducts", compact('allProducts'));
    }

    public function delete($product)
    {
        $singleProduct = $this->productRepo->findProductById($product);

        if($singleProduct === null){
            die("This product doesnt exist");
        }

        $singleProduct->delete();

        return redirect()->back();
    }

    public function editProductPage(Product $product)
    {
        return view("editProduct",compact('product'));
    }

    public function editProduct(Request $request, Product $product)
    {
        $request->validate([
            "name" => "required|string|min:2|max:50|unique:products,name",
            "description" => "required|string|min:2|max:150",
            "amount" => "required|int",
            "price" => "required|between:0,99.99",
            "image" => "required"
        ]);

       $this->productRepo->updateProduct($request,$product);

        return redirect()->route('allProducts');
    }
}
