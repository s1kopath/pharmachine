@extends('backend.adminHome')
@section('content')


    <form method="post" action="{{ route('raw.sendOrder', $placeMaterialOrders['id']) }}">
        @csrf
        @method('put')

        <div class="modal-body form-control bg-gradient bg-warning">
            <div class="form-control container">

                <div class="form-group">
                    <label for="">Material Name: </label>
                    <input type="text" readonly value="{{ $placeMaterialOrders['name'] }}" name="name" class=" form-control-plaintext" id="">
                </div>

                <div class="form-group">
                    <label for="">Description: </label>
                    <input type="text" readonly value="{{ $placeMaterialOrders['description'] }}" name="description" class=" form-control-plaintext" id="">
                </div>

                <div class="form-group">
                    <label for="">Last Ordered on: </label>
                    <input type="text" readonly value="{{ $placeMaterialOrders['order_date'] }}" name="order_date" class=" form-control-plaintext" id="">
                </div>

                <div class="form-group">
                    <label for="">Available Quantity(Kg): </label>
                    <input type="number" readonly value="{{ $placeMaterialOrders['available_quantity'] }}" name="order_quantity" class="form-control-plaintext " id="">
                </div>
                <br>

                <div class="form-group">
                    <label for="">Vendor</label>
                    <select name="vendor_id" id="" class="form-control">
                        <option value="null">Select Vendor</option>
                        @foreach ($vendors as $data)
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="">Order Quantity(Kg)</label>
                    <input type="number" name="order_quantity" class="form-control" id="">
                </div>
                <br>

                <div class="form-group">
                    <label for="">Date</label>
                    <input type="date" name="order_date" class="form-control" id="">
                </div>
                <br>
            </div>
            <div class="modal-footer">
                <a type="Back" class="btn btn-danger" href="{{ route('raw.dashboard') }}">Cancel</a>
                <button type="submit" class="btn btn-primary">Place Order</button>
            </div>
        </div>

    </form>

@endsection
