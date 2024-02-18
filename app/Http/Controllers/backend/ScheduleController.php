<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Demand;
use App\Models\Manufacturing;
use App\Models\Material;
use App\Models\Product;
use App\Models\Worker;
use App\Models\Workstation;

class ScheduleController extends Controller
{
    public function sch()
    {
        $title = 'Dashboard';
        $countDemand = Demand::all()->count();
        $countProduct = Product::all()->count();
        $countOrder = Manufacturing::all()->count();
        $countWorker = Worker::all()->count();
        $countActiveWorker = Worker::where('status', 'Unavailable')->count();
        $countWorkstation = Workstation::all()->count();
        $countActiveWorkstation = Workstation::where('status', 'occupied')->count();
        $countMaterial = Material::where('available_quantity', '<=', 10)->count();
        $countReadyShipment = Manufacturing::all()->sum('total_cost');
        // dd($countMaterial);
        return view('backend.components.schedule', compact(
            'title',
            'countDemand',
            'countProduct',
            'countOrder',
            'countWorker',
            'countActiveWorker',
            'countWorkstation',
            'countActiveWorkstation',
            'countMaterial',
            'countReadyShipment'
        ));
    }
}
