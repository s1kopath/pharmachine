<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductionPlanningController extends Controller
{
    public function pp(){
        return view('backend.modules.productionPlanning');
    }
}
