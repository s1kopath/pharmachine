<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Demand;
use App\Models\Manufacturing;
use App\Models\Material;
use App\Models\Product;
use App\Models\Warehouse;
use App\Models\Worker;
use App\Models\Workstation;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function sch(){
        $title = 'Dashboard';
        $countDemand = Demand::all()->count();
        $countProduct = Product::all()->count();
        $countOrder = Manufacturing::all()->count();
        $countWorker = Worker::all()->count();
        $countActiveWorker = Worker::where('status','Unavailable')->count();
        $countWorkstation = Workstation::all()->count();
        $countActiveWorkstation = Workstation::where('status','occupied')->count();
        $countMaterial = Material::where('available_quantity','<',20)->count();
        $countReadyShipment = Manufacturing::where('status','Ready for shipment')->count();
        // dd($countMaterial);
        return view('backend.components.schedule',compact(
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
