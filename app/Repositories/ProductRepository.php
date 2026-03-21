<?php

namespace App\Repositories;

use App\Models\Product;
use Error;

class ProductRepository
{
    private $productsModel;

    public function __construct()
    {
        $this->productsModel = new Product();
    }

    public function createNew($request)
    {
        $this->productsModel->create([
            "name" => $request->get('name'),
            "description" => $request->get('description'),
            "amount" => $request->get('amount'),
            "price" => $request->get('price'),
            "image" => $request->get('image')
        ]);
    }

    public function findProductById($productId)
    {
        return Product::where(["id" => $productId])->first();
    }

    public function updateProduct($request,$product)
    {
         $product->update([
            "name" => $request->get('name'),
            "description" => $request->get('description'),
            "amount" => $request->get('amount'),
            "price" => $request->get('price'),
            "image" => $request->get('image')
        ]);
    }

    public function getLatestProducts()
    {
        return Product::latest()->take(6)->get();
    }

    public function checkAmount(int $productId,int $amount): bool
    {
        $product = Product::where(["id" => $productId])->first();
        
        if($product->amount < $amount){
            return false;
        }
        return true;
    }

    public function calculateTotal(int $productId,int $amount)
    {
        $product = Product::where(["id" => $productId])->first();
        return $product->price * $amount;
    }

    public function reduceAmount(int $productId, int $amount): void
    {
        $product = Product::where(["id" => $productId])->first();
        $newAmount = $product->amount - $amount;
        dd($newAmount);
    }

}