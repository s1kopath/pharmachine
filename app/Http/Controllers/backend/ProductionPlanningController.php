<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\Product;
use App\Models\Worker;
use App\Models\Workstation;
use Illuminate\Http\Request;

class ProductionPlanningController extends Controller
{
    public function pp(){
        $title = 'Production Planning';
        return view('backend.modules.productionPlanning.productionPlanning', compact('title'));
    }
    public function createForm(){

        $products = Product::all();
        $workstations = Workstation::all();
        $materials = Material::all();
        $workers = Worker::all();
        $title = 'Manufacturing Order';

        return view('backend.modules.productionPlanning.manufacturingOrder',
        compact('title', 'products', 'workstations', 'materials', 'workers'));
    }
}
