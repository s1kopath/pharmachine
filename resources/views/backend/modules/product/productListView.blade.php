@extends('backend/modules/product/product')
@section('productView')


{{-- Table --}}
<div class="container mt-3 bg-info form-control rounded">
    <table class="table table-primary table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Product Type</th>
                <th scope="col" style="width: 30%">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($products as $data)
                <tr>
                    <th>{{ $data->id }}</th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->product_type }}</td>
                    <td>{{ $data->description }}</td>
                    <td>
                        <img style="width: 100px;" src="{{url('/files/product/'.$data->image)}}" alt="">
                    </td>
                    <td>
                        <a class="btn btn-success" href="">View</a> ||
                        <a class="btn btn-warning" href="{{ route('product.update', $data['id']) }}">Update</a> ||
                        <a class="btn btn-danger" href="{{ route('product.delete', $data['id']) }}">Delete</a>
                    </td>
                </tr>

            @endforeach

        </tbody>
    </table>
</div>

@endsection
