<?php

namespace App\Http\Controllers\backend\worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportingController extends Controller
{
    public function showReporting()
    {
        $title='Production Reporting';
        return view('backend.workerModules.productionReport.productionReport', compact('title'));
    }
}
