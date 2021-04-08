<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function product(){
        $title = 'List of all Products';
        $products = Product::all();
        return view('backend.modules.product.product', compact('products','title'));
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


    public function delete($id){
        $products=Product::find($id);
        $products->delete();
        return redirect()->back();
    }


    public function update($id){
        $products = Product::find($id);
        $title = 'Update '.$products['name'];
        return view('backend.modules.product.productUpdate', compact('products','title'));
    }


    public function saveUpdate(Request $request){
        $products = Product::find($request -> id);

        $products -> name = $request->name;
        $products -> product_type = $request->product_type;
        $products -> description = $request->description;
        $products -> image = $request->image;
        $products -> save();
        return redirect()->route('product.list');
    }
}
