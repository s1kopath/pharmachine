<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Machine;
use Illuminate\Http\Request;

class WorkstationController extends Controller
{
    public function ws(){
        $title = 'Available Workstation';
        $machines = Machine::all();
        return view('backend.modules.workstation.workstation', compact('machines','title'));
    }
    public function createMachine(Request $request){
        Machine::create([
            'name' => $request -> name,
            'description' => $request -> description,
            'manufacturer' => $request -> manufacturer,
            'output' => $request -> output
        ]);
        return redirect() -> back();

    }
}
