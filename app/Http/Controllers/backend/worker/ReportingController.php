<?php

namespace App\Http\Controllers\backend\worker;

use App\Http\Controllers\Controller;
use App\Models\Demand;
use App\Models\Manufacturing;
use App\Models\Worker;
use App\Models\Workstation;
use App\Models\WorkstationRepair;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportingController extends Controller
{
    public function showReporting()
    {
        $title='Production Reporting';
        $orders = Manufacturing::where('worker_id', auth()->user()->userProfile->id)
        ->orderBy('id', 'desc')->get();
        return view('backend.workerModules.productionReport.productionReport', compact('title', 'orders'));
    }

    public function productionUpdate($id, $demand_id, $status, $demandStatus)
    {

        $mo = Manufacturing::find($id);
        if ($mo->start_date > Carbon::now()) {
            return redirect()->back()->with('error', 'you can not start production before '.$mo->start_date);
        }
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

        return redirect()->back()->with('success', 'Order '.$status);
    }

    public function damageReport(Request $request, $id)
    {
        $mo = Manufacturing::find($id);
        $mo->update([
            'status'=>'Production paused'
        ]);
        WorkstationRepair::create([
            'manufacturing_id'=>$mo->id,
            'worker_id' => $mo->worker_id,
            'workstation_id' => $mo->workstation_id,
            'note' => $request->note,
        ]);
        Workstation::find($mo->workstation_id)->update([
            'status' => 'Workstation damaged'
        ]);
        return redirect()->back()->with('danger', 'Workstation reported damaged.');
    }
}
