@extends('backend.workerModules.workerDashboard')
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

    <div class="container py-4">
        <div class="row p-2 mb-4 ">
            <div class="container-fluid p-3">
                <table class="table table-hover table-responsive shadow-lg">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Manufacturing Number</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Materials</th>
                            <th scope="col">Workstation</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">Estimated Finishing Date</th>
                            <th scope="col">Warehouse Lot Number</th>
                            <th scope="col">Delivery Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $data)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $data->manufacturing_number }}</td>
                                <td>{{ $data->manufacturingProduct->name }}</td>
                                <td>{{ $data->quantity }}</td>
                                <td>{{ $data->manufacturingMaterial->name }} ({{ $data->material_quantity }} Kg)
                                </td>
                                <td>{{ $data->manufacturingWorkstation->name }}</td>
                                <td>{{ $data->start_date }}</td>
                                <td>{{ $data->finishing_date }}</td>
                                <td>{{ $data->warehouse_number }}</td>
                                <td>{{ $data->delivery_date }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    @if ($data->status == 'Waiting for production')
                                        <a class="btn btn-info"
                                            onclick="return confirm('Are you sure you want to start production?')"
                                            href="{{ route('productionUpdate', ['id' => $data->id, 'demand_id' => $data->demand_id, 'status' => 'In Production', 'demandStatus' => 'produced']) }}">Start
                                            Production</a>
                                    @elseif ($data->status == 'In Production')
                                        <a class="btn btn-warning"
                                            onclick="return confirm('Are you sure you want to finish production?')"
                                            href="{{ route('productionUpdate', ['id' => $data->id, 'demand_id' => $data->demand_id, 'status' => 'Ready for shipment', 'demandStatus' => 'deliver']) }}">Finish
                                            Production</a>
                                        <hr>
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            class="btn btn-sm btn-outline-danger">Report Workstation Damage</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    </div>
                                                    <form action="{{ route('damageReport', $data->id) }}" method="post">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">Repair
                                                                    Note:</label>
                                                                <textarea required type="string" required name="note"
                                                                    class="form-control"></textarea>
                                                                <div id="emailHelp" class="form-text">Expain in datails.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Back</button>
                                                            <button
                                                                onclick="return confirm('Are you sure you want to report a damage?')"
                                                                type="submit" class="btn btn-success">Send</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif ($data->status == 'Production paused')
                                        <a class="btn btn-outline-danger">Production Paused</a>
                                    @else
                                        <a class="btn btn-outline-secondary">Production Finished</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>



    <!-- Modal -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <form action="{{ route('damageReport', $data->id) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Repair
                                Note:</label>
                            <textarea required type="string" required name="note" class="form-control"></textarea>
                            <div id="emailHelp" class="form-text">Expain in datails.
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                        <button onclick="return confirm('Are you sure you want to report a damage?')" type="submit"
                            class="btn btn-success">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}


@endsection
