<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\ProductionDemandController;
use App\Http\Controllers\backend\ProductionPlanningController;
use App\Http\Controllers\backend\ReportsController;
use App\Http\Controllers\backend\StockController;
use App\Http\Controllers\backend\ScheduleController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\RawMaterialsController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\Backend\Worker\DashboardController;
use App\Http\Controllers\backend\worker\ProductController as WorkerProductController;
use App\Http\Controllers\backend\worker\ProfileController as WorkerProfileController;
use App\Http\Controllers\backend\worker\RawMaterialsController as WorkerRawMaterialsController;
use App\Http\Controllers\backend\worker\ReportingController;
use App\Http\Controllers\backend\worker\StockController as WorkerStockController;
use App\Http\Controllers\backend\worker\WorkstationController as WorkerWorkstationController;
use App\Http\Controllers\backend\WorkerController;
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



// fetch api controller
Route::get('/get-calculation-quantity/{id}',[ApiController::class,'calculate']);
Route::get('/get-calculation-total-cost/{id}',[ApiController::class,'calculateCost']);
Route::get('/get-calculation-time/{id}',[ApiController::class,'calculateTime']);
Route::get('/get-calculation-overtime/{id}',[ApiController::class,'calculateOvertime']);



//login and registration
Route::get('/', [UserController::class, 'showLoginForm'])->name('login.form');
Route::get('/registration', [UserController::class, 'showRegistrationForm'])->name('registration.form');
Route::post('/registration/create', [UserController::class, 'registration'])->name('registration');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');





// -----admin routes-----
Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'admin-auth'], function () {
        //home page
        Route::get('/dashboard', [ScheduleController::class, 'sch'])->name('sch.dashboard');

        //report
        Route::get('/reports', [ReportsController::class, 'rep'])->name('rep.dashboard');
        Route::post('/reports', [ReportsController::class, 'generate'])->name('report.generate');


        //profile
        Route::get('/profile', [ProfileController::class, 'showAdminProfile'])-> name('display.adminProfile');


        //production  demand
        Route::get('/productionDemand', [ProductionDemandController::class, 'pd'])->name('pd.dashboard');
        Route::post('/demoDemandCreator', [ProductionDemandController::class, 'createDemand'])->name('demand.create');

        Route::get('/productionDemand/{id}/{status}', [ProductionDemandController::class, 'changeStatus'])->name('changeStatus');
        Route::get('/productionDemand/{id}', [ProductionDemandController::class, 'deleteStatus'])->name('deleteStatus');

        Route::get('/waitForConfirm/{id}', [ProductionDemandController::class, 'waitForConfirm'])->name('demand.waitForConfirm');




        //production planing
        Route::get('/productPlanning', [ProductionPlanningController::class, 'pp'])->name('pp.dashboard');
        Route::post('/manufacturingOrder/create', [ProductionPlanningController::class, 'createManufacturingOrder'])->name('manufacturingOrder.create');
        Route::get('/manufacturingOrder/{id}', [ProductionPlanningController::class, 'createForm'])->name('manufacturing.order');
        Route::get('/productionPlanning/check/{id}', [ProductionPlanningController::class, 'checkProductionStatus'])->name('checkProductionStatus.order');
        Route::get('/productionPlanning/delete/{id}', [ProductionPlanningController::class, 'deleteProductionStatus'])->name('productionStatus.delete');



        //workstation
        Route::get('/workstation', [WorkstationController::class, 'ws'])->name('ws.dashboard');
        Route::post('/workstation/create', [WorkstationController::class, 'createWorkstation'])->name('ws.createWorkstation');
        Route::get('/workstation/check/{id}', [WorkstationController::class, 'requestRepair'])->name('ws.requestRepair');
        Route::get('/workstation/delete/{id}', [WorkstationController::class, 'deleteWorkstation'])->name('delete.workstation');

        Route::get('/workstation/{id}/{status}', [WorkstationController::class, 'completedUpdate'])->name('completedUpdate');

        //product
        Route::get('/product', [ProductController::class, 'product'])->name('product.list');
        Route::get('/product/listView', [ProductController::class, 'listView'])->name('product.listView');
        Route::get('/product/gridView', [ProductController::class, 'gridView'])->name('product.gridView');
        Route::post('/product', [ProductController::class, 'create'])->name('product.create');
        Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
        Route::get('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::put('/product/saveUpdate/{id}', [ProductController::class, 'saveUpdate'])->name('product.saveUpdate');

        //worker
        Route::get('/worker', [WorkerController::class, 'list'])->name('worker.list');
        Route::post('/worker', [WorkerController::class, 'create'])->name('worker.create');
        Route::get('/worker/{id}', [WorkerController::class, 'workerProfile'])->name('worker.profile');
        Route::get('/worker/update/{id}', [WorkerController::class, 'update'])->name('worker.update');
        Route::put('/worker/saveUpdate/{id}', [WorkerController::class, 'saveUpdate'])->name('worker.saveUpdate');
        Route::get('/worker/delete/{id}', [WorkerController::class, 'delete'])->name('worker.delete');
        Route::get('/worker/search/get', [WorkerController::class, 'searchWorker'])->name('worker.search');

        //raw materials
        Route::get('/raw-materials', [RawMaterialsController::class, 'raw'])->name('raw.dashboard');
        Route::post('/raw-materials/vendor', [RawMaterialsController::class, 'createVendor'])->name('raw.createVendor');
        Route::get('/raw-materials/vendor/{id}', [RawMaterialsController::class, 'deleteVendor'])->name('vendor.delete');
        Route::post('/raw-materials', [RawMaterialsController::class, 'createOrder'])->name('raw.createOrder');
        Route::get('/raw-materials/update/{id}', [RawMaterialsController::class, 'updateOrder'])->name('raw.updateOrder');
        Route::put('/raw-materials/sendOrder/{id}', [RawMaterialsController::class, 'sendOrder'])->name('raw.sendOrder');
        Route::get('/raw-materials/delete/{id}', [RawMaterialsController::class, 'materialDelete'])->name('material.delete');

        //warehouse stock
        Route::get('/stock', [StockController::class, 'sto'])->name('sto.dashboard');
        Route::get('/stock/{id}', [StockController::class, 'checkStockRecord'])->name('check.stockRecord');
        Route::get('/stock/delete/{id}', [StockController::class, 'deleteStock'])->name('stock.delete');

    });
});


