<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Demand;
use App\Models\Manufacturing;
use App\Models\Material;
use App\Models\Product;
use App\Models\Warehouse;
use App\Models\Worker;
use App\Models\Workstation;
use Illuminate\Http\Request;

class ProductionPlanningController extends Controller
{
    public function pp()
    {
        $title = 'Production Planning';
        $orders = Manufacturing::all();
        return view('backend.modules.productionPlanning.productionPlanning', compact('title', 'orders'));
    }


    public function createForm($id)
    {
        $demand = Demand::find($id);
        $products = Product::all();
        $workstations = Workstation::where('status', 'available')->get();
        $materials = Material::where('id', $demand->demandProduct->productMaterial->id)->get();
        $workers = Worker::where('status','Available')->get();
        $title = 'Manufacturing Order';

        return view(
            'backend.modules.productionPlanning.manufacturingOrder',
            compact('title', 'products', 'workstations', 'materials', 'workers', 'demand')
        );
    }

    public function createManufacturingOrder(Request $request)
    {
        $mo = Manufacturing::create([
            'demand_id' => $request->demand_id,
            'manufacturing_number' => $request->manufacturing_number,
            'warehouse_number' => $request->warehouse_number,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'material_id' => $request->material_id,
            'material_quantity' => $request->material_quantity,
            'worker_id' => $request->worker_id,
            'workstation_id' => $request->workstation_id,
            'start_date' => $request->start_date,
            'finishing_date' => $request->finishing_date,
            'delivery_date' => $request->delivery_date,
            'total_cost' => $request->total_cost
        ]);
        Warehouse::create([
            'manufacturing_id' => $mo->id
        ]);


        $material = Material::find($mo->material_id);
        $quantity = $material->available_quantity - $mo -> material_quantity;
        $material -> update([
            'available_quantity' => $quantity,
        ]);

        Workstation::find($mo->workstation_id)->update([
            'status' => 'occupied'
        ]);

        Demand::find($request->demand_id)->update([
            'status' => 'producing'
        ]);
        Worker::find($mo->worker_id)->update([
            'status'=>'Unavailable'
        ]);



        return redirect()->route('pp.dashboard')->with('success','Manufacturing order created successfully.');
    }
}
