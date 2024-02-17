@extends('backend.adminHome')
@section('content')
    @if (session()->has('error'))
        <div class="alert alert-danger d-flex justify-content-between">
            {{ session()->get('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- <div class="container form-control text-light" style="background-image: url('{{ asset('images/form5.jpg') }}'); background-repeat: no-repeat;
                background-size: 100% 100%"> --}}
    <div class="container  text-dark">
        <form class=" mt-5" method="post" action="{{ route('manufacturingOrder.create') }}">
            @csrf
            {{-- 1st row --}}
            <input type="hidden" id="deman_id" name="demand_id" value="{{ $demand->id }}">
            <div class="row">
                {{-- 1st col --}}
                <div class="col-md-4">
                    <div class="form-group d-flex justify-content-between">
                        <label>Manufacturing Number: </label>
                        <input type="text" readonly value="MO 00{{ $demand->id }}" name="manufacturing_number"
                            class="form-control " id="" placeholder="">
                    </div>
                    <br>
                    <div class="form-group d-flex justify-content-between">
                        <label>Warehouse Lot Number: </label>
                        <input type="text" readonly class="form-control " value="WL 01{{ $demand->id }}"
                            name="warehouse_number" placeholder="">
                    </div>
                </div>
                {{-- 2nd col --}}
                <div class="col-md-4">
                    <div class="form-group d-flex justify-content-between">
                        <label>Product Name: </label>
                        <input readonly value="{{ $demand->demandProduct->name }}" type="string" class="form-control "
                            id="">
                        <input type="hidden" name="product_id" value="{{ $demand->product_id }}">
                        {{-- <select class="form-control bg-secondary text-light" name="product_id" id="" disabled="true">
                            <option value="none">Seclect Product</option>
                            @foreach ($products as $data)
                                <option @if ($demand->product_id == $data->id) selected @endif value="{{ $data->id }}">{{ $data->name }}</option>
                            @endforeach
                        </select> --}}
                    </div>
                    <br>
                    <div class="form-group d-flex justify-content-between">
                        <label>Quantity
                            (units): </label>
                        <input name="quantity" readonly value="{{ $demand->product_quantity }}" type="string"
                            class="form-control " id="">
                    </div>
                </div>
                {{-- 3rd col --}}
                <div class="col-md-4">
                    <div class="form-group d-flex justify-content-between">
                        <label>
                            <span class="badge bg-success rounded-pill">1</span>
                            Raw Materials:
                        </label>
                        <select class="form-control" name="material_id" id="material_id">
                            <option value="none">Seclect Raw Materials</option>
                            @foreach ($materials as $data)
                                <option value="{{ $data->id }}">{{ $data->name }}
                                    (<small>{{ $data->available_quantity }}</small>)
                                    Kg
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group d-flex justify-content-between">
                        <label>Material Quantity(Kg): </label>
                        <input name="material_quantity" readonly type="string" class="form-control" id="material_quantity">
                    </div>
                </div>
            </div>

            <br>
            {{-- 2nd row --}}
            <div class="row">
                {{-- 1st col --}}
                <div class="col-6">
                    <div class="form-group d-flex justify-content-between">
                        <label>
                            <span class="badge bg-primary rounded-pill">2</span>
                            Select Worker:
                        </label>
                        <select class="form-control" name="worker_id" id="worker_id">
                            <option value="none">Select Worker</option>
                            @foreach ($workers as $data)
                                <option value="{{ $data->id }}">{{ $data->workerUser->name }}
                                    @if ($data->status == 'Unavailable')
                                        ({{ $data->workerManufacturing->finishing_date }})
                                    @endif
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- 2nd col --}}
                <div class="col-6">
                    <div class="form-group d-flex justify-content-between">
                        <label>
                            <span class="badge bg-warning rounded-pill">3</span>
                            Select Workstation:
                        </label>
                        <select class="form-control" name="workstation_id" id="workstation_id">
                            <option value="none">Select Workstation</option>
                            @foreach ($workstations as $data)
                                <option value="{{ $data->id }}">{{ $data->name }}
                                    @if ($data->status == 'occupied' && $data->workstationManufacturing)
                                        ({{ $data->workstationManufacturing->finishing_date }})
                                    @endif
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-check" style="padding-left: 32%">
                        <input class="form-check-input" type="checkbox" value="2" id="overtime">
                        <label class="form-check-label" for="overtime">
                            Work Overtime
                        </label>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-4">
                    <div class="form-group d-flex justify-content-between">
                        <label>
                            <span class="badge bg-danger rounded-pill">4</span>
                            Start Date:
                        </label>
                        <input min="{{ date('Y-m-d') }}" type="date" id="start_date" class="form-control"
                            name="start_date" placeholder="">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group d-flex justify-content-between">
                        <label>Finishing Date: </label>
                        <input min="{{ date('Y-m-d') }}" type="date" readonly id="finishing_date" class="form-control"
                            name="finishing_date" placeholder="">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group d-flex justify-content-between">
                        <label>Estimated Delivery Date: </label>
                        <input type="date" readonly value="{{ $demand->delivery_date }}" class="form-control"
                            name="delivery_date" placeholder="">
                    </div>
                </div>
            </div>
            <br>
            <br>


            <div class="form-group ">
                <label>Total Production Cost: </label>
                <input type="string" readonly class="form-control-lg" id="total_cost" name="total_cost"
                    placeholder="00.00"><span>
                    Tk</span>

                {{-- <a href="{{ route('changeStatus', ['id' => $data->id, 'status' => 'producing']) }}"
                    class="btn btn-sm btn-info" style="background-color: honeydew;">
                    Proceed to production ></a> --}}
            </div>
            <div class="text-end">
            </div>
            <br>
            <br>

            <div class="text-end">
                <a href="{{ route('pd.dashboard') }}" class="btn btn-lg btn-cancel">Back </a>
                <button onclick="return confirm('Are you sure, you want to create this manufacturing order ?')"
                    type="submit" class="btn btn-lg  btn-confirm">Confirm</button>
            </div>
            <br>
        </form>
    </div>
@endsection

{{-- script codes --}}

@push('custom_js')
    <script>
        //marterial cost calculation

        let material_id = document.querySelector('#material_id');

        material_id.addEventListener('change', function(e) {

            var id = e.target.value;
            var _deman_id = deman_id.value;

            var url = "{{ url('get-calculation-quantity') }}/" + id + "?demand_id=" + _deman_id;

            fetch(url).then(res => res.json())
                .then(res => {

                    material_quantity.value = res.data;
                    total_cost.value = res.cost;
                    // m_cost =res.cost;
                    // console.log(res.data);

                })
                .catch(err => {
                    console.log(err);
                })
        });

        //worker cost calculation

        let worker_id = document.querySelector('#worker_id');
        worker_id.addEventListener('change', function(e) {


            var w_cost = total_cost.value;

            var id = e.target.value;
            // console.log(w_cost);


            var url = "{{ url('get-calculation-total-cost') }}/" + id;

            fetch(url).then(res => res.json())
                .then(res => {
                    // console.log(res.id);
                    employee_cost = res.id;
                    total_cost.value = (w_cost * employee_cost).toFixed(2);
                })
                .catch(err => {
                    console.log(err);
                })
        });








        //workstation run time calculation
        const deman_id = document.querySelector("#deman_id")


        let workstation_id = document.querySelector('#workstation_id');

        function getDays() {


            workstation_id.addEventListener('change', function(e) {
                var id = e.target.value;
                var _deman_id = deman_id.value;

                var url = "{{ url('get-calculation-time') }}/" + id + "?demand_id=" + _deman_id;
                fetch(url).then(res => res.json())
                    .then(res => {
                        days = res.id;
                        daysDiff = days;
                    })
                    .catch(err => {
                        console.log(err);
                    })

            });
        }
        getDays();

        var startDate = document.querySelector("#start_date");
        var endDate = document.querySelector("#finishing_date");

        startDate.addEventListener('change', function(e) {

            var id = workstation_id.value;

            var _deman_id = deman_id.value;


            var _current_date = e.target.value;

            var url = "{{ url('get-calculation-time') }}/" + id + "?demand_id=" + _deman_id;

            fetch(url).then(res => res.json())
                .then(res => {
                    days = res.id;
                    endDate.value = formatDate(addDays(_current_date, days));

                })
                .catch(err => {
                    console.log(err);
                })

        })

        function addDays(date, days) {
            var result = new Date(date);
            result.setDate(result.getDate() + days);
            return result;
        }



        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [year, month, day].join('-');
        }


        //workstation overtime calculation

        let overtime = document.querySelector('#overtime');
        overtime.addEventListener('change', function(e) {

            var _start_date = startDate.value;

            var id = e.target.value;
            var url = "{{ url('get-calculation-overtime') }}/" + id

            fetch(url).then(res => res.json())
                .then(res => {
                    days = daysDiff / res;
                    // console.log(res);
                    endDate.value = formatDate(addDays(_start_date, days));
                })
        });
    </script>
@endpush
