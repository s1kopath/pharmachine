<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProcurementController extends Controller
{
    public function pro(){
        return view('backend.modules.procurement');
    }
}
