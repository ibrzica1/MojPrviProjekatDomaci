<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartAddRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    private $productRepo;

    public function __construct()
    {
        $productRepo = new ProductRepository();
    }

    public function cartPage()
    {
        $products = Session::get('products');
        return view('cartPage', compact('products'));
    }

    public function addToCart(CartAddRequest $request)
    {
        $productId = $request->id;
        $amount = $request->amount;
        $productRepo = new ProductRepository();

        $product = $productRepo->findProductById($productId);
        if(!$productRepo->checkAmount($productId,$amount)){
            return redirect()->route('product.page',['product'=>$productId])
            ->with('error','Amount is too big');
        }
        $total = $productRepo->calculateTotal($productId,$amount);

        Session::forget('products');
        Session::push('products',[
            'product' => $product,
            'amount' => $amount,
            'total' => $total
        ]);
        return redirect()->route('cart.page');
    }
}
