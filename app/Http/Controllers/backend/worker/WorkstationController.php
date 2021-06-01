<?php

namespace App\Http\Controllers\backend\worker;

use App\Http\Controllers\Controller;
use App\Models\Manufacturing;
use App\Models\Workstation;
use App\Models\WorkstationRepair;
use Illuminate\Http\Request;

class WorkstationController extends Controller
{
    public function showWorkstation()
    {
        $title='Workstation Status';
        // $workstations = Workstation::all();
        $workstations = Manufacturing::where('worker_id', auth()->user()->userProfile->id)->get();
        // dd($workstations);
        return view('backend.workerModules.workstation.workstation', compact('title', 'workstations'));
    }
    public function repairWorkstation($id)
    {
        $ws = Workstation::find($id);
        $ws->update([
            'status'=> 'occupied'
        ]);
        $mo = Manufacturing::where('worker_id', auth()->user()->userProfile->id)
            ->where('workstation_id', $id)
            ->where('status', 'Production paused')
            ->first();
        $mo->update([
                'status'=>'In Production'
            ]);

        $ws_repair = WorkstationRepair::where('workstation_id', $id)->first();
        $ws_repair->delete();

        return redirect()->back()->with('success', ' Workstation is reported successfully repaired by the technician. ');
    }
}
