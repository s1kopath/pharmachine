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

    <div class="container py-4">
        <div class="row p-2 mb-4 bg-light rounded-3 shadow-lg">
            <div class="container-fluid p-3">
                <table class="table table-striped table-info">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Manufacturing Number</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Materials</th>
                            <th scope="col">Workstation</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">Estimated Finishing Date</th>
                            <th scope="col">Warehouse Lot Number</th>
                            <th scope="col">Delivery Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $data)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $data->manufacturing_number }}</td>
                                <td>{{ $data->manufacturingProduct->name }}</td>
                                <td>{{ $data->quantity }}</td>
                                <td>{{ $data->manufacturingMaterial->name }} ({{ $data->material_quantity }} Kg)</td>
                                <td>{{ $data->manufacturingWorkstation->name }}</td>
                                <td>{{ $data->start_date }}</td>
                                <td>{{ $data->finishing_date }}</td>
                                <td>{{ $data->warehouse_number }}</td>
                                <td>{{ $data->delivery_date }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    @if ($data->status == 'Waiting for production')
                                        <a class="btn btn-success"
                                            href="{{ route('productionUpdate', ['id' => $data->id, 'demand_id' => $data->demand_id, 'status' => 'In Production', 'demandStatus' => 'produced']) }}">Start
                                            Production</a>
                                    @elseif ($data->status == 'In Production')
                                        <a class="btn btn-warning"
                                            href="{{ route('productionUpdate', ['id' => $data->id, 'demand_id' => $data->demand_id, 'status' => 'Ready for shipment', 'demandStatus' => 'deliver']) }}">Finish
                                            Production</a>
                                    @else
                                        <a class="btn btn-secondary">View Record</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>


@endsection
