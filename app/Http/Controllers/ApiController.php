<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Models\Material;
use App\Models\Product;
use App\Models\Worker;
use App\Models\Workstation;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class ApiController extends Controller
{

    public function calculate($id){


        $products = Product::where('material_id', $id)->first();
        $demands = Demand::where('product_id',$products->id)->first();



        $material_need = $demands->product_quantity / $products->productMaterial->product_per_kg;
        $material_cost = $products->productMaterial->product_price_per_kg * $material_need;



        // return [
        //     'id'=>$material_need,
        //     'name' => 'Jon doe',
        // ];

        return response()->json([
            'data'=>$material_need,
            'cost'=>$material_cost
        ]);
    }

    public function calculateCost($id)
    {
        $worker = Worker::find($id)->labour_per_hour;

        // return $id;
        return response()->json([
            'id'=> $worker
        ]);
    }


    public function calculateTime(Request $request ,$id)
    {
        $demand_id = $request->query('demand_id');
        $demand = Demand::where('id',$demand_id)->first();
        $demandQuantity = $demand -> product_quantity;

        $workstation = Workstation::find($id)->output;
        $time = ceil(((1 / $workstation) * $demandQuantity) / 420) ;


        // return $id;


        return response()->json([
            // 'data'=> $time,
            'id'=>$time
        ]);
    }


    public function calculateOvertime($id){
        return $id;
    }
}
