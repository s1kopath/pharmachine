@extends('backend.dashboard')
@section('content')


    {{-- 1st row --}}
    <div class="row m-3">
        <div class="col-md-4 ">
            <div class="card bg-danger text-white shadow" style="width: 20rm;height:10rem;">
                <div class="card-body">
                    <h5>Pending Production Demand<small></small></h5>
                    <h1>3</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card text-white shadow" style="background-color:rgb(121, 109, 3); width: 20rm; height:10rem">
                <div class="card-body">
                    <h5> <small>Total Product In Stack</small> </h5>
                    <h1>75 Units</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card text-white shadow" style="background-color:rgb(178, 0, 233);width: 20rm;height:10rem;">
                <div class="card-body">
                    <h5> <small>Total Warkstations</small> </h5>
                    <h1>45</h1>
                </div>
            </div>
        </div>
    </div>
    {{-- 2nd row --}}
    <div class="row m-3">
        <div class="col-md-4 ">
            <div class="card text-white shadow" style="background-color:rgb(11, 4, 99);width: 20rm;height:10rem;">
                <div class="card-body">
                    <h5> <small>Orders in Production</small></h5>
                    <h1>72 Units</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card text-white shadow" style="background-color:rgb(252, 127, 10);width: 20rm; height:10rem">
                <div class="card-body">
                    <h5> <small>Total Number of Warkers </small> </h5>
                    <h1>3600</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card bg-primary text-white shadow" style="width: 20rm;height:10rem;">
                <div class="card-body">
                    <h5> <small>Active Workstations</small> </h5>
                    <h1>37</h1>
                </div>
            </div>
        </div>
    </div>
    {{-- 3rd row --}}
    <div class="row m-3">
        <div class="col-md-4 ">
            <div class="card bg-success text-white shadow" style="width: 20rm;height:10rem;">
                <div class="card-body">
                    <h5> <small>Product Ready for Shipment</small></h5>
                    <h1>50 Unit</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card bg-warning text-white shadow" style="width: 20rm; height:10rem">
                <div class="card-body">
                    <h5> <small>Number of Active Warkers in production </small> </h5>
                    <h1>1200</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card text-white shadow" style="background-color:brown; width: 20rm;height:10rem;">
                <div class="card-body">
                    <h5> <small>Material Shortage</small> </h5>
                    <h1>3 Units</h1>
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
