<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function displayProduct()
    {
        return view('products', [
            'name' => 'batai',
            'price' => number_format(12, 2)
        ]);
    }
}
