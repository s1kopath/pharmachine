@extends('backend.dashboard')
@section('content')


    {{-- 1st row --}}
    <div class="row m-3">
        <div class="col-md-4 ">
            <div class="card bg-danger text-white shadow" style="width: 20rm;height:10rem;">
                <div class="card-body">
                    <h5><span data-feather="alert-octagon"></span>
                        <small> Pending Production Demand</small></h5>
                    <h1>{{ $countDemand }} Requests</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card text-white shadow" style="background-color:rgb(121, 109, 3); width: 20rm; height:10rem">
                <div class="card-body">
                    <h5><span data-feather="package"></span>
                        <small>Total Product In Stack</small> </h5>
                    <h1>{{ $countProduct }} Units</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card text-white shadow" style="background-color:rgb(178, 0, 233);width: 20rm;height:10rem;">
                <div class="card-body">
                    <h5><span data-feather="settings"></span>
                        <small>Total Warkstations</small> </h5>
                    <h1>{{ $countWorkstation }}</h1>
                </div>
            </div>
        </div>
    </div>
    {{-- 2nd row --}}
    <div class="row m-3">
        <div class="col-md-4 ">
            <div class="card text-white shadow" style="background-color:rgb(11, 4, 99);width: 20rm;height:10rem;">
                <div class="card-body">
                    <h5><span data-feather="activity"></span>
                        <small>Orders in Production</small></h5>
                    <h1>{{ $countOrder }} Units</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card text-white shadow" style="background-color:rgb(252, 127, 10);width: 20rm; height:10rem">
                <div class="card-body">
                    <h5><span data-feather="user-x"></span>
                        <small>Total Number of Workers </small> </h5>
                    <h1>{{ $countWorker }}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card bg-primary text-white shadow" style="width: 20rm;height:10rem;">
                <div class="card-body">
                    <h5><span data-feather="git-merge"></span>
                        <small>Active Workstations</small> </h5>
                    <h1>0</h1>
                </div>
            </div>
        </div>
    </div>
    {{-- 3rd row --}}
    <div class="row m-3">
        <div class="col-md-4 ">
            <div class="card bg-success text-white shadow" style="width: 20rm;height:10rem;">
                <div class="card-body">
                    <h5><span data-feather="truck"></span>
                        <small>Product Ready for Shipment</small></h5>
                    <h1>0 Unit</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card bg-warning text-white shadow" style="width: 20rm; height:10rem">
                <div class="card-body">
                    <h5><span data-feather="users"></span>
                        <small>Number of Active Warkers in production </small> </h5>
                    <h1>0</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card text-white shadow" style="background-color:brown; width: 20rm;height:10rem;">
                <div class="card-body">
                    <h5><span data-feather="alert-triangle"></span>
                        <small>Material Shortage</small> </h5>
                    <h1>0 Units</h1>
                </div>
            </div>
        </div>
    </div>
    {{-- 4th row
        <div class="row m-3">
            <div class="col-md-3 ">
                <div class="card bg-success text-white shadow" style="width: 20rm;height:10rem;">
                    <div class="card-body">
                        <h5> <small>Total Product Quantity</small></h5>
                        <h1>5000</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="card bg-warning text-white shadow" style="width: 20rm; height:10rem">
                    <div class="card-body">
                        <h5> <small>Total selling Product </small> </h5>
                        <h1>1000</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="card bg-primary text-white shadow" style="width: 20rm;height:10rem;">
                    <div class="card-body">
                        <h5> <small>Total Price Amount</small> </h5>
                        <h1>15000Tk</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="card bg-secondary text-white shadow" style="width: 20rm;height:10rem;">
                    <div class="card-body">
                        <h5> <small>Total Active Employee</small> </h5>
                        <h1>200</h1>
                    </div>
                </div>
            </div>
        </div> --}}



@endsection
