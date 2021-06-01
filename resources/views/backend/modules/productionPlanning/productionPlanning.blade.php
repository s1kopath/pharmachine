@extends('backend.adminHome')
@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success d-flex justify-content-between">
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




    <div class="container-fluid p-3 ">
        <table class="table table-hover table-responsive shadow-lg">
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
                            @if ($data->status == 'Delivered')
                                <a class="btn btn-info"
                                    href="{{ route('checkProductionStatus.order', $data->id) }}">Check Record</a>
                                <hr>
                                <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')" href="{{ route('productionStatus.delete', $data->id) }}">Delete Record</a>
                            @else
                                <a class="btn btn-sm btn-success"
                                    href="{{ route('checkProductionStatus.order', $data->id) }}">Check Production
                                    Update</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@endsection
