@extends('backend.dashboard')
@section('content')

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createOrder">
        Create Order
    </button>
    <span style="color: white;">
        -------------------------------------------------------------------------------------------------------------------------------------------------------
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
                    <th scope="col">Vendor Name</th>
                    <th scope="col" style="width: 20%;">Description</th>
                    <th scope="col">Total Qty</th>
                    <th scope="col">Available Qty</th>
                    <th scope="col">Order Status</th>
                    <th scope="col">Ordered Qty</th>
                    <th scope="col">Last Ordered</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>1</th>
                    <td>DECALSO</td>
                    <td>Luke Corpp</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, culpa!</td>
                    <td>110 Kg</td>
                    <td>10 Kg</td>
                    <td>Ordered</td>
                    <td>300 Kg</td>
                    <td>Jan 06, 2021</td>
                    <td>
                        <a class="btn btn-success" href="">View</a> ||
                        <a class="btn btn-danger" href="">Delete</a>
                    </td>
                </tr>
                <tr>
                    <th>1</th>
                    <td>DECALSO</td>
                    <td>Luke Corpp</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, culpa!</td>
                    <td>110 Kg</td>
                    <td>10 Kg</td>
                    <td>Ordered</td>
                    <td>300 Kg</td>
                    <td>Jan 06, 2021</td>
                    <td>
                        <a class="btn btn-success" href="">View</a> ||
                        <a class="btn btn-danger" href="">Delete</a>
                    </td>
                </tr>
                <tr>
                    <th>1</th>
                    <td>DECALSO</td>
                    <td>Luke Corpp</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, culpa!</td>
                    <td>110 Kg</td>
                    <td>10 Kg</td>
                    <td>Ordered</td>
                    <td>300 Kg</td>
                    <td>Jan 06, 2021</td>
                    <td>
                        <a class="btn btn-success" href="">View</a> ||
                        <a class="btn btn-danger" href="">Delete</a>
                    </td>
                </tr>
                <tr>
                    <th>1</th>
                    <td>DECALSO</td>
                    <td>Luke Corpp</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, culpa!</td>
                    <td>110 Kg</td>
                    <td>10 Kg</td>
                    <td>Ordered</td>
                    <td>300 Kg</td>
                    <td>Jan 06, 2021</td>
                    <td>
                        <a class="btn btn-success" href="">View</a> ||
                        <a class="btn btn-danger" href="">Delete</a>
                    </td>
                </tr>

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


    <!--create order Modal-->
    <div class="modal fade" id="createOrder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
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
                                        <a class="btn btn-success" href="">View</a> ||
                                        <a class="btn btn-warning" href="">Update</a> ||
                                        <a class="btn btn-danger" href="">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection
