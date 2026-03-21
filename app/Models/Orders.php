<?php

namespace App\Models;

use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Orders extends Model
{
    protected $fillable = [
        'user_id','status','price',
    ];

    public static function orderTotalPrice()
    {
        $total = 0;
        $products = Session::get('products');
        $productRepo = new ProductRepository();

        foreach($products as $product)
        {
            $total += $productRepo->calculateTotal($product['product']['id'],$product['amount']);
        }
        
        return $total;
    }
}
