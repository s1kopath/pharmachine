<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\MyProductionPlanController;
use App\Http\Controllers\backend\ProcurementController;
use App\Http\Controllers\backend\ProductionDemandController;
use App\Http\Controllers\backend\ProductionPlanningController;
use App\Http\Controllers\backend\ProductListingController;
use App\Http\Controllers\backend\ReportsController;
use App\Http\Controllers\backend\StockController;
use App\Http\Controllers\backend\ScheduleController;
use App\Http\Controllers\backend\EmployeeController;
use App\Http\Controllers\backend\WorkstationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('backend.dashboard');
});


Route::get('/myProductionPlan', [MyProductionPlanController::class, 'mpp']) -> name('mpp.dashboard');

Route::get('/procurement', [ProcurementController::class, 'pro']) -> name('pro.dashboard');

Route::get('/productionDemand', [ProductionDemandController::class, 'pd']) -> name('pd.dashboard');

Route::get('/productPlanning', [ProductionPlanningController::class, 'pp']) -> name('pp.dashboard');

Route::get('/productListing', [ProductListingController::class, 'pl']) -> name('pl.dashboard');

Route::get('/reports', [ReportsController::class, 'rep']) -> name('rep.dashboard');

Route::get('/stock', [StockController::class, 'sto']) -> name('sto.dashboard');

Route::get('/', [ScheduleController::class, 'sch']) -> name('sch.dashboard');

Route::get('/employee', [EmployeeController::class, 'emp']) -> name('emp.dashboard');

Route::get('/workstation', [WorkstationController::class, 'ws']) -> name('ws.dashboard');

