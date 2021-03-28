<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function product(){
        $products = Product::all();
        return view('backend.modules.product.product', compact('products'));
    }
    public function create(Request $request){
        Product::create([
            'name' => $request -> name,
            'product_type' => $request -> product_type,
            'description' => $request -> description,
            'image' => $request -> image
        ]);
        return redirect() -> back();
    }
}
