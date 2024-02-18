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
    {{-- <form action="{{ route('workstation.search') }}" method="GET"> --}}
    <div class="d-flex justify-content-between mt-2 container">
        <div class="row">
            <div class="col-md-8">
                <input class="form-control" name="search" type="text" value="">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-info">Search</button>
            </div>
        </div>

        <div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createworkstation">
                Add New Workstation
            </button>
        </div>
    </div>


    {{-- <form> --}}
    <!--workstation Modal-->
    <div class="modal fade p-5 rounded" id="createworkstation" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg rounded">
            <div class="modal-content">
                <div class="text-center p-3 bg-warning">
                    <h2 class="modal-title" id="exampleModalLabel">New Workstation</h2>
                </div>
                <form method="post" action="{{ route('ws.createWorkstation') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Workstation Name:</label>
                            <input required type="text" name="name" class="form-control" id=""
                                placeholder="Enter Machine Name">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Decription:</label>
                            <input type="text" name="description" class="form-control" id=""
                                placeholder="Enter Description">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Manufacturer:</label>
                            <input required type="text" name="manufacturer" class="form-control" id=""
                                placeholder="Enter Manufacturer Name">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Output (per Min):</label>
                            <input required type="number" name="output" class="form-control" id=""
                                placeholder="1000 tablet/bottle per min">
                        </div>
                        {{-- <br>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" id="">
                                <option value="">--------</option>
                                <option value="available">Available</option>
                                <option value="occupied">Occupied</option>
                            </select>
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Workstation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- Table --}}
    <div class="container mt-3">
        <table class="table table-hover table-responsive shadow-lg">
            <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Workstation Name</th>
                    <th scope="col" style="width: 30%">Description</th>
                    <th scope="col">Manufacturer</th>
                    <th scope="col">Output (per hour)</th>
                    <th scope="col">Status</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($workstations as $key => $data)
                    <tr @if ($data->status == 'Workstation damaged') class="bg-danger text-light" @endif>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->description }}</td>
                        <td>{{ $data->manufacturer }}</td>
                        <td>{{ $data->output }}</td>

                        @if ($data->status == 'Workstation damaged')
                            <td class="bg-light text-dark">
                                <div>
                                    Issue: {{ $data->damageReport->note }}
                                    <br>
                                    Reported by: {{ $data->damageReport->reportWorker->workerUser->name }}
                                    <br>
                                    Reported on: {{ $data->damageReport->created_at->format('d-M-Y') }}
                                </div>
                            </td>
                        @else
                            <td>
                                {{ $data->status }}
                            </td>
                        @endif

                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        @if ($data->status == 'available')
                                            <a class="btn"
                                                href="{{ route('completedUpdate', ['id' => $data->id, 'status' => 'occupied']) }}">Make
                                                Occupied</a>
                                        @elseif ($data->status == 'occupied')
                                            <a class="btn"
                                                href="{{ route('completedUpdate', ['id' => $data->id, 'status' => 'available']) }}">Make
                                                Available</a>
                                        @elseif ($data->status == 'Workstation damaged')
                                            <a class="btn btn-success"
                                                href="{{ route('ws.requestRepair', $data->id) }}">Request For
                                                Repair</a>
                                        @else
                                            <a class="btn" href="">None</a>
                                        @endif
                                    </li>
                                    <li class="bg-danger">
                                        <a onclick="return confirm('Are you sure you want to remove this workstation?')"
                                            class="btn text-light" href="{{ route('delete.workstation', $data['id']) }}">
                                            Remove machine
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>



@endsection
