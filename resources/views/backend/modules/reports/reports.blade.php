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

    @if (isset($fromDate))
        <div class="alert alert-info d-flex justify-content-between">
            Report generated for '{{ $fromDate }}' to {{ $toDate }} , Showing ({{ count($search) }}) records.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif







    {{-- data table --}}
    <div class="container">

        <div class="row form-control">
            <form action="{{ route('report.generate') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <input type="date" class="form-control" name="from_date">
                    </div>
                    <div class="col-md-4">
                        <input type="date" class="form-control" name="to_date">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-light" type="submit">Search</button>
                    </div>


                    {{-- <div class="col text-end">
                        <button class="btn btn-success" onclick="window.print()"><span data-feather="printer"></span></button>
                    </div> --}}


                    <div class="col text-end">
                        <button class="btn btn-success" onclick="printDiv('printableArea')" onclick="window.print()"><span
                                data-feather="printer"></span></button>
                    </div>

                </div>
            </form>
            <br>
            <hr>

            <div id="printableArea">
                @if (isset($fromDate))
                <div class="container">
                    <h2>Production report from: {{ date('M-d, Y', strtotime($fromDate)) }} to {{ date('M-d, Y', strtotime($toDate)) }} </h2>
                    <h3>Number of records: {{ count($search) }}</h3>
                </div>
                @endif
                <table class="table rounded">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Manufacturing Number</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Assigned Worker</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">Finishing Date</th>
                            <th scope="col">Delivery Date</th>
                            <th scope="col">Delivery By</th>
                            <th scope="col">Total Production Cost</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($search as $key => $data)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $data->manufacturing_number }}</td>
                                <td>{{ $data->manufacturingProduct->name }}</td>
                                <td>{{ $data->quantity }}</td>
                                <td>{{ $data->manufacturingWorker->workerUser->name }}</td>
                                <td>{{ $data->start_date }}</td>
                                <td>{{ $data->finishing_date }}</td>
                                <td>{{ $data->deliveryName->delivered_on }}</td>
                                <td>{{ $data->deliveryName->user_name }}</td>
                                <td>{{ $data->total_cost }} BDT</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                @if (isset($fromDate))
                    <div class="row mt-3 d-flex justify-content-between">
                        <div class="col">
                            <p>Prepared By,</p>
                            <p>Date: {{ $time }}</p>
                        </div>
                        <div class="col">
                            <h3 class="border-bottom text-secondary">Production Manager</h3>
                            <h5>Ergon Pharmaceuticals Ltd,</h5>
                            <p>House # 04 (3rd Floor), Mohakhali C/A, Dhaka-1212, Bangladesh.</p>
                            <p>Tel : +02 989 42 92.</p>
                        </div>

                @endif
            </div>
        </div>



        <br>


    </div>





@endsection
