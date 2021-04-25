<?php

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

        Route::get('/reports', [ReportsController::class, 'rep'])->name('rep.dashboard');

        Route::get('/stock', [StockController::class, 'sto'])->name('sto.dashboard');

        //profile
        Route::get('/profile', [ProfileController::class, 'showAdminProfile'])-> name('display.adminProfile');


        //production  demand
        Route::get('/productionDemand', [ProductionDemandController::class, 'pd'])->name('pd.dashboard');
        Route::get('/demoDemand', [ProductionDemandController::class, 'demoPd'])->name('demo.dashboard');
        Route::post('/demoDemandCreator', [ProductionDemandController::class, 'createDemand'])->name('demand.create');

        //production planing
        Route::get('/productPlanning', [ProductionPlanningController::class, 'pp'])->name('pp.dashboard');
        Route::get('/manufacturingOrder', [ProductionPlanningController::class, 'createForm'])->name('manufacturing.order');
        Route::post('/manufacturingOrder/create', [ProductionPlanningController::class, 'createManufacturingOrder'])->name('manufacturingOrder.create');


        //workstation
        Route::get('/workstation', [WorkstationController::class, 'ws'])->name('ws.dashboard');
        Route::post('/workstation/create', [WorkstationController::class, 'createWorkstation'])->name('ws.createWorkstation');

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
        Route::get('/worker/update/{id}', [WorkerController::class, 'update'])->name('worker.update');
        Route::put('/worker/saveUpdate/{id}', [WorkerController::class, 'saveUpdate'])->name('worker.saveUpdate');
        Route::get('/worker/delete/{id}', [WorkerController::class, 'delete'])->name('worker.delete');

        //raw materials
        Route::get('/raw-materials', [RawMaterialsController::class, 'raw'])->name('raw.dashboard');
        Route::post('/raw-materials/vendor', [RawMaterialsController::class, 'createVendor'])->name('raw.createVendor');
        Route::post('/raw-materials', [RawMaterialsController::class, 'createOrder'])->name('raw.createOrder');
        Route::get('/raw-materials/update/{id}', [RawMaterialsController::class, 'updateOrder'])->name('raw.updateOrder');
        Route::put('/raw-materials/sendOrder/{id}', [RawMaterialsController::class, 'sendOrder'])->name('raw.sendOrder');
    });
});


// -----worker routes-----
Route::group(['prefix' => 'worker'], function () {

    Route::group(['middleware' => 'worker-auth'], function () {
        //profile
        Route::get('/profile', [WorkerProfileController::class, 'showUserProfile'])-> name('display.UserProfile');
        // Route::get('/profile/change_password/{id}', [WorkerProfileController::class, 'getPassword'])-> name('get.password');
        // Route::post('/profile/change_password/{id}', [WorkerProfileController::class, 'updatePassword'])-> name('update.password');

        //home page
        Route::get('/dashboard', [DashboardController::class, 'show'])->name('show.dashboard');

        //production report
        Route::get('/production-reporting', [ReportingController::class, 'showReporting'])->name('show.reporting');


        //products
        Route::get('/product', [WorkerProductController::class, 'showProduct'])->name('show.product');

        //workstation
        Route::get('/workstation', [WorkerWorkstationController::class, 'showWorkstation'])->name('show.workstation');

        //warehouse stock
        Route::get('/warehouse', [WorkerStockController::class, 'showStock'])->name('show.stock');

        //raw materials
        Route::get('/raw-materials', [WorkerRawMaterialsController::class, 'showMaterials'])->name('show.materials');
    });
});
