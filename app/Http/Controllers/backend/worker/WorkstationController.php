<?php

namespace App\Http\Controllers\backend\worker;

use App\Http\Controllers\Controller;
use App\Models\Workstation;
use Illuminate\Http\Request;

class WorkstationController extends Controller
{
    public function showWorkstation()
    {
        $title='Workstation Status';
        $workstations= Workstation::all();
        return view('backend.workerModules.workstation.workstation', compact('title','workstations'));
    }
}
