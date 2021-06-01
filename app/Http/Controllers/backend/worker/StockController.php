<?php

namespace App\Http\Controllers\backend\worker;

use App\Http\Controllers\Controller;
use App\Models\Demand;
use App\Models\Manufacturing;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function showStock()
    {
        $title='Warehouse Stock Status';
        $stock = Warehouse::orderBy('status','desc')->get();
        return view('backend.workerModules.stock.stock', compact('title', 'stock'));
    }
    public function deliver($id)
    {
        $ws = Warehouse::find($id);
        $ws->update([
            'status'=> 'Delivered',
            'user_name' => auth()-> user()-> name,
            'delivered_on' => date("Y-m-d")
        ]);
        Manufacturing::find($ws->manufacturing_id)->update([
            'status'=> 'Delivered'
        ]);

        Demand::find($ws->stockManufacturing->demand_id)->delete();



        return redirect()->back()->with('success','Order delivered successfully.');
    }
}
