@extends('backend.adminHome')
@section('content')


    <div class="container form-control text-light"
    style="background-image:     url('{{asset('images/form5.jpg')}}'); background-repeat: no-repeat;
    background-size: 100% 100%">

        <form class=" mt-5" method="post" action="{{ route('manufacturingOrder.create') }}">
            @csrf
            {{-- 1st row --}}
            <div class="row">
                {{-- 1st col --}}
                <div class="col-md-4">
                    <div class="form-group ">
                        <label>Manufacturing Number: </label>
                        <input type="text" value="MO 00" name="manufacturing_number" class="form-control-sm" id="" placeholder="">
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Warehouse Lot Number: </label>
                        <input type="text" class="form-control-sm" value="WL 00" name="warehouse_number" placeholder="">
                    </div>
                </div>
                {{-- 2nd col --}}
                <div class="col-md-4">
                    <div class="form-group ">
                        <label>Product Name: </label>
                        <select class="form-control-sm" name="product_id" id="">
                            <option value="none">Seclect Product</option>
                            @foreach ($products as $data)
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Quantity: </label>
                        <input  name="quantity" type="string" class="form-control-sm" id="" placeholder="00"><span> Bottles/Pieces</span>
                    </div>
                </div>
                {{-- 3rd col --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Raw Materials: </label>
                        <select class="form-control-sm" name="material_id" id="">
                            <option value="none">Seclect Raw Materials</option>
                            @foreach ($materials as $data)
                                <option value="{{ $data->id }}">{{ $data->name }} ---->>>>>
                                    <small >{{ $data -> status }}</small>
                                </option>
                            @endforeach
                        </select>


                        {{-- @foreach ($materials as $data)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                    value="{{ $data -> id }}">
                                <label class="form-check-label" for="exampleRadios1">
                                    {{ $data -> name }}
                                </label>

                            </div>
                            <small class="text-end">{{ $data -> status }}</small>
                        @endforeach --}}
                    </div>
                </div>
            </div>

            <br>
            {{-- 2nd row --}}
            <div class="row">
                {{-- 1st col --}}
                <div class="col-4">
                    <div class="form-group">
                        <label>Select Worker: </label>
                        <select class="form-control-sm" name="worker_id" id="">
                            <option value="none">Select Worker</option>
                            @foreach ($workers as $data)
                                <option value="{{ $data->id }}">{{ $data-> name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Select Workstation: </label>
                        <select class="form-control-sm" name="workstation_id" id="">
                            <option value="none">Select Workstation</option>
                            @foreach ($workstations as $data)
                                <option value="{{ $data->id }}">{{ $data-> name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- 2nd col --}}
                <div class="col-4">
                    <div class="form-group">
                        <label>Start Date: </label>
                        <input type="date" class="form-control-sm" name="start_date" placeholder="">
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Finishing Date: </label>
                        <input type="date" class="form-control-sm" name="finishing_date" placeholder="">
                    </div>
                </div>
                {{-- 3rd col --}}
                <div class="col-4">
                    <div class="form-group">
                        <label>Estimated Delivery Date: </label>
                        <input type="date" class="form-control-sm" name="delivery_date" placeholder="">
                    </div>
                </div>
            </div>

            <br>
            <br>
            <br>
            <br>

            <div class="form-group">
                <label>Total Production Cost: </label>
                <input type="string" class="form-control-lg" name="total_cost" placeholder="00.00"><span> Tk</span>
            </div>
            <br>
            <br>

            <div class="text-end">
                <a href="{{ route('pp.dashboard') }}" class="btn btn-lg btn-secondary">Back </a>
                <button type="submit" class="btn btn-lg btn-info">Confirm</button>
            </div>
            <br>
        </form>
    </div>



@endsection
