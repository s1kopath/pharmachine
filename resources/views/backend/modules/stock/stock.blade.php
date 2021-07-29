@extends('backend.adminHome')
@section('content')

    @if (session()->has('error'))
        <div class="alert alert-danger d-flex justify-content-between">
            {{ session()->get('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form action="{{ route('stock.search') }}" method="GET">
        <div class="d-flex justify-content-between mt-2 container row p-3">
            <div class="col">
                <input class="form-control" name="search" placeholder="WL 000" type="text" value="">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-info">Search</button>
            </div>
        </div>
    </form>

    <div class="container p-3">
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
                            <a class="btn" href="{{ route('check.stockRecord', $data->id) }}"><span
                                    data-feather="eye">View</span></a>
                            @if ($data->status == 'Delivered')
                                || <a class="btn" onclick="return confirm('Are you sure you want to delete this record?')"
                                    href="{{ route('stock.delete', $data->id) }}"><span
                                        data-feather="trash-2">Delete</span></a>
                            @endif

                        </td>


                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>


@endsection
