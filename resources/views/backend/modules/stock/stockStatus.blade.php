@extends('backend.adminHome')
@section('content')


    <div id="printableArea">
        <div class="row d-flex justify-content-between mb-2 mt-3">
            <div class="col">
                <h4 class="text-danger">Date: {{ $time }}</h4>
            </div>
            <div class="col text-end">
                <h3 class="text-primary">MANUFACTURING #{{ $menu_order->manufacturing_number }}</h3>
                <h3 class="text-primary">WAREHOUSE #{{ $menu_order->warehouse_number }}</h3>
                <h3 class="text-primary">DEMAND #{{ $menu_order->demand_id }}</h3>
            </div>
        </div>

        <div class="row d-flex justify-content-between">
            <div class="col p-3">
                <h3 class="text-info">Product Info:</h3>
                <h5>Product Name: {{ $menu_order->manufacturingProduct->name }}</h5>
                <h6>Production Quantity: {{ $menu_order->quantity }} Units</h6>
                <p>Product Type: {{ $menu_order->manufacturingProduct->product_type }}</p>
                <p>Details: {{ $menu_order->manufacturingProduct->description }}</p>
                <p>Raw Material: {{ $menu_order->manufacturingMaterial->name }} || Quantity:
                    {{ $menu_order->material_quantity }} Kg</p>
                <p>Material Vendor: {{ $menu_order->manufacturingMaterial->materialVendor->name }} || Vendor contact:
                    {{ $menu_order->manufacturingMaterial->materialVendor->contact }}</p>



            </div>
            <div class="col p-3">
                <h3 class="text-success">Production Details:</h3>
                <h6>Production status: {{ $menu_order->status }}</h6>
                <h6>Production start date: {{ $menu_order->start_date }}</h6>
                <h6>Production end date: {{ $menu_order->finishing_date }}</h6>
                <h6>Delivery date: {{ $menu_order->delivery_date }}</h6>
                <h6>Total Production Cost: {{ $menu_order->total_cost }} BDT</h6>
            </div>
        </div>
        <div class="row d-flex justify-content-between">
            <div class="col p-3">
                <h3 class="text-secondary">Workstation:</h3>
                <p><b>Machine Name :</b> {{ $menu_order->manufacturingWorkstation->name }}</p>
                <p><b>Manufacturer :</b> {{ $menu_order->manufacturingWorkstation->manufacturer }}</p>
                <p><b>Description :</b> {{ $menu_order->manufacturingWorkstation->description }}</p>


            </div>
            <div class="col p-3">
                <h3 class="text-warning">Assigned Worker</h3>
                <p><b>Name:</b> {{ $menu_order->manufacturingWorker->workerUser->name }}</p>
                <p><b>Contact:</b> {{ $menu_order->manufacturingWorker->contact }}</p>
                <p><b>Labour cost:</b> {{ $menu_order->manufacturingWorker->labour_per_hour }} BDT/Hour</p>

            </div>
        </div>


        <br><br>

        <div class="row mt-3 d-flex justify-content-between">
            <div class="col p-3">
                @if ($title == 'Delivered')
                    <h3 class="text-primary">Delivery Report:</h3>
                    <h5>Delivered By: {{ $stock->user_name }}</h5>
                    <p>Delivered on: {{ $stock->delivered_on }}</p>
                @else
                <h3 class="text-primary">Waiting for  delivery</h3>
                @endif

            </div>
            <div class="col p-3">
                <p>Prepared By,</p>
                <h3 class="text-secondary">Production Manager</h3>
                <h5>Ergon Pharmaceuticals Ltd,</h5>
                <p>House # 04 (3rd Floor), Mohakhali C/A, Dhaka-1212, Bangladesh.</p>
                <p>Tel : +02 989 42 92.</p>
            </div>

        </div>
    </div>

    <div class=" d-flex justify-content-between ">
        <a href="{{ route('sto.dashboard') }}" class="btn btn-lg btn-secondary">Go Back</a>
        <a class="btn btn-lg btn-success mt-2" onclick="printDiv('printableArea')">Print</a>
    </div>

@endsection
