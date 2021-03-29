@extends('backend.dashboard')

@section('content')

<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#createworkstation">
    Create Workstation
</button>
<span style="color: white;">
    -------------------------------------------------------------------------------------------------------------------------------------------
</span>
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#machineList">
    Show Machine List
</button>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#machine">
    Add Machine
</button>


{{-- Table --}}
<div class="container mt-3 form-control bg-dark">
    <table class="table table-info table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Workstation</th>
                <th scope="col">Mechine</th>
                <th scope="col">Worker</th>
                <th scope="col">Labour Cost</th>
                <th scope="col">Status</th>
                <th scope="col">Planned Start</th>
                <th scope="col">Planned Finish</th>
                <th scope="col">Actions</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <th>1</th>
                <td>WS 0001</td>
                <td>Tablet press 0001</td>
                <td>Anik</td>
                <td>20 Tk/Hour</td>
                <td>Avalible</td>
                <td>Jan 06, 2021</td>
                <td>Jan 30, 2021</td>
                <td>
                    <a class="btn btn-success" href="">View</a> ||
                    <a class="btn btn-danger" href="">Delete</a>
                </td>
            </tr>
            <tr>
                <th>2</th>
                <td>WS 0002</td>
                <td>Bottle Filler 0001</td>
                <td>Antor</td>
                <td>15 Tk/Hour</td>
                <td>Avalible</td>
                <td>Jan 30, 2021</td>
                <td>Feb 30, 2021</td>
                <td>
                    <a class="btn btn-success" href="">View</a> ||
                    <a class="btn btn-danger" href="">Delete</a>
                </td>
            </tr>
            <tr>
                <th>3</th>
                <td>WS 0003</td>
                <td>Pill Blister 0001</td>
                <td>Kona</td>
                <td>12 Tk/Hour</td>
                <td>Avalible</td>
                <td>Feb 06, 2021</td>
                <td>Feb 20, 2021</td>
                <td>
                    <a class="btn btn-success" href="">View</a> ||
                    <a class="btn btn-danger" href="">Delete</a>
                </td>
            </tr>

        </tbody>
    </table>
</div>

 <!--machine Modal-->
 <div class="modal fade" id="machine" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Vendor</h5>

            </div>
            <form method="post" action="{{ route('ws.createMachine') }}">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control" id="" placeholder="Enter Machine Name">

                    </div>
                    <br>
                    <div class="form-group">
                        <label>Decription:</label>
                        <input type="text" name="description" class="form-control" id="" placeholder="Enter Description">
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Manufacturer:</label>
                        <input type="text" name="manufacturer" class="form-control" id="" placeholder="Enter Manufacturer Name">
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Output (per Min):</label>
                        <input type="text" name="output" class="form-control" id="" placeholder="1000 tablet/bottle per min">
                    </div>
                    <br>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Machine</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!--create workstation Modal-->
<div class="modal fade" id="createworkstation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<!--Show machine list Modal -->
<div class="modal fade bg-dark bg-gradient" id="machineList" tabindex="-1" data-keyboard="false"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl ">
        <div class="modal-content">
            <div class="modal-header text-light bg-info">
                <h5 class="modal-title" id="exampleModalLabel">List of Working Machines</h5>

                <button type="button" class="btn btn-close p-3 " data-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body rounded ">
                <table class="table rounded">
                    <thead>
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Name</th>
                            <th scope="col" style="width: 30%">Description</th>
                            <th scope="col">Manufacturer</th>
                            <th scope="col">Output (per Min)</th>
                            <th scope="col">Status</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    @foreach ($machines as $key => $data)
                        <tbody>
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->description }}</td>
                                <td>{{ $data->manufacturer }}</td>
                                <td>{{ $data->output }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    <a class="btn btn-primary" href="">Occupy</a> ||
                                    <a class="btn btn-success" href="">View</a> ||
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
