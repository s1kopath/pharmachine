@extends('backend.dashboard')
@section('content')

    <!-- Button trigger modal -->

    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
        Add New Product
    </button>



    {{-- Table --}}
    <div class="container mt-3 form-control">
        <table class="table table-secondary table-bordered">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Product Type</th>
                    <th scope="col">Description</th>
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
                        <td><img src="{{ $data->image }}" alt=""></td>
                        <td>
                            <a class="btn btn-success" href="">View</a> ||
                            <a class="btn btn-warning" href="">Update</a> ||
                            <a class="btn btn-danger" href="">Delete</a>
                        </td>
                    </tr>

                @endforeach

            </tbody>
        </table>
    </div>


    <!-- Modal -->
    <form method="post" action="{{ route('product.create') }}">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">New Product</h5>
                        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                    </div>

                    <div class="modal-body">


                        <div class="form-group">
                            <label>Enter Product Name:</label>
                            <input type="text" name="name" class="form-control" id="" placeholder="Name">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Select Product Type:</label>
                            <select class="form-control" name="product_type" id="">
                                <option value="none">(none)</option>
                                <option value="Tablet">Tablet</option>
                                <option value="Syrup">Syrup</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Enter Description:</label>
                            <input name="description" type="text" class="form-control" id="" placeholder="Description">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Image</label>
                            <input name="image" type="file" class="form-control" src="" id="">
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        </div>

                    </div>

                </div>
            </div>
    </form>
@endsection
