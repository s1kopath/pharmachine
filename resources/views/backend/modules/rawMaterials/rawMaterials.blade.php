@extends('backend.adminHome')
@section('content')

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createNewOrder">
        Create New Order
    </button>
    <span style="color: white;">
        ----------------------------------------------------------------------------------------------------------------------------------------------
    </span>
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#vendorList">
        Show Vendor List
    </button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#vendor">
        Add Vendor
    </button>



    {{-- Table --}}
    <div class="container mt-3 form-control bg-warning rounded">
        <table class="table table-secondary table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col" style="width: 20%;">Description</th>
                    <th scope="col">Vendor Name</th>
                    <th scope="col">Total Qty(Kg)</th>
                    <th scope="col">Available Qty(Kg)</th>
                    <th scope="col">Order Status</th>
                    <th scope="col">Ordered Qty(Kg)</th>
                    <th scope="col">Last Ordered</th>
                    <th scopÊe="col" style="width: 9%;">Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($materials as $key=>$data)
                <tr @if ($data->available_quantity < 10)
                    class="text-danger"
                @endif>

                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->description }}</td>
                    <td>{{ $data->materialVendor->name }}</td>
                    <td>{{ $data->total_quantity }}</td>
                    <td>{{ $data->available_quantity }}</td>
                    <td>{{ $data->status }}</td>
                    <td>{{ $data->order_quantity }}</td>
                    <td>{{ $data->order_date }}</td>
                    <td>
                        <a href="{{ route('raw.updateOrder', $data['id']) }}">
                            <span data-feather="mouse-pointer">Order</span></a> ||
                        <a href=""><span data-feather="eye">View</span></a> ||
                        <a href=""><span data-feather="trash-2">Delete</span></a>
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
                            <input type="text" name="name" class="form-control" id="" placeholder="Enter Vendor Name">

                        </div>
                        <br>
                        <div class="form-group">
                            <label>Decription:</label>
                            <input type="text" name="description" class="form-control" id=""
                                placeholder="Enter Description">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Contact:</label>
                            <input type="tel" name="contact" class="form-control" id="" placeholder="01*********">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" name="email" class="form-control" id="" placeholder="abc@xyz.com">
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
                                        <a href=""><span data-feather="eye">View</span></a> ||
                                        <a href=""><span data-feather="edit">Update</span></a> ||
                                        <a href=""><span data-feather="trash-2">Delete</span></a>
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Place New order</h5>
                </div>

                <form method="post" action="{{ route('raw.createOrder') }}">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" id="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" name="description" class="form-control" id="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Vendor</label>
                            <select name="vendor_id" id="" class="form-control" >
                                <option value="null" >Select A Vendor</option>
                                @foreach ($vendors as $data)
                                    <option value="{{ $data->id }}" >{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Order Quantity(Kg)</label>
                            <input type="number" step=0.01 name="order_quantity" class="form-control" id="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Date</label>
                            <input type="date" name="order_date" class="form-control" id="">
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




@endsection
