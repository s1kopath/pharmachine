@extends('backend.workerModules.workerDashboard')
@section('content')

    @if (session()->has('success'))
        <div class="alert alert-info">
            {{ session()->get('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif

    <div class="container-fluid p-3 bg-primary rounded">
        <table class="table table-striped table-danger rounded">
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
                        <td>{{ $data->stockManufacturing->quantity }} Piece</td>
                        <td>{{ $data->stockManufacturing->delivery_date }}</td>
                        <td>{{ $data->stockManufacturing->status }}</td>
                        <td>{{ $data->user_name }}</td>
                        <td>{{ $data->delivered_on }}</td>


                        <td>

                            @if ($data->stockManufacturing->status == 'Ready for shipment')
                                <a class="btn btn-danger"
                                    href="{{ route('stock.deliver', $data->id) }}">Deliver</span></a>
                            @elseif($data->stockManufacturing-> status == 'Waiting for production')
                                <a class="btn btn-light" href="">Check</span></a>
                            @else
                                <a class="btn btn-info" href="">View Record</span></a>
                            @endif

                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>




@endsection
