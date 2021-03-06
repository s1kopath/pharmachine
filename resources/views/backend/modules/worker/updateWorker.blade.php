@extends('backend.adminHome')

@section('content')


    <style>
        .form-bg {
            background: rgb(63, 94, 251);
            background: radial-gradient(circle, rgb(38, 0, 255) 0%, rgba(252, 70, 107, 1) 100%);
        }

    </style>


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

    <!-- Form -->
    <form method="post" action="{{ route('worker.saveUpdate', $workers['id']) }}" enctype="multipart/form-data"
        class="container form-control text-light p-3 form-bg">
        @csrf
        @method('put')


        <div class="form-group">
            <label>Enter Name:</label>
            <input type="name" name="name" class="form-control" value="{{ $users['name'] }}" id="">
        </div>
        <br>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $users['email'] }}" id="">
        </div>
        <br>
        <div class="form-group">
            <label>Enter Address:</label>
            <input type="address" name="address" class="form-control" value="{{ $workers['address'] }}" id="">
        </div>
        <br>
        <div class="form-group">
            <label>Enter Contact Number:</label>
            <input type="tel" name="contact" class="form-control" value="{{ $workers['contact'] }}" id="">
        </div>
        <br>
        <div class="form-group">
            <label>Select Gender</label>
            <select class="form-control" name="gender" id="">
                <option value="{{ $workers['gender'] }}">{{ $workers['gender'] }}</option>
                <option value="none">(none)</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label>Enter Date of Birth:</label>
            <input type="date" name="date_of_birth" class="form-control" value="{{ $workers['date_of_birth'] }}" id="">
        </div>
        <br>
        <div class="form-group">
            <label>Enter Joining Date:</label>
            <input type="date" name="joining_date" class="form-control" value="{{ $workers['joining_date'] }}" id="">
        </div>
        <br>
        <div class="form-group">
            <label>Enter Salary (Monthly):</label>
            <input type="number" name="salary" class="form-control" value="{{ $workers['salary'] }}" id="">
        </div>
        <br>
        <div class="form-group">
            <img style="width: 150px;" src="{{ url('/files/worker/' . $workers->image) }}" alt=""><br>
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <br>

        <div class="text-end">
            <a href="{{ route('worker.list') }}" class="btn btn-warning">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>

@endsection
