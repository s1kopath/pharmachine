<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function sto(){
        $title = 'Warehouse Stock';
        return view('backend.modules.stock.stock', compact('title'));
    }
}
