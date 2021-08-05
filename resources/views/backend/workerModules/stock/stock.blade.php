@extends('backend.workerModules.workerDashboard')
@section('content')

    @if (session()->has('success'))
        <div class="alert alert-info d-flex justify-content-between">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger d-flex justify-content-between">
            {{ session()->get('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger d-flex justify-content-between">{{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif

    <div class="container-fluid p-3">
        <table class="table table-hover table-responsive shadow-lg">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Number</th>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Delevery Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Delivered By</th>
                    <th scope="col">Delivered On</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>




                @foreach ($stock as $key => $data)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $data->stockManufacturing->warehouse_number }}</td>
                        <td>{{ $data->stockManufacturing->manufacturingProduct->name }}</td>
                        <td>{{ $data->stockManufacturing->quantity }} Unit</td>
                        <td>{{ $data->stockManufacturing->delivery_date }}</td>
                        <td>{{ $data->stockManufacturing->status }}</td>
                        <td>{{ $data->user_name }}</td>
                        <td>{{ $data->delivered_on }}</td>


                        <td>

                            @if ($data->stockManufacturing->status == 'Ready for shipment')
                                <a class="btn btn-danger" onclick="return confirm('Are you sure you want to deliver this order?')"
                                    href="{{ route('stock.deliver', $data->id) }}">Deliver Order</span></a>
                            @elseif($data->stockManufacturing-> status == 'Waiting for production' || $data->stockManufacturing-> status == 'In Production' || $data->stockManufacturing->status == 'Production paused')
                                <a class="btn btn-outline-dark" >Order in production</span></a>
                            @else
                                <a class="btn btn-outline-info" >Delivered</span></a>
                            @endif

                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>




@endsection
