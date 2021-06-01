<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Manufacturing;
use App\Models\Warehouse;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function sto(){
        $title = 'Warehouse Stock';
        $stock = Warehouse::all();
        return view('backend.modules.stock.stock', compact('title','stock'));
    }
    public function checkStockRecord($id)
    {
        $stock = Warehouse::find($id);
        $menu_order = Manufacturing::find($stock->manufacturing_id);
        $title = $menu_order->status;
        $time = date('d-M-Y', strtotime( Carbon::now()));
        // dd($menu_order);
        return view('backend.modules.stock.stockStatus', compact('title','time','stock','menu_order'));
    }
    public function deleteStock($id)
    {
        Warehouse::find($id)->delete();
        return redirect()->back()->with('error', 'Workstation removed successfully.');
    }
}
