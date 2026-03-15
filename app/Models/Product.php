<?php

namespace App\Models;

use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name','description','amount','price','image'
    ];
}