<?php

namespace App\Repositories;

use App\Models\OrderItems;

class OrderItemsRepository
{
    private $orderItemsModel;

    public function __construct()
    {
        $this->orderItemsModel = new OrderItems();
    }

    public function addOrderItem(int $orderId,int $amount,int $productId,float $price): void
    {
        $this->orderItemsModel->create([
            "order_id" => $orderId,
            "amount" => $amount,
            "product_id" => $productId,
            "price" => $price
        ]);
    }
}