<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Manufacturing;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function sto(){
        $title = 'Warehouse Stock';
        $stock = Warehouse::all();
        return view('backend.modules.stock.stock', compact('title','stock'));
    }
}
