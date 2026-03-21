<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Repositories\OrderItemsRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    private $orderRepo;

    public function __construct()
    {
        $this->orderRepo = new OrderRepository();
    }

    public function addOrder()
    {
        $productRepo = new ProductRepository();
        $orderItemRepo = new OrderItemsRepository();
        $orderItems = Session::get('products');
        
        foreach($orderItems as $orderItem)
        {
            if(!$productRepo->checkAmount($orderItem['product']['id'],$orderItem['amount'])){
                return redirect()->back()->with('error',
                `Product: {$orderItem['product']['name']} doesnt have enough items in stock`);
            }
            $productRepo->reduceAmount($orderItem['product']['id'],$orderItem['amount']);
        }

        $totalOrderPrice = Orders::orderTotalPrice();
        $userId = Auth::id();
        $status = "ordered";
        $orderId = $this->orderRepo->createOrder($userId,$status,$totalOrderPrice);
        
        foreach($orderItems as $orderItem)
        {
            $totalItemPrice = OrderItems::calculateItemTotal($orderItem['product']['price'],$orderItem['amount']);
            $orderItemRepo->addOrderItem($orderId,$orderItem['amount'],$orderItem['product']['id'],$totalItemPrice);
        }
        Session::forget('products');

        return redirect()->route('home');
    }

}
