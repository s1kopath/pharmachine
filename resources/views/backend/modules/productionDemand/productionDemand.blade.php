@extends('backend.adminHome')
@section('content')



    <style>
        .box {
            height: 4em;
            text-align: left;
            border: 2px solid gray;
        }

        .card {
            margin-top: 2px;
            height: 10em;

            border: none;
        }

        .proceed {
            background-color: honeydew;
            border: block;
            border: 1px solid gray;
        }

        .act {
            color: rgb(228, 228, 228);
        }

    </style>



    <div class="">
        <div class="row">
            <div class="col box">Recieved Demand <a href="" data-feather="plus" data-toggle="modal"
                    data-target="#exampleModal"></a><br> Orders: 01</div>
            <div class="col box">Waiting for Confirmation <br> Orders: 00</div>
            <div class="col box">Confirmed <br> Orders: 00</div>
            <div class="col box">Waiting for Production <br> Orders: 02</div>
            <div class="col box">In Production <br> Orders: 30</div>
            <div class="col box">Ready for Shipment <br> Orders: 01</div>
        </div>




        @foreach ($demands as $data)
            <div class="row">

                @if ($data->status == 'pending')
                    <div class="col card proceed">
                        <div>
                            <h5>{{ $data->demandProduct->name }}</h5>
                            <h6>Quantity: {{ $data->product_quantity }}</h6>
                            <p>Delivery date: {{ $data->delivery_date }}</p>
                        </div>
                        <a href="{{ route('changeStatus', ['id' => $data->id, 'status' => 'processing']) }}" class="btn btn-sm btn-info" style="background-color: honeydew;"
                        >Proceed to confirm ></a>
                    </div>
                @else
                    <div class="col card act" data-feather="arrow-right">.</div>
                @endif

                @if ($data->status == 'processing')
                    <div class="col card proceed">
                        <div>
                            <h5>{{ $data->demandProduct->name }}</h5>
                            <h6>Quantity: {{ $data->product_quantity }}</h6>
                            <p>Delivery date: {{ $data->delivery_date }}</p>
                        </div>
                        <a href="{{ route('changeStatus', ['id' => $data->id, 'status' => 'confirm']) }}" class="btn btn-sm btn-info" style="background-color: honeydew;">Confirm ></a></div>
                @else
                    <div class="col card act" data-feather="arrow-right">.</div>
                @endif

                @if ($data->status == 'confirm')
                    <div class="col card proceed">
                        <div>
                            <h5>{{ $data->demandProduct->name }}</h5>
                            <h6>Quantity: {{ $data->product_quantity }}</h6>
                            <p>Delivery date: {{ $data->delivery_date }}</p>
                        </div>
                        <a href="{{ route('changeStatus', ['id' => $data->id, 'status' => 'producing']) }}" class="btn btn-sm btn-info" style="background-color: honeydew;">Proceed to production ></a></div>
                @else
                    <div class="col card act" data-feather="arrow-right">.</div>
                @endif

                @if ($data->status == 'producing')
                    <div class="col card proceed">
                        <div>
                            <h5>{{ $data->demandProduct->name }}</h5>
                            <h6>Quantity: {{ $data->product_quantity }}</h6>
                            <p>Delivery date: {{ $data->delivery_date }}</p>
                        </div>
                        <a href="{{ route('changeStatus', ['id' => $data->id, 'status' => 'produced']) }}" class="btn btn-sm btn-info" style="background-color: honeydew;">Finish production ></a></div>
                @else
                    <div class="col card act" data-feather="arrow-right">.</div>
                @endif

                @if ($data->status == 'produced')
                    <div class="col card proceed">
                        <div>
                            <h5>{{ $data->demandProduct->name }}</h5>
                            <h6>Quantity: {{ $data->product_quantity }}</h6>
                            <p>Delivery date: {{ $data->delivery_date }}</p>
                        </div>
                        <a href="{{ route('changeStatus', ['id' => $data->id, 'status' => 'deliver']) }}" class="btn btn-sm btn-info" style="background-color: honeydew;">Proceed to shipment ></a></div>
                @else
                    <div class="col card act" data-feather="arrow-right">.</div>
                @endif

                @if ($data->status == 'deliver')
                    <div class="col card proceed">
                        <div>
                            <h5>{{ $data->demandProduct->name }}</h5>
                            <h6>Quantity: {{ $data->product_quantity }}</h6>
                            <p>Delivery date: {{ $data->delivery_date }}</p>
                        </div>
                        <a href="{{ route('deleteStatus', $data['id']) }}" class="btn btn-sm btn-info" style="background-color: honeydew;">Proceed to delivery ></a></div>
                @else
                    <div class="col card act" data-feather="arrow-right">.</div>
                @endif
            </div>
        @endforeach










        <!-- Demo DEmand model -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="p-3 text-center bg-danger text-light">
                        <h5 class="modal-title">Demand Creator</h5>
                    </div>
                    <form method="post" action="{{ route('demand.create') }}">
                        @csrf
                        <div class="modal-body fw-bold">
                            <div class="form-group">
                                <label>Product: </label>
                                <select class="form-control-lg" name="product_id" id="">
                                    <option value="none">Seclect Product</option>
                                    @foreach ($products as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Quantity: </label>
                                <input type="number" class="form-control-sm m-1"
                                    name="product_quantity"><span>Bottles/Pieces</span>
                            </div>
                            <div class="form-group">
                                <label>Delivery Date:</label>
                                <input type="date" class="form-control-sm m-1" name="delivery_date">
                            </div>
                            <div class="form-group">
                                <label>Status: </label>
                                <select name="status" class="form-control-lg">
                                    <option value="pending">Pending</option>
                                    <option value="processing">Processing</option>
                                    <option value="confirm">Confirm</option>
                                    <option value="producing">Producing</option>
                                    <option value="produced">Produced</option>
                                    <option value="deliver">Deliver</option>
                                </select>
                            </div>
                            <div class="modal-footer bg-dark">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info">Create</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
