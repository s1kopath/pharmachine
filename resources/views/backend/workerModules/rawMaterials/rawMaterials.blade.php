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

    {{-- Table --}}
    <div class="container mt-3">
        <table class="table table-hover table-responsive shadow-lg">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col" style="width: 20%;">Description</th>
                    <th scope="col">Vendor Name</th>
                    <th scope="col">Available Qty(Kg)</th>
                    <th scope="col">Order Status</th>
                    <th scope="col">Ordered Qty(Kg)</th>
                    <th scope="col">Last Ordered</th>
                    <th scopÊe="col" style="width: 9%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materials as $key => $data)
                    <tr @if ($data->available_quantity <= 10) class="text-danger" @endif>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->description }}</td>
                        <td>{{ $data->materialVendor->name }}</td>
                        <td>{{ $data->available_quantity }}</td>
                        <td>{{ $data->status }}</td>
                        <td>{{ $data->order_quantity }}</td>
                        <td>{{ $data->order_date }}</td>
                        <td>
                            @if ($data->status == 'Ordered')
                                <a onclick="return confirm('Are you sure you want to receive this order?')"
                                href="{{ route('materials.receiveOrder', $data->id) }}" class="btn btn-info">Receive
                                    Order</a>
                            @else
                                <a class="btn btn-outline-success">No order</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
