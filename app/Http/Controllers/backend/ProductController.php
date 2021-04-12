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
    public function listView(){
        $title = 'List of all Products';
        $products = Product::all();
        return view('backend.modules.product.productListView', compact('products','title'));
    }
    public function gridView(){
        $title = 'List of all Products';
        $products = Product::all();
        return view('backend.modules.product.productGridView', compact('products','title'));
    }


    public function create(Request $request){
        $file_name='';
        //check if $request has file
        if($request -> hasFile('product_image')){
            //check if file is valid or not
            $file = $request -> file('product_image');
            if($file -> isValid()){
                //generate unique file name
                $file_name = date('Ymdhms').'.'.$file -> getClientOriginalExtension();

                //store image in local directory
                $file -> storeAs('product',$file_name);
            }
        }

        Product::create([
            'name' => $request -> name,
            'product_type' => $request -> product_type,
            'description' => $request -> description,
            'image' => $file_name
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
        $products -> product_image = $request->product_image;
        $products -> save();
        return redirect()->route('product.list');
    }
}
