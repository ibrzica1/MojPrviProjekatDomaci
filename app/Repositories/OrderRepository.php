<?php

namespace App\Repositories;

use App\Models\Orders;

class OrderRepository
{
    private $orderModel;

    public function __construct()
    {
        $this->orderModel = new Orders();
    }

    public function createOrder(int $userId,string $status,float $price): void
    {
        $this->orderModel->create([
            "user_id" => $userId,
            "status" => $status,
            "price" => $price
        ]);
    }
}