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

    {{-- Table --}}
    <div class="container mt-3 form-control bg-warning rounded">
        <table class="table table-secondary table-bordered">
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
                                <a href="{{ route('materials.receiveOrder', $data->id) }}" class="btn btn-success">Recive
                                    Order</a>
                            @else
                                <a href="" class="btn btn-secondary">View</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection
