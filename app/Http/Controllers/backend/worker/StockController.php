<?php

namespace App\Http\Controllers\backend\worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function showStock()
    {
        $title='Warehouse Stock Status';
        return view('backend.workerModules.stock.stock',compact('title'));
    }
}
