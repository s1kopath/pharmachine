<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Demand;
use App\Models\Manufacturing;
use App\Models\Material;
use App\Models\Product;
use App\Models\Worker;
use App\Models\Workstation;
use Illuminate\Http\Request;

class ProductionPlanningController extends Controller
{
    public function pp(){
        $title = 'Production Planning';
        $orders = Manufacturing::all();
        return view('backend.modules.productionPlanning.productionPlanning', compact('title','orders'));
    }


    public function createForm($id){
        $demand=Demand::find($id);

        $products = Product::all();
        $workstations = Workstation::all();
        $materials = Material::where('id',$demand->demandProduct->productMaterial->id)->get();
        $workers = Worker::all();
        $title = 'Manufacturing Order';

        return view('backend.modules.productionPlanning.manufacturingOrder',
        compact('title', 'products', 'workstations', 'materials', 'workers','demand'));
    }

    public function createManufacturingOrder(Request $request){
        Manufacturing::create([
            'manufacturing_number' => $request -> manufacturing_number,
            'warehouse_number' => $request -> warehouse_number,
            'product_id' => $request -> product_id,
            'quantity' => $request -> quantity,
            'material_id' => $request -> material_id,
            'material_quantity' => $request -> material_quantity,
            'worker_id' => $request -> worker_id,
            'workstation_id' => $request -> workstation_id,
            'start_date' => $request -> start_date,
            'finishing_date' => $request -> finishing_date,
            'delivery_date' => $request -> delivery_date,
            'total_cost' => $request -> total_cost
        ]);
        return redirect()->route('pp.dashboard');
    }
}
