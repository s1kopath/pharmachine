<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Manufacturing;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function rep()
    {
        $title = 'Reports';
        $search = [];
        return view('backend.modules.reports.reports', compact('title', 'search'));
    }

    public function generate(Request $request)
    {
        $title = 'Reports';
        $fromDate = $request->from_date;
        $toDate = $request->to_date;
        $time = date('d-M-Y', strtotime(Carbon::now()));

        if ($fromDate > $toDate) {
            return redirect()->back()->with('error', 'Invalid date selection.');
        }
        if ($fromDate && $toDate) {
            $search = Manufacturing::where('finishing_date', '>=', $fromDate)
                ->where('finishing_date', '<=', $toDate)
                ->orderBy('finishing_date')
                ->get();

            return view('backend.modules.reports.reports', compact('title', 'search', 'fromDate', 'toDate', 'time'));
        } else {
            return redirect()->back()->with('error', 'Please Select start/end date to generate report.');
        }
    }
}
