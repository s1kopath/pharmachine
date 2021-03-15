<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyProductionPlanController extends Controller
{
    public function mpp(){
        return view('backend.modules.myProductionPlan');
    }
}
