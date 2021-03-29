<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function rep(){
        $title = 'Reports';
        return view('backend.modules.reports.reports', compact('title'));
    }
}
