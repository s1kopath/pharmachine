@extends('backend.workerModules.workerDashboard')
@section('content')

    {{-- 1st row --}}
    <div class="row m-3">
        <div class="col-md-6 ">
            <a href="{{ route('show.reporting') }}" class="text-decoration-none">
                <div class="card bg-danger text-white shadow" style="width: 20rm;height:10rem;">
                    <div class="card-body">
                        <h5><span data-feather="alert-octagon"></span>
                            <small> Pending Manufacturing Order</small>
                        </h5>
                        {{-- <h1>{{ $countDemand }} Requests</h1> --}}
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 ">
            <a href="{{ route('show.product') }}" class="text-decoration-none">
                <div class="card text-white shadow bg-secondary" style="width: 20rm; height:10rem">
                    <div class="card-body">
                        <h5><span data-feather="package"></span>
                            <small>Total Product In Stack</small>
                        </h5>
                        {{-- <h1>{{ $countProduct }} Units</h1> --}}
                    </div>
                </div>
            </a>
        </div>

    </div>
    {{-- 2nd row --}}
    <div class="row m-3">
        <div class="col-md-6 ">
            <a href="{{ route('show.materials') }}" class="text-decoration-none">
                <div class="card text-white shadow bg-secondary" style="width: 20rm;height:10rem;">
                    <div class="card-body">
                        <h5><span data-feather="activity"></span>
                            <small>Pending Material Order</small>
                        </h5>
                        {{-- <h1>{{ $countOrder }} Units</h1> --}}
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 ">
            <a href="{{ route('show.stock') }}" class="text-decoration-none">
                <div class="card text-white shadow bg-secondary" style="width: 20rm; height:10rem">
                    <div class="card-body">
                        <h5><span data-feather="external-link"></span>
                            <small>Pending Order Delivery</small>
                        </h5>
                        {{-- <h1>{{ $countWorker }}</h1> --}}
                    </div>
                </div>
            </a>
        </div>

    </div>


@endsection
