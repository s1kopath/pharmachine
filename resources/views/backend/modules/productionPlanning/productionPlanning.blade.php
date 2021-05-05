@extends('backend.adminHome')
@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success">
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



    <div class="container-fluid p-3">
        <table class="table table-striped table-info">
            <thead class="text-center">
                <tr>
                    <th scope="col">Sl</th>
                    <th scope="col">Manufacturing Number</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Materials</th>
                    <th scope="col">Status</th>
                    <th scope="col">Worker Assigned</th>
                    <th scope="col">Workstation</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">Finishing Date</th>
                    <th scope="col">Warehouse Lot Number</th>
                    <th scope="col">Delivery Date</th>
                    <th scope="col">Total Production Cost</th>
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
                        <td>{{ $data->status }}</td>
                        <td>{{ $data->manufacturingWorker->workerUser->name }}</td>
                        <td>{{ $data->manufacturingWorkstation->name }}</td>
                        <td>{{ $data->start_date }}</td>
                        <td>{{ $data->finishing_date }}</td>
                        <td>{{ $data->warehouse_number }}</td>
                        <td>{{ $data->delivery_date }}</td>
                        <td>{{ $data->total_cost }} Tk</td>
                        <td>
                            <a class="btn btn-success" href="">View</a> ||
                            <a class="btn btn-warning" href="">Update</a> ||
                            <a class="btn btn-danger" href="">Delete Record</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
