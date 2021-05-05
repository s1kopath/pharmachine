@extends('backend.adminHome')
@section('content')


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




        @foreach ($stock as $key=> $data)
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $data->stockManufacturing->warehouse_number }}</td>
                <td>{{ $data->stockManufacturing->manufacturingProduct->name }}</td>
                <td>{{ $data->stockManufacturing->quantity }} Piece</td>
                <td>{{ $data->stockManufacturing->delivery_date }}</td>
                <td>{{ $data->stockManufacturing->status }}</td>
                <td>{{ $data->user_name }}</td>
                <td>{{ $data->delivered_on }}</td>
                <td>
                    <a class="btn" href=""><span data-feather="eye">View</span></a> ||
                    <a class="btn" href=""><span data-feather="trash-2">Delete</span></a>
                </td>


            </tr>

        @endforeach
        </tbody>
    </table>
</div>


@endsection
