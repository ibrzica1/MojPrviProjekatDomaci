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
}