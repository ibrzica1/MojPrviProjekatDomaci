<?php

namespace App\Repositories;

use App\Models\Orders;
use Illuminate\Support\Facades\DB;

class OrderRepository
{
    private $orderModel;

    public function __construct()
    {
        $this->orderModel = new Orders();
    }

    public function createOrder(int $userId,string $status,float $price): int
    {
        $orderId = DB::table('orders')->insertGetId([
            "user_id" => $userId,
            "status" => $status,
            "price" => $price
        ]);
        return $orderId;
    }
}