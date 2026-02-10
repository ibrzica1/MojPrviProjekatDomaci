<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $allProducts = Product::all();
        return view("allProducts", compact('allProducts'));
    }

    public function delete($product)
    {
        $singleProduct = Product::where(["id" => $product])->first();
        if($singleProduct === null){
            die("This product doesnt exist");
        }

        $singleProduct->delete();

        return redirect()->back();
    }

    public function editProductPage($productId)
    {
        $singleProduct = Product::where(["id" => $productId])->first();
        if($singleProduct === null){
            die("This product doesnt exist");
        }

        return view("editProduct",compact('singleProduct'));
    }

    public function editProduct(Request $request, $productId)
    {
        $request->validate([
            "name" => "required|string|min:2|max:50|unique:products,name",
            "description" => "required|string|min:2|max:150",
            "amount" => "required|int",
            "price" => "required|between:0,99.99",
            "image" => "required"
        ]);

        Product::find($productId)->update([
            "name" => $request->get('name'),
            "description" => $request->get('description'),
            "amount" => $request->get('amount'),
            "price" => $request->get('price'),
            "image" => $request->get('image')
        ]);

        return redirect()->route('allProducts');
    }
}
