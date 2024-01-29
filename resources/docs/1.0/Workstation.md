<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Mail\NotifyTechnician;
use App\Models\Manufacturing;
use Illuminate\Http\Request;
use App\Models\Workstation;
use App\Models\WorkstationRepair;
use Illuminate\Support\Facades\Mail;

class WorkstationController extends Controller
{
    public function ws()
    {
        $title = 'Available Workstation';
        $workstations = Workstation::all();
        $problem = WorkstationRepair::all();
        return view('backend.modules.workstation.workstation', compact('title', 'workstations','problem'));
    }


    public function createWorkstation(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'manufacturer'=>'required',
            'output'=>'required|gt:0',
        ]);
        Workstation::create([
            'name' => $request->name,
            'description' => $request->description,
            'manufacturer' => $request->manufacturer,
            'output' => $request->output,
            'status' => 'available'

        ]);
        return redirect()->back()->with('success','Workstation added successfully.');
    }


    public function completedUpdate( $id, $status)
    {
        $production_order = Manufacturing::where('workstation_id', $id)->whereIn('status',['in production','Waiting for production'])->first();
        if ($production_order) {
            return redirect()->back()->with('error', 'Workstation in Production');
        }
        $workstations= Workstation::find($id);
        $workstations->update(['status'=>$status]);

        return redirect()->back()->with('success', $workstations->name .' is '. $status.'.');
    }

    public function deleteWorkstation($id)
    {
        $workstation = Workstation::find($id);
        try {

            $workstation->delete();
            return redirect()->back()->with('error', 'Workstation removed successfully.');

        } catch (\Throwable $e) {
            if($e->getCode() == "23000"){
                return redirect()->back()->with('error', 'You can not delete the workstation, because other tables depends on it.');
            }
            return back();
        }
    }

    public function requestRepair($id)
    {
        $ws_u = Workstation::find($id)->update([
            'status'=> 'Waiting for repair'
        ]);
        $ws = Workstation::find($id);
        $ws_issue = WorkstationRepair::where('workstation_id',$id)->first();


        Mail::to('technician@gmail.com')->send(new NotifyTechnician($ws,$ws_issue));

        return redirect()->back()->with('success','Workstation is put on repair, the technician will soon be notified.');
    }
    public function searchWorkstation(Request $request)
    {
        // dd($request->all());
        $search = $request->input('search');
        $title = 'Available Workstation';
        $problem = WorkstationRepair::all();
        if($request->has('search')){
            $workstations = Workstation::where('name','like',"%{$search}%")->get();
        }else{
            $workstations = Workstation::all();
        }

        return view('backend.modules.workstation.workstation', compact('title', 'workstations','problem'));
    }
}
