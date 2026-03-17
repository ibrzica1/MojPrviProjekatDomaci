<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        dd($request->all());
    }
}
