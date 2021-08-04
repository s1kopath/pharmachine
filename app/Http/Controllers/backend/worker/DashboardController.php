<?php

namespace App\Http\Controllers\Backend\Worker;

use App\Http\Controllers\Controller;
use App\Models\Manufacturing;
use App\Models\Material;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show()
    {
        $title='Dashboard';
        return view('backend.workerModules.workerDashboard',compact('title'));
    }
    public function home()
    {
        $title='Dashboard';
        $mo_count = Manufacturing::where('worker_id', auth()->user()->userProfile->id)
            ->where('status', 'Waiting for production')
            ->count();
        $wh_stock = Product::all()->count();
        $pending_delivery = Manufacturing::where('worker_id', auth()->user()->userProfile->id)
            ->where('status','Ready for shipment')
            ->count();
        $m_order = Material::where('status','Ordered')
            ->count();
        return view('backend.workerComponents.dashHome',compact('title','mo_count','wh_stock','pending_delivery','m_order'));
    }
}
