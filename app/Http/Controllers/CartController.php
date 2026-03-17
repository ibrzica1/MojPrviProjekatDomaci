<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartAddRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cartPage()
    {
        $products = Session::get('product');
        return view('cartPage', compact('products'));
    }

    public function addToCart(CartAddRequest $request)
    {
        Session::put('product',[
            $request->id => $request->amount
        ]);
        return redirect()->route('cart.page');
    }
}
