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

    
}