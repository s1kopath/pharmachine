<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home(){
        // $title='Dashboard';
        // return view('backend.dashboard', compact('title'));
        return view('backend.dashboard');
    }
}
