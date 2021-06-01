@extends('backend/modules/product/product')
@section('productView')


{{-- Table --}}
<div class="container mt-3 ">
    <table class="table table-hover table-responsive shadow-lg">
        <thead>
            <tr>
                <th scope="col">Sl</th>
                <th scope="col">Name</th>
                <th scope="col">Product Type</th>
                <th scope="col" style="width: 30%">Description</th>
                <th scope="col">Herbs</th>
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
                    <td>{{ $data->productMaterial->name }}</td>
                    <td>
                        <img style="width: 100px;" src="{{url('/files/product/'.$data->image)}}" alt="">
                    </td>
                    <td>
                        {{-- <a class="btn" href=""><span data-feather="eye">View</span></a> || --}}
                        <a class="btn" href="{{ route('product.update', $data['id']) }}"><span data-feather="edit">Update</span></a> ||
                        <a class="btn" onclick="return confirm('Are you sure you want to delete this item?')" href="{{ route('product.delete', $data['id']) }}"><span data-feather="trash-2">Delete</span></a>
                    </td>
                </tr>


            @endforeach

        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <span>{{$products->links()}}</span>
    </div>

</div>

@endsection
