<?php

namespace App\Http\Controllers\backend\worker;

use App\Http\Controllers\Controller;
use App\Models\Demand;
use App\Models\Manufacturing;
use App\Models\Worker;
use App\Models\Workstation;
use Illuminate\Http\Request;

class ReportingController extends Controller
{
    public function showReporting()
    {
        $title='Production Reporting';
        $orders = Manufacturing::where('worker_id', auth()->user()->userProfile->id)->get();
        return view('backend.workerModules.productionReport.productionReport', compact('title', 'orders'));
    }

    public function productionUpdate($id, $demand_id, $status, $demandStatus)
    {
        $mo = Manufacturing::find($id);
        $mo->update([
            'status'=>$status]);

        Demand::find($demand_id)->update([
            'status' => $demandStatus]);

        if ($status == 'Ready for shipment') {
            Workstation::find($mo->workstation_id)->update([
                    'status' => 'available'
                ]);
                Worker::find($mo->worker_id)->update([
                    'status'=>'Available'
                ]);
        }

        return redirect()->back()->with('success','Order '.$status);
    }
}
