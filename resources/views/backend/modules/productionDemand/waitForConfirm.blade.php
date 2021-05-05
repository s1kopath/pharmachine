@extends('backend.adminHome')
@section('content')


    {{-- @dd($demands); --}}
    {{-- <div class="container">

        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <h5>Product Name: {{ $demands->demandProduct->name }}</h5>
                 <h6>Quantity: {{ $demands->product_quantity }}</h6>
                <p>Delivery date: {{ $demands->delivery_date }}</p>
            </div>
            <div class="col-md-4">

            </div>
        </div>



    </div> --}}




    <div class="container py-4">




        <div class="row p-2 mb-4 bg-light rounded-3 shadow-lg">
            <div class="col-md-6">
                <div class="container-fluid ">
                    <h1 class="col-md-8 fw-bold">Product Name: {{ $demands->demandProduct->name }}</h1>
                    <p class="fs-4">Demand Quantity: {{ $demands->product_quantity }} (bottles/piece)</p>
                    <p class="fs-4">Estimated Delivery date: {{ $demands->delivery_date }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <p class=" fs-4 fw-bold">Material Need: {{ $material_need }} Kg {{ $products->productMaterial->name }}
                </p>
                <p class=" fs-4">Available Quantity: {{ $products->productMaterial->available_quantity }} Kg
                    {{ $products->productMaterial->name }} </p>

                @if ($products->productMaterial->available_quantity >= $material_need)
                    <p class=" fs-4">Material Status: Available</p>

                @elseif ($products->productMaterial->status == 'Ordered')
                    <p class="text-white w-50 p-2 rounded bg-warning fs-4"> Material Short: <small>Delivery on the
                            way</small></p>

                @else
                    <p class="text-white w-50 p-2 rounded bg-danger fs-4"> Material Short</p>
                    <a class="btn btn-outline-danger"
                        href="{{ route('raw.updateOrder', $products->productMaterial->id) }}">
                        Create Material Order </span></a>
                @endif




            </div>
        </div>

        <div class="row mb-4 align-items-md-stretch ">
            <div class="col-md-6">
                <div class="h-100 p-5 text-white bg-dark rounded-3 shadow ">
                    <h2>Availabe Workers</h2>
                    <ol class="list-group list-group-numbered">

                        @foreach ($workers as $person)
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">{{ $person->workerUser->name }}</div>
                                    Labour per hour: {{ $person->labour_per_hour }} Tk
                                </div>
                                <span class="badge bg-primary rounded-pill">{{ $person->status }}</span>
                            </li>

                        @endforeach
                    </ol>

                </div>
            </div>
            <div class="col-md-6">
                <div class=" p-5 bg-light border rounded-3 shadow ">
                    <h2>Available Workstations</h2>
                    @php
                        $workstationStatus = 0;
                    @endphp


                    <ul class="list-group  mb-3">
                        @foreach ($workstations as $key => $machine)
                            @if ($machine->status == 'available')
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center bg-dark text-light">
                                    {{ $key + 1 }}. {{ $machine->name }}
                                    <span class="badge bg-primary rounded-pill">{{ $machine->status }}</span>
                                </li>
                                @php
                                    $workstationStatus = 1;
                                @endphp
                            @endif

                        @endforeach

                    </ul>

                    @if ($workstationStatus == 0)
                        <p class="text-white w-100 p-2 rounded bg-warning fs-4"> No Available Workstation</small></p>
                        <a class="btn btn-outline-dark" href="{{ route('ws.dashboard') }}">Add Workstation</a>
                    @endif






                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('pd.dashboard') }}" class="btn btn-danger w-100 text-center">
                    Go Back </a>
            </div>
            {{-- @dd($machine=,$products->productMaterial->available_quantity >= $material_need); --}}
            @if ($workstationStatus == 1 && $products->productMaterial->available_quantity >= $material_need)
                <div class="col-md-6">
                    <a href="{{ route('changeStatus', ['id' => $demands->id, 'status' => 'confirm']) }}"
                        class="btn w-100 text-center " style="background-color: rgb(6, 13, 53); color: white">
                        Confirm Demand Order </a>
                </div>
            @endif


        </div>


    </div>



@endsection
