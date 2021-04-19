<?php

namespace App\Http\Controllers\backend\worker;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProduct()
    {
        $title='List of available products';
        $products=Product::all();
        return view('backend.workerModules.product.product',compact('title','products'));
    }
}
