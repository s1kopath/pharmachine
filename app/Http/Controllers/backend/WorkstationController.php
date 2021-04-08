<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Worker;
use Illuminate\Http\Request;
use App\Models\Workstation;

class WorkstationController extends Controller
{
    public function ws(){
        $title = 'Available Workstation';
        $workstations = Workstation::all();
        return view('backend.modules.workstation.workstation', compact('title','workstations'));
    }


    public function createWorkstation(Request $request){
        Workstation::create([
            'name' => $request -> name,
            'description' => $request -> description,
            'manufacturer' => $request -> manufacturer,
            'output' => $request -> output,
            'status' => $request -> status

        ]);
        return redirect()->back();
    }
}