// -----worker routes-----
Route::group(['prefix' => 'worker'], function () {

    Route::group(['middleware' => 'worker-auth'], function () {
        //profile
        Route::get('/profile', [WorkerProfileController::class, 'showUserProfile'])-> name('display.UserProfile');
        Route::post('/profile/change_password/{id}', [WorkerProfileController::class, 'updatePassword'])-> name('update.password');
        Route::get('/profile/edit-profile/{id}', [WorkerProfileController::class, 'editProfile'])-> name('edit.profile');
        Route::put('/profile/update-profile/{id}', [WorkerProfileController::class, 'updateProfile'])-> name('update.profile');

        //home page
        Route::get('/', [DashboardController::class, 'show'])->name('show.dashboard');
        Route::get('/dashboard', [DashboardController::class, 'home'])->name('show.home');

        //production report
        Route::get('/production-reporting', [ReportingController::class, 'showReporting'])->name('show.reporting');
        Route::get('/production-reporting/{id}/{demand_id}/{status}/{demandStatus}', [ReportingController::class, 'productionUpdate'])->name('productionUpdate');
        Route::post('/production-reporting/{id}', [ReportingController::class, 'damageReport'])->name('damageReport');




        //products
        Route::get('/product', [WorkerProductController::class, 'showProduct'])->name('show.product');

        //workstation
        Route::get('/workstation', [WorkerWorkstationController::class, 'showWorkstation'])->name('show.workstation');
        Route::get('/workstation/repair/{id}', [WorkerWorkstationController::class, 'repairWorkstation'])->name('repair.workstation');

        //warehouse stock
        Route::get('/warehouse', [WorkerStockController::class, 'showStock'])->name('show.stock');
        Route::get('/warehouse/{id}', [WorkerStockController::class, 'deliver'])->name('stock.deliver');

        //raw materials
        Route::get('/raw-materials', [WorkerRawMaterialsController::class, 'showMaterials'])->name('show.materials');
        Route::get('/raw-materials/{id}', [WorkerRawMaterialsController::class, 'receiveOrder'])->name('materials.receiveOrder');
    });
});



