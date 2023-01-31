<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        $product = new Product();
        $product->name = 'apple';
        $product->price = 1.99;
        $product->save();

        dd($product);
    }
}
