@extends('backend.adminHome')
@section('content')

<link href="/css/schedule.css" rel="stylesheet">
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
            <div class="card text-white shadow" style="background-color:rgb(122, 115, 49); width: 20rm; height:10rem">
                <div class="card-body">
                    <h5><span data-feather="package"></span>
                        <small>Total Product In Stack</small> </h5>
                    <h1>{{ $countProduct }} Units</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card text-white shadow" style="background-color:rgb(192, 96, 221);width: 20rm;height:10rem;">
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
            <div class="card text-white shadow" style="background-color:rgb(44, 40, 94);width: 20rm;height:10rem;">
                <div class="card-body">
                    <h5><span data-feather="activity"></span>
                        <small>Orders in Production</small></h5>
                    <h1>{{ $countOrder }} Units</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card text-white shadow" style="background-color:rgb(252, 147, 49);width: 20rm; height:10rem">
                <div class="card-body">
                    <h5><span data-feather="user-x"></span>
                        <small>Total Number of Workers </small> </h5>
                    <h1>{{ $countWorker }}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card text-white shadow" style="background-color:rgb(53, 133, 199); width: 20rm;height:10rem;">
                <div class="card-body">
                    <h5><span data-feather="git-merge"></span>
                        <small>Active Workstations</small> </h5>
                    <h1>{{ $countActiveWorkstation }}</h1>
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
                    <h1>{{ $countReadyShipment }} Unit</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card bg-warning text-white shadow" style="width: 20rm; height:10rem">
                <div class="card-body">
                    <h5><span data-feather="users"></span>
                        <small>Number of Active Warkers in production </small> </h5>
                    <h1>{{ $countActiveWorker }}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card text-white shadow" style="background-color:rgb(150, 54, 54); width: 20rm;height:10rem;">
                <div class="card-body">
                    <h5><span data-feather="alert-triangle"></span>
                        <small>Material Shortage</small> </h5>
                    <h1>{{ $countMaterial }} Units</h1>
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


        {{-- chart --}}


{{-- <br><hr>
<br>
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1>Daily Production</h1>
        </div>
        <div>
            <canvas class="my-4 w-100 chartjs-render-monitor" id="myChart" width="1076" height="454"
                style="display: block; width: 1076px; height: 454px;"></canvas>
        </div>
    </div> --}}


        {{-- calander --}}

        {{-- <div class="container">
            <div class="chart">
                <div class="chart-row chart-period">
                    <div class="chart-row-item">
                    </div>
                    <span>Saturday</span>
                    <span>Sunday</span>
                    <span>Monday</span>
                    <span>Tuesday</span>
                    <span>Wednesday</span>
                    <span>Thursday</span>
                    <span>Friday</span>

                </div>
                <div class="chart-row chart-lines">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>



                <div class="chart-row">
                    <div class="chart-row-item">1</div>
                    <ul class="chart-row-bars">
                        <li class="chart-li-one li">PO 001: Ashwagandha</li>
                    </ul>
                </div>
                <div class="chart-row">
                    <div class="chart-row-item">2</div>
                    <ul class="chart-row-bars">
                        <li class="chart-li-two-a li">PO 002: Boswellia</li>
                        <li class="chart-li-two-b li">PO 003: Triphala</li>
                    </ul>
                </div>
                <div class="chart-row">
                    <div class="chart-row-item">3</div>
                    <ul class="chart-row-bars">
                        <li class="chart-li-three li">PO 004: Brahmi</li>
                    </ul>
                </div>
                <div class="chart-row">
                    <div class="chart-row-item">4</div>
                    <ul class="chart-row-bars">
                        <li class="chart-li-four li">PO 005: Cumin</li>
                    </ul>
                </div>
                <div class="chart-row">
                    <div class="chart-row-item">5</div>
                    <ul class="chart-row-bars">
                        <li class="chart-li-five li">PO 006: Turmeric</li>
                    </ul>
                </div>
                <div class="chart-row">
                    <div class="chart-row-item">6</div>
                    <ul class="chart-row-bars">
                        <li class="chart-li-six li">PO 007: Licorice root</li>
                    </ul>
                </div>
                <div class="chart-row">
                    <div class="chart-row-item">7</div>
                    <ul class="chart-row-bars">
                        <li class="chart-li-seven li">PO 008: Gensin</li>
                    </ul>
                </div>

            </div>
        </div> --}}





@endsection
