<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Demand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductionDemandController extends Controller
{
    public function pd(){
        $title = 'Product Demand';
        $products = Product::all();
        $demands = Demand::all();
        return view('backend.modules.productionDemand.productionDemand', compact('title','products','demands'));
    }
    public function demoPd(){
        $title = 'Product Demand';
        $products = Product::all();
        return view('backend.modules.productionDemand.demoDemand', compact('title','products'));
    }
    public function createDemand(Request $request)
    {
        Demand::create([
            'product_id' => $request -> product_id,
            'product_quantity' => $request -> product_quantity,
            'delivery_date' => $request -> delivery_date,
            'status' => $request -> status
        ]);
        return redirect() -> back();
    }
}
