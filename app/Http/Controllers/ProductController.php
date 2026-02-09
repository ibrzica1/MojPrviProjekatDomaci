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
}
