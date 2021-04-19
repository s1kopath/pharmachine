<?php

namespace App\Http\Controllers\Backend\Worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show()
    {
        $title='Dashboard';
        return view('backend.workerModules.workerDashboard',compact('title'));
    }
}
