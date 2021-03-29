<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductionPlanningController extends Controller
{
    public function pp(){
        $title = 'Production Planning';
        return view('backend.modules.productionPlanning.productionPlanning', compact('title'));
    }
}
