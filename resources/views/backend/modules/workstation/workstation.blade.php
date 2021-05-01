@extends('backend.adminHome')

@section('content')


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#createworkstation">
        Add New Workstation
    </button>

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
                            <input type="text" name="name" class="form-control" id="" placeholder="Enter Machine Name">

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
                            <input type="text" name="manufacturer" class="form-control" id=""
                                placeholder="Enter Manufacturer Name">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Output (per Min):</label>
                            <input type="number" name="output" class="form-control" id=""
                                placeholder="1000 tablet/bottle per min">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" id="">
                                <option value="none">--------</option>
                                <option value="available">Available</option>
                                <option value="occupied">Occupied</option>
                            </select>
                        </div>


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
    <div class="container mt-3 form-control bg-dark">
        <table class="table table-info table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Workstation Name</th>
                    <th scope="col" style="width: 30%">Description</th>
                    <th scope="col">Manufacturer</th>
                    <th scope="col">Output (per Min)</th>
                    <th scope="col">Status</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($workstations as $key => $data)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->description }}</td>
                        <td>{{ $data->manufacturer }}</td>
                        <td>{{ $data->output }}</td>
                        <td>{{ $data->status }}</td>
                        <td>

                            <div class="dropdown">
                                <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        @if ($data->status == 'available')
                                            <a class="btn" href="{{ route('completedUpdate', ['id' => $data->id, 'status' => 'occupied']) }}">Make Occupied</a>
                                        @elseif ( $data->status == 'occupied')
                                            <a class="btn" href="{{ route('completedUpdate', ['id' => $data->id, 'status' => 'available']) }}">Make Available</a>
                                        @else
                                            <a class="btn" href="">None</a>
                                        @endif
                                    </li>

                                    <li class="bg-info"><a class="btn" href="">View</span></a></li>
                                    <li class="bg-danger"><a class="btn text-light" href="">Delete</span></a></li>



                                </ul>
                            </div>

                        </td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>



@endsection
