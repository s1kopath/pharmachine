<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Demand;
use App\Models\Product;
use App\Models\Worker;
use App\Models\Workstation;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class ProductionDemandController extends Controller
{
    public function pd()
    {
        $title = 'Product Demand';
        $products = Product::all();
        $demands = Demand::all();
        $received = $demands->where('status','pending')->count();
        $waitingForConfirm = $demands->where('status','processing')->count();
        $confirmed = $demands->where('status','confirm')->count();
        $waitingForProduction = $demands->where('status','producing')->count();
        $inProduction = $demands->where('status','produced')->count();
        $readyForShipment = $demands->where('status','deliver')->count();
        // dd($received);

        return view('backend.modules.productionDemand.productionDemand', compact(
            'title',
            'products',
            'demands',
            'received',
            'waitingForConfirm',
            'confirmed',
            'waitingForProduction',
            'inProduction',
            'readyForShipment'
        ));
    }

    public function createDemand(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'product_quantity' => 'required|gt:0',
            'delivery_date' => 'required',
        ]);

        Demand::create([
            'product_id' => $request->product_id,
            'product_quantity' => $request->product_quantity,
            'delivery_date' => $request->delivery_date,
            'status' => 'pending'
        ]);
        return redirect()->back();
    }

    public function changeStatus($id, $status)
    {
        $demands = Demand::find($id);
        $demands->update(['status' => $status]);

        if ($status == 'confirm') {
            return redirect('/admin/productionDemand');
        } else {
            return redirect()->back();
        }
    }

    public function deleteStatus($id)
    {
        $demands = Demand::find($id);

        $demands->delete();
        return redirect()->back();
    }


    public function waitForConfirm($id)
    {
        $title = 'Wait for Confirmation';
        $demands = Demand::find($id);
        // for getting the first element in the Product table
        $products = Product::find($demands->product_id);

        $workers = Worker::all();
        $workstations = Workstation::all();


        $material_need = $demands->product_quantity / $products->productMaterial->product_per_kg;

        return view(
            'backend.modules.productionDemand.waitForConfirm',
            compact('title', 'demands', 'products', 'workers', 'workstations', 'material_need')
        );
    }
}
