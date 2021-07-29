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



    <div class="d-flex justify-content-between mt-2 container">
        <div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createNewOrder">
                Create New Order
            </button>
        </div>

        <div>
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#vendorList">
                Show Vendor List
            </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#vendor">
                Add Vendor
            </button>
        </div>
    </div>





    {{-- Table --}}
    <div class="container mt-3 ">
        <table class="table table-hover table-responsive shadow-lg">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col" style="width: 20%;">Description</th>
                    <th scope="col">Vendor Name</th>
                    <th scope="col">Product/Kg Material</th>
                    <th scope="col">Material Price/Kg</th>
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
                        <td>{{ $data->product_per_kg }} Piece</td>
                        <td>{{ $data->product_price_per_kg }} Tk</td>
                        <td>{{ $data->available_quantity }}</td>
                        <td>{{ $data->status }}</td>
                        <td>{{ $data->order_quantity }}</td>
                        <td>{{ $data->order_date }}</td>
                        <td>
                            <a href="{{ route('raw.updateOrder', $data['id']) }}">
                                <span data-feather="mouse-pointer">Order</span></a> ||
                            <a onclick="return confirm('Are you sure you want to delete this herb?')" href="{{ route('material.delete', $data['id']) }}"><span data-feather="trash-2">Delete</span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <!--vendor Modal-->
    <div class="modal fade" id="vendor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Vendor</h5>

                </div>
                <form method="post" action="{{ route('raw.createVendor') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name:</label>
                            <input required type="text" name="name" class="form-control" id=""
                                placeholder="Enter Vendor Name">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Decription:</label>
                            <input required type="text" name="description" class="form-control" id=""
                                placeholder="Enter Description">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Contact:</label>
                            <input required type="tel" name="contact" class="form-control" id="" placeholder="01*********">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Email:</label>
                            <input required type="email" name="email" class="form-control" id="" placeholder="abc@xyz.com">
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Vendor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Show vendor list Modal -->
    <div class="modal fade bg-dark bg-gradient" id="vendorList" tabindex="-1" data-keyboard="false"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl ">
            <div class="modal-content">
                <div class="modal-header text-light bg-info">
                    <h5 class="modal-title" id="exampleModalLabel">List of Available Vendors</h5>

                    <button type="button" class="btn btn-close p-3 " data-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body rounded ">
                    <table class="table rounded">
                        <thead>
                            <tr>
                                <th scope="col">Sl</th>
                                <th scope="col">Name</th>
                                <th scope="col" style="width: 30%">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        @foreach ($vendors as $key => $data)
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->description }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->contact }}</td>
                                    <td>
                                        <a onclick="return confirm('Are you sure you want to delete this vendor?')" href="{{ route('vendor.delete', $data['id']) }}"><span data-feather="trash-2">Delete</span></a>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>
    </div>




    <!--create new order Modal-->
    <div class="modal fade" id="createNewOrder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Place New order</h5>
                </div>

                <form method="post" action="{{ route('raw.createOrder') }}">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">Name</label>
                            <input required type="text" name="name" class="form-control" id="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Description</label>
                            <input required type="text" name="description" class="form-control" id="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Vendor</label>
                            <select name="vendor_id" id="" class="form-control">
                                <option value="">Select A Vendor</option>
                                @foreach ($vendors as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Product Per Kg</label>
                            <input required type="text" name="product_per_kg" class="form-control" id="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Product Price Per Kg</label>
                            <input required type="string" step=0.01 name="product_price_per_kg" class="form-control" id="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Order Quantity(Kg)</label>
                            <input required type="number" step=0.01 name="order_quantity" class="form-control" id="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Date</label>
                            <input required type="date" value="{{date('Y-m-d')}}" min="{{date('Y-m-d')}}" name="order_date" class="form-control" id="">
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button onclick="return confirm('Are you sure you want to place this order?')" type="submit"
                            class="btn btn-primary">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




@endsection
