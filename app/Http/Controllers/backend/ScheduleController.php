<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function sch(){
        $title = 'Dashboard';
        return view('backend.components.schedule', compact('title'));
    }
}
