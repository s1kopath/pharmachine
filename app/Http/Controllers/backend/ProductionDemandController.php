<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductionDemandController extends Controller
{
    public function pd(){
        $title = 'Product Demand';
        return view('backend.modules.productionDemand.productionDemand', compact('title'));
    }
}
