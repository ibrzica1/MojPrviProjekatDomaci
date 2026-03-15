<?php

namespace App\Repositories;

use App\Models\Product;

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

    public function find($productId)
    {
        return Product::where(["id" => $productId])->first();
    }
}