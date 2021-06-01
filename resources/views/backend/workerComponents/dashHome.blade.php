@extends('backend.workerModules.workerDashboard')
@section('content')

    {{-- 1st row --}}
    <div class="row m-3">
        <div class="col-md-6 ">
            <a href="{{ route('show.reporting') }}" class="text-decoration-none">
                <div class="card @if ($mo_count > 0)
                bg-danger
                @else
                bg-secondary
                @endif  text-white shadow" style="width: 20rm;height:10rem;">
                    <div class="card-body">
                        <h5><span data-feather="alert-octagon"></span>
                            <small> Pending Manufacturing Order</small>
                        </h5>
                        <h1>{{ $mo_count }} Requests</h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 ">
            <a href="{{ route('show.product') }}" class="text-decoration-none">
                <div class="card text-white shadow dash" style="width: 20rm; height:10rem">
                    <div class="card-body">
                        <h5><span data-feather="package"></span>
                            <small>Total Product In Stack</small>
                        </h5>
                        <h1>{{ $wh_stock }} Items</h1>
                    </div>
                </div>
            </a>
        </div>

    </div>
    {{-- 2nd row --}}
    <div class="row m-3">
        <div class="col-md-6 ">
            <a href="{{ route('show.materials') }}" class="text-decoration-none">
                <div class="card text-white shadow
                @if ($m_order > 0)
                bg-danger
                @else
                bg-secondary
                @endif" style="width: 20rm;height:10rem;">
                    <div class="card-body">
                        <h5><span data-feather="activity"></span>
                            <small>Pending Material Order</small>
                        </h5>
                        <h1>{{ $m_order }} Units</h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 ">
            <a href="{{ route('show.stock') }}" class="text-decoration-none">
                <div class="card text-white shadow
                @if ($pending_delivery > 0)
                bg-danger
                @else
                bg-secondary
                @endif" style="width: 20rm; height:10rem">
                    <div class="card-body">
                        <h5><span data-feather="external-link"></span>
                            <small>Pending Order Delivery</small>
                        </h5>
                        <h1>{{ $pending_delivery }}</h1>
                    </div>
                </div>
            </a>
        </div>

    </div>


@endsection
