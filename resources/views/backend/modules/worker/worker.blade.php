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


    <div class="d-flex justify-content-between mt-2 container">
        <form action="{{ route('worker.search') }}" method="GET">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <input class="form-control" name="search" placeholder="Search" type="text" value="">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-info">Search</button>
                </div>
            </div>
        </form>
        <div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                Hire New Worker
            </button>
        </div>
    </div>



    {{-- Table --}}
    <div class="container mt-3 ">
        <table class="table table-hover table-responsive shadow-lg">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
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
                @foreach ($workers as $key => $data)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>
                            <img style="width: 100px;" @if (!$data->image) src="https://bootdey.com/img/Content/avatar/avatar7.png"
                                @else
                                                                    src="{{ url('/files/worker/' . $data->image) }}" @endif>
                        </td>
                        <td>{{ $data->workerUser->name }}</td>
                        <td>{{ $data->workerUser->email }}</td>
                        <td>{{ $data->address }}</td>
                        <td>{{ $data->contact }}</td>
                        <td>{{ $data->gender }}</td>
                        <td>{{ $data->date_of_birth }}</td>
                        <td>{{ $data->age }} Years</td>
                        <td>{{ $data->joining_date }}</td>
                        <td>{{ $data->salary }} Tk</td>
                        <td>{{ $data->labour_per_hour }}Tk</td>
                        <td>
                            <a class="btn" href="{{ route('worker.profile', $data['id']) }}"><span
                                    data-feather="eye">View</span></a>||
                            <a class="btn" href="{{ route('worker.update', $data['id']) }}"><span
                                    data-feather="edit">Update</span></a>||
                            <a onclick="return confirm('Are you sure you want to delete this info ?')" class="btn"
                                href="{{ route('worker.delete', $data['id']) }}"><span
                                    data-feather="trash-2">Delete</span></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Worker</h5>
                </div>
                <form method="post" action="{{ route('worker.create') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Enter Name:</label>
                            <input required type="name" name="name" class="form-control" placeholder="Name" id="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Enter Email Address:</label>
                            <input required type="email" name="email" class="form-control" placeholder="Email" id="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Enter Address:</label>
                            <input required type="text" name="address" class="form-control" placeholder="Address" id="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Enter Contact Number:</label>
                            <input required type="tel" name="contact" class="form-control" placeholder="01*********" id="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Gender:</label>
                            <select class="form-control" name="gender" id="">
                                <option value="">Select a gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Enter Date of Birth:</label>
                            <input required max="{{ $ageLimit }}" type="date" name="date_of_birth" class="form-control"
                                placeholder="Date of Birth" id="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Enter Joining Date:</label>
                            <input required type="date" name="joining_date" class="form-control" placeholder="Joining Date"
                                id="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Enter Salary (Monthly):</label>
                            <input required type="string" name="salary" class="form-control" placeholder="Monthly Salary"
                                id="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Select Image</label>
                            <input name="worker_image" type="file" class="form-control" src="" id="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button onclick="return confirm('Do you really want to submit?')" type="submit"
                            class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
