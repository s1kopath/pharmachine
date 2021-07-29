@extends('backend.adminHome')
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

    <!-- Button trigger modal -->
    <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
            Add New Product
        </button>
    </div>



    {{-- tabs --}}


    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link  active" href="{{ route('product.listView') }}">List View</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('product.gridView') }}">Grid View</a>
        </li>
    </ul>



    @yield('productView')


    <!-- Modal -->
    <form method="post" action="{{ route('product.create') }}" enctype="multipart/form-data">
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
                            <input required type="text" name="name" class="form-control" id="" placeholder="Name">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Select Product Type:</label>
                            <select class="form-control" name="product_type" id="">
                                <option value="">Select Type</option>
                                <option value="Tablet">Tablet</option>
                                <option value="Syrup">Syrup</option>
                                <option value="Capsule">Capsule</option>
                                <option value="Powder">Powder</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Select Raw Herbs:</label>
                            <select class="form-control" name="material_id" id="">
                                <option value="">Select Herb</option>
                                @foreach ($materials as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Enter Description:</label>
                            <input name="description" type="text" class="form-control" id="" placeholder="Description">
                        </div>

                        <br>
                        <div class="form-group">
                            <label>Select Image</label>
                            <input name="product_image" type="file" class="form-control" src="" id="">
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </form>

@endsection
