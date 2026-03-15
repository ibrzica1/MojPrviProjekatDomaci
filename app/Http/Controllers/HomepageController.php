<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Repositories\ProductRepository;

class HomepageController extends Controller
{
    private $productRepo;

    public function __construct()
    {
        $this->productRepo = new ProductRepository();
    }

    public function index()
    {
        $newestProducts = $this->productRepo->getLatestProducts();
        return view('welcome', compact('newestProducts'));
    }
}
