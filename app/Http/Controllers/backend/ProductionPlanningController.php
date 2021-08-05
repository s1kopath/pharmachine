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
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductionPlanningController extends Controller
{
    public function pp()
    {
        $title = 'Production Planning';
        $orders = Manufacturing::orderBy('id', 'DESC')->get();
        return view('backend.modules.productionPlanning.productionPlanning', compact('title', 'orders'));
    }


    public function createForm($id)
    {
        $demand = Demand::find($id);
        $products = Product::all();
        $workstations = Workstation::where('status','!=','Workstation damaged')->get();
        $materials = Material::where('id', $demand->demandProduct->productMaterial->id)->get();
        $workers = Worker::all();
        $title = 'Manufacturing Order';

        return view(
            'backend.modules.productionPlanning.manufacturingOrder',
            compact('title', 'products', 'workstations', 'materials', 'workers', 'demand')
        );
    }

    public function createManufacturingOrder(Request $request)
    {
        $request->validate([
            'material_quantity' => 'required|gt:0',
            'total_cost' => 'required|gt:0',
        ]);

        $productionWorker = Manufacturing::where('worker_id',$request->worker_id)
            ->whereIn('status',['In production', 'Waiting for production'])->get();
            foreach($productionWorker as $worker){
                if ($request->start_date >= $worker->start_date && $request->start_date <= $worker->finishing_date) {
                    return redirect()->back()->with('error', $worker->manufacturingWorker->workerUser->name.' is not available on that date !!');
                }
            }

        $productionWorkstation = Manufacturing::where('workstation_id',$request->workstation_id)
            ->whereIn('status',['In production', 'Waiting for production'])->get();
            foreach($productionWorkstation as $workstation){
                if ($request->start_date >= $workstation->start_date && $request->start_date <= $workstation->finishing_date) {
                    return redirect()->back()->with('error', $workstation->manufacturingWorkstation->name.' is not available on that date !!');
                }
            }

            // dd($request->all());


        try {
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
                'total_cost' => round($request->total_cost, 2)
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


        } catch (\Throwable $th) {
            return back()->with('error','Information missing.');
        }
    }


    public function checkProductionStatus($id)
    {
        $menu_order = Manufacturing::find($id);
        $title = $menu_order->status;
        $time = date('d-M-Y', strtotime( Carbon::now()));
        // dd($menu_order);
        return view('backend.modules.productionPlanning.orderStatus', compact('title','time','menu_order'));
    }
    public function deleteProductionStatus($id)
    {
        $menu_order = Manufacturing::find($id);
        $warehouse = Warehouse::where('manufacturing_id',$menu_order->id)->first();
        try {
            $menu_order->delete();
            $warehouse->delete();
            return redirect()->back()->with('success','Record deleted successfully.');
        } catch (\Throwable $e) {
            if($e->getCode() == "23000"){
                return redirect()->back()->with('error', 'You can not delete this record, because other tables depends on it.');
            }
            return back();
        }
    }
}
