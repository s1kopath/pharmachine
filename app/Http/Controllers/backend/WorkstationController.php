<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkstationController extends Controller
{
    public function ws(){
        return view('backend.modules.workstation');
    }
}
