<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Models\Material;
use App\Models\Product;
use App\Models\Worker;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class ApiController extends Controller
{

    public function calculate($id){


        $products = Product::where('material_id', $id)->first();
        $demands = Demand::where('product_id',$products->id)->first();



        $material_need = $demands->product_quantity / $products->productMaterial->product_per_kg;



        // return [
        //     'id'=>$material_need,
        //     'name' => 'Jon doe',
        // ];

        return response()->json([
            'data'=>$material_need
        ]);

    }

    public function calculateCost($id)
    {
        $worker = Worker::find($id)->labour_per_hour;

        // return $id;
        return response()->json([
            'data'=> $worker
        ]);
    }
}
