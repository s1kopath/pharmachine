@extends('backend/modules/product/product')
@section('productView')


{{-- Table --}}
<div class="container mt-3 bg-info form-control rounded">
    <table class="table table-primary table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Sl</th>
                <th scope="col">Name</th>
                <th scope="col">Product Type</th>
                <th scope="col" style="width: 30%">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key=>$data)
                <tr>
                    <th>{{ $key+1 }}</th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->product_type }}</td>
                    <td>{{ $data->description }}</td>
                    <td>
                        <img style="width: 100px;" src="{{url('/files/product/'.$data->image)}}" alt="">
                    </td>
                    <td>
                        <a class="btn" href=""><span data-feather="eye">View</span></a> ||
                        <a class="btn" href="{{ route('product.update', $data['id']) }}"><span data-feather="edit">Update</span></a> ||
                        <a class="btn" href="{{ route('product.delete', $data['id']) }}"><span data-feather="trash-2">Delete</span></a>
                    </td>
                </tr>

            @endforeach

        </tbody>
    </table>
    <span>{{$products->links()}}</span>
    <style>
        .w-5{
            display: none;
        }
    </style>

</div>

@endsection
