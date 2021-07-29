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

    <form method="post" action="{{ route('raw.sendOrder', $placeMaterialOrders['id']) }}">
        @csrf
        @method('put')

        <div class="modal-body form-control bg-gradient bg-warning">
            <div class="form-control container">

                <div class="bg-light shadow p-3 rounded">
                    <h2>Material Name: {{ $placeMaterialOrders['name'] }}</h2>
                    <small>Description: {{ $placeMaterialOrders['description'] }}</small>
                    <p>Last Ordered on: {{ $placeMaterialOrders['order_date'] }}</p>
                    <p>Available Quantity: {{ $placeMaterialOrders['available_quantity'] }} Kg</p>
                </div>
                <div class="mt-3 shadow-lg p-3 rounded">
                    <div class="form-group">
                        <label for="">Vendor</label>
                        <select name="vendor_id" id="" class="form-control">
                            <option value="">Select Vendor</option>
                            @foreach ($vendors as $data)
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Order Quantity(Kg)</label>
                        <input required type="number" name="order_quantity" class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Date</label>
                        <input required type="date" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}" name="order_date" class="form-control" id="">
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <a type="Back" class="btn btn-danger" href="{{ route('raw.dashboard') }}">Cancel</a>
                <button onclick="return confirm('Are you sure you want to place this order?')" type="submit"
                    class="btn btn-primary">Place Order</button>
            </div>
        </div>

    </form>

@endsection
