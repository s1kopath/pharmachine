@extends('backend.dashboard')

@section('content')



    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
        Add Worker
    </button>


    {{-- Table --}}
    <div class="container mt-3 form-control">
        <table class="table table-secondary table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Age</th>
                    <th scope="col">Joining Date</th>
                    <th scope="col">Monthly Salary</th>
                    <th scope="col">Labour per hour</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($workers as $data)
                    <tr>
                        <th>{{ $data->id }}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->address }}</td>
                        <td>{{ $data->contact }}</td>
                        <td>{{ $data->gender }}</td>
                        <td>{{ $data->date_of_birth }}</td>
                        <td>{{ $data->age }} Years</td>
                        <td>{{ $data->joining_date }}</td>
                        <td>{{ $data->salary }} Tk</td>
                        <td>{{ $data->labour_per_hour }}Tk</td>
                        <td>
                            <a class="btn btn-success" href="">View</a> ||
                            <a class="btn btn-warning" href="">Update</a> ||
                            <a class="btn btn-danger" href="">Delete</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Worker</h5>
                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('worker.create') }}">
                        @csrf
                        <div class="form-group">
                            <label>Enter Name:</label>
                            <input type="name" name="name" class="form-control" placeholder="Name" id="">
                        </div><br>
                        <div class="form-group">
                            <label>Enter Address:</label>
                            <input type="address" name="address" class="form-control" placeholder="Address" id="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Enter Contact Number:</label>
                            <input type="tel" name="contact" class="form-control" placeholder="01*********" id="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Select Gender</label>
                            <select class="form-control" name="gender" id="">
                                <option value="none">(none)</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Enter Date of Birth:</label>
                            <input type="date" name="date_of_birth" class="form-control" placeholder="Date of Birth" id="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Enter Age:</label>
                            <input type="number" name="age" class="form-control" placeholder="Age" id="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Enter Joining Date:</label>
                            <input type="datetime-local" name="joining_date" class="form-control" placeholder="Joining Date"
                                id="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Enter Salary (Monthly):</label>
                            <input type="number" name="salary" class="form-control" placeholder="Monthly Salary" id="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Labour per hour:</label>
                            <input type="number" name="labour_per_hour" class="form-control" placeholder="Labour per hour"
                                id="">
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
