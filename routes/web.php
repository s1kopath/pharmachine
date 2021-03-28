<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\ProductionDemandController;
use App\Http\Controllers\backend\ProductionPlanningController;
use App\Http\Controllers\backend\ReportsController;
use App\Http\Controllers\backend\StockController;
use App\Http\Controllers\backend\ScheduleController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\RawMaterialsController;
use App\Http\Controllers\backend\WorkerController;
use App\Http\Controllers\backend\WorkstationController;
use App\Http\Controllers\backend\DashboardController;

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


//dashboard
Route::get('/',[DashboardController::class, 'home']) -> name('home');




Route::get('/productionDemand', [ProductionDemandController::class, 'pd']) -> name('pd.dashboard');

Route::get('/productPlanning', [ProductionPlanningController::class, 'pp']) -> name('pp.dashboard');

Route::get('/reports', [ReportsController::class, 'rep']) -> name('rep.dashboard');

Route::get('/stock', [StockController::class, 'sto']) -> name('sto.dashboard');

Route::get('/', [ScheduleController::class, 'sch']) -> name('sch.dashboard');

//workstation
Route::get('/workstation', [WorkstationController::class, 'ws']) -> name('ws.dashboard');
Route::post('/workstation', [WorkstationController::class, 'createMachine']) -> name('ws.createMachine');

//product
Route::get('/product', [ProductController::class, 'product']) -> name('product.list');
Route::post('/product', [ProductController::class, 'create']) -> name('product.create');

//worker
Route::get('/worker', [WorkerController::class, 'list']) -> name('worker.list');
Route::post('/worker', [WorkerController::class, 'create']) -> name('worker.create');

//raw materials
Route::get('/rawMaterials', [RawMaterialsController::class, 'raw']) -> name('raw.dashboard');
Route::post('/rawMaterials', [RawMaterialsController::class, 'createVendor']) -> name('raw.createVendor');




