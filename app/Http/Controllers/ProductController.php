<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveProductRequest;
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

    public function editProduct(SaveProductRequest $request, Product $product)
    {
       $this->productRepo->updateProduct($request,$product);

        return redirect()->route('allProducts');
    }
}
