<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomepageController extends Controller
{
    public function index()
    {
        $newestProducts = Product::latest()->take(6)->get();
        return view('welcome', compact('newestProducts'));
    }
}
