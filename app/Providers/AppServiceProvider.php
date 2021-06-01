<?php

namespace App\Providers;

use App\Models\Demand;
use App\Models\Manufacturing;
use App\Models\Material;
use App\Models\Warehouse;
use App\Models\Workstation;
use App\Models\WorkstationRepair;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Paginator::useBootstrap();

        //worker panel
        view()->composer('*', function ($view) {
            if (Auth::check()) {
                $view->with('dashHome', Auth::user());
                if (auth()->user()->role == 'worker') {

                    $countRequest = Manufacturing::where('worker_id', auth()->user()->userProfile->id)
                    ->whereIn('status',['Waiting for production', 'In production'])->count();
                    $countMachineRepair = WorkstationRepair::where('worker_id',auth()->user()->userProfile->id)->count();
                    $countMaterialOrder = Material::where('status','Ordered')->count();
                    $countDelivery = Manufacturing::where('worker_id', auth()->user()->userProfile->id)
                    ->where('status','Ready for shipment')->count();

                    View()->share('countRequest', $countRequest);
                    View()->share('countMachineRepair', $countMachineRepair);
                    View()->share('countMaterialOrder', $countMaterialOrder);
                    View()->share('countDelivery', $countDelivery);
                }
            } else {
                $view->with('dashHome', null);
            }
        });



        // admin panel
        $countDemand = Demand::where('status', 'pending')->count();
        $countOrder = Manufacturing::where('status', '!=', 'Delivered')->count();
        $countWorkstation = Workstation::whereIn('status', ['Waiting for repair','Workstation damaged'])->count();
        $countMaterial = Material::where('available_quantity', '<', 20)->count();
        $countReadyShipment = Manufacturing::where('status', 'Ready for shipment')->count();



        View()->share('workstation', $countWorkstation);
        view()->share('demand_count', $countDemand);
        view()->share('count_order', $countOrder);
        view()->share('count_material', $countMaterial);
        view()->share('count_shipment', $countReadyShipment);

    }
}
