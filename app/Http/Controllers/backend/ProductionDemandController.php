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
        return view('backend.modules.productionDemand.productionDemand', compact('title', 'products', 'demands'));
    }

    public function createDemand(Request $request)
    {
        Demand::create([
            'product_id' => $request->product_id,
            'product_quantity' => $request->product_quantity,
            'delivery_date' => $request->delivery_date,
            'status' => $request->status
        ]);
        return redirect()->back();
    }

    public function changeStatus($id, $status)
    {
        $demands = Demand::find($id);
        $demands->update(['status' => $status]);

        if ($status == 'confirm')
            return redirect('/admin/productionDemand');
        else
            return redirect()->back();
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
        $products = Product::where('id', $demands->product_id)->first();

        $workers = Worker::all();
        $workstations = Workstation::where('status', 'available')->get();

        $material_need = $demands->product_quantity / $products->productMaterial->product_per_kg;

        return view(
            'backend.modules.productionDemand.waitForConfirm',
            compact('title', 'demands', 'products', 'workers', 'workstations','material_need')
        );
    }
}
