<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Demand;
use App\Models\Manufacturing;
use App\Models\Product;
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
        $countWorkstation = Workstation::all()->count();
        // dd($countWorkstation);
        return view('backend.components.schedule',compact(
            'title',
            'countDemand',
            'countProduct',
            'countOrder',
            'countWorker',
            'countWorkstation'
        ));
    }
}
