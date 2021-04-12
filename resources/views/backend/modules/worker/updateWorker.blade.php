@extends('backend.dashboard')

@section('content')


    <style>
        .form-bg {
            background: rgb(63, 94, 251);
            background: radial-gradient(circle, rgb(38, 0, 255) 0%, rgba(252, 70, 107, 1) 100%);
        }

    </style>
    <!-- Form -->
    <form method="post" action="{{ route('worker.saveUpdate', $workers['id']) }}"
        class="container form-control text-light p-3 form-bg">
        @csrf
        @method('put')


        <div class="form-group">
            <label>Enter Name:</label>
            <input type="name" name="name" class="form-control" value="{{ $workers['name'] }}" id="">
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
            <label>Enter Age:</label>
            <input type="number" name="age" class="form-control" value="{{ $workers['age'] }}" id="">
        </div>
        <br>
        <div class="form-group">
            <label>Enter Joining Date:</label>
            <input type="datetime-local" name="joining_date" class="form-control" value="{{ $workers['joining_date'] }}"
                id="">
        </div>
        <br>
        <div class="form-group">
            <label>Enter Salary (Monthly):</label>
            <input type="number" name="salary" class="form-control" value="{{ $workers['salary'] }}" id="">
        </div>
        <br>
        {{-- <div class="form-group">
            <label>Labour per hour:</label>
            <input type="number" name="labour_per_hour" class="form-control" value="{{ $workers['labour_per_hour'] }}"
                id="">
        </div>
        <br> --}}

        <div class="text-end">
            <a href="{{ route('worker.list') }}" class="btn btn-warning">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>

@endsection
